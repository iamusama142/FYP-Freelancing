@include('header')


<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Send Your Work To Your Request Member</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($projectdetails as $pdet)

                            <form method="POST" action="/sendworkteam/{{$pdet->id}}" enctype="multipart/form-data">
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

                                {{-- @foreach ($projectdetails as $pdet) --}}
                                    {{-- @if ($pdet->sender_id == session()->get('USER_id')) --}}
                                        <div class="row">

                                            <div class="form-group col-6">
                                                <label for="projectname">Project Name</label>
                                                <input id="projectname" type="text" value="{{ $pdet->project_name }}"
                                                    class="form-control" name="projectname"
                                                    value="{{ old('projectname') }}" readonly>
                                                <span class="text-danger"> @error('projectname')
                                                        {{ $message }}
                                                    @enderror </span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="psndid" class="form-control"
                                            value="{{ $pdet->reciever_id }}">
                                        <input type="hidden" name="precid" class="form-control"
                                            value="{{ $pdet->sender_id }}">



                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="projectdur">Project Discription</label>
                                                <input id="projectdur" type="text" class="form-control"
                                                    name="projectdur" value="{{ $pdet->project_desscription }}"
                                                    value="{{ old('projectdur') }}" readonly>

                                                <span class="text-danger"> @error('projectdur')
                                                        {{ $message }}
                                                    @enderror </span>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="work" class="d-block">Tell About Your Work</label>
                                                <input id="work" type="text" class="form-control pwstrength"
                                                    data-indicator="pwindicator" name="work" required>
                                                <span class="text-danger"> @error('work')
                                                        {{ $message }}
                                                    @enderror </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label for="projectbud">Project Deadline</label>
                                                <input id="projectbud" type="text" class="form-control"
                                                    name="projectdeadline" value="{{ $pdet->deadline }}"
                                                    value="{{ old('projectbud') }}" readonly>

                                                <span class="text-danger"> @error('projectbud')
                                                        {{ $message }}
                                                    @enderror </span>
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="projectsubmitdate" class="d-block">Project Submit
                                                    Date</label>
                                                <input id="projectsubmitdate" type="date"
                                                    class="form-control pwstrength" data-indicator="pwindicator"
                                                    name="projectsubmitdate" required>

                                                <span class="text-danger"> @error('projectsubmitdate')
                                                        {{ $message }}
                                                    @enderror </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="Abstract">Choose Image*
                                                </label>
                                                <input type="file" class="form-control" id="completetaskimage"
                                                    name="completetaskimage" value="{{ old('completetaskimage') }}">
                                                <span class="text-danger" required>
                                                    @error('completetaskimage')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                Send To Your Owener
                                            </button>
                                        </div>
                                    {{-- @endif --}}
                            </form>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>





@include('footer')
