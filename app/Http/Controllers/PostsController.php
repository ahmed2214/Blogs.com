<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostsController extends Controller
{
    //
    public function index(){
        // $allPost=[
        //    ['id'=>1,'Title'=>'HTML','PostedBy'=>'Ahmed','Descrption'=>'This is Descrtion','CreatedAt'=>'2024-6-18  01:40:00'],
        //    ['id'=>2,'Title'=>'CSS','PostedBy'=>'Omar','Descrption'=>'This is Descrtion','CreatedAt'=>'2024-6-19  05:40:00'],
        //    ['id'=>3,'Title'=>'JavaScrept','PostedBy'=>'Mohamed','Descrption'=>'This is Descrtion','CreatedAt'=>'2024-6-20  14:40:00'],
        // ];
        $PostsFromDB =Post::all();
        
        // dd($DBallPosts );
        return view('posts.index',['Posts'=> $PostsFromDB]);
    }
    public function show(Post $post){ //Route model binding
        // $singlePost=['id'=>1,'Title'=>'HTML','PostedBy'=>'Ahmed','Descrption'=>'This is Descrtion','CreatedAt'=>'2024-6-18  01:40:00']; 
        // $singlePostFromDB = Post::find($postId);
        return view('posts.show',['Post'=> $post]);
    }
    public function create(){
        $UsersFromDB =User::all();
        return view('posts.create',['users'=>$UsersFromDB]);
    }

    public function store(Request $request){
        $request->validate([
            'PostTitle' => ['required', 'min:3'],
            'descrption' => ['required', 'min:10'],
            'postCreator'=> ['required', 'exists:users,id'],
        ]);

        $PostTitle = request()->input('PostTitle');
        $descrption= request()-> input('descrption') ;
        $postCreator= request()-> input('postCreator') ;
        // $data= request()-> all() ;
        // dd( $PostTitle ,$descrption ,$postCreator);
        Post::create([
            'title'=>$PostTitle,
            'descrption'=>$descrption,
            'user_id'=>$postCreator,
        ]);
        return to_route('posts.index');
         

    }
    public function edit(Post $post){
        $UsersFromDB =User::all();
        return view('posts.edit',['users'=>$UsersFromDB,'post'=>$post]);
    }
    public function update(Request $request ,$postid){
        $request->validate([
            'PostTitle' => ['required', 'min:3'],
            'descrption' => ['required', 'min:10'],
            'postCreator'=> ['required', 'exists:users,id'],
        ]);
        $PostTitle = request()->input('PostTitle');
        $descrption= request()-> input('descrption') ;
        $postCreator= request()-> input('postCreator') ;
        
        $singlePostFromDB = Post::find($postid);
        $singlePostFromDB ->update([
                      'title'=>$PostTitle ,
                      'descrption'=>$descrption,
                      'user_id'=> $postCreator,
        ]);
       
        return to_route('posts.show',$postid);
    }
    public function destroy($postid){
        $singlePostFromDB = Post::find($postid);
        $singlePostFromDB ->delete();
        return to_route('posts.index');
    }
}

 