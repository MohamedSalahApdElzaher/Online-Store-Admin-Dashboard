@php

/**
  get prefix name and route name for active selcted sidebar
*/
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
  <section class="sidebar">

    <div class="user-profile">
      <div class="ulogo">
        <a href="index.html">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
            <h3><b>Ecommerce</b> Admin</h3>
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
        <a href="{{url('admin/dashboard')}}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="treeview {{ $prefix == '/brand' ? 'active' : '' }}">
        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Brands</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ $route == 'all.brands' ? 'active' : '' }}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>all brands</a></li>
        </ul>
      </li>

      <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i> <span>Category</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ $route == 'all.category' ? 'active' : '' }}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
          <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}"><a href="{{route('all.subcategory')}}"><i class="ti-more"></i>All SubCategory</a></li>
          <li class="{{ $route == 'all.sub_subcategory' ? 'active' : '' }}"><a href="{{route('all.sub_subcategory')}}"><i class="ti-more"></i>All Sub SubCategory</a></li>
        </ul>
      </li>

      <li class="treeview {{ $prefix == '/product' ? 'active' : '' }}">
        <a href="#">
          <i data-feather="file"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ $route == 'add_product' ? 'active' : '' }}"><a href="{{ route('add_product') }}"><i class="ti-more"></i>Add products</a></li>
          <li class="{{ $route == 'manage_product' ? 'active' : '' }}"><a href="{{ route('manage_product') }}"><i class="ti-more"></i>Manage products</a></li>

        </ul>
      </li>

      <li class="header nav-small-cap">User Interface</li>

      <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i>
          <span>Components</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
          <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
          <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
          <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
          <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
          <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
          <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
          <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="credit-card"></i>
          <span>Cards</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
          <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
          <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
        </ul>
      </li>


    </ul>
  </section>

</aside>