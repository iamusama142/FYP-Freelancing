@include('header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">
                            </h4>
                        </div>
                        <div class="card-body">

                            {{-- <h1>Welcome To Your Dashboard</h1> --}}
                            @foreach ($custom as $cus)
                                @if ($cus->id == session()->get('USER_id'))
                                    <center>
                                        <img class="img-thumbnail" src="{{ url('public/Image/' . $cus->user_image) }}"
                                            alt="Card image cap" style="    height: 200px;
                                    width: 200px; border-radius:50%; ">
                                        <h1 class="text-dark" style="padding-top:30px;">Welcome {{ $cus->f_name }}
                                            {{ $cus->l_name }} To Your Dashboard</h1>
                                        <p class="text-dark" style="font-weight: 600; font-size:20px;">
                                            {{ $cus->aboutyou }}</p>

                                    </center>
                                @endif
                            @endforeach

                            </center>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>




@include('footer')
