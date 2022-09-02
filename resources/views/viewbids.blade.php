@include('admin_header')

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">

                                @foreach ($bid as $custeam)
                                    @if ($custeam->reciever_id == session()->get('USER_id'))
                                        <h4>Bids Of Job (<span class="text-danger">{{ $custeam->bid_job_name }}
                                            </span>) </h4>
                                    @endif
                                @break
                            @endforeach
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
                                        <th>
                                            <center> Sender Name </center>
                                        </th>
                                        <th>
                                            <center> Job Duration </center>
                                        </th>
                                        <th>
                                            <center> Job Budget </center>
                                        </th>

                                        <th>
                                            <center> Job Service BY Sender </center>
                                        </th>

                                        <th>
                                            <center> Action </center>
                                        </th>

                                        <th>
                                            <center> Reject Request </center>
                                        </th>


                                        {{-- <th>  <center> Bid Sender </center>  </th> --}}
                                        {{-- <th>  <center> Project Deadline </center>  </th>
                                            <th>  <center>Status</center>  </th> --}}

                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($bid as $custeam)
                                        @if ($custeam->reciever_id == session()->get('USER_id'))
                                            <tr>
                                                <td>
                                                    <center>
                                                        {{ date('M d,Y', strtotime($custeam->created_at)) }}
                                                    </center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->f_name }} {{ $custeam->l_name }}
                                                    </center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->bid_job_duration }}</center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->bid_job_budget }}</center>
                                                </td>

                                                <td>
                                                    <center> {{ $custeam->bid_job_service }}</center>
                                                </td>

                                                <td>
                                                    <center>

                                                        @if ($custeam->status == '0')
                                                            <a href="/status-update/{{ $custeam->id }}"
                                                                class="btn btn-success">Click Here To
                                                                Accept The Offer</a>
                                                        @elseif ($custeam->status == '2')
                                                            <a href="/status-update/{{ $custeam->id }}"
                                                                class="btn btn-danger text-white" disabled>Offer
                                                                Rejected</a>
                                                        @else
                                                            <a href="/status-update/{{ $custeam->id }}"
                                                                class="btn btn-success text-white" disabled>Offer
                                                                Accepted</a>
                                                        @endif
                                                    </center>
                                                    {{-- @foreach ($table as $val)
                                                        <input data-id="{{ $val->id }}" class="toggle-class"
                                                            type="checkbox" data-onstyle="success"
                                                            data-offstyle="danger" data-toggle="toggle"
                                                            data-on="Accept Offer" data-off="Reject Offer"
                                                            {{ $val->status ? 'checked' : '' }}>
                                                    @endforeach --}}



                                                </td>
                                                <td>
                                                    <center>
                                                        @if ($custeam->status == '0')
                                                            <a href="/reject-offer/{{ $custeam->id }}"
                                                                class="btn btn-success">Reject Offer</a>
                                                        @elseif ($custeam->status == '1')
                                                            <a href="/reject-offer/{{ $custeam->id }}"
                                                                class="btn btn-success text-white" disabled>Offer
                                                                Accepted</a>
                                                        @else
                                                            <a href="/reject-offer/{{ $custeam->id }}"
                                                                class="btn btn-danger text-white" disabled>You
                                                                Reject Offer</a>
                                                        @endif

                                                        {{-- <a href="/seebids/{{$custeam->bid_job_name}}/{{ $custeam->id }}"
                                                            class="btn btn-warning">Reject Request</a> --}}

                                                    </center>

                                                </td>

                                                {{-- <td>
                                             <center>  {{ $custeam->f_name }} {{$custeam->l_name}}  </center>
                                        </td> --}}
                                                {{-- <td>
                                             <center>  {{ $custeam->deadline }} </center>
                                        </td> --}}
                                                {{-- <td class="text-center">
                                            <input data-id="{{ $custeam->id }}"
                                                class="toggle-class form-check-input text-center" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="De-Active"
                                                {{ $custeam->status ? 'De-Active' : '' }}>
                                        </td> --}}
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
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var bid_status = $(this).data('id');

            $.ajax({

                type: "GET",

                dataType: "json",

                url: '/changeStatus',

                data: {
                    'status': status,
                    'bid_status': bid_status
                },

                success: function(data) {

                    console.log(data.success)

                }

            });

        });
    });
</script>



@include('admin_footer')
