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
            	<div class="box box-success">
                	<div class="box-header">
                    	<h3 class="box-title">Users</h3> 
                	</div>
                	<div class="box-body">

                        <div class="table-responsive"> 
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>full_name</th>
                                        <th>Group</th>
                                        <th>Level</th>
                                        <th>Active</th>
                                        <!-- <th>View</th> -->
                                        <th>Edit</th>
                                        <!-- <th>Delete</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->user_id }}</td>
                                        <td><strong>{{ $user->user }}</strong></td>
                                        <td>{{ $user->full_name }}</td>
                                        <td>{{ $user->user_group }}</td>
                                        <td>{{ $user->user_level }}</td>
                                        <td>{{ $user->active }}</td>
                                        <!-- <td>{!! Html::link("user/$user->id",' View', ['class' => 'fa fa-eye btn btn-info btn-xs']) !!}</td> -->
                                        <td>{!! Html::link("user/$user->id/edit",' Edit', ['class' => 'fa fa-edit btn btn-success btn-xs btn-flat']) !!}</td>
                                        <!-- <td><a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-{{ $user->id }}">
                                                <i class="fa fa-trash"></i> Delete
                                            </a>
                                        </td> -->

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal-{{ $user->id }}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">DELETE</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you want to delete this Phone?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{--<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>--}}

                                                        {{ Form::open(['method' => 'DELETE', 'url' => "user/$user->id"]) }}
                                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                        {{ Form::close() }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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