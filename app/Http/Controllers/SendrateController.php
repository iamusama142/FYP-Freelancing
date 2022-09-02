<?php

namespace App\Http\Controllers;

use App\Models\rating;
use App\Models\rejectofferbyclient;
use App\Models\sendbid;
use App\Models\sendrate;
use App\Models\teamrequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendrateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendrate(Request $request, $id)
    {

        $register = new sendrate();
        $register->sender_id = $request->send_id;
        $register->reciever_id = $request->recieve_id;
        $register->review = $request->review;
        $register->rating = $request->rating;
        $register->payment = $request->payment;
        $register->tid = $request->tid;
        $register->amount = $request->amount;
        $register->save();
        $delete = rating::where('id', $id)->delete();
        // dd($delete);
        return redirect('/collaborationworkcheck');
    }

    public function sendrateteam(Request $request, $id)
    {

        $register = new sendrate();
        $register->sender_id = $request->send_id;
        $register->reciever_id = $request->recieve_id;
        $register->review = $request->review;
        $register->rating = $request->rating;
        $register->payment = $request->payment;
        $register->tid = $request->tid;
        $register->amount = $request->amount;
        $register->save();
        $delete = rating::where('id', $id)->delete();
        // dd($delete);
        return redirect('/collaborationwork');
    }

    public function reject($id)
    {
        // dd($id);
        $getStatus = DB::table('sendbids')->select('status')->where('sender_id', '=', $id)->first();
        // dd($getStatus);
        // $getStatus = sendbid::select('status')->where('bid_job_name',$id)->all();

        if ($getStatus->status == '0') {
            $status = 2;
        } else {
            $status = 1;
        }
        // dd($status);
        $update = sendbid::where('sender_id', $id)->update(['status' => $status]);
        // dd($update);
        return redirect()->back();
    }
    public function rejectdatashow(Request $request)
    {
        $user = session()->get('USER_id');
        // dd($user);
        $showrejectdata = DB::table('sendbids')->where(['sender_id' => $user, 'status' => 2])->join('registrations', 'registrations.reg_id', 'sendbids.reciever_id')->get();
        return view('offerrejectbyclient')->with(compact('showrejectdata'));
    }

    public function rejectdatashowteamrequest(Request $request)
    {
        $user = session()->get('USER_id');
        // dd($user);
        $showrejectdatateam = DB::table('teamrequests')->where(['sender_id' => $user, 'status' => 2])->join('registrations', 'registrations.reg_id', 'teamrequests.reciever_id')->get();
        return view('requestrejectbyteam')->with(compact('showrejectdatateam'));
    }



    public function rejectteamrequest(Request $request, $id)
    {
        // dd($id);
        $getStatus = DB::table('teamrequests')->select('status')->where('sender_id', '=', $id)->first();
        // dd($getStatus);
        // $getStatus = sendbid::select('status')->where('bid_job_name',$id)->all();

        if ($getStatus->status == '0') {
            $status = 2;
        } elseif ($getStatus->status == '1') {
            $status = 2;
        }
        // dd($status);
        $update = teamrequest::where('sender_id', $id)->update(['status' => $status]);
        // dd($update);
        return redirect()->back();
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sendrate  $sendrate
     * @return \Illuminate\Http\Response
     */
    public function show(sendrate $sendrate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sendrate  $sendrate
     * @return \Illuminate\Http\Response
     */
    public function edit(sendrate $sendrate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sendrate  $sendrate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sendrate $sendrate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sendrate  $sendrate
     * @return \Illuminate\Http\Response
     */
    public function destroy(sendrate $sendrate)
    {
        //
    }
}
