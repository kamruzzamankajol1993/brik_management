@php
     $usr = Auth::guard('admin')->user();
 @endphp
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboards</span>
                    </a>
                </li>
                <li class="menu-title" key="t-apps">Inventory Section</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-basket"></i>
                        <span key="t-projects">Manage Inventory</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        {{-- <li class="{{ Route::is('sub_category_type')  ? 'active' : '' }}"><a href="{{ route('sub_category_type') }}"> <span>Test Form</span> </a></li> --}}





                   @if ($usr->can('inventory_name_add') || $usr->can('inventory_name_view') || $usr->can('inventory_name_delete') ||$usr->can('inventory_name_update') )
                        <li class="{{ Route::is('admin.inventory_name')  ? 'active' : '' }}"><a href="{{ route('admin.inventory_name') }}"> <span>Inventory Name</span> </a></li>
                   @endif


                   @if ($usr->can('inventory_add') || $usr->can('inventory_view') || $usr->can('inventory_delete') ||$usr->can('inventory_update') )
                        <li class="{{ Route::is('admin.inventory')  ? 'active' : '' }}"><a href="{{ route('admin.inventory') }}"> <span>Inventory</span> </a></li>
                   @endif







                </ul>
            </li>

            <li class="menu-title" key="t-apps">Client Section</li>

            @if ($usr->can('main_client_add') || $usr->can('main_client_view') || $usr->can('main_client_delete') ||$usr->can('main_client_update') )
            <li class="{{ Route::is('admin.main_client') ? 'active' : '' }}">
                <a href="{{ route('admin.main_client') }}" class="waves-effect">
                    <i class="bx bx-user"></i>
                    <span key="t-dashboard">Client List</span>
                </a>
            </li>
            @endif
            <li class="menu-title" key="t-apps">Car & Driver</li>

            @if ($usr->can('car_and_driver_add') || $usr->can('car_and_driver_view') || $usr->can('car_and_driver_delete') ||$usr->can('car_and_driver_update') )
            <li class="{{ Route::is('admin.car_and_driver') ? 'active' : '' }}">
                <a href="{{ route('admin.car_and_driver') }}" class="waves-effect">
                    <i class="bx bxs-truck"></i>
                    <span key="t-dashboard">Car & Driver List</span>
                </a>
            </li>
            @endif


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bxs-file"></i>
                    <span key="t-projects">Consigment List</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">

                    {{-- <li class="{{ Route::is('sub_category_type')  ? 'active' : '' }}"><a href="{{ route('sub_category_type') }}"> <span>Test Form</span> </a></li> --}}





               @if ($usr->can('consigment_add') || $usr->can('consigment_view') || $usr->can('consigment_delete') ||$usr->can('consigment_update') )
                    <li class="{{ Route::is('admin.consigment')  ? 'active' : '' }}"><a href="{{ route('admin.consigment') }}"> <span>Consigment</span> </a></li>
               @endif


               @if ($usr->can('release_product_add') || $usr->can('release_product_view') || $usr->can('release_product_delete') ||$usr->can('release_product_update') )
                    <li class="{{ Route::is('admin.release_product')  ? 'active' : '' }}"><a href="{{ route('admin.release_product') }}"> <span>Release</span> </a></li>
               @endif







            </ul>
        </li>





                <li class="menu-title" key="t-apps">Settings</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-projects">Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                        {{-- <li><a href="projects-grid.html" key="t-p-grid">Projects Grid</a></li>
                        <li><a href="projects-list.html" key="t-p-list">Projects List</a></li>
                        <li><a href="projects-overview.html" key="t-p-overview">Project Overview</a></li>
                        <li><a href="projects-create.html" key="t-create-new">Create New</a></li> --}}
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
{{-- <div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>

        <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if ($usr->can('dashboard.view'))
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
@endif

@if ($usr->can('product_main'))
<li class="menu-title">PRODUCT SECTION</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-label"></i>
        <span>Product</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

        @if ($usr->can('product_add'))
        <li class="{{ Route::is('admin.product_list_add')  ? 'active' : '' }}"><a href="{{ route('admin.product_list_add') }}"> <span>Add Product</span> </a></li>
@endif
@if ($usr->can('product_view'))
        <li class="{{ Route::is('admin.product_list')  ? 'active' : '' }}"><a href="{{ route('admin.product_list') }}"> <span>Manage Product</span> </a></li>
@endif



    </ul>
</li>

@endif

                <li class="menu-title">Setting</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-setting"></i>
                        <span>System Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div> --}}







