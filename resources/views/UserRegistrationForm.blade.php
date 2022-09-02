<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
        select {
            background: none;
            outline: none;
            border: none;
            line-height: 1;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        .alert {
            padding: 20px;
            background-color: #72dd5c;
            color: white;
            border-radius: 30px;
            margin-bottom: 20px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/userstyle.css') }}" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="/login" class="sign-in-form">
                    @csrf


                    @if (Session::has('success'))
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Congratulations !</strong> {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('fail') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h2 class="title">Login To Your Account</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" name="email" value="{{ old('email') }}"
                            required />
                        <span class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required />
                        <span class="text-danger"> @error('password')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <input type="submit" value="Login" class="btn solid" />

                </form>
                <form method="POST" action="/register" enctype="multipart/form-data" class="sign-up-form">
                    @csrf



                    <?php $posts = App\Models\registration::latest()->first('reg_id');
                    $count = App\Models\registration::all()->count();
                    ?>
                    <?php
               if($count==0)
                    {
                            ?>
                    <input type="hidden" name="reg_id" class="form-control" id="formGroupExampleInput" placeholder=""
                        value="1" readonly>

                    <?php
        }
else {
?>
                    <input type="hidden" name="reg_id" class="form-control" id="formGroupExampleInput"
                        placeholder="Voucher Number" value="{{ $posts->reg_id + 1 }}" readonly>
                    <?php
        }
            ?>


                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="First Name" name="first_name"
                            value="{{ old('first_name') }}" required />
                        <span class="text-danger"> @error('first_name')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}"
                            required />
                        <span class="text-danger"> @error('last_name')
                                {{ $message }}
                            @enderror </span>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                            required />
                        <span class="text-danger"> @error('email')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" required />
                        <span class="text-danger"> @error('password')
                                {{ $message }}
                            @enderror </span>
                    </div>




                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" placeholder="Address" name="address" value="{{ old('address') }}"
                            required />
                        <span class="text-danger"> @error('address')
                                {{ $message }}
                            @enderror </span>
                    </div>



                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="text" placeholder="About You" name="aboutyou" value="{{ old('aboutyou') }}"
                            required />
                        <span class="text-danger"> @error('aboutyou')
                                {{ $message }}
                            @enderror </span>
                    </div>
                    <label for="">Choose Your Image</label>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>

                        <input type="file" id="user_image" name="user_image" value="{{ old('user_image') }}"
                            required />
                        <span class="text-danger"> @error('aboutyou')
                                {{ $message }}
                            @enderror </span>
                    </div>

                    <div>
                        <label for="">Select Your Role</label>

                        <select id="ddlPassport" name="role" value="{{ old('role') }}">
                            <option value="">--Select--</option>
                            <option value="1">Client</option>
                            <option value="2">Developer</option>
                        </select>
                        <span class="text-danger"> @error('role')
                                {{ $message }}
                            @enderror </span>
                    </div>

                    <div style="margin-top: 20px;
                    margin-bottom: 15px;display:none;"
                        id="dvPassport">
                        <label for="">Your Level</label>
                        <select name="education" value="{{ old('education') }}">
                            <option value="">--Select--</option>
                            <option value="Fresh">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Expert">Expert</option>

                        </select>

                    </div>




                    <div style="margin-top: 20px;
                    margin-bottom: 15px; display:none;"
                        id="cvPassport">
                        <label for="">Skill Set</label>
                        <select name="skill" value="{{ old('skill') }}">
                            <option value="">--Select--</option>
                            <option value="Web">Web</option>
                            <option value="Android">Android</option>
                            <option value="Flutter">Flutter</option>
                            <option value="Laravel">Laravel</option>
                        </select>

                    </div>

                    <input type="submit" class="btn" value="Sign up" />

                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Signup and Discover a Great Amount of New Opportunities
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="{{ asset('assets/indeximg/signup1.svg') }}" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Welcome Back! Signin To Access Your Account Of Developer Freelance Platform
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="{{ asset('assets/indeximg/login1.svg"') }} class=" image" alt="" />
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/app.js') }}"></script>
</body>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $("#ddlPassport").change(function() {
            if ($(this).val() == "2") {
                $("#dvPassport").show();
                $("#cvPassport").show();

            } else {
                $("#dvPassport").hide();
                $("#cvPassport").hide();

            }
        });
    });
</script>





</html>
