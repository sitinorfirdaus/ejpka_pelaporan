@extends('layouts.mainlayout2')

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Halaman Utama Senarai Mengurus-update</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Konfigurasi Agensi</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
	                <form id="addUserForm" name="addUserForm" method="POST" action="{{ url('mengurus/update/') }}" enctype="multipart/form-data">


                    <input type="hidden" name="id" id="id">  <!--pull row id data -->
                     {{-- @csrf --}}

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
                                             <label class="form-label">Peruntukan Diluluskan (a): <span class="tx-danger">*</span></label>
                                         </div>
                                         <div class="col-md-9">
                                             {{-- <input type="text" class="form-control" data-parsley-class-handler="#fnWrapper" required="" name="name" id="name"> --}}

                                         </div>
                                     </div>
                                 </div>

                                 <div class="form-group">
                                     <div class="row">
                                         <div class="col-md-3">
                                             <label class="form-label">pilihan laporan <span class="tx-danger">*</span></label>
                                         </div>
                                     <div class="col-md-9">
                                     <select name="name" id="name" class="form-control"  value="{{ old('name') }}">
                                      <option value="">Sila Pilih Suku Tahun</option>
                                      <option value="1">Suku Pertama</option>
                                      <option value="2">Suku Kedua</option>
                                      <option value="3">Suke Ketiga</option>
                                      <option value="4">Suku Keempat</option>
                                     </select>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="row">
                                     <div class="col-md-3">
                                         <label class="form-label">Tahun <span class="tx-danger">*</span></label>
                                     </div>
                                 <div class="col-md-9">
                                 <select name="tahun" id="tahun" class="form-control">
                                     @for ($year=2021; $year<=date('Y'); $year++)
                                          <option>{{ $year }}</option>
                                         @endfor
                                 </select>
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
                 <form method="POST" action="{{ url('mengurus/update') }}" class="form-horizontal">
                    @csrf
                    @method('PUT')


                        <h1><U>4.1: PENGURUSAN BELANJAWAN </U> </h1>


                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Peruntukan Diluluskan (a):<span class="tx-danger">*</span></label>
                                </div>
                                    <div class="col-md-3">
                                        <input id="input2" size="5" name="input2" class="form-control"  value="" required/>
                                    </div>
                                </div>
                        </div>
                    </form>


			</div>
		</div>
	</div>
</div>


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
        ajax: "{{ url('mengurus/index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},

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
        $('#modalHeading').html('Tambah Suku Tahun');
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
           $.ajax({
            type:"POST",
            url: "{{ url('mengurus/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#modalHeading').html('Kemaskini Maklumat');
                $('#modaldemo8').modal('show');
                $('#id').val(data.id);
                $('#name').val(data.name);
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
            url: "{{ url('mengurus/store') }}",
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
            url: "{{ url('belanjawan/destroy')}}",
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

</script>
@endsection


