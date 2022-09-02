<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\sendbid;
use App\Models\teamrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitproject($id)
    {
        $projectdetails = DB::table('teamrequests')->where('id', $id)->get();
        return view('submitwork')->with(compact('projectdetails'));
    }


    public function submitprojectclient(Request $request, $id)
    {
        $user = session()->get('USER_id');
        $projectdetails = DB::table('sendbids')->where('id', $id)->get();
        return view('submityourworkclient')->with(compact('projectdetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function submitwork(Request $request, $id)
    {
        // dd($id);
        // $user = session()->get('USER_id');
        // dd($user);
        $request->validate([
            'projectname' => 'required',
            'projectdur' => 'required',
            'work' => 'required',
            'projectbud' => 'required',
            'projectsubmitdate' => 'required',
            'completetaskimage' => 'required',


        ]);

        $register = new rating();
        $register->sendprojectname = $request->projectname;
        $register->sender_id = $request->psndid;
        $register->reciever_id = $request->precid;
        $register->sendprojectduration = $request->projectdur;
        $register->sendwork = $request->work;
        $register->sendprojectbudget = $request->projectbud;
        $register->projectsubmitdate = $request->projectsubmitdate;
        if ($request->file('completetaskimage')) {
            $file = $request->file('completetaskimage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $register['completetaskimage'] = $filename;
        }
        $res = $register->save();

        $delete = sendbid::where('id', $id)->delete();
        // $deleteteamreq = teamrequest::where('sender_id', $id)->delete();

        // dd($delete);


        return redirect('/sendOffers');
    }

    public function submitworkteam(Request $request, $id)
    {
        // dd($id);
        // $user = session()->get('USER_id');
        // dd($user);
        $register = new rating();
        $register->sendprojectname = $request->projectname;
        $register->sender_id = $request->psndid;
        $register->reciever_id = $request->precid;
        $register->sendprojectduration = $request->projectdur;
        $register->sendwork = $request->work;
        $register->projectdeadline = $request->projectdeadline;
        $register->projectsubmitdate = $request->projectsubmitdate;
        if ($request->file('completetaskimage')) {
            $file = $request->file('completetaskimage');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $register['completetaskimage'] = $filename;
        }
        $res = $register->save();

        // $delete = sendbid::where('id', $id)->delete();
        $deleteteamreq = teamrequest::where('id', $id)->delete();

        // dd($delete);


        return redirect('/collabteam');
    }

    public function seeteam(Request $request)
    {
        $seedteam = DB::table('sendbids')
            ->join('registrations', 'registrations.reg_id', '=', 'sendbids.sender_id')
            ->where('status', 1)
            ->get();
        return view('yourteam')->with(compact('seedteam'));
        // dd($projectdetails);
    }


    public function giverate(Request $request, $id)
    {
        // $recieve = $request->reciever_id;
        // dd($recieve);
        //     $user= session()->get('USER_id');
        // dd($user);
        // dd($recieve);
        // $rate=DB::table('sendbids')->get();
        $giveratedata = DB::table('ratings')
            // ->join('registrations', 'registrations.reg_id', '=', 'ratings.sender_id')
            ->where('id', '=', $id)
            ->get();
        // dd($giveratedata);
        return view('givepayment')->with(compact('giveratedata'));
        // dd($projectdetails);
    }

    public function giverateclient(Request $request, $id)
    {
        // $recieve=$request->reciever_id;
        // dd($recieve);
        // $rate=DB::table('sendbids')->get();
        $giveratedata = DB::table('ratings')
            // ->join('registrations', 'registrations.reg_id', '=', 'ratings.sender_id')
            ->where('id', '=', $id)
            ->get();
        // dd($giveratedata);
        return view('givepaymentclient')->with(compact('giveratedata'));
        // dd($projectdetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(rating $rating)
    {
        //
    }
}
