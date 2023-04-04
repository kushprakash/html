<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
     $user =User::create([
            'name' => $data['name'],
            'email' => $data['email'],
           
            'password' => Hash::make($data['password']),
        ]);

        DB::table('users')->where('id',$user->id)->update([
            'phone'=> $data['phone'],
           
        ]);
		
		
		
		
		
		 $session = Session::getId();   
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
				    
                    DB::table('carts_temp')->where('user_id',$session)->delete(); 
            }
		
		 }
		
		 DB::table('wishlist')->where('customer_id',$session)->update([
					 'customer_id'=>$user->id,
					 ]); 
        return $user;
    }
}
