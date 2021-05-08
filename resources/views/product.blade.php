@extends('master')
@section('content')

<link href="{{URL::to('src/css/best.css')}}" rel="stylesheet">
<link href="{{URL::to('src/css/carousel.css')}}" rel="stylesheet">




<div class="container custom-product">
      <div class="container-fluid" id="carousel">
        <div class="row">
            <div class="col-md-12">
                <div class="carousel slide" id="carousel-554496">
                    <ol class="carousel-indicators">
                        <li data-slide-to="0" data-target="#carousel-554496"  class="active"> </li>
                        <li data-slide-to="1" data-target="#carousel-554496"> </li>
                        <li data-slide-to="2" data-target="#carousel-554496"> </li>
                        <li data-slide-to="3" data-target="#carousel-554496"> </li>

                    </ol>
                    <div class="carousel-inner">
                      @foreach ($products as $item)
                      @if($item['id']<=5)
                      <a href="detail/{{$item['id']}}">
                        <div class="carousel-item {{$item['id']==1?'active':''}}"> <img class="d-block w-100" alt="Carousel Bootstrap First" src="{{$item['gallery']}}" width="250" height="450" />
                         
                          <div class="carousel-caption">
                                <h4> {{$item['name']}} </h4>
                                <p> {{$item['description']}} </p>
                            </div>
                          </a>
                        </div>
                        @endif
                       @endforeach
                     
                    </div> <a class="carousel-control-prev" href="#carousel-554496" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-554496" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
                </div>
            </div>
        </div>
    </div>



    <div class="row" id="bestRow">
      <div class="col-md-12">
        <h2>Trending <b>Products</b></h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
      
        
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              @foreach ($products as $item)
              <div class="col-sm-3">
                <div class="thumb-wrapper">
                  <div class="img-box">
                    @if($item['id']<=5)
                    <a href="detail/{{$item['id']}}">
                    <img src="{{$item['gallery']}}" class="img-fluid" alt="">
                  </div>
                  <div class="thumb-content">
                    <h4>{{$item['name']}}</h4>
                    <p class="item-price"> <span>{{$item['price']}}₺</span></p>
                    <div class="star-rating">
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                      </ul>
                    </div>

                    <form action="/add_to_cart" method="POST">
                      <div class="action">
                          @csrf
                          <input type="hidden" name="product_id" value={{$item->id}}>
                          @if($item->quantity>0)
                          <button type='submit' class="add-to-cart btn btn-default" type="button">add to cart</button>
                          @else
                          <button type='submit' class="add-to-cart btn btn-default" type="button" disabled="disabled">Stokta Yok</button>
                          @endif
                        
                      </div>
                  </form>
                   
                  </div>						
                </div>
              
              </div>
              @endif

              @endforeach
            							
           
            </div>
          </div>
       
      </div>
    </div>


</div>
@endsection

