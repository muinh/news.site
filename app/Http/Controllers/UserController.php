<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function showComments(User $user)
    {
        $comments = $user->comments()->paginate(5);
        return view('users.comments', compact(['user', 'comments']));
    }
}
