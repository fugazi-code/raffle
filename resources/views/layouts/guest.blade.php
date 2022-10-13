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


    @include('layouts.partials.footer')
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
</footer>