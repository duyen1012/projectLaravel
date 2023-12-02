<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">UNITOP ADMIN</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('admin/post/add') }}">Thêm bài viết</a>
                        <a class="dropdown-item" href="{{ url('admin/product/add') }}">Thêm sản phẩm</a>
                        <a class="dropdown-item" href="{{ url('admin/user/add') }}">Thêm thành viên</a>
                        <a class="dropdown-item" href="{{ url('admin/page/add') }}">Thêm trang</a>

                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        {{-- <a class="dropdown-item" href="#">Tài khoản</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Thoát') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link">
                        <a href="{{ url('dashboard') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    <li class="nav-link ">
                        <a href="{{ url('admin/page/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-file"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/page/add') }}">Thêm mới</a></li>
                            <li><a href="">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="{{ url('admin/post/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-newspaper"></i>
                            </div>
                            Bài viết
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ route('post.add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/post/list') }}">Danh sách</a></li>
                            <li><a href="{{ url('admin/categoryPost/list') }}">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a href="{{ url('admin/customer/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Khách hàng
                        </a>

                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ route('customer.add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/customer/list') }}">Danh sách</a></li>

                        </ul>
                    </li>

                    <li class="nav-link  ">
                        <a href="{{ route('product.list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            Sản phẩm
                        </a>
                        <i class="arrow fas fa-angle-down"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/product/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/product/list') }}">Danh sách</a></li>
                            <li><a href="{{ url('admin/product/cat/list') }}">Danh mục</a></li>
                        </ul>
                    </li>
                    <li class="nav-link ">
                        <a href="{{ url('admin/order/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            Đơn hàng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/order/list') }}">Đơn hàng</a></li>
                        </ul>
                    </li>
                    <li class="nav-link ">
                        <a href="{{ url('admin/user/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-users"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/user/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/user/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    <li class="nav-link ">
                        <a href="{{ route('slider.list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            Sliders
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/slider/add') }}">Thêm mới</a></li>
                            <li><a href="{{ url('admin/slider/list') }}">Danh sách</a></li>
                        </ul>
                    </li>
                    @canany(['role.view', 'role.add', 'role.edit', 'role.delete'])
                        <li class="nav-link  ">
                            <a href="{{ route('permission.add') }}">
                                <div class="nav-link-icon d-inline-flex">
                                    <i class="fab fa-slideshare"></i>
                                </div>
                                Quyền
                            </a>
                            <i class="arrow fas fa-angle-right"></i>
                            <ul class="sub-menu">
                                <li><a href="{{ route('permission.add') }}">Quyền</a></li>

                                <li><a href="{{ route('role.index') }}">Danh sách vai trò</a></li>
                                @can('role.add')
                                    <li><a href="{{ route('role.add') }}">Thêm vai trò</a></li>
                                @endcan

                            </ul>
                        </li>
                    @endcanany

                    {{-- <li class="nav-link ">
                        <a href="{{ url('admin/role/list') }}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            Vai trò
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{ url('admin/role/add') }}">Thêm mới</a></li>
                            <li><a href="{{ route('role.list') }}">Danh sách</a></li>
                        </ul>
                    </li> --}}
            </div>
            <div id="wp-content">
                @yield('content');

            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
