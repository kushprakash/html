<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

require_once '/home/gameskraftcafe/public_html/google/vendor/autoload.php';

use Google_Client;
use GuzzleHttp\Client;
use Google_Service_Oauth2;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use DB;
use App\Cart;




class GoogleAuthController extends Controller
{
    
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
    
    public function loginWithGoogle()
{
    $client = new Google_Client();
    $client->setAuthConfig(app_path('client_secret.json'));
    $client->addScope('email');
    $client->addScope('profile');
    $client->setRedirectUri('https://gameskraftcafe.in/login/google/callback');

    $auth_url = $client->createAuthUrl();
    return redirect()->away($auth_url);
}



public function callback(Request $request)
{
    

    $code=$request->code;
    
   


    $client = new Google_Client();
    $client->setAuthConfig(app_path('client_secret.json'));
    $client->setRedirectUri('https://gameskraftcafe.in/login/google/callback');
    $client->fetchAccessTokenWithAuthCode($code);
    
    // print_r($client);die;

    $google_service = new Google_Service_Oauth2($client);
    $google_user = $google_service->userinfo->get();
   // dd( $google_user);
    
    
    $s=$google_user->email;
    $r= explode('@',$s);
    if($r[1]=='gameskraft.com'){
     

    $user = User::where('email', $google_user->email)->first();
    
 
    
   
    if(!$user) {
        $user = new User;
        $user->name = $google_user->name;
        $user->email = $google_user->email;
        $user->save();
    }

     Auth::login($user, $remember = false);
     return redirect('/index')->with('message','success');
 
} else {
    
    return redirect('https://gameskraftcafe.in')->with('mymsg23','Invalid User Details');
}
 
 
}

    public function createorder()
    {
        $rand = rand(1111111111, 9999999999);
        $user = new User;
        $user->name = $rand;
        $user->email = $rand;
        $user->save();

        $user = User::where('email', $rand)->first();

        $sakmks = DB::table('order_detail')->orderby('id', 'desc')->first();
        //dd($sakmks);
        if ($sakmks != null) {
            $skmsa = $sakmks->id;
        } else {
            $skmsa = 0;
        }
        $order_id = $skmsa + 1;
        $address_id = 2;

        $carts =    DB::table('carts')->join('products', 'carts.product_id', '=', 'products.id')->where('products.trending', 0)->where('carts.user_id', $user->id)->select('carts.*')->get();


        foreach ($carts as $cat) {
            $productdetail = DB::table('products')->where('id', $cat->product_id)->first();
            if ($productdetail != null) {

                $productname[] = $productdetail->name;
            } else {
                $productname = "";
            }
        }


        foreach ($carts as $cart) {

            $product_id[] = $cart->product_id;
            $quantity[] = $cart->quantity;
            $unit_price[] = $cart->price;
            $size[] = $cart->size;
            $color[] = $cart->color_id;
            $vendor_id[] = $cart->vendor_id;
            $catid[] = $cart->cat_id;
        }



        $reg1 = new OrderDetail;


        $reg1->payment_request_id = $order_id;
        $reg1->price = '10,20';
        $reg1->order_id = $order_id;
        $reg1->address_id = $address_id;
        $reg1->product_id = '1,2';
        $reg1->payment_status = 'pending';
        $reg1->user_id = $user->id;
        $reg1->size_id = '1,2';
        $reg1->color_id = '1,2';
        $reg1->quantity = '1,2';
        $reg1->vendor_id = '1,2';
        $reg1->gst = 5;
        $reg1->shipping = 10;
        $reg1->total_amount = 50;
        $reg1->imgorde = '';
        $reg1->remarksk = 'test';
        $reg1->wallet = 10;
        $reg1->created_at = date('Y-m-d');
        $reg1->save();



        DB::table('wallet')->insert([
            'user_id' => $user->id,
            'amount' => 10,
            'order_id' => $order_id,
            'created_at' => date('Y-m-d'),


        ]);
    }



}
