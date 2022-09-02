<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;
use Illuminate\Support\Facades\DB;
class ChatController extends Controller
{
    public function chatApp(Request $request)
    {

        $name= session()->get('USER_id');
// dd($name);
        $users = DB::table('sendbids')->where('reciever_id','=',$name)->Where('status','1')->join('registrations','registrations.reg_id','sendbids.sender_id')->get();
        // $users = DB::table('registrations')->where(['status'=>1])->get();
        // dd($users);

        session()->put(['User' => $users]);
        $check = session()->get('User');
        // dd($check);
        return view('chatpage')->with(compact('users', 'check'));
    }


    public function chatApptwo($id)
    {
       $fromuser= session()->get('USER_id');


        $home =   session()->put(['UserTwo' => $id]);
        $usertwo =   session()->get('UserTwo');
// dd($usertwo);
$name=DB::table('registrations')->where('reg_id', $fromuser)->get();

        // //  $checktwo = session()->get('USRE_id');
        // if (isset($fromuser)) {

        //     $userName = DB::table('registrations')->where('reg_id', $fromuser)->get();
        // } else {
        //     $userName = DB::table('registrations')->where('reg_id',$id)->get();
        //     $_SESSION["toUser"] = $userName["Id"];
        //     $home =   session()->put(['UserThree' => $userName]);
        //     $checktwo = session()->get('UserThree');
        //     $userName = $checktwo->id;
        // }
// dd($userName);
        // $usersone = DB::table('messages')->get();
        // // dd($usersone);
        // session()->put(['Userone' => $usersone]);
        // dd(session()->get('Userone')[0]->ToUser);
        // dd(session()->get('Userone'));
        if (isset($fromuser)) {


             $chats = DB::table('messages')->where(['FromUser' => $fromuser, 'ToUser' => $id])->orWhere('FromUser',$id)->where('ToUser',$fromuser)->get();
        } else {
            $chats = DB::table('messages')->where(['FromUser' => $fromuser, 'ToUser' => $id])->orWhere(['ToUser' => $fromuser, 'FromUser' => $id])->get();

        }






// dd($chats);
        // $userstwo = DB::table('registrations')->get();
        // session()->put(['Userdata' => $userstwo]);
        // $checktwo = session()->get('Userdata');
        // dd($checktwo);

        return view('chatboxone')->with(compact('fromuser', 'chats', 'id', 'name',));
    }

    public function sendmessage(Request $request)
    {

        $register = new message();
        $register->FromUser = $request->fromuser;
        $register->ToUser = $request->toUser;
        $register->Messages = $request->message;
        // return $request;
        $register->save();
        return redirect()->back();
    }































    public function chatAppdeveloper(Request $request)
    {

        $name= session()->get('USER_id');
        // dd($name);
        $usersone = DB::table('teamrequests')->where('reciever_id','!=',$name)->Where('status','=','1')->join('registrations','registrations.reg_id','teamrequests.reciever_id')->get();
// dd($usersone);
        $users = DB::table('sendbids')->where('reciever_id','!=',$name)->Where('status','=','1')->join('registrations','registrations.reg_id','sendbids.reciever_id')->get();
// dd($users);

$userstwo = DB::table('teamrequests')->where('sender_id','!=',$name)->Where('status','=','1')->join('registrations','registrations.reg_id','teamrequests.sender_id')->get();
// dd($userstwo);
    //    dd($users);

        // $users = DB::table('registrations')->where(['status'=>1])->get();
        // dd($users);

        session()->put(['User' => $users]);
        $check = session()->get('User');
        // dd($check);
        return view('chatpagedeveloper')->with(compact('users', 'check','userstwo','usersone'));
    }


    public function chatApptwodeveloper($id)
    {
       $fromuser= session()->get('USER_id');


        $home =   session()->put(['UserTwo' => $id]);
        $usertwo =   session()->get('UserTwo');

$name=DB::table('registrations')->where('reg_id', $fromuser)->get();

        // //  $checktwo = session()->get('USRE_id');
        // if (isset($fromuser)) {

        //     $userName = DB::table('registrations')->where('reg_id', $fromuser)->get();
        // } else {
        //     $userName = DB::table('registrations')->where('reg_id',$id)->get();
        //     $_SESSION["toUser"] = $userName["Id"];
        //     $home =   session()->put(['UserThree' => $userName]);
        //     $checktwo = session()->get('UserThree');
        //     $userName = $checktwo->id;
        // }
// dd($userName);
        // $usersone = DB::table('messages')->get();
        // // dd($usersone);
        // session()->put(['Userone' => $usersone]);
        // dd(session()->get('Userone')[0]->ToUser);
        // dd(session()->get('Userone'));
        if (isset($fromuser)) {


             $chats = DB::table('messages')->where(['FromUser' => $fromuser, 'ToUser' => $id])->orWhere('FromUser',$id)->where('ToUser',$fromuser)->get();
        } else {
            $chats = DB::table('messages')->where(['FromUser' => $fromuser, 'ToUser' => $id])->orWhere(['ToUser' => $fromuser, 'FromUser' => $id])->get();

        }






// dd($chats);
        // $userstwo = DB::table('registrations')->get();
        // session()->put(['Userdata' => $userstwo]);
        // $checktwo = session()->get('Userdata');
        // dd($checktwo);

        return view('chatboxtwodeveloper')->with(compact('fromuser', 'chats', 'id', 'name'));
    }



















}
