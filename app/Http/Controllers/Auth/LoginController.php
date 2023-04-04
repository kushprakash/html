<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\TempCart;
use Illuminate\Auth\UserInterface;
use App\Models\User;
use DB;
use App\Cart;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo =  '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function login(Request $request)
     {
     $email = $request->input('email');
     $password = $request->input('password');
    $user = User::where('email', '=', $email)->first();
		 //dd($user);
		  if ($user==null) {
        return back()->with( 'mymsg23' , 'Login Fail, please check email id');
     }
		 if($user->is_active==1){
			  return back()->with( 'mymsg23' , 'Login Fail, Admin Block Your Account');
			 
		}
    
    
     if (!Hash::check($password, $user->password)) {
        return back()->with('mymsg23','Login Fail, pls check password');
     }
          Auth::login($user, $remember = false);
      
        return redirect('/dashboard')->with('message','success');
     }
     
     public function auth2($user){
          Auth::login($user, $remember = false);
          return redirect('/dashboard')->with('message','success');
     }
     
     
}
