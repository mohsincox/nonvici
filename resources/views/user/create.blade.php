@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            User
        	<small>Preview page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">User</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
							
							<div class="card">
								<div class="card-header">
									<h3 class="text-center"><i class="fa fa-pencil"></i> Create Form of <code><b>User</b></code> </h3>
								</div>
								<div class="card-body">
							  		
									@if(isset($user))
									    {!! Form::model($user, ['url' => "user/$user->id", 'method' => 'put', 'class' => 'form-horizontal']) !!}
									@else
									    {!! Form::open(['url' => 'user', 'method' => 'post', 'class' => 'form-horizontal']) !!}
									@endif

									<div class="required form-group {{ $errors->has('agent_user') ? 'has-error' : ''}}">
								        {!! Form::label('agent_user', 'Agent User', ['class' => 'col-3 col-sm-3 control-label']) !!}
								        <div class="col-xs-9 col-sm-9">
								        	<div class="col-xs-12 col-sm-12">
								    	        {!! Form::text('agent_user', null, ['class' => 'form-control', 'placeholder' => 'Enter Agent User', 'autocomplete' => 'off']) !!}
								    	        <span class="text-danger">
								    			    {{ $errors->first('agent_user') }}
								    		    </span>
								    		</div>
								        </div>
									</div>

									<div class="required form-group {{ $errors->has('agent_pass') ? 'has-error' : ''}}">
								        {!! Form::label('agent_pass', 'Agent Password', ['class' => 'col-3 col-sm-3 control-label']) !!}
								        <div class="col-xs-9 col-sm-9">
								        	<div class="col-xs-12 col-sm-12">
								    	        {!! Form::text('agent_pass', null, ['class' => 'form-control', 'placeholder' => 'Enter Agent Password Password', 'autocomplete' => 'off']) !!}
								    	        <span class="text-danger">
								    			    {{ $errors->first('agent_pass') }}
								    		    </span>
								    		</div>
								        </div>
									</div>

									<div class="required form-group {{ $errors->has('agent_full_name') ? 'has-error' : ''}}">
								        {!! Form::label('agent_full_name', 'Agent Full Name', ['class' => 'col-3 col-sm-3 control-label']) !!}
								        <div class="col-xs-9 col-sm-9">
								        	<div class="col-xs-12 col-sm-12">
								    	        {!! Form::text('agent_full_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Agent Full Name', 'autocomplete' => 'off']) !!}
								    	        <span class="text-danger">
								    			    {{ $errors->first('agent_full_name') }}
								    		    </span>
								    		</div>
								        </div>
									</div>

									<div class="form-group required {{ $errors->has('agent_user_group') ? 'has-error' : '' }}">
									    {!! Form::label('agent_user_group', 'Select Category', ['class' => 'control-label col-sm-3 col-xs-3']) !!}
									    <div class="col-xs-9 col-sm-9">
									    	<div class="col-xs-12 col-sm-12">
										        {!! Form::select('agent_user_group', $agentUserGroupList, null, ['class' => 'form-control', 'placeholder' => 'Select Category']) !!}
										        <span class="text-danger">
										            {{ $errors->first('agent_user_group') }}
										        </span>
									        </div>
									    </div>
									</div>

									<div class="box-footer">
                						<button type="button" class="btn btn-default">Cancel</button>
                						<!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
                						{!! Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) !!}
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
