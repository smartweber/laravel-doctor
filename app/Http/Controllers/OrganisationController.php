<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organisations;

use Session;
use Validator;

class OrganisationController extends Controller {

	public function store(Request $request){
       $rules = [
          'name' => 'required',
          'registrationcountry' => 'required',
          'registrationcity' => 'required',
          'contactphone' => 'required',
          'email' => 'required|email',   
          'country' => 'required',   
          'cityortown' => 'required',   
          'postalcode' => 'required',   

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Name, Registration city, Registration country, Contact Phone, Email, Country, City/Town, Postal code is necessary item.');
            return redirect()->route('admin/organisationadd');
        }
        else{
            $name = $request->input('name');
            $type = $request->input('type');
            $jurisdiction = $request->input('jurisdiction');
            $registrationcountry = $request->input('registrationcountry');
            $registrationcity = $request->input('registrationcity');
            $openeddate = $request->input('openeddate');
            $dateofincorporation = $request->input('dateofincorporation');
            $closeddate = $request->input('closeddate');
            $sector= $request->input('sector');
            $industry = $request->input('industry');
            $description = $request->input('description');
            $contactphone = $request->input('contactphone');
            $email= $request->input('email');
            $fax = $request->input('fax');
            $website = $request->input('website');
            $addressname = $request->input('addressname');
            $country =$request->input('country');
            $province = $request->input('province');
            $cityortown = $request->input('cityortown');
            $pobox = $request->input('pobox');
            $district = $request->input('district');
            $roadnumber = $request->input('roadnumber');
            $roadname = $request->input('roadname');
            $roadtype = $request->input('roadtype');
            $additionalroadvalue = $request->input('additionalroadvalue');
            $complexname = $request->input('complexname');
            $buildingnameornumber = $request->input('buildingnameornumber');
            $floororlevel = $request->input('floororlevel');
            $roomorunitorsuite = $request->input('roomorunitorsuite');
            $postalcode = $request->input('postalcode');
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            $individuals = new Organisations;
            $individuals->name = $name;
            $individuals->type = $type;
            $individuals->jurisdiction = $jurisdiction;
            $individuals->registrationcountry = $registrationcountry;
            $individuals->registrationcity = $registrationcity;
            $individuals->dateofincorporation = $dateofincorporation;
            $individuals->closeddate = $closeddate;
            $individuals->sector = $sector;
            $individuals->industry = $industry;

            if (!$description) {
                $description = "";
            }

            $individuals->description = $description;
            $individuals->contactphone = $contactphone;
            $individuals->email = $email;
            $individuals->fax = $fax;
            $individuals->website = $website;
            $individuals->addressname = $addressname;
            $individuals->country = $country;
            $individuals->province = $province;
            $individuals->cityortown = $cityortown;
            $individuals->pobox = $pobox;
            $individuals->district = $district;
            $individuals->roadnumber = $roadnumber;
            $individuals->roadname = $roadname;
            $individuals->roadtype = $roadtype;
            $individuals->additionalroadvalue = $additionalroadvalue;
            $individuals->complexname = $complexname;
            $individuals->buildingnameornumber = $buildingnameornumber;
            $individuals->floororname = $floororlevel;
            $individuals->roomorunitorsuite = $roomorunitorsuite;
            $individuals->postalcode = $postalcode;
            $individuals->latitude = $latitude;
            $individuals->longitude = $longitude;

            $individuals->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/individualAdd');
        }
    }// end loginAction

    public function edit_organisation(Request $request){

        $organisationid = $request->input('organisation_id');   

        $name = $request->input('name');
        $type = $request->input('type');
        $jurisdiction = $request->input('jurisdiction');
        $registrationcountry = $request->input('registrationcountry');
        $registrationcity = $request->input('registrationcity');
        $openeddate = $request->input('openeddate');
        $dateofincorporation = $request->input('dateofincorporation');
        $closeddate = $request->input('closeddate');
        $sector= $request->input('sector');
        $industry = $request->input('industry');
        $description = $request->input('description');
        $contactphone = $request->input('contactphone');
        $email= $request->input('email');
        $fax = $request->input('fax');
        $website = $request->input('website');
        $addressname = $request->input('addressname');
        $country =$request->input('country');
        $province = $request->input('province');
        $cityortown = $request->input('cityortown');
        $pobox = $request->input('pobox');
        $district = $request->input('district');
        $roadnumber = $request->input('roadnumber');
        $roadname = $request->input('roadname');
        $roadtype = $request->input('roadtype');
        $additionalroadvalue = $request->input('additionalroadvalue');
        $complexname = $request->input('complexname');
        $buildingnameornumber = $request->input('buildingnameornumber');
        $floororlevel = $request->input('floororlevel');
        $roomorunitorsuite = $request->input('roomorunitorsuite');
        $postalcode = $request->input('postalcode');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        Organisations::where('id', $organisationid) -> update(array('name' => $name, 
                                                                'type' => $type,
                                                                'jurisdiction' => $jurisdiction,
                                                                'registrationcountry' => $registrationcountry,
                                                                'registrationcity' => $registrationcity,
                                                                'openeddate' => $openeddate,
                                                                'dateofincorporation' => $dateofincorporation,
                                                                'closeddate' => $closeddate,
                                                                'sector'=> $sector,
                                                                'industry'=> $industry,
                                                                'description'=> $description,
                                                                'contactphone'=> $contactphone,
                                                                'email'=> $email,
                                                                'fax'=> $fax,
                                                                'website'=> $website,
                                                                'addressname'=> $addressname,
                                                                'country'=> $country,
                                                                'province'=> $province,
                                                                'cityortown'=> $cityortown,
                                                                'pobox'=> $pobox,
                                                                'district'=> $district,
                                                                'roadnumber'=> $roadnumber,
                                                                'roadname'=> $roadname,
                                                                'roadtype'=> $roadtype,
                                                                'additionalroadvalue'=> $additionalroadvalue,
                                                                'complexname'=> $complexname,
                                                                'buildingnameornumber'=> $buildingnameornumber,
                                                                'floororname'=> $floororlevel,
                                                                'roomorunitorsuite'=> $roomorunitorsuite,
                                                                'postalcode'=> $postalcode,
                                                                'latitude'=> $latitude,
                                                                'longitude'=> $longitude));

        Session::flash('status_success', 'Organisation has been updated successfully.');
        return redirect()->route('admin/organisationadd');
    }

	public function delete(Request $request){
        $organisationid = $request->input('id');
        Organisations::find($organisationid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Organisation has been deleted successfully.');
        return redirect()->route('admin/organisations');
	}
   
}