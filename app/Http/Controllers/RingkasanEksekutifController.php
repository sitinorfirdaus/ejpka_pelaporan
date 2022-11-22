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

class RingkasanEksekutifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Ringkasan_Eksekutif::latest()->get();

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
        return view('ringkasanEksekutif/ringkasaneksekutif');
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

        $master = Eksekutif::orderBy('id','desc')->take(1)->first();

        Ringkasan_Eksekutif::updateOrCreate(
           ['id' => $request->id], //akan dapat row id from previous
            [
              'master_id' =>$master->id,
               'input1'=>$request->input1,
               'input2'=>$request->input2,
               'output1'=>$request->output1,
               'input3'=>$request->input3,
               'input4'=>$request->input4,
               'output2'=>$request->output2,
               'user_id' => $user->id // insert user id from session
            ]
        );

       return response()->json(['success' => 'Save success']);
       // return response()->json(array('success' => true, 'last_insert_id' => $master->id), 200);
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

    public function form(Request $request)
    {
      //  return view(('ringkasanEksekutif/ringkasaneksekutif').'#tab3')->with('message','sucessfull');
       // return view('ringkasanEksekutif/ringkasaneksekutif');
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

        $bel = Belanjawan::where($where)->first();

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
        $post = Belanjawan::where('id', $request->id)->delete();
        return response()->json([
            'success' => 'Post deleted successfully.'
        ]);
    }
}
