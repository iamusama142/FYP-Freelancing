@include('admin_header')


<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            @foreach ($giveratedata as $value )
                            {{-- <h4>Give Review To {{$value->f_name}} {{$value->l_name}} </h4> --}}
                            <h3 class="text-dark" >Give Review To<span class="text-danger" style="font-weight: 800; text-decoration: underline;">  {{$value->f_name}} {{$value->l_name}}</span> </h3>
                            @endforeach
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/sendrate" enctype="multipart/form-data">
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




                                @foreach ($giveratedata as $value)
                                    @if ($value->reciever_id == session()->get('USER_id'))


{{-- <label for="">Receiver Id</label> --}}
                                    <input type="text" value="{{ $value->reciever_id }}" name="recieve_id">

                                    {{-- <label for="">Sender Id</label> --}}
                                    <input type="text" value="{{ $value->sender_id }}" name="send_id">



                                        <div class="form-outline mb-4">
                                            <textarea required class="form-control" id="form4Example3" rows="4" name="review"></textarea>
                                            <label class="form-label" for="form4Example3">Post Your Review About Your Team Member</label>
                                          </div>
                                          <h6 class="text-dark">Give Rating To Your Team Member</h6>
                                          <div class="rateyo" id= "rating" style="margin-bottom: 10px;"
                                          data-rateyo-rating="5"
                                          data-rateyo-num-stars="4"
                                          data-rateyo-score="3">
                                          </div>

                                     <span required class='result' style="font-size: 20px; color:black; margin-left:7px;">0</span>
                                     <input type="hidden" name="rating">
                                    @endif
                                    </tr>
                                @endforeach
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                       Send Feedback
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


$(document).ready(function () {

    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
});

</script>


@include('admin_footer')
