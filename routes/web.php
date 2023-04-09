<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 use App\Http\Controllers\Admin\PermissionsController;
 
 use App\Http\Controllers\Admin\RolesController;
 
 use App\Http\Controllers\Admin\UsersController;
 
 use Laravel\Socialite\Facades\Socialite;
 
 Route::get('/', function () {
	 
	$block=DB::table('block_url')->first(); 
	if(Auth::check()){
		 if($block->active==1){
			 Auth::logout();
			 return view('auth.blockurl');
		 }
		
		 return redirect('index');
	}else{
		if($block->active==1){
			 return view('auth.blockurl');
		 }
    return view('auth.login1');
	}
	 
	 
	 
})->name('/');
 
//  Route::get('/index12', function () {
	 
 
// 		 return redirect('index');
 
	 
	 
// })->name('/index12');
 Route::get('/index12',[App\Http\Controllers\User\MainController::class, 'index12']);
Route::get('privacy-policy', function () {
    return view('ui.webviews.termscondition');
});

Route::get('terms-condition', function () {
    return view('ui.webviews.termscondition');
});

Route::get('reset', function () {
    return view('auth.passwords.reset');
});


Route::get('/admin', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    }
    else{
         return view('auth.login');
    }
   
});

Route::get('/admin/login', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    }
    else{
         return view('auth.login');
    }
   
});
Route::get('/vendor/login', function () {
    if(Auth::check()){
        return redirect('/dashboard');
    }
    else{
         return view('auth.vendorlogin');
    }
   
});

