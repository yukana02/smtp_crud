

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="images/nobg-alexanet.png" type="image/icon type">
  <title> @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
 <!-- Vendor CSS Files -->
 <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
 <link href="{{asset('vendor/boxicons/css/boxicons.min.css' ) }}" rel="stylesheet">
 <link href="{{asset('vendor/quill/quill.snow.css' ) }}" rel="stylesheet">
 <link href="{{asset('vendor/quill/quill.bubble.css' ) }}" rel="stylesheet">
 <link href="{{asset('vendor/remixicon/remixicon.css' ) }}" rel="stylesheet">
 <link href="{{asset('vendor/simple-datatables/style.css' ) }}" rel="stylesheet">
 <link href="{{asset('css/style.css' ) }}" rel="stylesheet">
 <link href="{{asset('css/mystyle.css' ) }}" rel="stylesheet">
 {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="dashboard.php" class="logo d-flex align-items-center">
            <img src="" alt="">
            <span class="d-none d-lg-block" class="justify">###</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <span class="d-none d-lg-block">###</span>

        <!-- Tambahkan link ke profil -->
        <a href="{{route('profile.edit')}}" class="profile-link " style="text-align: center; position: fixed; right:50px;">
          <i class="bi bi-person-circle" style="font-size: 1.5rem; top:0px;"></i> 
          <span class=" d-none d-lg-block"><div>{{ Auth::user()->name }}</div></span>
        </a>
        <!-- Akhir dari link ke profil -->
    </div><!-- End Logo -->
</header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route ('dashboard')}}">
                <i class="bi bi-grid"></i><span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pendapatan.php">
                <i class="bi bi-journal-text"></i><span>###</span>
            </a>
        </li><!-- End Pendapatan Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="hasil.php">
                <i class="bi bi-gem"></i><span>###</span>
            </a>
        </li><!-- End Prediksi Nav -->

        <li class="nav-item" style="position: fixed; bottom:60px;">
            <a class="nav-link collapsed"  href="logout.php">
                <i class="bi bi-gem"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Logout Page Nav -->
    </ul>
</aside>


  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
                         
              @yield('content')
            </div>  
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  {{-- <div class="col-xxl-4 col-xl-12  align-items-center justify-content-center">
    <div class="chat-icon">
      <a href="{{ route('buatpost') }}">Post</a>
    </div>  --}}
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer card d-flex" style="bottom: 0px; margin-bottom:0;">
    <div class="copyright">
     Copyright <strong><span>YUDA J.P.</span></strong>
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  </footer><!-- End Footer -->
 
   <!-- Vendor JS Files -->
<script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
  $(document).ready(function() {
    // Menangani klik pada tombol toggle-sidebar-btn
    $('.toggle-sidebar-btn').click(function() {
      // Toggle kelas 'sidebar-open' pada elemen dengan ID 'sidebar'
      $('#sidebar').toggleClass('sidebar-open');
    });
  });
</script>

</body>
</html>