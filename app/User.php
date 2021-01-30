<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'nick', 'age', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hasManyQuestions(){
        return $this->hasMany(Question::class);

    }

    public function adminQuestions()
    {
        switch ($this->role) {
            case "admin":
                $questions = Question::latest()->paginate(10);
                break;
            case "user":
                $questions = Question::where('user_id', Auth::id())->paginate(10);
                break;
        }
        return $questions;
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
