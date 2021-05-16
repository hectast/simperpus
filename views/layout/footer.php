<footer class="footer text-center">
    All Rights Reserved by Hectast. Developed by <a href="https://github.com/hectast" target="_BLANK">Hectast</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="public/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="public/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="public/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="public/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="public/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!-- <script src="public/dist/js/pages/dashboards/dashboard1.js"></script> -->
<!-- Charts js Files -->
<script src="public/assets/libs/flot/excanvas.js"></script>
<script src="public/assets/libs/flot/jquery.flot.js"></script>
<script src="public/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="public/assets/libs/flot/jquery.flot.time.js"></script>
<script src="public/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="public/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="public/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="public/dist/js/pages/chart/chart-page-init.js"></script>
<script src="public/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="public/dist/js/yearpicker.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#datatable1').DataTable();
    $('#datatable2').DataTable();
    $('#datatable3').DataTable();
    $('#datatable4').DataTable();
    $('#datatable5').DataTable();
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    });

    // Year Picker
    let currentYear = new Date().getFullYear();
    $('.yearpicker').yearpicker({
        endYear: currentYear
    });

    // Kategori Buku
    $('#optionBuku').change(function() {
        $('#kategKlasifikasi').remove();
        if ($('#optionBuku').val() == '1') {
            $.get('views/pages/admin/kategori_klasifikasi.php', {
                optionBuku: $('#optionBuku').val()
            })
            .done(function(data) {
                $('#formBuku').after(data);
            })
        }
    });
    $('#optionBuku').change(function() {
        $('#kategKhusus').remove();
        if ($('#optionBuku').val() == '0') {
            $.get('views/pages/admin/kategori_khusus.php', {
                optionBuku: $('#optionBuku').val()
            })
            .done(function(data) {
                $('#formBuku').after(data);
            })
        }
    });

    <?php if (isset($_GET['views_user'])) : ?>
        $(document).ready(function(){
            // jQuery.expr[':'].contains = function(a, i, m) {
            // return jQuery(a).text().toUpperCase()
            //     .indexOf(m[3].toUpperCase()) >= 0;
            // };
            // $('#mySearchBuku').keyup(function (){
            //     $('#myDaftarBuku .card').removeClass('d-none');
            //     var filter = $(this).val(); // get the value of the input, which we filter on
            //     $('#myDaftarBuku .card .card-body').find('h4:not(:contains("'+filter+'"))').parent().parent().addClass('d-none');
            // })

            $('#mySearchBuku').keyup(function() {
                var value = $(this).val().toLowerCase();
                $(".myBuku").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    // console.log("im here");
                });
            });

            $('#btnMore').click(function() {
                var last_idBuku = $(this).data("buku");
                $('#btnMore').html("Loading...");
                $.ajax({
                    url: "app/controller/user/function.php",
                    method: "post",
                    data: {last_idBuku:last_idBuku},
                    dataType: "text",
                    success:function(data) {
                        if (data != '') {
                            $('#removeRow').remove();
                            $('#myBukuContent').append(data);
                        } else {
                            $('#btnMore').html("Data Tidak Ditemukan!");
                        }
                    }
                });
            });
        });
    <?php endif; ?>
</script>

</body>

</html>