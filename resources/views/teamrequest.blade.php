@include('header')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Team Requests</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="my-form">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">
                                                #
                                            </th> --}}
                                            <th>
                                                <center> Date </center>
                                            </th>
                                            <th>
                                                <center> Sender Name </center>
                                            </th>
                                            <th>
                                                <center> Project Name </center>
                                            </th>
                                            <th>
                                                <center> Project Deadline </center>
                                            </th>
                                            <th>
                                                <center>Status</center>
                                            </th>
                                            <th>
                                                <center>Reject Request</center>
                                            </th>

                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($customteam as $custeam)
                                            @if ($custeam->reciever_id == session()->get('USER_id'))
                                            <tr>

                                                <td>
                                                    <center>
                                                        {{ date('M d,Y', strtotime($custeam->created_at)) }}
                                                    </center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->f_name }} {{ $custeam->l_name }} </center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->project_name }} </center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->deadline }} </center>
                                                </td>

                                                <td>
                                                    <center>

                                                        @if ($custeam->status == '0')
                                                            <a href="/status-update-team/{{ $custeam->id }}"
                                                                class="btn btn-success">Click Here To Accept
                                                                The Request</a>
                                                        @elseif ($custeam->status == '2')
                                                            <a href="/status-update-team/{{ $custeam->id }}"
                                                                class="btn btn-danger text-white" disabled>Request
                                                                Rejected</a>
                                                        @else
                                                            <a href="/status-update-team/{{ $custeam->id }}"
                                                                class="btn btn-success text-white" disabled>Request
                                                                Accepted</a>
                                                        @endif
                                                    </center>

                                                </td>

                                                <td>
                                                    <center>
                                                        @if ($custeam->status == '0')
                                                            <a href="/teamrequests/{{ $custeam->id }}"
                                                                class="btn btn-success">Reject Request</a>
                                                        @elseif ($custeam->status == '1')
                                                            <a href="/teamrequests/{{ $custeam->id }}"
                                                                class="btn btn-success text-white" disabled>Request
                                                                Accepted</a>
                                                        @else
                                                            <a href="/teamrequests/{{ $custeam->id }}"
                                                                class="btn btn-danger text-white" disabled>You
                                                                Reject Offer</a>
                                                        @endif



                                                    </center>

                                                </td>
                                            </tr>

                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>










@include('footer')
