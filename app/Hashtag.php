<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function questions(){
        return $this->belongsToMany(Question::class);
    }
}
