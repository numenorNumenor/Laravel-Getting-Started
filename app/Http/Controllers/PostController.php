<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->paginate(5);

      return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::pluck('name','id');

      return view('posts.create')->withTags($tags);
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
          'body'  => 'required'
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'Post was successfully created !');

        return redirect()->route('posts.show', $post->id);
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

      return view('posts.show')->withPost($post);
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

      $tags = Tag::pluck('name','id');

      return view('posts.edit')->withPost($post)->withTags($tags);
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
        'body'  => 'required'
      ]);

      $post = Post::find($id);

      $post->title = $request->input('title');
      $post->body = $request->input('body');

      $post->save();

      if (isset($request->tags)) {
        $post->tags()->sync($request->tags);
      }
      else {
        $post->tags()->sync(array());
      }

      Session::flash('success', 'Post was successfully updated !');

      return redirect()->route('posts.show', $post->id);
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
      
      $post->tags()->detach();

      $post->delete();

      Session::flash('success', 'You did it ! Post was deleted !');

      return redirect()->route('posts.index');
    }
}
