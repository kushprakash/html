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
use App\ProductColor;
use Auth;
class ProductColorController extends Controller
{
   
    public function index()
    {
        
        $productcolor=DB::table('product_color')->orderBy('id','desc')->get();

        return view('admin.webviews.productcolor.index', compact('productcolor'));
    }

 public function index1()
    {
        
        $productcolor=DB::table('product_color')->where('vendor_id',Auth::user()->id)->get();

        return view('admin.webviews.productcolor.index', compact('productcolor'));
    }

    public function productColorDelete($id){
        
        DB::table('product_color')->where('id',$id)->delete();
       
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
         
         
        
        return view('admin.webviews.productcolor.create',compact('category','sub_category','header_name','product'));
    }

    public function store(Request $req)
    { 
          $color=explode(",",$req->color_name);
          
        foreach($color as $r){
            DB::table('product_color')->insert([

                'product_id'=>$req->product_id,
                 'color_name'=>strtolower($r)
            ]);
         
        }
        

        return redirect()->route('productscolor.index');
    }  
     public function store1(Request $req)
    { 
          $color=explode(",",$req->color_name);
          
        foreach($color as $r){
            DB::table('product_color')->insert([

                'product_id'=>$req->product_id,
                 'color_name'=>strtolower($r),
                 'vendor_id'=>Auth::user()->id
            ]);
         
        }
        

        return redirect('vendor-productscolor-index1');
    }
    public function edit($id)
    {

          $product= DB::table('products')->get();
         $category= DB::table('category')->get();
        $sub_category= DB::table('sub_category')->get();
        $header_name= DB::table('header_name')->get();
        $productcolor= DB::table('product_color')->where('id',$id)->first();
        return view('admin.webviews.productcolor.edit', compact('product','category','sub_category','header_name','productcolor'));
    }

    public function update(Request $req, $id)
    {
           
        DB::table('product_color')->where('id',$id)->update([
              
        'product_id'=>$req->product_id,
          
          'color_name'=>$req->color_name 
              
              
              ]);
        
         

      return redirect()->route('productscolor.index');
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
}
