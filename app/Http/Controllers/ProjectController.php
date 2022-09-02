<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\bidnotification;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postproject(Request $request)
    {
        $request->validate([
            'projectname' => 'required',
            'projectdis' => 'required',
            'projectbud' => 'required',
            'projectdur' => 'required',
            'p_image' => 'required',
        ]);
        // return $request;
        $register = new project();
        $register->p_id = $request['p_id'];
        $register->p_name = $request['projectname'];
        $register->p_discription = $request['projectdis'];
        $register->p_budget = $request['projectbud'];
        $register->p_duration = $request['projectdur'];
        if ($request->file('p_image')) {
            $file = $request->file('p_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/Image'), $filename);
            $register['p_image'] = $filename;
        }
        $res = $register->save();
        // return redirect('/postProject');

        return redirect('/allproject')->with('success', 'Your Job Have Posted!');
    }




    public function showprojecttoclient(Request $request)
    {
        // $id = $request->input('p_id');
        $id = $request->id;
        $user = session()->get('USER_id');
        // dd($user);
        // dd($id);
        $detailsjob = DB::table('projects')->where(['p_id' => $user])->get();



        $bidid = DB::table('sendbids')->where(['reciever_id'=> $user])
            ->get();
        // dd($bidid);
        // $detailsjobid = DB::table('registrations')->get();
        return view('projectshowtoclient')->with(compact('detailsjob', 'bidid'));
    }



    public function showprojectstodeveloper(Request $request)
    {
        // $id = $request->p_id;
        // dd($id);

        $detailsjob = DB::table('projects')->get();
        $detailsjobid = DB::table('registrations')->get();
        return view('projectshowtodeveloper')->with(compact('detailsjob', 'detailsjobid'));
    }


    public function bidshow(Request $request, $p_id)
    {

        // $user = registration::all();

        $user = session()->get('USER_id');

        // $home =   session()->put(['UserTwo' => $user->reg_id]);
        // $usertwo =   session()->get('UserTwo');
        // dd($usertwo);
        // $name=DB::table('projects')->where('worj_with', $usertwo)->get();


        $p_id = $request->id;
        // dd($p_id);
        $jobname = $request->p_name;
        $dev = "";
        $devone = "";

        // dd($jobname);
        // dd($pid);
        $bidshow = project::where('id', $p_id)->get();
        // dd($bidshow);
        foreach ($bidshow as $shows) {
            $dev = $shows->p_name;
            $devone = $shows->p_id;
        }
        // dd($dev);
        // if ($user != session()->get('USER_id')) {



        $bidshowone = registration::where(['role' => 2, 'skillset' => $dev])->Where('reg_id', '!=', $user)->get();
        // }
        // dd($bidshowone);


        return view('bidpage', compact('bidshow', 'bidshowone'));
    }


    public function bidid(Request $request)
    {

        // dd($value);
        $bid = DB::table('sendbids')
            ->get();
        return view('projectshowtoclient')->with(compact('bid'));
    }


    public function viewbids(Request $request, $p_name)
    {

        // $value = $request->p_name;
        // dd($value);

        $table = DB::table('sendbids')->get();
        // dd($table);
        $bid = DB::table('sendbids')
            ->join('registrations', 'sendbids.sender_id', '=', 'registrations.reg_id')
            ->where(['sendbids.bid_job_name' => $p_name])->get();
        // dd($bid);
        return view('viewbids')->with(compact('bid', 'table'));
    }











    // public function showprojectajax(Request $res)
    // {


    //     // $detailsjob = DB::table('projects')->get();
    //     // $detailsjobid = DB::table('registrations')->get();

    //     $data = DB::table('projects')->get();

    //     // dd($data);
    //     //$data = Student::all();
    //     $output = '';
    //     foreach ($data as $item) {
    //         $output .=  "<tr>
    //         <td>" . $item->date('M d,Y', strtotime($item->created_at)) . "</td>
    //         <td>" . $item->$item->p_name . "</td>
    //         <td>" . $item->$item->p_discription . "</td>
    //         <td>" . $item->$item->p_budget . "</td>

    //         <td>" . $item->$item->p_duration . "</td>
    //         <td>" . $item->$item->p_image . "</td>

    //             </tr>";
    //     }
    //     echo $output;
    // }
}
