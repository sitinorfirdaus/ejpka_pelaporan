<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

use Yajra\DataTables\DataTables;
use App\Models\Belanjawan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Mengurus;
use Carbon\Carbon;
use App\Models\Eksekutif;

class MengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $where = [
            'id' => $request->id // bawak row id
        ];

        $user = Auth::user();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();
        $master = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();
        $master_id = $master->id;
        $mengurus = Mengurus::select('id','master_id','melebihi_penjelasan','melebihi_tindakan','kurang_penjelasan','kurang_tindakan')
                            ->where('master_id',$master_id)
                            ->orderBy('id','desc')->take(1)->first();

        if ($request->ajax()) {

            $data = Mengurus::select('id', 'name')
            ->where('id', $where)
            ->get();

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
        return view('mengurus.index',compact('master','user_jabatan','mengurus'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // paparkan form untuk create pengguna

    public function store(Request $request)
    {


        $user = Auth::user();


        $master = Eksekutif::orderBy('id','desc')->take(1)->first();

        Mengurus::updateOrCreate(
           ['id' => $request->id], //akan dapat row id from previous
            [
              'master_id' =>$master->id,//akan dapat row id drp table master
              'tarikh' =>$request->tarikh,
               'melebihi_penjelasan'=>$request->melebihi_penjelasan,
               'melebihi_tindakan'=>$request->melebihi_tindakan,
               'kurang_penjelasan'=>$request->melebihi_penjelasan,
               'kurang_tindakan'=>$request->kurang_tindakan,
               'user_id' => $user->id // insert user id from session
            ]
        );

       return response()->json(['success' => 'Save success']);
    }



    public function store_2(Request $request)
    {


        $user = Auth::user();


        $master = Eksekutif::orderBy('id','desc')->take(1)->first();

        Mengurus::updateOrCreate(
           ['id' => $request->id], //akan dapat row id from previous
            [
              'master_id' =>$master->id,//akan dapat row id drp table master
              'tarikh' =>$request->tarikh,
               'melebihi_penjelasan'=>$request->melebihi_penjelasan,
               'melebihi_tindakan'=>$request->melebihi_tindakan,
               'kurang_penjelasan'=>$request->melebihi_penjelasan,
               'kurang_tindakan'=>$request->kurang_tindakan,
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
    public function show1($id)
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

        $bel = Mengurus::where($where)->first();

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
    public function update(Request $request)
    {
        $where = [
            'id' => $request->id // bawak row id
        ];

        $bel = Mengurus::where($where)->update(['melebihi_penjelasan'=>'Updated title'])->first();

        // dd($bel);

        return response()->json($bel);


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


    public function form(Request $request) {

        $where = [
            'id' => $request->id // bawak row id
        ];


        if ($request->ajax()) {

            $data = Mengurus::select('id', 'name')
            ->where('id', $where)
            ->get();

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
        return view('mengurus/tab_jumlahkeseluruhan');


    }

    public function store2(Request $request)
    {
        // $IDpermohonan = '888';
       //return redirect('mengurus/index/show?id='.$IDpermohonan);
       //return redirect()->back() ->with('alert', 'Updated!');
       return view('mengurus/tab1');
    }

    public function show(Request $request,$id)
    {
      // $value=Session::get('data');
        // $nokp = $value['nokp'];

        // $bhgn = DB::table('kodbhgn')->get()->pluck('Bhgn', 'KodBhgn')->prepend('Sila Pilih', '');

        // $array =[
        // 'negarakod' => DB::table('kodnegara')->get()->pluck('NamaNegara', 'KodNegara')->prepend('Sila Pilih', ''),
        // 'negara' => DB::table('kodnegara')->get(),
        // 'kadid'=>$value['nokp'],
        // 'namaid'=>$value['nama'],
        // 'jawatanid'=>$value['jawatan'],
        // 'emailid'=>$value['email'],
        // 'telid'=>$value['ext_tel'],
        // 'gredid'=>$value['gred'],
        // 'skimid'=>$value['skim'],
        // ];
        return view('mengurus/tab1');

    }

    public function tab2(Request $request)
    {
        $where = [
            'id' => $request->id // bawak row id
        ];

        $user = Auth::user();
        $user_jabatan = User::select('id','jabatan')->orderBy('id','desc')->take(1)->first();
        $master = Eksekutif::select('id','sukuan','tahun')->orderBy('id','desc')->take(1)->first();
        $master_id = $master->id;
        $mengurus = Mengurus::select('id','master_id','melebihi_penjelasan','melebihi_tindakan','kurang_penjelasan','kurang_tindakan')
                            ->where('master_id',$master_id)
                            ->orderBy('id','desc')->take(1)->first();

        if ($request->ajax()) {

            $data = Mengurus::select('id', 'name')
            ->where('id', $where)
            ->get();

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
        return view('mengurus/tab2',compact('master','user_jabatan','mengurus'));




    }

}
