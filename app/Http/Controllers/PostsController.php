<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    protected function getLocalVars($vars)
    {
        $ignore = ['GLOBALS', '_SERVER', '_GET', '_POST', '_FILES', '_REQUEST', '_SESSION', '_ENV', '_COOKIE', 'php_errormsg', 'HTTP_RAW_POST_DATA', 'http_response_header', 'argc', 'argv'];

        foreach ($ignore as $name) {
            if (isset($vars[$name])) {
                unset($vars[$name]);
            }
        }

        return $vars;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // list all posts

        $posts = \App\Models\Post::all();

        return view('posts.index', $this->getLocalVars(get_defined_vars()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // view "new post" page (only if logged in)

        $action = action('PostsController@store');
        $method = 'POST';

        return view('posts.create', $this->getLocalVars(get_defined_vars()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save post to database

        $this->validate($request, Post::$rules);

        $post = new Post;

        $post->created_by = mt_rand(1, 9999);
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;

        $post->save();

        return redirect("posts/{$post->id}/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // view a particular post's page

        $post = \App\Models\Post::find($id);

        return view('posts.show', $this->getLocalVars(get_defined_vars()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // view "edit post" page (only if logged in as admin or user who created initially)

        $action = action('PostsController@update', $id);
        $method = 'PUT';
        $post = \App\Models\Post::find($id);

        return view('posts.edit', $this->getLocalVars(get_defined_vars()));
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
        // update post's entry in database
        $this->validate($request, Post::$rules)

        return 'update post';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete a post (only if logged in as admin or user who created post)
        return 'destroy post';
    }
}
