@extends('master')
@section('content')

<link href="{{URL::to('src/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{{URL::to('src/css/signin.css')}}" rel="stylesheet">


   
<main class="form-signin">
  <form action="/updatepassword" method="POST">
    @csrf
    <img class="mb-4" src="{{URL::to('src/css/bootstrap-solid.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Şifre Değiştir</h1>

    <label for="inputEmail" class="visually-hidden">Eski şifre</label>
    <input type="password" id="inputEmail" class="form-control" placeholder="Email address"  autofocus name="oldpassword">
    <label for="inputPassword" class="visually-hidden">Yeni Şifre</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="newpassword">
  
    <button class="w-100 btn btn-lg btn-primary" type="submit">Değiştir</button>
 

    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017–2021</p>
  </form>
</main>
@endsection