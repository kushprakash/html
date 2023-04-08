<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\PaymentModel;
use App\OrderDetail;
use Razorpay\Api\Api;
use App\SubOrder;
use App\UserAddress;
use App\Models\User;
use App\VendorDetail;
use App\PasswordReset;
use Hash;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
use  PHPMailer\PHPMailer\SMTP;
class MainController extends Controller
{

	public function mailf(Request $req){

		$to = $req->email;

		$token=0;
		require base_path("vendor/autoload.php");
		$mail = new PHPMailer();     // Passing `true` enables exceptions

		$subject = 'Password Reset';
		$email_message = "hello";


		try{ 
			// Email server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();    
			$mail->SMTPSecure = 'ssl';

			$mail->Host       = 'smtp.gmail.com'; 
			$mail->Port       = '465';
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'dali4978234@gmail.com';                     //SMTP username
			$mail->Password   = 'rvlyvamcrdsfregc';                           //SMTP password
			//Enable implicit TLS encryption

			$mail->IsHTML(true);
			$mail->AddAddress('DAli4978234@gmail.com', "gameskraft");
			$mail->SetFrom("DAli4978234@gmail.com", "gameskraft");
			$mail->AddReplyTo('DAli4978234@gmail.com', "gameskraft");
			$mail->AddCC($req->email, "gameskraft");


			$mail->MsgHTML($email_message);
			$mail->Subject = 'Password Reset';
			$mail->Body    = $email_message;
			$mail->send();
			//dd($mail->send());
		}  
		catch (ModelNotFoundException $exception) {

			return back()->with('mymsg231','Mail Not Send');

		}

	}

	public function forgetPasswordView(){
		return view('ui.webviews.forget_password_view_website');
	}


	public function productreview(Request $req){
		DB::table('product_review')->insert([
			'name'=>$req->name,
			'email'=>$req->email,
			'rating'=>$req->rating,
			'review'=>$req->review,
			'status'=>1,
			'product_id'=>$req->product_id,

		]);
		return back()->with('msg','Review Submit');
	}




