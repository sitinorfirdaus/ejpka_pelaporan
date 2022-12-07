@extends('layouts.mainlayout2')

@section('content')
<style>
    body {
        background-image: linear-gradient(19deg, #f4f6f6 0%, #2a51ff 100%);
    ccc;
        background-repeat: no-repeat;
        font: 400 16px/1.5em "Open Sans", sans-serif;
    }
    .page-content {
        max-width: 700px;
        margin: 32px auto;
        padding: 32px;
        background: #fff;
    }
    a {
        color: #21D4FD;
        transition: all 0.3s;
    }
    a:hover {
        color: #B721FF;
    }

    .tabbed {
        overflow-x: hidden; /* so we could easily hide the radio inputs */
        margin: 32px 0;
        padding-bottom: 16px;
        border-bottom: 1px solid #ccc;
    }

    .tabbed [type="radio"] {
        /* hiding the inputs */
        display: none;
    }

    .tabs {
        display: flex;
        align-items: stretch;
        list-style: none;
        padding: 0;
        border-bottom: 1px solid #ccc;
    }
    .tab > label {
        display: block;
        margin-bottom: -1px;
        padding: 12px 15px;
        border: 1px solid #ccc;
        background: #eee;
        color: #666;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s;
    }
    .tab:hover label {
        border-top-color: #333;
        color: #333;
    }

    .tab-content {
        display: none;
        color: #777;
    }

    /* As we cannot replace the numbers with variables or calls to element properties, the number of this selector parts is our tab count limit */
    .tabbed [type="radio"]:nth-of-type(1):checked ~ .tabs .tab:nth-of-type(1) label,
    .tabbed [type="radio"]:nth-of-type(2):checked ~ .tabs .tab:nth-of-type(2) label,
    .tabbed [type="radio"]:nth-of-type(3):checked ~ .tabs .tab:nth-of-type(3) label,
    .tabbed [type="radio"]:nth-of-type(4):checked ~ .tabs .tab:nth-of-type(4) label,
    .tabbed [type="radio"]:nth-of-type(5):checked ~ .tabs .tab:nth-of-type(5) label {
        border-bottom-color: #fff;
        border-top-color: #B721FF;
        background: #fff;
        color: #222;
    }

    .tabbed [type="radio"]:nth-of-type(1):checked ~ .tab-content:nth-of-type(1),
    .tabbed [type="radio"]:nth-of-type(2):checked ~ .tab-content:nth-of-type(2),
    .tabbed [type="radio"]:nth-of-type(3):checked ~ .tab-content:nth-of-type(3),
    .tabbed [type="radio"]:nth-of-type(4):checked ~ .tab-content:nth-of-type(4) {
        display: block;
    }
    </style>

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Laporan Lampiran B / Kekerapan Mesyuarat</span></h4>
        </div>
    </div>

</div>
<!-- breadcrumb -->


<div class="row row-sm">
	<div class="col-xl-14">
		<div class="card">
			<div class="card-body"><h2>KEMASKINI RINGKASAN EKSEKUTIF</h2>
                <form id="addUserForm#" name="addUserForm#" method="GET" enctype="multipart/form-data" action="">
                    <input type="hidden" name="id" id="id">  <!--pull row id data -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Kementerian/Jabatan </label>
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" data-parsley-class-handler="#fnWrapper" name="jabatan"
                                    id="jabatan" value="{{ $user_jabatan->jabatan }}" disabled />
                            </div>

                            <div class="col-md-2">
                                <label class="form-label">No Rujukan </label>
                            </div>
                            <div class="col-md-2">
                                <input class="form-control" data-parsley-class-handler="#fnWrapper" name="input1"
                                    id="input1" value="" disabled />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Laporan Suku Tahun </label>
                            </div>
                            <div class="col-md-3">
                                <select name="sukuan" id="sukuan" class="form-control">
                                    <option value="">{{ $master2->sukuan }}</option>
                                    <option value="1">Suku Pertama</option>
                                    <option value="2">Suku Kedua</option>
                                    <option value="3">Suku Ketiga</option>
                                    <option value="4">Suku Keempat</option>
                                   </select>


                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Tahun</label>
                            </div>
                            <div class="col-md-2">
                                <select name="tahun" id="tahun" class="form-control">{{$master2->tahun}}
                                    @for ($year=date('Y')-1; $year<=date('Y'); $year++)
                                        <option>{{ $year }}</option>
                                       @endfor
                                    </select>
                            </div>
                        </div>
                    </div>
            </div>
                     </form>
			</div>
		</div>
	</div>
</div>
<!--end row header-->

<form id="add-frm" method="POST" action="{{ url('update-ringkasan/'.$RE->id) }}" class="border p-3 mt-2">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">3.1 Pengurusan Belanjawan: <span class="tx-danger">*</span></label>
            </div>
            <div class="col-md-3">
               <textarea class="form-control" row="5" col="10" data-parsley-class-handler="#fnWrapper"  name="pengurusan_belanjawan" id="pengurusan_belanjawan" >{{$RE->pengurusan_belanjawan}}</textarea>
            </div>
            <div class="col-md-3">
               <label class="form-label">3.3 Pengurusan Perolehan:<span class="tx-danger">*</span></label>
           </div>
               <div class="col-md-3">
                  <textarea class="form-control" row="5" col="10" data-parsley-class-handler="#fnWrapper"  name="pengurusan_perolehan" id="pengurusan_perolehan">{{$RE->pengurusan_perolehan}}</textarea>
               </div>
        </div>
    </div>


    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">3.2 Pengurusan Perakaunan:<span class="tx-danger">*</span></label>
            </div>
                <div class="col-md-3">
                   <textarea class="form-control" row="5" col="10"  data-parsley-class-handler="#fnWrapper"  name="pengurusan_perakaunan" id="pengurusan_perakaunan" >{{$RE->pengurusan_perakaunan}}</textarea>
                </div>
                <div class="col-md-3">
                   <label class="form-label">3.4 Pengurusan Aset dan Stor:<span class="tx-danger">*</span></label>
               </div>
                   <div class="col-md-3">
                      <textarea class="form-control" row="5" col="10" data-parsley-class-handler="#fnWrapper"  name="pengurusan_aset_stor" id="pengurusan_aset_stor">{{$RE->pengurusan_aset_stor}}</textarea>
                   </div>
            </div>
    </div>



    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">3.2.1 Perakaunan Kewangan:<span class="tx-danger">*</span></label>
            </div>
                <div class="col-md-3">
                   <textarea class="form-control" row="5" col="10"  data-parsley-class-handler="#fnWrapper"  name="perakaunan_kewangan" id="perakaunan_kewangan">{{$RE->perakaunan_kewangan}}</textarea>
                </div>
            </div>
    </div>

    <div class="form-group ">
        <div class="row">
            <div class="col-md-3">
                <label class="form-label">3.2.2 Perakaunan Pengurusan:<span class="tx-danger">*</span></label>
            </div>
                <div class="col-md-3">
                   <textarea class="form-control" row="5" col="10" id="perakaunan_pengurusan"name="perakaunan_pengurusan" class="form-control">{{$RE->perakaunan_pengurusan}}</textarea>
                </div>
            </div>
    </div>







    <div class="control-group col-6 text-left mt-2"><button class="btn btn-primary">Kemaskini</button></div>
    <div class="control-group col-6 text-left mt-2"><a class="btn btn-danger" onclick="return myFunction();" href="{{url('delete-ringkasan/'.$RE->id)}}">Padam</a></div>
</form>
@endsection
