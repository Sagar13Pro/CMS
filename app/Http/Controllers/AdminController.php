<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use App\Models\Admin;
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
    public function Logout()
    {
        if (session()->has('admin_mail')) {
            session()->flush();
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
                ->with('error', 'The details does not match with our records. Please Try Again!!')
                ->withInput($request->all());
        }
    }
}
