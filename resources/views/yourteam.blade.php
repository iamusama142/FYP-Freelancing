@include('admin_header')




{{--
@foreach ($seedteam as $value )
@if ($value->reciever_id == session()->get('USER_id'))

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-body">
              <center>
                  <h3 class="text-dark" >Work Done By <span class="text-danger" style="font-weight: 800; text-decoration: underline;">  {{$value->f_name}} {{$value->l_name}}</span> </h3>
              <img src="{{ url('public/Image/' . $value->completetaskimage) }}"  style="height: 450px; width: 750px;" class="img-responsive">

              </center>
          </div>
      </div>
    </div>
  </div>



@endif
@endforeach --}}







<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Your Team Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">
                                                #
                                            </th> --}}
                                            <th>Project Name</th>

                                            <th>Worker Name</th>

                                            <th>Work Budget</th>
                                            <th>Work Duration</th>
                                            <th>Developer Service</th>

                                            {{-- <th>Chat Now</th> --}}



                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($seedteam as $value)
                                            @if ($value->reciever_id == session()->get('USER_id'))
                                                <tr>
                                                    {{-- <td>
                                                        {{ $value->p_id }}
                                                    </td> --}}
                                                    <td>{{ $value->bid_job_name}}</td>

                                                    <td>
                                                        {{ $value->f_name }} {{$value->l_name}}
                                                    </td>
                                                    <td>
                                                        {{ $value->bid_job_budget }}
                                                    </td>
                                                    <td>
                                                        {{ $value->bid_job_duration }}
                                                    </td>
                                                    <td>
                                                        {{ $value->bid_job_service }}
                                                    </td>



                                                    {{-- <td>
                                                        <img src="{{ url('public/Image/' . $value->completetaskimage) }}"
                                                            style="height: 100px; width: 100px;">
                                                    </td> --}}

                                                    {{-- <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">See Work</button>
                                                        <img src="{{ url('public/Image/' . $value->completetaskimage) }}"
                                                            style="height: 100px; width: 100px;">
                                                    </td>

                                                    <td>
                                                      <a href="/giverate/{{$value->sender_id}}" class="btn btn-primary">Give Rate & Review</a>
                                                        <img src="{{ url('public/Image/' . $value->completetaskimage) }}"
                                                            style="height: 100px; width: 100px;">
                                                    </td> --}}

                                                    {{-- <td>
                                                        <a href="/chatpage/{{$value->sender_id}}" class="btn btn-primary">Chat Now</a>
                                                          <img src="{{ url('public/Image/' . $value->completetaskimage) }}"
                                                              style="height: 100px; width: 100px;">
                                                      </td> --}}

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


























@include('admin_footer')