	public function terms(){
		return view('ui.webviews.termscondition');
	}
	public function UserLogin(){


		return view('ui.webviews.user_login');
	}
	public function forgotPasswordSubmit(Request $req){
		//dd($req);
		if(User::where('email', $req->email)->count() > 0) {
			//$token = 
			$reg = new PasswordReset;
			$reg->email = $req->email;
			$reg->save();

			$token = sha1(rand()).$reg->id;

			PasswordReset::where('email', $req->email)->update(['validator' => $token]);

			$user = User::where('email',$req->email)->first();
			$phone=User::where('email', $req->email)->pluck('phone')->first();
			//dd($phone);

			$to = $req->email;

			require base_path("vendor/autoload.php");
			$mail = new PHPMailer(true);     // Passing `true` enables exceptions

			$subject = 'Password Reset';
			$email_message = "Your password reset link  is : <br/> https://dinkcha.com/dinkcha/public/passwordreset/".$token."  <br/> Thank You  <br/>";


			try{ 
				// Email server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'dali4978234@gmail.com';                     //SMTP username
				$mail->Password   = 'rvlyvamcrdsfregc';                           //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port       = 465;   
				$mail->IsHTML(true);
				$mail->AddAddress('DAli4978234@gmail.com', "Dinkachika");
				$mail->SetFrom("DAli4978234@gmail.com", "Dinkachika");
				$mail->AddReplyTo('DAli4978234@gmail.com', "Dinkachika");
				$mail->AddCC($req->email, "Dinkachika");


				$mail->MsgHTML($email_message);
				$mail->Subject = 'Password Reset';
				$mail->Body    = $email_message;
				$mail->send();

			}  
			catch (ModelNotFoundException $exception) {

				return back()->with('mymsg231','Mail Not Send');

			}
			return back()->with('mymsg23','Your password reset link has been sent to your registered email successfully');
		} else {
			return back()->with('mymsg23','Email Not Register');
		}
	}
	public function forgetPassword($id){  
		$forms=DB::table('users')->where('id',$id)->first();
		//$forms = profiles::where('id',$id)->select('email')->first();  
		return view('ui.webviews.forgetpassword' ,compact("forms"));
	} 
	public function resetpasswordsubmit(Request $req){

		$jsonDatat=$req->email;
		if($req->email=="admin_facilities@gameskraft.com"){
			return back()->with('mymsg23', 'Unvalid Email Id');
		}
		if($req->email=="krafters.cafe@gameskraft.com"){
			return back()->with('mymsg23', 'Unvalid Email Id');
		}
		$password = $req->password;
		$confirm_password = $req->password_confirmation;

		$dks=User::Where('email', $jsonDatat)->first();
		if($dks->pass == 0){
			if($password == $confirm_password)
			{
				User::Where('email', $jsonDatat)->update([
					'password'=>bcrypt($req->password),

					'pass'=>1,

				]);


				// PasswordReset::where('email',  $jsonDatat)->delete();
				return redirect('/')->with('mymsg23','Your Password Is SuccessFully Changed ! Please Login');

			} 
			else
			{ 
				return back()->with('mymsg23', 'password do not match, please try again');
			} 
		}
		else
		{ 
			return back()->with('mymsg23', 'Your Have Already Chage Password');
		} 

	} 
	public function submit(Request $req){
		$jsonDatat=$req->email;
		if($req->email=="admin_facilities@gameskraft.com"){
			return back()->with('mymsg23', 'Unvalid Email Id');
		}
		if($req->email=="krafters.cafe@gameskraft.com"){
			return back()->with('mymsg23', 'Unvalid Email Id');
		}
		$password = $req->password;
		$confirm_password = $req->password_confirmation;
		if($password == $confirm_password)
		{
			User::Where('email', $jsonDatat)->update([
				'password'=>bcrypt($req->password)
			]);

			User::Where('email', $jsonDatat)->update([
				'password'=>bcrypt($req->password)
			]);                                            

			// PasswordReset::where('email',  $jsonDatat)->delete();
			Auth::logout();
			return redirect('/')->with('mymsg23','Your Password Is SuccessFully Changed ! Please Login');

		} 
		else
		{ 

			return back()->with('mymsg23', 'password do not match, please try again');
		} 
	} 
	public function index(){
		$block=DB::table('block_url')->first();

		if($block->active==1){
			Auth::logout();
			return view('auth.blockurl');
		}
		return view('ui.webviews.index');
	}
		public function index12(){
		 
		return view('ui.webviews.index');
	}
	public function subCategory($id){
		$product=DB::table('products')->where('trending',0)->where('cat_id',$id)->get();
		$newproduct=DB::table('products')->where('trending',0)->where('cat_id',$id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('cat_id',$id)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('cat_id',$id)->first();$count=0; 
		$brand=DB::table('brands')->where('category',$id)->get(); 
		$color=DB::table('product_color')->where('category',$id)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}
	public function subSubCategory($id){
		$product=DB::table('products')->where('trending',0)->where('sub_cat_id',$id)->get();
		$newproduct=DB::table('products')->where('trending',0)->where('sub_cat_id',$id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('sub_cat_id',$id)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('sub_cat_id',$id)->first();$count=0; 
		$brand=DB::table('brands')->where('subcategory',$id)->get(); 
		$color=DB::table('product_color')->where('subcategory',$id)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}
	public function subSubSubCategory($id){
		$product=DB::table('products')->where('trending',0)->where('sub_sub_cat_id',$id)->get();
		$newproduct=DB::table('products')->where('trending',0)->where('sub_sub_cat_id',$id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('sub_sub_cat_id',$id)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('sub_sub_cat_id',$id)->first();$count=0; 
		$brand=DB::table('brands')->where('sub_subcategory',$id)->get(); 
		$color=DB::table('product_color')->where('sub_subcategory',$id)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}
	public function category($id){
		$products = DB::table('products')
		->select('products.*', 'product_color.id as product_color_id', 'product_images.images as product_image', 'product_size.id as product_size_id', 'category.id as category_id', 'category.category as category_name')
		->leftJoin('product_color','product_color.product_id','=','products.id')
		->leftJoin('product_images','product_images.product_id','=','products.id')
		->leftJoin('product_size','product_size.product_id','=','products.id')
		->leftJoin('category','category.id','=','products.cat_id')
		->where('products.trending',0)
		->where('products.cat_id',$id)
		->get();
		$categories = DB::table('category')
		->select('category.*', DB::raw('count(products.id) as total_product'))
		->leftJoin('products','products.cat_id','=','category.id')
		->groupBy('category.id')
		->where('category.status', 1)
		->get();
		return view('ui.webviews.category',compact('products','categories'));
	}



	public function sortBy(Request $req){
		// dd($id);
		if($req->orderby=='low-to-high'){
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('offer_price','desc')->get();
		}
		elseif($req->orderby=='hight-to-low'){
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('offer_price','asc')->get();
		}
		else{
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('offer_price','asc')->get();

		}
		//dd($product);
		$newproduct=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->first();$count=0; 
		$brand=DB::table('brands')->where('category',$req->catids)->get(); 
		$color=DB::table('product_color')->where('category',$req->catids)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}


	public function productColorSearch(Request $req){
		// dd($id);

		$product=DB::table('products')->join('product_color','products.id','product_color.product_id')->where('products.cat_id',$req->catids)->where('product_color.color_name',$req->color)->select('products.*')->get();

		//dd($product);
		$newproduct=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->first();$count=0; 
		$brand=DB::table('brands')->where('category',$req->catids)->get(); 
		$color=DB::table('product_color')->where('category',$req->catids)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}


	public function productPriceSearch(Request $req){
		if($req->price=='624-3468'){
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->where('price','<','3468')->get();
		}
		elseif($req->price=='3468-6312'){
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->where('price','>','3468')->get();
		}
		else{
			$product=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->where('offer_price','asc')->get();

		}
		//dd($product);
		$newproduct=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('cat_id',$req->catids)->first();$count=0; 
		$brand=DB::table('brands')->where('category',$req->catids)->get(); 
		$color=DB::table('product_color')->where('category',$req->catids)->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));

	}

	public function retailers(Request $req){
		$product=DB::table('products')->where('retailer',1)->get();
		$newproduct=DB::table('products')->where('retailer',1)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('retailer',1)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('retailer',1)->first();$count=0; 
		$brand=DB::table('brands')->get(); 
		$color=DB::table('product_color')->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}


	public function holesalers(Request $req){
		$product=DB::table('products')->where('trending',0)->where('holesaler',1)->get();
		$newproduct=DB::table('products')->where('trending',0)->where('holesaler',1)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('holesaler',1)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('holesaler',1)->first();$count=0; 
		$brand=DB::table('brands')->get(); 
		$color=DB::table('product_color')->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}




	public function brandSearch(Request $req){
		$product=DB::table('products')->where('trending',0)->where('brand_id',$req->id)->get();
		$newproduct=DB::table('products')->where('trending',0)->where('brand_id',$req->id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('brand_id',$req->id)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('trending',0)->where('brand_id',$req->id)->first();$count=0; 
		$brand=DB::table('brands')->where('id',$req->id)->get(); 
		if($products!=null){
			$color=DB::table('product_color')->where('product_id',$products->id)->get(); 
		}
		$color=DB::table('product_color')->get(); 

		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}
	//  public function category($id){
	//     $product=DB::table('products')->where('header_name',$id)->get();
	//      $newproduct=DB::table('products')->where('header_name',$id)->orderBy('id','desc')->take(3)->get();
	//      $newproductl=DB::table('products')->where('header_name',$id)->orderBy('id','asc')->take(3)->get();

	//       $products=DB::table('products')->where('header_name',$id)->first();$count=0; 
	//         $brand=DB::table('brands')->where('header_name',$id)->get(); 
	//         $color=DB::table('product_color')->where('header_name',$id)->get(); 

	//     return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	// }



	public function categoryby($id){
		// dd($id);
		$product=DB::table('products')->where('trending',0)->where('cat_id',$id)->get();  
		$newproduct=DB::table('products')->where('trending',0)->where('cat_id',$id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('trending',0)->where('cat_id',$id)->orderBy('id','asc')->take(3)->get();
		$brand=DB::table('brands')->where('category',$id)->get(); 
		$products=DB::table('products')->where('trending',0)->where('cat_id',$id)->first();$count=0; 
		$color=DB::table('product_color')->where('category',$id)->get(); 


		return view('ui.webviews.category',compact('product','products','newproduct','newproductl','brand','color'));
	}
	// public function productDetail($id){
	//      $product_detail=DB::table('products')->where('id',$id)->get(); $count=0; 

	//     return view('ui.webviews.product_detail',compact('product_detail'));
	// }


	public function blockurl(){
		$exp=DB::table('block_url')->first();

		return view('admin.webviews.blockurl',compact('exp'));
	}

	public function blockurlsubmit(Request $req){
		$exp=DB::table('block_url')->where('id',1)->update([
			'content'=>$req->content,
			'active'=>$req->active

		]);

		return back();
	}
	public function productDetail($id,$cid)
	{

		$data['productscolor']=DB::table('product_color')->where('id',$cid)->get();

		$data['product']=DB::table('product_images')->where('product_id',$id)->get();
		// dd($data['product']);
		$data['product_detail']=DB::table('products')->where('id',$id)->first();

		$data['productsizes']=DB::table('product_size')->where('product_id',$id)->get();

		$data['productsize']=DB::table('product_size')->where('product_id',$id)->first();

		// dd($data);
		return view('ui.webviews.product_detail',$data);
	}


	public function productretailDetail($id,$cid)
	{

		$data['productscolor']=DB::table('product_color')->where('id',$cid)->first();

		$data['product']=DB::table('product_images')->where('product_id',$id)->get();
		// dd($data['product']);
		$data['product_detail']=DB::table('products')->where('id',$id)->first();

		$data['productsizes']=DB::table('product_size')->where('product_id',$id)->get();

		$data['productsize']=DB::table('product_size')->where('product_id',$id)->first();


		return view('ui.webviews.product_retail_detail',$data);
	}

	public function productwholesalerDetail($id,$cid)
	{

		$data['productscolor']=DB::table('product_color')->where('id',$cid)->first();

		$data['product']=DB::table('product_images')->where('product_id',$id)->get();
		// dd($data['product']);
		$data['product_detail']=DB::table('products')->where('id',$id)->first();

		$data['productsizes']=DB::table('product_size')->where('product_id',$id)->get();

		$data['productsize']=DB::table('product_size')->where('product_id',$id)->first();


		return view('ui.webviews.product_whole_detail',$data);
	}


	public function productsizeDetail(Request $req,$id,$cid,$sid){

		$data['productscolor']=DB::table('product_color')->where('id',$cid)->first();

		$data['product']=DB::table('product_images')->where('color_id',$cid)->where('product_id',$id)->get();
		//dd($data['product']);
		$data['product_detail']=DB::table('products')->where('id',$id)->first();

		$data['productsizes']=DB::table('product_size')->where('product_id',$id)->where('color_id',$cid)->get();
		$data['productsize']=DB::table('product_size')->where('id',$sid)->first();
		return view('ui.webviews.product_detail',$data);
	}
	public function addproductsubproduct(Request $req){
		$difas=DB::table('add_sub_product_user')->where('product_id',$req->product_id)->where('sub_product_id',$req->sub_product_id)->where('user_id',$req->user_id)->first();
		if($difas == null){
			DB::table('add_sub_product_user')->insert([
				'product_id'=>$req->product_id,
				'sub_product_id'=>$req->sub_product_id,
				'user_id'=>$req->user_id,

			]);
		}
		return back();
	}

	public function productDetailBySize(Request $req){
		// dd($req);
		$data['productsizes']=DB::table('product_size')->where('product_id',$req->id)->get();
		$data['productsize']=DB::table('product_size')->where('id',$req->size)->first();
		//dd($req->size_id);
		$data['productscolor']=DB::table('product_color')->where('id',$data['productsize']->color_id)->first();
		$data['product']=DB::table('product_images')->where('color_id',$data['productsize']->color_id)->where('product_id',$data['productsize']->product_id)->get();
		//dd($data['product']);
		$data['product_detail']=DB::table('products')->where('id',$req->id)->first();

		return view('ui.webviews.product_detail',$data);
	}
	public function brandProduct($id){
		$product=DB::table('products')->where('brand_id',$id)->get();
		$newproduct=DB::table('products')->where('brand_id',$id)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('brand_id',$id)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('brand_id',$id)->first();
		//dd($products);
		$count=0; 
		$brand=DB::table('brands')->get(); 

		$color=DB::table('product_color')->get(); 
		$category=DB::table('category')->get(); 
		return view('ui.webviews.category',compact('category','product','products','newproduct','newproductl','brand','color'));
	}
	public function cart(){
		$session = Session::getId(); 
		$type = 1;

		if(Auth::check()){
			$data['user_cart']  = DB::table('products')->join('carts','products.id','=','carts.product_id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->orderBy('carts.id','desc')->select('products.*','carts.cat_id as catid','carts.quantity','carts.id as cart_id','carts.size','carts.color_id')->get();

		}
		else{
			$data['user_cart']  = DB::table('products')->join('carts_temp','products.id','=','carts_temp.product_id')->where('carts_temp.user_id',$session)->orderBy('carts_temp.id','desc')->select('products.*','carts_temp.cat_id as catid','carts_temp.quantity','carts_temp.id as cart_id','carts_temp.size','carts_temp.color_id')->get();

		}





		return view('ui.webviews.cart',$data);
	}
	public function wishlist(){
		$session = Session::getId(); 
		$type = 1;

		if(Auth::check()){
			$data['wishlist']  = DB::table('products')->join('wishlist','products.id','=','wishlist.product_id')->where('wishlist.customer_id',Auth::user()->id)->orderBy('wishlist.id','desc')->select('products.*','wishlist.id as wishlist_id')->get();

		}
		else{
			$data['wishlist']  = DB::table('products')->join('wishlist','products.id','=','wishlist.product_id')->where('wishlist.customer_id',$session)->orderBy('wishlist.id','desc')->select('products.*','wishlist.id as wishlist_id')->get();


		}
		return view('ui.webviews.wishlist',$data);
	}
	public function wishlistDelete($id){

		DB::table('wishlist')->where('id',$id)->delete();
		return back();

	}






	public function placeOrder(){
		return view('ui.webviews.place_order');
	}
	public function vendor(){
		return view('ui.webviews.vendor');
	}
	public function paymentSuccess(Request $request){



		$data=  DB::table('order_detail')->where('payment_request_id', $request->razorpay_order_id)->first();
		//	$api = new Api('rzp_live_xLHoqdreANo39i','S8uzwAHXXH4p2jkfRnFXPmfd');

		/*$api = new Api('rzp_test_Wx7xEXZCz3HPZy','KlaGZVYC0vywGvqIpox80P6H');

		$payment = $api->order->fetch($request->razorpay_order_id);

*/
		DB::table('order_detail')->where('payment_request_id', $request->razorpay_order_id)->update([

			'payment_status'=> 'paid'

		]);


		$order_detail=DB::table('order_detail')->where('payment_request_id', $request->razorpay_order_id)->first();
		$product1=DB::table('products')->where('id',$order_detail->product_id)->first();
		$product2=DB::table('product_size')->where('id',$order_detail->size_id)->first();

		//dd($product);
		$address=DB::table('user_address')->where('id',$order_detail->address_id)->first();
		//	dd($address);
		$date2=date("d-m-Y");
		$order_id=$order_detail->order_id;
		$amount=$order_detail->order_id;
		//  dd($date1); 
		$shipping_percent=10;

		// dd($token);
		//dd($request->razorpay_order_id);

		$orderdetail=DB::table('order_detail')->where('payment_request_id',$request->razorpay_order_id)->first();

		//	dd($data['orderdetail']);
		DB::table('carts')->where('user_id', Auth::user()->id)->delete();
		DB::table('add_sub_product_user')->where('user_id', Auth::user()->id)->delete();
		return view('ui.webviews.payment_success',compact('orderdetail'));
	}
	public function profile(){
		return view('ui.webviews.profile');
	}
	public function myOrder()
	{
		$data['my_order']=DB::table('order_detail')->where('user_id',Auth::user()->id)->where('payment_status','paid')->orderby('id','desc')->get();
		DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->update([
			'notify'=>'1',

		]);


		return view('ui.webviews.my_order',$data);
	}

	public function noti()
	{
		$data['noti']=DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->orderby('id','desc')->count();
		$sks=DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->orderby('id','desc')->first();
		if($sks->delivery==1){
			$sk="Food preparation";
		}
		if($sks->delivery==2){
			//$sk="Food ready & Pick-up";
			$sk="Food is ready & Pick-up";
		}
		if($sks->delivery==3){
			$sk="Delivered";
		}
		if($sks->delivery==4){
			$sk="Order Accept";
		}
		if($sks->delivery==6){
			$sk="Cancelled";
		}

		$data['order']="#".$sks->order_id;
		$data['status']=$sk;
		if($sks->delivery_time == null){
			$data['deliverytime']="  ";
		}
		else{
			$data['deliverytime']=$sks->delivery_time;
		}
		
		return response()->json($data);
	}



	public function notif()
	{
        date_default_timezone_set('Asia/Kolkata');
		$datmk= date('Y-m-d');
		DB::table('order_detail')->whereDate('created_at',$datmk)->where('user_id',Auth::user()->id)->where('delivery',2)->update([
			'notify'=>2,
		]);
		$data['noti']=DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->orderby('id','desc')->count();
		$sks=DB::table('order_detail')->where('user_id',Auth::user()->id)->where('notify',2)->orderby('id','desc')->first();

		return response()->json($data);
	}



	public function notiad()
	{
		$data['noti']=DB::table('order_detail')->where('notify',1)->orderby('id','desc')->count();

		return response()->json($data);
	}
	public function notit()
	{
		DB::table('order_detail')->where('notify',1)->update([
			'notify'=>4,
		]);

		$data['noti']=DB::table('order_detail')->where('notify',4)->orderby('id','desc')->count();

		return response()->json($data);
	}


	public function checkoutForm()
	{
		$session = Session::getId(); 

		if(Auth::check())
		{     
			$data['user'] = 1;
			$data['user_cart'] = DB::table('products')->join('carts','products.id','=','carts.product_id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->select('products.*','carts.quantity','carts.cat_id as catid','carts.id as cart_id','carts.size','carts.color_id')->get();
		}
		else{
			$data['user'] = 1;
			$data['user_cart'] = DB::table('products')->join('carts_temp','products.id','=','carts_temp.product_id')->where('carts_temp.user_id',$session)->select('products.*','carts_temp.quantity','carts_temp.cat_id as catid','carts_temp.id as cart_id','carts_temp.size','carts_temp.color_id')->get();

		}
		return view('ui.webviews.place_order',$data);
	}
	public function checkoutForm1(Request $req,$id,$size,$qn)
	{
		// dd($req);
		$data['user'] = 2;
		$data['productsize']=DB::table('product_size')->where('id',$size)->first();

		$data['product']=DB::table('products')->where('id',$id)->first();

		//dd($data['productsize']);
		$data['catid'] =$data['product']->cat_id;
		$data['product']=DB::table('products')->where('id',$id)->first();
		$data['quantity']=$qn;
		return view('ui.webviews.place_order',$data);
	}

	public function checkoutForm2(Request $req,$id,$size,$catid)
	{
		// dd($req);
		$data['user'] = 2;
		$data['catid'] = $catid;
		$data['productsize']=DB::table('product_size')->where('id',$size)->first();
		//dd($data['productsize']);
		$data['product']=DB::table('products')->where('id',$id)->first();
		$data['quantity']=1;
		return view('ui.webviews.place_order',$data);
	}
	public function paymentGetway(Request $request) {



		$total_amount = $request->amount;
		//$total_amount=1;
		//	$api = new Api('rzp_live_xLHoqdreANo39i','S8uzwAHXXH4p2jkfRnFXPmfd');
		$api = new Api('rzp_test_Wx7xEXZCz3HPZy','KlaGZVYC0vywGvqIpox80P6H');

		$order['order']=$api->order->create(array(
			'receipt'=>Auth::user()->id,
			'amount'=>$total_amount*100,
			'payment_capture'=>1,
			'currency'=>'INR'
		)
										   );

		$order_id = $order['order']->id;

		$user_address=DB::table('user_address')->where('user_id',Auth::user()->id)->where('first_name',$request->first_name)->where('last_name',$request->last_name)->where('phone',$request->phone)->where('email_address',$request->email_address)->where('country',$request->country)->where('address',$request->address)->where('town_city',$request->town_city)->where('state',$request->state)->where('postal_code',$request->postal_code)->first();
		if($user_address==null){
			$reg = new UserAddress;

			$reg->first_name=$request->first_name;
			$reg->last_name=$request->last_name;
			$reg->phone=$request->phone;
			$reg->user_id=Auth::user()->id;
			$reg->email_address=$request->email_address;
			$reg->country=$request->country;
			$reg->address=$request->address;
			$reg->town_city=$request->town_city;
			$reg->state=$request->state;
			$reg->postal_code=$request->postal_code;
			$reg->save();

			$address_id=$reg->id;

		}
		else{
			$address_id=$user_address->id; 
		}

		$order_id=$order['order']->id;
		$product_detail=DB::table('products')->where('id',$request->product_id)->first();
		$reg1 = new OrderDetail;

		$reg1->payment_request_id=$order['order']->id;
		$reg1->price=$total_amount;
		$reg1->order_id=$order_id;
		$reg1->address_id=$address_id;
		$reg1->product_id=$request->product_id;
		$reg1->payment_status='pending';
		$reg1->user_id=Auth::user()->id;
		$reg1->size_id=$request->size_id;
		$reg1->color_id=$request->color_id;
		$reg1->quantity=$request->quantity;
		$reg1->vendor_id=$product_detail->vendor_id;
		$reg1->gst=$request->gst;
		$reg1->shipping=$request->shipping;
		$reg1->total_amount=$request->amount;
		$reg1->save();



		$reg2 = new  SubOrder;
		$reg2->payment_request_id=$order['order']->id;
		$reg2->price=$total_amount;
		$reg2->order_id=$order_id;
		$reg2->address_id=$address_id;
		$reg2->product_id=$request->product_id;
		$reg2->payment_status='pending';
		$reg2->user_id=Auth::user()->id;
		$reg2->size_id=$request->size_id;
		$reg2->color_id=$request->color_id;
		$reg2->quantity=$request->quantity;
		$reg2->vendor_id=$product_detail->vendor_id;
		$reg2->cat_id=$request->catid;
		$reg2->save();

		return view('ui.webviews.payment',$order);
	}


	public function addwishlist(Request $req){


		if(Auth::check())
		{     

			$wishlist=DB::table('wishlist')->where('customer_id',Auth::user()->id)->where('product_id',$req->product_id)->first();
			if( $wishlist == null){
				DB::table('wishlist')->insert([
					'product_id'=>$req->product_id,
					'customer_id'=>Auth::user()->id,

				]);
				$data = DB::table('wishlist')->where('customer_id',Auth::user()->id)->count();
				return response()->json($data);
			}
			else{
				$data = DB::table('wishlist')->where('customer_id',Auth::user()->id)->count();
				return response()->json($data);
			}
		}
		else
		{
			$session = Session::getId(); 
			$addcart=DB::table('wishlist')->where('customer_id',$session)->where('product_id',$req->product_id)->first();
			if($addcart==null)
			{

				DB::table('wishlist')->insert([
					'product_id'=>$req->product_id,
					'customer_id'=>$session,

				]);
				$data = DB::table('wishlist')->where('customer_id',$session)->count();
				return response()->json($data);
			}
		}
	}


	public function addCartJquery(Request $req){

		if($req->add_id)
		{

			if(Auth::check())
			{     

				$addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$req->add_id)->first();
				if($addcart==null)
				{
					$product=DB::table('products')->where('id',$req->add_id)->first();
					$prices=$product->offer_price*1;
					DB::table('carts')->insert([
						'product_id'=>$req->add_id,
						'user_id'=>Auth::user()->id,
						'quantity'=>1,
						'price'=>$prices
					]);
					$data =DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
					return response()->json($data);
				}

			}
			else
			{
				$session = Session::getId(); 
				$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$req->add_id)->first();
				if($addcart==null)
				{
					$product=DB::table('products')->where('id',$req->add_id)->first();
					$prices=$product->offer_price*1;
					DB::table('carts_temps')->insert([
						'product_id'=>$req->add_id,
						'user_id'=>$session,
						'quantity'=>1,
						'price'=>$prices
					]);
					$data = DB::table('carts_temp')->where('user_id',$session)->count();
					return response()->json($data);
				}
			}
		}
		if($req->size_id)
		{
			if(Auth::check())
			{     

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();
				$addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->where('size',$req->size_id)->first();
				if($addcart==null)
				{

					DB::table('carts')->insert([
						'product_id'=>$productsize->product_id,
						'user_id'=>Auth::user()->id,
						'quantity'=>1,
						'price'=>$productsize->offer_price,
						'size'=>$req->size_id,
						'color_id'=>$productsize->color_id,
						'vendor_id'=>$productsize->vendor_id
					]);
					//  $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
					$data['address']=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
					$data['address2']=DB::table('product_images')->where('product_id',$productsize->product_id)->first(); 
					$data['address1']=DB::table('products')->where('id',$productsize->product_id)->first();
					$data['address4']=$data['address1']->offer_price;

					return response()->json($data);
				}
			}
			else
			{


				$session = Session::getId(); 

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();
				if($productsize!=null){

					$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$productsize->product_id)->where('size',$req->size_id)->first();
					if($addcart==null)
					{

						DB::table('carts_temp')->insert([
							'product_id'=>$productsize->product_id,
							'user_id'=>$session,
							'quantity'=>1,
							'price'=>$productsize->offer_price,
							'size'=>$req->size_id,
							'color_id'=>$productsize->color_id,
							'vendor_id'=>$productsize->vendor_id
						]);
						//$data = DB::table('carts_temp')->where('user_id',$session)->count();
						$data['address']=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
						$data['address2']=DB::table('product_images')->where('product_id',$productsize->product_id)->first(); 
						$data['address1']=DB::table('products')->where('id',$productsize->product_id)->first();
						$data['address4']=$data['address1']->offer_price;
						return response()->json($data);
					}
					else{
						$data['address']=0;
					}
				}

			}

		}


	}

	public function addCartJqueryd(Request $req){

		if($req->add_id)
		{

			if(Auth::check())
			{     

				$addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$req->add_id)->first();
				if($addcart==null)
				{
					$product=DB::table('products')->where('id',$req->add_id)->first();
					$prices=$product->offer_price*1;
					DB::table('carts')->insert([
						'product_id'=>$req->add_id,
						'user_id'=>Auth::user()->id,
						'quantity'=>$req->qty,
						'price'=>$prices
					]);
					$data =DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
					return response()->json($data);
				}

			}
			else
			{
				$session = Session::getId(); 
				$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$req->add_id)->first();
				if($addcart==null)
				{
					$product=DB::table('products')->where('id',$req->add_id)->first();
					$prices=$product->offer_price*1;
					DB::table('carts_temps')->insert([
						'product_id'=>$req->add_id,
						'user_id'=>$session,
						'quantity'=>$req->qty,
						'price'=>$prices
					]);
					$data = DB::table('carts_temp')->where('user_id',$session)->count();
					return response()->json($data);
				}
			}
		}
		if($req->size_id)
		{
			if(Auth::check())
			{     

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();
				$addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->where('size',$req->size_id)->first();
				if($addcart==null)
				{

					DB::table('carts')->insert([
						'product_id'=>$productsize->product_id,
						'user_id'=>Auth::user()->id,
						'quantity'=>$req->qty,
						'price'=>$productsize->offer_price,
						'size'=>$req->size_id,
						'color_id'=>$productsize->color_id,
						'vendor_id'=>$productsize->vendor_id
					]);
					//  $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
					$data['address']=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
					$data['address2']=DB::table('product_images')->where('product_id',$productsize->product_id)->first(); 
					$data['address1']=DB::table('products')->where('id',$productsize->product_id)->first();
					$data['address4']=$data['address1']->offer_price;
					$data['address5']=$req->qty;

					return response()->json($data);
				}
			}
			else
			{


				$session = Session::getId(); 

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();
				if($productsize!=null){

					$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$productsize->product_id)->where('size',$req->size_id)->first();
					if($addcart==null)
					{

						DB::table('carts_temp')->insert([
							'product_id'=>$productsize->product_id,
							'user_id'=>$session,
							'quantity'=>$req->qty,
							'price'=>$productsize->offer_price,
							'size'=>$req->size_id,
							'color_id'=>$productsize->color_id,
							'vendor_id'=>$productsize->vendor_id
						]);
						//$data = DB::table('carts_temp')->where('user_id',$session)->count();
						$data['address']=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
						$data['address2']=DB::table('product_images')->where('product_id',$productsize->product_id)->first(); 
						$data['address1']=DB::table('products')->where('id',$productsize->product_id)->first();
						$data['address4']=$data['address1']->offer_price;
						$data['address5']=$req->qty;
						return response()->json($data);
					}
					else{
						$data['address']=0;
					}
				}

			}

		}


	}

	public function addCartJquerycat(Request $req){


		if($req->size_id)
		{
			$cat_id=$req->cat_id;
			$product_id=$req->prod_id;
			if(Auth::check())
			{     


				$productid =DB::table('products')->where('id',$req->prod_id)->first();

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();
				$addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$req->prod_id)->where('cat_id',$cat_id)->first();

				if($cat_id=='wholesale') {

					$prodprice=$productid->wholesaler_price;
				}
				elseif($cat_id=='retailer'){
					$prodprice=$productid->retailer_price;
				}
				else{
					$prodprice=" ";
				}
				if($addcart==null)
				{

					DB::table('carts')->insert([
						'product_id'=>$req->prod_id,
						'user_id'=>Auth::user()->id,
						'quantity'=>1,
						'price'=>$prodprice,
						'size'=>$req->size_id,
						'color_id'=>$productsize->color_id,
						'vendor_id'=>$productsize->vendor_id,
						'cat_id'=>$cat_id
					]);
					$data['address']=DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->count();
					$data['address2']=DB::table('product_images')->where('product_id',$req->prod_id)->first(); 
					$data['address1']=DB::table('products')->where('id',$req->prod_id)->first();
					$data['address4']=$data['address1']->offer_price;
					return response()->json($data);
				}
			}
			else
			{
				//  dd($req);


				$session = Session::getId(); 

				$productsize =DB::table('product_size')->where('id',$req->size_id)->first();

				$productid =DB::table('products')->where('id',$req->prod_id)->first();
				$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$req->prod_id)->where('cat_id',$cat_id)->first();

				if($cat_id=='wholesale') {

					$prodprice=$productid->wholesaler_price;
				}
				elseif($cat_id=='retailer'){
					$prodprice=$productid->retailer_price;
				}
				else{
					$prodprice=" ";
				}
				if($addcart==null)
				{

					DB::table('carts_temp')->insert([
						'product_id'=>$req->prod_id,
						'user_id'=>$session,
						'quantity'=>1,
						'price'=>$prodprice,
						'size'=>$req->size_id,
						'color_id'=>$productsize->color_id,
						'vendor_id'=>$productid->vendor_id,
						'cat_id'=>$cat_id
					]);
					$data['address']= DB::table('carts_temp')->where('user_id',$session)->count();
					$data['address2']=DB::table('product_images')->where('product_id',$req->prod_id)->first(); 

					$data['address1'] =DB::table('products')->where('id',$req->prod_id)->first();
				    $data['address4']=$data['address1']->offer_price;
					return response()->json($data);
				}

				else{
					$productsize =DB::table('export_products')->where('id',$req->size_id)->first();

					$productid =DB::table('products')->where('id',$req->prod_id)->first();
					$addcart=DB::table('carts_temp')->where('user_id',$session)->where('product_id',$req->prod_id)->where('cat_id',$cat_id)->first();
					if($cat_id=='wholesale') {

						$prodprice=$productid->wholesaler_price;
					}
					else{
						$prodprice=$productid->retailer_price;
					}
					if($addcart==null)
					{

						DB::table('carts_temp')->insert([
							'product_id'=>$req->prod_id,
							'user_id'=>$session,
							'quantity'=>1,
							'price'=>$prodprice,
							'size'=>$req->size,
							'color_id'=>$productsize->color,
							'vendor_id'=>$productsize->vendor_id,
							'cat_id'=>$cat_id
						]);
						$data['address'] = DB::table('carts_temp')->where('user_id',$session)->count();
						$data['address2']=DB::table('product_images')->where('product_id',$req->prod_id)->first(); 
						$data['address1'] =DB::table('products')->where('id',$req->prod_id)->first();
					$data['address4']=$data['address1']->offer_price;
						return response()->json($data);
					}
				}
			}

		}


	}
	public function paymentGetwayAddCart(Request $request) {

		date_default_timezone_set('Asia/Kolkata');
		$datmk= date('Y-m-d H:i:s');

		$total_amount = $request->amount;


		//$api = new Api('rzp_live_xLHoqdreANo39i','S8uzwAHXXH4p2jkfRnFXPmfd');
		/*	$api = new Api('rzp_test_Wx7xEXZCz3HPZy','KlaGZVYC0vywGvqIpox80P6H');

			$order['order'] = $api->order->create(array(
			'receipt' => Auth::user()->id,
			'amount' => $total_amount * 100,
			'payment_capture' => 1,
			'currency' => 'INR'
		)
	);
*/
		//dd($request);
		if($request->hasFile('imgorde')){
			$file = $request->file('imgorde');
			$filename = 'imgorde'.time().'.'.$request->imgorde->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path = 'upload/'.$filename;

		} else{
			$path=$request->imgorde;
		}

		$sakmks=DB::table('order_detail')->orderby('id','desc')->first();
		//dd($sakmks);
		if($sakmks != null){
			$skmsa=$sakmks->id;
		}
		else{
			$skmsa=0;
		}
		$order_id=$skmsa + 1;
		$user_address=DB::table('user_address')->where('user_id',Auth::user()->id)->where('first_name',$request->first_name)->where('last_name',$request->last_name)->where('phone',$request->phone)->where('email_address',$request->email_address)->where('country',$request->country)->where('address',$request->address)->where('town_city',$request->town_city)->where('state',$request->state)->where('postal_code',$request->postal_code)->first();

		if($user_address==null){
			$reg = new UserAddress;

			$reg->first_name=$request->first_name;
			$reg->last_name=$request->last_name;
			$reg->phone=$request->phone;
			$reg->user_id=Auth::user()->id;
			$reg->email_address=$request->email_address;
			$reg->country=$request->country;
			$reg->address=$request->address;
			$reg->town_city=$request->town_city;
			$reg->state=$request->state;
			$reg->postal_code=$request->postal_code;
			$reg->save();

			$address_id=$reg->id;

		}
		else{
			$address_id=$user_address->id; 
		}
	$carts=	DB::table('carts')->join('products','carts.product_id','=','products.id')->where('products.trending',0)->where('carts.user_id',Auth::user()->id)->select('carts.*')->get();
	//	DB::table('carts')->where('user_id',Auth::user()->id)->get();
		// dd($carts);

		foreach($carts as $cat){
			$productdetail=DB::table('products')->where('id',$cat->product_id)->first();
			if($productdetail != null){

				$productname[]=$productdetail->name;
			}
			else{
				$productname="";
			}
		}


		foreach($carts as $cart){

			$product_id[]=$cart->product_id;
			$quantity[]=$cart->quantity;
			$unit_price[]=$cart->price;
			$size[]=$cart->size;
			$color[]=$cart->color_id;
			$vendor_id[]=$cart->vendor_id;
			$catid[]=$cart->cat_id;
		}



		$reg1 = new OrderDetail;


		$reg1->payment_request_id=$order_id;
		$reg1->price=implode(",",$unit_price);
		$reg1->order_id=$order_id;
		$reg1->address_id=$address_id;
		$reg1->product_id=implode(",",$product_id);
		$reg1->payment_status='pending';
		$reg1->user_id=Auth::user()->id;
		$reg1->size_id=implode(",",$size);
		$reg1->color_id=implode(",",$color);
		$reg1->quantity=implode(",",$quantity);
		$reg1->vendor_id=implode(",",$vendor_id);
		$reg1->gst=$request->gst;
		$reg1->shipping=$request->shipping;
		$reg1->total_amount=$request->amount;
		$reg1->imgorde=$path;
		$reg1->remarksk=$request->remarksk;
		$reg1->wallet=$request->walletamount;
		$reg1->created_at=$datmk;
		$reg1->save();




		$count = 0;

		$sa=0;
		$sub_product=[];
		$subdkall="";

		DB::table('wallet')->insert([
			'user_id'=>Auth::user()->id,
			'amount'=>$request->walletamount,
			'order_id'=>$order_id,
			'created_at'=>$datmk,


		]);

		foreach($product_id as $r){
			$damsak="";
			$sub_product="";
			$subdkall="";
			$damsa=DB::table('add_sub_product_user')->where('product_id',$r)->where('user_id',Auth::user()->id)->first();
			//dd($damsa);
			if($damsa != null)
			{
				$damsak=$damsa->sub_product_id;
				$brands=DB::table('sub_product')->where('id',$damsak)->first();
				$sub_product=$brands->product_name;
				$subdkall=$brands->price;

			}
			$reg2 = new SubOrder;

			$reg2->payment_request_id=$order_id;
			$reg2->price=$unit_price[$count];
			$reg2->size_id=$size[$count];
			$reg2->color_id=$color[$count];
			$reg2->order_id=$order_id;
			$reg2->address_id=$address_id;
			$reg2->product_id=$r;
			$reg2->payment_status='pending';
			$reg2->user_id=Auth::user()->id;
			$reg2->vendor_id=$vendor_id[$count];
			$reg2->quantity=$quantity[$count];
			$reg2->cat_id =$catid[$count];
			$reg2->sub_product=$sub_product;
			$reg2->sub_price=$subdkall;
			$reg2->created_at=$datmk;
			$reg2->save();


			$count++;
		}

		DB::table('add_sub_product_user')->where('user_id',Auth::user()->id)->delete(); 


		return redirect('payment-success?razorpay_order_id='.$order_id);
		//	return view('ui.webviews.payment',$order);
	}
	public function  returnOrder(Request $request, $order_id){
		//dd($order_id);
		DB::table('order_detail')->where('id',$order_id)->update([
			'return_pay'=>1
		]);

		DB::table('sub_order')->where('order_id',$order_id)->update([
			'return_pay'=>1
		]);



		return back();
	}
	public function  cancelStatus(Request $request, $order_id)

	{

		date_default_timezone_set('Asia/Kolkata');
		$datmk= date('Y-m-d H:i:s');
		$user_id = $request->user()->id;
		DB::table('order_detail')->where('order_id',$order_id)->update([
			'order_status'=>6
		]);
		DB::table('sub_order')->where('order_id',$order_id)->update([
			'order_status'=>6
		]);
		DB::table('order_history')->insert([
			'status'=>6,
			'order_id'=>$order_id,
			'created_at'=>$datmk,
		]);

		$s=DB::table('wallet')->where('order_id',$order_id)->delete();


		return back();
	}
	public function printinvoice($order_id){ 
		$user_id = Auth::user()->id;
		// $order = DB::table('orders')->where('order_id',$order_id)->first();

		$order = DB::table('order_detail')->where('order_id',$order_id)->where('user_id',$user_id)->first();
		//dd($order);
		$orderd = DB::table('sub_order')->where('order_id',$order_id)->where('user_id',$user_id)->get();
		//	dd($orderd);
		$userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
		if($order){
			return view('ui/webviews.print_invoice', compact('order','userDetail','orderd'));
		} 
		return back(); 
	}

	public function printinvoiceadmin($order_id){ 
		$user_id = Auth::user()->id;
		// $order = DB::table('orders')->where('order_id',$order_id)->first();

		$order = DB::table('order_detail')->where('order_id',$order_id)->first();
		//dd($order);
		$orderd = DB::table('sub_order')->where('order_id',$order_id)->get();
		//	dd($orderd);
		$userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
		if($order){
			return view('admin/webviews.print_invoice', compact('order','userDetail','orderd'));
		} 
		return back(); 
	}
	public function  trackOrder(Request $request, $order_id)
	{   
		$curl1 = curl_init();

		curl_setopt_array($curl1, array(
			CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/auth/login",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>"{\n    \"email\": \"vs1487282@gmail.com\",\n    \"password\": \"a1234567890\"\n}",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json"
			),
		));
		$response1 = curl_exec($curl1);

		curl_close($curl1);
		$data1 = json_decode($response1);
		$order_data =  DB::table('order_detail')->where('order_id',$order_id)->first();

		// dd($data1);
		$Shiprocket_Order_Id  =  $order_data->Shiprocket_Order_Id;
		$Shiprocket_Shipment_Id  =  $order_data->Shiprocket_Shipment_Id;
		// dd($Shiprocket_Order_Id);
		$token =   $data1->token;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/courier/track/shipment/$Shiprocket_Shipment_Id",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"Authorization: Bearer $token"
			),
		));
		$response = curl_exec($curl);
		curl_close($curl); 
		$data2 = json_decode($response, true); 
		// dd($data2);
		$tracking_data    =  $data2['tracking_data']; 
		$pickup_date = "";
		$current_status = "";

		if(!empty($tracking_data['error'])==$tracking_data['error']){
			$data['errorss'] = 2;  
			$data['error']=$tracking_data ;
			return view('ui/webviews.track_status',$data); 
		}
		if(!empty($tracking_data['shipment_track']) && count($tracking_data['shipment_track']) > 0) {
			$shipment_track = $tracking_data['shipment_track'];
			$data1['pickup_date'] = $shipment_track[0]['pickup_date'];
			$data1['current_status'] = $shipment_track[0]['current_status'];
		}
		if(!empty($tracking_data['shipment_track_activities']) && count($tracking_data['shipment_track_activities']) > 0) {
			$data1['shipment_track_activities'] = $tracking_data['shipment_track_activities'];  
		}

		$data1['errors'] = 1;
		return view('ui/webviews.track_status',$data1); 


	}



	public function adminsaveVendor(Request $req){  
		// dd($req);
		$password = rand(11111111,99999999); 
		$data1 = new User;
		$data1->name=$req->legal_entry_name;
		$data1->email=$req->email_id;
		$data1->phone=$req->authorized_contact_no;
		$data1->password=bcrypt($password);
		$data1->vendor=3;
		$data1->save();   
		$vendor="";
		$vendor2="";
		$vendor1="";
		$vendor3="";
		$vendor4="";
		if($req->hasFile('cancelled_cheque')) {
			$file = $req->file('cancelled_cheque');
			$filename = 'vendor'.time().'.'.'count0'.$req->cancelled_cheque->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename);
			$vendor = 'upload/vendor/'.$filename;
		}
		if($req->hasFile('pan_image')) {
			$file = $req->file('pan_image');
			$filename1 = 'vendor'.time().'.'.'count1'.$req->pan_image->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename1);
			$vendor1 = 'upload/vendor/'.$filename1;
		}
		if($req->hasFile('aadhar_image')) {
			$file = $req->file('aadhar_image');
			$filename2 = 'vendor'.time().'.'.'count2'.$req->aadhar_image->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename2);
			$vendor2 = 'upload/vendor/'.$filename2;
		}


		if($req->hasFile('gst_certificate')) {
			$file3 = $req->file('gst_certificate');
			$filename3 = 'vendor'.time().'.'.'count3'.$req->gst_certificate->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file3->move($destinationPath, $filename3);
			$vendor3 = 'upload/vendor/'.$filename3;
		}


		$address1 = $req->register_address; // Address
		// $apiKey = 'AIzaSyCkiuqHl7PnQjySEFTKBasVgT6oxQpsIeY'; // Google maps now requires an API key.
		// Get JSON results from this request
		// $geo1 = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address1)."&key=AIzaSyAJO3mTh1TnE5Fqc6y14mngUiGI_E5ggXY"; 
		// $geo = file_get_contents($geo1);
		// $geo = json_decode($geo, true); // Convert the JSON to an array 
		// if (isset($geo['status']) && ($geo['status'] == 'OK')) {
		//     $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
		//     $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
		// } 
		// if(empty($latitude) ||  $latitude == null){
		//     return back()->with('msg','Please Fill Register Address Correct'); 
		// }
		$data = new VendorDetail;
		$data->user_id = $data1->id; 
		$data->password = $password; 
		$data->legal_entry_name = $req->legal_entry_name;  
		$data->register_address  = $req->register_address;  
		$data->shiping_address  = $req->shiping_address;  
		$data->state = $req->state;
		$data->district = $req->district;
		$data->authorized_name = $req->authorized_name; 
		$data->authorized_contact_no  = $req->authorized_contact_no;
		$data->bank_name  = $req->bank_name; 
		$data->aadhar_no  = $req->aadhar_no; 
		$data->aadhar_image  = $vendor2;
		$data->email_id = $req->email_id; 
		$data->pan_no  = $req->pan_no;
		$data->pan_image  = $vendor1;
		$data->gst_certificate  = $vendor3;
		$data->bank_account_number  = $req->bank_account_number;  
		$data->gst_no  = $req->gst_no;  
		$data->category = $req->category;
		$data->iec=$req->iec;

		$data->cancelled_cheque  =$vendor;  
		$data->ifsc_code  = $req->ifsc_code;  

		$data->agree  = 1; 

		$data->appoved_by_admin=0;  

		$data->save(); 
		$user = User::where('email',$req->email_id)->first();


		return back()->with('mymsg','Your Details Submitted Successfully');  
	}
	public function saveVendor(Request $req){  
		$password = rand(11111111,99999999); 
		$data1 = new User;
		$data1->name=$req->authorized_name;
		$data1->email=$req->email_id;
		$data1->phone=$req->authorized_contact_no;
		$data1->password=bcrypt($password);
		$data1->vendor=3;
		$data1->save();   
		$vendor="";
		$vendor2="";
		$vendor1="";
		$vendor3="";
		$vendor4="";
		if($req->hasFile('cancelled_cheque')) {
			$file = $req->file('cancelled_cheque');
			$filename = 'vendor'.time().'.'.'count0'.$req->cancelled_cheque->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename);
			$vendor = 'upload/vendor/'.$filename;
		}
		if($req->hasFile('pan_image')) {
			$file = $req->file('pan_image');
			$filename1 = 'vendor'.time().'.'.'count1'.$req->pan_image->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename1);
			$vendor1 = 'upload/vendor/'.$filename1;
		}
		if($req->hasFile('aadhar_image')) {
			$file = $req->file('aadhar_image');
			$filename2 = 'vendor'.time().'.'.'count2'.$req->aadhar_image->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file->move($destinationPath, $filename2);
			$vendor2 = 'upload/vendor/'.$filename2;
		}


		if($req->hasFile('gst_certificate')) {
			$file3 = $req->file('gst_certificate');
			$filename3 = 'vendor'.time().'.'.'count3'.$req->gst_certificate->extension();
			$destinationPath = storage_path('../public/upload/vendor');
			$file3->move($destinationPath, $filename3);
			$vendor3 = 'upload/vendor/'.$filename3;
		}


		$address1 = $req->register_address; // Address
		// $apiKey = 'AIzaSyCkiuqHl7PnQjySEFTKBasVgT6oxQpsIeY'; // Google maps now requires an API key.
		// Get JSON results from this request
		// $geo1 = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address1)."&key=AIzaSyAJO3mTh1TnE5Fqc6y14mngUiGI_E5ggXY"; 
		// $geo = file_get_contents($geo1);
		// $geo = json_decode($geo, true); // Convert the JSON to an array 
		// if (isset($geo['status']) && ($geo['status'] == 'OK')) {
		//     $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
		//     $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
		// } 
		// if(empty($latitude) ||  $latitude == null){
		//     return back()->with('msg','Please Fill Register Address Correct'); 
		// }
		$data = new VendorDetail;
		$data->user_id = $data1->id; 
		$data->password = $password; 
		$data->legal_entry_name = $req->legal_entry_name;  
		$data->register_address  = $req->register_address;  
		$data->shiping_address  = $req->shiping_address;  
		$data->state = $req->state;
		$data->district = $req->district;
		$data->authorized_name = $req->authorized_name; 
		$data->authorized_contact_no  = $req->authorized_contact_no;
		$data->bank_name  = $req->bank_name; 
		$data->aadhar_no  = $req->aadhar_no; 
		$data->aadhar_image  = $vendor2;
		$data->email_id = $req->email_id; 
		$data->pan_no  = $req->pan_no;
		$data->pan_image  = $vendor1;
		$data->gst_certificate  = $vendor3;
		$data->bank_account_number  = $req->bank_account_number;  
		$data->gst_no  = $req->gst_no;  
		$data->category = $req->category;
		$data->iec=$req->iec;

		$data->cancelled_cheque  =$vendor;  
		$data->ifsc_code  = $req->ifsc_code;  

		$data->agree  = 1; 

		$data->appoved_by_admin=0;  

		$data->save(); 
		$user = User::where('email',$req->email_id)->first();






		require base_path("vendor/autoload.php");
		$mail = new PHPMailer(true);     // Passing `true` enables exceptions


		$subject = 'Vendor Registration';

		$email_message = "Thank you for Registering with us. <br/>
