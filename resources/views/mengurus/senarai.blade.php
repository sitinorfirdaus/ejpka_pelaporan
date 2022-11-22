@extends('layouts.mainlayout2')

@section('content')

<style type="text/css">
    body, html {
  height: 100%;
  margin: 0;
  font-family: Arial;
}

/* Style tab links */
.tablink {
  background-color: #555;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: 25%;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 100%;
}

#Home {background-color: whitesmoke;}
#News {background-color: green;}
#Contact {background-color: blue;}
#About {background-color: orange;}
</style>

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">Halaman Utama Senarai Mengurus</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/Laporan Pengesahan</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->

<!-- row opened -->
<div class="row row-sm">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
<form id="addUserForm" name="addUserForm" method="POST" enctype="multipart/form-data" action="">
<table>
    <tr>
        <td>

                <div class="row">
                    <div class="col-md-5">
                        <label class="form-label">pilihan laporan <span class="tx-danger">*</span></label>
                    </div>
                <div class="col-md-9">
                <select name="name" id="name" class="form-control"  value="{{ old('title') }}">
                 <option value="">Sila Pilih Suku Tahun</option>
                 <option value="1">Suku Pertama</option>
                 <option value="2">Suku Kedua</option>
                 <option value="3">Suke Ketiga</option>
                 <option value="4">Suku Keempat</option>
                </select>
                </div>
            </div>
        </td>
        <td>
             <div class="row">
             <div class="col-md-8">
                <label class="form-label">Tahun <span class="tx-danger">*</span></label>
             </div>
             <div class="col-md-9">
             <select name="tahun" id="tahun" class="form-control">
             @for ($year=date('Y')-1; $year<=date('Y'); $year++)
                 <option>{{ $year }}</option>
                @endfor
             </select>
             </div>
             </div>
        </td>
        <td>
            <div class="modal-footer">
                <button type="button" id="saveBtn" name="saveBtn" class="btn ripple btn-primary" >Simpan</button>
                <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Kembali</button>
            </div> <!-- end of footer -->
        </td>
    </tr>
