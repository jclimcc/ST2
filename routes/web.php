<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomePage;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',HomePage::class);

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){

    // Admin Login Route
    Route::match(['get','post'],'login','AdminController@login');

    Route::group(['middleware'=>['admin']],function(){
        
        // Admin Dashboard Route
        Route::get('dashboard','AdminController@dashboard');

        //Admin Settings/ Update admin password
        Route::match(['get','post'],'update-admin-password','AdminController@updateAdminPassword');
        //Admin Settings/ Update admin details
        Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');

        //Admin setting->Vendor slug = personal, business, bank page
        Route::match(['get','post'],'update-vendor-details/{slug}','AdminController@updateVendorDetails');

        //Admin Management types admins,subadmin, vendor

        Route::get('admins/{type?}','AdminController@admins' );  
        Route::get('view-vendor-details/{id}','AdminController@viewVendorDetails' ); 
        
        //Admins/admin/ update admin status
        
        Route::POST('update-admin-status','AdminController@updateAdminStatus');

        //Admin Settings/ Update admin password / checkcurrentpassword from js
        Route::POST('check-current-password','AdminController@checkCurrentPassword');

        //Admin Logout
        Route::get('logout','AdminController@logout');

        //Sections
        Route::get('sections','SectionController@sections');
        //section update section:status 
        Route::POST('update-section-status','SectionController@updateSectionStatus');
        Route::get('delete-section/{id}','SectionController@deleteSectionStatus');
        Route::match(['get','post'],'add-edit-section/{id?}','SectionController@addEditSection');

        //categories
        Route::get('categories','CategoryController@categories');
        //Category -Slug checking
        Route::POST('check-category-slug','CategoryController@checkCategorySlug');
        Route::POST('change-section-reappend','CategoryController@changeSectionReappend');

        //section categories categories:status
        Route::POST('update-category-status','CategoryController@updateCategoryStatus');
        Route::get('delete-category/{id}','CategoryController@deleteCategoryStatus');
        Route::get('delete-category-image/{id}','CategoryController@deleteCategoryImageStatus');
        Route::match(['get','post'],'add-edit-category/{id?}','CategoryController@addEditCategory');

        //brands
        Route::get('brands','BrandController@brands'); 
        //Brand -Slug checking
        Route::POST('check-brand-slug','BrandController@checkBrandSlug');
        //Brand categories categories:status
        Route::POST('update-brand-status','BrandController@updateBrandStatus');
        Route::get('delete-brand/{id}','BrandController@deleteBrandStatus');
        Route::get('delete-brand-image/{id}','BrandController@deleteBrandImageStatus');
        Route::match(['get','post'],'add-edit-brand/{id?}','BrandController@addEditBrand');
        
         //products
         Route::get('products','ProductController@products'); 
         //Products status
         Route::POST('update-product-status','ProductController@updateProductStatus');
         Route::get('delete-product/{id}','ProductController@deleteProductStatus');
         Route::match(['get','post'],'add-edit-product/{id?}','ProductController@addEditProduct');
         Route::match(['get','post'],'add-edit-product-images/{id?}','ProductController@addEditProductImages');
         //ProductImage - update status
         Route::POST('update-product-image-status','ProductController@updateProductImageStatus');
         //ProductImage -Delete product Image 
         Route::get('delete-product-image/{id}','ProductController@deleteProductImage');
         //ProductImage - update sequences
         Route::POST('update-product-image-sequence','ProductController@updateProductImageSequence');
        //Product - Product Slug checking
         Route::POST('check-product-slug','ProductController@checkProductSlug');
        
         //Product Attributes- add product attributes
         Route::match(['get','post'],'add-edit-product-attributes/{id?}','ProductController@addEditProductAttributes');
         //Product Attributes - update sequences
         Route::POST('update-product-attribute-sequence','ProductController@updateProductAttributeSequence');
        
         //Product Attributes - update price
         Route::POST('update-product-attribute-price','ProductController@updateProductAttributePrice');
         //Product Attributes - update stock
         Route::POST('update-product-attribute-stock','ProductController@updateProductAttributeStock');
         //Product Attributes - update Available
         Route::POST('update-product-attribute-available','ProductController@updateProductAttributeAvailable');
        //Product Attributes - update status
        Route::POST('update-product-attribute-status','ProductController@updateProductAttributeStatus');
         //Product Attributes -Delete product Attributes 
         Route::get('delete-product-attribute/{id}','ProductController@deleteProductAttribute');
        
        Route::get('append-categories-level','CategoryController@appendCategoriesLevel');
        
        //Filters
        Route::get('filters','FilterController@filters');
        Route::get('filters-values','FilterController@filtersValues');
        //Filters  productFilter:status ,productFilterValues:status
        Route::POST('update-filter-status','FilterController@updateFilterStatus');
        Route::POST('update-filters-values-status','FilterController@updateFilterValuesStatus');
        Route::match(['get','post'],'add-edit-filter/{id?}','FilterController@addEditFilter');
        Route::match(['get','post'],'add-edit-filters-values/{id?}','FilterController@addEditFiltersValues');
        
        Route::get('delete-filter/{id}','FilterController@deleteFilter');
        
        Route::get('delete-filters-values/{id}','FilterController@deleteFiltersValues');
        Route::post('get-productfilter-by-category','FilterController@getProductFilterByCategory');

         //Media Management
         //Banner
         Route::get('banners','BannerController@banners'); 
         //Banner:status
         Route::POST('update-banner-status','BannerController@updateBannerStatus');
         Route::get('delete-banner/{id}','BannerController@deleteBannerStatus');
         Route::match(['get','post'],'add-edit-banner/{id?}','BannerController@addEditBanner');
         Route::get('delete-banner-image/{id}','BannerController@deleteBannerImageStatus');

          //Page Management
         //Page
         Route::get('pages','PageController@index'); 
         //Page:status         
         Route::match(['get','post'],'add-edit-page_template/{id?}','PageController@addEditPageTemplate');
         Route::match(['get','post'],'page_template_section/{id?}','PageController@PageTemplateSection');
         Route::match(['get','post'],'add-edit-pagetemplate_section/{template_id?}/{section_id?}','PageController@addEditPageTemplateSection');
         Route::match(['get','post'],'add-edit-pagetemplatesection_block/{template_id?}/{section_id?}','PageController@addEditPageTemplateBlock');
         Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
         Route::POST('update-section-status','PageController@updateSectionStatus');

         Route::POST('update-pages-status','PageController@updatePageStatus');
         Route::get('delete-pages/{id}','PagesController@deletePageStatus');
         Route::match(['get','post'],'add-edit-banner/{id?}','BannerController@addEditBanner');
         Route::get('delete-banner-image/{id}','BannerController@deleteBannerImageStatus');
        
        //Project Management
        //Project
         Route::get('projects','ProjectController@index'); 
         Route::POST('update-project-status','ProjectController@updateProjectStatus');
         Route::get('delete-project/{id}','ProjectController@deleteProjectStatus');
         Route::match(['get','post'],'add-edit-project/{id?}','ProjectController@addEditProject');
         Route::get('delete-project-image/{id}','ProjectController@deleteProjectImageStatus');

        //Our Business
        //Business
        Route::get('business','BusinessController@index'); 
        Route::POST('update-business-status','BusinessController@updateBusinessStatus');
        Route::get('delete-business/{id}','BusinessController@deleteBusinessStatus');
        Route::match(['get','post'],'add-edit-business/{id?}','BusinessController@addEditBusiness');
        Route::get('delete-business-image/{id}','BusinessController@deleteBusinessImageStatus');

        
        //Post management
     
        Route::get('posts','PostController@index'); 
        Route::match(['get','post'],'add-edit-post/{id?}','PostController@addEditPost');
        Route::get('view-post/{id}','PostController@viewPost');
        Route::get('delete-post/{id}','PostController@deletePostStatus');



        //Post-Categories management
        Route::get('posts-categories','CategoryController@index'); 
        Route::match(['get','post'],'add-edit-post-category/{id?}','CategoryController@addEditCategory');
        Route::get('view-post-category/{id}','CategoryController@viewPostCategory');
       
        Route::get('posts-tags','TagController@index'); 
        Route::match(['get','post'],'add-edit-post-tag/{id?}','TagController@addEditTag');
        Route::get('view-post-tag/{id}','TagController@viewPostTag');
        Route::get('delete-tag/{id}','TagController@deleteTagStatus');

        
        //Media management
        //Popup Banner
        Route::get('popup-banners','PopupBannerController@index'); 
        Route::match(['get','post'],'add-edit-popup-banner/{id?}','PopupBannerController@addEditPopupBanner');
        Route::get('delete-popup-banner/{id}','PopupBannerController@deletePopupBannerStatus');
        Route::get('delete-popup-banner-image/{id}','PopupBannerController@deletePopupBannerImageStatus');
        Route::POST('update-popup-banner-status','PopupBannerController@updatePopupBannerStatus');

        Route::get('videos','VideoController@index'); 
        Route::match(['get','post'],'add-edit-video/{id?}','VideoController@addEditVideo');
        Route::get('delete-video/{id}','VideoController@deleteVideoStatus');
        Route::POST('update-video-status','VideoController@updateVideoStatus');
    
         //ContactUs 
         Route::resource('contactus', 'ContactUsController');        
        //Career management
         Route::resource('careers','CareerController'); 
         Route::get('careers/{id}/jobapplicant','JobApplicantController@viewCareerApplicant');
         Route::POST('update-career-status','CareerController@updateCareerStatus');
         
         Route::resource('jobapplicants','JobApplicantController'); 
     

         Route::get('autocomplete-search-tag', [TypeaheadController::class, 'autocompleteSearchTag']);
    });
});

Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
