<?php

namespace App\Http\Controllers;

use App\Models\registration;
use App\Models\sendbid;
use App\Models\teamrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Notification;
use App\Notifications\bidnotification;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\Empty_;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{

    public function registration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:registrations',
            'password' => 'required',
            // 'education' => 'required',
            'address' => 'required',
            'role' => 'required',
            // 'skill' => 'required',
            'aboutyou' => 'required',
            'user_image' => 'required',


        ]);

        $register = new registration();
        $register->reg_id = $request->reg_id;
        $register->f_name = $request->first_name;
        $register->l_name = $request->last_name;
        $register->email = $request->email;
        $register->password = $request->password;
        $register->education = $request->education;
        $register->address = $request->address;
        $register->role = $request->role;
        $register->skillset = $request->skill;
        $register->aboutyou = $request->aboutyou;
        if ($request->file('user_image')) {
            $file = $request->file('user_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $register['user_image'] = $filename;
        }
        $res = $register->save();
        if ($res) {
            return redirect('/login')->with('success', 'You Have Register Successfully!');
        } else {
            return back()->with('fail', 'Something Went Wrong!');
        }
    }


    public function login(Request $request)
    {


        $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request['email'];
        $password = $request['password'];
        $client = "";
        $developer = "";
        $rolno = "";
        $clientdata = registration::where(['email' => $email, 'password' => $password])->get();
        $id = "";

        foreach ($clientdata as $data) {
            $rolno = $data->role;
            $id = $data->id;
        }
        // dd($clientdata);

        if ($rolno == 1) {
            $client = registration::where(['email' => $email, 'password' => $password])->count();
        } else {
            $developer = registration::where(['email' => $email, 'password' => $password])->count();
        }


        if ($client > 0) {

            $request->session()->put(['User_Login' => $email]);
            $request->session()->put(['User_password' => $password]);
            $request->session()->put(['USER_id' => $id]);
            return redirect('/clientdashboard');
        } elseif ($developer > 0) {

            $request->session()->put(['User_Login' => $email]);
            $request->session()->put(['User_password' => $password]);
            $request->session()->put(['USER_id' => $id]);
            // $request->session()->put(['User_role' => $role]);
            return redirect('/developerdashboard');
        } else {
            return redirect()->back()->with('fail', 'Please Enter Valid Login Details !');
        }
    }



    public function dashboard(Request $request)
    {
        $clientdata = DB::table('registrations')->get();

        $email = session()->get('User_Login');
        $password = session()->get('User_password');
        $userpro = registration::where(['email' => $email, 'password' => $password])->count();
        $userproone = registration::where(['email' => $email, 'password' => $password])->get();
        session()->put(['userproone' => $userproone]);
        $id = session()->get('userproone');
        $user = registration::find($id[0]->reg_id);
        session()->put(['user' => $user]);
        if ($userpro > 0) {
            return view('clientdashboard')->with(compact('clientdata'));
            // return redirect('/dashboard');
        }
        return view('clientdashboard')->with(compact('clientdata'));
    }

    public function dashboardcustom(Request $request)
    {
        $custom = DB::table('registrations')->get();
        $customteam = DB::table('teamrequests')
            ->join('registrations', 'teamrequests.sender_id', '=', 'registrations.reg_id')
            ->get();
        // dd($customteam);
        // dd($custom);
        return view('developerdashboard')->with(compact('custom', 'customteam'));
    }


    public function teamrequest(Request $request)
    {

        $customteam = DB::table('teamrequests')
            ->join('registrations', 'teamrequests.sender_id', '=', 'registrations.reg_id')
            ->get();
        // dd($customteam);
        // dd($custom);
        return view('teamrequest')->with(compact('customteam'));
    }


    public function changeteamStatus($id)
    {
        $getStatud = teamrequest::select('status')->where('sender_id', $id)->first();
        if ($getStatud->status == '0') {
            $status = 1;
        } else {
            $status = 0;
        }
        // dd($status);
        $update = teamrequest::where('sender_id', $id)->update(['status' => $status]);
        // dd($update);
        return redirect()->back();

        // return response()->json(['success'=>'Status change successfully.']);
    }

    public function  changeStatus($id)
    {
        $getStatud = sendbid::select('status')->where('sender_id', $id)->first();
        if ($getStatud->status == '0') {
            $status = 1;
        } elseif ($getStatud->status == '2') {
            $status = 1;
        } else {
            $status = 0;
        }
        // dd($status);
        $update = sendbid::where('sender_id', $id)->update(['status' => $status]);
        // dd($update);
        return redirect()->back();
    }




    public function developerdashboard(Request $request)
    {
        $user = session()->get('USER_id');


        // dd($user);


        $rating = DB::table('sendrates')->where('reciever_id', '=', $user)->get();
        $getseconddata = DB::table('sendrates')->count();
        // dd($rating);
        // if ($getseconddata > 0) {
        //     $gettotal = $rating / $getseconddata;
        // } else {
        //     "No Record Found";
        // }

        // dd($rating);


        // $rating=DB::table('sendrates')->where('reciever_id',$user)->get();

        // $rateuse= $rating;
        // dd($rating);
        $devdata = DB::table('registrations')->get();
        return view('developerinfo')->with(compact('devdata', 'rating'));
    }

    public function developerabout(Request $request)
    {
        $devdata = DB::table('registrations')->get();
        return view('developeraboutus')->with(compact('devdata'));
    }

    public function getclientdata(Request $request)
    {
        $clientiddata = DB::table('registrations')->get();
        return view('postproject')->with(compact('clientiddata'));
    }

    public function usernoti()
    {
        $email = session()->get('User_Login');
        $password = session()->get('User_password');
        $userpro = registration::where(['email' => $email, 'password' => $password])->count();
        $userproone = registration::where(['email' => $email, 'password' => $password])->get();
        session()->put(['userproone' => $userproone]);
        $id = session()->get('userproone');
        $user = registration::find($id[0]->reg_id);
        session()->put(['user' => $user]);
        if ($userpro > 0) {
            return view('admin_header');
            // return redirect('/dashboard');
        }
        return redirect()->back();
    }
}
