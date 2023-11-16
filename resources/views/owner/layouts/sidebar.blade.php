<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon ">
            <img id="img_logo" src="{{ asset('client/img/logoXTMN.png') }}" alt="logo" width="70px">
        </div>
        <div class="sidebar-brand-text mx-3">Chủ sân</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/owner_home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tổng quan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Sân bóng
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/post_field">
            <i class="fas fa-file-upload"></i>
            <span>Đăng sân bóng</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/manage_field">
            <i class="fas fa-folder-open"></i>
            <span>Quản lý bài đăng</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Đơn đặt sân
    </div>
    <li class="nav-item">
        <a class="nav-link" href="/approve_order">
            <i class="fas fa-clipboard-check"></i>
            <span>Duyệt đơn đặt sân</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/see_order">
            <i class="fas fa-address-book"></i>
            <span>Xem đơn đặt sân</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="history_order">
            <i class="fas fa-history"></i>
            <span>Lịch sử cho thuê sân</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Doanh thu
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="/statistical">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thống kê</span></a>
    </li>

</ul>