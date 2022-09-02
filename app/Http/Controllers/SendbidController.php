<?php

namespace App\Http\Controllers;

use App\Models\sendbid;
use App\Models\registration;
use App\Models\project;
use App\Models\teamrequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\bidNotification;

class SendbidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bidsend(Request $request)
    {
        $request->validate([
            'job_name' => 'required',
            'job_budget' => 'required',
            'job_duration' => 'required',
            'job_services' => 'required',
            'work_with' => 'required',

            // 'p_image' => 'required',
        ]);
        // return $request;
        // $getid=$request->input('work_with');
        // dd($getid);


        $register = new sendbid();
        $register->reciever_id = $request['reciever_id'];
        $register->sender_id = $request['sender_id'];
        $register->bid_job_name = $request['job_name'];
        $register->bid_job_budget = $request['job_budget'];
        $register->bid_job_duration = $request['job_duration'];
        $register->bid_job_service = $request['job_services'];
        $register->worj_with = $request['work_with'];
        $register->save();

        $snd_id = $register->sender_id;
        $rec_id = $register->reciever_id;
        $job_name = $register->bid_job_name;
        $job_service = $register->bid_job_service;
        // dd($job_service);

        $teamobj = new teamrequest();
        $teamobj->reciever_id = $request['teamid'];
        $teamobj->sender_id = $snd_id;
        $teamobj->project_name = $job_name;
        $teamobj->project_desscription = $job_service;
        $teamobj->deadline = $request['deadline'];
        $teamobj->save();




        // dd($request);
        // return $request;
        // echo $request;



        $reciever = registration::where('reg_id', $request['reciever_id'])->get();
        // dd($name);
        $name = registration::where('reg_id', $request['sender_id'])->get();
        // $dataput = session()->get('reciever');
        // $user = registration::find($dataput[0]->id);
        // $helo = session()->put(['user' => $dataput]);

        // dd($name);
        $check = Notification::send($reciever, new bidNotification($name));


        return redirect('/allprojects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function developersendoffers(Request $request)
    {
        $getrate = DB::table('sendrates')->sum('rating');
        $getseconddata = DB::table('sendrates')->count();

        if ($getseconddata > 0) {
            $gettotal = $getrate / $getseconddata;
        } else {
            "No Record Found";
        }

        // dd($gettotal);
        $biddetail = DB::table('sendbids')
            // ->join('registrations', 'registrations.reg_id', '=', 'sendbids.sender_id')
            ->where('status', '=', '1')
            ->get();
        // dd($biddetail);
        return view('developersendoffers')->with(compact('biddetail'));
    }





    public function collabteam(Request $request)
    {
        $user = session()->get('USER_id');

        $data = DB::table('teamrequests')
            // ->join('registrations', 'registrations.reg_id', '=', 'teamrequests.sender_id')
            ->where(['reciever_id' => $user, 'status' => 1])
            ->get();
        // dd($data);
        // ->where(['sender_id'=>$user , 'status'=>1])
        return view('collabteam')->with(compact('data'));
    }

    public function collaborationwork(Request $request)
    {
        $user = session()->get('USER_id');

        // $eve= $request->receiver_id;
        // dd($eve);
        // dd($user);
        $data = DB::table('ratings')
            // ->join('registrations', 'registrations.reg_id', '=', 'ratings.sender_id')
            ->where('sender_Id', '!=', $user)->get();
        // dd($data);
        return view('collaborationwork')->with(compact('data'));
    }

    public function collaborationworkcheck(Request $request)
    {
        $user = session()->get('USER_id');
        $data = DB::table('ratings')
            ->where(['reciever_id' => $user])->get();
            // ->join('registrations', 'registrations.reg_id', '=', 'ratings.sender_id')->get();
        return view('collaborationworkclient')->with(compact('data'));
    }


    public function getidbyid(Request $request)
    {
        $user = session()->get('USER_id');
        // dd($user);

        $home =   session()->put(['UserTwo' => $user]);
        $usertwo =   session()->get('UserTwo');
        // dd($usertwo);
        $name = DB::table('projects')->where('worj_with', $usertwo)->get();







        // $getid = $request->reg_id;

        // $jobname = $request->p_name;
        $dev = "";
        // dd($jobname);
        // dd($pid);
        // $bidshow = project::where('worj_with', $getid)->get();
        foreach ($name as $shows) {
            $dev = $shows->p_name;
        }
        // dd($dev);

        $bidshowone = registration::where(['role' => 2, 'skillset' => $dev])->get();
        // dd($bidshowone);

        return view('bidpage', compact('bidshow', 'bidshowone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sendbid  $sendbid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sendbid $sendbid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sendbid  $sendbid
     * @return \Illuminate\Http\Response
     */
    public function destroy(sendbid $sendbid)
    {
        //
    }
}
