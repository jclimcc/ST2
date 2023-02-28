<?php


use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
 
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', url('home'));
});


Breadcrumbs::for('home.category', function (BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('All Category', url('category/all'));
});
Breadcrumbs::for('home.category.sub', function (BreadcrumbTrail $trail, $slug){
    $trail->parent('home.category');
    $trail->push($slug, url('category',$slug));
});
Breadcrumbs::for('home.category.product', function (BreadcrumbTrail $trail, $slug){
    $trail->parent('home');
    $trail->push($slug, url('category',$slug));
});
Breadcrumbs::for('home.product', function (BreadcrumbTrail $trail, $product){
    $trail->parent('home.category.product',$product->category->slug);
    $trail->push($product->product_name, url('product',$product->slug));
});

Breadcrumbs::for('home.store', function (BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('store', url('store/all'));
});
Breadcrumbs::for('home.store.vendor', function (BreadcrumbTrail $trail, $vendorBusinessDetail){
    $trail->parent('home.store');
    $trail->push($vendorBusinessDetail->shop_name, url('vendor',$vendorBusinessDetail->shop_name));
});
Breadcrumbs::for('home.store.cart', function (BreadcrumbTrail $trail){
    $trail->parent('home.store');
    $trail->push('Cart ', url('cart'));
});

Breadcrumbs::for('home.member', function (BreadcrumbTrail $trail){
    $trail->parent('home');
    $trail->push('Member dashboard', url('member/dashboard'));
});
Breadcrumbs::for('home.member.mypurchase', function (BreadcrumbTrail $trail){
    $trail->parent('home.member');
    $trail->push('My Purchase', url('member/mypurchase'));
});
Breadcrumbs::for('home.member.orders', function (BreadcrumbTrail $trail){
    $trail->parent('home.member');
    $trail->push('Orders', url('member/orders'));
});

Breadcrumbs::for('home.member.address', function (BreadcrumbTrail $trail){
    $trail->parent('home.member');
    $trail->push('My Address', url('member/address'));
});
Breadcrumbs::for('home.member.mycoupon', function (BreadcrumbTrail $trail){
    $trail->parent('home.member');
    $trail->push('My Coupon', url('member/mycoupon'));
});

//START projects Management
Breadcrumbs::for('admins.projects', function (BreadcrumbTrail $trail) {
    $trail->push('Projects Management', url('admin/projects'));
});
Breadcrumbs::for('admins.projects.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.projects');
    $trail->push($title, url('admin/add-edit-project',$title));
});
//END  projects Management
//START Business Management
Breadcrumbs::for('admins.businesses', function (BreadcrumbTrail $trail) {
    $trail->push('Business Management', url('admin/business'));
});
Breadcrumbs::for('admins.businesses.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.businesses');
    $trail->push($title, url('admin/add-edit-business',$title));
});
//END Business Management

//START Posts Management
Breadcrumbs::for('admins.posts', function (BreadcrumbTrail $trail) {
    $trail->push('Posts', url('admin/posts'));
});
Breadcrumbs::for('admins.posts.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.posts');
    $trail->push($title, url('admin/add-edit-posts',$title));
});
//END Posts Management
//START Posts categories Management
Breadcrumbs::for('admins.posts.categories', function (BreadcrumbTrail $trail) {
    $trail->push('Post Categories', url('admin/posts-categories'));
});
Breadcrumbs::for('admins.posts.categories.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.posts.categories');
    $trail->push($title, url('admin/add-edit-categories',$title));
});
//END Posts categories Management
//START Posts tags Management
Breadcrumbs::for('admins.posts.tags', function (BreadcrumbTrail $trail) {
    $trail->push('Post Tags', url('admin/posts-tags'));
});
Breadcrumbs::for('admins.posts.tags.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.posts.tags');
    $trail->push($title, url('admin/add-edit-tags',$title));
});
//END Posts tags Management


//START Popup Banner Management
Breadcrumbs::for('admins.popup-banner', function (BreadcrumbTrail $trail) {
    $trail->push('Popup Banner', url('admin/popup-banners'));
});
Breadcrumbs::for('admins.popup-banner.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.popup-banner');
    $trail->push($title, url('admin/add-edit-popup-banner',$title));
});
//END  Popup Banner Management

//START Video Management
Breadcrumbs::for('admins.videos', function (BreadcrumbTrail $trail) {
    $trail->push('Videos', url('admin/videos'));
});
Breadcrumbs::for('admins.videos.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.videos');
    $trail->push($title, url('admin/add-edit-video',$title));
});
//END  Video Management


//START contactus Management
Breadcrumbs::for('admins.contactus', function (BreadcrumbTrail $trail) {
    $trail->push('Contact Us', url('admin/contactus'));
});
Breadcrumbs::for('admins.contactus.view', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.contactus');
    $trail->push($title, url('admin/view-contactus',$title));
});
//END  contactus Management

