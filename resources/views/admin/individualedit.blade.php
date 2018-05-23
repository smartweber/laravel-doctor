@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-user"></i> Add Edit Individual <span></span></h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('admin/dashboard')}}">{{Config::get('app.title')}}</a></li>
      <li class="active">Add Individual</li>
    </ol>
  </div>
</div>
<div class="contentpanel"> 
  <div class="panel panel-default">

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

      {!! Form::open(array('url' => 'admin/edit_individual', 'method' => 'post', 'class' => 'form-horizontal main-form', 'id' => 'individual_form', 'autocomplete' => 'off' , 'enctype' => 'multipart/form-data')) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="individual_id" type="hidden" name="individual_id" value="{!! $individualid->id !!}">
        <div class="panel-heading">
          <div class="panel-btns">
          </div>
           <div class="form-group">
            <div class="col-md-10">
              <div class="col-md-8">
                <div class="btn-group bootstrap-select col-md-4">
                  <h4 class="panel-title">Individual Information</h4>
                </div>  
                <label class="label label-sm label-globus" id="add_individual"><i class="fa fa-plus" style="cursor:pointer"></i></label>
              </div>
            </div>      
          </div>             
          <p></p>
        </div>

        <div class="form-group" id="individual_input" style="display:none;">
            <div class="form-group">
              <label class="col-sm-3 control-label">Formal Suffix</label>
              <div class="col-sm-2">
                <input type="text" id="formalsuffix" name="formalsuffix" class="form-control" value="{{$individuals->formalsuffix}}" />
              </div>
            </div>      

            <div class="form-group">
              <label class="col-sm-3 control-label">First Name<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="firstname" name="firstname" placeholder="Required" class="form-control" value="{{$individuals->firstname}}" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Middle Name<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="middlename" name="middlename" placeholder="Required" class="form-control" value="{{$individuals->middlename}}" />
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Family Name<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="familyname" name="familyname" placeholder="Required" class="form-control" value="{{$individuals->familyname}}" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Family Name Suffix</label>
              <div class="col-sm-2">
                <input type="text" id="familynamesuffix" name="familynamesuffix" class="form-control" value="{{$individuals->familynamesuffix}}" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Preferred Name</label>
              <div class="col-sm-2">
                <input type="text" id="preferredname" name="preferredname" class="form-control" value="{{$individuals->preferredname}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">End Name Suffix</label>
              <div class="col-sm-2">
                <input type="text" id="endnamesuffix" name="endnamesuffix" class="form-control" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Gender</label>
              <div class="col-md-2">
                 <select class="col-md-12" id="gender" name="gender" required>
                     <option></option>
                     <option>male</option>
                     <option>female</option>

                 </select>   
                <!-- <input type="text" id="gender" name="gender" placeholder="Required" class="form-control" /> -->
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Date of Birth</label>
              <div class="col-sm-2">
                <input type="text" id="dateofbirth" name="dateofbirth" class="form-control" value="{{$individuals->dateofbirth}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Age</label>
              <div class="col-sm-2">
                <input type="text" id="age" name="age" class="form-control" value="{{$individuals->age}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Country of Birth</label>
              <div class="col-sm-2">
                <input type="text" id="countryofbirth" name="countryofbirth" class="form-control" value="{{$individuals->countryofbirth}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">City of Birth</label>
              <div class="col-sm-2">
                <input type="text" id="cityofbirth" name="cityofbirth" class="form-control" value="{{$individuals->cityofbirth}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Nationality</label>
              <div class="col-sm-2">
                <input type="text" id="nationality" name="nationality" class="form-control" value="{{$individuals->nationality}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Date of Death</label>
              <div class="col-sm-2">
                <input type="text" id="dateofdeath" name="dateofdeath" class="form-control" value="{{$individuals->dateofdeath}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">ID Type</label>
              <div class="col-sm-2">
                <input type="text" id="idtype" name="idtype" class="form-control" value="{{$individuals->idtype}}" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">ID Number</label>
              <div class="col-sm-2">
                <input type="text" id="idnumber" name="idnumber" class="form-control" value="{{$individuals->idnumber}}" />
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
              <label class="col-sm-3 control-label">Phone Type</label>
              <div class="col-sm-2">
                <input type="text" id="phonetype" name="phonetype" class="form-control" value="{{$individuals->phonetype}}"/>
              </div>
            </div>   


            <div class="form-group">
              <label class="col-sm-3 control-label">Phone Number</label>
              <div class="col-sm-2">
                <input type="text" id="phonenumber" name="phonenumber" class="form-control" value="{{$individuals->phonenumber}}"/>
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Email Type<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="emailtype" name="emailtype" placeholder="Required" class="form-control" value="{{$individuals->emailtype}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Email Address<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="emailaddress" name="emailaddress" placeholder="Required" class="form-control" value="{{$individuals->emailaddress}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Social Media Type</label>
              <div class="col-sm-2">
                <input type="text" id="socialmediatype" name="socialmediatype" class="form-control" value="{{$individuals->socialmediatype}}"/>
              </div>
            </div>
 
            <div class="form-group">
              <label class="col-sm-3 control-label">Social Media ID<span class="asterisk">*</span></label>
              <div class="col-sm-2">
                <input type="text" id="socialmediaid" name="socialmediaid" class="form-control" value="{{$individuals->socialmediaid}}"/>
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
                <input type="text" id="addressname" name="addressname" class="form-control" value="{{$individuals->addressname}}"/>
              </div>
            </div>      

            <div class="form-group">
              <label class="col-sm-3 control-label">Country</label>
              <div class="col-sm-2">
                <input type="text" id="country" name="country" class="form-control" value="{{$individuals->country}}"/>
              </div>
            </div>   

            <div class="form-group">
              <label class="col-sm-3 control-label">Province</label>
              <div class="col-sm-2">
                <input type="text" id="province" name="province" class="form-control" value="{{$individuals->province}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">City/Town</label>
              <div class="col-sm-2">
                <input type="text" id="cityortown" name="cityortown" class="form-control" value="{{$individuals->cityortown}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">P.O.Box</label>
              <div class="col-sm-2">
                <input type="text" id="pobox" name="pobox" class="form-control" value="{{$individuals->pobox}}"/>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">District</label>
              <div class="col-sm-2">
                <input type="text" id="district" name="district" class="form-control" value="{{$individuals->district}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Number</label>
              <div class="col-sm-2">
                <input type="text" id="roadnumber" name="roadnumber" class="form-control" value="{{$individuals->roadnumber}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Name</label>
              <div class="col-sm-2">
                <input type="text" id="roadname" name="roadname" class="form-control" value="{{$individuals->roadname}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Road Type</label>
              <div class="col-sm-2">
                <input type="text" id="roadtype" name="roadtype" class="form-control" value="{{$individuals->roadtype}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Additional Road Value</label>
              <div class="col-sm-2">
                <input type="text" id="additionalroadvalue" name="additionalroadvalue" class="form-control" value="{{$individuals->additionalroadvalue}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Complex Name</label>
              <div class="col-sm-2">
                <input type="text" id="complexname" name="complexname" class="form-control" value="{{$individuals->complexname}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Building Name/Number</label>
              <div class="col-sm-2">
                <input type="text" id="buildingnameornumber" name="buildingnameornumber" class="form-control" value="{{$individuals->buildingnameornumber}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Floor/Name</label>
              <div class="col-sm-2">
                <input type="text" id="floororname" name="floororname" class="form-control" value="{{$individuals->floororname}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Room/Unit/Suite</label>
              <div class="col-sm-2">
                <input type="text" id="roomorunitorsuite" name="roomorunitorsuite" class="form-control" value="{{$individuals->roomorunitorsuite}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Postal Code</label>
              <div class="col-sm-2">
                <input type="text" id="postalcode" name="postalcode" class="form-control" value="{{$individuals->postalcode}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Latitude</label>
              <div class="col-sm-2">
                <input type="text" id="latitude" name="latitude" class="form-control" value="{{$individuals->latitude}}"/>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-3 control-label">Longitude</label>
              <div class="col-sm-2">
                <input type="text" id="longitude" name="longitude" class="form-control" value="{{$individuals->longitude}}"/>
              </div>
            </div>
        </div>
        
        <div class="panel-footer">
       <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
          <button class="btn btn-primary">Save</button>&nbsp;
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
@stop

@section('pageLevelScripts')
<script type="text/javascript">
  $(document).ready(function(){
    var plus_1=$("#add_individual").html();
    $("#add_individual").click(function(){
      $("#individual_input").slideToggle('slow');
            var minus_1 = "<i class='fa fa-minus' style='cursor:pointer'></i>";
            if($("#add_individual").html()==plus_1)
                $("#add_individual").html(minus_1);
            else
                $("#add_individual").html(plus_1);    
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
  });

  // Date Picker
  jQuery('#dateofdeath').datepicker();
  jQuery('#dateofbirth').datepicker();
  jQuery('#countryofbirth').datepicker();
  jQuery('#cityofbirth').datepicker();
</script>
@stop