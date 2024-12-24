<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('user-name').addEventListener('click', function() {
            var userOptions = document.getElementById('user-options');
            // Kiểm tra trạng thái hiện tại, nếu đang ẩn thì hiển thị, nếu đang hiển thị thì ẩn
            if (userOptions.style.display === 'none') {
                userOptions.style.display = 'block';
            } else {
                userOptions.style.display = 'none';
            }
        });
    });
</script>
<style>
   #user-options {
    padding: 0;
    margin: 0;
    list-style-type: none;
    text-align: center; /* Căn giữa tất cả các mục trong danh sách */
}

#user-options .website-btn {
    background: transparent; /* Nền trong suốt */
    color: white; /* Chữ màu trắng */
    width: 100px;
    border-radius: 5px; /* Bo tròn góc */
    text-decoration: none; /* Xóa gạch chân */
    display: inline-block; /* Định dạng kiểu nút */
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
}


#user-options .website-btn:hover {
    background: rgba(255, 255, 255, 0.2); /* Nền nhấn nhẹ */
} 
/* Button Đăng Xuất */
#user-options .logout-btn {
    background: transparent; /* Nền trong suốt */
    color: white; /* Chữ màu trắng */
    width: 100px;
    border-radius: 5px; /* Bo tròn góc */
    cursor: pointer; /* Con trỏ dạng nhấn */
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi */
}
#user-options .nav-link button {
    background-color: transparent;
    border: none;
    color: inherit;
    font-size: inherit;
    padding: 0;
    cursor: pointer;
}

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/images/icons/favicon.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Shop Xinh</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/images/avatar-01.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
    <a href="#" class="d-block" id="user-name">
        {{ Auth::user()->name }} <!-- Hiển thị tên người dùng đã đăng nhập -->
    </a>
    <ul class="nav nav-treeview" id="user-options" style="display: none;">
    <li class="nav-item">
                  <!-- Chuyển đến Website -->
        <a href="http://127.0.0.1:8000" class="nav-link website-btn">   
            Website
        </a>
    </li>
    <li class="nav-item">
        <!-- Đăng xuất -->
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="nav-link logout-btn">
                Đăng Xuất
            </button>
        </form>
    </li>
</ul>
</div>
        </div>

        {{-- <!-- SidebarSearch Form -->
        <div class="form-inline">
      <form action="/search" method="GET" class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="text" name="query" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar" type="submit">
                <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </form>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p> Trang Chủ </p>
                    </a>
                </li>
                @if(Auth::user()->role_id == 1)

                     <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                        <p> Quản Lí Người Dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user01/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user01/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Người Dùng</p>
                            </a>
                        </li>

                    </ul>
                </li>
@else

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p> Danh Mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Danh Mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Danh Mục</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p> Sản Phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p> Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/sliders/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/sliders/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Slider</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p> Đơn Hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Đơn Hàng</p>
                            </a>
                        </li>

                    </ul>
                </li>
             @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
