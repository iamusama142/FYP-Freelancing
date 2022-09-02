<?php

namespace App\Http\Controllers;

use App\Models\teamrequest;
use Illuminate\Http\Request;

class TeamrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendteamrequest()
    {
        $register = new teamrequest();
        $register->p_id = $request['p_id'];
        $register->p_name = $request['projectname'];
        $register->p_discription = $request['projectdis'];
        $register->p_budget = $request['projectbud'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function show(teamrequest $teamrequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function edit(teamrequest $teamrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teamrequest $teamrequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teamrequest  $teamrequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(teamrequest $teamrequest)
    {
        //
    }
}
