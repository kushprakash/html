<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProudctSize;
use App\Models\ProudctColor;
use App\Models\ProudctImage;
use App\Models\Proudct;
use App\Models\Notification;
use Auth;
use  PHPMailer\PHPMailer\PHPMailer;
use  PHPMailer\PHPMailer\Exception;
use  PHPMailer\PHPMailer\SMTP;
use DB;
class IndexController extends Controller
{
	public function index(){

		if(Auth::user()->vendor=='10'){
			if(url()->previous()==url('admin/login')) {
				return view('admin.webviews.index');
				
			} else {
				if(Auth::user()->vendor=='10'){
				    
					return view('admin.webviews.index');
				}
				else{
					Auth::logout();
					return redirect('/');
				}
			}

		} elseif(Auth::user()->vendor=='3') {

			if(url()->previous()==url('vendor/login')) {
				return view('admin.webviews.index');
			} else {
				if(Auth::user()->vendor=='3') {
					return view('admin.webviews.index');
				} else {
					Auth::logout();
					return redirect('/');
				}

			}
		} elseif(Auth::user()->vendor==1){
			if(Auth::user()->is_active!=1){
				return redirect('index')->with("mymsg23","Thanks for your Login/registration ");
			}
			else{
				Auth::logout();
				return redirect('/');
			}
		} else {
			return redirect('index')->with("mymsg23","Thanks for your Login/registration ");
		}

	}
	public function category(){
		$category= DB::table('category')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		return view('admin.webviews.category',compact('category','menus'));
	}
	public function productreview(){
		$review= DB::table('product_review')->orderby('id','desc')->get();

		return view('admin.webviews.review',compact('review'));
	}
	public function productreviewstatus($id,$ids){
		DB::table('product_review')->where('id',$id)->update([

			'status'=>$ids,
		]);

		return back();
	}
	public function categorydelete($id){
		DB::table('category')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully');
	}


	public function banner(){
		$banner= DB::table('banner_image')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		return view('admin.webviews.banner',compact('banner','menus'));
	}
	public function editProileAdmin(){

		return view('admin.webviews.editprofileadmin');
	}

	public function adminEditSubmit(Request $req){
		if($req->password==$req->password_confirmation){

			DB::table('users')->where('id',Auth::user()->id)->update([
				'password'=>bcrypt($req->password),

			]);
			return view('admin.webviews.editprofileadmin')->with('mymsg','Password Change Successfully');
		}

		else{
			return view('admin.webviews.editprofileadmin')->with('mymsg','Password Not Match');

		}
	}
	public function bannerAddSubmit(Request $req){
		$file = $req->file('banner_image');
		$filename = 'image'.time().'.'.$req->banner_image->extension();
		$destinationPath = storage_path('../public/upload');
		$file->move($destinationPath, $filename);
		$path = 'upload/'.$filename;

		DB::table('banner_image')->insert([
			'tittle'=>$req->banner,
			'image'=>$path,
			'style_text'=>$req->style_text,
			'offer_text'=>$req->offer_text,
			'product_name'=>$req->product_name,
			'starting_price_tittle'=>$req->starting_price_tittle,
			'price'=>$req->price,


		]);
		return back()->with('mymsg','Data Insert Successfully');
	} 
	public function bannerDelete($id){


		DB::table('banner_image')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully');
	} 
	public function categorySubmit(Request $req){
		$file = $req->file('category_image');
		$filename = 'image'.time().'.'.$req->category_image->extension();
		$destinationPath = storage_path('../public/upload');
		$file->move($destinationPath, $filename);
		$path = 'upload/'.$filename;

		DB::table('category')->insert([
			'category'=>$req->category,
			'cat_img'=>$path,
			'header_name'=>$req->header_name,
			'vendor_commission'=>$req->vendor_commission,
			'com_set'=>$req->com_set
		]);

		return back()->with('mymsg','Data Insert Successfully');; 
	}

	public function categoryEditSubmit(Request $req){
		if($req->hasFile('category_image')){
			$file = $req->file('category_image');
			$filename = 'image'.time().'.'.$req->category_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path = 'upload/'.$filename;
		}

		else{
			$path=$req->category_image;


		}
		//dd($req);
		DB::table('category')->where('id',$req->id)->update([
			'category'=>$req->category,
			'cat_img'=>$path,
			'header_name'=>$req->header_name,
			'vendor_commission'=>$req->vendor_commission,
			'com_set'=>$req->com_set
		]);

		return back()->with('mymsg','Data update Successfully');; 
	}
	public function subSubCategoryEditSubmit(Request $req){
		//dd($req);
		DB::table('sub_sub_category')->where('id',$req->id)->update([
			'category_id'=>$req->category_id,
			'sub_category'=>$req->sub_category,
			'sub_sub_category'=>$req->sub_sub_category,
			'header_name'=>$req->header_name

		]);

		return back()->with('mymsg','Data update Successfully');
	}

	public function subCategoryEditSubmit(Request $req){
		DB::table('sub_category')->where('id',$req->id)->update([
			'category_id'=>$req->category_id,
			'sub_category'=>$req->sub_category,
			'header_name'=>$req->header_name
		]);

		return back()->with('mymsg','Data Update Successfully');
	}

	public function subCategory(){
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$category= DB::table('category')->get();

		return view('admin.webviews.sub_category',compact('subcategory','category','menus'));
	}


	public function balancesheet(){


		return view('admin.webviews.balancesheet');
	}
	public function cashflow(){


		return view('admin.webviews.cashflow');
	}
	public function profitloss(){


		return view('admin.webviews.profitloss');
	}
	public function received(){


		return view('admin.webviews.received');
	}
	public function transfred(){


		return view('admin.webviews.transfred');
	}
	public function bussiness(){
		$exp =DB::table('export_expensive')->get();

		return view('admin.webviews.bussiness',compact('exp'));
	}

	public function subCategorySubmit(Request $req){
		DB::table('sub_category')->insert([
			'category_id'=>$req->category_id,
			'sub_category'=>$req->sub_category,
			'header_name'=>$req->header_name
		]);

		return back()->with('mymsg','Data Insert Successfully');
	}
	public function subCategorydelete($id){
		DB::table('sub_category')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully'); 
	}

