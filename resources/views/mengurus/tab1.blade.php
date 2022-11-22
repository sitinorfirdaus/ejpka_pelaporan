@extends('layouts.mainlayout2')

@section('content')
<link href="{{ url('') }}/css/select2.min.css" rel="stylesheet" />
<link href="{{ url('') }}/borang/css/insurans-app-style.css" rel="stylesheet"/>
{{-- {{ html()->form('POST', route('admin.keluarnegara.store'))->attribute('enctype', 'multipart/form-data')->open() }} --}}
<form id="addUserForm" name="addUserForm" method="POST" enctype="multipart/form-data" action="{{url('mengurus/store2')}}">
<div class="card" style="margin-top:16px;">
    <div class="card-body">
        <div class="card-header">
            <ul class="nav nav-tabs nav-tabs-primary nav-justified">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-1"><span class="ti-help-alt"></span><span class="hidden-xs">Maklumat Pemohon</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabe-2"><span class="hidden-xs">Maklumat Cuti Rehat</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-3"><span class="ti-help-alt"></span><span class="hidden-xs">Maklumat Perjalanan</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabe-4"><span class="ti-help-alt"></span><span class="hidden-xs">Perakuan Pemohon</span></a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="tabe-1" class="container tab-pane fade">
				 @include('mengurus/index')
            </div>
            <div id="tabe-2" class="container tab-pane active">
				{{-- @include('backend.keluarnegara.cutirehat') --}}
            </div>
            <div id="tabe-3" class="container tab-pane fade">
				{{-- @include('backend.keluarnegara.perjalanan') --}}
            </div>
            <div id="tabe-4" class="container tab-pane fade">
				{{-- @include('backend.keluarnegara.perakuan') --}}
            </div>
        </div>
    </div>