</table>

                <div class="container">

                    {{-- <div class="navcontainer">
                        <button class="tablink" onclick="openPage('Home', this, 'red')" id="defaultOpen">Laporan Pengesahan</button>
                          <a href="{{ url('belanjawan/index') }}"> <button class="tablink">Jumlah Keseluruhan</button></a>
                         {{-- <button class="tablink" onclick="{{ url('belanjawan/index') }}" >Jumlah Keseluruhan</button> --}}
                        {{-- <button class="tablink" onclick="openPage('Contact', this, 'blue')">Perbelanjaan Melebihi</button>
                        <button class="tablink" onclick="openPage('About', this, 'orange')">Perbelanjaan Kurang</button>
                    </div> --}}

                    <div id="home" class="tabcontent">
                        {{-- <form id="addUserForm" name="addUserForm" method="POST" enctype="multipart/form-data" action=""> --}}

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
                                         {{-- <div id="error"></div>tak guna --}}
                                         {{-- ni guna
                                             <div class="form-group">
                                             <div class="row">
                                                 <div class="col-md-3">
                                                     <label class="form-label">pilihan laporan <span class="tx-danger">*</span></label>
                                                 </div>
                                             <div class="col-md-9">
                                             <select name="name" id="name" class="form-control"  value="{{ old('title') }}">
                                              <option value="">Sila Pilih Suku Tahun</option>
                                              <option value="1">Suku Pertama</option>
                                              <option value="2">Suku Kedua</option>
                                              <option value="3">Suke Ketiga</option>
                                              <option value="4">Suku Keempat</option>
                                             </select>
                                             </div>


                                             <div class="row">
                                                <div class="col-md-3">
                                                    <label class="form-label">Tahun <span class="tx-danger">*</span></label>
                                                </div>
                                            <div class="col-md-9">
                                            <select name="tahun" id="tahun" class="form-control">
                                                @for ($year=date('Y')-1; $year<=date('Y'); $year++)
                                                     <option>{{ $year }}</option>
                                                    @endfor
                                            </select>
                                            </div>
                                        </div>

                                         </div>
                                     </div> --}}

                                     {{-- tak guna
                                        <div class="form-group">
                                         <div class="row">
                                             <div class="col-md-3">
                                                 <label class="form-label">Tahun <span class="tx-danger">*</span></label>
                                             </div>
                                         <div class="col-md-9">
                                         <select name="tahun" id="tahun" class="form-control">
                                             @for ($year=date('Y')-1; $year<=date('Y'); $year++)
                                                  <option>{{ $year }}</option>



                                                 @endfor
                                         </select>
                                         </div>
                                     </div>
                                 </div> --}}

                                 @isset($text)
                                 {{'name is set!'}}
                               @endisset
                                 {{-- <input type="text" class="form-control" data-parsley-class-handler="#fnWrapper" required="" name="name" placeholder="masukkan nama pengguna" id="name" value=""> --}}


                                     {{-- footer --}}
                                     {{-- <div class="modal-footer">
                                         <button type="button" id="saveBtn" name="saveBtn" class="btn ripple btn-primary" >Simpan</button>
                                         <button class="btn ripple btn-secondary" data-bs-dismiss="modal" type="button">Kembali</button>
                                     </div> <!-- end of footer --> --}}

                                 </div>
                             </div>
                         </form>
                    </div>
                </div>

                {{-- <form action="{{ url('mengurus/form') }}" method="POST">
                    {{ csrf_field() }}
                    @if(isset($text))
                    <input type="text" name="text" value="{{ $text }}">
                    @else
                    <input type="text" name="text" >
                    @endif

                    @if(isset($text))
                    <input type="text" name="text" value="{{ $text }}">
                    @else
                    <input type="text" name="text" >
                    @endif
                    <input type="submit">
                </form> --}}

                {{-- <div class="table-responsive">
					<table class="table text-md-wrap data-table" id="example1">

						<thead>
							<tr>
								<th class="wd-5p border-bottom-0">Bil</th>
								<th class="wd-10p border-bottom-0">Peruntukan Diluluskan (a)</th>

                                <th class="wd-10p border-bottom-0">Tindakan</th>
							</tr>
						</thead>
						<tbody>
						</tbody>

					</table>
				</div> --}}


                  {{-- <div id="Contact" class="tabcontent">
                    <h3>Contact</h3>
                    <p>Get in touch, or swing by for a cup of coffee.</p>
                  </div>

                  <div id="About" class="tabcontent">
                    <h3>About</h3>
                    <p>Who we are and what we do.</p>
                  </div> --}}



                  <form id="addUserForm" name="addUserForm" method="" enctype="multipart/form-data" action="">
                    @csrf <!-- add csrf field on your form -->
                <div class="card" style="margin-top:16px;">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-primary nav-justified">
                            <li class="nav-item">
                                <a style="font-size:12px;" href="{{url('mengurus/index')}}"  class="nav-link active">
                                    <small class="badge1 float-left badge-primary">
                                1</small>Laporan Pengesahan</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:12px;" href="{{url('mengurus/form')}}"  class="nav-link"><small class="badge1 float-left badge-primary">
                                2</small>Jumlah Keseluruhan</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:12px;" href="#"  class="nav-link"><small class="badge1 float-left badge-primary">
                                3</small>Perbelanjaan Melebihi</a>
                            </li>
                            <li class="nav-item">
                                <a style="font-size:12px;" href="#"  class="nav-link"><small class="badge1 float-left badge-primary">
                                4</small>Perbelanjaan Kurang</a>
                            </li>
                        </ul>

                        {{-- <div class="form-group row" style="text-align:center;">
                            <div class="col-md-12">
                               <a href="{{url('mengurus/store2')}}"> <input type="submit" class="btn btn-success" value= "Seterusnya" name="submit" id="submit"></a>
                                <!-- <input type="submit" class="btn btn-primary" value="Seterusnya" name="submit" id="submit" > -->
                            </div>
                        </div>
                    </div> --}}
                </div>



			</div>
		</div>
	</div>
</div>



@endsection

@section('script-custom')
<script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript"></script>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<script src="https://ajax.googleap<div class="tab-v1">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>

<script type="text/javascript" src="jquery-1.2.3.pack.js"></script>//tab javascript

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

//tabs
<script type="text/javascript">

    function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

		</script>






@endsection


