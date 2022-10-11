<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="/theme/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/theme/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/theme/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/theme/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="/theme/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/theme/assets/js/config.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('head')
</head>
<body>
<nav class="navbar navbar-example navbar-expand-lg mb-5 shadow-sm" style="background-color: #ddd35b !important;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo_1.svg') }}" class="img-fluid" style="height: 46px;">
        </a>
    </div>
</nav>
@yield('content')



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="/theme/assets/vendor/libs/jquery/jquery.js"></script>
<script src="/theme/assets/vendor/libs/popper/popper.js"></script>
<script src="/theme/assets/vendor/js/bootstrap.js"></script>
<script src="/theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="/theme/assets/vendor/js/menu.js"></script>
<!-- endbuild -->
<!-- Vendors JS -->
<script src="/theme/assets/vendor/libs/apex-charts/apexcharts.js"></script>
<!-- Main JS -->
<script src="/theme/assets/js/main.js"></script>
<!-- Page JS -->
<script src="/theme/assets/js/dashboards-analytics.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>

<br>
  <!-- Site footer -->
  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            
          <h1>About</h1>
            <p class="text-justify">A lottery application. Thank you.<br> Thank you <br> 감사합니다 </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Useful Links</h6>
            <ul class="footer-links">
              <li><a href="https://laravel.com/docs/9.x">Laravel</a></li>
              <li><a href="https://laravel.com/docs/9.x/valet">Laravel Valet</a></li>
              <li><a href="https://github.com/fzaninotto/Faker">Faker Factory Library</a></li>
              <li><a href="https://www.w3schools.com/php/">PHP</a></li>
            </ul>
          </div>
        
          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="https://github.com/throwexceptions">About Us</a></li>
              <li><a href="https://github.com/throwexceptions">Contact Us</a></li>
              <li><a href="https://github.com/throwexceptions/raffle/pulls">Contribute</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
         <a href="https://github.com/throwexceptions">ThrowExceptions</a>
            </p>
          </div>
        </div>
      </div>
</footer>