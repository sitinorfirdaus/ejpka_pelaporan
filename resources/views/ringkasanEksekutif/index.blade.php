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
    {{-- <div class="d-flex my-xl-auto left-content">
		<div class="pe-1 mb-xl-0">
          <button onclick="goBack()" class="fas fa-arrow-circle-left">Kembali</button>
        </div>
	</div> --}}
    {{-- button trigger modal --}}
	<div class="d-flex my-xl-auto right-content">
		<div class="pe-1 mb-xl-0">
			<button id="createNewUser" class="modal-effect btn btn-success btn-with-icon btn-block" data-bs-effect="effect-scale" data-bs-target="#modaldemo8" data-bs-toggle="modal"><i class="icon ion-md-add-circle"></i> Tambah</button>
        </div>
	</div>
</div>
<!-- breadcrumb -->


{{-- <div class="tabbed">
    <input type="radio" id="tab1" name="css-tabs" checked>
    <input type="radio" id="tab2" name="css-tabs">
    <input type="radio" id="tab3" name="css-tabs">

    <ul class="tabs">
        <a  href=""> <li class="tab"><label for="tab1">Kekerapan Mesyuarat</label></li></a>
        <a  href=""> <li class="tab"><label for="tab2">Ringkasan Eksekutif</label></li></a>
        <a  href=""> <li class="tab"><label for="tab3">Test Ringkasan Eksekutif</label></li></a>
    </ul>

<div class="tab-content">--}}
<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-wrap data-table" id="example1">
                        {{-- <table class="table table-bordered data-table"> --}}
						<thead>
							<tr>
								<th class="wd-5p border-bottom-0">Bil</th>
								<th class="wd-10p border-bottom-0">Laporan Suku Tahun</th>
                                <th class="wd-10p border-bottom-0">Tarikh Mesyuarat</th>
                                <th class="wd-10p border-bottom-0">Tindakan</th>
							</tr>
						</thead>
						<tbody>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal effects -->
<div class="modal fade" id="modaldemo8">
    <form id="addUserForm" name="addUserForm" method="POST" enctype="multipart/form-data">


       <input type="hidden" name="id" id="id">  <!--pull row id data -->

        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">

                {{-- modal header --}}
                <div class="modal-header">
                    <h6 class="modal-title" id="modalHeading"></h6>
                    <button aria-label="Close" class="close" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>

                {{-- modal body --}}
                <div class="modal-body">
                    {{-- <div id="error"></div> --}}


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Laporan Suku Tahun<span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <select name="sukuan" id="sukuan" class="form-control"  value="">
                                    <option value="">Sila Pilih Suku Tahun</option>
                                    <option value="1">Suku Pertama</option>
                                    <option value="2">Suku Kedua</option>
                                    <option value="3">Suke Ketiga</option>
                                    <option value="4">Suku Keempat</option>
                                   </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Tahun<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <select name="tahun" id="tahun" class="form-control">
                                        @for ($year=date('Y')-1; $year<=date('Y'); $year++)
                                            <option>{{ $year }}</option>
                                           @endfor
                                        </select>
                                </div>
                            </div>
                    </div>



                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Tarikh Mesyuarat<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="tarikh" name="tarikh" class="form-control" type="date" />
                                </div>
                            </div>
                    </div>




                </div> <!-- end of modal body -->

                {{-- footer --}}
                <div class="modal-footer">
                    <button type="button" id="saveBtn" name="saveBtn" class="btn ripple btn-primary" >Simpan</button>
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Kembali</button>
                </div> <!-- end of footer -->

            </div>
        </div>
    </form>
</div>
<!-- End Modal effects-->
<!--End Large Modal -->
<!--</div> tutup tab1-->

<!--<div class="tab-content"> open new tab2-->
 <!--</div>tutup tab 2-->



<!--</div> tutup panel tab-->
@endsection

@section('script-custom')
<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>



