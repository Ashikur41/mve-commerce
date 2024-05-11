<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('Admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- @if (Auth::user()->can('brand.menu')) --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.brand') }}"><i class='bx bx-radio-circle'></i>All Brand</a>
                </li>
                <li> <a href="{{ route('add.brand') }}"><i class='bx bx-radio-circle'></i>Add Brand</a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}

        {{-- @if (Auth::user()->can('category.menu')) --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>
                <li> <a href="{{ route('add.category') }}"><i class='bx bx-radio-circle'></i>Add Category</a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Sub-Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.sub_category') }}"><i class='bx bx-radio-circle'></i>All Sub-Category</a>
                </li>
                <li> <a href="{{ route('add.sub_category') }}"><i class='bx bx-radio-circle'></i>Add Sub-Category</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Vendor Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('inActive.vendor') }}"><i class='bx bx-radio-circle'></i>InActive Vendor</a>
                </li>
                <li> <a href="{{ route('active.vendor') }}"><i class='bx bx-radio-circle'></i>Active Vendor</a>
                </li>
            </ul>
        </li>

        {{-- @if (Auth::user()->can('category.menu')) --}}
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Order Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Order</a>
                </li>
                <li> <a href="{{ route('admin.confirmed.order') }}"><i class="bx bx-right-arrow-alt"></i>Confirmed
                        Order</a>
                </li>
                <li> <a href="{{ route('admin.processing.order') }}"><i class="bx bx-right-arrow-alt"></i>Processing
                        Order</a>
                </li>
                <li> <a href="{{ route('admin.delivered.order') }}"><i class="bx bx-right-arrow-alt"></i>Delivered
                        Order</a>
                </li>
            </ul>
        </li>
        {{-- @endif --}}

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Product Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.product') }}"><i class='bx bx-radio-circle'></i>All Product</a>
                </li>
                <li> <a href="{{ route('add.product') }}"><i class='bx bx-radio-circle'></i>Add Product</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Slider Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.slider') }}"><i class='bx bx-radio-circle'></i>All Slider</a>
                </li>
                <li> <a href="{{ route('add.slider') }}"><i class='bx bx-radio-circle'></i>Add Slider</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Banner Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.banner') }}"><i class='bx bx-radio-circle'></i>All Banner</a>
                </li>
                <li> <a href="{{ route('add.banner') }}"><i class='bx bx-radio-circle'></i>Add Banner</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Coupon System</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.coupon') }}"><i class='bx bx-radio-circle'></i>All Coupon</a>
                </li>
                <li> <a href="{{ route('add.coupon') }}"><i class='bx bx-radio-circle'></i>Add Coupon</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Shipping Area</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.division') }}"><i class='bx bx-radio-circle'></i>All Division</a>
                </li>
                <li> <a href="{{ route('all.district') }}"><i class='bx bx-radio-circle'></i>All District</a>
                </li>
                <li> <a href="{{ route('all.state') }}"><i class='bx bx-radio-circle'></i>All State</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Blog Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.blog.category') }}"><i class='bx bx-radio-circle'></i>All Blog
                        Category</a>
                </li>
                <li> <a href="{{ route('admin.blog.post') }}"><i class='bx bx-radio-circle'></i>All Blog Post</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Review Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('pending.review') }}"><i class="bx bx-right-arrow-alt"></i>Pending Review</a>
                </li>

                <li> <a href="{{ route('publish.review') }}"><i class="bx bx-right-arrow-alt"></i>Publish Review</a>
                </li>


            </ul>
        </li>

        <li class="menu-label">All Permission</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Roles & Permission</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a>
                </li>
                <li> <a href="{{ route('all.role') }}"><i class='bx bx-radio-circle'></i>All Roles</a>
                </li>
                <li> <a href="{{ route('add.role.permission') }}"><i class='bx bx-radio-circle'></i>Roles in
                        Permission</a>
                </li>
                <li> <a href="{{ route('all.role.permission') }}"><i class='bx bx-radio-circle'></i>All Roles in
                        Permission</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Admin Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a>
                </li>
                <li> <a href="{{ route('add.admin') }}"><i class="bx bx-right-arrow-alt"></i>Add Admin</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Reports Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('report.view') }}"><i class='bx bx-radio-circle'></i>Report View</a>
                </li>
                <li> <a href="{{ route('order.by.user') }}"><i class="bx bx-right-arrow-alt"></i>Order By User</a>
                </li>
            </ul>
        </li>

        {{-- <li>
            <a href="form-froala-editor.html">
                <div class="parent-icon"><i class='bx bx-code-alt'></i>
                </div>
                <div class="menu-title">Froala Editor</div>
            </a>
        </li> --}}

        <li>
            <a href="#" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
