<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function edit()
    {
        // dd(Auth::user());
        return view('kemaskiniprofile')->with('user', auth()->user());
    }

    public function update(Request $request)
    {
        // dd($request->name);
        $user = Auth::user();

        // $user = User::findOrFail($id);
        // $user=Auth()->user();
        // dd($user);
        // $input = $request->all();
        // $user = Auth::user();

        // $request->validate([
        //     'name' => 'required|max:20',
        //     'emel' => 'required|max:20',
        //     // 'jabatan' => 'required|max:100',
        // ]);

        // $user = update($input);

        // $user->fill($request->post())->save();
        // $user->save();


        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->
        //     'jabatan' => $request->jabatan,
        // ]);
        $user->update($request->all());
        // $request->all()->save();

        session()->flash('success', 'user updated successfully');
        return redirect()->back();

        // return redirect()->back() ->with('success', 'Updated!');;
    }

    // public function update(Request $request, User $user)
    // {
    //     dd($user);
    //     $request->validate([
    //         'name' => 'required',
    //         'jabatan' => 'required',
    //     ]);

    //     $user->update($request->all());

    //     session()->flash('success', 'user updated successfully');
    //     return redirect()->back();

    //     // return redirect()->route('products.index')
    //     //                 ->with('success','Product updated successfully');
    // }
}
