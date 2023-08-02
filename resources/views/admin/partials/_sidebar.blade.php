<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Admin management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/admin-list')}}">Show all</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/admin-add')}}">Add new</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Product management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/products/product-list')}}">Show all</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/products/product-add')}}">Add new</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Category management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/categories/category-list')}}">Show all</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/categories/category-add')}}">Add new</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Customer management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/Customers/customer-list')}}">Customer List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/Customers/order-list')}}">Orders List</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{url('admin/pages/Customers/feedback-list')}}">Feedback List</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
