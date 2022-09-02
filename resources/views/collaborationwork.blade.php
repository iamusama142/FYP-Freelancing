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
                                            <center> Project name </center>
                                        </th>

                                        <th>
                                            <center> Work Details </center>
                                        </th>

                                        <th>
                                            <center>Project Deadline </center>
                                        </th>

                                        <th>
                                            <center> Project Submit Date </center>
                                        </th>

                                        <th>
                                            <center> Project Image </center>
                                        </th>

                                        <th>
                                            <center> Send Payment </center>
                                        </th>



                                    </tr>
                                </thead>

                                <tbody>


                                    @foreach ($data as $custeam)
                                        @if ($custeam->reciever_id == session()->get('USER_id'))
                                            <tr>


                                                <td>
                                                    <center> {{ $custeam->sendprojectname }}</center>
                                                </td>


                                                <td>
                                                    <center> {{ $custeam->sendwork }}</center>
                                                </td>
                                                <td>
                                                    <center> {{ $custeam->projectdeadline }}</center>
                                                </td>

                                                <td>
                                                    <center> {{ $custeam->projectsubmitdate }}</center>
                                                </td>



                                                <td>
                                                    <center>  <img src="{{ url('public/Image/' . $custeam->completetaskimage) }}"
                                                       style="height: 100px; width: 100px;">  </center>
                                               </td>

                                               <td>
                                                <center> <a href="giverate/{{$custeam->id}} " class="btn btn-dark text-white">Give Payment & Rating</a> </center>
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
