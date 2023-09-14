<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>OrderManagement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../../../assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../../assets/css/metisMenu.css">
    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/css/slicknav.min.css">
    <!-- Amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- Style css -->
    <link rel="stylesheet" href="../../../assets/css/typography.css">
    <link rel="stylesheet" href="../../../assets/css/default-css.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
    <link rel="stylesheet" href="../../../assets/css/editstyles.css">
    <link rel="stylesheet" href="../../../assets/css/responsive.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Modernizr css -->
    <script src="../../../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- Preloader area end -->
    <!-- Page container area start -->
    <div class="page-container">
        <!-- Sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <!-- Logo -->
                <div class="logo"><a id="logo" href="#" title="CRMVIET"><img class="logo-main scale-with-grid" src="https://crmviet.vn/wp-content/uploads/2020/04/logo-crmviet.png" alt="logo crmviet"></a></div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <!-- Khách hàng -->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                <i class="ti-user"></i><span>Khách Hàng</span></a>
                                <ul class="collapse">
                                    <li><a href="{{ route('get.index') }}">Khách hàng</a></li>
                                    <li><a href="{{ route('get.contact_index') }}">Liên hệ với khách hàng</a></li>
                                    <li><a href="{{ route('get.category_index') }}">List khách hàng</a></li>
                                    <li><a href="{{ route('get.representer_index') }}">Người đại diện</a></li>
                                </ul>
                            </li>

                            <!-- Kinh doanh -->
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true">
                                <i class="fa fa-briefcase"></i><span>Kinh doanh</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('get.transaction_index') }}">Giao dịch với khách hàng</a></li>
                                    <li><a href="{{ route ('get.goods_index') }}">Hàng hóa</a></li>
                                    <li><a href="{{ route ('get.order_index') }}">Đơn hàng</a></li>
                                    <li><a href="{{ route('get.contract_index') }}">Hợp đồng bán ra</a></li>
                                </ul>
                            </li>

                            <!-- Báo cáo -->
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-bar-chart" aria-hidden="true"></i> <span>Báo cáo</span></a>
                                <ul class="collapse">
                                    <li><a href="#">Biểu đồ</a></li>
                                </ul>
                            </li>

                             <!-- Chat -->
                             <li>
                                <a href="{{ url('').'/'.config('chatify.routes.prefix') }}" aria-expanded="true"><i class="fa fa-commenting-o" aria-hidden="true"></i><span>Chat</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Sidebar menu area end -->

        <!-- Main content area start -->
        <div class="main-content">
            <!-- Page title area start -->
            {{-- Thêm pt-3 và pb-3 --}}
            <div class="page-title-area pt-3 pb-3">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <div id="btn-sidebar" class="nav-btn pull-left nav-btn-click" style="border-right: 2px solid #44444445 !important; padding-right: 26px !important; margin-top: 3px !important; height: 25px;">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('get.transaction_index') }}">Kinh Doanh</a></li>
                                <li><span>Giao Dịch Với Khách Hàng</span></li>
                            </ul>
                        </div>
                    </div>
                    <style>
                        #dataTable3 {
                            width: 100% !important;
                        }
                    </style>
                    <!-- Profile Info -->
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="{{ pare_url_file(Auth::user()->avatar) }}" onerror="this.src='/assets/images/author/avatar.png'"alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name ?? "[N\A]" }}<i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item profile-option" href="#">Hướng dẫn sử dụng</a>
                                <a class="dropdown-item profile-option" href="#">Thông tin cá nhân</a>
                                <a class="dropdown-item profile-option" href="#">Cài đặt Email</a>
                                <a class="dropdown-item profile-option" href="#">Hòm thư</a>
                                <a class="dropdown-item profile-option" href="#">Trợ giúp</a>
                                <a class="dropdown-item profile-option" href="#">Thoát</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page title area end -->

            @yield('content')
        </div>
        <!-- Main content area end -->
        <!-- Footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2023. All right reserved.</p>
            </div>
        </footer>
        <!-- Footer area end-->
    </div>
    <!-- Page container area end -->

    <!-- jquery latest version -->
    <script src="../../../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../../../assets/js/popper.min.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>
    <script src="../../../assets/js/owl.carousel.min.js"></script>
    <script src="../../../assets/js/metisMenu.min.js"></script>
    <script src="../../../assets/js/jquery.slimscroll.min.js"></script>
    <script src="../../../assets/js/jquery.slicknav.min.js"></script>
    {{-- <script src="../../../assets/js/jquery.dataTables.js"></script> --}}

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script src="../../../assets/js/plugins.js"></script>
    <script src="../../../assets/js/scripts.js"></script>
</body>
</html>
