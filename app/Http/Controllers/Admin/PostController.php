<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::all();
        return view('admin.post.index')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required |max:200',
            'tags' => 'required |max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $file = $request->file('img');
        $folder = "upload/".date('Y');
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move($folder, $filename); 
        $post = new Post();
        $post->title        = $request->title;
        $post->description  = $request->description ;
        $post->content      = $request->content;
        $post->tags         = $request->tags;
        $post->user         = \Auth::user()->id;
        $post->slug         = str_slug($request->title.time()); 
        $post->img          = $folder.'/'.$filename;
        $post->save();
        \Session::flash('alert','<b>Well done</b><br> add new post successfully ..!');
        return redirect()->route('admin.post.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $post = Post::find($id);
        return view('admin.post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required |max:200',
            'tags' => 'required |max:255',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post =  Post::find($id);
        $file = $request->file('img');
        if (!empty($file)) {
             $folder = "upload/".date('Y');
             $filename = time().'.'.$file->getClientOriginalExtension();
             $file->move($folder, $filename);
             $img = $folder.'/'.$filename;
         }else{
            $img = $post->img;
         }
        
        $post->title        = $request->title;
        $post->description  = $request->description ;
        $post->content      = $request->content;
        $post->tags         = $request->tags;
        $post->user         = \Auth::user()->id;
        $post->slug         = str_slug($request->title.time()); 
        $post->img          = $img;
        $post->save();
        \Session::flash('alert','<b>Well done</b><br> add new post successfully ..!');
        return redirect()->route('admin.post.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
