<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;
use App\Traits\imageTrait;
//use imageTrait;
class PostController extends Controller
{
    use imageTrait;

    public function index()
    {
//        $posts =  Post::all();
        $posts = auth()->user()->posts()->paginate(5);
//        dd($posts);
        return view('admin.posts.index' , compact('posts'));
    }


    public function show($id){

        $post = Post::findOrFail($id);

        return view('blog-post' ,compact('post'));
    }

    public function create(Post $post){
        $this->authorize('create' , Post::class);

        return view('admin.posts.create');

    }



    public function store(ValidatePostRequest $req){

        $this->authorize('create' , Post::class);
        $inputs = $req->validated();

        if($inputs['post_image']) {
            $file_name = $this->saveImage($inputs['post_image'], 'images/posts');
            $inputs['post_image'] = $file_name;
//            dd($inputs);
            auth()->user()->posts()->create($inputs);

        }
        session()->flash('post-created-message' , 'the Post has been created');
        return redirect()->route('post.index');
    }

    public function update(ValidatePostRequest $req ){

        $inputs = $req->validated();

        if($req->post_image){
            $file_name = $this->saveImage($inputs['post_image'], 'images/posts');
            $inputs['post_image'] = $file_name;
        }
        $req -> title = $inputs['title'];
        $req -> body = $inputs['body'];

        $this->authorize('update' , $inputs);
                auth()->user()->posts()->update($inputs);


        session()->flash('post-update-message' ,'Pos has been updated');
        return redirect()->route('post.index');


    }



    public function edit($id){
        $post = Post::findOrFail($id);
//        $this->authorize('view' , $post);
//        if(auth()->user()->can('view' , $post)){
//
//        }

            return view('admin.posts.edit' , ['post' => $post]);

    }



    public function destroy(Post $post , Request $request){
        $this -> authorize('delete' , $post);

//        if(auth()->user()->id !== $post ->user_id);
        $post -> delete();
         $request->session()->flash('message' , 'Post has been deleted') ;

            return back();
    }

}
