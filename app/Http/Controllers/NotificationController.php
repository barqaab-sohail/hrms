<?php


namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Notifications\DatabaseNotification;
use App\user;
use DB;
use App\employee;
use App\posting;
use Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('updation')->only('store','create');
    }

    public function index(){
        
    	return view ('hr.notification.notificationList');
    }

    public function create(){
        $employees = employee::all();
    	return view ('hr.notification.createNotification',compact('employees'));
    }

    public function store(request $request){

   	$letter = collect(['subject'=>$request->subject, 'message'=>$request->message]);
    
    if ($request->to=='all'){
        $users = user::all();

    }elseif($request->to=='allManagers'){
        
       
        $userIds = DB::table('postings')
                ->join('users','users.employee_id','=','postings.manager_id')
                ->select('users.id')->get()->unique('id');
        //UserIds convert into collection like [1,2,3] so that we pass it to $user = user::all()->only ([1,2,3]);   
         
    }else{
        $users = user::all()->where('employee_id',$request->to);
    }
   
   	Notification::send($users, new DatabaseNotification($letter));
    return redirect()->route('createNotification')->with('success', 'Notification saved succesfully');
    
    }

    public function show($id){

    	$notification = auth()->user()
                            ->Notifications
                            ->where('id', $id)
                            ->first();
         $notification->markAsRead();
         
        //auth()->user()->notifications()->delete()->where('type', 'App\Notifications\LikedComment')->where('data->model', $comment->id)->delete();
    	return view ('hr.notification.showNotification',compact('notification'));

    }

     public function deleteNotification($id){
    	
        $notification=auth()->user()->Notifications->where('id', $id)->first();
        $notification->delete();
    	return redirect()->route('notificationList')->with('success', 'Notification Delete succesfully');
    }



}
