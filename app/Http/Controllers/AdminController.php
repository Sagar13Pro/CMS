<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Merged;
use App\Models\userComp;
use App\Models\User;
use DateTime;
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
        $List = userComp::whereIn('status', ['Registered'])->get();
        return view('admin.MergeComplaint', compact('List'));
    }
    public function Logout()
    {
        if (session()->exists('admin_mail') && session()->has('admin_mail')) {
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
                session()->put('admin_name', $admin[0]->fullName);
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
        $Merge = null;
        $Complaints = userComp::where('Complaint_ID', $id)->get();
        if ($Complaints[0]->isMerged) {
            $Merge =  Merged::select('Merged_ID')->where('Complaint_ID', $id)->get()[0]['Merged_ID'];
        }
        return response()
            ->json([
                'success' => true,
                'update' => $Complaints,
                'Merged_ID' => $Merge,
            ]);
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
            if ($bool) {
                $user = User::find($to_update->user_id);
                $user->notify(new \App\Notifications\Notify($request->status, $request->remarks, $to_update->Complaint_ID));
            }
            return redirect()
                ->back()
                ->with('message', 'Complaint updated successfully with id:' . $to_update->Complaint_ID . '.');
        } catch (Exception  $err) {
            return redirect()
                ->back()
                ->with('error', 'Complaint ID is empty.');
        }
    }
    //Mark Notification 
    public function SuperNotificationMark($id = null, $slug = null)
    {
        $adminNoti = Admin::findOrFail($id);
        $adminNoti->unreadNotifications()
            ->where('id', $slug)
            ->get()[0]
            ->markAsRead();
        return back();
    }
    //Merging Complaints
    public function Merge(Request $request)
    {

        $getCount = count($request->Check);
        $ArrComplaints = array();
        for ($i = 0; $i < $getCount; $i++) {
            $var  = userComp::where('id', $request->Check[$i])->get()[0];
            array_push($ArrComplaints, $var);
        }
        // dd($ArrComplaints[0]['AuthDe);
        $Auth = $ArrComplaints[0]['AuthDept'];
        $Sub = $ArrComplaints[0]['SubCategory'];
        foreach ($ArrComplaints as $item) {
            if ($item->AuthDept != $Auth) {
                return back()
                    ->with('info', 'Please Select complaint with common Auth and Sub Category');
            }
        }
        //ID GENERATOR
        $merge = Merged::select('Merged_ID')->orderBy('id', 'desc')->first();
        if (is_null($merge)) {
            $mergeID = 'Merged_0';
        } else {
            $int = (int)substr($merge->Merged_ID, 7);
            $Newint = (string)$int + 1;
            $mergeID = str_replace($int, $Newint, $merge->Merged_ID);
        }
        foreach ($ArrComplaints as $item) {
            if ($item->AuthDept == $Auth) {
                $item->Status = 'Merged';
                $item->isMerged = 1;
                $item->Merged_ID = $mergeID;
                $item->save();
                $merged = Merged::create([
                    'Merged_ID' => $mergeID,
                    'Complaint_ID' => $item->Complaint_ID
                ]);
                if ($merged) {
                    $user = User::find($item->user_id);
                    $user->notify(new \App\Notifications\Notify("Merged", "Your Complaint has been Merged and new ID is: " . Merged::select('Merged_ID')->where('Complaint_ID', $item->Complaint_ID)->get()[0]['Merged_ID'], $item->Complaint_ID));
                }
            }
        }
        return back()
            ->with('message', 'Complaints are merged.');
    }
}
