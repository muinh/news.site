<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function getCommentsNumber()
    {
        $users  = User::all();
        $comments = array();
        foreach ($users as $user) {
            $comments[$user->id] = $user->comments()->count();
        }
        arsort($comments);
        return $comments;
    }

    public static function topCommentators($quantity)
    {
        $comments = self::getCommentsNumber();
        $users = array();
        foreach($comments as $key => $value) {
            $users[] = User::find($key);
        }
        $users = array_slice($users,0, $quantity);
        return $users;
    }
}
