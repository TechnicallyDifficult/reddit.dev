<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Models\Post;
use \App\Helpers\Flash;

class PostsController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// list all posts

		$posts = Post::paginate(10);

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

		foreach ($post->getFillable() as $column) {
			if (isset($request[$column])) {
				$post[$column] = $request[$column] ? $request[$column] : NULL;
			}
		}

		$post->save();

		Flash::push('messages', ['type' => 'success', 'message' => <<<HTML
			<p>Post successfully created!</p>
			<p class="submessage">If you couldn't already tell...</p>
HTML
		]);

		return redirect("posts/{$post->id}/");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		// view a particular post's page

		$post = Post::findOrFail($id);

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
		$post = Post::findOrFail($id);

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

		$this->validate($request, Post::$rules);

		$post = Post::findOrFail($id);

		foreach ($post->getFillable() as $column) {
			if (isset($request[$column]) and $request[$column]) {
				$this->updates[$column] = $post[$column] = $request[$column] ? $request[$column] : NULL;
			}
		}

		$post->save();

		return redirect("posts/$id/");
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