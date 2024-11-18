@extends('layout')

@section('content')
<section>
    <div class="container">
        <div class="row">
         <div class="col md-16">
            <div class="card">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.css"/>
            <div class="card-body">
            <table id="myTable" class="table table-striped table-bordered table-hover text-nowrap w-100 display">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Activity</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $data)
                    <tr>
                        <td>{{ $data->user->name }}</td>
                        <td>{{ $data->activity }}</td>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
          </div>
        </div>
    </div>
</section>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<!-- Setelah script CDN, baru panggil DataTable() -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
           
        });
    });
</script>
@endsection
