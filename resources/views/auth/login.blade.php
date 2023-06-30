<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="{{asset('scss/custom.css')}}" rel="stylesheet"> <!-- This can only change on scss file, only for global change -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        
        @yield('css')
        <title>{{isset($title) ? $title : "BID APP"}}</title>
    </head>
    <body>

        <div class="container">
            <h2 class="login-title">Log in</h2>
        
            <form class="login-form" action="{{route('login.post')}}" method="POST">
                @csrf
              <div>
                <label for="email">Email </label>
                <input
                       id="email"
                       type="email"
                       placeholder="me@example.com"
                       name="email"
                       required
                       />
                <div class="small text-danger">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
              </div>
        
              <div>
                <label for="password">Password </label>
                <input
                       id="password"
                       type="password"
                       placeholder="password"
                       name="password"
                       required
                       />
                <div class="small text-danger">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
              </div>
        
              <button class="btn btn--form" type="submit" value="Log in">
                Log in
              </button>
            </form>

            <div class="text-center mt-2">
                <a href="{{route('register')}}">Create an account</a>
            </div>
        </div>
        {{-- Javascript  --}}
        <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
        @yield('js')
    </body>
</html>