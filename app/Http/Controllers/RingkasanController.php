<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Agensi;
use Yajra\DataTables\DataTables;
use App\Models\Belanjawan;
use Illuminate\Support\Facades\Auth;
use App\Models\Ringkasan_Eksekutif;
use App\Models\Eksekutif;
use DB;
use App\Http\Requests\StoreRERequests;
use App\Models\User;

class RingkasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $user = Auth::user();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();

        $master = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();
        $users = Ringkasan_Eksekutif::all();
        $master_id = $master->id;
        $ringkasan = Ringkasan_Eksekutif::select('id','master_id','input1','input2','output1','input3','input4','output2')
                    ->where('master_id',$master_id)
                    ->orderBy('id','desc')->take(1)->first();

        return view('ringkasan.create',compact('users','master','user_jabatan','ringkasan'));

        //return view('ringkasanEksekutif/ringkasaneksekutif');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();
        $master = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();
        return view('ringkasan.create',compact('user_jabatan','master'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $master = Eksekutif::orderBy('id','desc')->take(1)->first();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();
        $master2 = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();
        $RE=Ringkasan_Eksekutif::create([
            'master_id' =>$master->id,
               'pengurusan_belanjawan'=>$request->pengurusan_belanjawan,
               'pengurusan_perakaunan'=>$request->pengurusan_perakaunan,
               'perakaunan_kewangan'=>$request->perakaunan_kewangan,
               'perakaunan_pengurusan'=>$request->perakaunan_pengurusan,
               'pengurusan_perolehan'=>$request->pengurusan_perolehan,
               'pengurusan_aset_stor'=>$request->pengurusan_aset_stor,
               'created_by' => $user->created_by // insert user id from session
        ]);


       return view('ringkasan.edit',compact('RE','user_jabatan','master2'))->with('status', 'Blog Post Form Data Has Been inserted');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


          //dptkan user yg nak edit dr db
          $ringkasan = Ringkasan_Eksekutif::find($id);
          //passs user kpd edit.blade.php
          return view('ringkasan.edit',compact('ringkasan'));
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
        $user = Auth::user();
        $RE = Ringkasan_Eksekutif::find($id);
        $RE->update([
            'pengurusan_belanjawan'=>$request->pengurusan_belanjawan,
            'pengurusan_perakaunan'=>$request->pengurusan_perakaunan,
            'perakaunan_kewangan'=>$request->perakaunan_kewangan,
            'perakaunan_pengurusan'=>$request->perakaunan_pengurusan,
            'pengurusan_perolehan'=>$request->pengurusan_perolehan,
            'pengurusan_aset_stor'=>$request->pengurusan_aset_stor,
            'created_by' => $user->created_by // insert user id from session
        ]);

        return view('ringkasan.edit',compact('RE'))->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from ringkasan_eksekutif where id = ?',[$id]);
       // echo "Record deleted successfully.<br/>";
       // echo '<a href = "/list">Click Here</a> to go back.';
       return view('ringkasan.create')->with('success', 'Product Deleted successfully');;

    }
}

