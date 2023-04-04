<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\BannerImage;
use App\Imports\users;
use DB;
use PDF;
use Auth;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
   public $data = null;

    public function __construct(){
     

      $this->data['header_name'] = DB::table('header_name')->orderBy('id','desc')->take(9)->get(); 
    
    }


	   public function userExcel(Request $request)
    {
        // abort_unless(\Gate::allows('user_access'), 403);

      Excel::import(new users, $request->file('file')->store('files'));
        return redirect()->back();
    }
    public function index()
    {
        // abort_unless(\Gate::allows('user_access'), 403);

        $users = User::where('vendor','!=',10)->where('id','!=',1)->where('vendor','!=',3)->orderby('id','desc')->get();

        return view('admin.webviews.users.index', compact('users'));
    }
	
	
	 public function activeuser($id,$val)
    {
        // abort_unless(\Gate::allows('user_access'), 403);

        User::where('id',$id)->update([
		'is_active'=>$val
		]);

        return back();
    }

    public function create()
    {
        // abort_unless(\Gate::allows('user_create'), 403);

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.webviews.users.create', compact('roles'));
    }

    public function store(Request $req)
    {
        // abort_unless(\Gate::allows('user_create'), 403);
//dd($req);
		User::insert([
		'name'=>$req->name,
		'email'=>$req->email,
		'emp_id'=>$req->emp_id,
		'phone'=>$req->phone,
			'company_name'=>$req->company_name,
			'designation'=>$req->designation,
		'password'=>bcrypt($req->password),
			
		
		]);
        
        return redirect()->route('users.index');
    }

    public function edit($users)
    {
        // abort_unless(\Gate::allows('user_edit'), 403);

           $user = User::where('id',$users)->first();

        // $user->load('roles');

        return view('admin.webviews.users.edit', compact('user'));
    }

    public function update(Request $req,$user)
    {
        // abort_unless(\Gate::allows('user_edit'), 403);
		User::where('id',$user)->update([
        'name'=>$req->name,
		'email'=>$req->email,
		'emp_id'=>$req->emp_id,
		'phone'=>$req->phone,
		'company_name'=>$req->company_name,
		'designation'=>$req->designation,
		'password'=>bcrypt($req->password),
	]);
        
        return redirect()->route('users.index');
    }

    public function show($users)
    {
        // abort_unless(\Gate::allows('user_show'), 403);
         $user = User::where('id',$users)->first();

        return view('admin.webviews.users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        // abort_unless(\Gate::allows('user_delete'), 403);

        $user->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
     public function index1()
    {
      $data = $this->data;
      $data['banner_images']=BannerImage::get();
       return view('ecom.index',$data);
    }
       public function index2()
    {
         $data = $this->data;
         
       //  dd($data);
         $data['banner_images']=BannerImage::get();
         
       return view('ecom.webviews.index',$data);
    }
     public function productDetail($id,$cid)
    {
      $data = $this->data;
      
      $data['productscolor']=DB::table('product_color')->where('id',$cid)->first();
     
      $data['product']=DB::table('product_image')->where('color_id',$cid)->where('product_id',$id)->get();
      //dd($data['product']);
      $data['product_detail']=DB::table('products')->where('id',$id)->first();
       
       $data['productsizes']=DB::table('product_size')->where('product_id',$id)->where('color_id',$cid)->get();
        $data['productsize']=DB::table('product_size')->where('product_id',$id)->where('color_id',$cid)->first();
     
     
       return view('ecom.webviews.product_detail',$data);
    }
    
    public function productsizeDetail($id,$cid,$sid){
         $data = $this->data;
      
      $data['productscolor']=DB::table('product_color')->where('id',$cid)->first();
     
      $data['product']=DB::table('product_image')->where('color_id',$cid)->where('product_id',$id)->get();
      //dd($data['product']);
      $data['product_detail']=DB::table('products')->where('id',$id)->first();
       
       $data['productsizes']=DB::table('product_size')->where('product_id',$id)->where('color_id',$cid)->get();
        $data['productsize']=DB::table('product_size')->where('id',$sid)->first();
      return view('ecom.webviews.product_detail',$data);
    }
    
    
    
     public function productList()
    {
      $data = $this->data;
       return view('ecom.webviews.product_header',$data);
    }
    
    public function productListheaderame($id){
        $data = $this->data;
        $data['product_list']=DB::table('products')->where('header_name',$id)->orderby('id','desc')->paginate(12);
         $data['product_detail']=DB::table('products')->where('header_name',$id)->orderby('id','desc')->paginate(12);
       return view('ecom.webviews.product_header',$data);
    }

    public function productListcategory($id){
        $data = $this->data;
        $data['product_list']=DB::table('products')->where('cat_id',$id)->paginate(12);
         $data['product_detail']=DB::table('products')->where('cat_id',$id)->paginate(12);
        return view('ecom.webviews.product_header',$data);
    }
    public function productListsubcategory($id){
        $data = $this->data;
        $data['product_list']=DB::table('products')->where('sub_cat_id',$id)->paginate(12);
        $data['product_detail']=DB::table('products')->where('sub_cat_id',$id)->paginate(12);
        return view('ecom.webviews.product_header',$data);
    }

    public function productType($name){
        $data = $this->data;
        $data['product_list']=DB::table('products')->where('product_type',$name)->paginate(12);
        $data['product_detail']=DB::table('products')->where('product_type',$name)->paginate(12);
        return view('ecom.webviews.product_header',$data);
    }
      public function addToCart()
    {
        $data = $this->data;
       
        $data['user_cart']  = DB::table('products')->join('carts','products.id','=','carts.product_id')->where('carts.user_id',Auth::user()->id)->orderBy('carts.id','desc')->select('products.*','carts.quantity','carts.id as cart_id','carts.size','carts.color_id')->get();
                                         
                                       
       return view('ecom.webviews.add_to_cart',$data);
    }
    
     public function checkoutForm()
    {
        $data = $this->data;
         $data['user'] = 1;
        $data['user_cart'] = DB::table('products')->join('carts','products.id','=','carts.product_id')->where('carts.user_id',Auth::user()->id)->select('products.*','carts.quantity','carts.id as cart_id','carts.size','carts.color_id')->get();
       
       return view('ecom.webviews.check_out_form',$data);
    }
     public function checkoutForm1(Request $req , $id)
    {
       // dd($req);
        $data = $this->data;
         $data['user'] = 2;
         $data['productsize']=DB::table('product_size')->where('id',$req->size_id)->first();
         //dd($data['productsize']);
         $data['product']=DB::table('products')->where('id',$id)->first();
         $data['quantity']=$req->quantity;
       return view('ecom.webviews.check_out_form',$data);
    }
     public function paymentSuccessPage()
    {
        $data = $this->data;
       return view('ecom.webviews.paymentsuccess',$data);
    }
       public function wishlistPage()
    {
        $data = $this->data;
        $data['user_wishlist'] = DB::table('products')->join('wishlist','products.id','=','wishlist.product_id')->where('wishlist.user_id',Auth::user()->id)->orderBy('wishlist.id','desc')->select('products.*','wishlist.quantity','wishlist.id as wishlist_id','wishlist.size','wishlist.color_id')->get();
       
       return view('ecom.webviews.wishlist',$data);
    }
       public function userDashboard()
    {
        $data = $this->data;
       return view('ecom.webviews.user_profile',$data);
    }
    public function conection(){
       if(Auth::user()->id==1){
        return redirect('home');
       }
       else{
        return  redirect(url()->previous());
       }
    }

    public function addCart(Request $req){
        $addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$req->id)->first();
        $product=DB::table('products')->where('id',$req->id)->first();
         $prices=$product->offer_price*$req->quantity;
        DB::table('carts')->insert([
            'product_id'=>$req->id,
            'user_id'=>Auth::user()->id,
             'quantity'=>$req->quantity,
            'price'=>$prices
        ]);
    }
    
    
    public function addCartJquery(Request $req){
        
        if($req->add_id){
        $addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$req->add_id)->first();
         if($addcart==null){
        $product=DB::table('products')->where('id',$req->add_id)->first();
        $prices=$product->offer_price*1;
        DB::table('carts')->insert([
            'product_id'=>$req->add_id,
            'user_id'=>Auth::user()->id,
            'quantity'=>1,
            'price'=>$prices
        ]);
           $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
            return response()->json($data);
         }
            
        }
        
        if($req->size_id){
            
              $productsize =DB::table('product_size')->where('id',$req->size_id)->first();
        $addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->where('size',$req->size_id)->first();
         if($addcart==null){
         
        DB::table('carts')->insert([
            'product_id'=>$productsize->product_id,
            'user_id'=>Auth::user()->id,
            'quantity'=>1,
            'price'=>$productsize->offer_price,
            'size'=>$req->size_id,
            'color_id'=>$productsize->color_id
        ]);
           $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
            return response()->json($data);
         }
        }
        
        
    }

    public function generatePDF($id){
        $data['sub_order_detail']=DB::table('sub_order')->where('order_id',$id)->get();
        $data['order_detail']=DB::table('order_detail')->where('order_id',$id)->first();
        $pdf = PDF::loadView('invoice_pdf', $data);
        return $pdf->download('invoice.pdf');
    }
     public function myOrder()
    {
       $data = $this->data;
       $data['my_order']=DB::table('order_detail')->where('user_id',Auth::user()->id)->get();
       return view('ecom.webviews.my_order',$data);
    }
    public function myaddcount(){
        $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
		return response()->json($data);
    }
   
      public function addToCartWishlist($id){
            $productsize =DB::table('product_size')->where('id',$id)->first();
        $addcart=DB::table('carts')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->where('size',$id)->first();
         if($addcart==null){
         
        DB::table('carts')->insert([
            'product_id'=>$productsize->product_id,
            'user_id'=>Auth::user()->id,
            'quantity'=>1,
            'price'=>$productsize->offer_price,
            'size'=>$id,
            'color_id'=>$productsize->color_id
        ]);
           $data = DB::table('carts')->where('user_id',Auth::user()->id)->count();
           return back();
         }
        
    
      
    }

    public function addwishlist($id){
        
       
            
        $productsize =DB::table('product_size')->where('id',$id)->first();
        $addcart=DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->first();
         if($addcart==null){
         
        DB::table('wishlist')->insert([
            'product_id'=>$productsize->product_id,
            'user_id'=>Auth::user()->id,
            'quantity'=>1,
            'price'=>$productsize->offer_price,
            'size'=>$id,
            'color_id'=>$productsize->color_id
        ]);
           $data = DB::table('wishlist')->where('user_id',Auth::user()->id)->count();
            return back();
         }
    
        return back();
            
        }
        
        public function wishlistJquery(Request $req){
         if($req->size_id){
            
              $productsize =DB::table('product_size')->where('id',$req->size_id)->first();
        $addcart=DB::table('wishlist')->where('user_id',Auth::user()->id)->where('product_id',$productsize->product_id)->first();
         if($addcart==null){
         
        DB::table('wishlist')->insert([
            'product_id'=>$productsize->product_id,
            'user_id'=>Auth::user()->id,
            'quantity'=>1,
            'price'=>$productsize->offer_price,
            'size'=>$req->size_id,
            'color_id'=>$productsize->color_id
        ]);
           $data = DB::table('wishlist')->where('user_id',Auth::user()->id)->count();
            return response()->json($data);
         }
    }
}


 public function addCartquantity(Request $req){
          
            
          
         
        DB::table('carts')->where('id',$req->cart_id)->update([
             
            'quantity'=>$req->quantity
            
        ]);
           
            return redirect('add-to-cart');
     
}

