<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
	public static $rules = [
		'title' => 'string|min:5|max:255|required',
		'url' => 'string|max:255|url|active_url|required_without:content',
		'content' => 'string|min:5|required_without:url'
	];

	protected $table = 'posts';

	protected $fillable = [
		'title',
		'url',
		'content'
	];

	protected $dates = [
		'created_at',
		'updated_at'/*,
		'deleted_at'*/
	];

	public function getFillable()
	{
		return $this->fillable;
	}

	public function getTimeAgo($date)
	{
		return preg_replace(['~^1 day ago~', '~^1\b~'], ['yesterday', 'a'], $this[$date]->diffForHumans());
	}

	public function getRandomPlaceholder()
	{
		$placeholders = ['Guy', 'Girl', 'Fungus', 'Algae', 'Bacterium', 'Protozoa', 'Person', 'Dragon', 'Woof', 'Mew', 'Fuzz', 'Potato', 'Filename', 'Person', 'Random', '[deleted]', 'Meme', 'Insect', 'Placeholder', 'Table', 'Object', 'Floof', 'Username', 'NULL', 'NPC', 'String', 'Function', 'Boop', 'Error: Placeholder not silly enough'];

		return 'someRandom' . $placeholders[array_rand($placeholders)];
	}
}