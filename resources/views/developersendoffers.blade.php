@include('header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Buyer Requests ( Those who Accept by Client )</h4>
                        </div>




                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            {{-- <th>Client Name</th> --}}

                                            <th>Project Name</th>
                                            <th>Project Budget</th>
                                            <th>Project Duration</th>
                                            <th>Project Service</th>
                                            <th>Submit Your Work</th>




                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($biddetail as $data)
                                            @if ($data->sender_id == session()->get('USER_id'))
                                                <tr>
                                                    {{-- <td>
                                                        {{ $data->f_name }}
                                                        {{ $data->l_name }}

                                                    </td> --}}
                                                    <td>{{ $data->bid_job_name }}</td>
                                                    <td class="align-middle">
                                                        {{ $data->bid_job_budget }}
                                                    </td>
                                                    <td>
                                                        {{ $data->bid_job_duration }}
                                                    </td>
                                                    <td>
                                                        {{ $data->bid_job_service }}
                                                    </td>


                                                    <td>
                                                        <a href="/submityourworkclient/{{$data->id}}"
                                                            class="btn btn-danger text-white">Submit Your Work</a>
                                                    </td>
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


>

@include('footer')
