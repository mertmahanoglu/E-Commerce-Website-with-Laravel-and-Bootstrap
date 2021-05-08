
@extends('master')
@section('content')

<link href="{{URL::to('src/css/shoppingcart.css')}}" rel="stylesheet">



<div class="container-fluid">
    <div class="row justify-content-center">
        <aside class="col-lg-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" width="200">ID</th>
                                <th scope="col" width="200">Name</th>
                                <th scope="col" width="200">Email</th>
                                <th scope="col" width="200">Password</th>
                                <th scope="col" width="200">Freeze</th>
                                <th scope="col" width="200">Address</th>
                                <th scope="col" width="200">Created At</th>
                                <th scope="col" width="200">Updated At</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                            <a href="{{$item->id}}">
                            <form action="/updateinfo/{{$item->id}}" method="POST">
                                @csrf
                      
                           
                            <tr>
                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->id}}" name="id" style="width:20px;"> </div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->name}}" name="name"> </div>
                                </td>

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->email}}" name="email"> </div>
                                </td>

                                <td>
                                    <div class="price-wrap" style="max-width: 150px"> {{$item->password}}</var> </div>
                                </td>

                                <td>
                                    <div class="price-wrap" > <input type="text" class="price" value="{{$item->freeze}}" name="freeze" style="max-width: 50px"> </div>
                                </td>

                            </a>

                            <td>
                                <div class="price-wrap"> <textarea class="price"  name="address" style="resize:none;">{{$item->address}}</textarea></div>
                            </td>


                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->created_at}}" name="create"></div>
                                </td>

                              

                                <td>
                                    <div class="price-wrap"> <input type="text" class="price" value="{{$item->updated_at}}" name="update"> </div>
                                </td>

                                

                                <td>
                                    <input type="submit" value="Update" class="btn btn-info btn-block rounded-0 py-2">
                                </td>
                                <td class="text-right d-none d-md-block">  <a href="/removeUser/{{$item->id}}" class="btn btn-light" data-abc="true"> Remove</a> </td>

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