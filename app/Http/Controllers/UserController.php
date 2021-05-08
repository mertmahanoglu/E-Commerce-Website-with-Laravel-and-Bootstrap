<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use Session;    


class UserController extends Controller
{
    function login(Request $request)
    {
        $user = User::where(['email'=>$request->email])->first();

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return 'Username or password is wrong';
        }
        else if($user->freeze=="true"){
            return 'Hesabınız Donmuş';
        }
        else{
            $request->session()->put('user',$user);
            return redirect('/');
        }

    }

    function freezeUp(Request $request)
    {
        $user = User::where(['email'=>$request->email])->first();

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return 'Username or password is wrong';
        }
        else{
            DB::table('users')
            ->where('email', $user->email)
            ->update(array('freeze'=>"false"));
            
            return redirect('/login');
        }

    }

    function register(Request $req){

            
            $user = new User;
            if(Str::contains($req->email,'admin')){
                return "Admin olamazsınız";
            }
            else{
                $user->name=$req->username;
                $user->email=$req->email;
                $user->password=Hash::make($req->password);
                $user->save();
                return redirect("/login");
            }
           

    }


    function userManagement(){
        if(Session::has('user') && Str::contains(Session::get('user')['name'],'Admin')){
            $users = DB::table('users')
            ->select('users.*')
            ->get();
     
            return view('usermanagement',['users'=>$users]);
        }
        else{
        return "Buraya erişim sağlayamazsınız!";
    }
       
 
     }


     function updateInfo($id,Request $req){

      $url = url()->previous();

      DB::table('users')
      ->where('id', $id)
      ->update(array('name' =>$req->name,'email'=>$req->email,'address'=>$req->address,'freeze'=>"false",'created_at'=>$req->create,'updated_at'=>$req->update));

      if($url=="http://localhost:8000/myprofile")
        {
              return redirect("myprofile");
        }
        else{
            return redirect("usermanagement");
        }
       

     }


     function removeUser($id){
        User::destroy($id);
     
        return redirect('usermanagement');
    }



     function myProfile(){
        
            $userId = Session::get('user')['id'];
            $user = DB::table('users')->where('id', $userId)->first();
            return view('myprofile',['users'=>$user]);
     }

     function updatePassword(Request $req){
   

        $userId = Session::get('user')['id'];
        $userPass =  DB::table('users')->where('id', $userId)->pluck('password');
   
        
        if(password_verify($req->oldpassword, $userPass[0])){
           
            DB::table('users')
            ->where('id', $userId)
            ->update(array('password' =>Hash::make($req->newpassword)));
            return redirect('/');
         
        }
        else{
            return redirect('/myprofile');
        }
       

   
     }



     function freezeAccount($id){
   
        DB::table('users')
        ->where('id', $id)
        ->update(array('freeze' =>"true"));
     
        Session::forget('user');
        return redirect('/');;
     }

  

    
}
