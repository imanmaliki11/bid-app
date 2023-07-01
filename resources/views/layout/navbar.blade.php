<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">B<i class="fas fa-gavel"></i>dU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav me-auto mb-2 mb-lg-0 flex-grow-1 justify-content-center">
            <form class="d-flex py-2">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary search" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        @if (Auth::user())
            <div class="text-truncate">
              <i class="far fa-user-circle"></i>
                <span class="fw-bold">{{Auth::user()->name}}</span>
            </div>
        @else
            <a href="{{route('login')}}"><button class="rounded-pill small px-3 py-1">Login</button></a>
        @endif
      </div>
    </div>
  </nav>