<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function updateToken($token)
    {
        if (Auth::user()) {
            $user = User::where('id', Auth::user()->id)->first();
            $user->device_key = $token;
            $user->save();

            return response()->json([
                'message' => 'Device Key Updated'
            ], 200);
        } else {
            return response()->json([
                'message' => 402
            ], 200);
        }
    }

    public function updateStatus($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->status == null || $user->status == "inactive") {
            $user->status = 'active';
            $user->save();
        } else {
            $user->status = "inactive";
            $user->save();
        }
        return redirect()->back()->with('success', 'Status Updated!');
    }

    public function removeUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back()->with('success', 'User Deleted!');
    }
}
