<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#admin" aria-expanded="false" aria-controls="admin">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Admin management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin-list') }}">Show all</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin-add') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Product management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product-list') }}">Show all</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product-add') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Category management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category-list') }}">Show all</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category-add') }}">Add new</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Customer management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer-list') }}">Customer list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer-order') }}">Order list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer-feedback') }}">Feedback list</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
