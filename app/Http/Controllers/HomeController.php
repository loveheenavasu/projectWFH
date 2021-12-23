<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLoginDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Mail;
use Auth;
use Illuminate\Mail\Mailable;

class HomeController extends Controller
{
    public $name;
    public $designation;
    public $email;
    public $password;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        $project['result'] = UserLoginDetails::where('user_id',Auth::user()->id)
        ->where('login_date',date('Y-m-d'))
        ->get();
        // echo "<pre>";print_r($project);die;
        return view('userdashboard',$project);
    }

    public function userAdd()
    {
        return view('userAdd');
    }
    public function userlist()
    {
        
        $result['data'] = User::where('role','user')->get();
        return view('usersList',$result);
    }

    public function userEdit(Request $request)
    {  
        
        $id = $request['id'];
        $result['data'] = User::where('id',$id)->first();
        return view('userUpdate',$result);
    }

    public function attendance_list()
    {
       $data['result'] =  UserLoginDetails::join('users','users.id','=','user_login_details.user_id')
            ->get();
        return view('attendanceList',$data);
    }

    public function addUser(Request $request)
    {
        $userDetails=[];
        $subject=$request->email;
        if($request->id == ''){
            $userDetails['name'] = $request->name;
            $userDetails['email'] = $request->email;
            $userDetails['password'] = Hash::make($request->password);
            $userDetails['designation'] = $request->designation;

            // Send Mail Start 

            $name = $request->name;
            $email = $request->email;
            $password = $request->password;

            $data = Mail::send('emails.user_login_details', ['name' => $name, 'email' => $email,'password' => $password], function ($message) use($request) {
                $message->to($request->email)->subject('Users Credentials');
            });
            // Send Mail end
            $data_result = User::create($userDetails);
            $result['data'] = User::where('role','user')->get();
            return view('usersList',$result);
        }
        else{
            $userDetails['name'] = $request->name;
            $userDetails['email'] = $request->email;
            $userDetails['password'] = Hash::make($request->password);
            $userDetails['designation'] = $request->designation;
            $new_result = User::where('id', $request->id)->update($userDetails);
            $result['data'] = User::where('role','user')->get();
            return view('usersList',$result);
        }

    }

    public function deleteUser(Request $request)
    {
        $id = $request['id'];
        $result = User::where('id',$id)->delete();
        if($result){
            $response['data'] = User::where('role','user')->get();
            return view('usersList',$response);
        }
        else{
            $response['data'] = User::where('role','user')->get();
            return view('usersList',$response);
        }
    }
    public function start_login()
    {
        $start_time = $_GET['start_time'];
        date_default_timezone_set('Asia/Kolkata'); 
        if (UserLoginDetails::where('login_date',date('Y-m-d'))
            ->where('user_id',Auth::user()->id)
            ->exists()) {
                    return 1;
            }
            else{
                $login_details = [];
                $login_details['user_id'] = Auth::user()->id;
                $login_details['login_date'] = date('Y-m-d');
                $login_details['login_time'] = $start_time;
                $project = UserLoginDetails::create($login_details);
            }
        
    }
    
    
    public function start_lunch()
    {
        $start_lunch = $_GET['start_lunch'];
        $user_id = Auth::user()->id;
        $project = UserLoginDetails::where([
           'user_id' => $user_id,
           'login_date' => date('Y-m-d'),
        ])->update(['lunch_time_start' => $start_lunch]);
        
        if($project){
            return 0;
        }
        else{
            return 1;
        }
        
    }
    
    public function stop_lunch()
    {
        $stop_lunch = $_GET['stop_lunch'];
        $user_id = Auth::user()->id;
        $project = UserLoginDetails::where([
           'user_id' => $user_id,
           'login_date' => date('Y-m-d'),
        ])->update(['lunch_time_end' => $stop_lunch]);
        
        if($project){
            return 0;
        }
        else{
            return 1;
        }
        
    }

    public function stop_login()
    {
        $stop_time = $_GET['stop_time'];
        $user_id = Auth::user()->id;
        $project = UserLoginDetails::where([
           'user_id' => $user_id,
           'login_date' => date('Y-m-d'),
        ])->update(['logout_time' => $stop_time]);
        
        if($project){
            return 0;
        }
        else{
            return 1;
        }
        
    }

    public function generate_password()
    {
        $random = Str::random(8);
        print_r($random);
    }

    public function check_email(Request $request)
    {
        $email = $request['email'];
        if($email != "") 
        {
            $result = User::where('email',$email)->get();
            $result = $result->count();
            if($result>0)
            {
                echo(json_encode("Email already in use!"));
            }
            else{
                echo(json_encode(true));
            }
        }

                
    }
}
