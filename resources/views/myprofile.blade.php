@extends('master')
@section('content')

<link href="{{URL::to('src/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >

    
    <!-- Custom styles for this template -->
    <link href="{{URL::to('src/css/myprofile.css')}}" rel="stylesheet">

    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                   
    
                    <div class="media align-items-end profile-head">
                        <div class="media-body mb-5 text-white">
                            
                            <h4 class="mt-0 mb-0">{{$users->name}}</h4>
                            <br/>
                        </div>
                    </div>
                </div>
              
                <form action="/updateinfo/{{$users->id}}" method="POST">
                    @csrf
                <div class="px-4 py-3">
                    <h5 class="mb-0">Username</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <input type="text" class="price" value="{{$users->name}}" name="name">
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-0">Email</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <input type="text" class="price" value="{{$users->email}}" name="email">
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-0">Password</h5>
                    <div class="p-4 rounded shadow-sm bg-light" style="word-wrap: break-word;">
                        <p class="font-italic mb-0">{{$users->password}}</p>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <h5 class="mb-0">Oluşturulma Zamanı</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <input type="text" class="price" value="{{$users->created_at}}" name="create">
                    </div>
                </div>
               
                
                <div class="px-4 py-3">
                    <h5 class="mb-0">Güncelleme Zamanı</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <input type="text" class="price" value="{{$users->updated_at}}" name="update">
                    </div>
                </div>

                <div ><a href="/getpass" class="btn btn-outline-dark btn-sm btn-block" >Şifre Değiştir</a></div>
                <input type="submit" value="Bilgilerimi Kaydet" class="btn btn-outline-dark btn-sm btn-block">



             
            </form>


            

            <form action="/freezeaccount/{{$users->id}}" method="POST">
                @csrf
                <input type="submit" value="Hesabımı Dondur" class="btn btn-outline-dark btn-sm btn-block">
            </form>
            </div>
        </div>
    </div>
   
@endsection