Your massage has been sent successfully.<br/>
Thank you for your enquiry. <br/>It has been forwarded to the 
relevent department and will be dealt with as soon as possible.<br/>
Please get in touch on our official email id: vendorsupport@dinkcha.com";


		try{ 
			// Email server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'dali4978234@gmail.com';                     //SMTP username
			$mail->Password   = 'rvlyvamcrdsfregc';                           //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;   
			$mail->IsHTML(true);                       // port - 587/465
			// port - 587/465


			$mail->AddAddress('order@dinkachika.com', "dinkachika.com");
			$mail->SetFrom("from-DAli4978234@gmail.com", "dinkcha");
			$mail->AddReplyTo('order@dinkachika.com', "dinkachika.com");
			$mail->AddCC($req->email_id, "dinkcha");


			$mail->MsgHTML($email_message);
			$mail->Subject = 'Vendor Registration';
			$mail->Body    = $email_message;
			$mail->send();

		}  
		catch (ModelNotFoundException $exception) {

			return back()->with('msg','Mail Not Send');

		}

		return back()->with('msg','You have successfully submitted your document. Our team contact as soon as possible');  
	}
	public function  searchDetail(Request $req){  
		$data['product'] = DB::table('products')->where('name','Like','%'.$req->search2.'%')->orwhere('cat_id',$req->category)->get();
		// $data['top_selling_product'] = Product::where('top_selling_product' , '!=', null)->where('status',0)->orderBy(DB::raw('RAND()'))->take(30)->get();
		$product=DB::table('products')->where('name','Like','%'.$req->search2.'%')->orwhere('cat_id',$req->category)->get();
		$newproduct=DB::table('products')->where('name','Like','%'.$req->search2.'%')->orwhere('cat_id',$req->category)->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('products')->where('name','Like','%'.$req->search2.'%')->orwhere('cat_id',$req->category)->orderBy('id','asc')->take(3)->get();

		$products=DB::table('products')->where('name','Like','%'.$req->search2.'%')->orwhere('cat_id',$req->category)->first();$count=0; 


		//dd($req->search2);
		return view('ui/webviews.product_search',$data,compact('products','newproduct','newproductl'));
	}
	public function getProductList1(Request $req)
	{

		$exp=explode(",",$req->email_id);
		$password1 = DB::table('users')->where('email',$exp[0])->first();
		if($password1!=null){
			$exp1=explode("=",$exp[1]);
			//  dd($exp1[1]);
			if(Hash::check($exp1[1],$password1->password)){
				$data=1;
			}
			else{
				$data=0;
			}
		}
		else{
			$data=0;  
		}



		return response()->json($data);
	}
	public function export(){
		$product=DB::table('export_products')->get();
		$newproduct=DB::table('export_products')->orderBy('id','desc')->take(3)->get();
		$newproductl=DB::table('export_products')->orderBy('id','asc')->take(3)->get();

		$products=DB::table('export_products')->first();$count=0; 
		$brand=""; 
		$color="";

		return view('ui.webviews.exportcategory',compact('product','products','newproduct','newproductl','brand','color'));
	}
	public function exportProductDetail($id)
	{

		// dd($id);
		$data['productscolor']="";

		$data['product']=DB::table('export_product_image')->where('product_id',$id)->get();
		$data['producst']=DB::table('export_product_image')->where('product_id',$id)->first();

		//dd($data['product']);
		$data['product_detail']=DB::table('export_products')->where('id',$id)->first();

		$data['productsizes']="";

		$data['productsize']="";


		return view('ui.webviews.export_product_detail',$data);
	}
	public function bulkorder(Request $req){
		//dd($req);
		DB::table('bulk_order')->insert([

			'user_name'=>$req->name,
			'product_name'=>$req->product_name,
			'user_email'=>$req->email,
			'user_phone'=>$req->phone,
			'user_address'=>$req->address,
			'product_quentity'=>$req->quantity,
			'country'=>$req->country,
			'port'=>$req->port_name,
			'quantity_type'=>$req->quantity_type,
			'ecoterm'=>$req->eco_term,
			'shipping_option'=>implode(",",$req->shipping_option)


		]);
		return back();
	}
	public function invoicesample(){
		return view('ui.webviews.invoicesample');
	}

    public function samlverify(){
        
        return true;
    }
}
