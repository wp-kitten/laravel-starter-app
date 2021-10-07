<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    {{--[ CSRF TOKEN ]--}}
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    @hasSection('title')
        @yield('title')
    @else
        <title>{{ config('app.name', 'Laravel Starter App') }}</title>
    @endif

    {{--[ FONTS ]--}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"/>

    {{--[ STYLES ]--}}
    <link href="{{ asset('vendor/fa/css/all.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('dist/styles.css') }}" rel="stylesheet"/>

    @yield('head-scripts')

    @auth()
        <script>
            window.AppLocale = {
                ajax: {
                    nonce_name: '_token',
                    nonce_value: "{{csrf_token()}}",
                },
            };
        </script>
    @endauth
</head>
<body>
    <?php do_action( 'app/before/content' ); ?>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <?php do_action( 'app/after/content' ); ?>

    {{--[ SCRIPTS ]--}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/fa/js/all.min.js') }}"></script>
    <script src="{{asset('dist/main.js')}}"></script>
    @yield('footer-scripts')
</body>
</html>
