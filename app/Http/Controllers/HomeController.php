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
        return view('userdashboard');
    }

    public function userAdd()
    {
        return view('userAdd');
    }
    public function userlist()
    {
        $result['data'] = User::get();
        return view('usersList',$result);
    }

    public function userEdit($id)
    {
        
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
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'designation' => 'required',
            ]);


            $userDetails['name'] = $request->name;
            $userDetails['email'] = $request->email;
            $userDetails['password'] = Hash::make($request->password);
            $userDetails['designation'] = $request->designation;

            // Send Mail Start 

            // $name = "nihal";
            // $email = "aman.zestgeek@gmail.com";
            // $title = "Demo";
            // $content = "testing for testing";

            // Mail::send('emails.mail', ['name' => $name, 'email' => $email, 'title' => $title, 'content' => $content], function ($message) {
            //     $message->to('testing6666@yopmail.com')->subject('Subject of the message!');
            // });
            // Send Mail end
            $result = User::create($userDetails);
            
            return redirect()->route('userlist');
        }
        else{
            $userDetails['name'] = $request->name;
            $userDetails['email'] = $request->email;
            $userDetails['password'] = Hash::make($request->password);
            $userDetails['designation'] = $request->designation;
            $result = User::where('id', $request->id)->update($userDetails);
            return redirect()->route('userlist');
        }

    }

    public function deleteUser($id)
    {
        $result = User::where('id',$id)->delete();
        if($result){
        return redirect()->route('userlist')
                        ->with('success','Product deleted successfully');
        }
        else{
            print_r("sorry Somthing went wrong");
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
        }
        else{
            print_r("something wrong!!!please try again");
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
        }
        else{
            print_r("something wrong!!!please try again");
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
        }
        else{
            print_r("something wrong!!!please try again");
        }
        
    }

    public function generate_password()
    {
        $random = Str::random(8);
        print_r($random);
    }

    public function check_email()
    {
        $email = $_GET['email'];
        print_r($email);die;
        if($email != "") 
        {
            $result = User::where('email',$email)->first();
            if($result>0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

                
    }
}
