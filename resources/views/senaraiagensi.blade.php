@extends('layouts.mainlayout2')

@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Halaman Utama</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Konfigurasi Agensi</span>
        </div>
    </div>

    {{-- button trigger modal --}}
	<div class="d-flex my-xl-auto right-content">
		<div class="pe-1 mb-xl-0">
			<button id="createNewUser" class="modal-effect btn btn-success btn-with-icon btn-block" data-bs-effect="effect-scale" data-bs-target="#modaldemo8" data-bs-toggle="modal"><i class="icon ion-md-add-circle"></i> Tambah</button>
		</div>
	</div>

    {{-- <div class="d-flex my-xl-auto right-content">
		<div class="pe-1 mb-xl-0">
			<button id="test" class="modal-effect btn btn-success btn-with-icon btn-block" data-bs-effect="effect-scale"><i class="icon ion-md-add-circle"></i> Test</button>
		</div>
	</div> --}}
</div>
<!-- breadcrumb -->

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
								<th class="wd-10p border-bottom-0">Agensi</th>
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


        <input type="hidden" name="user_id" id="user_id">
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
                    <div id="error"></div>

                    {{-- nama pengguna --}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Nama Agensi: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" data-parsley-class-handler="#fnWrapper" required="" name="agensi" id="agensi">
                                {{-- <input class="form-control" data-parsley-class-handler="#fnWrapper" name="firstname" placeholder="Enter firstname" required="" type="text"> --}}
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
{{-- <style>
    .row {
        flex-direction: column !important;
    }
</style> --}}


<!--End Large Modal -->
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
        ajax: "{{ url('agensi/index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama_agensi', name: 'nama_agensi'},
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
        $('#modalHeading').html('Tambah Agensi');
        $('#id').val('');
        $('#addUserForm').trigger("reset");
        $('#modaldemo8').modal('show');
        $('#error').html('');
    });

    // when user click edit button
    $('body').on('click', '.editBook', function() {
        $('#error').removeClass('alert alert-danger');
        $('#saveBtn').html('Simpan');
        var id = $(this).data('id');
        // alert(id);
        $.ajax({
            type:"POST",
            url: "{{ url('agensi/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#modalHeading').html('Kemaskini Pengguna');
                $('#modaldemo8').modal('show');
                $('#user_id').val(data.id);
                $('#agensi').val(data.nama_agensi);
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
            url: "{{ url('agensi/store') }}",
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
            url: "{{ url('agensi/destroy')}}",
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


