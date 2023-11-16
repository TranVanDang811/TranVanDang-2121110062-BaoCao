<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href=" {{ asset('https://demos.creative-tim.com/material-dashboard/pages/dashboard') }} " target="_blank">
      <img src="{{ asset('images/logo.jpg') }}" class="navbar-brand-img h-100" alt="main_logo">
      <span class="ms-1 font-weight-bold text-white">Trần Văn Đẳng</span>
    </a>
  </div>
  <hr class="horizontal light mt-0 mb-2">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">SẢN PhẨM</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('category.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">dashboard</i>
          </div>
          <span class="nav-link-text ms-1">Danh mục sản phẩm</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('unit.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Đơn vị tính</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('product.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">view_in_ar</i>
          </div>
          <span class="nav-link-text ms-1">Danh sách sản phẩm</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('brand.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Thương hiệu</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">DỮ LIỆU NHẬP HÀNG</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('product_import.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">label</i>
          </div>
          <span class="nav-link-text ms-1">Nhập hàng</span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('product_warehoused.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">label</i>
          </div>
          <span class="nav-link-text ms-1">Nhập hàng</span>
        </a>
      </li> --}}
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">ĐƠN HÀNG</h6>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('orderdetail.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
          </div>
          <span class="nav-link-text ms-1">Chi tiết đơn hàng</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('order.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">notifications</i>
          </div>
          <span class="nav-link-text ms-1">Đơn hàng</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">Bài viết</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('slider.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('topic.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Chủ đề bài viết</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('post.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Bài viết</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('page.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">receipt_long</i>
          </div>
          <span class="nav-link-text ms-1">Trang đơn</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">Khách hàng</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('customer.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Khách hàng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('contact.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Liên hệ</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('user.index') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Người dùng</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">Menu</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('menu.index') }}">
          <div class="text-info text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-cog"></i>
          </div>
          <span class="nav-link-text ms-1">Menu</span>
        </a>
      </li>
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs fw-bold text-danger opacity-8">TÀI KHOẢN</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/profile.html">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">person</i>
          </div>
          <span class="nav-link-text ms-1">Tài khoản</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="{{ route('admin.logout') }}">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">login</i>
          </div>
          <span class="nav-link-text ms-1">Đăng xuất</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white " href="../pages/sign-up.html">
          <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="material-icons opacity-10">assignment</i>
          </div>
          <span class="nav-link-text ms-1">Đăng nhập</span>
        </a>
      </li>
    </ul>
  </div>
  {{-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
      <a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
      <a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> --}}
  </div>
</aside>
