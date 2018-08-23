<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|delivery-address
*/


Route::GET('/fetch-state','HomeController@fetchState');
Route::GET('/fetch-city','HomeController@fetchCity');

// Admin Route for new shopping site

/* Routs for static page start here */
Route::GET('/success','Front\StaticController@success')->name('success');
/* Routs for static page end here */


Route::GET('/login','Front\LoginController@login')->name('user.login');

Route::POST('/login','Front\LoginController@loginProcess');

Route::POST('/signup-process','Front\RegisterController@signupProcess')->name('user.signupProcess');


Route::match(array('GET','POST'),'/forgot-password','Front\ForgetPasswordController@forgotPasswordProcess')->name('user.forgotPassword');

Route::GET('/resetPassword/{token}','Front\ResetPasswordController@userResetPassword')->name('user.reset-password');

Route::POST('/process-reset-password','Front\ResetPasswordController@proccessResetPassword')->name('process-reset-password');

Route::POST('/ajax-handler-auth','Front\AjaxController@ajaxhandlerAction');

Route::GET('/user/logout','Front\LoginController@logout')->name('user.logout');

Route::get('/auth/facebook', 'Auth\LoginController@redirectToFacebook');
Route::get('/auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');

Route::get('auth/google', 'Auth\AuthController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\AuthController@handleGoogleCallback');

Route::GET('/product/{product_name}/{productId}','Front\ShopController@productDetail')->name('productDetail');

Route::GET('/shop','Front\ShopController@shop')->name('shop');

Route::POST('/checkstorelogin','Front\ShopController@checkLogin')->name('checkLogin');

Route::POST('/getproducts','Front\ShopController@getproducts')->name('getproducts');



Route::GET('/get-state-list','Front\AjaxController@getStateList');



Route::group(['middleware' => ['auth:frontUser']], function() {


	Route::post('/save-address-book', 'Front\ShopController@saveAddressBook')->name('saveAddressBook');
	
    Route::GET('/checkoutPopups','Front\ShopController@checkoutPopups')->name('checkoutPopups');
	
	Route::GET('/delivery-address','Front\ShopController@DeliveryAddress')->name('delivery-address');
	
	Route::GET('/INFKart/{sessionid}','Front\ShopController@INFKart')->name('INFKart');
	Route::POST('/updateINFKart','Front\ShopController@updateINFKart')->name('updateINFKart');
	
	Route::POST('/placeOrder','Front\ShopController@PlaceOrder')->name('placeOrder');
	
	Route::get('/edit-address-form', 'Front\ShopController@getAddressInformation')->name('getAddressInformation');
	
	//Route::get('/edit-address-form', 'Front\UserController@getAddressInformation')->name('getAddressInformation');
	
	Route::post('/edit-address-book', 'Front\ShopController@editAddressBook')->name('editAddressBook');
	
	Route::POST('/delete-address-book', 'Front\ShopController@deleteAddressBook')->name('deleteAddressBook');

});	


Route::POST('/get-sub-category-list','Admin\ProductController@getSubCategoryList');


Route::GET('/admin','Admin\LoginController@showLoginForm')->name('admin');
Route::POST('admin/login','Admin\LoginController@login')->name('admin.login');
Route::GET('admin/logout','Admin\LoginController@logout')->name('admin.logout');

