@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-home"></i> Dashboard <span>Subtitle goes here...</span></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>{{Config::get('app.title')}}</li>
      <li class="active">{{$title}}</li>
    </ol>
  </div>
</div>
<div class="contentpanel">
	<!-- Start First Row -->
  <div class="row">
      <div class="panel panel-default">
          <div class="panel-body">
              <div class="row demo-sidebarmenu">
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/individuals')!!}">
                          <img src="{{ URL::to('public/img/dashboard/1.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/organisations')!!}">
                          <img src="{{ URL::to('public/img/dashboard/2.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/products')!!}">
                          <img src="{{ URL::to('public/img/dashboard/3.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/attributes')!!}">
                          <img src="{{ URL::to('public/img/dashboard/4.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/events')!!}">
                          <img src="{{ URL::to('public/img/dashboard/5.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/tasks')!!}">
                          <img src="{{ URL::to('public/img/dashboard/6.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/transactions')!!}">
                          <img src="{{ URL::to('public/img/dashboard/7.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/dashboard')!!}">
                          <img src="{{ URL::to('public/img/dashboard/8.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 dashboard">
                      <a href="{!!url('admin/manage_groups')!!}">
                          <img src="{{ URL::to('public/img/dashboard/9.png')}}" class="profile-img dashboard-img">
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div> 
  <!-- End First Row -->
</div>
@stop
@section('javaScript')
  <script type="text/javascript" src="{{ URL::asset('public/js/flot/flot.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('public/js/flot/flot.resize.min.js') }}"></script>  
  <script type="text/javascript" src="{{ URL::asset('public/js/dashboard.js') }}"></script>
@stop