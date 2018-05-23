@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-user"></i> Manage Individuals</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('admin/dashboard')}}">{{Config::get('app.title')}}</a></li>
      <li class="active">All Individuals</li>
    </ol>
  </div>
</div>

<div class="contentpanel">
	<div class="row">
      <form class="form-horizontal" id="individualForm" role="form" method="POST" action="{!! url('individual/delete') !!}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
	      <input type="hidden" name="id" id="id">
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
	      <div class="table-responsive">
	          <table class="table" id="class_table2">
	              <thead>
	                 <tr>
	                    <th>Preferred Name</th>
						<th>First Name</th>
	                    <th>Last Name</th>
	                    <th>Gender</th>
						<th>Nationality</th>
	                    <th>Age</th>
	                    <th>Primary Tel</th>
						<th>Primary Email</th>
	                    <th>Primary Social Media</th>
	                    <th></th>
	                 </tr>
	              </thead>
	              <tbody>
	              		@foreach($individuals as $individual)
	              		    <input id="individualid" type="hidden" name="individualid" value="{!!$individual->id!!}"/>

	              			<tr>
		                   		<td>{{$individual->preferredname}}</td> 
		                   		<td>{{$individual->firstname}}</td>      
		                   		<td>{{$individual->middlename}}</td>      
		                   		<td>{{$individual->gender}}</td>      
		                   		<td>{{$individual->nationality}}</td>      
		                   		<td>{{$individual->age}}</td>      
		                   		<td>{{$individual->phonenumber}}</td>      
		                   		<td>{{$individual->emailaddress}}</td>    
		                   		<td>{{$individual->socialmediaid}}</td>  
		                   		<td class="table-action">
			                      <a href="{!!url('admin/edit_individual/'.$individual->id)!!}"><i class="fa fa-pencil"></i></a>
			                      <a href="#" onclick="doDelete('{{$individual->id}}')" class="delete-row{{$individual->id}}"><i class="fa fa-trash-o"></i></a>
			                    </td>
	                   		</tr>  
	                    @endforeach
	              </tbody>
	          </table>
	      </div>
      </form>
  </div>      
</div>
@stop

@section('pageLevelPlugins')
<!-- BEGIN CONFIRM DIALOG -->
  <script type="text/javascript" src="{{ URL::asset('public/js/jquery.form.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('public/js/jquery.confirm/jquery.confirm.js') }}"></script>  
  <script type="text/javascript" src="{{ URL::asset('public/js/script.js') }}"></script>
<!-- END CONFIRM DIALOG -->
@stop

@section('javaScript')
<script>
	// Delete row in a table
	var options = {
		success:	showResponse,
		dataType:	'json' 
	};

	function showResponse(response, statusText, xhr, $form)  {
		if (response.status == true) {
			$row = jQuery('.delete-row' + response.idx);
			
			$row.closest('tr').fadeOut(function(){ 
				$row.remove();
			});
		} else {
			alert(response.message);
		}
	}

	function doDelete(id) {
		$.confirm({
			'title'		: 'Delete Confirmation',
			'message'	: 'Do you really want to delete selected school?',
			'buttons'	: {
				'Yes'	: {
					'class'	: 'blue',
					'action': function(){		

						jQuery('#id').val(id);
						$( '#individualForm' ).ajaxForm(options).submit();						
					}
				},
				'No'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});	
	}

	jQuery(document).ready(function() {       
	   jQuery('#class_table2').dataTable({
		  "sPaginationType": "full_numbers"
		});
		
		// Chosen Select
		jQuery("select").chosen({
		  'min-width': '100px',
		  'white-space': 'nowrap',
		  disable_search_threshold: 10
		});
		
		// Delete row in a table
	
		jQuery('.delete-row').click(function(){
			$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'Do you really want to delete selected story?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){						
							jQuery(this).closest('tr').fadeOut(function(){
							  jQuery(this).remove();
							});						
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});	
			return false;
		});
		
		// Show aciton upon row hover
		jQuery('.table-hidaction tbody tr').hover(function(){
		  jQuery(this).find('.table-action-hide a').animate({opacity: 1});
		},function(){
		  jQuery(this).find('.table-action-hide a').animate({opacity: 0});
		});
	});
</script>

@stop