<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::all();

        return view('usuarios.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();

        return view('usuarios.create', compact('users'));
    }
    public function show()
    {
        $users = User::all();

        return view('usuarios.create', compact('users'));
    }
}
