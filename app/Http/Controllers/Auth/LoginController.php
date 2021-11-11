<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\UserLoginDetails;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//use Illuminate\Support\facades\Auth;
use Auth;
  
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            date_default_timezone_set('Asia/Kolkata'); 
            $login_details = [];
            $login_details['user_id'] = Auth::user()->id;
            $login_details['login_date'] = date('Y-m-d');
            $login_details['login_time'] = date('h:i:s');
            UserLoginDetails::create($login_details);
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}