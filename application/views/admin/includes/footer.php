<div class="footer">
                <div class="pull-right">
                    <strong>Pondok Pesantren AL-Bahjah</strong>
                </div>
                <div>
                    <strong>Copyright</strong> &copy; 2018
                </div>
            </div>

        </div>
        </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url() ?>/assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url() ?>/assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/dataTables/datatables.min.js"></script>

    <script>
            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: "dd/mm/yyyy"
            });
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
            

            $(".select").select2({
                placeholder: "Silahkan Pilih",
                allowClear: true
            });

            $('.datable').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'excel', title: 'Alur Surat'},
                    {extend: 'pdf', title: 'Alur Surat'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
    </script>

</body>

</html>
