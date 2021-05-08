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
  <form action="/freeze" method="post">
    @csrf
    <img class="mb-4" src="{{URL::to('src/css/bootstrap-solid.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="email">
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
 

  <div class="checkbox mb-3 text-center">
   
       Hesabınız mı donmuş? Hesabımı Aç butonu ile hesabınızı geri getirin.
       <button class="w-100 btn btn-lg btn-success" type="submit">Hesabımı Aç</button>

    <p class="mt-5 mb-3 text-muted text-center">&copy; 2017–2021</p>
  </div>
</form>


</main>
@endsection