	public function subSubCategory(){
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();


		return view('admin.webviews.sub_sub_category',compact('subcategory','category','menus','subsubcategory'));
	}
	public function subSubCategorySubmit(Request $req){
		DB::table('sub_sub_category')->insert([
			'category_id'=>$req->category_id,
			'sub_category'=>$req->sub_category,
			'sub_sub_category'=>$req->sub_sub_category,
			'header_name'=>$req->header_name

		]);

		return back()->with('mymsg','Data Insert Successfully');
	}

	public function subSubCategorydelete($id){
		DB::table('sub_sub_category')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully'); 
	}
	public function brandDelete($id){
		DB::table('brands')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully'); 
	}
	public function menusSubmit(Request $req){
		if ($req->hasFile('image')){
			$file = $req->file('image');
			$filename = 'image'.time().'.'.$req->image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path = 'upload/'.$filename;
		}

		DB::table('header_menu')->insert([
			'menu_name'=>$req->menu_name,
			'status'=>$req->status,
			'images'=>$path 
		]);

		return back()->with('mymsg','Data Insert Successfully');
	}
	public function productList(){
		if(Auth::user()->id=='36'){
			$product=DB::table('products')->orderby('id','desc')->get();
		}
		else{
			// $product=DB::table('products')->where('trending',0)->orderby('id','desc')->get();
			$product=DB::table('products')->orderby('id','desc')->get();

		}

		return view('admin.webviews.product_list',compact('product'));
	}
	public function subproductList(){

		$product=DB::table('sub_product')->orderby('id','desc')->get();

		return view('admin.webviews.subproduct_list',compact('product'));
	}

	public function addsubproduct(){

		//$product=DB::table('sub_product')->orderby('id','desc')->get();

		return view('admin.webviews.addsubproduct_list');
	}
	public function subproductEdit($id){
		$product=DB::table('sub_product')->where('id',$id)->first();
		return view('admin.webviews.subeditproduct_list',compact('product'));

	}
	public function subproductDelete($id){
		DB::table('sub_product')->where('id',$id)->delete();
		return back();

	}


	public function addSubProductSubmit(Request $req){

		if ($req->hasFile('image')){
			$file = $req->file('image');
			$filename = 'image'.time().'.'.$req->image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path98= 'upload/'.$filename;
		}
		else{
			$path98=$req->image;
		}
		DB::table('sub_product')->insert([
			'product_name'=>$req->product_name,
			'decription'=>$req->decription,
			'price'=>$req->price,
			'image'=>$path98,


		]);

		return back();
	}

	public function subproductEditSubmit(Request $req){

		if ($req->hasFile('image')){
			$file = $req->file('image');
			$filename = 'image'.time().'.'.$req->image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path98= 'upload/'.$filename;
		}
		else{
			$path98=$req->image;
		}
		DB::table('sub_product')->where('id',$req->id)->update([
			'product_name'=>$req->name,
			'decription'=>$req->decription,
			'price'=>$req->price,
			'image'=>$path98,


		]);

		return back();
	}

	public function productEdit($id){
		$product=DB::table('products')->where('id',$id)->first();
		$vendors=DB::table('vendor_details')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();

		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();


		return view('admin.webviews.product_edit',compact('product','vendors','menus','subcategory','category','subsubcategory'));
	}

	public function productEditSubmit(Request $req){

		if ($req->hasFile('describtion_image')){
			$file = $req->file('describtion_image');
			$filename = 'image'.time().'.'.$req->describtion_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path98= 'upload/'.$filename;
		}
		else{
			$path98=$req->describtion_image;
		}
		if ($req->hasFile('product_video')){
			$file = $req->file('product_video');
			$filename = 'video322222'.time().'.'.$req->product_video->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path980= 'upload/'.$filename;
		}
		else{
			$path980=$req->product_video;
		}
		//dd($req->sub_product);
		if($req->sub_product != null){
			$sl=implode(",",$req->sub_product);
		}
		else{

			$sl=""; 
		}
		DB::table('products')->where('id',$req->id)->update([
			'header_name'=>$req->header_name,
			'cat_id'=>$req->cat_id,
			'sub_cat_id'=>$req->sub_cat_id,
			'sub_sub_cat_id'=>$req->sub_sub_cat_id,
			'name'=>$req->name,
			'product_code'=>$req->product_code,
			'quantity'=>$req->quantity,
			'stock'=>$req->stock,
			'describtion_image'=>$path98,
			'retailer'=>$req->retailer,
			'sub_product'=>$sl,
			'shippingdetail'=>$req->shippingdetail,
			'total_detail'=>$req->total_detail,
			'holesaler'=>$req->holesaler,
			'retailer_price'=>$req->retailer_price,
			'wholesaler_price'=>$req->wholesaler_price,
			'hsn'=>$req->hsn,
			'shipping_charges'=>$req->shipping_charges,
			'product_video'=>$path980,
			'gst'=>$req->gst,
			'size'=>$req->size,
			'color'=>$req->color,
			'review'=>$req->review,
			'main_details'=>$req->main_details,
			'description'=>$req->long_description,
			'modal_number'=>$req->modal_number,
			'price'=>$req->price,
			'brand_id'=>$req->brand_id,
			'offer_price'=>$req->offer_price,
			'vendor_commission'=>$req->vendor_commission,
			'com_set'=>$req->com_set
		]);

		return back()->with('mymsg','Data Edit Successfully');
	}

	public function productview($id){
		$value=DB::table('products')->where('id',$id)->first();
		$color=DB::table('product_color')->where('product_id',$id)->get();
		$size=DB::table('product_size')->where('product_id',$id)->get();


		return view('admin.webviews.product_view',compact('value'));
	}
	public function productInventory($id){
		$value=DB::table('products')->where('id',$id)->first();
		$color=DB::table('product_color')->where('product_id',$id)->get();
		// dd($color);
		$size=DB::table('product_size')->where('product_id',$id)->get();

		return view('admin.webviews.product_inventory',compact('value','color','size'));
	}
	public function addProduct(){
		$vendors=DB::table('vendor_details')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();

		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();


		return view('admin.webviews.add_product',compact('vendors','menus','subcategory','category','subsubcategory'));
	}

	public function addProductImage(){
		$vendors=DB::table('vendor_details')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();
		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();
		$product=DB::table('products')->orderby('id','desc')->get();

		return view('admin.webviews.add_product_image',compact('vendors','menus','subcategory','category','subsubcategory','product'));
	}

