<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;    
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product',['products'=>$data]);
    }

    function productList()
    {
        $data = Product::all();
        return view('productlist',['products'=>$data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }

    function add_to_cart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart = new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect('/cartlist');
        }
        else
        {
            return redirect('/login');
        }
    
    }

    static function cartItem()
    {
        if(Session::has('user'))
        {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    else{
        return "Lütfen giriş yapın!";
    }
    }

    static function cartSum()
    {
        if(Session::has('user'))
        {
            $userId = Session::get('user')['id'];
            $total =  $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
    
            return $total;

        }
        else{
            return "Lütfen giriş yapın!";
        }
    
    }


    function cartlist()
    {
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
     
            return view('cartlist',['products'=>$products]);
        }
        else{
            return "Lütfen giriş yapın!";
        }
     
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $total =  $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
     
            return view('ordernow',['total'=>$total]);
        }

        else{
            return "Lütfen giriş yapın!";
        }
     

    }

    function productManagement(){

        if(Session::has('user') && Str::contains(Session::get('user')['name'],'Admin')){
       $products = DB::table('products')
       ->select('products.*')
       ->get();

       return view('productmanagement',['products'=>$products]);
    }

    else{
    
        return "Buraya erişim sağlayamazsınız!";
    }

    }

    function removeProduct($id){

        if(Session::has('user') && Str::contains(Session::get('user')['name'],'Admin')){
        Product::destroy($id);
        return redirect('productmanagement');
    }

    else{
        return "Buraya erişim sağlayamazsınız!";
       }
    }


    function ordersManagement(){
        
        if(Session::has('user') && Str::contains(Session::get('user')['name'],'Admin')){
        $orders = DB::table('orders')
        ->select('orders.*')
        ->get();
 
        return view('ordersmanagement',['orders'=>$orders]);
    }

    else{
        return "Buraya erişim sağlayamazsınız!";
    }
        
 
     }



    function checkout(){
        if(Session::has('user')){
            $userId = Session::get('user')['id'];

            $total =  $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
     
            $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
     
            return view('checkout',['total'=>$total,'products'=>$products]);
        }
        else{
            return "Lütfen giriş yapın!";
        }
       
    }




    function confirmOrder(){
        if(Session::has('user'))
        {
            $userId = Session::get('user')['id'];

        
            $total =  $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->sum('products.price');
           
            $products = DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
            Cart::where('user_id',$userId)->delete();
            
            return view('ordernow',['total'=>$total,'products'=>$products]);
        }
        else{
            return "Lütfen giriş yapın!";
        }
       
    }


    function orderPlace(Request $req)
    {
        if(Session::has('user'))
        {
            $userId = Session::get('user')['id']; 
            $allCart=Cart::where('user_id',$userId)->get();
            foreach($allCart as $cart)
            {
                $order = new Order;
                $order->product_id=$cart['product_id'];
                $order->user_id=$cart['user_id'];
                $order->status="pending";
                $order->card_number=$req->card_number;
                $order->payment_status="pending";
                $order->adress=$req->adress;
                $order->save();
               
            }
    
            return redirect("ordernow");
        }
        else{
            return "Lütfen giriş yapın!";
        }
      
      
            
    }

    function getOrders(){

        if(Session::has('user')){
            $userId = Session::get('user')['id'];
            $orders =  DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->get();
     
            return view('orders',['orders'=>$orders]);
        }
        else{
            return "Lütfen giriş yapın!";
        }
      
 
    }


    



    function addProduct(Request $req){

            
        $product = new Product;
            $product->name=$req->name;
            $product->quantity=$req->quantity;
            $product->description=$req->description;
            $product->price=$req->price;
            $product->gallery=$req->gallery;
            $product->save();
            return redirect("/productmanagement");
        
       

            }


            function updateOrder($id,Request $req){
   
                DB::table('orders')
                ->where('id', $id)
                ->update(array('product_id' =>$req->product_id,'user_id'=>$req->user_id,'status'=>$req->status,'card_number'=>$req->card_number,'payment_status'=>$req->payment_status,'adress'=>$req->adress));
             
                return redirect("ordersmanagement");
             }

             function updateProduct($id,Request $req){
   
                DB::table('products')
                ->where('id', $id)
                ->update(array('name' =>$req->name,'description'=>$req->description,'quantity'=>$req->quantity,'price'=>$req->price,'gallery'=>$req->gallery));
             
                return redirect("productmanagement");
             }



             function removeOrder($id){
                Order::destroy($id);
             
                return redirect('ordersmanagement');
            }

           
        

}
