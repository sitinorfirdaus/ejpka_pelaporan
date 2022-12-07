<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Agensi;
use Yajra\DataTables\DataTables;
use App\Models\Belanjawan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Eksekutif;

class EksekutifController extends Controller
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
        // return $master;
        if ($request->ajax()) {
            $data = Eksekutif::first()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Kemaskini</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Padam</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('ringkasanEksekutif.index',compact('master','user_jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


        Eksekutif::updateOrCreate(
           ['id' => $request->id], //akan dapat row id from previous
            [

               'sukuan'=>$request->sukuan,
               'tahun'=>$request->tahun,
               'tarikh'=>$request->tarikh,
               'user_id' => $user->id // insert user id from session
            ]
        );

        return response()->json(['success' => 'Save success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $user = Auth::user();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();
        $master = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();

       return view('ringkasanEksekutif.index',compact('master','user_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {



        $where = [
            'id' => $request->id // bawak row id
        ];

        $bel = Eksekutif::where($where)->first();

        // dd($bel);

        return response()->json($bel);
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
    public function destroy(Request $request)
    {
        $post = Eksekutif::where('id', $request->id)->delete();
        return response()->json([
            'success' => 'Post deleted successfully.'
        ]);
    }
}
