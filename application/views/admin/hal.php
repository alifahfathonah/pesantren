<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
    <h2>Data Surat Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="active">
                <strong>Data Kode Hal</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-title">
                        Tambah Kode Hal
                    </div>
                    <div class="ibox-content">
                        <?= form_open('admin/hal') ?>
                        <div class="form-group">
                            <label>Kode Hal</label>
                            <input type="text" name="kode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Rincian</label>
                            <input type="text" name="rincian" class="form-control">
                        </div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data User</h5>
                        </div>
                        <div class="ibox-content">
                            <?= $this->session->flashdata('msg') ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Rincian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($data as $val): ?>
                                        <tr>
                                            <td><?= ++$i ?></td>
                                            <td><?= $val->kode_hal ?></td>
                                            <td><?= $val->rincian ?></td>
                                            <td style="text-align: center !important;">
                                                <div class="btn-group">
                                                    <button class="btn btn-sm btn-danger " type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus User" onclick="hapus('<?= $val->id_hal ?>')"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- end of modal -->
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });

    function delegasi(id_surat){
        $("#id_surat").val(id_surat);
        console.log('masuk pak eko');
    }
    
    function hapus(id){
        swal({
            title: "Apakah Anda Yakin?",
            text: "Kamu tidak akan bisa mengembalikan data yang sudah kamu hapus",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "red",
            confirmButtonText: "Hapus Data",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false 
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= base_url('admin/kode_hal') ?>",
                    type: 'POST',
                    data: {
                        id: id,
                        delete: true
                    },
                    success: function() {
                        // swal("Dihapus!", "Data Telah Dihapus.", "success");
                        location.reload();
                    }
                });
            } else {
                swal("Batal", "Data Aman :)", "error");
            }
        });
    }
</script>