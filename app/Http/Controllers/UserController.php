<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidator;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Postmark\PostmarkClient;
use App\Models\userComp;
use App\Models\User;
use Exception;


class UserController extends Controller
{
    //views 
    public function Login()
    {
        return view('user.login');
    }
    public function Register()
    {
        return view('user.signup');
    }
    public function Dashboard()
    {
        $details = userComp::select()->where('foreignEmail', session('session_mail'));
        return view('user.stuffs.dashboard');
    }
    public function ComplaintList()
    {
        //$details = userComp::all();
        return view('user.stuffs.complaintlist');
    }
    public function NewComplaint()
    {
        return view('user.stuffs.newcomplaint');
    }
    public function TrackComplaint()
    {
        return view('user.stuffs.trackcomplaint');
    }
    //User Registration 
    public function store(RegistrationValidator $request)
    {
        try {
            $user = User::create([
                'firstName' => $request->_firstname,
                'lastName' => $request->_lastname,
                'email' => $request->_email,
                'mobileNo' => $request->_mobile,
                'password' => $request->_password,
            ]);
        } catch (Exception $error) {
            //dd($error);
            $user = false;
        }
        if ($user) {
            return redirect(route('user.login.view'))
                ->with('message', 'Registration Successfull.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'The Email already with us.!!');
        }
    }
    //User Registration With Google 
    function redirectToProviderGoogle()
    {
        try {
            //dd('helo');
            return Socialite::driver('google')->redirect();
        } catch (Exception $error) {
            dd($error);
            return redirect(route('login.view'))
                ->with('error', 'Something got Wrong. Please Try Again.!!');
        }
    }
    public function HandlerProviderGoogle()
    {
        $user = Socialite::driver('google')
            ->stateless()
            ->user();
        //dd($user);
        if ((User::select()->where('email', $user['email'])->count()) != 1) {
            try {
                $users = User::create([
                    'firstName' => $user->user['given_name'],
                    'lastName' => $user->user['family_name'],
                    'email' => $user->user['email'],
                    'avatar' => $user->avatar,
                    'email_verified' => $user->user['email_verified'],
                ]);
                if ($users) {
                    session()->put('session_mail', $user->user['email']);
                    session()->put('session_name', User::where('email', $user->user['email'])->get()[0]->FullName);
                    return redirect(route('dashboard.user'));
                }
            } catch (Exception $error) {
                dd($error);
            }
        } else {
            session()->put('session_mail', $user->user['email']);
            session()->put('session_name', User::where('email', $user->user['email'])->get()[0]->FullName);
            return redirect(route('dashboard.user'));
        }
    }
    //user validation
    function ValidateUser(Request $request)
    {
        $getCount = User::where('email', $request->email)
            ->count();
        if ($getCount == 1) {
            $user = User::select('*')
                ->where('email', $request->email)
                ->get();

            if (Hash::check($request->pass, $user[0]->password)) {
                session()->put('session_mail', $request->email);
                session()->put('session_name', $user[0]->FullName);
                return redirect(route('dashboard.user'));
            } else {
                return redirect(route('user.login.view'))
                    ->with('error', 'The details does not match with our records. Please Try Again!')
                    ->withInput($request->all());
            }
        } else {
            return redirect(route('user.login.view'))
                ->with('error', 'The details does not match with our records. Please Try Again!!')
                ->withInput($request->all());
        }
    }
    //new complaint store
    public function ComplaintStore(Request $request)
    {
        $request->validate([
            'complaintNature' => 'max:20',
            'district' => 'max:40',
            'city' => 'max:40',
            'pincode' => 'digits:6',
            'complaintDetails' => 'max:80',
            'document1' => 'max:2048',
            'document2' => 'max:2048'
        ]);

        try {
            $value = userComp::all()->last();
            if (is_null($value)) {
                /*json used because when db is empty is value is null.Hence obj->property required, using json encode decode we can implement that*/
                $encoded = json_encode(['Complaint_ID' => 100100]);
                $value = json_decode($encoded);
            }
            $complaint = userComp::create([
                'Complaint_ID' => $value->Complaint_ID,
                'foreignEmail' => session()->get('session_mail'),
                'ComplaintType' => $request->complaintType,
                'ComplaintCategory' => $request->complaintCategory,
                'SubCategory' => $request->subCategory,
                'AuthDept' => $request->AuthDept,
                'ComplaintNature' => $request->complaintNature,
                'District' => $request->district,
                'City' => $request->city,
                'Pincode' => $request->pincode,
                'ReferenceNo' => $request->refNo,
                'ComplaintDetails' => $request->complaintDetails,
                'ComplaintDate' => $request->complaintDate,
            ]);
        } catch (Exception $error) {
            dd($error);
            $complaint = false;
        }
        if ($complaint) {
            $this->StoreDocument($request);
            return redirect(route('dashboard.user'))
                ->with('message', 'Your Complaint has been registered successfully.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Please check that fields are not empty:Sub-Category/Auth-Dept| District/City')
                ->withInput($request->all());
        }
    }
    //document store
    public function StoreDocument($request)
    {
        if ($request->hasFile('document1')) {
            $file =  $request->file('document1');
            $getID = userComp::all()->last();
            userComp::where('Complaint_ID', $getID->Complaint_ID)->update([
                'Doc1FileName' => $getID->Complaint_ID . '__A.' . $file->getClientOriginalExtension(),
            ]);
            $name = userComp::all()->last();
            $var = $file->storeAs('document', $name->Doc1FileName);
        }
        if ($request->hasFile('document2')) {
            $file =  $request->file('document2');
            $getID = userComp::all()->last();
            userComp::where('Complaint_ID', $getID->Complaint_ID)->update([
                'Doc2FileName' => $getID->Complaint_ID . '__B.' . $file->getClientOriginalExtension(),
            ]);
            $name = userComp::all()->last();
            $var = $file->storeAs('document', $name->Doc2FileName);
        }
    }
    public function Track($id)
    {
        try {
            $complaint = userComp::select()
                ->where('Complaint_ID', $id)
                ->get();
        } catch (Exception $error) {
            return response()
                ->json(['success' => false]);
        }
        return response()
            ->json(['success' => true, 'complaint' => $complaint]);
    }
}
