<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - VMP</title>
    <link rel="stylesheet" href="{{asset('public/libs/bootstrap/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/libs/font-awesome/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/css/client/mystyle.css')}}"/>
    <link rel="stylesheet" href="{{asset('public/css/client/homepage.css')}}"/>
</head>

<body>
    <!-- Navigation -->
    @include('layouts.header')

    <div class="row m-auto mt-2">
        <div class="col-lg-2 col-md-12">
            <div class="nav flex-column">
                {{-- <ul class="nav flex-column" id="side-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Category<span class="fa arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.cate.list')}}">Danh sách Category</a>
                            <a class="dropdown-item" href="{{route('admin.cate.getAdd')}}">Thêm Category</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Tin rao bán<span class="fa arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.stock.list')}}">Danh sách Tin rao bán</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Tin tìm mua<span class="fa arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.order.list')}}">Danh sách Tin tìm mua</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Người dùng<span class="fa arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.user.list')}}">Danh sách Người dùng</a>
                            <a class="dropdown-item" href="{{route('admin.user.getAdd')}}">Thêm Người dùng</a>
                        </div>
                    </li>
                </ul> --}}

                <ul class="nav flex-column" id="side-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Danh sách<span class="fa arrow"></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('admin.cate.list')}}">Category</a>
                            <a class="dropdown-item" href="{{route('admin.stock.list')}}">Tin rao bán</a>
                            <a class="dropdown-item" href="{{route('admin.order.list')}}">Tin tìm mua</a>
                            <a class="dropdown-item" href="{{route('admin.user.list')}}">Người dùng</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Page Content -->
        <div class="col-lg-10 col-md-12">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>@yield('controller')
                            <small>@yield('action')</small>
                        </h1>
                    </div>
                    <div class="col-lg-12 mb-2">
                        @if (Session::has('flash_message'))
                            <div class="alert alert-{!! Session::get('flash_level') !!}">
                                {!! Session::get('flash_message') !!}
                            </div>
                        @endif
                    </div>
                    <!--Noi dung-->
                    @yield('content')
                    <!--Ket thuc-->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('public/libs/tether/tether.min.js')}}"></script>
    <script src="{{asset('public/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/admin/admin.js')}}"></script>
    
</body>

</html>
