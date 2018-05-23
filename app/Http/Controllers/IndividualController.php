<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Individuals;

use Session;
use Validator;

class IndividualController extends Controller {

	public function store(Request $request){
       $rules = [
          'firstname' => 'required',
          'middlename' => 'required',
          'familyname' => 'required',
          'emailtype' => 'required',
          'emailaddress' => 'required|email',          
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! First Name, Middle Name, Family Name, Email Type, Email address is necessary item.');
            return redirect()->route('admin/individualAdd');
        }
        else{
            $formalsuffix = $request->input('formalsuffix');
            $firstname = $request->input('firstname');
            $middlename = $request->input('middlename');
            $familyname = $request->input('familyname');
            $familynamesuffix = $request->input('familynamesuffix');
            $preferredname = $request->input('preferredname');
            $endnamesuffix = $request->input('endnamesuffix');
            $gender = $request->input('gender');
            $dateofbirth= $request->input('dateofbirth');
            $age = $request->input('age');
            $countryofbirth = $request->input('countryofbirth');
            $cityofbirth = $request->input('cityofbirth');
            $nationality= $request->input('nationality');
            $dateofdeath = $request->input('dateofdeath');
            $idtype = $request->input('idtype');
            $idnumber = $request->input('idnumber');
            $phonetype = $request->input('phonetype');
            $phonenumber = $request->input('phonenumber');
            $emailtype = $request->input('emailtype');
            $emailaddress = $request->input('emailaddress');
            $socialmediatype = $request->input('socialmediatype');
            $socialmediaid = $request->input('socialmediaid');
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
            $floororname = $request->input('floororname');
            $roomorunitorsuite = $request->input('roomorunitorsuite');
            $postalcode = $request->input('postalcode');
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            $individuals = new Individuals;
            $individuals->formalsuffix = $formalsuffix;
            $individuals->firstname = $firstname;
            $individuals->middlename = $middlename;
            $individuals->familyname = $familyname;
            $individuals->familynamesuffix = $familynamesuffix;
            $individuals->preferredname = $preferredname;
            $individuals->endnamesuffix = $endnamesuffix;
            $individuals->gender = $gender;
            $individuals->dateofbirth = $dateofbirth;
            $individuals->age = $age;
            $individuals->countryofbirth = $countryofbirth;
            $individuals->cityofbirth = $cityofbirth;
            $individuals->nationality = $nationality;
            $individuals->dateofdeath = $dateofdeath;
            $individuals->idtype = $idtype;
            $individuals->idnumber = $idnumber;
            $individuals->phonetype = $phonetype;
            $individuals->phonenumber = $phonenumber;
            $individuals->emailtype = $emailtype;
            $individuals->emailaddress = $emailaddress;
            $individuals->socialmediatype = $socialmediatype;
            $individuals->socialmediaid = $socialmediaid;
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
            $individuals->floororname = $floororname;
            $individuals->roomorunitorsuite = $roomorunitorsuite;
            $individuals->postalcode = $postalcode;
            $individuals->latitude = $latitude;
            $individuals->longitude = $longitude;

            $individuals->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/individualAdd');
        }
    }// end loginAction

    public function edit_individual(Request $request){

        $individualid = $request->input('individual_id');   

        $formalsuffix = $request->input('formalsuffix');
        $firstname = $request->input('firstname');
        $middlename = $request->input('middlename');
        $familyname = $request->input('familyname');
        $familynamesuffix = $request->input('familynamesuffix');
        $preferredname = $request->input('preferredname');
        $endnamesuffix = $request->input('endnamesuffix');
        $gender = $request->input('gender');
        $dateofbirth= $request->input('dateofbirth');
        $age = $request->input('age');
        $countryofbirth = $request->input('countryofbirth');
        $cityofbirth = $request->input('cityofbirth');
        $nationality= $request->input('nationality');
        $dateofdeath = $request->input('dateofdeath');
        $idtype = $request->input('idtype');
        $idnumber = $request->input('idnumber');
        $phonetype = $request->input('phonetype');
        $phonenumber = $request->input('phonenumber');
        $emailtype = $request->input('emailtype');
        $emailaddress = $request->input('emailaddress');
        $socialmediatype = $request->input('socialmediatype');
        $socialmediaid = $request->input('socialmediaid');
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
        $floororname = $request->input('floororname');
        $roomorunitorsuite = $request->input('roomorunitorsuite');
        $postalcode = $request->input('postalcode');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        Individuals::where('id', $individualid) -> update(array('formalsuffix' => $formalsuffix, 
                                                                'firstname' => $firstname,
                                                                'middlename' => $middlename,
                                                                'familyname' => $familyname,
                                                                'familynamesuffix' => $familynamesuffix,
                                                                'preferredname' => $preferredname,
                                                                'endnamesuffix' => $endnamesuffix,
                                                                'gender' => $gender,
                                                                'dateofbirth'=> $dateofbirth,
                                                                'age'=> $age,
                                                                'countryofbirth'=> $countryofbirth,
                                                                'cityofbirth'=> $cityofbirth,
                                                                'nationality'=> $nationality,
                                                                'dateofdeath'=> $dateofdeath,
                                                                'idtype'=> $idtype,
                                                                'idnumber'=> $idnumber,
                                                                'phonetype'=> $phonetype,
                                                                'phonenumber'=> $phonenumber,
                                                                'emailtype'=> $emailtype,
                                                                'emailaddress'=> $emailaddress,
                                                                'socialmediatype'=> $socialmediatype,
                                                                'socialmediaid'=> $socialmediaid,
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
                                                                'floororname'=> $floororname,
                                                                'roomorunitorsuite'=> $roomorunitorsuite,
                                                                'postalcode'=> $postalcode,
                                                                'latitude'=> $latitude,
                                                                'longitude'=> $longitude));

        Session::flash('status_success', 'Individual has been updated successfully.');
        return redirect()->route('admin/individualAdd');
    }

	public function delete(Request $request){
        $individualid = $request->input('id');
        Individuals::where('id',$individualid)->delete();

        Session::flash('status_success', 'Individual has been deleted successfully.');
        return redirect()->route('admin/individualAdd');
	}
   
}