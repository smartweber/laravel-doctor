<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Auth;
use Session;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		//		
		parent::boot($router);
		$router->filter('auth', function()
		{
		    if (Auth::guest()){
		    	Session::flash('status_error', '&nbsp;You must log in.&nbsp;&nbsp;Enter the E-mail or Password, please.');
		    	return redirect()->route("user/login");}
		});

		$router->filter('auth.superadmin', function()
		{
		    if (Auth::user()->role != "SuperAdmin") 
		    	return redirect()->to('/')->with('error', 'You are not allowed to access this location');
		});

		$router->filter('auth.reseller', function()
		{
		    if (Auth::user() && Auth::user()->role != "Reseller")
		    	return redirect()->to('/')->with('error', 'You are not allowed to access this location');    	
		});

		$router->filter('auth.customer', function()
		{
		    if (Auth::user() && Auth::user()->role != "Customer")
		    	return redirect()->to('/')->with('error', 'You are not allowed to access this location');  
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
