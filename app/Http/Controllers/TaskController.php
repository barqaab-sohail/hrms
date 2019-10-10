<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreTask;
use Illuminate\Http\Request;
use App\task;

class TaskController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){


        $taskIds = task::all();
        $output = '';

        $output .='<table id="myTable" class="table table-bordered table-striped" width="100%" cellspacing="0">
                   <thead>
                    
                    <tr>
                        <th>Task Detail</th>
                        <th>Completion Date</th>
                        <th>Remaining Days</th>
                        <th>Status</th>
                        
                        <th  style="text-align: center;"> Actions </th><th></th>
                        
                    </tr>
                    </thead>
                    <tbody>';
                    foreach($taskIds as $taskId){
                        $now = \Carbon\Carbon::now()->format('Y-m-d');
                        $end_date = \Carbon\Carbon::parse($taskId->completion_date);
                        $remainingDyas = $end_date->diffInDays($now);
                       
                    $output .='
                        <tr>
                            <td>'.$taskId->task_detail.'</td>
                            <td>'.$taskId->completion_date.'</td>
                            <td>'.$remainingDyas.'</td>
                            ';
                        
                            if($taskId->status==="Pending"){
                            
                            $output .= '<td><a class="btn btn-warning btn-sm text-white"   onclick="return confirm(\"Are you Sure to Change Status"\)" id="update,id='.$taskId->id.'"  data-toggle="tooltip" data-original-title="Change Status"> <i class="fas fa-pencil-alt text-white "></i>'.$taskId->status.'</a></td>';
                            }else{

                                $output .= '<td><a class="btn btn-success btn-sm text-white"   onclick="return confirm(\"Are you Sure to Change Status"\)" id="update,id='.$taskId->id.'"  data-toggle="tooltip" data-original-title="Change Status"> <i class="fas fa-pencil-alt text-white "></i>'.$taskId->status.'</a></td>';
                            }



                    $output .= '<td>
                                 
                                  <a class="btn btn-info btn-sm" href="'.route('task.edit',['id'=>$taskId->id]).'" data-toggle="tooltip" data-original-title="Edit"> <i class="fas fa-pencil-alt text-white "></i></a>
                                 
                                 </td>
                                 <td>
                                     <form action="'.route('task.destroy',['id'=>$taskId->id]).'" method="DELETE">
                                 
                                 <a class="btn btn-danger btn-sm" oonclick="return confirm(\"Are you Sure to Delete it"\)" id="delete,id='.$taskId->id.'" data-toggle="tooltip" data-original-title="Delete"> <i class="fas fa-trash-alt text-white"></i></a>
                                 </form>
                                 
                                
                                 </td>



                    </tr>';
                        
                    }
                    $output .='
                    </tbody>
                </table>';
            echo $output;
    }

    public function store(StoreTask $request){
    	
    	$data = $request->all();
            
            if($request->filled('completion_date')){
            $data ['completion_date']= \Carbon\Carbon::parse($request->completion_date)->format('Y-m-d');
            }

    	task::create($data);
    	return Redirect::back()->with('success', 'You task has been saved sucessfuly');
    }

    public function update (Request $request, $id){
        $data = task::findOrFail($id);
        if($data->status === 'Pending'){

        $data->update(['status'=>1]);

         }else
         {
            $data->update(['status'=>0]);
         }

        return 'OK';
    }

    public function destroy($id){

    	task::findOrFail($id)->delete(); 
    	return 'OK';
    }

}