</div>
{{-- {{ html()->form()->close() }} --}}
{{-- @extends('backend.includes.javascript')
@extends('backend.includes.head') --}}
<script src="{{ url('') }}/js/jquery_2_1_3.min.js"></script>
<script src="{{ url('') }}/js/select2.min.js"></script>
<script type="text/javascript">
$(".myselect").select2();
$(document).ready(function(){
     var currentYear = (new Date()).getFullYear();
     var minDate = new Date(currentYear, 0, 1);
     var maxDate = new Date(currentYear, 11, 31);

    $("#tkhbtolak").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        $('#tkhpulang').datepicker('setStartDate', startDate);
    }).on('clearDate', function (selected) {
        $('#tkhpulang').datepicker('setStartDate', null);
    });
    $("#tkhpulang").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
    }).on('changeDate', function (selected) {
        var endDate = new Date(selected.date.valueOf());
        $('#tkhbtolak').datepicker('setEndDate', endDate);
    }).on('clearDate', function (selected) {
        $('#tkhbtolak').datepicker('setEndDate', null);
    });

    $("#tkhkembali").datepicker({
        format: "dd/mm/yyyy",
        autoclose: true,
    }).datepicker('setStartDate', 'today');

     $("#tkhinsurans").datepicker({
        currentYear:true,
        format: "dd/mm/yyyy",
        autoclose: true,
        startDate: minDate,
        endDate: maxDate,
    }).datepicker('today');
});
$(document).ready(function(){
	var totalAmount = 0;
    $("#tambah").click(function(){
		var negara = $("#negara").val();
		var addcuti = $("#addcuti").val();
		var btolak = $("#tkhbtolak").val();
		var pulang = $("#tkhpulang").val();
		var bil = $("#hari").val();
		var cal= parseInt(bil);

		var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' name='a[]' value='" +negara+"'  style='width:100%' readonly></td><td><textarea name='b[]' ReadOnly style='width:100%'>" +addcuti+"</textarea></td><td><input type='text' name='c[]' value='" +btolak+"' ReadOnly style='width:100%'></td><td><input type='text' name='d[]' value='" +pulang+"' ReadOnly style='width:100%'></td><td><input type='text' name='e[]' value='" +cal+"' ReadOnly  style='width:100%'></td></tr>";
		$("table tbody").append(markup);

		// set field kosong
		$('#negara').val('0');
		$('#addcuti').val('');
		$('#tkhbtolak').val('');
		$('#tkhpulang').val('');
		$('#hari').val('');
		// Total Hari
		totalAmount += cal;

		$("#totalhari").val(totalAmount);

        });

// Batal rows yang ditambah
		$("#delrow").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                        if($(this).is(":checked")){
                            var tr=$(this).parents("tr");
                            var bilhari=tr.find('input[name="e[]"]').val();
                            //alert(totalAmount -= bilhari);
                            totalAmount -= bilhari
                            tr.remove();

                    }
                });
            $("#totalhari").val(totalAmount);
        });
});
$("#negara").change(function(){

    var kod_negara = $("#negara option:selected").val();
    var dvwaris = document.getElementById("waris");
    var dvnegara = document.getElementById("tambahnegara");

    if( kod_negara == "SINGAPORE (Blanket Approval)" || kod_negara == "BRUNEI DARUSSALAM (Blanket Approval)" || kod_negara == "INDONESIA (Blanket Approval)" || kod_negara == "THAILAND (Blanket Approval)" )
    {
    alert("Negara yang dipilih adalah kategori Negara Blanket Approval");

    dvwaris.style.display = "inline";
    dvnegara.style.display = "none";
    }
    else
    {

    dvnegara.style.display = "inline";
    dvwaris.style.display = "none";
    }
});
// untuk masukkan tarikh insurans
function ShowHideDivTkhInsurans(){
	var divtkh = document.getElementById("pilihinsurans");
	var chkYes = document.getElementById("yesCheck");
	divtkh.style.display = chkYes.checked ? "block" : "none"; //hide
	var chkNo = document.getElementById("noCheck");
	divtkh.style.display = chkNo.checked ? "none" : "block"; //display
}
//untuk count days
function daysFunction(){
	//tukar tkhbtolak
	var mula = $('#tkhbtolak').val();
	var hari = mula.substring(0, 2);
	var bulan = mula.substring(3, 5);
	var tahun = mula.substring(6, 10);
	var tkh = tahun+'-'+bulan+'-'+hari;
	//tukar tkhpulang
	var akhir = $("#tkhpulang").val();
	var hariakhir = akhir.substring(0, 2);
	var bulanakhir = akhir.substring(3, 5);
	var tahunakhir = akhir.substring(6, 10);
	var tkhakhir = tahunakhir+'-'+bulanakhir+'-'+hariakhir;

	var tkhbtolak = new Date(Date.parse(tkh));
	var tkhpulang = new Date(Date.parse(tkhakhir));
	var diffMs = Math.abs(tkhpulang - tkhbtolak);
	var diffDays = 0;
	var diffDays = Math.round((diffMs / 86400000)+1); // days
	$("#hari").val(diffDays);
}
function isNumberKey(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode;

	if (charCode != 46 && charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57)){
	return false;
	} else {
	return true;
	}
}
var dokumen = [];
$(".btn-info").click(function(){
	if(dokumen.length<2) {
	//ni utk tambah upload dokumen
	var html = $(".clone").html();
	$(".increment").after(html);

	//utk masukkan value 1 dlm array supaya kita boleh kira bilangan upload dokumen
	dokumen.push("ada dokumen");
	}
	else {
	alert("Bilangan dokumen untuk muat naik adalah terhad kepada 3 sahaja");
	}
});
$("body").on("click",".btn-danger",function(){
	$(this).parents(".control-group").remove();
	//untuk remove value dari array
	var pjgarray=(dokumen.length)-1; console.log(pjgarray);
	dokumen=dokumen.splice(pjgarray, pjgarray);
});
$(document).on('click', 'button.removebutton', function () {
	$(this).closest('tr').remove();
	return false;
});
</script>

@endsection
