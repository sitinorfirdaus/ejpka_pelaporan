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
								<th class="wd-10p border-bottom-0">Peruntukan Diluluskan (a)</th>
                                <th class="wd-10p border-bottom-0">Peruntukan Tambah/Kurang (b)</th>
                                <th class="wd-10p border-bottom-0">Jumlah Peruntukan Dipinda (c)</th>
                                <th class="wd-10p border-bottom-0">Jumlah Tanggungan Kemaskini (d)</th>
                                <th class="wd-10p border-bottom-0">Jumlah Belanja Kemaskini (e)</th>
                                <th class="wd-10p border-bottom-0">Baki selepas Tanggungan & Belanja Kemaskini f=c-(d+e)</th>
                                <th class="wd-10p border-bottom-0">Baki selepas Tanggungan & Belanja Kemaskini g=f/c (%)</th>
                                <th class="wd-10p border-bottom-0">Tindakan</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
                        <tfoot>
                            <tr>
                                   <th>Total:</th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                   <th></th>
                                    {{-- <th></th> --}}
                            </tr>
                        </tfoot>
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
                    {{-- <div id="error"></div> --}}


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Peruntukan Diluluskan (a): <span class="tx-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" data-parsley-class-handler="#fnWrapper" required="" name="input1" id="input1">

                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Peruntukan Tambah/Kurang (b)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                <input id="input2" size="5" name="input2" class="form-control" type="number" required/>
                                </div>
                            </div>
                    </div>



                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Jumlah Peruntukan Dipinda (c)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="output1" size="5" onclick="myFunction('add')" name="output1" class="form-control" readonly/>
                                </div>
                            </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Jumlah Tanggungan Kemaskini (d)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="input3" size="5"  name="input3" class="form-control" type="number" />
                                </div>
                            </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Jumlah Belanja Kemaskini (e)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="input4" size="5"  name="input4" class="form-control" type="number" />
                                </div>
                            </div>
                    </div>


                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Baki selepas Tanggungan & Belanja Kemaskini f=c-(d+e)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="output2" size="5" onclick="myFunction2('add2')" name="output2" class="form-control" readonly/>
                                </div>
                            </div>
                    </div>

                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Baki selepas Tanggungan & Belanja Kemaskini g=f/c (%)::<span class="tx-danger">*</span></label>
                            </div>
                                <div class="col-md-3">
                                    <input id="output3" size="5" onclick="myFunction3('add3')" name="output3" class="form-control" readonly/>
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

    <script>

        function myFunction(id) {
            var num1 = document.getElementById("input1").value;
            var num2 = document.getElementById("input2").value;
            var result;
            if (id == "add") {
                result = Number(num1) + Number(num2);

            }
            document.getElementById("input1").value = num1;
            document.getElementById("input2").value = num2;
            document.getElementById("output1").value = result.toFixed(2);

        }

        function myFunction2(id2) {
            var out1 = document.getElementById("output1").value;
            var num3 = document.getElementById("input3").value;
            var num4 = document.getElementById("input4").value;
            var result;
            if (id2 == "add2") {
                result = Number(out1)-(Number(num3) + Number(num4));
            }
                 document.getElementById("output2").value = result.toFixed(3);

        }


        function myFunction3(id3) {
            var out1 = document.getElementById("output1").value;
            var out2 = document.getElementById("output2").value;
            var result;
            if (id3 == "add3") {
                result = (Number(out2)/ Number(out1))*100;
            }
              document.getElementById("output3").value = result.toFixed(5);

        }


    </script>



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
        ajax: "{{ url('belanjawan/index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'input1', name: 'input1'},
            {data: 'input2', name: 'input2'},
            {data: 'output1', name: 'output1'},
            {data: 'input3', name: 'input3'},
            {data: 'input4', name: 'input4'},
            {data: 'output2', name: 'output2'},
            {data: 'output3', name: 'output3'},
            {data: 'action', name: 'action'},
        ],



        //start footer
        footerCallback: function (row, data, start, end, display) {
            var api = this.api();

            // Remove the formatting to get integer data for summation
            var intVal = function (i) {
                return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };

            // Total over all pages
            total1 = api
                .column(1)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            col1 = api
                .column(1, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            col2 = api
                .column(2, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);



                col3 = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            //$(api.column(1).footer()).html('$' + col1.toFixed(2) + ' ( $' + total1.toFixed(2) + ' total)');
            $(api.column(1).footer()).html('$' + col1.toFixed(2));
            $(api.column(2).footer()).html('$' + col2.toFixed(2));
            $(api.column(3).footer()).html('$' + col3.toFixed(2));
           // $(api.column(4).footer()).html('$' + col4.toFixed(2));


        },

        //end footer





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
        $('#modalHeading').html('Tambah AA');
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
        var userid = $(this).data('user_id');
       // alert(id);
        //alert(userid); // undefined
        $.ajax({
            type:"POST",
            url: "{{ url('belanjawan/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#modalHeading').html('Kemaskini Maklumat');
                $('#modaldemo8').modal('show');
              //  $('#id').val(data.id);
                $('#input1').val(data.input1);
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
            url: "{{ url('belanjawan/store') }}",
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


