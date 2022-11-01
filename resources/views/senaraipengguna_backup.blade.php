@extends('layouts.mainlayout')
@section('content')

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Halaman Utama</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Konfigurasi Pengguna</span>
        </div>
    </div>

	<div class="d-flex my-xl-auto right-content">
		<div class="pe-1 mb-xl-0">
			<button class="modal-effect btn btn-success btn-with-icon btn-block" data-bs-effect="effect-scale" data-bs-target="#modaldemo8" data-bs-toggle="modal"><i class="icon ion-md-add-circle"></i> Tambah</button>
		</div>
	</div>
</div>
<!-- breadcrumb -->

<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap" id="example1">
						<thead>
							<tr>
								<th class="wd-5p border-bottom-0">Bil</th>
								<th class="wd-10p border-bottom-0">Nama</th>
								<th class="wd-15p border-bottom-0">Emel</th>
								<th class="wd-15p border-bottom-0">Jabatan</th>
								<th class="wd-10p border-bottom-0">No. Telefon</th>
								{{-- <th class="wd-25p border-bottom-0">E-mail</th> --}}
							</tr>
						</thead>

						<tbody>
						@foreach ($pengguna as $user)
							<tr>
								<td>{{ $loop->index+1 }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->jabatan }}</td>
								<td>{{ $user->notelefon }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal effects -->
<div class="modal fade" id="modaldemo8">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Tambah Pengguna</h6><button aria-label="Close" class="close"
					data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>

            <form method="POST" action="{{ route('senaraipengguna.store') }}" class="form-horizontal">
			    <div class="modal-body">
					@csrf
                    <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Nama Pengguna: <span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<input id="name" type="text" class="form-control" name="name" required placeholder="masukkan nama pengguna">
														{{-- <input id="name" type="text" placeholder="masukkan nama pengguna" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}}
							</div>
						</div>
					</div>

                    <div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Kata Laluan: <span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<input id="password" type="password" class="form-control" name="password" required>
							</div>
						</div>
					</div>

					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Emel: <span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-9">
								{{-- <input id="email" type="email" class="form-control" placeholder="Sila gunakan emel rasmi" required autocomplete="email" name="email"> --}}

                                <input id="email" type="email" placeholder="Sila gunakan emel rasmi" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email">
                                @error('email')
								<span class="invalid-feedback" role="alert">
								    <strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>

						</div>
					</div>

					<div class="form-group ">
						<div class="row">
							<div class="col-md-3">
								<label class="form-label">Jabatan/Bahagian: <span class="tx-danger">*</span></label>
							</div>
							<div class="col-md-9">
								<input id="jabatan" type="text" class="form-control" required name="jabatan">
							</div>
						</div>
					</div>

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
			    </div>


                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">Simpan</button>
                    <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Kembali</button>

                    <div class="btn ripple btn-success-gradient" id='swal-success-kemaskini' hidden="hidden">
                        Click me !
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>
<!-- End Modal effects-->

<!--End Large Modal -->
@endsection

@section('script')

$('#postSubmitBtn').click(function (e) {
    e.preventDefault();
    var published = '0';
    if($('#published').prop('checked')==true){
        published = '1';
    }
    $.ajax({
        type: "post",
        url: "{{route('post.store')}}",
        data: {
            _token: '{{ csrf_token() }}',
            'title': $('#title').val(),
            'content': $('#content').val(),
            'featured': $('#featured').val(),
            'published': published,
        },
        dataType: "json",
        success: function (response) {
            if($.isEmptyObject(response.error)){
                $('.errorTxt').empty();
                $('#errorDiv').addClass('d-none');
                $('#createForm').get(0).reset();
                $('#createPostMdl').modal('hide');
                poststbl.ajax.reload();
                $('.modal-backdrop').remove();
                swal("Post telah berjaya direkodkan",{
                    icon:'success',
                    buttons: {
                        cancel: {
                            text: "OK",
                            value: null,
                            visible: true,
                            className: "",
                            closeModal: true,
                        }
                    }
                });
            }else{
                $('.errorTxt').empty();
                $('#errorMessages').empty();
                $('.form-control').removeClass('is-invalid');
                $.each(response.error, function (indexInArray, message) {
                    $('#errorMessages').append(message+'<br>');
                    $('#'+indexInArray+'Help').text(message);
                    $('#'+indexInArray).addClass('is-invalid');
                });

                $('#errorDiv').removeClass('d-none');
                // console.log(response.error);
            }
        }
    });
});



@endsection

