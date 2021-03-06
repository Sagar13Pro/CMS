<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\userComp;
use Exception;

class AdminController extends Controller
{
    //Views Functions
    public function Login()
    {
        return view('admin.AdminLogin');
    }
    public function Register()
    {
        return view('admin.AdminReg');
    }
    public function Dashboard()
    {
        return view('admin.AdminDash');
    }
    public function ComplaintList()
    {
        $List = userComp::all();
        return view('admin.ComplaintList', compact('List'));
    }
    public function UpdateComplaint()
    {
        return view('admin.UpdateComplaint');
    }
    public function MergeComplaint()
    {
        return view('admin.MergeComplaint');
    }
    public function Logout()
    {
        if (session()->has('admin_mail')) {
            session()->pull('admin_mail');
            session()->pull('admin_name');
        }
        return redirect(route('admin.login.view'));
    }
    //Storing Registration details
    public function Store(RegistrationValidator $request)
    {
        try {
            Admin::create([
                'firstName' => $request->_firstname,
                'lastName' => $request->_lastname,
                'email' => $request->_email,
                'mobileNo' => $request->_mobile,
                'password' => $request->_password,
            ]);
            //Email Sending
            $to_email = $request->_email;
            $data = array("name" => "Hello Techies!",);
            Mail::send('mail', $data, function ($message) use ($to_email) {
                $message->to($to_email)
                    ->subject('Team ID For PU Digital Hackathon');
            });

            return redirect(route('admin.login.view'))
                ->with('message', 'Your Registration has been Successfull.');
        } catch (Exception $error) {
            dd($error);
            return redirect()
                ->back()
                ->with('error', 'The email is already with us');
        }
    }
    //Admin login validation
    public function ValidateAdmin(Request $request)
    {
        $getCount = Admin::where('email', $request->email)
            ->count();
        if ($getCount == 1) {
            $admin = Admin::select('*')
                ->where('email', $request->email)
                ->get();

            if (Hash::check($request->pass, $admin[0]->password)) {
                session()->put('admin_mail', $request->email);
                session()->put('admin_name', $admin[0]->FullName);
                return redirect(route('admin.dashboard.view'));
            } else {
                return redirect(route('admin.login.view'))
                    ->with('error', 'The details does not match with our records. Please Try Again!')
                    ->withInput($request->all());
            }
        } else {
            return redirect(route('admin.login.view'))
                ->with('error', 'The details does not match with our records.')
                ->withInput($request->all());
        }
    }
    //Pop-up Model ComplaintList route model binding $id name and route parameter must be same.
    public function FetchDetails(userComp $id)
    {
        return response()
            ->json(['success' => true, 'detail' => $id]);
    }
    //Model For UpateComplaint with route binding
    public function FetchUpdate($id = null)
    {
        return response()
            ->json(['success' => true, 'update' => userComp::where('Complaint_ID', $id)->get()]);
    }
    //For UpdateComplaint Model Updating remarks and status for a complaint
    public function Update(Request $request)
    {
        try {
            $to_update = userComp::findOrFail($request->id);
            $to_update->status = $request->status;
            $to_update->Remarks = $request->remarks;
            $to_update->save();
            return redirect()
                ->back()
                ->with('message', 'Complaint updated successfully.');
        } catch (Exception  $err) {
            //dd($err);
            return redirect()
                ->back()
                ->with('error', 'Complaint ID is empty.');
        }
    }
}
