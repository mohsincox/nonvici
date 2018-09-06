@extends('layouts.app')

@section('content')
<div class="container mt-1" style="height: 500px;">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2">
			@if(isset($a))
				<span class="bg-success">{{ $a }}</span>
			@endif
			<div class="card">
				<div class="card-header">
					<h3 class="text-center"><i class="fa fa-pencil"></i> Create Form of <code><b>Extension</b></code> </h3>
				</div>
				<div class="card-body">
					
					
			  		
					@if(isset($extension))
					    {!! Form::model($extension, ['url' => "extension/$extension->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
					@else
					    {!! Form::open(['url' => 'extension', 'method' => 'post', 'class' => 'form-horizontal']) !!}
					@endif

					<div class="required form-group {{ $errors->has('extension') ? 'has-error' : ''}}">
					    <div class="row"> 
					        {!! Form::label('extension', 'Extension', ['class' => 'col-3 col-sm-3 control-label']) !!}
					        <div class="col-9 col-sm-9">
					        	<div class="col-12 col-sm-12">
					    	        {!! Form::text('extension', null, ['class' => 'form-control', 'placeholder' => 'Enter Extension', 'autocomplete' => 'off']) !!}
					    	        <span class="text-danger">
					    			    {{ $errors->first('extension') }}
					    		    </span>
					    		</div>
					        </div>
					    </div>
					</div>

					<div class="required form-group {{ $errors->has('registration_password') ? 'has-error' : ''}}">
					    <div class="row"> 
					        {!! Form::label('registration_password', 'Registration Password', ['class' => 'col-3 col-sm-3 control-label']) !!}
					        <div class="col-9 col-sm-9">
					        	<div class="col-12 col-sm-12">
					    	        {!! Form::text('registration_password', null, ['class' => 'form-control', 'placeholder' => 'Enter Registration Password', 'autocomplete' => 'off']) !!}
					    	        <span class="text-danger">
					    			    {{ $errors->first('registration_password') }}
					    		    </span>
					    		</div>
					        </div>
					    </div>
					</div>

					<div class="form-group">
					    <div class="row">
					        {!! Form::submit('Submit', ['class' => 'btn btn-outline-primary btn-block']) !!}
					    </div>
					</div>
					{!! Form::close() !!}


				</div>
			</div>
		</div>
	</div>	
</div>	
@endsection