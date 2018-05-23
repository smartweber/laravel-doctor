<h5 class="sidebartitle">Navigation </h5>
<ul class="nav nav-pills nav-stacked nav-bracket">
	<li class="@if(strtolower($title) == 'dashboard') active @endif">
		<a href="{{ URL::route("admin/dashboard") }}">
		<i class="fa fa-home"></i> <span>Dashboard</span></a>
	</li>
	<li class="nav-parent @if(strtolower($title) == 'manage individuals') active nav-active @endif">
		<a href=""><i class="fa fa-user"></i> <span>Manage Individuals</span></a>
		<ul class="children">
			<li class="@if(strtolower($sub_title) == 'individuals') active @endif">
				<a href="{{ URL::route("admin/individuals") }}"><i class="fa fa-caret-right"></i> All Individuals</a>
			</li>  
			<li class="@if(strtolower($sub_title) == 'individualnew') active @endif">
				<a href="{{ URL::route("admin/individualAdd") }}"><i class="fa fa-caret-right"></i> Add Individuals</a>
			</li>      
		</ul>
	</li>

  <li class="nav-parent @if(strtolower($title) == 'manage organisations') active nav-active @endif">
	<a href=""><i class="fa fa-user"></i> <span>Manage Organisations</span></a>
	<ul class="children"> 
		<li class="@if(strtolower($sub_title) == 'organisations') active @endif">
			<a href="{{ URL::route("admin/organisations") }}"><i class="fa fa-caret-right"></i> All Organisations</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'organisationnew') active @endif">
			<a href="{{ URL::route("admin/organisationadd") }}"><i class="fa fa-caret-right"></i> Add Organisations</a>
		</li>      
	</ul>
  </li>

  <li class="nav-parent @if(strtolower($title) == 'manage products') active nav-active @endif">
	<a href=""><i class="fa fa-user-md"></i> <span>Manage Products</span></a>
	<ul class="children">
		<li class="@if(strtolower($sub_title) == 'products') active @endif">
			<a href="{{ URL::route("admin/products") }}"><i class="fa fa-caret-right"></i> All Products</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'productnew') active @endif">
			<a href="{{ URL::route("admin/productadd") }}"><i class="fa fa-caret-right"></i> Add Products</a>
		</li>      
	</ul>
  </li>

  <li class="nav-parent @if(strtolower($title) == 'manage attributes') active nav-active @endif">
	<a href=""><i class="fa fa-building"></i> <span>Manage Attributes</span></a>
	<ul class="children">
		<li class="@if(strtolower($sub_title) == 'attributes') active @endif">
			<a href="{{ URL::route("admin/attributes") }}"><i class="fa fa-caret-right"></i> All Attributes</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'attributenew') active @endif">
			<a href="{{ URL::route("admin/attributeadd") }}"><i class="fa fa-caret-right"></i> Add Attributes</a>
		</li>      
	</ul>
  </li>

  <li class="nav-parent @if(strtolower($title) == 'manage events') active nav-active @endif">
	<a href=""><i class="fa fa-info-circle"></i> <span>Manage Events</span></a>
	<ul class="children">
		<li class="@if(strtolower($sub_title) == 'events') active @endif">
			<a href="{{ URL::route("admin/events") }}"><i class="fa fa-caret-right"></i> All Events</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'eventnew') active @endif">
			<a href="{{ URL::route("admin/eventadd") }}"><i class="fa fa-caret-right"></i> Add Events</a>
		</li>      
	</ul>
  </li>

  <li class="nav-parent @if(strtolower($title) == 'manage tasks') active nav-active @endif">
	<a href=""><i class="fa fa-arrow-circle-up"></i> <span>Manage Tasks</span></a>
	<ul class="children">
		<li class="@if(strtolower($sub_title) == 'tasks') active @endif">
			<a href="{{ URL::route("admin/tasks") }}"><i class="fa fa-caret-right"></i> All Tasks</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'tasknew') active @endif">
			<a href="{{ URL::route("admin/taskadd") }}"><i class="fa fa-caret-right"></i> Add Tasks</a>
		</li>      
	</ul>
  </li>

  <li class="nav-parent @if(strtolower($title) == 'manage transactions') active nav-active @endif">
	<a href=""><i class="fa fa-list-alt"></i> <span>Manage Transactions</span></a>
	<ul class="children">
		<li class="@if(strtolower($sub_title) == 'transactions') active @endif">
			<a href="{{ URL::route("admin/transactions") }}"><i class="fa fa-caret-right"></i> All Transactions</a>
		</li>  
		<li class="@if(strtolower($sub_title) == 'transactionnew') active @endif">
			<a href="{{ URL::route("admin/transactionadd") }}"><i class="fa fa-caret-right"></i> Add Transactions</a>
		</li>      
	</ul>
  </li>


      <li><a href="{!!url('/')!!}"><span class="icon color5"><i class="fa fa-th-list"></i></span>Manage Statistics</a></li>
      <li><a href="{!!url('/')!!}"><span class="icon color5"><i class="fa fa-send"></i></span>Settings</a></li>
</ul>