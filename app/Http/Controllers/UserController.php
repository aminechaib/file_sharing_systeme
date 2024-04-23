<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Retrieve all users except the currently authenticated user
        $users = User::where('id', '!=', auth()->id())->get();

        return view('users.index', compact('users'));
    }
}