	public function addProductImageview(){
		$vendors=DB::table('vendor_details')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();
		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();
		$product=DB::table('products')->orderby('id','desc')->get();
		$productimages=DB::table('product_images')->orderby('id','desc')->get();

		return view('admin.webviews.productimages.index',compact('vendors','menus','subcategory','category','subsubcategory','product','productimages'));
	}
	public function vendorAddProductImageView(){
		$vendors=DB::table('vendor_details')->where('user_id',Auth::user()->id)->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();
		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();
		$product=DB::table('products')->orderby('id','desc')->get();
		$productimages=DB::table('product_images')->where('vendor_id',Auth::user()->id)->orderby('id','desc')->get();

		return view('admin.webviews.productimages.index',compact('vendors','menus','subcategory','category','subsubcategory','product','productimages'));
	}
	public function bulkorder(){
		$product=DB::table('bulk_order')->orderby('id','desc')->get();


		return view('admin.webviews.bulk_order',compact('product'));

	}
	public function   bulkorderdelete($id){
		DB::table('bulk_order')->where('id',$id)->delete();
		return back();
	}
	public function jsonData(Request $req){

		if($req->header_name){
			$data['address']=DB::table('category')->where('header_name',$req->header_name)->get();
			return response()->json($data);
		}

		if($req->cat_id){
			$data['address']=DB::table('sub_category')->where('category_id',$req->cat_id)->get();
			$data['address1']=DB::table('products')->where('cat_id',$req->cat_id)->get();

		}

		if($req->sub_cat_id){
			$data['address']=DB::table('sub_sub_category')->where('sub_category',$req->sub_cat_id)->get();

		}
		if($req->product_name){
			$data['address']=DB::table('product_color')->where('product_id',$req->product_name)->get();
		}


		return response()->json($data);
	}

	public function addexportsdetail($id){
		$product=DB::table('products')->where('id',$id)->first();
		DB::table('products')->where('id',$id)->update([
			'export_product'=>1,

		]);
		$productss=DB::table('product_color')->where('product_id',$id)->get();
		$products=DB::table('product_size')->where('product_id',$id)->get();

		//dd($productss);
		foreach($productss as $c){
			$color[]=$c->color_name; 
		}
		$colors=implode(",",$color);
		foreach($products as $c){

			$offer_price[]=$c->offer_price; 
			$size[]=$c->size; 
			$price[]=$c->price; 
		}
		$product_imagess=DB::table('product_images')->where('product_id',$id)->first();

		$sizes=implode(",",$size);
		$prices=implode(",",$price);
		$offers=implode(",",$offer_price);
		// dd($prices);
		$productsss=DB::table('product_color')->where('product_id',$id)->first();
		$productss=DB::table('product_size')->where('product_id',$id)->first();

		DB::table('export_products')->insert([
			'header_name'=>$product->header_name,
			'cat_id'=>'export',


			'name'=>$product->name,
			'product_code'=>$product->product_code,
			'quantity'=>$product->quantity,
			'stock'=>$product->stock,
			'hsn'=>$product->hsn,
			'size'=>$productss->size,
			'image'=>$product_imagess->images,
			'color'=>$productsss->color_name,
			'review'=>$product->review,
			'main_details'=>$product->main_details,
			'description'=>$product->description,
			'modal_number'=>$product->modal_number,
			'price'=>$productss->price,
			'offer_price'=>$productss->offer_price,
			'vendor_id'=>$product->vendor_id

		]);
		$producid=DB::table('export_products')->orderby('id','desc')->first();

		$product_image=DB::table('product_images')->where('product_id',$id)->get();

		foreach($product_image as $r){


			DB::table('export_product_image')->insert([

				'product_id'=>$producid->id,

				'images'=>$r->images,

			]);
		}
		return back();
	}
	public function addProductSubmit( Request $req){
		$path98="";
		if ($req->hasFile('describtion_image')){
			$file = $req->file('describtion_image');
			$filename = 'image'.time().'.'.$req->describtion_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path98= 'upload/'.$filename;
		}
		if ($req->hasFile('product_video')){
			$file = $req->file('product_video');
			$filename = 'video322222'.time().'.'.$req->product_video->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path980= 'upload/'.$filename;
		}
		else{
			$path980=$req->product_video;
		}
		//	dd($req->sub_product);
		$data=isset($req->sub_product)?implode(",",$req->sub_product):'';
		DB::table('products')->insert([
			'header_name'=>$req->header_name,
			'cat_id'=>$req->cat_id,
			'sub_cat_id'=>$req->sub_cat_id,
			'sub_sub_cat_id'=>$req->sub_sub_cat_id,
			'brand_id'=>$req->brand_id,
			'name'=>$req->name,
			'sub_product'=>$data,
			'product_code'=>$req->product_code,
			'quantity'=>$req->quantity,
			'shipping_charges'=>$req->shipping_charges,
			'shippingdetail'=>$req->shippingdetail,
			'total_detail'=>$req->total_detail,

			'gst'=>$req->gst,
			'stock'=>$req->stock,
			'describtion_image'=>$path98,
			'product_video'=>$path980,

			'hsn'=>$req->hsn,
			'retailer'=>$req->retailer,
			'holesaler'=>$req->holesaler,
			'retailer_price'=>$req->retailer_price,
			'wholesaler_price'=>$req->wholesaler_price,
			'size'=>$req->size,
			'color'=>$req->color,
			'review'=>$req->review,
			'main_details'=>$req->main_details,
			'description'=>$req->long_description,
			'modal_number'=>$req->modal_number,
			'price'=>$req->price,
			'offer_price'=>$req->offer_price,
			'vendor_id'=>$req->vendor_id,
			'vendor_commission'=>$req->vendor_commission,
			'com_set'=>$req->com_set

		]);
		$reg =  DB::table('products')->orderBy('id','desc')->first();
		DB::table('product_color')->insert([

			'header_name'=>$req->header_name,
			'category'=>$req->cat_id,
			'subcategory'=>$req->sub_cat_id,
			'sub_subcategory'=>$req->sub_sub_cat_id,
			'product_id'=>$reg->id,
			'color_name'=>$req->color,
			'vendor_id'=>$req->vendor_id
		]);
		$reg2 =  DB::table('products')->orderBy('id','desc')->first();

		DB::table('product_size')->insert([
			'size'=>$req->size,
			'price'=>$req->price,
			'offer_price'=>$req->offer_price,
			'product_id'=>$reg->id,
			'color_id'=>$reg2->id,
			'stock'=>$req->stock,
			'vendor_id'=>$req->vendor_id
		]);
		$reg1 =  DB::table('product_size')->orderBy('id','desc')->first();
		$path2 ="";
		if ($req->hasFile('cover_image')){
			$file = $req->file('cover_image');
			$filename = 'image'.time().'.'.$req->cover_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path2 = 'upload/'.$filename;
		}

		$count =0;
		if(!empty($req->file('image'))){ $data1=$req->file('image'); }else { $data1= array(); }
		foreach($data1 as $img){

			$filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
			$destinationPath = storage_path('../public/upload/product');
			$img->move($destinationPath, $filename);
			$path = 'upload/product/'.$filename;

			DB::table('product_images')->insert([
				'header_name'=>$req->header_name,
				'category'=>$req->cat_id,
				'subcategory'=>$req->sub_cat_id,
				'sub_subcategory'=>$req->sub_sub_cat_id,
				'product_id'=>$reg->id,
				'color_id'=>$reg2->id,
				'size_id'=>$reg1->id,
				'cover_image'=>$path2,
				'images'=>$path,
				'vendor_id'=>$req->vendor_id
			]);
			$count++;
		}




		if($req->export_product==1){
			$product=DB::table('products')->where('id',$reg->id)->first();
			DB::table('products')->where('id',$reg->id)->update([
				'export_product'=>1,

			]);
			$productss=DB::table('product_color')->where('product_id',$reg->id)->get();
			$products=DB::table('product_size')->where('product_id',$reg->id)->get();

			//dd($productss);
			foreach($productss as $c){
				$color[]=$c->color_name; 
			}
			$colors=implode(",",$color);
			foreach($products as $c){

				$offer_price[]=$c->offer_price; 
				$size[]=$c->size; 
				$price[]=$c->price; 
			}
			$product_imagess=DB::table('product_images')->where('product_id',$reg->id)->first();

			$sizes=implode(",",$size);
			$prices=implode(",",$price);
			$offers=implode(",",$offer_price);
			// dd($prices);
			$productsss=DB::table('product_color')->where('product_id',$reg->id)->first();
			$productss=DB::table('product_size')->where('product_id',$reg->id)->first();

			DB::table('export_products')->insert([
				'header_name'=>$product->header_name,
				'cat_id'=>'export',


				'name'=>$product->name,
				'product_code'=>$product->product_code,
				'quantity'=>$product->quantity,
				'stock'=>$product->stock,
				'hsn'=>$product->hsn,
				'size'=>$productss->size,
				'image'=>$product_imagess->images,
				'color'=>$productsss->color_name,
				'review'=>$product->review,
				'main_details'=>$product->main_details,
				'description'=>$product->description,
				'modal_number'=>$product->modal_number,
				'price'=>$req->ex_price,
				'offer_price'=>$req->ex_price,
				'vendor_id'=>$product->vendor_id

			]);
			$producid=DB::table('export_products')->orderby('id','desc')->first();

			$product_image=DB::table('product_images')->where('product_id',$reg->id)->get();

			foreach($product_image as $r){


				DB::table('export_product_image')->insert([

					'product_id'=>$reg->id,

					'images'=>$r->images,

				]);
			}
		}

		return back()->with('mymsg','Data Insert Successfully');
	}

