            </div>
            <!-- END CONTENT -->
        </div>
        <div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy;
                <a target="_blank" href="http://pudinglab.id">PudingLab</a> &nbsp;|&nbsp;
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- BEGIN CORE PLUGINS -->
 <script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/inspinia.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/pace/pace.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script>
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

        });

    </script>
    </body>

</html>