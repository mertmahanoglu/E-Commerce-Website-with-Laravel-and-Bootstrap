
@extends('master')
@section('content')

<link href="{{URL::to('src/css/shoppingcart.css')}}" rel="stylesheet">



<div class="container-fluid">
    <div class="row justify-content-center">
        <aside class="col-lg-11">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product ID</th>
                                <th scope="col" width="200">User ID</th>
                                <th scope="col" width="200">Card Number</th>
                                <th scope="col" width="200">Status</th>
                                <th scope="col" width="200">Delivery Status</th>
                                <th scope="col" width="200">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <a href="{{$item->id}}">
                                <form action="/updateorder/{{$item->id}}" method="POST">
                                    @csrf
                            <tr>
                              

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->product_id}}" name="product_id" style="width:20px;"></div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->user_id}}" name="user_id" style="width:20px;"> </div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->card_number}}" name="card_number"></div>
                                </td>

                            </a>
                               
                                <td>
                                    <div class="price-wrap">  <input type="text" class="price" value="{{$item->status}}" name="status"></div>
                                </td>

                                <td>
                                    <div class="price-wrap"><input type="text" class="price" value="{{$item->payment_status}}" name="payment_status">  </div>
                                </td>

                                <td>
                                    <div class="price-wrap"><textarea class="price"  name="address" style="resize:none;">{{$item->adress}}</textarea> </div>
                                </td>

                                <td>
                                    <input type="submit" value="Update" class="btn  btn-primary">
                                </td>
                                <td class="text-right d-none d-md-block">  <a href="/removeorder/{{$item->id}}" class="btn btn-light" data-abc="true"> Remove</a> </td>
                            </tr>
                        </form>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        
    </div>
</div>

@endsection