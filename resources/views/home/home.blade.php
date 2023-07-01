@extends('layout.main')

@section('content')
    <a href="{{route('add.product')}}" class="d-flex align-items-center justify-content-center bg-primary" style="position: fixed; bottom: 1rem; 
    right: .75rem; width: 3rem; height: 3rem; 
    border-radius: 3rem; cursor: pointer; color: aliceblue !important">
        <i class="fas fa-plus"></i>
    </a>

    <div class="container mt-4">
        <h3>Lates Products</h3>
        <div class="row g-3">
            @foreach ($lates as $l)
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="card">
                        <img style="height: min(45vh, 40vw); 
                        background-repeat: no-repeat;
                        background-position: center;
                        background-size: cover;
                        position: relative;" 
                        src="{{count(json_decode($l->images)) ? asset(json_decode($l->images)[0]) : ''}}" class="card-img-top" alt="">
                        <div class="card-body">
                        <h5 class="card-title">{{$l->name}}</h5>
                        <p class="card-text text-truncate">
                            {{$l->descriptions}}
                        </p>
                        <a href="#" class="btn btn-primary">BID</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection