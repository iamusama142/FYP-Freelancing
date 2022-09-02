@include('header')



<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-danger">Team Requests ( Those who Reject by Team )</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-hover">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th>Project Name</th>
                                            <th>Team Name</th>
                                            <th>Reason of Rejection</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($showrejectdatateam as $data)

                                            <tr>
                                                <td>{{ $data->project_name }}</td>
                                                <td>
                                                    {{ $data->f_name }}
                                                    {{ $data->l_name }}
                                                </td>
                                                <td>
                                                    <p>Soory ! I'm not Available.</p>
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
