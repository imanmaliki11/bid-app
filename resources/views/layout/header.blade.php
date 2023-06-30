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
    @yield('css')
    <title>{{isset($title) ? $title : "BID APP"}}</title>
  </head>
  <body>