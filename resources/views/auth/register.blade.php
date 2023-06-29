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
        <h3>Register</h3>
        <form action="{{route('register.post')}}" method="POST">
            @csrf
            <div>
                <input value="{{old('name')}}" type="text" name="name" id="name" placeholder="Your name" required minlength="3" maxlength="30">
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div>
                <input value="{{old('email')}}" type="email" name="email" id="email" placeholder="name@domain.com" required>
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div>
                <input value="{{old('password')}}" type="password" name="password" id="password" placeholder="Password" required minlength="8" maxlength="20">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <div>
                <input value="{{old('password_confirmation')}}" type="password" name="password_confirmation" id="cpassword" placeholder="Confirm password" required minlength="8" maxlength="20">
                @error('password_confirmation')
                    {{$message}}
                @enderror
            </div>
            <button type="submit">Create</button>
        </form>
        {{-- Javascript  --}}
        <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('js/script.js')}}"></script>
        @yield('js')
    </body>
</html>