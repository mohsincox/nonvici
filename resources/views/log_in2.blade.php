@extends('layouts.app2')

@section('content')
<div class="row">
        
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Removable</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form class="" role="form" method="POST" action="{{ url('/log-in') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="user" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="user" type="user" class="form-control" name="user" value="{{ old('user') }}" placeholder="E-Mail Address">

                                    @if ($errors->has('user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }}">
                            <div class="row">
                                <label for="pass" class="col-md-4 control-label">Pass</label>

                                <div class="col-md-6">
                                    <input id="pass" type="password" class="form-control" name="pass" placeholder="Pass">

                                    @if ($errors->has('pass'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pass') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="#">Forgot Your Pass?</a>
                            </div>
                        </div>
                    </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        
       
      </div>
      <!-- /.row -->


@endsection
