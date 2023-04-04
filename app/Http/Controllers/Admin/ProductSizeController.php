<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\BannerImage;
use DB;
use App\Product;
use App\ProductSize;
use Auth;
class ProductSizeController extends Controller
{
   
    public function index()
    {
          $product=  DB::table('products')->get();
        $productsize=  DB::table('product_size')->orderBy('id','desc')->get();

        return view('admin.webviews.productsize.index', compact('productsize','product'));
    }
  public function index1()
    {
          $product=  DB::table('products')->where('vendor_id',Auth::user()->id)->get();
        $productsize=  DB::table('product_size')->where('vendor_id',Auth::user()->id)->get();

        return view('admin.webviews.productsize.index', compact('productsize','product'));
    }

   public function productSizeDelete($id){
        
        DB::table('product_size')->where('id',$id)->delete();
       
          return back();
   }
    public function create()
    {
          $category= DB::table('category')->get();
        $sub_category= DB::table('sub_category')->get();
        $header_name= DB::table('header_name')->get();
         if(Auth::user()->id==1){
             $product=  DB::table('products')->get();
       
         }
         else{
            $product=  DB::table('products')->where('vendor_id',Auth::user()->id)->get();
      
         
         }
        return view('admin.webviews.productsize.create',compact('category','sub_category','header_name','product'));
    }

    public function store(Request $req)
    {
          $count=0;
     // dd($req);
       $stock=explode(",",$req->stock);
        $size=explode(",",$req->size);
       //dd($stock);
       $mrp=explode(",",$req->mrp);
       $offer_price=explode(",",$req->offer_price);
        foreach($size as $r){
          DB::table('product_size')->insert([
           'product_id'=>$req->product_id,
           'color_id'=>$req->color_id,
           'stock'=>$stock[$count],
           'size'=>$r,
           'price'=>$mrp[$count],
           'offer_price'=>$offer_price[$count]
                 ]); 
           
         }
            
          
        return redirect()->route('productsize.index');
    }

 public function store1(Request $req)
    {
          $count=0;
     // dd($req);
       $stock=explode(",",$req->stock);
        $size=explode(",",$req->size);
       //dd($stock);
       $mrp=explode(",",$req->mrp);
       $offer_price=explode(",",$req->offer_price);
        foreach($size as $r){
          DB::table('product_size')->insert([
           'product_id'=>$req->product_id,
           'color_id'=>$req->color_id,
           'stock'=>$stock[$count],
           'size'=>$r,
           'price'=>$mrp[$count],
           'offer_price'=>$offer_price[$count],
            'vendor_id'=>Auth::user()->id,
                 ]); 
           
         }
            
          
        return redirect('vendor-productsize-index1');
    }

    public function edit($id)
    {

          
        $productcolor= DB::table('product_color')->get();
         $product= DB::table('products')->get();
         $size= DB::table('product_size')->where('id',$id)->first();
        return view('admin.webviews.productsize.edit', compact('product','productcolor','size'));
    }

    public function update(Request $req, $id)
    { 
        DB::table('product_size')->where('id',$id)->update([
        'product_id'=>$req->product_id,
         
         'color_id'=>$req->color_id,
         
          'stock'=>$req->stock,
        
          'size'=>$req->size,
          'price'=>$req->mrp,
          'offer_price'=>$req->offer_price,

                    
               ]);
             
         

      return redirect()->route('productsize.index');
    }

    public function show($id)
    {
        // abort_unless(\Gate::allows('bannerimage_show'), 403);
       $product= Product::find($id);
         $category= DB::table('category')->get();
        $sub_category= DB::table('sub_category')->get();
        $header_name= DB::table('header_name')->get();
        
        return view('admin.product.show', compact('product','category','sub_category','header_name'));
    }

    public function destroy(BannerImages $bannerimage)
    {
        
        abort_unless(\Gate::allows('bannerimage_delete'), 403);

        $bannerimage->delete();

        return back();
    }

