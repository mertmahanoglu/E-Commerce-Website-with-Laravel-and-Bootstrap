@extends('master')
@section('content')

<link href="{{URL::to('src/css/productlist.css')}}" rel="stylesheet">




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<div class="container">
    <h3 class="h3">Ürün Listesi </h3>
    <div class="row">
        @foreach ($products as $item)
        
        <div class="col-md-3 col-sm-6">
            <br/>
            <div class="product-grid">
                <div class="product-image">
                    <a href="detail/{{$item->id}}">
                        <img class="pic-1" src="{{$item->gallery}}" style="width:250px; height:300px;">
                    </a>
               
                    <br/>
                    
                
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                
                <div class="product-content">
                    <h3 class="title"><a href="detail/{{$item->id}}">{{$item->name}}</a></h3>
                    <div class="price">{{$item->price}}₺ </div>

                   
                    <form action="/add_to_cart" method="POST">
                        <div class="action">
                            @csrf
                            <input type="hidden" name="product_id" value={{$item->id}}>
                            @if($item->quantity>0)
                            <button type='submit' class="add-to-cart btn btn-default" type="button">Add to Cart</button>
                            @else
                            <button type='submit' class="add-to-cart btn btn-default" type="button" disabled="disabled">Stokta Yok</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @endforeach
        
      
       
    </div>
    
</div>

<hr>



@endsection

