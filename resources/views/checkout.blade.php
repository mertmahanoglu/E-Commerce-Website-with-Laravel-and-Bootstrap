@extends('master')
@section('content')


<link href="{{URL::to('src/css/checkout.css')}}" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<meta charset="UTF-8">



@if($total>0 && Session::has('user'))
<div class="card">
    <div class="card-top border-bottom text-center"> <a href="#"> Back to shop</a> <span id="logo">BBBootstrap.com</span> </div>
    <div class="card-body">
        <div class="row upper"> <span><i class="fa fa-check-circle-o"></i> Shopping bag</span> <span><i class="fa fa-check-circle-o"></i> Order details</span> <span id="payment"><span id="three">3</span>Payment</span> </div>
        <div class="row">
            <div class="col-md-7">
                <div class="left border">
                    <div class="row"> <span class="header">Payment</span>
                        <div class="icons"> <img src="https://img.icons8.com/color/48/000000/visa.png" /> <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" /> <img src="https://img.icons8.com/color/48/000000/maestro.png" /> </div>
                    </div>



                    <form action="/orderplace" method="POST">
                     
                        @csrf
                        <span>Cardholder's name:</span> <input placeholder="Linda Williams" required>
                        
                        <span>Adres</span> <input  name="adress" placeholder="" required> 
                        <span>Card Number:</span> <input name="card_number" placeholder="0125 6780 4567 9909" required>
                        

                        <div class="row">
                            <div class="col-4"><span>Expiry date:</span> <input placeholder="YY/MM" required> </div>
                            <div class="col-4"><span>CVV:</span> <input id="cvv" required> </div>
                        </div> 
                    
                        <a href={{url('/ordernow')}}><button type="submit" class="btn">Sipariş ver</button></a>
                </div>
            </div>
            <div class="col-md-5">
                <div class="right border">
                    <div class="header">Order Summary</div>
                 

                    @foreach ($products as $item)
                    <a href="detail/{{$item->id}}">
                    <div class="row item">
                        <div class="col-4 align-self-center"><img class="img-fluid" src="{{$item->gallery}}"></div>
                        <div class="col-8">
                            <div class="row"><b>{{$item->price}}₺</b></div>
                            <div class="row text-muted">{{$item->name}}</div>
                           
                        </div>
                    </div>
                  </a>
                  @endforeach
                    <hr>
                    <div class="row lower">
                        <div class="col text-left">Subtotal</div>
                        <div class="col text-right">{{$total}}</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left">Delivery</div>
                        <div class="col text-right">Free</div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><b>Total to pay</b></div>
                        <div class="col text-right"><b>{{$total}}₺</b></div>
                    </div>
                    <div class="row lower">
                        <div class="col text-left"><a href="#"><u>Add promo code</u></a></div>
                    </div>
                  
                    <p class="text-muted text-center">Complimentary Shipping & Returns</p>
                
                </div>
            </form>
            </div>
        </div>
    </div>
    <div> </div>
</div>
@elseif(Session::has('user')!=true)
<p class="text-muted text-center">Lütfen Giriş Yapın!</p>
@else
<p class="text-muted text-center">Lütfen Sepete Ürün Ekleyin!</p>
@endif


@endsection