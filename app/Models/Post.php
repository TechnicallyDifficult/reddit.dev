<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
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
}