	public function addProductImageSumit(Request $req){

		$file=$req->file('cover_images');
		$filename = 'image'.time().'.'.$req->cover_images->extension();
		$destinationPath = storage_path('../public/upload/product');
		$file->move($destinationPath, $filename);
		$path1 = 'upload/product/'.$filename;


		$count =0;
		foreach($req->file('image') as $img){

			$filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
			$destinationPath = storage_path('../public/upload/product');
			$img->move($destinationPath, $filename);
			$path = 'upload/product/'.$filename;

			DB::table('product_images')->insert([
				'header_name'=>$req->header_name,
				'category'=>$req->cat_id,
				'subcategory'=>$req->sub_cat_id,
				'sub_subcategory'=>$req->sub_sub_cat_id,

				'product_id'=>$req->product_id,
				'color_id'=>$req->color_id,
				'cover_image'=>$path1,
				'images'=>$path
			]);
			$count++;
		}


		return back()->with('mymsg','Data Insert Successfully');
	}

	public function order(){
	    
		$order_detail =  DB::table('order_detail')->where('payment_status','paid')->orderby('id','desc')->take('500')->paginate(50);
	$emailsd="";
		$start_date="";
		$end_date="";
		return view('admin.webviews.order',compact('order_detail','emailsd','start_date','end_date'));
	}
		public function reportSearchorder(Request $req){
		    if($req->emails != null){
			$order_detail=DB::table('order_detail')->where('user_id',$req->emails)->where('payment_status','paid')->whereDate('created_at','>=',$req->start_date)->whereDate('created_at','<=',$req->end_date)->orderby('id','desc')->get();
		}
		else{
			$order_detail=DB::table('order_detail')->where('payment_status','paid')->whereDate('created_at','>=',$req->start_date)->whereDate('created_at','<=',$req->end_date)->orderby('id','desc')->get();
			//d('dd');

		}
		$emailsd=$req->emails;
		$start_date=$req->start_date;
		$end_date=$req->end_date;
		return view('admin.webviews.order',compact('order_detail','emailsd','start_date','end_date'));
	}
	public function report(){
		$order_detail=  DB::table('order_detail')->where('payment_status','paid')->orderby('id','desc')->take('500')->get();
		$emailsd="";
		$start_date="";
		$end_date="";
		return view('admin.webviews.reports',compact('order_detail','emailsd','start_date','end_date'));
	}
	public function reportSearch(Request $req){
		if($req->emails != null){
			$order_detail=DB::table('order_detail')->where('user_id',$req->emails)->where('payment_status','paid')->whereDate('created_at','>=',$req->start_date)->whereDate('created_at','<=',$req->end_date)->orderby('id','desc')->get();
		}
		else{
			$order_detail=DB::table('order_detail')->where('payment_status','paid')->whereDate('created_at','>=',$req->start_date)->whereDate('created_at','<=',$req->end_date)->orderby('id','desc')->get();
			//d('dd');

		}
		$emailsd=$req->emails;
		$start_date=$req->start_date;
		$end_date=$req->end_date;
		return view('admin.webviews.reports',compact('order_detail','emailsd','start_date','end_date'));
	}



	public function getorder(){

		$order_detail=  DB::table('order_detail')->where('payment_status','paid')->orderby('id','desc')->get();
		$response['data'] = $order_detail;
		return response()->json($response);
	}


