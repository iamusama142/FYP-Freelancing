@include('header')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-danger">Send Job Requests</h3>
                        </div>
                        <hr>
                        @if (session('insert'))
                            <div class="alert alert-info alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <center>
                                    {{ session('insert') }}
                                </center>
                            </div>
                        @endif
                        <div class="card-body">
                            <form action="/sendBid" method="POST">
                                @csrf


                                @foreach ($bidshow as $value)
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Job Name</label>
                                                    <input type="text" name="job_name" class="form-control"
                                                        value="{{ $value->p_name }}" readonly required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Job Budget</label>
                                                    <input type="text" name="job_budget"
                                                        placeholder="Enter Your Address" class="form-control"
                                                        value="{{ $value->p_budget }} $" readonly required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label>Job Duration</label>
                                                    <input type="text" name="job_duration" class="form-control"
                                                        value="{{ $value->p_duration }}" readonly required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Enter Service You Provide</label>
                                                    <input type="text" name="job_services"
                                                        placeholder="Enter Services That You Provide To Client"
                                                        class="form-control" required>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            {{-- <label for="Sender Id">Reciver Id</label> --}}
                                            <input type="hidden" name="reciever_id" class="form-control"
                                                value="{{ $value->p_id }}">
                                        </div>
                                    </div>
                                @endforeach

                                {{-- @foreach ($bidshowone as $bid) --}}
                                @if (session()->get('USER_id'))
                                    {{-- <label for="">Sender  Id</label> --}}
                                    <input class="form-control" type="hidden" name="sender_id"
                                        value="{{ session()->get('USER_id') }}">
                                @endif
                                {{-- @endforeach --}}






                                <span style="margin-left: 17px;">Working With:</span>
                                <label style="margin-left: 10px;" for="chkYes">
                                    <input type="radio" id="chkYes" name="work_with" />
                                    Team
                                </label>
                                <label style="margin-left: 10px;" for="chkNo">
                                    <input type="radio" value="0" id="chkNo" name="work_with" />
                                    Alone
                                </label>
                                <hr />



                                <div class="row">

                                    <div id="dvPassport" style="width: 18rem; display:none;">





                                        @foreach ($bidshowone as $val)
                                            <div class="card" style="padding: 0px;">

                                                <div class="card-body" style="padding: 0px;">
                                                    <img class="card-img-top"
                                                        src="{{ url('public/Image/' . $val->user_image) }}"
                                                        alt="Card image cap"
                                                        style="    height: 190px;
                                                            width: 288px;">
                                                    <h5 class="card-title"
                                                        style="margin-top: 10px;
                                                    padding-left: 10px;">
                                                        {{ $val->f_name }}
                                                        {{ $val->l_name }}
                                                    </h5>
                                                    <p class="card-text" style="padding-left: 10px;">
                                                        {{ $val->aboutyou }}</p>
                                                    <label for="" class="text-dark"
                                                        style="padding-left: 10px; margin-top:10px;">Deadline of
                                                        Project</label>
                                                    <input type="date" name="deadline" class="form-control">

                                                    <div style="margin-top: 15px;
padding-bottom: 15px;">
                                                        <input class="form-check-input list" type="checkbox"
                                                            value="{{ $val->reg_id }}" name="teamid"
                                                            style="margin-left: 103px;
    margin-top: 3px;
}"
                                                            name="work_with" id="gridCheck">
                                                        <label class="form-check-label" for="gridCheck"
                                                            style=" padding-left: 11px;">
                                                            Add In Team
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>



                                        @endforeach
                                    </div>
                                </div>

                                <button class=" container btn btn-dark mb-3" type="submit"
                                    value="submit">Submit</button>

                            </form>
                        </div>
                    </div>


                </div>



                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
                                integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script type="text/javascript">
                    $(function() {
                        $("input[name='work_with']").click(function() {
                            if ($("#chkYes").is(":checked")) {
                                $("#dvPassport").show();
                            } else {
                                $("#dvPassport").hide();
                            }
                        });

                        $('.list').on('change', function() {
                            $('.list').not(this).prop('checked', false);
                        });


                    });
                </script>

                @include('footer')
