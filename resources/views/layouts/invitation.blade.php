<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<x-head></x-head>

	</head>
<body>

    <div >


        <main class="py-4" style="padding: 80px;">
            @yield('content')
        </main>
    </div>
</body>
</html>