	public function orderproductlist(){
		$order_detail=  DB::table('order_detail')->where('payment_status','paid')->orderby('id','desc')->get();

		return view('admin.webviews.orderproductlist',compact('order_detail'));
	}
	public function vendorOrder(){
		$order_detail=  DB::table('order_detail')->where('payment_status','paid')->orderby('id','desc')->take('500')->get();
	$emailsd="";
		$start_date="";
		$end_date="";
		return view('admin.webviews.order',compact('order_detail','emailsd','start_date','end_date'));
	//	return view('admin.webviews.order',compact('order_detail'));
	}
	public function listCoupans(){
		return view('admin.webviews.list_coupans');
	}
	public function addCoupans(){
		return view('admin.webviews.add_coupans');
	}
	public function media(){
		return view('admin.webviews.media');
	}
	public function menusList(){
		$menus=DB::table('header_menu')->orderby('id','desc')->get();

		return view('admin.webviews.menus_list',compact('menus'));
	} 
	public function menusDelete($id){
		$menus=DB::table('header_menu')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully');
	} 
	public function productDelete($id){
		$menus=DB::table('products')->where('id',$id)->delete();

		return back()->with('mymsg','Data Delete Successfully');
	} 
	public function menuscreate(){
		return view('admin.webviews.menus_create');
	}
	public function userList(){
		return view('admin.webviews.user_list');
	}
	public function addUser(){
		return view('admin.webviews.add_user');
	}
	public function vendorList(){
		$vendor=DB::table('vendor_details')->orderBy('id','desc')->get();

		return view('admin.webviews.vendor_list',compact('vendor'));
	}
	public function addVendor(){
		return view('admin.webviews.add_vendor');
	}

	public function vendorapprove($status,$vendors_id) {
		$user1 = DB::table('vendor_details')->where('id', $vendors_id)->first();
		DB::table('vendor_details')->where('id', $vendors_id)->update(['appoved_by_admin' => $status]); 
		DB::table('users')->where('id', $user1->user_id)->update([
			'is_active' =>1,
			'vendor' =>3
		]); 
		$user1 =  DB::table('vendor_details')->where('id', $vendors_id)->first();
		$user =  DB::table('users')->where('email',$user1->email_id)->first();

		/*   if($user!=null){ 
                 if ($user->email != null) {
                     //dd($to);
                    $subject = 'Approve Now By dinkcha';


require base_path("vendor/autoload.php");
 $mail = new PHPMailer;     // Passing `true` enables exceptions


 $subject = 'Vendor Registration';

     $email_message = "Welcome to dinkcha <br/> Panel Login URL:->http://dinkcha.com/dinkcha/public/vendor/login <br/>  Your Id is successfully approved.  <br/> Username:".$user1->email_id."<br/> Password:".$user1->password." <br/> Thankyou";


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
     $mail->AddAddress('info@dinkcha.com', "dinkcha");
     $mail->SetFrom("from-DAli4978234@gmail.com", "dinkcha");
     $mail->AddReplyTo('info@dinkcha.com', "dinkcha");
     $mail->AddCC($user->email, "dinkcha");


     $mail->MsgHTML($email_message);
      $mail->Subject = 'Approve Now By dinkcha';
     $mail->Body    = $email_message;
       $mail->send();

     }  
catch (ModelNotFoundException $exception) {

     return back()->with('msg','Mail Not Send');

 }











                 }   
            }  */
		return back()->with('mymsg','Vendor Detail Approve Successfully'); 
	} 

	public function reports(){
		return view('admin.webviews.reports');
	}
	public function invoice(){
		return view('admin.webviews.invoice');
	}

	public function addExportExpensive(){
		return view('admin.webviews.addexportexpensive');
	}
	public function addExportExpensiveSubmit(Request $req){
		DB::table('export_expensive')->insert([
			'exe_name'=>$req->exe_name,
			'detail'=>$req->detail,
			'pay'=>$req->pay,



		]);

		return back()->with('mymsg','Data Insert Successfully');

	}



