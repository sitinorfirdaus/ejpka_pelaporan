@extends('layouts.mainlayout2')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Halaman Utama</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Konfigurasi Pengguna</span>
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
								<th class="wd-10p border-bottom-0">Nama</th>
								<th class="wd-10p border-bottom-0">Emel</th>
								<th class="wd-10p border-bottom-0">Jabatan</th>
								<th class="wd-5p border-bottom-0">No. Telefon</th>
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

                    {{-- this div to display error message during validation --}}
                    {{-- <div id="errorDiv" class="alert alert-success d-none" role="alert">
                        <button aria-label="Close" class="close" data-bs-dismiss="alert"
                            type="button" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Well done!</strong> You successfully read this important alert
                        message.
                        <span id="errorMessages">

                        </span>
                    </div> --}}

                    {{-- nama pengguna --}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Nama Pengguna: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" data-parsley-class-handler="#fnWrapper" required="" name="name" placeholder="masukkan nama pengguna" id="name">
                                {{-- <input class="form-control" data-parsley-class-handler="#fnWrapper" name="firstname" placeholder="Enter firstname" required="" type="text"> --}}
                            </div>
                        </div>
                    </div>

                    {{-- password --}}
                    {{-- <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Kata Laluan: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div> --}}

                    {{-- emel --}}
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Emel: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                        </div>
                    </div>

                    {{-- jabatan --}}
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Jabatan/Bahagian: <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="jabatan" id="jabatan" data-parsley-class-handler="#fnWrapper" required="">
                            </div>
                        </div>
                    </div>

                    {{-- no telefon --}}
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Nombor Telefon Pejabat</label>
                            </div>
                            <div class="col-md-9">
                                <input id="notelefon" type="text" class="form-control" name="notelefon">
                            </div>
                        </div>
                    </div>
                </div> <!-- end of modal body -->

                {{-- footer --}}
                <div class="modal-footer">
                    {{-- <button type="submit" id="saveBtn" value="create" class="btn ripple btn-primary" >Simpan</button> --}}
                    <button type="button" id="saveBtn" name="saveBtn" class="btn ripple btn-primary" >Simpan</button>
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Kembali</button>

                    <div class="btn ripple btn-success-gradient" id='swal-success-kemaskini' hidden="hidden">
                            Click me !
                    </div>
                </div> <!-- end of footer -->

            </div>
        </div>
    </form>
</div>
<!-- End Modal effects-->

<!--End Large Modal -->
@endsection

@section('script-custom')
<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

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
        ajax: "{{ url('userlist2/index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'jabatan', name: 'jabatan'},
            {data: 'notelefon', name: 'notelefon'},
            {data: 'action', name: 'action'},
        ]
    });

    // when user click add new button
    $('#createNewUser').click(function () {
        $('#error').removeClass('alert alert-danger');
        $('#saveBtn').html('Simpan');
        $('#modalHeading').html('Tambah Pengguna');
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
            url: "{{ url('userlist2/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#modalHeading').html('Kemaskini Pengguna');
                $('#modaldemo8').modal('show');
                $('#user_id').val(data.id);
                $('#name').val(data.name);
                $('#jabatan').val(data.jabatan);
                $('#notelefon').val(data.notelefon);
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
            url: "{{ url('userlist2/store') }}",
            type: "POST",
            dataType: 'json',

            success: function(data) {
                $('#addUserForm').trigger("reset");
                $('#modaldemo8').modal('hide');
                table.draw();

                swal(
                    {
                        title: 'Kemaskini berjaya!',
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
        if (confirm("Are You sure want to delete this Post!") === true) {
            $.ajax({
                type: "DELETE",
                url: "{{ url('userlist2/destroy')}}",
                data:{
                    id:id
                },

                success: function (data) {
                    table.draw();
                },

                error: function (data) {
                    console.log('Error:', data);
                }});
                }

    });

});

</script>
@endsection


