<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Http\Requests\NewpostCreatRequest;
use App\Newpost;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $newposts = Newpost::all();

        return view('admin.newPosts.index' ,compact('newposts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::pluck('name' , 'id');
        return view('admin.newPosts.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NewpostCreatRequest $request)
    {
       $input = $request->all();
       $user = Auth::user();
       $file = $request->file('photo_id');
       if($file){
           $name = time() . $file ->getClientOriginalName();
           $file -> move('NewpostsImg' , $name);
           $photo = Photo::create(['file' => $name]);
           $input['photo_id'] = $photo -> id;
       }
       $user -> posts()->create($input);

       return redirect('/admin/newposts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Newpost::findOrFail($id);
        $categories = Category::pluck('name' , 'id');
        return view('admin.Newposts.edit' , compact('post' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $file = $request -> file('photo_id');
        if($file){
            $name = time().$file->getClientOriginalName();

            $file -> move('NewpostsImg' , $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo -> id ;
        }

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return  redirect('/admin/newposts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Newpost::findOrFail($id);
        unlink(public_path(), $post->photo->file);
        $post -> delete();
        return redirect('admin/newposts');
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $comments =  $post->comments()->whereIsActive(1)->get() ;
        return view('post' , compact('post','comments'));
    }
}
