<?php 
use App\Http\Controllers\ProductController;
use Illuminate\Support\Str;

$total =0;
if(Session::has('user'))
{
  $total = ProductController::cartItem();
  $userEmail = Session::get('user')['email'];
}



?>



<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">Hepsibuarada</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Anasayfa <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/productlist">Products</a>
        </li>
        
        
      </ul>
      <form class="form-inline my-2 my-lg-0">

        <ul class="navbar-nav mr-auto">

        
              @if(Session::has('user') && (Str::contains($userEmail,'admin')==false))
              <li class="nav-item">
                <a class="nav-link" href="/cartlist"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    Shopping Cart ({{$total}})</a>
              </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
               {{Session::get('user')['name']}}</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/orders">Siparişlerim</a>
              <a class="dropdown-item" href="/myprofile">Bilgilerim</a>
              <a class="dropdown-item" href="/logout">Çıkış Yap</a>
              
            </div>
          </li>


          @elseif(Session::has('user') && (Str::contains($userEmail,'admin')==true))
          <li class="nav-item">
            <a class="nav-link" href="/cartlist"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Shopping Cart ({{$total}})</a>
          </li>
    <li class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
           {{Session::get('user')['name']}}</a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="/myprofile">Bilgilerim</a>
          <a class="dropdown-item" href="/productmanagement">Ürün Yönetimi</a>
          <a class="dropdown-item" href="/usermanagement">Kullanıcı Yönetimi</a>
          <a class="dropdown-item" href="/ordersmanagement">Sipariş Yönetimi</a>
          <a class="dropdown-item" href="/logout">Çıkış Yap</a>
          
        </div>
      </li>



          @else
          <li class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle" aria-hidden="true"></i>
               Giriş Yap veya Üye Ol</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{url('/register')}}">Kayıt Ol</a>
              <a class="dropdown-item" href="{{url('/login')}}">Giriş Yap</a>
              
            </div>
          </li>
          @endif
        </ul>
      </form>
    </div>
  </nav>