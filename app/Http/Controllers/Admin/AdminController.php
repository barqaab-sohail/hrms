<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\sessions;
use DB;
use App\employee;
use Spatie\Permission\Models\Role;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('updation')->only('activeUsers','setUserRights', 'updateActiveUsers');
    }

    public function activeUsers(){
     // Get time session life time from config.
     $time =  time() - (config('session.lifetime')*60); 

     // Total login users (user can be log on 2 devices will show once.)
     $totalActiveUsers = sessions::where('last_activity','>=', $time)->
     count(DB::raw('DISTINCT user_id'));
     

    // Total active sessions
    // $activeUsers = sessions::where('last_activity','>=', $time)->     get();

     $activeUsers = DB::table('employees')
                    ->join('users','employees.id','=','users.employee_id')
                    ->join('sessions','users.id','=','sessions.user_id')
                    ->select('employees.*','sessions.*','users.*')->where('last_activity','>=', $time)->get();

       return view('admin.reports.activeUserList', compact('activeUsers','totalActiveUsers'));
    }

    public function setUserRights(){
       $employees = employee::where('employee_status_id','1')->with('user')->get();
       $roles = Role::all();
       $roles->forget(4);

       return view('admin.setUserRights', compact('employees','roles'));
    }

    public function updateActiveUsers(Request $request, $id){
       
        $user = User::all()->where('employee_id', $id)->first();
        
        $allRoles = $user->getRoleNames();    
                foreach($allRoles as $role){
                  $user->removeRole($role);
                }
        

        $user->assignRole($request->role_name);
        
        return "OK";
    }

    public function deleteUser($id){
        User::where('employee_id', $id)->firstOrFail()->delete(); 
        return "OK";
    }



}
