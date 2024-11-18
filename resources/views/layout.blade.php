<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>APP-MAPS</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assetss/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assetss/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="assetss/css/style.css">
  <link rel="stylesheet" href="assetss/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 600px;
    }
  </style>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<body>
  <div id="app">
    <nav class="navbar bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Route Maps</span>
        <div class="d-flex ms-auto">
          <a href="{{ url('logout')}}" class="btn btn-danger btn-icon-split">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </div>
    </nav>
    <div class="main-wrapper main-wrapper-1">
      <!-- As a heading -->
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">App Maps</a>
          </div>

          <ul class="sidebar-menu">

            <li class="menu-header">data</li>

            <li class="active"><a class="nav-link" href="{{url('home')}}"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
            <li class="active"><a class="nav-link" href="{{url('log')}}"><i class="fas fa-home"></i> <span>Activity</span></a></li>
            

          </ul>

        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design By <a>Muthia Zahra</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->

  <script src="assetss/modules/jquery.min.js"></script>
  <script src="assetss/modules/popper.js"></script>
  <script src="assetss/modules/tooltip.js"></script>
  <script src="assetss/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assetss/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assetss/modules/moment.min.js"></script>
  <script src="assetss/js/stisla.js"></script>
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.23/datatables.min.js"></script>

  

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="assetss/js/scripts.js"></script>
  <script src="assetss/js/custom.js"></script>


</body>

</html>
