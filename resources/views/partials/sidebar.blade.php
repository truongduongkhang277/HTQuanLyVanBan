<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HT Quản lý văn bản</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (!empty(auth()->user()->file_path))
                    <img src="{{ auth()->user()->file_path }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('adminlte/dist/img/noimage.png') }}" class="img-circle elevation-2"
                        alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- Trang chủ-->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Trang chủ </p>
                    </a>
                </li>
                @can('danh-sach-van-ban-den')
                    <!-- Văn bản đến -->
                    <li class="nav-item">
                        <a href="{{ route('vanBanDen.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                Quản lý văn bản đến
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('vanBanDen.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách văn bản đến</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                @can('danh-sach-van-ban-di')
                    <!-- Văn bản đi -->
                    <li class="nav-item">
                        <a href="{{ route('vanBanDi.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-external-link-alt"></i>
                            <p>
                                Quản lý văn bản đi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('vanBanDi.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách văn bản đi</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <!-- Quản lý hệ thống-->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-laptop-code"></i>
                        <p>
                            Quản lý hệ thống
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    @can('danh-sach-bo-phan')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('boPhan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách bộ phận</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-co-quan')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coQuan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách cơ quan</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-do-khan')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doKhan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách độ khẩn</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-do-mat')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('doMat.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách độ mật</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-hinh-thuc')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hinhThuc.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách hình thức</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-hinh-thuc-chuyen')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hinhThucChuyen.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách hình thức chuyển</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-hinh-thuc-luu')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('hinhThucLuu.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách hình thức lưu</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-linh-vuc')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('linhVuc.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách lĩnh vực</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-the-loai')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('theLoai.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách thể loại</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                    @can('danh-sach-trang-thai')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('trangThai.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách trạng thái</p>
                            </a>
                        </li>
                    </ul>
                    @endcan
                </li>
                @can('danh-sach-tai-khoan')
                <li class="nav-item">
                    <a href="{{ route('nguoiDung.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p> Danh sách người dùng </p>
                    </a>
                </li>
                @endcan
                @can('danh-sach-vai-tro')
                <li class="nav-item">
                    <a href="{{ route('vaiTro.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Danh sách vai trò</p>
                    </a>
                </li>
                @endcan
                @can('danh-sach-quyen-truy-cap')
                <li class="nav-item">
                    <a href="{{ route('quyenTruyCap.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>Danh sách quyền</p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Đăng xuất </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
