


@extends('master')
@section('content')


<link href="{{URL::to('src/css/order.css')}}" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


@if($total>0 && Session::has('user'))
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
              
                <div class="invoice p-5">
                  
                    <h5>Siparişiniz tamamlanmıştır!</h5> <span class="font-weight-bold d-block mt-4"> {{Session::get('user')['name']}}</span> <span>Siparişiniz 2 gün içerisinde kargoya verilecektir!</span>
                   
                    <div class="product border-bottom table-responsive">
                        @foreach ($products as $item)
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td width="20%"> <img src="{{$item->gallery}}" width="90"> </td>
                                    <td width="60%"> <span class="font-weight-bold">{{$item->name}}</span>
                                        
                                    </td>
                                    <td width="20%">
                                        <div class="text-right"> <span class="font-weight-bold">{{$item->price}}₺</span> </div>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-5">
                            <table class="table table-borderless">
                                <tbody class="totals">
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>{{$total}} ₺</span> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="text-left"> <span class="text-muted">Shipping Fee</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span>Free</span> </div>
                                        </td>
                                    </tr>
                                   
                                    
                                    <tr class="border-top border-bottom">
                                        <td>
                                            <div class="text-left"> <span class="font-weight-bold">Subtotal</span> </div>
                                        </td>
                                        <td>
                                            <div class="text-right"> <span class="font-weight-bold">{{$total}}₺</span> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <p class="font-weight-bold mb-0">Siparişiniz için teşekkürler!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@elseif(Session::has('user')!=true)
<p class="text-muted text-center">Lütfen Giriş Yapın!</p>
@else
<p class="text-muted text-center">Lütfen Sepete Ürün Ekleyin!</p>
@endif


@endsection