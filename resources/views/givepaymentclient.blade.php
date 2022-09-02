@include('admin_header')


<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary" style="margin-top: 100px;">
                        <div class="card-header">
                            <h5 class="text-dark"> Give Rating & Reviews</h5>
                            {{-- @foreach ($giveratedata as $value) --}}
                            {{-- <h4>Give Review To {{$value->f_name}} {{$value->l_name}} </h4> --}}
                            {{-- <h3 class="text-dark" >Give Review To<span class="text-danger" style="font-weight: 800; text-decoration: underline;">  {{$value->f_name}} {{$value->l_name}}</span> </h3>
                            @endforeach --}}
                        </div>
                        <div class="card-body">
                            @foreach ($giveratedata as $value)
                                <form method="POST" action="/sendrate/{{ $value->id }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ Session::get('success') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif




                                    @if ($value->reciever_id == session()->get('USER_id'))
                                        {{-- <label for="">Sender Id</label> --}}
                                        <input type="hidden" value="{{ $value->reciever_id }}" name="send_id">

                                        {{-- <label for="">Receiver Id</label> --}}
                                        {{-- recieve_id --}}
                                        <input type="hidden" value="{{ $value->sender_id }}" name="recieve_id">



                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form4Example3">Post Your Review About
                                                Your Team Member</label>
                                            <textarea class="form-control" id="form4Example3" rows="4" name="review"></textarea>

                                        </div>


                                        <h6 class="text-dark">Give Rating To Your Team Member</h6>
                                        <input type="text" class="form-control" name="rating" required readonly>
                                        <div class="rateyo" id="rating" style="margin-bottom: 10px;"
                                            data-rateyo-rating="5" data-rateyo-num-stars="5" data-rateyo-score="3">
                                        </div>



                                        <span class='result'
                                            style="font-size: 20px; color:black; margin-left:7px;">0</span>
                                        <input type="hidden" name="rating">

                                        <div class="mt-3">
                                            <label for="">Select Your Payment Method</label>

                                            <select class="form-control" required id="ddlPassport" name="payment"
                                                value="{{ old('role') }}">
                                                <option value="">--Select--</option>
                                                <option value="1">Jazz Cash</option>
                                                <option value="2">Easy Paisa</option>
                                            </select>
                                            <span class="text-danger"> @error('role')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>


                                        <div style="margin-top: 20px;
                                        margin-bottom: 15px;display:none;"
                                            id="dvPassport">
                                            <label for="">Enter TID No</label>
                                            <input type="text" class="form-control" name="tid">
                                            <label for="">Enter Amount </label>

                                            <input type="text" class="form-control"
                                                placeholder="Enter Amount For Send" name="amount">

                                        </div>


                                        {{-- <div style="margin-top: 20px;
                                        margin-bottom: 15px; display:none;" id="cvPassport">
                                            <label for="">Enter TID No</label>
                                            <input type="text" class="form-control">
                                            <input type="text" class="form-control" placeholder="Enter Amount For Send">


                                        </div> --}}
                                    @endif
                            @endforeach

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Give Feedback
                                </button>
                            </div>
                            </form>

                            <div class="row">
                                <div class="form-group col-6">
                                </div>
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
        $("#ddlPassport").change(function() {
            if ($(this).val() == "1") {
                $("#dvPassport").show();
                $("#cvPassport").show();

            } else {
                $("#dvPassport").show();
                $("#cvPassport").hide();

            }
        });
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
</script>


@include('admin_footer')
