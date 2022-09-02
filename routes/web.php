<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SendbidController;
use App\Http\Controllers\SendrateController;
use App\Http\Controllers\TeamrequestController;
use phpDocumentor\Reflection\ProjectFactory;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});

Route::get('/userRegister', function () {
    return view('userRegistrationForm');
});

Route::get('/aboutus', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('userRegistrationForm');
});

Route::get('/clientdashboard', function () {
    return view('clientdashboard');
});

Route::get('/postProject', function () {
    return view('postproject');
});

Route::get('/developerdashboard', function () {
    return view('developerdashboard');
});

Route::get('/developerinfo', function () {
    return view('developerinfo');
});

Route::get('/aboutdeveloper', function () {
    return view('developeraboutus');
});

Route::get('/sendOffers', function () {
    return view('developersendoffers');
});

Route::get('/submityourwork', function () {
    return view('submitwork');
});

Route::get('/submityourworkclient', function () {
    return view('submityourworkclient');
});

Route::get('/yourteam', function () {
    return view('yourteam');
});

Route::get('/giverate', function () {
    return view('givepayment');
});

Route::get('/giverateclient', function () {
    return view('givepaymentclient');
});

Route::get('/chatpage', function () {
    return view('chatpage');
});

Route::get('/collabteam', function () {
    return view('collabteam');
});

Route::get('/collaborationwork', function () {
    return view('collaborationwork');
});

Route::get('/collaborationworkcheck', function () {
    return view('collaborationworkclient');
});

Route::post('/register', [RegistrationController::class, 'registration']);
Route::post('/login', [RegistrationController::class, 'login']);
Route::get('/clientdashboard', [RegistrationController::class, 'dashboard']);
Route::get('/developerdashboard', [RegistrationController::class, 'dashboardcustom']);
Route::post('/postProject', [ProjectController::class, 'postproject']);
Route::get('/allproject', [ProjectController::class, 'showprojecttoclient']);
Route::get('/allprojects', [ProjectController::class, 'showprojectstodeveloper']);
Route::get('/bidpage/{id}', [ProjectController::class, 'bidshow']);
Route::post('/sendBid', [SendbidController::class, 'bidsend']);
Route::get('/markasread/{id}', [SendbidController::class, 'markasread']);
Route::post('/sendteaminvite', [SendbidController::class, 'sendtam']);
Route::get('/developerinfo', [RegistrationController::class, 'developerdashboard']);
Route::get('/aboutdeveloper', [RegistrationController::class, 'developerabout']);
Route::get('/sendBid/{reg_id}', [TeamrequestController::class, 'sendteamrequest']);
Route::get('/sendOffers', [SendbidController::class, 'developersendoffers']);
Route::get('/postProject', [RegistrationController::class, 'getclientdata']);
Route::get('/dashboard', [RegistrationController::class, 'usernoti']);
Route::get('/bidpage', [SendbidController::class, 'getidbyid']);
Route::get('/submityourwork/{id}', [RatingController::class, 'submitproject']);
Route::get('/submityourworkclient/{id}', [RatingController::class, 'submitprojectclient']);
Route::post('/sendyouworktoowner/{id}', [RatingController::class, 'submitwork']);
Route::post('/sendworkteam/{id}', [RatingController::class, 'submitworkteam']);
Route::get('/yourteam', [RatingController::class, 'seeteam']);
Route::get('/giverate/{id}', [RatingController::class, 'giverate']);
Route::get('/giverateclient/{id}', [RatingController::class, 'giverateclient']);
Route::post('/sendrate/{id}', [SendrateController::class, 'sendrate']);
Route::post('/sendrateteam/{id}', [SendrateController::class, 'sendrateteam']);
Route::get('chatpage', [ChatController::class, 'chatApp']);
Route::get('chatpagedeveloper', [ChatController::class, 'chatAppdeveloper']);
Route::get('/chatpagetwo/{sender_id}', [ChatController::class, 'chatApptwo']);
Route::get('/chatpagetwodeveloper/{sender_id}', [ChatController::class, 'chatApptwodeveloper']);
Route::post('/sendmessage', [ChatController::class, 'sendmessage']);
Route::get('/teamrequests', [RegistrationController::class, 'teamrequest']);
Route::get('/status-update/{id}', [RegistrationController::class, 'changeStatus']);
Route::get('/status-update-team/{id}', [RegistrationController::class, 'changeteamStatus']);
Route::get('/seebids/{p_name}', [ProjectController::class, 'viewbids']);
Route::get('collabteam', [SendbidController::class, 'collabteam']);
Route::get('collaborationwork', [SendbidController::class, 'collaborationwork']);
Route::get('collaborationworkcheck', [SendbidController::class, 'collaborationworkcheck']);
Route::get('/reject-offer/{id}', [SendrateController::class, 'reject']);
Route::get('/teamrequests/{id}', [SendrateController::class, 'rejectteamrequest']);
Route::get('/rejectoffers', [SendrateController::class, 'rejectdatashow']);
Route::get('/teamreject', [SendrateController::class, 'rejectdatashowteamrequest']);
