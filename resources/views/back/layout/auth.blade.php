<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title> @yield('pageTitle') | Smart Waste</title>
    <link rel="icon" href="{{asset('images/smartwaste_logo.png')}}" />
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
</head>

<body class="d-flex flex-column" style="position: relative; min-height: 100vh; overflow: hidden;">
    
    <!-- Blurred background layer -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ asset('images/login_bg.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        filter: blur(8px);
        z-index: -1;
    "></div>

    <div class="page page-center" style="position: relative; z-index: 1;">
        @yield('content')
    </div>

</body>

</html>
