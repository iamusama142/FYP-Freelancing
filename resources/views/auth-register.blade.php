<!DOCTYPE html>
<html lang="en">


<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register Your Self</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">


                                <h4 style="font-size: 25px;" class="text-underline">Register Your Self</h4>

                            </div>
                            <div class="card-body">
                                <form method="POST" action="/register" enctype="multipart/form-data">
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
                                    @if (Session::has('fail'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ Session::get('fail') }}
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif



                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <?php $posts = App\Models\registration::latest()->first('reg_id');
                                            $count = App\Models\registration::all()->count();
                                            ?>
                                            <?php
                                               if($count==0)
                                                    {
                                                            ?>
                                            <input type="hidden" name="reg_id" class="form-control"
                                                id="formGroupExampleInput" placeholder="" value="1" readonly>

                                            <?php
                                        }
    else {
        ?>
                                            <input type="hidden" name="reg_id" class="form-control"
                                                id="formGroupExampleInput" placeholder="Voucher Number"
                                                value="{{ $posts->reg_id + 1 }}" readonly>
                                            <?php
                                        }
                                            ?>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">First Name</label>
                                            <input id="frist_name" type="text" class="form-control" name="first_name"
                                                autofocus value="{{ old('first_name') }}">
                                            <span class="text-danger"> @error('first_name')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" type="text" class="form-control" name="last_name"
                                                value="{{ old('last_name') }}">
                                            <span class="text-danger"> @error('last_name')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                value="{{ old('email') }}">

                                            <span class="text-danger"> @error('email')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="password">

                                            <span class="text-danger"> @error('password')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="education" class="d-block">Education</label>
                                            <input id="education" type="text" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="education"
                                                value="{{ old('education') }}">
                                            <span class="text-danger"> @error('education')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="address" class="d-block">Address</label>
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ old('address') }}">
                                            <span class="text-danger"> @error('address')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="exampleFormControlSelect1">Register As</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="role"
                                                value="{{ old('role') }}">
                                                <option value="">--Select--</option>
                                                <option value="1">Client</option>
                                                <option value="2">Developer</option>
                                            </select>
                                            <span class="text-danger"> @error('role')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="skill" class="d-block">Your Skill Set</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                name="skill" value="{{ old('skill') }}" required>
                                                <option value="">--Select--</option>
                                                <option value="Web">Web</option>
                                                <option value="Android">Android</option>
                                                <option value="Flutter">Flutter</option>
                                                <option value="Laravel">Laravel</option>
                                            </select>
                                            <span class="text-danger"> @error('skill')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="aboutyou" class="d-block">Tell Us About You</label>
                                            <input id="aboutyou" type="text" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="aboutyou"
                                                value="{{ old('aboutyou') }}">
                                            <span class="text-danger"> @error('aboutyou')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="user_image">Choose Image*
                                                </label>
                                                <input type="file" class="form-control" id="user_image" name="user_image"
                                                    value="{{ old('user_image') }}">
                                                <span class="text-danger">
                                                    @error('user_image')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Already Registered? <a href="/login">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->

</html>
