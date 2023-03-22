<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Yayasan Era Suria</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{url('')}}/adminlte3/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{url('')}}/adminlte3/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="{{url('')}}/adminlte3/plugins/flag-icon-css/css/flag-icon.min.css">
        <link href="{{url('')}}/images/MAARAlogo.jpg" rel="shortcut icon" />
        @yield('scriptheader')
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                      <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                      <form class="form-inline" action="{{url('posts/search')}}" method="GET">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search keywords ..." aria-label="Search">
                          <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                              <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                              <i class="fas fa-times"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </li>
                  {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                      <a href="#" class="dropdown-item active">
                        <i class="flag-icon flag-icon-us mr-2"></i> English
                      </a>
                      <a href="#" class="dropdown-item">
                        <i class="flag-icon flag-icon-my mr-2"></i> Malay
                      </a>
                      <a href="#" class="dropdown-item">
                        <i class="flag-icon flag-icon-cn mr-2"></i> Chinese
                      </a>
                    </div>
                  </li> --}}
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-1">
            <!-- Sidebar -->
            <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-5">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{url('/')}}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('posts/form')}}" class="nav-link">
                          <i class="nav-icon fas fa-camera"></i>
                            <p>Sell</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-search"></i>
                            <p>Ask</p>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dollar-sign"></i> 
                          <p>Buy</p>
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
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright MAARA &copy; <span id="copy-year"></span></strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('')}}/adminlte3/plugins/jquery/jquery.min.js"></script>
    <script src="{{url('')}}/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{url('')}}/adminlte3/dist/js/adminlte.min.js"></script>
      @yield('scriptfooter')
    </body>
</html>