public function addCartdelete($id){
        DB::table('carts')->where('id',$id)->delete();
            return back();
     
}

public function producCancel($id){
    
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
            CURLOPT_POSTFIELDS =>"{\n    \"email\": \"alam23456222@gmail.com\",\n    \"password\": \"a8171271171\"\n}",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
            ));
            $response1 = curl_exec($curl1);
                                
            curl_close($curl1);
            $data1 = json_decode($response1);
             $order_data =  DB::table('order_detail')->where('order_id',$id)->first();
             
             //dd($order_data);
        $Shiprocket_Order_Id  =  $order_data->Shiprocket_Order_Id;
        $Shiprocket_Shipment_Id  =  $order_data->Shiprocket_Shipment_Id;
       // dd($Shiprocket_Order_Id);
             $token =   $data1->token;
        $curl = curl_init();
        //$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjU3MjAwNSwiaXNzIjoiaHR0cHM6Ly9hcGl2Mi5zaGlwcm9ja2V0LmluL3YxL2V4dGVybmFsL2F1dGgvbG9naW4iLCJpYXQiOjE1OTM1OTcxODksImV4cCI6MTU5NDQ2MTE4OSwibmJmIjoxNTkzNTk3MTg5LCJqdGkiOiJwRVpPS256dGN1WnR1TmtaIn0.yDLq4NuwfPCPUY3sLYbGeUIJquTsU7t70Od22mio-k4";
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://apiv2.shiprocket.in/v1/external/orders/cancel",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\n  \"ids\":[$Shiprocket_Order_Id]\n}",
        CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer $token"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        //dd($response);
        //dd($order_data);
        DB::table('order_detail')->where('order_id',$id)->update([
            'order_status'=>'cancel'
        ]);
         return back();
}



    
}


