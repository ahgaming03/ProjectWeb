<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @if (session('admin.roleID') == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin-list') }}">
                    <i class="bi bi-person-vcard menu-icon"></i>
                    <span class="menu-title">Admin</span>
                </a>
                <ul class="nav flex-column sub-menu" hidden>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin-add') }}">Add new</a></li>
                </ul>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
                <i class="bi bi-box2-heart menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('product-list') }}">Product list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('category-list') }}">Category list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('manufacturer-list') }}">Manufacturer list</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#customer" aria-expanded="false" aria-controls="customer">
                <i class="bi bi-people menu-icon"></i>
                <span class="menu-title">Customer</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="customer">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer-list') }}">Customer list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('order-list') }}">Order list</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('customer-feedback') }}">Feedback list</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
