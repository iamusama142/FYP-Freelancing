@include('header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Your Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>


                                            <th>
                                                <center> About You </center>
                                            </th>
                                            <th>
                                                <center> Your Role </center>
                                            </th>
                                            <th>
                                                <center> Your Skill-Set </center>
                                            </th>

                                        </tr>
                                    </thead>
                                    {{-- @php
                                        $i = 1;
                                    @endphp --}}
                                    <tbody>
                                        @foreach ($devdata as $value)
                                            @if ($value->id == session()->get('USER_id'))
                                                <tr>
                                                    {{-- <td>
                                                        {{ $i }}
                                                    </td> --}}
                                                    <td>
                                                        <center> {{ $value->aboutyou }} </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            @if ($value->role == '1')
                                                            You Are Client
                                                        @elseif ($value->role == '2')
                                                            Your Are Developer
                                                        @endif
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center> {{ $value->skillset }} </center>
                                                    </td>

                                                    {{-- @php
                                                        $i++;
                                                    @endphp --}}
                                            @endif
                                            </tr>
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




@include('footer')




