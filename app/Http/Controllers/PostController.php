<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{


    public function index(){
        // $posts = auth()->user()->posts;
       $posts = Post::all();

        
        return view('admin.posts.index', ['posts'=> $posts]);
    }


    public function show($id){

        // dd($id);

        $post = Post::findOrFail($id);

        // return $post;
        return view('layouts.blog-post',['post'=> $post]);
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(Request $request){

            $validated = request()->validate([  
                'title'=> 'required|min:8|max:255',
                'post-image'=>'file',
                'body'=> 'required',
            ]);

          if($request->post_image){
            $validated['post_image'] = request('post_image')->store('images');
          } 
    
          auth()->user()->posts()->create($validated);
          $request->session()->flash('post-created-message','Post was created!');
          
          return redirect('/admin/posts');
    }


    public function edit($id){

      
        $post = Post::findOrFail($id);
        $this -> authorize('view', $post);
        return view('/admin/posts/edit',['post'=> $post]);
    }

    public function update(Request $request, $id){

        $post = Post::findOrFail($id);

        $validated = request()->validate([  
            'title'=> 'required|min:8|max:255',
            'post-image'=>'file',
            'body'=> 'required',
        ]);

        // $post = new Post();
        // $post->title = request('title');
        // $post->post_image = request('post_image');
        // $post->body = request('body');
        
        if($request->post_image){
            $validated['post_image'] = request('post_image')->store('images');
            $post->post_image = $validated['post_image'];
        
        } 

        $post->title = $validated['title'];
        $post->body = $validated['body'];


        //Authorization
        $this -> authorize('update', $post);

        auth()->user()->posts()->save($post);

        $request->session()->flash('post-updated-message','Post was updated!');
        return redirect('/admin/posts');
    }

    public function destroy($id,Request $request){

        // if(Auth::user()->id === $id){

        //     $post = Auth::findOrFail($id);
        //     $post->delete();
            
        // }
        
        $post =  Post::findOrFail($id);
        $this -> authorize('delete', $post);
        $post->delete();
        
        // Session::flash('message','Post was deleted');
        $request->session()->flash('post-deleted-message','Post was deleted!');

        return back();
    }
  
}
