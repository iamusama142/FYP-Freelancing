@include('header')


<!-- Main Content -->




<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Buyer Requests</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            {{-- <th class="text-center">
                                                #
                                            </th> --}}
                                            <th>  <center> Date </center>  </th>
                                            <th>  <center> Project Name </center>  </th>
                                            <th>  <center> Project Description </center>  </th>
                                            <th>  <center> Project Budget </center>  </th>
                                            <th>  <center> Project Duration </center>  </th>
                                            <th>  <center> Project Image </center>  </th>
                                            <th>  <center> Bid Now </center>  </th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($detailsjob as $value)

                                                <tr>
                                                    <td>
                                                        <center>
                                                            {{ date('M d,Y', strtotime($value->created_at)) }}
                                                        </center>
                                                    </td>
                                                    <td> <center>  {{ $value->p_name }}  </center> </td>
                                                    <td>
                                                         <center>  {{ $value->p_discription }}  </center>
                                                    </td>
                                                    <td>
                                                         <center>  {{ $value->p_budget }} $  </center>
                                                    </td>
                                                    <td>
                                                         <center>  {{ $value->p_duration }}  </center>
                                                    </td>
                                                    <td>
                                                         <center>  <img src="{{ url('public/Image/' . $value->p_image) }}"
                                                            style="height: 100px; width: 100px;">  </center>
                                                    </td>

                                                    <td>
                                                        <center><a href="/bidpage/{{ $value->id }}"
                                                                style="width: 100px;"  class="btn btn-primary">Bid Now</a>
                                                        </center>
                                                    </td>

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
