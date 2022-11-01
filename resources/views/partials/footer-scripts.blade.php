<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

{{-- @yield('script-custom') --}}

<!-- JQuery min js -->
<script src="../../assets/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Bundle js -->
<script src="../../assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Ionicons js -->
<script src="../../assets/plugins/ionicons/ionicons.js"></script>

<!-- Moment js -->
<script src="../../assets/plugins/moment/moment.js"></script>

<!-- P-scroll js -->
<script src="../../assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../../assets/plugins/perfect-scrollbar/p-scroll.js"></script>

<!-- Internal Data tables -->
<script src="../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="../../assets/plugins/datatable/datatables.min.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
<script src="../../assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
<script src="../../assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../../assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
<script src="../../assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>

<!--Internal  Datatable js -->
<script src="../../assets/js/table-data.js"></script>

<!-- Rating js-->
<script src="../../assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="../../assets/plugins/rating/jquery.barrating.js"></script>

<!-- Sidebar js -->
<script src="../../assets/plugins/side-menu/sidemenu.js"></script>

<!-- Right-sidebar js -->
<script src="../../assets/plugins/sidebar/sidebar.js"></script>
<script src="../../assets/plugins/sidebar/sidebar-custom.js"></script>

<!--Internal  Sweet-Alert js-->
<script src="../../assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="../../assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>

<!-- Sweet-alert js  -->
<script src="../../assets/plugins/sweet-alert/sweetalert.min.js"></script>
<script src="../../assets/js/sweet-alert.js"></script>

<!-- Internal Modal js-->
<script src="../../assets/js/modal.js"></script>

<!-- Sticky js -->
<script src="../../assets/js/sticky.js"></script>

<!-- eva-icons js -->
<script src="../../assets/js/eva-icons.min.js"></script>

<!-- custom js -->
<script src="../../assets/js/custom.js"></script>

{{-- ajax --}}
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

<script>
    var msg = '{{Session::get('success')}}';
    var exist = '{{Session::has('success')}}';
    if(exist){
    //   alert(msg);

      window.onload=function(){
//   document.getElementById("swal-success-kemaskini").click();

        swal
        (
            {
                title: 'Berjaya!',
                text: 'Data telah disimpan',
                type: 'success',
                confirmButtonColor: '#57a94f'
            }
        );
};
    }


</script>
