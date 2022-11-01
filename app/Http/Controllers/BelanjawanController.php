<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Agensi;
use Yajra\DataTables\DataTables;
use App\Models\Belanjawan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BelanjawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Belanjawan::latest()->get();
            // dd(json_encode($data));
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
        return view('senaraibelanjawan');
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
        dd($request);
        Belanjawan::updateOrCreate(
           ['id' => $request->id], //akan dapat row id from previous. not request->id
            [
              // 'nama_agensi' => $request->agensi,
               'input1'=>$request->input1,
               'input2'=>$request->input2,
               'output1'=>$request->output1,
               'input3'=>$request->input3,
               'input4'=>$request->input4,
               'output2'=>$request->output2,
               'output3'=>$request->output3,
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
