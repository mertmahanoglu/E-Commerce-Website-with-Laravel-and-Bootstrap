@extends('master')
@section('content')


<link href="{{URL::to('src/css/detail.css')}}" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    
                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{$product['gallery']}}" /></div>
                    </div>
                   
                    
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product['name']}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">{{$product['description']}}</p>
                    <h4 class="price">current price: <span>{{$product['price']}}₺</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                   
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>

                    <form action="/add_to_cart" method="POST">
                        <div class="action">
                            @csrf
                            <input type="hidden" name="product_id" value={{$product['id']}}>
                            @if($product->quantity>0)
                            <button type='submit' class="add-to-cart btn btn-default" type="button">add to cart</button>
                            @else
                            <button type='submit' class="add-to-cart btn btn-default" type="button" disabled="disabled">Stokta Yok</button>
                            @endif
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>



@endsection