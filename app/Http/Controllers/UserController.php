<?php namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Users;
use App\Models\Agencies;
use App\Models\Photos;
use App\Models\Groups;
use Response;
use Session;
use Validator;
use Auth;
use Hash;

class UserController extends BaseController {

	public function loginAction(Request $request){
        $rules = array(
        	'email' => 'required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
		
        if ($validator->fails()){
        	Session::flash('status_error', 'Sorry. Enter the E-mail or Password, please.');
			return Redirect::route('user/login'); 				
        } else {
        //validation passed
            $credentials = array(
                "email" => $request->input('email'),
                "password" => $request->input('password'), 
            );
            //remeber check
            $remeber = false;
            if($request->input('remember')){
            	$remeber = true;
            } 

            if (Auth::attempt($credentials, $remeber)){	
            	if(Auth::user()->published > 0){	
					if (strcmp(strtolower(Auth::user()->permission), "user") == 0 ) {
						return redirect()->route('user/home');
					} else if (strcmp(strtolower(Auth::user()->permission), "administrator") == 0 ) {
						return redirect()->route('admin/dashboard');
					}
            	}
				Session::flash('status_error', 'Sorry your account does not have sufficient priviledges to log in ');
				return redirect()->route('user/login');
            } else {
	            Session::flash('status_error', 'Sorry. Account with provided E-mail and Password does not exist');
	            return redirect()->route('user/login');
		    }//end auth attempt 
		}//end validation 
    }// end loginAction
}