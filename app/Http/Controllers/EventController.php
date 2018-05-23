<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Events;

use Session;
use Validator;

class EventController extends Controller {

	public function store(Request $request){
       $rules = [
          'name' => 'required',
          'startdate' => 'required',
          'enddate' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Name, Start Date, End Date is necessary item.');
            return redirect()->route('admin/eventadd');
        }
        else{
            $name = $request->input('name');
            $startdate = $request->input('startdate');
            $description = $request->input('description');
            $enddate = $request->input('enddate');

            if (!$description) {
                $description = "";
            }
            
            $events = new Events;
            $events->name = $name;
            $events->startdate = $startdate;
            $events->description = $description;
            $events->enddate = $enddate;   

            $events->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/eventadd');
        }
    }// end storeAction

        $event_id = $request->input('event_id');   
    public function edit_event(Request $request){

        $name = $request->input('name');
        $startdate = $request->input('startdate');
        $description = $request->input('description');
        $enddate = $request->input('enddate');

        Events::where('id', $event_id) -> update(array( 'name' => $name, 
                                                'startdate' => $startdate,
                                                'description' => $description,
                                                'enddate' => $enddate));

        Session::flash('status_success', 'Event has been updated successfully.');
        return redirect()->route('admin/eventadd');
    }

	public function delete(Request $request){
        $eventid = $request->input('id');
        Events::find($eventid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Product has been deleted successfully.');

        return redirect()->route('admin/events');
	}
   
}