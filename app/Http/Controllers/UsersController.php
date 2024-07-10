<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    //
    public function index($user){
        
        $PostsFromDB =Post::Where('user_id', $user)->get();
 
        return view('users.index',['Posts'=> $PostsFromDB]);
    }
    public function login(){
       
        return view('users.login');
    }
    public function findUser(Request $request){
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'min:8'],
        ]);
        $email = request()->input('email');
        $password= request()-> input('password') ;
        // dd( $email ,$password );
        $findEmail = User::where('email' ,$email)->first();
        // dd($findPassword ,$findEmail);
        if ( $findEmail != null ) {
            if(!Hash::check($password,  $findEmail->password)){
                return back()->withErrors(['password' => 'Password is incorrect!'])->withInput();
        }
        $findId = $findEmail->id;
        $userName = $findEmail->name;
        $request->session()->put('user',  $userName );
        $request->session()->put('id',  $findId );

        return to_route('users.index', $findId);
        } else{
            return back()->withErrors(['email' => 'Email was not Found!'])->withInput();
        }
        
    
    }
    public function create(){
        
        return view('users.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:rfc,dns','unique:users,email'],
            'password' => ['required', 'min:8'],
        ]);

        $name = request()->input('name');
        $email = request()->input('email');
        $password= request()-> input('password') ;
        // $data= request()-> all() ;
        // dd( $PostTitle ,$descrption ,$postCreator);
        User::create([
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password)
        ]);
        
        return to_route('posts.index');
         

    }
    public function logout(){
       
       if(session()->has('user')){
        session()->pull('user');
       }
       if(session()->has('id')){
        session()->pull('id');
       }
      
       return view('users.logout');
    }
}
