<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json(['user' => $user]);
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image_url' => 'required|string|max:255',
        ]);

        $user = new User($validated_data);
        $user->save();

        return response()->json(['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $validated_data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image_url' => 'required|string|max:255',
        ]);

        $user = User::find($id);
        $user->update($validated_data);

        return response()->json(['user' => $user]);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(['user' => null]);
    }
}
