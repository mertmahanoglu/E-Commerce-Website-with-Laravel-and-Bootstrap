
@extends('master')
@section('content')

<link href="{{URL::to('src/css/shoppingcart.css')}}" rel="stylesheet">



<div class="container-fluid">
    <div class="row justify-content-center">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                            
                                <th scope="col" width="120">Price</th>
                                <th scope="col" width="120">Delivery Status</th>
                                <th scope="col" width="120">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
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
                  
                                <td>
                                    <div class="price-wrap"> <var class="price">{{$item->price}} TL</var> </div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <var class="price">{{$item->payment_status}}</var>  </div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <var class="price">{{$item->adress}}</var>  </div>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        
    </div>
</div>

@endsection