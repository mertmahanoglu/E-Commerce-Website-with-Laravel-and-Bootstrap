
@extends('master')
@section('content')

<link href="{{URL::to('src/css/shoppingcart.css')}}" rel="stylesheet">
<link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css'>

<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>




<div class="container-fluid">
    <div class="row justify-content-center">
        <aside class="col-lg-9">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" width="120">Product</th>
                                <th scope="col" width="120">Name</th>
                                <th scope="col" width="120">Description</th>
                                <th scope="col" width="120">Quantity</th>
                                <th scope="col" width="120">Image Link</th>
                                <th scope="col" width="120">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <a href="detail/{{$item->id}}">
                                <form action="/updateproduct/{{$item->id}}" method="POST">
                                    @csrf
                            <tr>
                                <td>
                                        <div class="aside"><img src="{{$item->gallery}}" class="img-sm"></div>
                                    </td>
                                    <td>
                                        <figcaption class="info"> <input type="text" class="price" value="{{$item->name}}" name="name" style="width:100px;"></a></figcaption>
                                    </td> 
                                    <td>
                                        <figcaption class="info">   <textarea class="price"  name="description" style="resize:none;">{{$item->description}}</textarea></figcaption>                           
                                    </td>
                            </a>
                            <td>
                                <div class="price-wrap">  <input type="text" class="price" value="{{$item->quantity}}" name="quantity" style="width:40px;"> </div>
                            </td>

                                    <td>
                                        <div class="price-wrap">   <textarea class="price"  name="gallery" style="resize:none;">{{$item->gallery}}</textarea> </div>
                                    </td>
                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->price}}" name="price" style="width:50px;"></div>
                                </td>
                                <td> 
                                   <input type="submit" value="Update" class="btn  btn-primary">
                                </td>
                                <td class="text-right d-none d-md-block">  <a href="/removeProduct/{{$item->id}}" class="btn btn-light" data-abc="true"> Remove</a> </td>
                            </tr>
                        </form>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>


        <div class="container">
           
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 pb-5">
                            <!--Form with header-->
        
                            <form action="/productmanagement" method="POST">
                                @csrf
                                <div class="card border-primary rounded-0">
                                    <div class="card-header p-0">
                                        <div class="bg-info text-white text-center py-2">
                                            <h3><i class="fa fa-envelope"></i> Ürün Ekle</h3>
                                           
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
        
                                        <!--Body-->
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="urunAd" name="name" placeholder="Ürün Adı:" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="urunDesc" name="description" placeholder="Ürün Açıklaması:" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="urunCount" name="quantity" placeholder="Ürün Miktarı:" required>
                                            </div>
                                        </div>
        
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="price" name="price" placeholder="Ürün Fiyatı:" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                                </div>
                                                <input type="text" class="form-control" id="foto" name="gallery" placeholder="Ürün Fotoğraf Linki:" required>
                                            </div>
                                        </div>
        
                                        <div class="text-center">
                                            <input type="submit" value="Ekle" class="btn btn-info btn-block rounded-0 py-2">
                                        </div>
                                    </div>
        
                                </div>
                            </form>
                            <!--Form with header-->
        
        
                        </div>
            </div>
        </div>
     
   
    </div>
</div>


<script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'></script>
@endsection