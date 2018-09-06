@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Phone
        	<small>Preview page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Phone</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">Phone</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
							@if(isset($a))
								<span class="bg-success">{{ $a }}</span>
							@endif
							<div class="card">
								<div class="card-header">
									<h3 class="text-center"><i class="fa fa-pencil"></i> Create Form of <code><b>Phone</b></code> </h3>
								</div>
								<div class="card-body">
							  		
									@if(isset($phone))
									    {!! Form::model($phone, ['url' => "phone/$phone->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
									@else
									    {!! Form::open(['url' => 'phone', 'method' => 'post', 'class' => 'form-horizontal']) !!}
									@endif

									<div class="required form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
								        {!! Form::label('extension', 'Extension', ['class' => 'col-3 col-sm-3 control-label']) !!}
								        <div class="col-xs-9 col-sm-9">
								        	<div class="col-xs-12 col-sm-12">
								    	        {!! Form::text('extension', null, ['class' => 'form-control', 'placeholder' => 'Enter Extension', 'autocomplete' => 'off']) !!}
								    	        <span class="text-danger">
								    			    {{ $errors->first('extension') }}
								    		    </span>
								    		</div>
								        </div>
									</div>

									<div class="required form-group {{ $errors->has('registration_password') ? 'has-error' : ''}}">
								        {!! Form::label('registration_password', 'Registration Password', ['class' => 'col-3 col-sm-3 control-label']) !!}
								        <div class="col-xs-9 col-sm-9">
								        	<div class="col-xs-12 col-sm-12">
								    	        {!! Form::text('registration_password', null, ['class' => 'form-control', 'placeholder' => 'Enter Registration Password', 'autocomplete' => 'off']) !!}
								    	        <span class="text-danger">
								    			    {{ $errors->first('registration_password') }}
								    		    </span>
								    		</div>
								        </div>
									</div>

									<div class="box-footer">
                						<!-- <button type="button" class="btn btn-default">Cancel</button> -->
                						<a href="{{ url('/phone') }}" class="btn btn-default">Cancel</a>
                						{!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#phone_create']) !!}
              						</div>

              						<div class="modal modal-info fade" id="phone_create">
          								<div class="modal-dialog">
            								<div class="modal-content">
              									<div class="modal-header">
                									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  										<span aria-hidden="true">&times;</span>
                  									</button>
                									<h4 class="modal-title">Confirmation Message</h4>
              									</div>
              									<div class="modal-body">
                									<h3>Want to Create Phone?</h3>
              									</div>
	              								<div class="modal-footer">
	                								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
	                								<button type="submit" class="btn btn-outline">Create Phone</button>
	              								</div>
            								</div>
          								</div>
        							</div>

									{!! Form::close() !!}

								</div>
							</div>
						</div>

                	</div>
          		</div>
        	</div>
      	</div>
    </section>

</div>

@endsection
