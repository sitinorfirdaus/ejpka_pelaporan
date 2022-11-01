<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $pengguna = User::all();
        return view('senaraipengguna')->with('pengguna', $pengguna);
    }

    public function create(Request $request)
    {
        dd($request);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:email',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
            ]
        );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
