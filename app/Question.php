<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'hashtag',
        'slug'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(){
        return $this->belongsTo("App\User");
    }

    public function hashtags(){
        return $this->belongsToMany("App\Hashtag");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    function isMine(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function addComment($content)
    {
        $this->comments()->create([
            'content' => $content,
            'question_id' => $this->id
        ]);
    }
}
