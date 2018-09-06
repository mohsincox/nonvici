@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    
    <section class="content-header">
        <h1>
            Welcome
        <small>Preview page</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Welcome</li>
        </ol>
    </section>
    
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Welcome</h3> 
                    </div>
                
                    <div class="box-body">
                        Your Application's Landing Page.
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</div>

@endsection
