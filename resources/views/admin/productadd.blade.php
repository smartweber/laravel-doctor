@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/bootstrap-timepicker.min.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-user"></i> Add New Product <span></span></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('admin/dashboard')}}">{{Config::get('app.title')}}</a></li>
      <li class="active">Add Product</li>
    </ol>
  </div>
</div>
<div class="contentpanel"> 
	<div class="panel panel-default">

	
  {!! Form::open(array('url' => 'admin/set_product', 'method' => 'post', 'class' => 'form-horizontal main-form', 'id' => 'product_form', 'autocomplete' => 'off' , 'enctype' => 'multipart/form-data')) !!}

		<div class="panel-heading">
          <div class="panel-btns">
          </div>
          @if (!is_null(Session::get('status_success')))
  		    <div class="alert alert-success alert-dismissable">
  		        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
  		            &times;
  		        </button>
  		        <i class="fa fa-check-circle"></i><strong> Success!</strong>
  		        @if (is_array(Session::get('status_success')))
  		        <ul>
  		            @foreach (Session::get('status_success') as $success)
  		            <li>
  		                {{ $success }}
  		            </li>
  		            @endforeach
  		        </ul>
  		        @else
  		        {{ Session::get('status_success') }}
  		        @endif
  		    </div>
  		    @endif
  		    @if (!is_null(Session::get('status_error')))
  		    <div class="alert alert-danger alert-dismissable">
  		        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
  		            &times;
  		        </button>
  		        <i class="fa fa-times-circle"></i><strong> Error!</strong>
  		        @if (is_array(Session::get('status_error')))
  		        <ul>
  		            @foreach (Session::get('status_error') as $error)
  		            <li>
  		                {{ $error }}
  		            </li>
  		            @endforeach
  		        </ul>
  		        @else
  		        {{ Session::get('status_error') }}
  		        @endif
  		    </div>
  		    @endif 
          <div class="form-group">
            <div class="col-md-10">
              <div class="col-md-8">
                <div class="btn-group bootstrap-select col-md-4">
                  <h4 class="panel-title">Product Information</h4>
                </div>  
                <label class="label label-sm label-globus" id="add_product"><i class="fa fa-plus" style="cursor:pointer"></i></label>
              </div>
            </div>      
          </div>           
          <p></p>
        </div>

        <div class="form-group" id="individual_input" style="display:none;">
            <div class="form-group">
              <label class="col-sm-3 control-label">Name<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="name" name="name" placeholder="Required" class="form-control" />
              </div>
            </div>      

           	<div class="form-group">
              <label class="col-sm-3 control-label">Identity Code</label>
              <div class="col-sm-2">
                <input type="text" id="identitycode" name="identitycode" class="form-control" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-3">
                <textarea rows="5" class="form-control" id="description" name="description" placeholder="Type your Description..."  ></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Product image</label>
              <div class="col-sm-2">
                <input type="text" id="productimage" name="productimage" class="form-control" />
              </div>
            </div>  
        </div>
        
        <div class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				  <input type="submit" value="Save" class="btn btn-primary"></input>&nbsp;
				  <button class="btn btn-default">Cancel</button>
				</div>
			 </div>
		</div><!-- panel-footer -->
      {!! Form::close() !!}
      </div><!-- panel -->	
</div>
@stop

@section('pageLevelPlugins')
  <script type="text/javascript" src="{{ URL::asset('public/js/bootstrap-timepicker.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('public/js/jquery.validate.min.js') }}"></script>
@stop

@section('pageLevelScripts')
<script type="text/javascript">
	$(document).ready(function(){
		var plus_1=$("#add_product").html();
		$("#add_product").click(function(){
			$("#individual_input").slideToggle('slow');
            var minus_1 = "<i class='fa fa-minus' style='cursor:pointer'></i>";
            if($("#add_product").html()==plus_1)
                $("#add_product").html(minus_1);
            else
                $("#add_product").html(plus_1);		
        });

    jQuery("#product_form").validate({
      highlight: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
      },
      success: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-error');
      }
    });
	});
</script>
@stop