Route::any('/admin/forgot-password', 'Admin\ForgotPasswordController@forgotPasswordForm')->name('admin.password.request');
Route::post('admin/forgot-password-email', 'Admin\ForgotPasswordController@resetPasswordEmail')->name('admin.password.email');
Route::any('admin/new-password/{id?}/{resettoken?}', 'Admin\ResetPasswordController@newPassword');
Route::post('admin/update-password', 'Admin\ResetPasswordController@updatePassword')->name('update-password');


Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin'], function()
{

	// dashboard for Admin
	Route::GET('/home','Admin\AdminController@index')->name('admin.home');
	//dashboard for Admin
	Route::GET('/profile','Admin\AdminController@profile')->name('admin.profile'); // profile for Admin
	Route::POST('/update-profile','Admin\AdminController@updateProfile')->name('admin.update-profile'); // update profile for Admin
	Route::GET('/change-password','Admin\AdminController@changePasswordForm')->name('admin.change-password'); // change password for Admin
	Route::POST('/save-change-password','Admin\AdminController@savePassword')->name('admin.save-password'); // save change password
	
  	//user list in Admin panel
	Route::GET('/users','Admin\CustomerController@CustomerList')->name('admin.customers');
	
	//customer view  
    Route::GET('/users/{id}','Admin\CustomerController@show')->name('admin.customer.show');
	
	//order view  
    Route::GET('/userOrder/{id}','Admin\CustomerController@showOrder')->name('admin.customerOrder.orderList');
	
	// view-Order  
    Route::GET('/user/view-order/{id}','Admin\CustomerController@viewOrderDetails')->name('admin.customer.view-order');
	
	//wishList view  
    Route::GET('/userWishlist/{id}','Admin\CustomerController@showWishlist')->name('admin.customerWishlist.wishList');
	
	//view cart  
    Route::GET('/userCart/{id}','Admin\CustomerController@showCart')->name('admin.customerCart.cartList');
	
	//view review  
    Route::GET('/userReview/{id}','Admin\CustomerController@showReview')->name('admin.customerReview.reviewList');
	
	
	//customer destroy  
    Route::GET('/user/delete/{id}','Admin\CustomerController@destroy')->name('admin.customer.destroy');
	
	//new customer form
	Route::GET('/new-user','Admin\CustomerController@newCustomer')->name('new-customer');
	
	//add-new customer
    Route::POST('/add-new-user','Admin\CustomerController@addNewCustomer')->name('add-new-customer');
	
	//customer edit  
    Route::GET('/user/{name}/{id}','Admin\CustomerController@edit')->name('edit-customer');
	
	//Update customer  
    Route::POST('/update-user','Admin\CustomerController@updateCustomer')->name('update-customer');
    	
	Route::post('/update-user-feature','Admin\CustomerController@customerFeatureUpdate')->name('updateCustomerFeature');
    Route::post('/update-user-status','Admin\CustomerController@customerStatusUpdate')->name('updateCustomerStatus');
	
    	
	//Orders list  
    Route::GET('/order-list','Admin\OrderController@OrderList')->name('admin.order-list');    	
	//Order  
    Route::GET('/order/{id}','Admin\OrderController@viewOrderDetails')->name('admin.order.view-order');
	
	Route::GET('/invoice-details/{id}','Admin\OrderController@viewInvoiceDetails')->name('admin.order.invoice-no');
	
	//Order status
    Route::POST('/update-order-status','Admin\OrderController@updateStatus')->name('admin.order-status');
    
	
	//delete-order    
    Route::GET('/order/delete/{id}','Admin\OrderController@destroy')->name('admin.order.delete');
	
	
    //Product list 
	Route::any('/product-list','Admin\ProductController@productList')->name('admin.product-list');
	
	//add product    	
	Route::GET('/add-product','Admin\ProductController@AddProductForm');

    //add product
    Route::POST('/add-product','Admin\ProductController@AddProduct')->name('admin.add.product');

    //edit-product    
   
	Route::GET('view-product/{product_id}','Admin\ProductController@viewProduct')->name('admin.view-product');
	
	Route::GET('edit-product/{product_id}','Admin\ProductController@editProduct')->name('editProduct');
	Route::POST('editProductProcess','Admin\ProductController@editProductPost')->name('editProductProcess');
	Route::GET('delete-product/{product_id}', 'Admin\ProductController@deleteProduct')->name('deleteProduct');
	
	//import product
	Route::GET('import-product','Admin\ImportController@importProduct')->name('admin.import-product');
	Route::post('import-product-process','Admin\ImportController@importProductProcess')->name('importProductProcess');
	
	Route::GET('download-import-product','Admin\ImportController@downloadImportProduct')->name('downloadImportProduct');

    //category list  
    Route::GET('/category-list','Admin\CategoryController@categoryList')->name('admin.category-list');
        
	//add category
    Route::GET('/add-category','Admin\CategoryController@AddCategoryForm')->name('admin.AddCategoryForm');
	
	//edit-category    
    Route::GET('/edit-category/{id}','Admin\CategoryController@edit')->name('admin.category.edit');
    
    //update-category    
    Route::POST('/update-category','Admin\CategoryController@update')->name('admin.category.update');
    
    //delete-category    
    Route::GET('/category/delete/{id}','Admin\CategoryController@destroy')->name('admin.category.delete');
    
	//add category process
    Route::POST('/add-category','Admin\CategoryController@Addcategory')->name('admin.add.category');
	
	
	//sub category list 
	Route::GET('/sub-category-list','Admin\SubCategoryController@subCategoryList')->name('admin.sub-category-list');

	//add sub category
    Route::GET('/add-sub-category','Admin\SubCategoryController@AddSubCategoryForm')->name('admin.AddSubCategoryForm');
	
	
	//edit-sub-category    
    Route::GET('/edit-sub-category/{id}','Admin\SubCategoryController@editSubCategoryForm')->name('admin.sub-category.edit');
    
    //update-category    
    Route::POST('/update-sub-category','Admin\SubCategoryController@updateSubCategory')->name('admin.sub-category.update');
	
	
	 //delete-sub-category    
    Route::GET('/sub-category/delete/{id}','Admin\SubCategoryController@destroySubCategory')->name('admin.sub-category.delete');
    
	//add sub category process
    Route::POST('/add-sub-category','Admin\SubCategoryController@addSubCategory')->name('admin.add.sub-category');
	
	
	//banner list  
    Route::GET('/banner-list','Admin\BannerController@bannerList')->name('admin.banner-list');
        
	//add banner
    Route::GET('/add-banner','Admin\BannerController@AddBannerForm')->name('admin.AddBannerForm');
	
	//edit-banner    
    Route::GET('/edit-banner/{id}','Admin\BannerController@edit')->name('admin.banner.edit');
    
    //update-banner-save    
    Route::POST('/update-banner','Admin\BannerController@update')->name('admin.banner.update');
    
    //delete-banner    
    Route::GET('/banner/delete/{id}','Admin\BannerController@destroy')->name('admin.banner.delete');
    
	//add banner process
    Route::POST('/add-banner','Admin\BannerController@Addbanner')->name('admin.add.banner');
	
	
	
	//add review
    Route::GET('/add-review','Admin\ReviewController@AddReviewForm')->name('admin.AddReviewForm');
	
	//add review process
    Route::POST('/add-review','Admin\ReviewController@AddReview')->name('admin.add.review');
	
	//review list  
    Route::GET('/review-list','Admin\ReviewController@index')->name('admin.review-list');
	
	
	Route::GET('view-review/{id}', 'Admin\ReviewController@viewReview')->name('admin.view.review');
	
	Route::GET('delete-review-details/{id}', 'Admin\ReviewController@deleteReview')->name('delete-review-details');
	
	Route::GET('edit-review/{productreviewId}/{id}', 'Admin\ReviewController@editReviewDetails')->name('admin.edit.review');
	
	Route::POST('editReviewProcess', 'Admin\ReviewController@editReviewPost')->name('editReviewPost');
	
	
	  //coupan list  
    Route::GET('/coupan-list','Admin\CoupanController@coupanList')->name('admin.coupan-list');
        
	//add coupan
    Route::GET('/add-coupan','Admin\CoupanController@AddCoupanForm')->name('admin.AddCoupanForm');
	
	//add coupan process
    Route::POST('/add-coupan','Admin\CoupanController@AddCoupan')->name('admin.add.coupan');
	//add coupan process
    Route::GET('/coupan/{id}','Admin\CoupanController@show')->name('admin.coupan.show');
    
    //add edit coupan
    Route::GET('/coupan/edit/{id}','Admin\CoupanController@edit')->name('admin.coupan.edit');
	
	//add UPDATE coupan
    Route::POST('/update-coupan','Admin\CoupanController@update')->name('admin.coupan.update');
	
	//coupan destroy  
    Route::GET('/coupan/delete/{id}','Admin\CoupanController@destroy')->name('admin.coupan.destroy');
    	 
	 
	//add wishlist
    Route::GET('/wishlist','Admin\ProductController@customersWishList')->name('admin.wishlist');
	
	//wishlist removed  
    Route::any('/wishlist/delete/{cid}/{pid}','Admin\ProductController@removeFromWishlist');
	/***********
	 * 
	 * 
     * Routing for content management module
    ************/
     Route::get('/add-cms-page','Admin\CmsController@addcms')->name('add-cms-page');
     Route::post('/cms/process','Admin\CmsController@addcmsprocess')->name('addcmsPost');
     Route::post('/cms/editcmsPost','Admin\CmsController@editcmsPost')->name('editcmsPost');
     Route::get('/manage-cms-page','Admin\CmsController@managecms')->name('manage-cms-page');
	 
     Route::get('/deletecmspage/{id}','Admin\CmsController@deletecmspage')->name('deletecmspage');
	 
     Route::post('/update-cms-page-staus','Admin\CmsController@UpdateCmsStatus')->name('update-cms-status');
     Route::any('/edit-cms-page/{id}','Admin\CmsController@editcmspage')->name('edit-cms-page');
	
	 Route::GET('/banner/delete/{id}','Admin\BannerController@destroy')->name('admin.banner.delete');
	/***********
	 * 
	 * 
     * Routing for content location module
    ************/
	Route::get('/states','Admin\LocationController@statelist')->name('statelist');
    Route::get('/cities','Admin\LocationController@citylist')->name('citylist');
	
	
	Route::GET('add-color','Admin\ColorController@AddColor')->name('addColor');
	Route::POST('addColorProcess','Admin\ColorController@AddColorPost')->name('addColorProcess');
	
	Route::GET('color-list','Admin\ColorController@ColorList')->name('colorList');	
	Route::GET('edit-color/{color_id}','Admin\ColorController@editColor')->name('editColor');
	Route::POST('editColorProcess','Admin\ColorController@editColorPost')->name('editColorProcess');
	Route::GET('/color/delete/{id}', 'Admin\ColorController@deleteColor')->name('deleteColor');
	
	Route::GET('add-size','Admin\SizeController@AddSize')->name('addSize');
	Route::POST('addSizeProcess','Admin\SizeController@AddSizePost')->name('addSizeProcess');
	
	Route::GET('size-list','Admin\SizeController@SizeList')->name('sizeList');	
	Route::GET('edit-size/{size_id}','Admin\SizeController@editSize')->name('editSize');
	Route::POST('editSizeProcess','Admin\SizeController@editSizePost')->name('editSizeProcess');
	Route::GET('/size/delete/{id}', 'Admin\SizeController@deleteSize')->name('deleteSize');
	
});	
// END Of Admin Route of new Shopping 
/* Front Routing Start Here */

