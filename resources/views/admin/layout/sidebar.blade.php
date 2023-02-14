<style>
ul.nav.flex-column.sub-menu{
    background:#fff!important;
    color:#4b49ac;
    list-style: none;
}
.sidebar .nav.sub-menu .nav-item .nav-link{
    color:#4b49ac;
}
.sidebar .nav.sub-menu .nav-item .nav-link:hover
{
    background:#4b49ac;
}
.sidebar .nav.sub-menu .nav-item::before{
    content:none;
}
/* ul.nav.flex-column.sub-menu a.nav-link{
    background:#fff!important;
    color:#4b49ac!important;
} */

</style>
<nav class="sidebar sidebar-offcanvas" id="sidebar" data-page="{{ Session::get('page') }}">
    <ul class="nav">
        <li class="nav-item" data-menu="dashboard">
            <a class="nav-link" href="{{ url('admin/dashboard')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::guard('admin')->user()->role=='admin')
        <li class="nav-item"  data-menu="post_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#post_management" aria-expanded="false" aria-controls="post_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Posts</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="post_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='posts' href="{{ url('admin/posts')}}">Posts</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='posts-categories' href="{{ url('admin/posts-categories')}}">Post Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='posts-tags' href="{{ url('admin/posts-tags')}}">Post Tags</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"  data-menu="media_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#media_management" aria-expanded="false" aria-controls="media_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Media Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="media_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='videos' href="{{ url('admin/videos')}}">Video</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='banners' href="{{ url('admin/banners')}}">Main Banners</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='popup-banner' href="{{ url('admin/popup-banners')}}">Popup Banner</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"  data-menu="page_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#page_management" aria-expanded="false" aria-controls="page_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Page Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='pages' href="{{ url('admin/pages')}}">Pages</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"  data-menu="project_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#project_management" aria-expanded="false" aria-controls="project_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Project Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="project_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='projects' href="{{ url('admin/projects')}}">Project</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"  data-menu="business_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#business_management" aria-expanded="false" aria-controls="business_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Business Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="business_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='business' href="{{ url('admin/business')}}">Business</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item " data-menu="order_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#ui-order_management" aria-expanded="false" aria-controls="ui-order_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Orders</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-order_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='new-order'  href="{{ url('admin/new-order-details')}}">New Order</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='complete-order' href="{{ url('admin/complete-order-vendor-details')}}">Complete Order</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='report-order' href="{{ url('admin/report-order-vendor-details')}}">Report Order</a></li>
                </ul>
            </div>
        </li>

            <li class="nav-item " data-menu="update_vendor_details" data-page='{{ Session::get('page-type') }}'>
                <a class="nav-link" data-toggle="collapse" href="#ui-vendor" aria-expanded="false" aria-controls="ui-vendor">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Vendor</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-vendor">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" data-page='personal'  href="{{ url('admin/update-vendor-details/personal')}}">Personal Details</a></li>
                        <li class="nav-item"> <a class="nav-link" data-page='business' href="{{ url('admin/update-vendor-details/business')}}">Business Details</a></li>
                        <li class="nav-item"> <a class="nav-link" data-page='bank' href="{{ url('admin/update-vendor-details/bank')}}">Bank Details</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item"  data-menu="categories_management" data-page='{{ Session::get('page-type') }}'>
                <a class="nav-link" data-toggle="collapse" href="#categories_management" aria-expanded="false" aria-controls="categories_management">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Categories Management</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="categories_management">
                    <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" data-page='products' href="{{ url('admin/products')}}">Products</a></li>
                       </ul>
                </div>
            </li>
            <li class="nav-item"  data-menu="coupons_management" data-page='{{ Session::get('page-type') }}'>
                <a class="nav-link" data-toggle="collapse" href="#coupons_management" aria-expanded="false" aria-controls="categories_management">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Coupon</span>
                <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="coupons_management">
                    <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" data-page='coupons' href="{{ url('admin/coupons')}}">Coupons</a></li>
                       </ul>
                </div>
            </li>

        @elseif(Auth::guard('admin')->user()->type=='superadmin')
        <li class="nav-item" data-menu="admins" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#ui-admin-management" aria-expanded="false" aria-controls="ui-admin-management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Admin Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="ui-admin-management">
                <ul class="nav flex-column sub-menu" >
                    <li class="nav-item"> <a class="nav-link" data-page='admin' href="{{ url('admin/admins/admin')}}">Admins</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='subadmin' href="{{ url('admin/admins/subadmin')}}">Subadmins</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='vendor' href="{{ url('admin/admins/vendor')}}">Vendors</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='all' href="{{ url('admin/admins/')}}">All </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item"  data-menu="users" data-page='users_{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#users_management" aria-expanded="false" aria-controls="users_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Users Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='' href="{{ url('admin/users')}}">Users</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='' href="{{ url('admin/subscribers')}}">Subscribers</a></li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item"  data-menu="categories_management" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#categories_management" aria-expanded="false" aria-controls="categories_management">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Categories Management</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories_management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='sections' href="{{ url('admin/sections')}}">Sections</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='categories' href="{{ url('admin/categories')}}">Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='brands' href="{{ url('admin/brands')}}">Brands</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='products' href="{{ url('admin/products')}}">Products</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='filters' href="{{ url('admin/filters')}}">Filters</a></li>
                </ul>
            </div>
        </li>
        
        

        @else
        @endif
        <li class="nav-item"  data-menu="settings" data-page='{{ Session::get('page-type') }}'>
            <a class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Settings</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" data-page='update_admin_password' href="{{ url('admin/update-admin-password')}}">Update Password</a></li>
                    <li class="nav-item"> <a class="nav-link" data-page='update_admin_details' href="{{ url('admin/update-admin-details')}}">Update Details</a></li>
                 </ul>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">UI Elements</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Form elements</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="icon-bar-graph menu-icon"></i>
            <span class="menu-title">Charts</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <i class="icon-contract menu-icon"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
            <i class="icon-ban menu-icon"></i>
            <span class="menu-title">Error pages</span>
            <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>