<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public static $rules = [
        'title' => 'string|max:255|required',
        'url' => 'string|max:255|url|active_url|required_without:content',
        'content' => 'string|required_without:url'
    ];

    protected $table = 'posts';

    protected $dates = [
        'created_at',
        'updated_at'/*,
        'deleted_at'*/
    ];

    public function getTimeAgo($date)
    {
        return preg_replace(['~^1 day ago~', '~^1\b~'], ['yesterday', 'a'], $this[$date]->diffForHumans());
    }

    public function getRandomPlaceholder()
    {
        $placeholders = ['Guy', 'Girl', 'Fungus', 'Algae', 'Bacterium', 'Protozoa', 'Person', 'Dragon', 'Woof', 'Mew', 'Fuzz', 'Potato', 'Filename', 'Person', 'Random', '[deleted]', 'Meme', 'Insect', 'Placeholder', 'Table', 'Object', 'Floof', 'Username', 'NULL', 'Error', 'NPC', 'String', 'Function', 'Boop', 'Error: Placeholder not silly enough'];

        return 'someRandom' . $placeholders[array_rand($placeholders)];
    }
}
