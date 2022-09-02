@include('admin_header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Your Project Details</h4>
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
                                            <th>Project Description</th>
                                            <th>Project Budget</th>
                                            <th>Project Duration</th>
                                            <th>Project Image</th>
                                            <th>View Bids</th>


                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($detailsjob as $value)
                                            {{-- @if ($value->p_id == session()->get('USER_id')) --}}
                                                <tr>
                                                    {{-- <td>
                                                        {{ $value->p_id }}
                                                    </td> --}}
                                                    <td>{{ $value->p_name }}</td>
                                                    <td class="align-middle">
                                                        {{ $value->p_discription }}
                                                    </td>
                                                    <td>
                                                        {{ $value->p_budget }} $
                                                    </td>
                                                    <td>
                                                        {{ $value->p_duration }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ url('public/Image/' . $value->p_image) }}"
                                                            style="height: 100px; width: 100px;">
                                                    </td>
                                                    <td>
                                                      <a href="/seebids/{{$value->p_name}}" class="btn btn-danger text-white">View Total Bids</a>
                                                    </td>
                                            {{-- @endif --}}
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
