{{-- @include('admin_header') --}}
@extends('master')
@section('content')
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Post A Project</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/postProject" enctype="multipart/form-data">
                                    @csrf
                                    @if (Session::has('success'))
                                        <div class="alert">
                                            <span class="closebtn"
                                                onclick="this.parentElement.style.display='none';">&times;</span>
                                            <strong>Congratulations !</strong> {{ Session::get('success') }}
                                        </div>
                                    @endif

                                    @foreach ($clientiddata as $value)
                                        @if ($value->id == session()->get('USER_id'))
                                            <input type="hidden" value="{{ $value->id }}" name="p_id">
                                        @endif
                                        </tr>
                                    @endforeach
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="projectname">Project Type</label>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                value="{{ old('projectname') }}" name="projectname" required>
                                                <option>--Select--</option>
                                                <option value="Web">Web</option>
                                                <option value="Android">Android</option>
                                                <option value="Flutter">Flutter</option>
                                                <option value="Laravel">Laravel</option>
                                            </select>

                                            <span class="text-danger"> @error('projectname')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="projectname">Project Discription</label>
                                            <input id="projectdis" type="text" class="form-control" name="projectdis"
                                                value="{{ old('projectdis') }}" required>
                                            <span class="text-danger"> @error('projectdis')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="projectbud">Project Budget</label>
                                            <input id="projectbud" type="number" class="form-control" name="projectbud"
                                                value="{{ old('projectbud') }}" required>

                                            <span class="text-danger"> @error('projectbud')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="projectdur" class="d-block">Project Duration</label>
                                            <input id="projectdur" type="text" class="form-control pwstrength"
                                                data-indicator="pwindicator" name="projectdur" required>

                                            <span class="text-danger"> @error('projectdur')
                                                    {{ $message }}
                                                @enderror </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="Abstract">Choose Image*
                                            </label>
                                            <input type="file" class="form-control" id="projectidea" name="p_image"
                                                value="{{ old('p_image') }}" required>
                                            <span class="text-danger">
                                                @error('p_image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Post A Project
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
