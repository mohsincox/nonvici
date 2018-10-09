@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Lead
        	<small>Preview page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Lead</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
        	<div class="col-md-8 col-sm-offset-2">
            	<div class="box box-success">
                	<div class="box-header with-border">
                    	<h3 class="box-title">Lead</h3> 
                	</div>
                	<div class="box-body">

                		<div class="col-sm-12">
							
							<div class="card">
								<div class="card-header">
									<h3 class="text-center"><i class="fa fa-pencil"></i> Form of <code><b>Lead Upload</b></code> </h3>
								</div>
								<div class="card-body">
							  		
									@if(isset($lead))
									    {!! Form::model($lead, ['url' => "lead/$lead->id", 'method' => 'put', 'class' => 'form-horizontal', 'id' => 'ticketForm', 'enctype' => 'multipart/form-data']) !!}
									@else
									    {!! Form::open(['url' => 'lead', 'method' => 'post', 'class' => 'form-horizontal', 'id' => 'ticketForm', 'enctype' => 'multipart/form-data']) !!}
									@endif

									



									<div class="form-group required {{ $errors->has('list_id') ? 'has-error' : '' }}">
									    {!! Form::label('list_id', 'Select List Id', ['class' => 'control-label col-sm-3 col-xs-3']) !!}
									    <div class="col-xs-9 col-sm-9">
									    	<div class="col-xs-12 col-sm-12">
										        {!! Form::select('list_id', $listIdList, null, ['class' => 'form-control', 'placeholder' => 'Select List Id']) !!}
										        <span class="text-danger">
										            {{ $errors->first('list_id') }}
										        </span>
									        </div>
									    </div>
									</div>


									
		                            <div class="form-group required {{ $errors->has('file') ? 'has-error' : ''}}">
		                                {!! Form::label('file', 'XLSX, CSV or XLS File', ['class' => 'col-xs-12 col-sm-3 control-label']) !!}
		                                <div class="col-sm-9">
		                                    <div class="col-xs-12 col-sm-12">
		                                    {!! Form::file('file', ['class' => 'form-control', 'placeholder' => 'Featured mp3', 'autocomplete' => 'off']) !!}
		                                    <span class="help-block text-danger">
		                                        {{ $errors->first('file') }}
		                                    </span>
		                                </div>
		                                </div>
		                            </div>
                   


                        			





									

									<div class="box-footer">
                						<button type="button" class="btn btn-default">Cancel</button>
                						<!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
                						{!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'data-toggle' => 'modal', 'data-target' => '#lead_create']) !!}
              						</div>

              						<div class="modal modal-info fade" id="lead_create">
          								<div class="modal-dialog">
            								<div class="modal-content">
              									<div class="modal-header">
                									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  										<span aria-hidden="true">&times;</span>
                  									</button>
                									<h4 class="modal-title">Confirmation Message</h4>
              									</div>
              									<div class="modal-body">
                									<h3>Want to upload Lead?</h3>
              									</div>
	              								<div class="modal-footer">
	                								<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
	                								<!-- <button type="submit" class="btn btn-outline submitBtnTicket">Upload Lead</button> -->
	                								{!! Form::submit('Upload Lead', ['class' => 'btn btn-outline submitBtnTicket']) !!}
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


@section('script')
<script type="text/javascript">
	$(document).ready(function () {
            $("#ticketForm").submit(function () {
                $(".submitBtnTicket").attr("disabled", true);
                return true;
            });
        });
</script>
@endsection