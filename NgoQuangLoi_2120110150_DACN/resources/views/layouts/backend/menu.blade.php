<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
    with font-awesome or any other icon font library -->

        {{-- sản phẩm/ product --}}
        <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <i class="fa-solid fa-icon fa-cart-shopping"></i>
                <p>
                    Quản Lý Sản Phẩm
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('brand.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản Lý Thương hiệu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản Lý Danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản Lý Sản phẩm</p>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <i class="fa-solid fa-icon fa-user"></i>
                <p>
                    Quản Lý Người Dùng
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản Lý Người dùng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('order.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Quản Lý Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Liên hệ khách hàng</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <i class="fa-solid fa-icon fa-newspaper"></i>
                <p>
                    Quản Lý Sự Kiện
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thông báo sự kiện</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('topic.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Chủ đề sự kiện</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                <i class="fa-solid fa-icon fa-house"></i>
                <p>
                    Quản Lý Giao Diện
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('menu.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menu</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
            </a>
        </li>
    </ul>
</nav>