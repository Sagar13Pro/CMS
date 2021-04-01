<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationValidator;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Crabbly\Fpdf\Fpdf;
use App\Models\userComp;
use App\Models\User;
use App\Models\Merged;
use App\Notifications\Complaint;
use Exception;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
    public function ResetView($slug = null)
    {
        return view('user.reset', ['slug' => $slug]);
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
            $toMail = $request->_email;
            $data =  [
                'name' => $request->_firstname . ' ' . $request->_lastname,
                'product_name' => 'CMS (Complaint Management System)',
                'login_url' => 'http://127.0.0.1:8000/user/login',
                'username' => $toMail,
                'action_url' => 'http://127.0.0.1:8000',
            ];
            Mail::send('mail', $data, function ($message) use ($toMail) {
                $message->to($toMail)
                    ->subject('Welcome To CMS');
            });
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
            return Socialite::driver('google')->redirect();
        } catch (Exception $error) {
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
                    $toMail = $user->user['email'];
                    $data =  [
                        'name' => $user->user['given_name'] . ' ' . $user->user['family_name'],
                        'product_name' => 'CMS (Complaint Management System)',
                        'login_url' => 'http://127.0.0.1:8000/user/login',
                        'username' => $toMail,
                        'action_url' => 'http://127.0.0.1:8000',
                    ];
                    Mail::send('mail', $data, function ($message) use ($toMail) {
                        $message->to($toMail)
                            ->subject('Welcome To CMS');
                    });
                    session()->put('session_mail', $user->user['email']);
                    session()->put('session_name', User::where('email', $user->user['email'])->get()[0]->FullName);
                    return redirect(route('dashboard.user'));
                }
            } catch (Exception $error) {
                //dd($error);
                return redirect(route('login.view'))
                    ->with('error', 'The page refreshed.');
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
                session()->put('user_id', $user[0]->id);
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
        //dd($request->all());
        $validate = validator::make($request->all(), [
            'complaintNature' => 'max:20',
            'pincode' => 'digits:6',
            'complaintDetails' => 'max:80',
            'document1' => 'mimes:pdf,docx,doc,jpg,jpeg,png|max:2048',
            'document2' => 'mimes:pdf,docx,doc,jpg,jpeg,png|max:2048'
        ])->validated();
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
                'user_id' => session('session_mail'),
            ]);
        } catch (Exception $error) {
            $complaint = false;
        }
        if ($complaint) {
            $path = $this->StoreDocument($request);
            // dd(userComp::select('Complaint_ID')->where('ForeignEmail', session('session_mail'))->get()[0]);
            //$invoice = $this->GeneratePDF($request);
            // $user = User::findOrFail(session('user_id'));
            // $user->notify($user, new \App\Notifications\Notify('Your complaint registered successfully.', '', 'With Complaint ID:' . , ''));
            return redirect(route('dashboard.user'))
                ->with('message', 'Your Complaint has been registered successfully.');
        } else {
            return redirect()
                ->back()
                ->with('error', 'Please check that fields are not empty:Sub-Category/Auth-Dept| District/City')
                ->withInput($request->all());
        }
    }
    //PDF Generate for complaint register adn send to user email
    protected function GeneratePDF($request)
    {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', '18');
        $pdf->Ln(5);
        $pdf->cell(100, 10, 'Complaint Type');
        $pdf->cell(100, 10, 'Complaint Category', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->cell(100, 10, $request->complaintType, 0);
        $pdf->cell(100, 10, $request->complaintCategory, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->cell($pdf->GetPageWidth(), 0.6, '', 0, 0, '', true);
        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->cell(100, 10, 'Sub-Catogory');
        $pdf->cell(100, 10, 'Authority Department/Company', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->cell(100, 10, $request->subCategory);
        $pdf->cell(100, 10, $request->AuthDept, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->cell($pdf->GetPageWidth(), 0.6, '', 0, 0, '', true);
        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->cell(100, 10, 'Nature of Complaint');
        $pdf->cell(100, 10, 'Date of Complaint', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->MultiCell(90, 10, $request->complaintNature, 0);
        $pdf->SetXY($pdf->GetX() + 100, $pdf->getY() - 10);
        $pdf->cell(100, 10, $request->complaintDate, 0, 40, 'L');
        $pdf->Ln(5);
        $pdf->cell($pdf->GetPageWidth(), 0.6, '', 0, 0, '', true);
        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->cell(100, 10, 'Pincode');
        $pdf->cell(100, 10, 'Reference Number', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->cell(100, 10, $request->pincode);
        $pdf->cell(100, 10, $request->refNo, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->cell($pdf->GetPageWidth(), 0.6, '', 0, 0, '', true);
        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->cell(100, 10, 'District');
        $pdf->cell(100, 10, 'City', 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->cell(100, 10, $request->district);
        $pdf->cell(100, 10, $request->city, 0, 0, 'L');
        $pdf->Ln(10);
        $pdf->cell($pdf->GetPageWidth(), 0.6, '', 0, 0, '', true);
        $pdf->Ln(10);

        $pdf->SetFont('Times', 'B', 18);
        $pdf->cell(100, 10, 'Complaint Details');
        $pdf->Ln(10);
        $pdf->SetFont('Times', '', 17);
        $pdf->MultiCell(0, 10, $request->complaintDetails);
        $pdf->Ln(10);
        $files = $pdf->Output('F', storage_path() . '/app/PDFs/' . 'pdf' . '.pdf');
    }
    //document store
    public function StoreDocument($request)
    {
        $path1 = null;
        $path2 = null;
        if ($request->hasFile('document1')) {
            $file =  $request->file('document1');
            $getID = userComp::all()->last();
            userComp::where('Complaint_ID', $getID->Complaint_ID)->update([
                'Doc1FileName' => $getID->Complaint_ID . '__A.' . $file->getClientOriginalExtension(),
            ]);
            $name = userComp::all()->last();
            $path1 = $file->storeAs('document', $name->Doc1FileName);
        }
        if ($request->hasFile('document2')) {
            $file =  $request->file('document2');
            $getID = userComp::all()->last();
            userComp::where('Complaint_ID', $getID->Complaint_ID)->update([
                'Doc2FileName' => $getID->Complaint_ID . '__B.' . $file->getClientOriginalExtension(),
            ]);
            $name = userComp::all()->last();
            $path2 = $file->storeAs('document', $name->Doc2FileName);
        }
        return  [
            'doc1' => storage_path() . '/' . $path1,
            'doc2' => storage_path() . '/' . $path2,
        ];
    }
    public function Track($id = null)
    {
        if (str_starts_with($id, 'Merged')) {
            $Complaints = Merged::where('Merged_ID', $id)->get();
            return response()
                ->json([
                    'success' => true,
                    'complaint' => $Complaints,
                ]);
        } else {
            $Complaints = userComp::where('Complaint_ID', $id)->get();
            return response()
                ->json([
                    'success' => true,
                    'complaint' => $Complaints,
                ]);
        }
    }
    //User notification mark Read
    public function MarkReadNotification($id = null, $slug = null)
    {
        $user = User::findORFail($id);
        if (is_null($slug)) {
            $user->unreadNotifications->markAsRead();
        } else {
            $user->unreadNotifications()
                ->where('id', $slug)
                ->get()[0]
                ->markAsRead();
        }
        return redirect(route('dashboard.user'));
    }
    //Recompalint 
    public function Recomplaint(userComp $id)
    {
        try {
            $admin = Admin::find(1);
            userComp::where('Complaint_ID', $id->Complaint_ID)
                ->update(['status' => 'Recomplained']);
            Notification::send($admin, new Complaint($id->Complaint_ID, "Recomplained"));
            return redirect()
                ->back()
                ->with('message', 'Your Complaint has been recomplaint successfully with ID: ' . $id->Complaint_ID . '.');
        } catch (Exception $error) {
            // dd($error);
            return redirect()
                ->back()
                ->with('error', 'Something went wrong. Please Try Again.');
        }
    }

    public function Close(userComp $id, Request $request)
    {
        $closed = userComp::where('id', $id->id)->update([
            'status' => 'Closed',
            'feedBack' => $request->feedback,
        ]);
        if ($closed) {
            Notification::send(Admin::find(1), new Complaint($id->Complaint_ID, "Closed"));
            return back()
                ->with('message', 'Your complaint with ID: ' . $id->Complaint_ID . ' has been closed successfully.', $id->Complaint_ID);
        } else {
            return back()
                ->with('error', 'Something got went.Please Try Again after sometime');
        }
    }
    //Reset Password Validate Email
    public function ResetValidation(Request $request)
    {
        $user = User::where('email', $request->email)->get();
        if (count($user)) {
            $toMail = $request->email;
            $token = Str::random('9');
            $user[0]->remember_token = $token;
            $user[0]->save();
            $data = [
                'name' => $user[0]->fullName,
                'action_url' => route('password.reset.view', $token),
                'product_name' => 'CMS (Complaint Management System)'
            ];
            Mail::send('PasswordResetTemplate', $data, function ($message) use ($toMail) {
                $message->to($toMail)
                    ->subject('Reset Password for CMS');
            });
        } else {
            return back()
                ->with('error', 'The email I\'D Doesn\'t match with our records.');
        }
    }
    //Change Psssword
    public function ChangePassword(Request $request, $slug = null)
    {
        //dd($request->all());
        $validate = Validator::make($request->all(), [
            '_password' => ['min:8', 'confirmed']
        ])->validated();
        if (!is_null($slug)) {
            $change = User::select('password')->where('remember_token', $slug)->update(['password' => Hash::make($request->_password)]);
            if ($change) {
                return redirect(route('user.login.view'))
                    ->with('message', 'Your Password has been changed successfully.');
            }
        }
    }
}