Route::get('/logout1', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/login', function () {
    Auth::logout();
    return redirect('/');
})->name('/login');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard',[App\Http\Controllers\Admin\IndexController::class, 'index']);
      Route::get('/home', function () {
        return redirect('admin');
    });


  Route::get('reportDashboard', [App\Http\Controllers\Admin\IndexController::class, 'reportDashboard'])->name('reportDashboard');
  Route::post('reportDashboard', [App\Http\Controllers\Admin\IndexController::class, 'reportDashboard'])->name('reportDashboard');

  Route::get('dashboard_rport', [App\Http\Controllers\Admin\IndexController::class, 'dashboard_rport'])->name('dashboard_rport');
  Route::post('dashboard_rport', [App\Http\Controllers\Admin\IndexController::class, 'dashboard_rport'])->name('dashboard_rport');

  
    Route::delete('permissions/destroy', [App\Http\Controllers\Admin\PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');

    Route::resource('permissions',PermissionsController::class);

    Route::delete('roles/destroy', [App\Http\Controllers\Admin\RolesController::class, 'massDestroy'])->name('roles.massDestroy');

    Route::resource('roles',RolesController::class);

    Route::delete('users/destroy',[App\Http\Controllers\Admin\UsersController::class,'massDestroy'])->name('users.massDestroy');
    
 Route::any('users-active/{id}/{val}',[App\Http\Controllers\Admin\UsersController::class,'activeuser'])->name('users-active');
 Route::any('users-excel',[App\Http\Controllers\Admin\UsersController::class,'userExcel'])->name('users-excel');
    
    Route::resource('users',UsersController::class);
	Route::get('/edit-profileadmin',[App\Http\Controllers\Admin\IndexController::class, 'editProileAdmin']);
    Route::any('/admin-edit-submit',[App\Http\Controllers\Admin\IndexController::class, 'adminEditSubmit']);
   
    Route::get('/category',[App\Http\Controllers\Admin\IndexController::class, 'category']);
    Route::post('/categorys-submit',[App\Http\Controllers\Admin\IndexController::class, 'categorySubmit']);
	Route::post('/categorysedit-submit',[App\Http\Controllers\Admin\IndexController::class, 'categoryEditSubmit']);

    Route::get('/categorys-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'categorydelete']);
   
    Route::get('/sub-category',[App\Http\Controllers\Admin\IndexController::class, 'subCategory']);
    Route::post('/sub-category-submit',[App\Http\Controllers\Admin\IndexController::class, 'subCategorySubmit']);
    Route::get('/sub-categorys-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'subCategorydelete']);
   Route::post('/sub-categoryedit-submit',[App\Http\Controllers\Admin\IndexController::class, 'subCategoryEditSubmit']);
	

    Route::get('/sub-sub-category',[App\Http\Controllers\Admin\IndexController::class, 'subSubCategory']);
    Route::post('/sub-sub-category-submit',[App\Http\Controllers\Admin\IndexController::class, 'subSubCategorySubmit']);
     Route::get('/sub-sub-categorys-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'subSubCategorydelete']);
    Route::post('/sub-sub-categoryedit-submit',[App\Http\Controllers\Admin\IndexController::class, 'subSubCategoryEditSubmit']);
   

    Route::get('/brands',[App\Http\Controllers\Admin\IndexController::class, 'brands']);
    Route::post('/brands-submit',[App\Http\Controllers\Admin\IndexController::class, 'brandsSubmit']);
      Route::get('/brand-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'brandDelete']);
   
    
    
    Route::get('/product-list',[App\Http\Controllers\Admin\IndexController::class, 'productList']);
    Route::get('/add-product',[App\Http\Controllers\Admin\IndexController::class, 'addProduct']);
    Route::any('/add-product-submit',[App\Http\Controllers\Admin\IndexController::class, 'addProductSubmit']);
    
       Route::get('/product-inventory/{id}',[App\Http\Controllers\Admin\IndexController::class, 'productInventory']);
 
    
     Route::get('product/delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'productDelete']);
    Route::get('product/edit/{id}',[App\Http\Controllers\Admin\IndexController::class, 'productEdit']);
     Route::any('edit-product-submit',[App\Http\Controllers\Admin\IndexController::class, 'productEditSubmit']);
  
    Route::get('product/edit/submit',[App\Http\Controllers\Admin\IndexController::class, 'productEditSubmit']);
   
    Route::get('export-add/{id}',[App\Http\Controllers\Admin\IndexController::class, 'addexportsdetail']);
   
	
	 Route::get('/sub-product-list',[App\Http\Controllers\Admin\IndexController::class, 'subproductList']);
    Route::get('/add-sub-product',[App\Http\Controllers\Admin\IndexController::class, 'addsubproduct']);
    Route::any('/add-sub-product-submit',[App\Http\Controllers\Admin\IndexController::class, 'addSubProductSubmit']);
	 Route::get('sub-product/edit/{id}',[App\Http\Controllers\Admin\IndexController::class, 'subproductEdit']);
   
     Route::any('edit-sub-product-submit',[App\Http\Controllers\Admin\IndexController::class, 'subproductEditSubmit']);
  
	 Route::get('sub-product/delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'subproductDelete']);
    
	
	
	
	
	
   
    
    Route::get('product/view/{id}',[App\Http\Controllers\Admin\IndexController::class, 'productView']);
    Route::get('product/todaydeals/{id}/{value}',[App\Http\Controllers\Admin\IndexController::class, 'todayDeals']);
     Route::get('product-stat/trending/{id}/{value}',[App\Http\Controllers\Admin\IndexController::class, 'tranding']);
   Route::get('product/top-product/{id}/{value}',[App\Http\Controllers\Admin\IndexController::class, 'SaleOfThisMonth']);
  
    
   Route::get('admin/product/images/delete/{id}',[App\Http\Controllers\Admin\ProductImagesController::class, 'productDelete']);
   
     Route::get('vendor-approve/{status}/{id}',[App\Http\Controllers\Admin\IndexController::class, 'vendorapprove']);
     
      Route::get('vendor-product-list',[App\Http\Controllers\Admin\IndexController::class, 'vendorProductList']);
       Route::get('vendor-add-product',[App\Http\Controllers\Admin\IndexController::class, 'vendorAddProduct']);
        Route::resource('vendor-productscolor',App\Http\Controllers\Admin\ProductColorController::class);   
    Route::resource('vendor-productsimages', App\Http\Controllers\Admin\ProductImagesController::class);   
    Route::resource('vendor-productsize', App\Http\Controllers\Admin\ProductSizeController::class);   
   
      Route::get('vendor-productscolor-index1',[App\Http\Controllers\Admin\ProductColorController::class, 'index1']);
    Route::any('vendor-productscolor-store1',[App\Http\Controllers\Admin\ProductColorController::class, 'store1']);
    
      Route::get('vendor-productsize-index1',[App\Http\Controllers\Admin\ProductSizeController::class, 'index1']);
     Route::any('vendor-addproductsize-submit',[App\Http\Controllers\Admin\ProductSizeController::class, 'store1']);
    
    Route::get('/vendor-add-product-image-view',[App\Http\Controllers\Admin\IndexController::class, 'vendorAddProductImageView']);
   Route::any('/vendor-add-product-submit',[App\Http\Controllers\Admin\IndexController::class, 'vendorAddProductSubmit']);
    Route::post('/vendor-add-product-image-submit',[App\Http\Controllers\Admin\IndexController::class, 'vendorAddProductImageSumit']);
    Route::get('/vendor-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'vendorDeleted']);
     Route::get('/toggle-vendors-status/{val}/{id}',[App\Http\Controllers\Admin\IndexController::class, 'vendorstatus']);
    
    
      //password reset

 Route::get('/add-export-expensive',[App\Http\Controllers\Admin\IndexController::class, 'addExportExpensive']);
 Route::post('/add-export-expensive-submit',[App\Http\Controllers\Admin\IndexController::class, 'addExportExpensiveSubmit']);
    
 Route::get('/edit-export-expensive',[App\Http\Controllers\Admin\IndexController::class, 'editExportExpensive']);
 Route::post('/edit-export-expensive-submit',[App\Http\Controllers\Admin\IndexController::class, 'editExportExpensiveSubmit']);
    
 Route::get('/delete-export-expensive',[App\Http\Controllers\Admin\IndexController::class, 'deleteExportExpensive']);
    
   
   
    Route::get('admin/json-response1',[App\Http\Controllers\Admin\IndexController::class, 'jsonData']);
   
    Route::get('/add-product-image',[App\Http\Controllers\Admin\IndexController::class, 'addProductImage']);
     Route::get('/add-product-image-view',[App\Http\Controllers\Admin\IndexController::class, 'addProductImageView']);
   Route::get('/productsimages/edit/{id}',[App\Http\Controllers\Admin\ProductImagesController::class, 'edit']);
   Route::any('/productsimages/update/{id}',[App\Http\Controllers\Admin\ProductImagesController::class, 'update']);
   Route::get('/productsimages/delete/{id}',[App\Http\Controllers\Admin\ProductImagesController::class, 'destroy']);
  
    Route::post('/add-product-image-submit',[App\Http\Controllers\Admin\IndexController::class, 'addProductImageSumit']);
   
   Route::get('/banner',[App\Http\Controllers\Admin\IndexController::class, 'banner']);
   Route::get('/banner-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'bannerDelete']);
   Route::post('/banner-submit',[App\Http\Controllers\Admin\IndexController::class, 'bannerAddSubmit']);
   
     Route::get('/order',[App\Http\Controllers\Admin\IndexController::class, 'order']);
  Route::get('/report',[App\Http\Controllers\Admin\IndexController::class, 'report']);
 Route::any('/report-search',[App\Http\Controllers\Admin\IndexController::class, 'reportSearch']);
 Route::any('/report-search-order',[App\Http\Controllers\Admin\IndexController::class, 'reportSearchorder']);
	
	 Route::get('/getorder',[App\Http\Controllers\Admin\IndexController::class, 'getorder']);
	
	
	
     Route::get('/vendor-order',[App\Http\Controllers\Admin\IndexController::class, 'vendorOrder']);
    Route::get('/list-coupans',[App\Http\Controllers\Admin\IndexController::class, 'listCoupans']);
    Route::get('/add-coupans',[App\Http\Controllers\Admin\IndexController::class, 'addCoupans']);
    
    Route::get('/menus-list',[App\Http\Controllers\Admin\IndexController::class, 'menusList']);
    Route::get('/menus-create',[App\Http\Controllers\Admin\IndexController::class, 'menusCreate']);
    Route::post('/menus-submit',[App\Http\Controllers\Admin\IndexController::class, 'menusSubmit']);
     Route::get('/menus-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'menusDelete']);
   
    Route::get('/user-list',[App\Http\Controllers\Admin\IndexController::class, 'userList']);
    Route::get('/add-user',[App\Http\Controllers\Admin\IndexController::class, 'addUser']);

    Route::get('/vendor-list',[App\Http\Controllers\Admin\IndexController::class, 'vendorList']);
    Route::get('/add-vendor',[App\Http\Controllers\Admin\IndexController::class, 'addVendor']);
   
    Route::get('/reports',[App\Http\Controllers\Admin\IndexController::class, 'reports']);
    Route::get('/invoice',[App\Http\Controllers\Admin\IndexController::class, 'orderproductlist']);
    Route::resource('productscolor',App\Http\Controllers\Admin\ProductColorController::class);   
    Route::resource('productsimages', App\Http\Controllers\Admin\ProductImagesController::class);   
    Route::resource('productsize', App\Http\Controllers\Admin\ProductSizeController::class);   
     
    Route::get('product/color/delete/{id}',[App\Http\Controllers\Admin\ProductColorController::class,'productColorDelete']);
 
     Route::get('product/size/delete/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'productSizeDelete']);
     
    Route::get('export-product-list',[App\Http\Controllers\Admin\ProductSizeController::class,'exportProductList']);
  Route::get('add-export-product',[App\Http\Controllers\Admin\ProductSizeController::class,'addExportProduct']);
   Route::any('add-export-product-submit',[App\Http\Controllers\Admin\ProductSizeController::class,'addExportProductSubmit']);
   Route::get('edit-export-product/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'editExportProduct']);
    Route::any('edit-export-product-submit',[App\Http\Controllers\Admin\ProductSizeController::class,'editExportProductSubmit']);
 
  Route::get('delete-export-product/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'deleteExportProduct']);
  
  Route::get('export-product-image',[App\Http\Controllers\Admin\ProductSizeController::class,'exportProductImage']);
  Route::get('add-export-product-image',[App\Http\Controllers\Admin\ProductSizeController::class,'addexportProductimage']);
  Route::any('add-export-product-image-submit',[App\Http\Controllers\Admin\ProductSizeController::class,'addexportProductimageSubmit']);
  Route::get('edit-export-product-image/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'editexportProductimage']);
  Route::any('edit-export-product-image-submit/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'editexportProductimageSubmit']);
   Route::get('delete-export-product-image/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'deleteExportProductimage']);

   Route::any('/bulkorder-view',[App\Http\Controllers\Admin\IndexController::class, 'bulkorder']);

  Route::any('/balancesheet',[App\Http\Controllers\Admin\IndexController::class, 'balancesheet']);
  Route::any('/cashflow',[App\Http\Controllers\Admin\IndexController::class, 'cashflow']);
Route::any('/profitloss',[App\Http\Controllers\Admin\IndexController::class, 'profitloss']);

Route::any('/received',[App\Http\Controllers\Admin\IndexController::class, 'received']);
Route::any('/transfred',[App\Http\Controllers\Admin\IndexController::class, 'transfred']);
Route::any('/bussiness-report',[App\Http\Controllers\Admin\IndexController::class, 'bussiness']);

 
	
	
	 Route::get('balancesheet-list',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceList']);
 	
	 Route::get('balancesheet-list-create',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceListCreate']);
 	
	 Route::any('balancesheet-list-create-submit',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceListSubmit']);
 	
	 Route::get('balancesheet-list-edit/{id}',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceListEdit']);
  Route::any('balancesheet-list-edit-submit',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceListEditSubmit']);
  Route::any('balancesheet-list-delete',[App\Http\Controllers\Admin\ProductSizeController::class,'balanceListdelete']);
  Route::any('admin/addbalancesheet',[App\Http\Controllers\Admin\IndexController::class, 'addbalancesheet']);
Route::any('admin/editbalancesheet/{id}',[App\Http\Controllers\Admin\IndexController::class, 'editbalancesheet']);
Route::any('admin/editbalancesheetss/{id}',[App\Http\Controllers\Admin\IndexController::class, 'editbalancesheetss']);
Route::any('admin/addcashflow',[App\Http\Controllers\Admin\IndexController::class, 'addcashflow']);
Route::any('admin/editcashflow/{id}',[App\Http\Controllers\Admin\IndexController::class, 'editcashflow']);

	Route::any('admin/addreceived',[App\Http\Controllers\Admin\IndexController::class, 'addreceived']);
Route::any('admin/editreceived/{id}',[App\Http\Controllers\Admin\IndexController::class, 'editreceived']);
Route::any('admin/addtransfer',[App\Http\Controllers\Admin\IndexController::class, 'addtransfer']);
Route::any('admin/edittransfer/{id}',[App\Http\Controllers\Admin\IndexController::class, 'edittransfer']);

Route::any('other-reports',[App\Http\Controllers\Admin\IndexController::class, 'otherreports']);

	Route::any('product-review',[App\Http\Controllers\Admin\IndexController::class, 'productreview']);
Route::any('review-status/{id}/{ids}',[App\Http\Controllers\Admin\IndexController::class, 'productreviewstatus']);

 

 Route::any('/bulk-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'bulkorderdelete']);

Route::any('/bulkorder',[App\Http\Controllers\User\MainController::class, 'bulkorder']);

Route::get('/index',[App\Http\Controllers\User\MainController::class, 'index']);
Route::get('/category-product/{id}',[App\Http\Controllers\User\MainController::class, 'category']);
Route::any('/sort-by',[App\Http\Controllers\User\MainController::class, 'sortBy']);
Route::any('/product-price-search',[App\Http\Controllers\User\MainController::class, 'productPriceSearch']);
Route::any('/product-color-search',[App\Http\Controllers\User\MainController::class, 'productColorSearch']);

	
	Route::any('/block-url',[App\Http\Controllers\User\MainController::class, 'blockurl']);

	Route::any('/block-url-submit',[App\Http\Controllers\User\MainController::class, 'blockurlsubmit']);



Route::get('/subcategory-product/{id}',[App\Http\Controllers\User\MainController::class, 'subCategory']);
Route::get('/sub-subcategory-product/{id}',[App\Http\Controllers\User\MainController::class, 'subSubCategory']);
Route::get('/sub-sub-subcategory-product/{id}',[App\Http\Controllers\User\MainController::class, 'subSubSubcategory']);

Route::get('/category-product-by/{id}',[App\Http\Controllers\User\MainController::class, 'categoryby']);
Route::get('/product-detail-by-size',[App\Http\Controllers\User\MainController::class, 'productDetailBySize']);

Route::get('/product-cancel/{id}',[App\Http\Controllers\User\MainController::class, 'cancelStatus']);
Route::get('/order-invoice/{id}',[App\Http\Controllers\User\MainController::class, 'printinvoice']);
Route::get('/order-invoice-admin/{id}',[App\Http\Controllers\User\MainController::class, 'printinvoiceadmin'])->middleware('auth');

Route::get('/tracking/{id}',[App\Http\Controllers\User\MainController::class, 'trackOrder']);

Route::get('/vendor',[App\Http\Controllers\User\MainController::class, 'vendor']);
Route::get('/export',[App\Http\Controllers\User\MainController::class, 'export']);

Route::get('/export-product-detail/{id}',[App\Http\Controllers\User\MainController::class, 'exportProductDetail']);

Route::get('/product-retail-detail/{id}/{cid}',[App\Http\Controllers\User\MainController::class, 'productretailDetail']);
Route::get('/product-wholesaler-detail/{id}/{cid}',[App\Http\Controllers\User\MainController::class, 'productwholesalerDetail']);

Route::get('/product-detail/{id}/{cid}',[App\Http\Controllers\User\MainController::class, 'productDetail']);
Route::get('/product-detailsize/{id}/{cid}/{sid}',[App\Http\Controllers\User\MainController::class, 'productsizeDetail']);
Route::get('/checkout-form-bynow/{id}/{size}/{qn}',[App\Http\Controllers\User\MainController::class, 'checkoutForm1']);
Route::get('/checkout-form-bynowdetail/{id}/{size}/{catid}',[App\Http\Controllers\User\MainController::class, 'checkoutForm2']);

 Route::get('/checkout-form/',[App\Http\Controllers\User\MainController::class, 'checkoutForm']);

 Route::Post('payment-gatway-addcart',[App\Http\Controllers\User\MainController::class, 'paymentGetwayAddCart']);

Route::get('/cart-detail',[App\Http\Controllers\User\MainController::class, 'cart']);
Route::get('/wishlist',[App\Http\Controllers\User\MainController::class, 'wishlist']);
Route::get('/addwishlist',[App\Http\Controllers\User\MainController::class, 'addwishlist']);

Route::get('/wishlist-delete/{id}',[App\Http\Controllers\User\MainController::class, 'wishlistDelete']);
Route::get('/place-order',[App\Http\Controllers\User\MainController::class, 'placeOrder']);
Route::get('/wishlist',[App\Http\Controllers\User\MainController::class, 'wishlist']);
Route::any('/payment-success',[App\Http\Controllers\User\MainController::class, 'paymentSuccess']);



Route::any('/brand-search',[App\Http\Controllers\User\MainController::class, 'brandSearch']);




 
Route::get('/addCartJquery',[App\Http\Controllers\User\MainController::class, 'addCartJquery']);
Route::any('/action-user-add-product',[App\Http\Controllers\User\MainController::class, 'addproductsubproduct']);




Route::get('/addCartJqueryd',[App\Http\Controllers\User\MainController::class, 'addCartJqueryd']);

Route::get('/addCartJquerycat',[App\Http\Controllers\User\MainController::class, 'addCartJquerycat']);
Route::get('/add-cart-delete/{id}',[App\Http\Controllers\Admin\IndexController::class, 'addCartDelete']);
Route::get('/add-cart-quantity',[App\Http\Controllers\Admin\IndexController::class, 'addCartquantity']);

Route::get('/payment-gatway',[App\Http\Controllers\User\MainController::class, 'paymentGetway']);
   
Route::get('/my-order',[App\Http\Controllers\User\MainController::class, 'myOrder']);

Route::get('/search2',[App\Http\Controllers\User\MainController::class, 'searchDetail']);
      Route::get('forget-password',[App\Http\Controllers\User\MainController::class, 'forgetPasswordView']);
  Route::any('forget-password-submit',[App\Http\Controllers\User\MainController::class, 'forgotPasswordSubmit']);
  Route::get('passwordreset/{id}',[App\Http\Controllers\User\MainController::class, 'forgetPassword']);
	
  Route::any('submit',[App\Http\Controllers\User\MainController::class, 'submit']);

 Route::get('/terms',[App\Http\Controllers\User\MainController::class, 'terms']);
   
Route::get('/profile',[App\Http\Controllers\User\MainController::class, 'profile']);
Route::post('/become-vendor-submit',[App\Http\Controllers\User\MainController::class, 'saveVendor']);
Route::post('/admin-become-vendor-submit',[App\Http\Controllers\User\MainController::class, 'adminsaveVendor']);

  Route::get('countout1',[App\Http\Controllers\User\MainController::class,'getProductList1']);
  Route::get('retailer',[App\Http\Controllers\User\MainController::class,'retailers']);
  Route::get('wholesaler',[App\Http\Controllers\User\MainController::class,'holesalers']);

  Route::get('user-login',[App\Http\Controllers\User\MainController::class,'userLogin']);
Route::get('order-process/{id}',[App\Http\Controllers\Admin\IndexController::class,'orderprocess']); 


Route::any('/brand-product/{id}',[App\Http\Controllers\User\MainController::class, 'brandProduct']);
Route::any('productreview',[App\Http\Controllers\User\MainController::class, 'productreview']);
Route::any('invoicesample',[App\Http\Controllers\User\MainController::class, 'invoicesample']);


});
Route::any('noti',[App\Http\Controllers\User\MainController::class, 'noti']);
Route::any('notif',[App\Http\Controllers\User\MainController::class, 'notif']);

	Route::any('notiadmin',[App\Http\Controllers\User\MainController::class, 'notiad']);
	Route::any('notiadmin-t',[App\Http\Controllers\User\MainController::class, 'notit']);
Route::any('reset-password-submit',[App\Http\Controllers\User\MainController::class, 'resetpasswordsubmit']);
Route::any('mail-check',[App\Http\Controllers\User\MainController::class, 'mailf']);

Route::get('/notification',[App\Http\Controllers\Admin\IndexController::class, 'notification']); // created by kush
Route::get('/Sendmail',[App\Http\Controllers\User\MainController::class, 'Sendmail']); // created by kush

Route::get('/samlverify',[App\Http\Controllers\User\MainController::class, 'samlverify']);


 Route::get('/cache', function() {
    Artisan::call('config:cache');
    return "Cache is cleared";
});


// Route::get('/auth/redirect', function () {
//     return Socialite::driver('google')->redirect();
    
// });
 
// Route::get('/auth/callback', function () {
//     $user = Socialite::driver('google')->user();
 
//     // $user->token
// });

Route::get('google/login', [App\Http\Controllers\GoogleAuthController::class, 'loginWithGoogle']);
Route::get('/login/google/callback', [App\Http\Controllers\GoogleAuthController::class, 'callback']);
    