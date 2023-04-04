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
use Auth;
class ProductImagesController extends Controller
{
   
    public function index()
    {
        abort_unless(\Gate::allows('product_images_access'), 403);
    
        $product=  DB::table('products')->get();
        $productimages=  DB::table('product_image')->get();

        return view('admin.productimages.index', compact('productimages','product'));
    }

public function index1()
    {
        abort_unless(\Gate::allows('product_images_access'), 403);
    
        $product=DB::table('products')->where('vendor_id',Auth::user()->id)->get();
        
        $productimages=  DB::table('product_image')->get();

        return view('admin.productimages.index', compact('productimages','product'));
    }
    public function productDelete($id){
        
        
        DB::table('product_images')->where('id',$id)->delete();
        
        return back()->with('mymsg','Data Delete Successfully');;
   }
    public function create()
    {
        // abort_unless(\Gate::allows('product_images_create'), 403);
        $category= DB::table('category')->get();
        $sub_category= DB::table('sub_category')->get();
        $header_name= DB::table('header_name')->get();
        $product=  DB::table('products')->get();
        return view('admin.productimagess.create',compact('category','sub_category','header_name','product'));
    }

    public function store(Request $req)
    {
        // abort_unless(\Gate::allows('product_create'), 403);
     $count =0;
          foreach($req->file('images') as $img){
                 
                $filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
                $destinationPath = storage_path('../public/upload/product');
                $img->move($destinationPath, $filename);
                $path = 'upload/product/'.$filename;
    
                DB::table('product_images')->insert([
                    'product_id'=>$req->name,
                    'color_id'=>strtolower($req->color_name),
                    'images'=>$path,
                   
                   
               ]);
              $count++;
            }
            
          
         return redirect('add-product-image-view');
    }
    
      public function store1(Request $req)
    {
        // abort_unless(\Gate::allows('product_create'), 403);
     $count =0;
          foreach($req->file('images') as $img){
                 
                $filename = 'image'.time().$count.Auth::id().'.'.$img->extension();
                $destinationPath = storage_path('../public/upload/product');
                $img->move($destinationPath, $filename);
                $path = 'upload/product/'.$filename;
    
                DB::table('product_images')->insert([
                    'product_id'=>$req->name,
                    'color_id'=>strtolower($req->color_name),
                    'images'=>$path,
                   
                   
               ]);
              $count++;
            }
            
          
        return redirect('add-product-image-view');
    }

    public function edit($id)
    {

        // abort_unless(\Gate::allows('product_edit'), 403);
        
         $category= DB::table('category')->get();
        $sub_category= DB::table('sub_category')->get();
        $header_name= DB::table('header_name')->get();
         $product= DB::table('products')->get();
         $images= DB::table('product_images')->where('id',$id)->first();
        return view('admin.webviews.productimages.edit', compact('product','category','sub_category','header_name','images'));
    }

    public function update(Request $req, $id)
    {
        // abort_unless(\Gate::allows('product_edit'), 403);
         
        
            $count=0;
            
    
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
    
                DB::table('product_images')->where('id',$id)->update([
                    'product_id'=>$req->name,
                    'color_id'=>strtolower($req->color_name),
                    'images'=>$path,
                   
                   
               ]);
           
        
         

      return redirect('add-product-image-view');
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
