<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type='image/x-icon'>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
    <title>Zoonosis</title>
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- TOAST CSS and JS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
</head>


<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand">
            <a href="/">
                <img class="c-sidebar-brand-full mt-1 mb-1" src="{{ url('/img/logo_gamea2.png') }}" width="120">
            </a>
        </div>

        @include('layouts.navigation')

    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">

        @include('layouts.includes.header')
        <div class="body flex-grow-1 px-3">
            <div class="container-lg">
                <div class="mb-4">@yield('content')</div>
            </div>
        </div>
        @include('layouts.includes.footer')
    </div>

    <script src="js/bundle.min.js"></script>
</body>

<script type="text/javascript">
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>

</html>
