@extends('layouts.admin_default')

@section('globalStyles')
  <link rel="stylesheet" href="{{ URL::to('public/css/jquery.datatables.css') }}" />
  <link rel="stylesheet" href="{{ URL::to('public/css/style.default.css') }}" />
@stop

@section('pageContainer')
<div class="pageheader">
  <h2><i class="fa fa-user"></i> Manage Transactions</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('admin/dashboard')}}">{{Config::get('app.title')}}</a></li>
      <li class="active">All Transactions</li>
    </ol>
  </div>
</div>

<div class="contentpanel">
<div class="row">
      <form class="form-horizontal" id="transactionsForm" role="form" method="POST" action="{!! url('transaction/delete') !!}">
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
	                    <th>Transaction name</th>
						<th>Payee</th>
						<th>Beneficiary</th>	
						<th>Transaction no.</th>						
						<th>Transaction Type</th>						
						<th>Transaction value</th>						
						<th>Currency</th>						
						<th>BenefiDate receivedciary</th>						
	                    <th></th>
	                 </tr>
	              </thead>
	              <tbody>
	              		@foreach($transactions as $transaction)
	              			<input id="productid" type="hidden" name="productid" value="{{$transaction->id}}"/>
	              			<tr>
		                   		<td>{{$transaction->name}}</td> 
		                   		<td>{{$transaction->payee}}</td>          
		                   		<td>{{$transaction->beneficiary}}</td>    
		                   		<td>{{$transaction->transactionnumber}}</td>          
		                   		<td>{{$transaction->transactiontype}}</td>          
		                   		<td>{{$transaction->transactionvalue}}</td>          
		                   		<td>{{$transaction->currency}}</td>          
		                   		<td>{{$transaction->datereceived}}</td>          
		                   		<td class="table-action">
			                      <a href="{!!url('admin/edit_transaction/'.$transaction->id)!!}"><i class="fa fa-pencil"></i></a>
			                      <a href="#" onclick="doDelete('{{$transaction->id}}')" class="delete-row{{$transaction->id}}"><i class="fa fa-trash-o"></i></a>
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
						$( '#transactionsForm' ).ajaxForm(options).submit();						
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