	public function brands(){
		$brand=DB::table('brands')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();

		return view('admin.webviews.brand',compact('brand','menus'));
	}
	public function  brandsSubmit(Request $req){
		if ($req->hasFile('image')){
			$file = $req->file('image');
			$filename = 'image'.time().'.'.$req->image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path = 'upload/'.$filename;
		}
		DB::table('brands')->insert([
			'category'=>$req->category_id,
			'subcategory'=>$req->sub_category,
			'sub_subcategory'=>$req->sub_sub_category,
			'header_name'=>$req->header_name,
			'brands'=>$req->brands,
			'images'=>$path


		]);

		return back()->with('mymsg','Data Insert Successfully');
	}
	public function  todayDeals($id,$value){
		//  dd($value);
		DB::table('products')->where('id',$id)->update([
			'today_deals'=>$value 

		]);

		return back()->with('mymsg','Today Deals Product Status Change');
	}
	public function  tranding($id,$value){
		// dd($value);
		DB::table('products')->where('id',$id)->update([
			'trending'=>$value 

		]);

		return back()->with('mymsg','Tranding product Status Change');
	}
	public function addCartquantity(Request $req){
		if(Auth::check()){
			DB::table('carts')->where('id',$req->cart_id)->update([

				'quantity'=>$req->quantity

			]);
			return back();
		}
		else{

			DB::table('carts_temp')->where('id',$req->cart_id)->update([

				'quantity'=>$req->quantity

			]);
			return back();

		}
	}
	public function addCartDelete($id){

		if(Auth::check()){
			$sak=DB::table('carts')->where('id',$id)->first();
			DB::table('add_sub_product_user')->where('product_id',$sak->product_id)->where('user_id',Auth::user()->id)->delete();
			DB::table('carts')->where('id',$id)->delete();
			return back();

		} 
		else{
			DB::table('carts_temp')->where('id',$id)->delete();
			return back();
		}        

	}
	public function  SaleOfThisMonth($id,$value){
		//  dd($value);
		DB::table('products')->where('id',$id)->update([
			'top_product'=>$value 

		]);

		return back()->with('mymsg','Sale Of This Months Status Change');
	}
	public function vendorProductList(){
		$vendor=DB::table('vendor_details')->where('user_id',Auth::user()->id)->first();

		$product=DB::table('products')->where('vendor_id',Auth::user()->id)->orderby('id','desc')->get();


		return view('admin.webviews.product_list',compact('product'));
	}
	public function vendorProductEdit($id){
		$product=DB::table('products')->where('id',$id)->first();
		$vendors=DB::table('vendors')->orderby('vendors_id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();

		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();


		return view('admin.webviews.product_edit',compact('product','vendors','menus','subcategory','category','subsubcategory'));
	}

	public function vendorProductEditSubmit(Request $req){
		DB::table('products')->where('id',$req->id)->update([
			'header_name'=>$req->header_name,
			'cat_id'=>$req->cat_id,
			'sub_cat_id'=>$req->sub_cat_id,
			'sub_sub_cat_id'=>$req->sub_sub_cat_id,
			'name'=>$req->name,
			'product_code'=>$req->product_code,
			'quantity'=>$req->quantity,
			'stock'=>$req->stock,
			'shipping_charges'=>$req->shipping_charges,
			'shippingdetail'=>$req->shippingdetail,
			'total_detail'=>$req->total_detail,
			'gst'=>$req->gst,
			'retailer'=>$req->retailer,
			'holesaler'=>$req->holesaler,
			'hsn'=>$req->hsn,
			'size'=>$req->size,
			'color'=>$req->color,
			'review'=>$req->review,
			'main_details'=>$req->main_details,
			'description'=>$req->long_description,
			'retailer_price'=>$req->retailer_price,
			'wholesaler_price'=>$req->wholesaler_price,
			'modal_number'=>$req->modal_number,
			'price'=>$req->price,
			'offer_price'=>$req->offer_price,
			'brand_id'=>$req->brand_id,


		]);
		return back()->with('mymsg','Data Edit Successfully');
	}


	public function vendorproductview($id){
		$value=DB::table('products')->where('id',$id)->first();
		$color=DB::table('product_color')->where('product_id',$id)->get();
		$size=DB::table('product_size')->where('product_id',$id)->get();


		return view('admin.webviews.product_view',compact('value'));
	}
	public function vendorAddProduct(){
		$vendors=DB::table('vendor_details')->orderby('id','desc')->get();
		$menus=DB::table('header_menu')->orderby('id','desc')->get();
		$subcategory=DB::table('sub_category')->orderby('id','desc')->get();

		$category= DB::table('category')->get();
		$subsubcategory=DB::table('sub_sub_category')->orderby('id','desc')->get();


		return view('admin.webviews.add_product',compact('vendors','menus','subcategory','category','subsubcategory'));
	}
	public function vendorAddProductSubmit( Request $req){

		$path98=" ";
		if ($req->hasFile('describtion_image')){
			$file = $req->file('describtion_image');
			$filename = 'image'.time().'.'.$req->describtion_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path98= 'upload/'.$filename;
		}
		DB::table('products')->insert([
			'header_name'=>$req->header_name,
			'cat_id'=>$req->cat_id,
			'sub_cat_id'=>$req->sub_cat_id,
			'sub_sub_cat_id'=>$req->sub_sub_cat_id,
			'name'=>$req->name,
			'shippingdetail'=>$req->shippingdetail,
			'total_detail'=>$req->total_detail,
			'product_code'=>$req->product_code,
			'quantity'=>$req->quantity,
			'retailer'=>$req->retailer,
			'holesaler'=>$req->holesaler,
			'retailer_price'=>$req->retailer_price,
			'wholesaler_price'=>$req->wholesaler_price,
			'shipping_charges'=>$req->shipping_charges,

			'gst'=>$req->gst,
			'stock'=>$req->stock,
			'describtion_image'=>$path98,
			'hsn'=>$req->hsn,
			'size'=>$req->size,
			'color'=>$req->color,
			'review'=>$req->review,
			'main_details'=>$req->main_details,
			'description'=>$req->description,
			'modal_number'=>$req->modal_number,
			'price'=>$req->price,
			'offer_price'=>$req->offer_price,
			'brand_id'=>$req->brand_id,
			'vendor_id'=>Auth::user()->id


		]);
		$reg =  DB::table('products')->orderBy('id','desc')->first();
		DB::table('product_color')->insert([

			'header_name'=>$req->header_name,
			'category'=>$req->cat_id,
			'subcategory'=>$req->sub_cat_id,
			'sub_subcategory'=>$req->sub_sub_cat_id,
			'product_id'=>$reg->id,
			'color_name'=>$req->color,
			'vendor_id'=>Auth::user()->id
		]);
		$reg2 =  DB::table('products')->orderBy('id','desc')->first();


		DB::table('product_size')->insert([

			'size'=>$req->size,
			'price'=>$req->price,
			'offer_price'=>$req->offer_price,
			'product_id'=>$reg->id,
			'color_id'=>$reg2->id,
			'stock'=>$reg2->stock,
			'vendor_id'=>Auth::user()->id
		]);
		$reg1 =  DB::table('product_size')->orderBy('id','desc')->first();
		$path2 ="";
		if ($req->hasFile('cover_image')){
			$file = $req->file('cover_image');
			$filename = 'image'.time().'.'.$req->cover_image->extension();
			$destinationPath = storage_path('../public/upload');
			$file->move($destinationPath, $filename);
			$path2 = 'upload/'.$filename;
		}

		$count =0;
		foreach($req->file('image') as $img){

			$filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
			$destinationPath = storage_path('../public/upload/product');
			$img->move($destinationPath, $filename);
			$path = 'upload/product/'.$filename;

			DB::table('product_images')->insert([
				'header_name'=>$req->header_name,
				'category'=>$req->cat_id,
				'subcategory'=>$req->sub_cat_id,
				'sub_subcategory'=>$req->sub_sub_cat_id,
				'product_id'=>$reg->id,
				'color_id'=>$reg2->id,
				'size_id'=>$reg1->id,
				'cover_image'=>$path2,
				'images'=>$path,
				'vendor_id'=>Auth::user()->id
			]);
			$count++;
		}

		if($req->export_product==1){
			$product=DB::table('products')->where('id',$reg->id)->first();
			DB::table('products')->where('id',$reg->id)->update([
				'export_product'=>1,

			]);
			$productss=DB::table('product_color')->where('product_id',$reg->id)->get();
			$products=DB::table('product_size')->where('product_id',$reg->id)->get();

			//dd($productss);
			foreach($productss as $c){
				$color[]=$c->color_name; 
			}
			$colors=implode(",",$color);
			foreach($products as $c){

				$offer_price[]=$c->offer_price; 
				$size[]=$c->size; 
				$price[]=$c->price; 
			}
			$product_imagess=DB::table('product_images')->where('product_id',$reg->id)->first();

			$sizes=implode(",",$size);
			$prices=implode(",",$price);
			$offers=implode(",",$offer_price);
			// dd($prices);
			$productsss=DB::table('product_color')->where('product_id',$reg->id)->first();
			$productss=DB::table('product_size')->where('product_id',$reg->id)->first();

			DB::table('export_products')->insert([
				'header_name'=>$product->header_name,
				'cat_id'=>'export',

				'name'=>$product->name,
				'product_code'=>$product->product_code,
				'quantity'=>$product->quantity,
				'stock'=>$product->stock,
				'hsn'=>$product->hsn,
				'size'=>$productss->size,
				'image'=>$product_imagess->images,
				'color'=>$productsss->color_name,
				'review'=>$product->review,
				'main_details'=>$product->main_details,
				'description'=>$product->description,
				'modal_number'=>$product->modal_number,
				'price'=>$req->ex_price,
				'offer_price'=>$req->ex_price,
				'vendor_id'=>$product->vendor_id

			]);
			$producid=DB::table('export_products')->orderby('id','desc')->first();

			$product_image=DB::table('product_images')->where('product_id',$reg->id)->get();

			foreach($product_image as $r){


				DB::table('export_product_image')->insert([

					'product_id'=>$reg->id,

					'images'=>$r->images,

				]);
			}
		}

		return back()->with('mymsg','Data Insert Successfully');
	}
	public function vendorAddProductImageSumit(Request $req){

		$file=$req->file('cover_images');
		$filename = 'image'.time().'.'.$req->cover_images->extension();
		$destinationPath = storage_path('../public/upload/product');
		$file->move($destinationPath, $filename);
		$path1 = 'upload/product/'.$filename;


		$count =0;
		foreach($req->file('image') as $img){

			$filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
			$destinationPath = storage_path('../public/upload/product');
			$img->move($destinationPath, $filename);
			$path = 'upload/product/'.$filename;

			DB::table('product_images')->insert([
				'header_name'=>$req->header_name,
				'category'=>$req->cat_id,
				'subcategory'=>$req->sub_cat_id,
				'sub_subcategory'=>$req->sub_sub_cat_id,

				'product_id'=>$req->product_id,
				'color_id'=>$req->color_id,
				'cover_image'=>$path1,
				'images'=>$path,
				'vendor_id'=>Auth::user()->id
			]);
			$count++;
		}


		return back()->with('mymsg','Data Insert Successfully');
	}
	public function vendorDeleted(Request $req,$id){
		$fdsa=DB::table('vendor_details')->where('id',$id)->first();
		DB::table('users')->where('id',$fdsa->user_id)->delete(); 
		DB::table('vendor_details')->where('id',$id)->delete(); 
		return back()->with('mymsg','Data Delted Successfully');
	}
	public function vendorstatus(Request $req,$val,$id){
		DB::table('vendor_details')->where('id',$id)->update([

			'status'=>$val

		]);

		return back()->with('mymsg','vendor Active Successfully');
	}

	public function addbalancesheet(Request $req){
		DB::table('balance_account')->insert([

			'assets'=>$req->assets,
			'assets_price'=>$req->assets_price,
			'liabilities'=>$req->liabilities,
			'liabilities_price'=>$req->liabilities_price,


		]);

		return back()->with('mymsg','Insert Data Successfully');
	}
	public function editbalancesheet(Request $req,$id){
		DB::table('balance_account')->where('id',$id)->update([

			'assets'=>$req->assets,
			'assets_price'=>$req->assets_price,


		]); 
		return back()->with('mymsg','Update Data Successfully');
	}
	public function editbalancesheetss(Request $req,$id){
		DB::table('balance_account')->where('id',$id)->update([

			'liabilities'=>$req->liabilities,
			'liabilities_price'=>$req->liabilities_price,


		]); 
		return back()->with('mymsg','Update Data Successfully');
	}




	public function addcashflow(Request $req){
		DB::table('cashflow')->insert([
			'date'=>$req->date,
			'received'=>$req->received,
			'payable'=>$req->payable,
		]);

		return back()->with('mymsg','Insert Data Successfully');
	}
	public function editcashflow(Request $req,$id){
		DB::table('cashflow')->where('id',$id)->update([

			'date'=>$req->date,
			'received'=>$req->received,
			'payable'=>$req->payable,


		]); 
		return back()->with('mymsg','Update Data Successfully');
	}



	public function addreceived(Request $req){
		DB::table('payment_received')->insert([
			'date'=>$req->date,
			'name'=>$req->name,
			'price'=>$req->price,
			'trasfer'=>$req->trasfer,
		]);

		return back()->with('mymsg','Insert Data Successfully');
	}
	public function editreceived(Request $req,$id){
		DB::table('payment_received')->where('id',$id)->update([

			'date'=>$req->date,
			'name'=>$req->name,
			'price'=>$req->price,
			'trasfer'=>$req->trasfer,


		]); 
		return back()->with('mymsg','Update Data Successfully');
	}




	public function addtransfer(Request $req){
		DB::table('payment_transfer')->insert([
			'date'=>$req->date,
			'name'=>$req->name,
			'price'=>$req->price,
			'trasfer'=>$req->trasfer,
		]);

		return back()->with('mymsg','Insert Data Successfully');
	}
	public function edittransfer(Request $req,$id){
		DB::table('payment_transfer')->where('id',$id)->update([

			'date'=>$req->date,
			'name'=>$req->name,
			'price'=>$req->price,
			'trasfer'=>$req->trasfer,


		]); 
		return back()->with('mymsg','Update Data Successfully');
	}


	public function otherreports(){


		return view('admin.webviews.otherreports');
	}
	public function orderprocess(Request $req,$id){

		date_default_timezone_set('Asia/Kolkata');
		$datmk= date('Y-m-d H:i:s');

		$sa=DB::table('order_detail')->where('payment_request_id',$id)->first();
		$user_id=$sa->user_id;	
		$user_address=DB::table('user_address')->where('user_id',$user_id)->first();
		$user_email=$user_address->email_address;

		$notifications=DB::table('notifications')->where('user_id',$user_id)->where('order_id',$id)->first();

		if(isset($notifications->order_id)){

			DB::table('notifications')->where('user_id',$user_id)->where('order_id',$id)->update([
				'status'=>$req->valu,
				'time'=>5
			]);

		} else {


			DB::table('notifications')->insert([
				'user_id'=>$user_id,
				'order_id'=>$id,
				'email'=>$user_email,
				'time'=>5,
				'status'=>$req->valu,
				'created_at'=>$datmk,
				'updated_at'=>$datmk
			]);

		}

		if(!$req->delivery_time){
			$sa=DB::table('order_detail')->where('payment_request_id',$id)->first();
			$time=$sa->delivery_time;
		}
		else{
			$time=$req->delivery_time;
		}	

		if($req->delivery_time==null){
			$sa=DB::table('order_detail')->where('payment_request_id',$id)->first();
			$time=$sa->delivery_time;
		}
		else{
			$time=$req->delivery_time;
		}


		DB::table('order_detail')->where('payment_request_id',$id)->update([
			'delivery'=>$req->valu,
			'order_status'=>$req->valu,
			'notify'=>2,
			'delivery_time'=>$time,
		]);

		DB::table('order_history')->insert([
			'status'=>$req->valu,
			'order_id'=>$id,
			'created_at'=>$datmk,
		]);
		if($req->valu==4){
			return redirect('order-invoice-admin/'.$id);
		}




		return back();
	}


	public function notification(){

		$notifications=DB::table('notifications')->where('time','>',0)->get();

		foreach($notifications as $row){

			$order_id=$row->order_id;
			$email=$row->email;
			$status=$row->status;
			$time=$row->time;
			
$order = DB::table('order_detail')->where('order_id',$order_id)->first();
				$orderd = DB::table('sub_order')->where('order_id',$order_id)->get();
				$userDetail=DB::table('user_address')->where('id',$order->address_id)->first();
			
if($time>0)	{
    
if($status==1){
	$message= "<html><head></head><body style='width:350px;'>
						
						<div style='width:100%;margin-top:20px;border:1px solid gray;'>
						<br>
						<center>Order #Games-".$order->payment_request_id."</center><br>
							<h4>Your food is Delivered</h4>
						</div>
	</body></html>";
	

		$parameters = array(
          'message'=>$message,
          'email'=>$email,
          'order'=>$order->payment_request_id
       );
     
        $method = 'POST';

        $url = 'https://www.pay1service.com/mailecom.php';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);

}
			
if($status==2){
	$message= "<html><head></head><body >
						
						<div style='width:100%;margin-top:20px;border:1px solid gray;'>
						<br>
						<center>Order #Games-".$order->payment_request_id."</center><br>
							<h4>Your order is being processed.</h4>
						</div>
	</body></html>";
	

		$parameters = array(
          'message'=>$message,
          'email'=>$email,
          'order'=>$order->payment_request_id
       );
     
        $method = 'POST';

        $url = 'https://www.pay1service.com/mailecom.php';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);

}
			
if($status==3){
	$message= "<html><head></head><body >
						
						<div style='width:100%;margin-top:20px;border:1px solid gray;'>
						<br>
						<center>Order #Games-".$order->payment_request_id."</center><br>
							<h4>Your food is ready. Head on over to the Tuck Shop counter & collect it soon!</h4>
						</div>
	</body></html>";
	

	$parameters = array(
          'message'=>$message,
          'email'=>$email,
          'order'=>$order->payment_request_id
       );
     
        $method = 'POST';

        $url = 'https://www.pay1service.com/mailecom.php';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);
}

			if($status==4){

				

				$items='';
				$final=$order->total_amount-$order->wallet;
				if($order){

					$tot=$pris=$sam=0;

					foreach($orderd as $key=>$item){  

						$productsize=DB::table('product_size')->where('id',$item->size_id)->first();
						$productname=DB::table('products')->where('id',$productsize->product_id)->first();// dd($par); 
						$product_images=DB::table('product_images')->where('product_id',$item->product_id)->first();// dd($par); 
						$productcolor=DB::table('product_color')->where('id',$item->color_id)->first(); 
						$damsa=DB::table('sub_order')->where('order_id',$item->order_id)->where('product_id',$item->product_id)->where('user_id',$userDetail->user_id)->first();  

						$pric=$item->quantity*$item->price;
						$pris += $pric+$sam;
						$tot=$pric+$sam;
                        
						
						$items =$items."<tr>
						<td style='border:1px solid gray;text-center;'>".$productname->name."</td>
	<td style='border:1px solid gray;text-center;'><img style='width:50px;height:50px;' src=".asset($product_images->cover_image)."></td>
	<td style='border:1px solid gray;text-center;'>".$productsize->offer_price."</td>
	<td style='border:1px solid gray;text-center;'>".$item->quantity."</td>
	<td style='border:1px solid gray;text-center;'>".$tot." </td>
    </tr>";


					}




					$message= "<html><head></head><body >
						
						<div style='width:100%;margin-top:20px;border:1px solid gray;'>
						<br>
						<center>Order #Games-".$order->payment_request_id."</center>
						
						<table style='border:1px solid gray;margin-top:10px;'>
						<tr >
							<td style='border:1px solid gray;width:20%;text-center;'>Item</td>
							<td style='border:1px solid gray;width:20%;text-center;'>Image</td>
							<td style='border:1px solid gray;width:20%;text-center;'>Cost</td>
							<td style='border:1px solid gray;text-center;'>Sub Item Price & Qty</td>
							<td style='border:1px solid gray;width:20%;text-center;'>Total</td>
						</tr>
						$items
						
						<tr >
						   
							<td colspan='4' style='border:1px solid gray;text-center;' >Items Subtotal</td>
							<td style='border:1px solid gray;width:20%;text-center;'>₹ ".$pris."</td>
						</tr>
						
							<tr >
						   
							<td colspan='4' style='border:1px solid gray;text-center;' >Rewards</td>
							<td style='border:1px solid gray;width:20%;text-center;'>₹ ".$order->wallet."</td>
						</tr>
						
							<tr >
						   
							<td colspan='4' style='border:1px solid gray;text-center;' >Order Total</td>
							<td style='border:1px solid gray;width:20%;text-center;'>₹ ".$final."</td>
						</tr>
						 
						
						 
						
						
							
							</div>
	</body></html>";
      
					$parameters = array(
          'message'=>$message,
          'email'=>$email,
          'order'=>$order->payment_request_id
       );
     
        $method = 'POST';

        $url = 'https://www.pay1service.com/mailecom.php';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $response = curl_exec($ch);

				}
			}
			
				DB::table('notifications')->where('order_id',$order_id)->update(['time'=>$time-1]);

}
			
					
		}
	}
}