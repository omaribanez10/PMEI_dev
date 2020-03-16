<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ asset('/css/app.css') }}">
    <!--ICONOS -->
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	
    <!--<script type="text/javascript" src="{{ asset('js/equipos.js') }}" ></script>-->
    <script type="text/javascript" src="{{ asset('js/ajax.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('/js/app.js') }}" defer></script>
	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.validate.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('/js/additional-methods.min.js') }}" defer></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/dba24207e3.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <title>@yield('title', "PMEI")</title>
</head>

<body>
    <div id="app" class="d-flex flex-column h-screen">
        <header>
            @include('partials.nav')
        </header>

        <main class="py-4">
            @yield('content')
			@yield('scripts')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y') }}
        </footer>
    </div>
    @include('sweetalert::alert')
</body>

</html>
