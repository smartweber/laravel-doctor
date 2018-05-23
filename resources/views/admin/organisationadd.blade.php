@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/bootstrap-timepicker.min.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-user"></i> Add New Organisation <span></span></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('admin/dashboard')}}">{{Config::get('app.title')}}</a></li>
      <li class="active">Add Organisation</li>
    </ol>
  </div>
</div>
<div class="contentpanel"> 
	<div class="panel panel-default">

	
  {!! Form::open(array('url' => 'admin/set_organisation', 'method' => 'post', 'class' => 'form-horizontal main-form', 'id' => 'organisation_form', 'autocomplete' => 'off' , 'enctype' => 'multipart/form-data')) !!}

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
                  <h4 class="panel-title">Organisation Information</h4>
                </div>  
                <label class="label label-sm label-globus" id="add_organisation"><i class="fa fa-plus" style="cursor:pointer"></i></label>
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
              <label class="col-sm-3 control-label">Type</label>
              <div class="col-sm-2">
                <input type="text" id="type" name="type" class="form-control" />
              </div>
            </div>   


            <div class="form-group">
              <label class="col-sm-3 control-label">Jurisdiction</label>
              <div class="col-sm-2">
                <input type="text" id="jurisdiction" name="jurisdiction" class="form-control" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Registration country<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="registrationcountry" name="registrationcountry" placeholder="Required" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Registration city<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="registrationcity" name="registrationcity" placeholder="Required" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Opened Date</label>
              <div class="col-sm-2">
                <input type="text" id="openeddate" name="openeddate" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Date of Incorporation</label>
              <div class="col-sm-2">
                <input type="text" id="dateofincorporation" name="dateofincorporation" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Closed Date</label>
              <div class="col-md-2">
                  <input type="text" id="closeddate" name="closeddate" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Sector</label>
              <div class="col-sm-2">
                <input type="text" id="sector" name="sector" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Industry</label>
              <div class="col-sm-2">
                <input type="text" id="industry" name="industry" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Description</label>
              <div class="col-sm-3">
                <textarea rows="5" class="form-control" id="description" name="description" placeholder="Type your Description..."></textarea>
              </div>
            </div>
        </div>

        <div class="panel-heading">
          <div class="panel-btns">
          </div>
           <div class="form-group">
            <div class="col-md-10">
              <div class="col-md-8">
                <div class="btn-group bootstrap-select col-md-4">
                  <h4 class="panel-title">Contact Details Information</h4>
                </div>  
                <label class="label label-sm label-globus" id="add_contactdetails"><i class="fa fa-plus" style="cursor:pointer"></i></label>
              </div>
            </div>      
          </div>                 
          <p></p>
        </div>
        
        <div class="form-group" id="contactdetails_input" style="display:none;"> 
         	<div class="form-group">
              <label class="col-sm-3 control-label">Contact Phone<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="contactphone" name="contactphone" placeholder="Required" class="form-control" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Email<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="email" name="email" placeholder="Required" class="form-control" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Fax</label>
              <div class="col-sm-2">
                <input type="text" id="fax" name="fax" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Website</label>
              <div class="col-sm-2">
                <input type="text" id="website" name="website" class="form-control" />
              </div>
            </div>
        </div>

        <div class="panel-heading">
          <div class="panel-btns">
          </div>
           <div class="form-group">
            <div class="col-md-10">
              <div class="col-md-8">
                <div class="btn-group bootstrap-select col-md-4">
                  <h4 class="panel-title">Address Details Information</h4>
                </div>  
                <label class="label label-sm label-globus" id="add_addressdetails"><i class="fa fa-plus" style="cursor:pointer"></i></label>
              </div>
            </div>      
          </div>                 
          <p></p>
        </div>

        <div class="form-group" id="addressdetails_input" style="display:none;">
            <div class="form-group">
              <label class="col-sm-3 control-label">Address Name</label>
              <div class="col-sm-2">
                <input type="text" id="addressname" name="addressname" class="form-control" />
              </div>
            </div>      

            <div class="form-group">
              <label class="col-sm-3 control-label">Country<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="country" name="country" placeholder="Required" class="form-control" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Province<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="province" name="province" placeholder="Required" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">City/Town<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="cityortown" name="cityortown" placeholder="Required" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">P.O.Box</label>
              <div class="col-sm-2">
                <input type="text" id="pobox" name="pobox" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">District</label>
              <div class="col-sm-2">
                <input type="text" id="district" name="district" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Number</label>
              <div class="col-sm-2">
                <input type="text" id="roadnumber" name="roadnumber" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Name</label>
              <div class="col-sm-2">
                <input type="text" id="roadname" name="roadname" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Type</label>
              <div class="col-sm-2">
                <input type="text" id="roadtype" name="roadtype" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Additional Road Value</label>
              <div class="col-sm-2">
                <input type="text" id="additionalroadvalue" name="additionalroadvalue" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Complex Name</label>
              <div class="col-sm-2">
                <input type="text" id="complexname" name="complexname" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Building Name/Number</label>
              <div class="col-sm-2">
                <input type="text" id="buildingnameornumber" name="buildingnameornumber" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Floor/Level</label>
              <div class="col-sm-2">
                <input type="text" id="floororlevel" name="floororlevel" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Room/Unit/Suite</label>
              <div class="col-sm-2">
                <input type="text" id="roomorunitorsuite" name="roomorunitorsuite" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Postal Code<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="postalcode" name="postalcode" placeholder="Required" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Latitude</label>
              <div class="col-sm-2">
                <input type="text" id="latitude" name="latitude" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Longitude</label>
              <div class="col-sm-2">
                <input type="text" id="longitude" name="longitude" class="form-control" />
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
		var plus_1=$("#add_organisation").html();
		$("#add_organisation").click(function(){
			$("#individual_input").slideToggle('slow');
            var minus_1 = "<i class='fa fa-minus' style='cursor:pointer'></i>";
            if($("#add_organisation").html()==plus_1)
                $("#add_organisation").html(minus_1);
            else
                $("#add_organisation").html(plus_1);		
        });

        var plus_2=$("#add_contactdetails").html();
		$("#add_contactdetails").click(function(){
			$("#contactdetails_input").slideToggle('slow');
            var minus_2 = "<i class='fa fa-minus' style='cursor:pointer'></i>";
            if($("#add_contactdetails").html()==plus_2)
                $("#add_contactdetails").html(minus_2);
            else
                $("#add_contactdetails").html(plus_2);		
        });

        var plus_3=$("#add_addressdetails").html();
		$("#add_addressdetails").click(function(){
			$("#addressdetails_input").slideToggle('slow');
            var minus_3 = "<i class='fa fa-minus' style='cursor:pointer'></i>";
            if($("#add_addressdetails").html()==plus_3)
                $("#add_addressdetails").html(minus_3);
            else
                $("#add_addressdetails").html(plus_3);		
        });

    jQuery("#organisation_form").validate({
      highlight: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
      },
      success: function(element) {
        jQuery(element).closest('.form-group').removeClass('has-error');
      }
    });
	});

  // Date Picker
  jQuery('#openeddate').datepicker();
  jQuery('#closeddate').datepicker();
</script>
@stop