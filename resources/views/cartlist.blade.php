
<?php 
use App\Http\Controllers\ProductController;
use Illuminate\Support\Str;

$total =0;
if(Session::has('user'))
{
  $total = ProductController::cartSum();
  
}

?>


@extends('master')
@section('content')

<link href="{{URL::to('src/css/shoppingcart.css')}}" rel="stylesheet">



<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Price</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <a href="detail/{{$item->id}}">
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img src="{{$item->gallery}}" class="img-sm"></div>
                                        <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">{{$item->name}}</a>
                                            <p class="text-muted small">{{$item->description}}</p>
                                        </figcaption>
                                    </figure>
                                </td>
                            </a>
                                <td> <div class="price-wrap"> <var class="price">1</var>  </div>
                                <td>
                                    <div class="price-wrap"> <var class="price">{{$item->price}} ₺</var>  </div>
                                </td>
                                <td class="text-right d-none d-md-block">  <a href="/removecart/{{$item->cart_id}}" class="btn btn-light" data-abc="true"> Remove</a> </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-3">
           
            <div class="card">
                <div class="card-body">
                    <dl class="dlist-align">
                        <dt>Total price:</dt>
                        <dd class="text-right ml-3">{{$total}} ₺</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right text-danger ml-3">0₺</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right text-dark b ml-3"><strong>{{$total}} ₺</strong></dd>
                    </dl>
                    @if($total>0 && Session::has('user'))
                    <hr> <a href="{{url('/checkout')}}" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> Make Purchase </a> 
                    <a href="/" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                    @else
                    <a href="/" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continue Shopping</a>
                    @endif
                </div>
            </div>
        </aside>
    </div>
</div>

@endsection