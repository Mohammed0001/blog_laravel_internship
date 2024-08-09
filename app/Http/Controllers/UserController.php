<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return User::get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
        User::create($request->validated());
        return ["message" => "User created successfully"];

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        return $user;
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
        $user->update($request->validated());
        return $user;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return ["message" => "User deleted successfully"];
    }
}
