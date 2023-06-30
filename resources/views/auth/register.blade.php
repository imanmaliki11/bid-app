<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="{{asset('scss/custom.css')}}" rel="stylesheet"> <!-- This can only change on scss file, only for global change -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
        @yield('css')
        <title>{{isset($title) ? $title : "BID APP"}}</title>
    </head>
    <body>
        <div class="container">
            <h2 class="login-title">Create Account</h2>
        
            <form class="login-form" action="{{route('register.post')}}" method="POST">
                @csrf
                <div>
                    <label for="name">Name </label>
                    <input
                           id="name"
                           type="text"
                           placeholder="Your Name"
                           name="name"
                           required
                           minlength="3"
                           maxlength="30"
                           value="{{old('name')}}"
                           />
                    <div class="small text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </div>
                </div>
                <div>
                    <label for="email">Email </label>
                    <input
                        id="email"
                        type="email"
                        placeholder="me@example.com"
                        name="email"
                        required
                        value="{{old('email')}}"
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
                        minlength="8"
                        maxlength="20"
                        />
                    <div class="small text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="password_confirmation">Confirm password </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        placeholder="Confirm password"
                        name="password_confirmation"
                        required
                        minlength="8"
                        maxlength="20"
                        />
                    <div class="small text-danger">
                        @error('password_confirmation')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            
                <button class="btn btn--form" type="submit" value="Create">
                    Create
                </button>
            </form>

            <div class="text-center mt-2">
                <a href="{{route('login')}}">Already have an account</a>
            </div>
        </div>

        {{-- Javascript  --}}
        <script src="{{asset('bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{asset('js/script.js')}}"></script>
        @yield('js')
    </body>
</html>