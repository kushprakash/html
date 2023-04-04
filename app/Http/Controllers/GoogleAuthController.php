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



}
