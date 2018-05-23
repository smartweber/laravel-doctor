<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Models\Individuals;
use App\Models\Organisations;
use App\Models\Products;
use App\Models\Attributes;
use App\Models\Events;
use App\Models\Tasks;
use App\Models\Transactions;


/*   SignIn Site   */
Route::get("/", function(){
    return view("auth/login");
});

Route::get('/page', function() {
   return 'Hello world!';
});

Route::get('/admin', function(){	
	return redirect()->route("user/login");
});

Route::post("user/login", array(
	"uses" => "UserController@loginAction"
));

Route::get("/", array(
	"as" => "user/login", function(){
    return view("auth/login");
}));


/* 
//Authorized BY Administrator
*/
Route::group(array("before" => "auth|auth.admin"), function(){
	//Route to admin dashboard
	Route::get("admin/dashboard", array(
		"as" => "admin/dashboard", function(){
		$user = Auth::user();

		return view("admin/dashboard")
				->with("title","Dashboard")
				->with("sub_title", "")
				->with("user", $user);	
	}));

	/*    Manage Individuals    */
	Route::get("admin/individuals", array(
		"as" => "admin/individuals", function(){
		$user = Auth::user();
		$individuals = DB::table('individuals')
					->select('individuals.id',
							 'individuals.preferredname', 
							 'individuals.firstname',
							 'individuals.middlename', 
							 'individuals.gender', 
							 'individuals.nationality', 
							 'individuals.age', 
							 'individuals.phonenumber', 
							 'individuals.emailaddress', 
							 'individuals.socialmediaid')
					->get();

	    return view("admin/individuals")
	    		->with('user',$user)
	    		->with('title', "Manage Individuals")
	    		->with('sub_title', "individuals")
	    		->with('individuals', $individuals);
	}));

	//Route to new individuals for administrator
	Route::get("admin/individualAdd", array(
		"as" => "admin/individualAdd", function(){
		$user = Auth::user();

		return View::make("admin/individualAdd")
				->with("title","Manage Individuals")
				->with("sub_title","individualnew")
				->with("user", $user);
	}));

	//Route to edit Individuals for administrator
	Route::get("admin/edit_individual/{id}", array(
		"as" => "admin/edit_individual", function($id){
		$user = Auth::user();
		$individuals = DB::table('individuals')
					->where('individuals.id',$id)
					->first();
		$individualid = Individuals::find($id);

		return View::make("admin.individualedit")
				->with("title","individual_edit")
				->with("sub_title", "")
	    		->with('individuals', $individuals)
				->with("user", $user)
				->with('individualid', $individualid);
		
	}));

	// //Route to new Individuals for administrator
	// Route::get("admin/individualAdd", array(
	// 	"as" => "admin/individualAdd", function(){
	// 	$user = Auth::user();

	// 	return View::make("admin/individualAdd")
	// 			->with("title","individual")
	// 			->with("sub_title","individualnew")
	// 			->with("user", $user);
	// }));

		/*    Manage Organisations    */
	Route::get("admin/organisations", array(
		"as" => "admin/organisations", function(){
		$user = Auth::user();
		$organisations = DB::table('organisations')
					->select('organisations.id',
							 'organisations.name',
							 'organisations.registrationcity', 
							 'organisations.contactphone',
							 'organisations.fax', 
							 'organisations.email', 
							 'organisations.website')
					->get();

	    return view("admin/organisations")
	    		->with('user',$user)
	    		->with('title', "Manage Organisations")
	    		->with('organisations', $organisations)
	    		->with('sub_title', "organisations");
	}));

	//Route to new Organisations for administrator
	Route::get("admin/organisationadd", array(
		"as" => "admin/organisationadd", function(){
		$user = Auth::user();

		return View::make("admin/organisationAdd")
				->with("title","Manage Organisations")
				->with("sub_title","organisationnew")
				->with("user", $user);
	}));

	//Route to edit Organisations for administrator
	Route::get("admin/edit_organisation/{id}", array(
		"as" => "admin/edit_organisation", function($id){
		$user = Auth::user();
		$organisations = DB::table('organisations')
					->where('organisations.id',$id)
					->first();
		$organisationid = Organisations::find($id);

		return View::make("admin.organisationedit")
				->with("title","organisation_edit")
				->with("sub_title", "")
	    		->with('organisations', $organisations)
				->with("user", $user)
				->with('organisationid', $organisationid);
	}));

	/*    Manage Products    */
	Route::get("admin/products", array(
		"as" => "admin/products", function(){
		$user = Auth::user();
		$products = DB::table('products')
					->select('products.id',
							 'products.name',
							 'products.identitycode')
					->get();

	    return view("admin/products")
	    		->with('user',$user)
	    		->with('title', "Manage Products")
	    		->with('products', $products)
	    		->with('sub_title', "products");
	}));

	//Route to new Products for administrator
	Route::get("admin/productadd", array(
		"as" => "admin/productadd", function(){
		$user = Auth::user();

		return View::make("admin/productadd")
				->with("title","Manage Products")
				->with("sub_title","productnew")
				->with("user", $user);
	}));

	//Route to edit Products for administrator
	Route::get("admin/edit_product/{id}", array(
		"as" => "admin/edit_product", function($id){
		$user = Auth::user();
		$products = DB::table('products')
					->where('products.id',$id)
					->first();
		$productid = Products::find($id);

		return View::make("admin.productedit")
				->with("title","productedit")
				->with("sub_title", "")
	    		->with('products', $products)
				->with("user", $user)
				->with('productid', $productid);
	}));

	Route::get('admin/go_products', array(
		"as" => "admin/go_products", function(){	
		return redirect()->route("admin/products");
	}));

	/*    Manage Attributes    */
	Route::get("admin/attributes", array(
		"as" => "admin/attributes", function(){
		$user = Auth::user();
		$attributes = DB::table('attributes')
					->select('attributes.id',
							 'attributes.attributename',
							 'attributes.parentattribute',
							 'attributes.attributecharactertype',
							 'attributes.attributevalue',
							 'attributes.attributeunitvalue')
					->get();

	    return view("admin/attributes")
	    		->with('user',$user)
	    		->with('title', "Manage Attributes")
	    		->with('attributes', $attributes)
	    		->with('sub_title', "attributes");
	}));

	//Route to new Attributes for administrator
	Route::get("admin/attributeadd", array(
		"as" => "admin/attributeadd", function(){
		$user = Auth::user();

		return View::make("admin/attributeadd")
				->with("title","Manage Attributes")
				->with("sub_title","attributenew")
				->with("user", $user);
	}));

	//Route to edit Attributes for administrator
	Route::get("admin/edit_attribute/{id}", array(
		"as" => "admin/edit_attribute", function($id){
		$user = Auth::user();
		$attributes = DB::table('attributes')
					->where('attributes.id',$id)
					->first();
		$attributeid = Attributes::find($id);

		return View::make("admin.attributeedit")
				->with("title","attributeedit")
				->with("sub_title", "")
	    		->with('attributes', $attributes)
				->with("user", $user)
				->with('attributeid', $attributeid);
	}));

	/*    Manage Events    */
	Route::get("admin/events", array(
		"as" => "admin/events", function(){
		$user = Auth::user();
		$events = DB::table('events')
					->select('events.id',
							 'events.name',
							 'events.startdate',
							 'events.enddate')
					->get();

	    return view("admin/events")
	    		->with('user',$user)
	    		->with('title', "Manage Events")
	    		->with('events', $events)
	    		->with('sub_title', "events");
	}));

	//Route to new Events for administrator
	Route::get("admin/eventadd", array(
		"as" => "admin/eventadd", function(){
		$user = Auth::user();

		return View::make("admin/eventadd")
				->with("title","Manage Events")
				->with("sub_title","eventnew")
				->with("user", $user);
	}));

	//Route to edit Events for administrator
	Route::get("admin/edit_event/{id}", array(
		"as" => "admin/edit_event", function($id){
		$user = Auth::user();
		$events = DB::table('events')
					->where('events.id',$id)
					->first();
		$eventid = Events::find($id);

		return View::make("admin.eventeedit")
				->with("title","eventeedit")
				->with("sub_title", "")
	    		->with('events', $events)
				->with("user", $user)
				->with('eventid', $eventid);
	}));

	/*    Manage Tasks    */
	Route::get("admin/tasks", array(
		"as" => "admin/tasks", function(){
		$user = Auth::user();
		$tasks = DB::table('tasks')
					->select('tasks.id',
							 'tasks.name',
							 'tasks.assignedto',
							 'tasks.startdate',
							 'tasks.targetcompletiondate',
							 'tasks.completiondate',
							 'tasks.priority',
							 'tasks.nexttask')
					->get();

	    return view("admin/tasks")
	    		->with('user',$user)
	    		->with('title', "Manage Tasks")
	    		->with('tasks', $tasks)
	    		->with('sub_title', "tasks");
	}));

	//Route to new Tasks for administrator
	Route::get("admin/taskadd", array(
		"as" => "admin/taskadd", function(){
		$user = Auth::user();

		return View::make("admin/taskadd")
				->with("title","Manage Tasks")
				->with("sub_title","tasknew")
				->with("user", $user);
	}));

	//Route to edit Events for administrator
	Route::get("admin/edit_task/{id}", array(
		"as" => "admin/edit_task", function($id){
		$user = Auth::user();
		$tasks = DB::table('tasks')
					->where('tasks.id',$id)
					->first();
		$taskid = Tasks::find($id);

		return View::make("admin.tasksedit")
				->with("title","Manage Tasks")
				->with("sub_title", "tasksedit")
	    		->with('tasks', $tasks)
				->with("user", $user)
				->with('taskid', $taskid);
	}));

	/*    Manage Transactions    */
	Route::get("admin/transactions", array(
		"as" => "admin/transactions", function(){
		$user = Auth::user();
		$transactions = DB::table('transactions')
					->select('transactions.id',
							 'transactions.name',
							 'transactions.payee',
							 'transactions.beneficiary',
							 'transactions.transactionnumber',
							 'transactions.transactiontype',
							 'transactions.transactionvalue',
							 'transactions.currency',
							 'transactions.datereceived')
					->get();

	    return view("admin/transactions")
	    		->with('user',$user)
	    		->with('title', "Manage Transactions")
	    		->with('transactions', $transactions)
	    		->with('sub_title', "transactions");
	}));

	//Route to edit Transactions for administrator
	Route::get("admin/edit_transaction/{id}", array(
		"as" => "admin/edit_transaction", function($id){
		$user = Auth::user();
		$transactions = DB::table('transactions')
					->where('transactions.id',$id)
					->first();
		$transactionid = Transactions::find($id);

		return View::make("admin.transactionedit")
				->with("title","Manage Transactions")
				->with("sub_title", "transactions")
	    		->with('transactions', $transactions)
				->with("user", $user)
				->with('transactionid', $transactionid);
	}));

	//Route to new Transactions for administrator
	Route::get("admin/transactionadd", array(
		"as" => "admin/transactionadd", function(){
		$user = Auth::user();

		return View::make("admin/transactionadd")
				->with("title","Manage Transactions")
				->with("sub_title","transactionnew")
				->with("user", $user);
	}));

	Route::post("admin/set_individual",array(
	    "uses" => "IndividualController@store"
	));

	Route::post("individual/delete",array(
	    "uses" => "IndividualController@delete"
	));

	Route::post("admin/edit_individual",array(
	    "uses" => "IndividualController@edit_individual"
	));

	Route::post("admin/set_organisation",array(
	    "uses" => "OrganisationController@store"
	));

	Route::post("admin/edit_organisation",array(
	    "uses" => "OrganisationController@edit_organisation"
	));

	Route::post("organisation/delete",array(
	    "uses" => "OrganisationController@delete"
	));

	Route::post("admin/set_product",array(
	    "uses" => "ProductController@store"
	));

	Route::post("admin/edit_product",array(
	    "uses" => "ProductController@edit_product"
	));

	Route::post("product/delete",array(
	    "uses" => "ProductController@delete"
	));

	Route::post("admin/set_attribute",array(
	    "uses" => "AttributeController@store"
	));

	Route::post("admin/edit_attribute",array(
	    "uses" => "AttributeController@edit_attribute"
	));

	Route::post("attribute/delete",array(
	    "uses" => "AttributeController@delete"
	));

	Route::post("admin/set_event",array(
	    "uses" => "EventController@store"
	));

	Route::post("admin/edit_event",array(
	    "uses" => "EventController@edit_event"
	));

	Route::post("event/delete",array(
	    "uses" => "EventController@delete"
	));

	Route::post("admin/set_task",array(
	    "uses" => "TaskController@store"
	));

	Route::post("admin/edit_task",array(
	    "uses" => "TaskController@edit_task"
	));

	Route::post("task/delete",array(
	    "uses" => "TaskController@delete"
	));

	Route::post("admin/set_transaction",array(
	    "uses" => "TransactionController@store"
	));

	Route::post("admin/edit_transaction",array(
	    "uses" => "TransactionController@edit_transaction"
	));

	Route::post("transaction/delete",array(
	    "uses" => "TransactionController@delete"
	));
});

/*
// Log user out
*/
Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('user/login')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
