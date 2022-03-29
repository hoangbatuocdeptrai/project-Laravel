<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{url('public/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('public/admin')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('public/admin')}}/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="{{url('public/forgot')}}/toastr/toastr.css">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{url('public/admin')}}/image/logo.png" alt="AdminLTELogo" height="60"
                width="200">
        </div>

        <!-- Navbar -->
        <x-admin.header />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.index')}}" class="brand-link">
                <img src="{{url('public/home')}}/img/logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('public/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-header">EXAMPLES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-tablet"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('category.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Add new</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('category.trashed')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Trash can</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-user-tie"></i>
                                <p>
                                    Author
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('author.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('author.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Add new</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('author.trashed')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Trashed Can Author</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('product.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('product.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Add new</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('product.trashed')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Trashed Can Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-blog"></i>
                                <p>
                                    Blogs
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.blog.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.blog.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon text-warning"></i>
                                        <p>Add new</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Trashed Can Blog</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.order.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-truck"></i>
                                <p>
                                    Order
                                    <span class="badge badge-info right">{{$or->count()}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.borrower.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-scroll"></i>
                                <p>
                                    Borrower
                                    <span class="badge badge-info right">{{$bor->count()}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.customer.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    Customers
                                    <span class="badge badge-info right">{{$cus->count()}}</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                       
                                <a href="{{route('admin.banner.index')}}" class="nav-link">
                                    <i class="nav-icon fa fa-images"></i>
                                    <p>
                                        Banner
                                    </p>
                                </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.contact')}}" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Contact
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('main')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('public/admin')}}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('public/admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('public/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{url('public/admin')}}/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('public/admin')}}/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{url('public/admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{url('public/admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('public/admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{url('public/admin')}}/plugins/moment/moment.min.js"></script>
    <script src="{{url('public/admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('public/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{url('public/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('public/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('public/admin')}}/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('public/admin')}}/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('public/admin')}}/dist/js/pages/dashboard.js"></script>
    <script src="{{url('public/forgot')}}/toastr/toastr.js"></script>
    @yield('js')
    </script>
    @if(Session::has('yes'))
    <script>
    toastr.success("{{Session::get('yes')}}", 'Success', {
        timeOut: 2000
    });
    </script>
    @endif
    @if(Session::has('no'))
    <script>
    toastr.error("{{Session::get('no')}}", 'Success', {
        timeOut: 2000
    });
    </script>
    @endif
</body>

</html>