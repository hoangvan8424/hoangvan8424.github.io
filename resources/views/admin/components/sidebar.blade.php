<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-text mx-3">{{ config("app.name") }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tổng quan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item {{ Request::is('admin/branch') || Request::is('admin/branch/*') ? 'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGroup" aria-expanded="true"
           aria-controls="collapseGroup">
            <i class="fas fa-code-branch"></i>
            <span>Chi nhánh</span>
        </a>
        <div id="collapseGroup" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('branch.list') }}">Danh sách chi nhánh</a>
                <a class="collapse-item" href="{{ route('branch.add') }}">Thêm chi nhánh</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item {{ Request::is('admin/department') || Request::is('admin/department/*') ? 'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-building"></i>
            <span>Phòng ban</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('department.list') }}">Danh sách phòng ban</a>
                <a class="collapse-item" href="{{ route('department.add') }}">Thêm phòng ban</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::is('admin/product') || Request::is('admin/product/*') ? 'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fab fa-product-hunt"></i>
            <span>Sản phẩm</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product.list') }}">Danh sách sản phẩm</a>
                <a class="collapse-item" href="{{ route('product.add') }}">Thêm sảm phẩm</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProductDemo" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fab fa-slideshare"></i>
            <span>Sản phẩm demo</span>
        </a>
        <div id="collapseProductDemo" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product.demo.list') }}">Danh sách sp demo</a>
                <a class="collapse-item" href="{{ route('product.demo.add') }}">Thêm sp demo</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-print"></i>
            <span>Sản phẩm in</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('product.print.list') }}">Danh sách sp in</a>
                <a class="collapse-item" href="{{ route('product.print.add') }}">Thêm sp in</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomer" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-people-carry"></i>
            <span>Khách hàng</span>
        </a>
        <div id="collapseCustomer" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('customer.list') }}">Danh sách khách hàng</a>
                <a class="collapse-item" href="{{ route('customer.add') }}">Thêm khách hàng</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">


    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-user"></i>
            <span>Người dùng</span>
        </a>
        <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('user.list') }}">Danh sách người dùng</a>
                <a class="collapse-item" href="{{ route('user.add') }}">Thêm người dùng</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
