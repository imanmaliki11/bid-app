<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="{{asset('scss/custom.css')}}" rel="stylesheet"> <!-- This can only change on scss file, only for global change -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        @yield('css')
        <title>{{isset($title) ? $title : "BID APP"}}</title>
    </head>
    <body>
        <h3>Login</h3>
        <form action="{{route('login.post')}}" method="POST">
            @csrf
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="password" placeholder="password">
            <button type="submit">Login</button>
        </form>
        {{-- Javascript  --}}
        <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        @yield('js')
    </body>
</html>