    public function massDestroy(MassDestroyBannerImagesRequest $request)
    {
        BannerImage::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
    public function todaydeals(Request $req){
        DB::table('products')->where('id',$req->id)->update([
            'today_deals'=>$req->submit
           
       ]); 
       return back();
    }
    public function topProduct(Request $req){
        DB::table('products')->where('id',$req->id)->update([
            'top_product'=>$req->submit
           
       ]); 
       return back();
    }
     public function addTrending(Request $req){
        DB::table('products')->where('id',$req->id)->update([
            'trending'=>$req->submit
           
       ]); 
       return back();
    }
    public function jsonData(Request $req){
        
        if($req->header_name){
        $data['address']=DB::table('category')->where('header_name',$req->header_name)->get();
        return response()->json($data);
        }
        
        if($req->cat_id){
            $data['address']=DB::table('sub_category')->where('category_id',$req->cat_id)->get();
        }
        
        
        return response()->json($data);
    }
    
    public function exportProductList(Request $req){
         $product=  DB::table('export_products')->orderBy('id','desc')->get();
        $productsize=  DB::table('product_size')->orderBy('id','desc')->get();

        return view('admin.webviews.export_product', compact('productsize','product'));
    }
    
      public function addExportProduct(Request $req){
         $product=  DB::table('export_products')->get();
        $productsize=  DB::table('product_size')->orderBy('id','desc')->get();

        return view('admin.webviews.add_export_product', compact('productsize','product'));
    }
     public function addExportProductSubmit( Request $req){
           
            $path2 ="";
             if ($req->hasFile('cover_image')){
                  $file = $req->file('cover_image');
        $filename = 'image'.time().'.'.$req->cover_image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path2 = 'upload/'.$filename;
        }
           DB::table('export_products')->insert([
             
            'cat_id'=>$req->cat_id,
              'name'=>$req->name,
            'product_code'=>$req->product_code,
            'quantity'=>$req->quantity,
            'stock'=>$req->stock,
            'hsn'=>$req->hsn,
            'size'=>$req->size,
            'color'=>$req->color,
            'review'=>$req->review,
            'main_details'=>$req->main_details,
            'description'=>$req->long_description,
            'modal_number'=>$req->modal_number,
            'price'=>$req->price,
             'image'=>$path2,
            
            'offer_price'=>$req->offer_price,
            'vendor_id'=>$req->vendor_id
            
            ]);
           $reg =  DB::table('export_products')->orderBy('id','desc')->first();
         
           
            $count =0;
            foreach($req->file('image') as $img){
                 
                $filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
                $destinationPath = storage_path('../public/upload/product');
                $img->move($destinationPath, $filename);
                $path = 'upload/product/'.$filename;
    
             DB::table('export_product_image')->insert([
                
                'product_id'=>$reg->id,
                'images'=>$path,
                
           ]);
              $count++;
            }
          
         
        return back()->with('mymsg','Data Insert Successfully');
    }
    public function editExportProductSubmit( Request $req){
           
            $path2 ="";
             if ($req->hasFile('image')){
                  $file = $req->file('image');
        $filename = 'image'.time().'.'.$req->image->extension();
        $destinationPath = storage_path('../public/upload');
        $file->move($destinationPath, $filename);
        $path2 = 'upload/'.$filename;
        }
        else{
           $path2= $req->image;   
        }
           DB::table('export_products')->where('id',$req->id)->update([
             
            'cat_id'=>$req->cat_id,
              'name'=>$req->name,
            'product_code'=>$req->product_code,
            'quantity'=>$req->quantity,
            'stock'=>$req->stock,
            'hsn'=>$req->hsn,
            'size'=>$req->size,
            'color'=>$req->color,
            'review'=>$req->review,
            'main_details'=>$req->main_details,
            'description'=>$req->long_description,
            'modal_number'=>$req->modal_number,
            'price'=>$req->price,
             'image'=>$path2,
            
            'offer_price'=>$req->offer_price,
            'vendor_id'=>$req->vendor_id
            
            ]);
           
          
         
        return back()->with('mymsg','Data Insert Successfully');
    }
      public function editExportProduct($id)
    {
 
         $product= DB::table('export_products')->where('id',$id)->first();
         
        return view('admin.webviews.edit_export_product', compact('product'));
    }
      public function exportProductImage()
    {
          $productimages=  DB::table('export_product_image')->get();
        // $productsize=  DB::table('product_size')->orderBy('id','desc')->get();

        return view('admin.webviews.export_product_image', compact('productimages'));
    }
       public function addexportProductimage()
    {
 
         $product= DB::table('export_products')->get();
         
        return view('admin.webviews.add_export_product_image', compact('product'));
    }
     public function addexportProductimageSubmit(Request $req){
           
        
            $count =0;
            foreach($req->file('image') as $img){
                 
                $filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
                $destinationPath = storage_path('../public/upload/product');
                $img->move($destinationPath, $filename);
                $path = 'upload/product/'.$filename;
    
             DB::table('export_product_image')->insert([
                
                'product_id'=>$req->product_id,
                'images'=>$path,
                
           ]);
              $count++;
            }
          
         
        return back()->with('mymsg','Data Insert Successfully');
    }
      public function editexportProductimage($id)
    {

          
        $product= DB::table('export_products')->get();
        
         $images= DB::table('export_product_image')->where('id',$id)->first();
         
        return view('admin.webviews.edit_export_product_image', compact('product','images'));
    }
     public function editexportProductimageSubmit(Request $req,$id){
           
        
           if($req->hasFile('image')){
            $file = $req->file('image');
            $filename = 'image'.time().'.'.$req->image->extension();
            $destinationPath = storage_path('../public/upload');
            $file->move($destinationPath, $filename);
            $path = 'upload/'.$filename;
          }
          else{
              $path=$req->image;
          }
    
             DB::table('export_product_image')->where('id',$id)->update([
                
                'product_id'=>$req->product_id,
                'images'=>$path,
                
           ]);
            
          
         
        return back()->with('mymsg','Data Edit Successfully');
    }
     public function deleteExportProductimage($id)
    {
        DB::table('export_product_image')->where('id',$id)->delete();

       return back()->with('mymsg','Data Delete Successfully');
    }
      public function deleteExportProduct($id)
    {
        DB::table('export_products')->where('id',$id)->delete();

       return back()->with('mymsg','Data Delete Successfully');
    }
	
	
	public function balanceList()
    {
          $product=  DB::table('products')->get();
        $productsize=  DB::table('product_size')->orderBy('id','desc')->get();

        return view('admin.webviews.productsize.index', compact('productsize','product'));
    }
}
