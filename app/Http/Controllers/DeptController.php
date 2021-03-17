<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationValidator;
use Illuminate\Support\Facades\Mail;
use App\Models\Dept;
use Exception;
use App\Models\userComp;
use DateTime;
class DeptController extends Controller
{
    //Views Only
    public function Login()
    {
        return view('dept.DeptLogin');
    }
    public function Register()
    {
        return view('dept.DeptReg');
    }
    public function Dashboard()
    {
        return view('Dept.DeptDash');
    }
    public function ComplaintList()
    {
        $List = userComp::all();
        return view('dept.ComplaintList', compact('List'));
    }
    public function UpdateComplaint()
    {
        return view('dept.UpdateComplaint');
    }
    public function MergeComplaint()
    {
        $List = userComp::all();
        return view('dept.MergeComplaint', compact('List'));
    }
    public function Logout()
    {
        if (session()->has('dept_mail')) {
            session()->pull('dept_mail');
            session()->pull('dept_name');
        }
        return redirect(route('dept.login.view'));
    }
    //Storing AND Validation
    public function Store(RegistrationValidator $request)
    {
        try {
            Dept::create([
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

            return redirect(route('dept.login.view'))
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
        $getCount = Dept::where('email', $request->email)
            ->count();
        if ($getCount == 1) {
            $dept = Dept::select('*')
                ->where('email', $request->email)
                ->get();

            if (Hash::check($request->pass, $dept[0]->password)) {
                session()->put('dept_mail', $request->email);
                session()->put('dept_name', $dept[0]->FullName);
                return redirect(route('dept.dashboard.view'));
            } else {
                return redirect(route('dept.login.view'))
                    ->with('error', 'The details does not match with our records. Please Try Again!')
                    ->withInput($request->all());
            }
        } else {
            return redirect(route('dept.login.view'))
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
            $to_update->updated_at = new DateTime();
            $bool = $to_update->save();
            // if ($bool) {
            //     $user = User::find($to_update->user_id);
            //     $user->notify(new \App\Notifications\Notify($request->status, $request->remarks, $to_update->Complaint_ID));
            // }
            return redirect()
                ->back()
                ->with('message', 'Complaint updated successfully with id:' . $to_update->Complaint_ID . '.');
        } catch (Exception  $err) {
            //dd($err);
            return redirect()
                ->back()
                ->with('error', 'Complaint ID is empty.');
        }
    }
}