//START Career Management
Breadcrumbs::for('admins.careers', function (BreadcrumbTrail $trail) {
    $trail->push('Careers', url('admin/careers'));
});
Breadcrumbs::for('admins.careers.add-edit', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.careers');
    $trail->push($title, url('admin/careers/',$title));
});
Breadcrumbs::for('admins.careers.view', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.careers');
    $trail->push($title, url('admin/careers/',$title));
});
Breadcrumbs::for('admins.careers.applied_applicant', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.careers');
    $trail->push($title, url('admin/careers/',$title));
});
Breadcrumbs::for('admins.careers.jobapplicant', function (BreadcrumbTrail $trail) {
    $trail->push('Job Applicant', url('admin/jobapplicants'));
});
Breadcrumbs::for('admins.careers.jobapplicant.view', function (BreadcrumbTrail $trail,$title) {
    $trail->parent('admins.careers.jobapplicant');
    $trail->push($title, url('admin/jobapplicants/',$title));
});
//END  Career Management


//START Admin Management
Breadcrumbs::for('admins', function (BreadcrumbTrail $trail) {
    $trail->push('Admin Management', url('admin/admins'));
});
Breadcrumbs::for('admins.pages', function (BreadcrumbTrail $trail) {   
    $trail->push('Pages Management', url('admin/pages'));
});
Breadcrumbs::for('admins.pages.main', function (BreadcrumbTrail $trail,$pagename,$template_id=null) { 
    $trail->parent('admins.pages');  
    if($template_id!==null)    
    $trail->push(ucfirst($pagename), url('admin/page_template_section',$template_id));
    else
    $trail->push(ucfirst($pagename), url('admin/pages'));
});


 
Breadcrumbs::for('admins.pages.add-edit-page-template', function (BreadcrumbTrail $trail, $home_pagename,$template_id) {
    $trail->parent('admins.pages.main',$home_pagename);
    $trail->push('Section', url('add-edit-section',$template_id));
});

Breadcrumbs::for('admins.pages.page-template-section', function (BreadcrumbTrail $trail, $homepage, $id,$name) {
   $trail->parent('admins.pages.main', $homepage, $id);
    $trail->push(ucfirst($name), url('page_template_section',$id));
});


Breadcrumbs::for('admins.mangements', function (BreadcrumbTrail $trail, $type) {
    $trail->parent('admins');
    $trail->push(ucfirst($type), url('admin/admins',$type));
});
Breadcrumbs::for('admins.vendorDetail', function (BreadcrumbTrail $trail, $vendorDetails) { 
    $trail->parent('admins.mangements','vendor');
    $trail->push($vendorDetails['email'], url('admin/view-vendor-details/{id}',$vendorDetails['id']));
});
//END Admin Management

//START Admin Section
Breadcrumbs::for('admins.sections', function (BreadcrumbTrail $trail) {    
    $trail->push('Sections', url('admin/sections'));
});
Breadcrumbs::for('admins.sections.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.sections');  
    $trail->push($title, url('admin/add-edit-section',$title));
});
//END Admin Section

//START Admin Categories
Breadcrumbs::for('admins.categories', function (BreadcrumbTrail $trail) {    
    $trail->push('Categories', url('admin/categories'));
});
Breadcrumbs::for('admins.categories.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.categories');  
    $trail->push($title, url('admin/add-edit-category',$title));
});
//END Admin Categories

//START Admin Brands
Breadcrumbs::for('admins.brands', function (BreadcrumbTrail $trail) {    
    $trail->push('Brands', url('admin/brands'));
});
Breadcrumbs::for('admins.brands.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.brands');  
    $trail->push($title, url('admin/add-edit-brand',$title));
});
//END Admin Brands

//START Admin Products
Breadcrumbs::for('admins.products', function (BreadcrumbTrail $trail) {    
    $trail->push('Products', url('admin/products'));
});
Breadcrumbs::for('admins.products.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.products');  
    $trail->push($title, url('admin/add-edit-products',$title));
});
Breadcrumbs::for('admins.products.add-edit-product-images', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.products');  
    $trail->push("Product Images ".$title, url('admin/add-edit-product-images',$title));
});
//END Admin Products

//START admin Banners
Breadcrumbs::for('admins.banners', function (BreadcrumbTrail $trail) {    
    $trail->push('Banners', url('admin/banners'));
});
Breadcrumbs::for('admins.banners.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.banners');  
    $trail->push($title, url('admin/add-edit-banner',$title));
});
//START admin Banners

//START admin Coupons
Breadcrumbs::for('admins.coupons', function (BreadcrumbTrail $trail) {    
    $trail->push('Coupons', url('admin/coupons'));
});
Breadcrumbs::for('admins.coupons.add-edit', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.coupons');  
    $trail->push($title, url('admin/add-edit-coupon',$title));
});
//START admin Coupons




//START admin filter
Breadcrumbs::for('admins.filters', function (BreadcrumbTrail $trail) {    
    $trail->push('Filters', url('admin/filters'));
});
Breadcrumbs::for('admins.filters.values', function (BreadcrumbTrail $trail) {    
    $trail->parent('admins.filters');  
    $trail->push('Filters Values', url('admin/filters-values'));
});
Breadcrumbs::for('admins.filters.add-edit-filter', function (BreadcrumbTrail $trail,$title) {  
    $trail->parent('admins.filters');  
    $trail->push($title, url('admin/add-edit-filter',$title));
});
//START admin Banners


//START Admin orders
Breadcrumbs::for('admins.orders', function (BreadcrumbTrail $trail) {    
    $trail->push('Orders', url('admin/new-orders-details'));
});

//END Admin orders

