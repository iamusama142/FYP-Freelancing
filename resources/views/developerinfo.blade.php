@include('header')
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
                        <span class="ml-4 text-dark" style="font-weight: 600">
                            <div class="row">
                                <div class="col">
                                    @foreach ($rating as $rate)
                                        Your Total Rating is = {{ $rate->rating }}
                                    @endforeach
                                </div>
                            </div>
                        </span>

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
                                                <center> Your Image </center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($devdata as $value)
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
                                                        <center> <img
                                                                src="{{ url('public/Image/' . $value->user_image) }}"
                                                                style="height: 100px; width: 100px;"> </center>
                                                    </td>
                                                    <td>
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
</div>




@include('footer')
