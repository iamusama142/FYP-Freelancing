@include('header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Buyer Requests ( Those who Reject by Client )</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>Project Name</th>
                                            <th>Client Name</th>
                                            <th>Reason of Rejection</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($showrejectdata as $data)

                                            <tr>
                                                <td>{{ $data->bid_job_name }}</td>
                                                <td>
                                                    {{ $data->f_name }}
                                                    {{ $data->l_name }}
                                                </td>
                                                <td>
                                                    <p>Soory ! Range Of Developers Complete.</p>
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
