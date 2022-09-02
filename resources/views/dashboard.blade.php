@include('admin_header')

{{--
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Your Details</h4>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>
                                                <center> Name </center>
                                            </th>
                                            <th>
                                                <center> Email </center>
                                            </th>
                                            <th>
                                                <center> Education </center>
                                            </th>
                                            <th>
                                                <center> Address </center>
                                            </th>
                                            <th>
                                                <center> Role </center>
                                            </th>
                                            <th>
                                                <center> Skill Set </center>
                                            </th>
                                            <th>
                                                <center> About You </center>
                                            </th>

                                            <th>
                                                <center>Your Image</center>
                                            </th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($clientdata as $value)
                                            @if ($value->id == session()->get('USER_id'))
                                                <tr>

                                                    <td>
                                                        <center> {{ $value->f_name }} {{ $value->l_name }} </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->email }} </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->education }} </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->address }} </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            @if ($value->role == '1')
                                                                You Are Client
                                                            @elseif ($value->role == '2')
                                                                Your Are Developer
                                                            @endif
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->skillset }} </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->aboutyou }} </center>
                                                    </td>
                                                    <td>
                                                        <center>  <img src="{{ url('public/Image/' . $value->user_image) }}"
                                                           style="height: 100px; width: 100px;">  </center>
                                                   </td>
                                            @endif
                                            </tr>
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
</div> --}}




@include('admin_footer')