<script type="text/javascript">

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('master/index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'sukuan', name: 'sukuan'},
            // {data: 'tahun', name: 'tahun'},
            {data: 'tarikh', name: 'tarikh'},
            {data: 'action', name: 'action'},
        ],


        language:{
            "search": "Carian: ",
            "lengthMenu": "Papar _MENU_ senarai",
            "info": "Papar halaman _PAGE_ daripada _PAGES_",
            "infoEmpty": "Tiada rekod tersedia",
            "infoFiltered": "(ditapis daripada _MAX_ rekod)"
        }
    });

    // when user click add new button
    $('#createNewUser').click(function () {
        $('#error').removeClass('alert alert-danger');
        $('#saveBtn').html('Simpan');
        $('#modalHeading').html('Kekerapan Mesyuarat');
        $('#id').val('');
        $('#addUserForm').trigger("reset");
        $('#modaldemo8').modal('show');
        $('#error').html('');
    });

    // when user click edit button
    $('body').on('click', '.editBook', function() {
        $('#error').removeClass('alert alert-danger');
        $('#saveBtn').html('Simpan');
        var id = $(this).data('id'); // row id
       // var userid = $(this).data('user_id');
       // alert(id);
        //alert(userid); // undefined
        $.ajax({
            type:"POST",
            url: "{{ url('master/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#modalHeading').html('Kemaskini Maklumat');
                $('#modaldemo8').modal('show');
                $('#id').val(data.id);
                $('#sukuan').val(data.sukuan);
                $('#tahun').val(data.tahun);
                $('#tarikh').val(data.tarikh);
                $('#error').html('');
            }
        });
    })

    // save record
    $('#saveBtn').click(function (e) {
        e.preventDefault();


        $(this).html('Simpan');
        $.ajax({
            data: $('#addUserForm').serialize(),
            url: "{{ url('master/store') }}",
            type: "POST",
            dataType: 'json',

            success: function(data) {
                $('#addUserForm').trigger("reset");
                $('#modaldemo8').modal('hide');
                table.draw();

                swal(
                    {
                        title: 'Berjaya!',
                        text: 'Data telah disimpan',
                        type: 'success',
                        confirmButtonColor: '#57a94f'
                    }
		        );
            },

            error: function(reject) {
                $('#error').addClass('alert alert-danger');
                var response = $.parseJSON(reject.responseText);

                $.each(response.errors, function(key, val) {
                    $('#error').append('<li>' + val + '</li>');
                })
            }
        });
    });

    // delete record
    $('body').on('click', '.deleteBook', function () {
        var id = $(this).data("id");

        swal({
            title: "Adakah anda pasti?",
            text: "Maklumat yang dipadam tidak akan dapat dikembalikan.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn btn-danger",
            cancelButtonText: "Batal",
            confirmButtonText: "Padam",
            closeOnConfirm: false
        },

        function(){
            $.ajax({
            type: "DELETE",
            url: "{{ url('master/destroy')}}",
            data:{
            id:id
            },

            success: function (data) {
            table.draw();
            swal("Maklumat dipadam!", "Maklumat telah berjaya dipadam.", "success");
            },

            error: function (data) {
            console.log('Error:', data);
            }});
        });
    });

});



// save record tab_ringkasan_eksekutif
    $('#saveBtn2').click(function (e) {
        e.preventDefault();


        $(this).html('Simpan');
        $.ajax({
            data: $('#addFormRE').serialize(),
            url: "{{ url('ringkasan_eksekutif/store') }}",
            type: "POST",
            dataType: 'json',

            success: function(data) {
                $('#addFormRE').trigger("reset");

                table.draw();

                swal(
                    {
                        title: 'Berjaya!',
                        text: 'Data telah disimpan',
                        type: 'success',
                        confirmButtonColor: '#57a94f'
                    }
		        );
            },

            error: function(reject) {
                $('#error').addClass('alert alert-danger');
                var response = $.parseJSON(reject.responseText);

                $.each(response.errors, function(key, val) {
                    $('#error').append('<li>' + val + '</li>');
                })
            }
        });
    });

</script>


<script>
    function goBack() {
      window.history.back();
    }
    </script>


@endsection