Route::GET('/home','Customer\HomeController@home');



Route::GET('/','Front\HomeController@home'); //This is use for home page



//login,reg,&reset password routes 

Route::GET('/register','Customer\CustomerController@showLoginForm');
Route::GET('/auth-process','Customer\CustomerController@showLoginForm')->name('auth-process');
Route::POST('/ProcessRegistration','Customer\CustomerController@ProcessRegistration')->name('ProcessRegistration');
Route::POST('/ProcessLogin','Customer\CustomerController@ProcessLogin')->name('ProcessLogin');


// profile routes
Route::GET('/account','Customer\CustomerController@showAccount');
Route::POST('/account','Customer\CustomerController@processAccount');
Route::POST('change-password','Customer\CustomerController@changePassword')->name('changePassword');
Route::GET('/address','Customer\CustomerController@showAccount');
Route::POST('/address','Customer\CustomerController@processAddress');


//products routes
Route::GET('/product/{id}','Customer\HomeController@showProductList')->name('productdetails');
Route::POST('/product','Customer\HomeController@postProduct')->name('product');


Route::get('/delete-product-details/{id}', 'Customer\HomeController@deleteProduct')->name('delete-product-details');


//cart routes
//Route::GET('/cart','Customer\HomeController@processCart')->name('cart');


//Route::GET('/checkout','Customer\HomeController@processCheckOut')->name('checkout');


/* Front Routing End Here */