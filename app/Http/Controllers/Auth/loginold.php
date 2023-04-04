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
		 if($user->is_active=='1'){
			// dd('d');
				 return back()->with( 'mymsg23' , 'Login Fail, please check email id');
			 
		}
     //dd($user);
		 /*
	if($user!=null){
		if($user->id=='36'){
			if(!$request->password){
				 return back()->with( 'mymsg23' , 'Login Fail, please check email id');
			}
		}
		if($user->vendor==3){
			if(!$request->password){
				 return back()->with( 'mymsg23' , 'Login Fail, please check email id');
			}
		}
		else{
			if($user->is_active != 1){
			DB::table('users')->where('id',$user->id)->update([
			'password'=>bcrypt('123456789'),
			
			]);
			$password="123456789";	
				
			}
			else{
				 return back()->with( 'mymsg23' , 'Login Fail, please check email id');
			}
			 
		}
	}
		 */
		 
     
     if (!$user) {
        return back()->with( 'mymsg23' , 'Login Fail, please check email id');
     }
     if (!Hash::check($password, $user->password)) {
        return back()->with('mymsg23','Login Fail, pls check password');
     }
        $session = Session::getId();   
       // dd($session);
        $cart = DB::table('carts_temp')->where('user_id',$session)->get(); 
        $cart1 = DB::table('carts_temp')->where('user_id',$session)->first(); 
         if($cart1!=null){
            foreach ($cart as $r){   
               $result1=DB::table('carts')->where('product_id',$r->product_id)->where('user_id',$user->id)->first();   
                    if($result1 == null){
                        DB::table('carts_temp')->insert([
                        'product_id'=>$r->product_id,
                        'user_id'=>$user->id,
                        'quantity'=>$r->quantity,
                        'price'=>$r->price,
                        'size'=>$r->size,
                        'color_id'=>$r->color_id,
                        'vendor_id'=>$r->vendor_id
                    ]);
                         
                    } 
				//dd('dafd');
				    
                    DB::table('carts_temp')->where('user_id',$session)->delete(); 
            }
         }
		  DB::table('wishlist')->where('customer_id',$session)->update([
					 'customer_id'=>$user->id,
					 ]); 
      
      
         Auth::login($user, $remember = false);
      
        return redirect('/dashboard')->with('message','success');
     }
     
     
}
