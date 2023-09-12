<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function store(CreateUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::create($request->all());
            $user->save();
        }
    }
}
