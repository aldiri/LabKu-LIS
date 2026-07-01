<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>LABKU LIS</title>

    <link rel="icon"
          href="{{ asset('favicon.ico') }}">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- AdminLTE -->

    <link rel="stylesheet"
          href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <!-- LabKu Theme -->

    <link rel="stylesheet"
          href="{{ asset('css/labku.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    {{-- =========================
            TOPBAR
    ========================== --}}

    @include('layouts.topbar')



    {{-- =========================
            SIDEBAR
    ========================== --}}

    @include('layouts.sidebar')



    {{-- =========================
            CONTENT
    ========================== --}}

    <div class="content-wrapper">

        <section class="content-header">

            <div class="container-fluid">

                @yield('header')

            </div>

        </section>

        <section class="content">

            <div class="container-fluid">

                @yield('content')

            </div>

        </section>

    </div>



    {{-- =========================
            FOOTER
    ========================== --}}

    @include('layouts.footer')

</div>



<!-- JQuery -->

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->

<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->

<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>



<script>

setInterval(function(){

    let now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleTimeString();

},1000);

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@stack('scripts')

</body>

</html>