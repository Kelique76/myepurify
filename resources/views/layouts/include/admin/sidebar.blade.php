<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">
          <i class="mdi mdi-basket-fill menu-icon"></i>
          <span class="menu-title">Penjualan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-reproduction menu-icon"></i>
          <span class="menu-title">Catz Produk</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/category')}}">Lihat</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="{{url('/admin/liatcategory')}}">Tambah</a></li> --}}
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui2-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-rotate-right-variant menu-icon"></i>
          <span class="menu-title">Produk</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui2-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/merks')}}">Merk</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/liatprd')}}">Products</a></li>
         
           
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
          <i class="mdi mdi-invert-colors menu-icon"></i>
          <span class="menu-title">Kolor Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/warnas')}}"> Warna-Warni </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth3">
          <i class="mdi mdi-layers menu-icon"></i>
          <span class="menu-title">Slider Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth3">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/sliders')}}"> Main Slider </a></li>
           
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <i class="mdi mdi-google-circles menu-icon"></i>
          <span class="menu-title">User Management</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/admin/users')}}"> UserList </a></li>
           
          </ul>
        </div>
      </li>


      
    </ul>
  </nav>