<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use \Illuminate\Support\Facades\Hash;

class api_controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return "This is the create method";
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        if ($users->save()) {
            return response()->json([
                'status' => true,
                'message' => 'User created successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to create user'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        if ($users) {
            return response()->json([
                'status' => true,
                'message' => 'User found',
                'data' => $users
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $users = User::find($id);

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        if ($users->save()) {
            return response()->json([
                'status' => true,
                'message' => 'User updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update user'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $users = User::find($id);
        if ($users) {
            $users->delete();
            return response()->json([
                'status' => true,
                'message' => 'User deleted successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to delete user'
            ]);
        }
    }
}
