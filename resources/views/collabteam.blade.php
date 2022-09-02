@include('header')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">

                                {{-- @foreach ($bid as $custeam)
                                    @if ($custeam->reciever_id == session()->get('USER_id'))
                                        <h4>Bids Of Job (<span class="text-danger">{{ $custeam->bid_job_name }}
                                            </span>) </h4>
                                    @endif
                                @break
                            @endforeach --}}
                            </h4>
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
                                            {{-- <th>
                                                <center> Request Sender</center>
                                            </th> --}}
                                            <th>
                                                <center> Job Name </center>
                                            </th>
                                            <th>
                                                <center> Job Discription </center>
                                            </th>

                                            <th>
                                                <center> Project Deadline </center>
                                            </th>

                                            <th>
                                                <center> Submit Your Work </center>
                                            </th>




                                            {{-- <th>  <center> Bid Sender </center>  </th> --}}
                                            {{-- <th>  <center> Project Deadline </center>  </th>
                                            <th>  <center>Status</center>  </th> --}}

                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach ($data as $custeam)
                                            @if ($custeam->reciever_id == session()->get('USER_id'))
                                                <tr>
                                                    <td>
                                                        <center>
                                                            {{ date('M d,Y', strtotime($custeam->created_at)) }}
                                                        </center>
                                                    </td>
                                                    {{-- <td>
                                                        <center>{{$custeam->f_name}} {{$custeam->l_name}}
                                                        </center>
                                                    </td> --}}
                                                    <td>
                                                        <center> {{ $custeam->project_name }}</center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $custeam->project_desscription }}</center>
                                                    </td>

                                                    <td>
                                                        <center> {{ $custeam->deadline }}</center>
                                                    </td>

                                                    <td>
                                                        <a href="/submityourwork/{{ $custeam->id }}"
                                                            class="btn btn-danger text-white" id="btnSubmit">Submit Your
                                                            Work</a>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        $('#btnSubmit').on('click', function() {
            // alert("The paragraph was clicked.");
            var mybutton = $("#btnSubmit");
            if (mybutton) {
                $(this).prop('disabled', true);
                $(mybutton).click();
            }
        });
    });
</script>



@include('admin_footer')
