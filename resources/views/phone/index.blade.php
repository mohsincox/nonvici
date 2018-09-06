@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Users
        	<small>Preview page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Users</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
        	<div class="col-md-12">
            	<div class="box box-primary">
                	<div class="box-header">
                    	<h3 class="box-title">Users</h3> 
                	</div>
                	<div class="box-body">
                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Extension</th>
                                        <th>protocol</th>
                                        <th>server_ip</th>
                                        <th>dialplan_number</th>
                                        <th>Status</th>
                                        <th>fullname</th>
                                        <th>user_group</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($phones as $phone)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $phone->extension }}</td>
                                        <td>{{ $phone->protocol }}</td>
                                        <td>{{ $phone->server_ip }}</td>
                                        <td>{{ $phone->dialplan_number }}</td>
                                        <td>{{ $phone->status }}</td>
                                        <td>{{ $phone->fullname }}</td>
                                        <td>{{ $phone->user_group }}</td>
                                        <td>{!! Html::link("phone/$phone->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td>
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

</div>

@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
@endsection


@section('script')
    <script src="{{ asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection