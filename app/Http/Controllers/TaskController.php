<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tasks;

use Session;
use Validator;

class TaskController extends Controller {

	public function store(Request $request){
       $rules = [
          'name' => 'required',
          'assignedto' => 'required',
          'startdate' => 'required',
          'targetcompletiondate' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            Session::flash('status_error', ' Sorry, Enter again! Name, Assigned to, Start Date, Target Completion Date is necessary item.');
            return redirect()->route('admin/taskadd');
        }
        else{
            $name = $request->input('name');
            $assignedto = $request->input('assignedto');
            $completed  = $request->input('completed');
            $startdate = $request->input('startdate');
            $description = $request->input('description');
            $targetcompletiondate = $request->input('targetcompletiondate');
            $notes = $request->input('notes');
            $completiondate = $request->input('completiondate');
            $priority = $request->input('priority');
            $nexttask = $request->input('nexttask');

            if (!$description) {
                $description = "";
            }
            
            $tasks = new Tasks;
            $tasks->name = $name;
            $tasks->assignedto = $assignedto;
            $tasks->completed = $completed;
            $tasks->startdate = $startdate;   
            $tasks->description = $description;   
            $tasks->targetcompletiondate = $targetcompletiondate;   
            $tasks->notes = $notes;   
            $tasks->completiondate = $completiondate;   
            $tasks->priority = $priority;   
            $tasks->nexttask = $nexttask;   

            $tasks->save();

            Session::flash('status_success', 'The information has been saved successfully.');
	        return redirect()->route('admin/taskadd');
        }
    }// end storeAction

    public function edit_task(Request $request){
        $task_id = $request->input('task_id');   
        $name = $request->input('name');
        $assignedto = $request->input('assignedto');
        $completed  = $request->input('completed');
        $startdate = $request->input('startdate');
        $description = $request->input('description');
        $targetcompletiondate = $request->input('targetcompletiondate');
        $notes = $request->input('notes');
        $completiondate = $request->input('completiondate');
        $priority = $request->input('priority');
        $nexttask = $request->input('nexttask');

        Tasks::where('id', $task_id) -> update(array( 'name' => $name, 
                                                     'assignedto' => $assignedto,
                                                     'completed' => $completed,
                                                     'startdate' => $startdate,
                                                     'description' => $description,
                                                     'notes' => $notes,
                                                     'targetcompletiondate' => $targetcompletiondate,
                                                     'completiondate' => $completiondate,
                                                     'priority' => $priority,
                                                     'nexttask' => $nexttask));

        Session::flash('status_success', 'Task has been updated successfully.');
        return redirect()->route('admin/taskadd');
    }

	public function delete(Request $request){
        $taskid = $request->input('id');
        Tasks::find($taskid)->delete();
        // Organisations::where('id',$organisationid)->delete();

        Session::flash('status_success', 'Task has been deleted successfully.');

        return redirect()->route('admin/tasks');
	}
   
}