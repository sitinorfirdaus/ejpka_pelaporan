<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeBlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SenaraiPenggunaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();
        return view('senaraipengguna')->with('pengguna', $pengguna);
        // return view('senaraipengguna');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = User::all();
        return view('senaraipengguna')->with('pengguna', $pengguna);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:posts'
        // ]);

        // $input = $request->all();
        // User::create($input);

        $validatedData = $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'email' => 'required|email|unique:users'
        ],
        [
            'name.required' => 'Name field is required.',
            'password.required' => 'password is required',
            'jabatan.required' => 'Jabatan field is required.',
            'email.required' => 'email field is required.'
        ]);



        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        // return back()->with('success', 'user created successfully');
        return redirect()->route('senaraipengguna.index')->with('success', 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
