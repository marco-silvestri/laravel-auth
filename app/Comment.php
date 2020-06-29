<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'title',
        'body'
    ];

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
