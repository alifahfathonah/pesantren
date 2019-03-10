<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
    <h2>Data Surat Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="active">
                <strong>Surat Masuk</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="wrapper wrapper-content animated fadeInRight">
        <?php if (isset($data)) : ?>
            <div class="alert alert-info">
                Anda Memiliki <?= count($data) ?> surat yang belum di baca
            </div>
        <?php endif ?>
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data surat masuk</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <?= $this->session->flashdata('msg') ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>No Agenda</th>
                                            <th>Tanggal Disposisi</th>
                                            <th>Jenis Surat</th>
                                            <th>Hal</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($data as $val): 
                                            $surat = $this->Surat_masuk_m->get_row(['id_surat' => $val->id_surat]);
                                            // echo json_encode($surat);
                                        ?>
                                        <tr>
                                            <td><?= ($surat) ? $surat->no_agenda : '-'?></td>
                                            <td><?= $this->tanggal->convert_date($val->date_unit) ?></td>
                                            <td><?= ($this->Jenis_surat_m->get_row(['id_jenis' => $surat->id_jenis_surat])) ? $this->Jenis_surat_m->get_row(['id_jenis' => $surat->id_jenis_surat])->jenis : '-' ?></td>
                                            <td><?= ($this->Kode_hal_m->get_row(['id_hal' => $surat->kode_hal])) ? $this->Kode_hal_m->get_row(['id_hal' => $surat->kode_hal])->rincian : '-' ?></td>
                                            <td><?= ($surat) ? $surat->nama : '-' ?></td>
                                            <td><?php switch ($val->status) {
                                                case 'menunggu':
                                                    echo '<label class="label label-warning">Menunggu</label>';
                                                    break;
                                                case 'diterima':
                                                    echo '<label class="label label-primary">Diterima</label>';
                                                    break;
                                                case 'delegasi':
                                                    echo '<label class="label label-success">Didisposisilan</label>';
                                                    break;

                                                case 'selesai':
                                                    echo '<label class="label label-primary">Selesai</label>';
                                                    break;
                                                } ?></td>
                                            
                                            <td><?= ($surat) ? '<a href="'. base_url('assets/file/surat_masuk/'). $surat->file .'" class="btn btn-sm btn-success" target="_blank"> Lihat </a>' : '-' ?></td>
                                            <td style="text-align: center !important;">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success " type="button" href="<?= base_url('user/detail-surat/' . $val->id_surat) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Surat"><i class="fa fa-eye"></i></a>
                                                    <?php if ($val->status == 'menunggu'): ?>
                                                        
                                                    <button class="btn btn-sm btn-primary " type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Surat" onclick="terima('<?= $val->id_detail ?>')"><i class="fa fa-check"></i></button>
                                                    <?php endif ?>
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

        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Data surat masuk selesai</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <?= $this->session->flashdata('msg') ?>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>No Agenda</th>
                                            <th>Tanggal Delegasi</th>
                                            <th>Jenis Surat</th>
                                            <th>Hal</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>File</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=0; foreach ($selesai as $val): 
                                            $surat = $this->Surat_masuk_m->get_row(['id_surat' => $val->id_surat]);
                                        ?>
                                        <tr>
                                            <td><?= $surat->no_agenda ?></td>
                                            <td><?= $this->tanggal->convert_date($val->date_unit) ?></td>
                                            <td><?= ($this->Jenis_surat_m->get_row(['id_jenis' => $surat->id_jenis_surat])) ? $this->Jenis_surat_m->get_row(['id_jenis' => $surat->id_jenis_surat])->jenis : '-' ?></td>
                                            <td><?= ($this->Kode_hal_m->get_row(['id_hal' => $surat->kode_hal])) ? $this->Kode_hal_m->get_row(['id_hal' => $surat->kode_hal])->rincian : '-' ?></td>
                                            <td><?= ($surat) ? $surat->nama : '-' ?></td>
                                            <td><?php switch ($val->status) {
                                                case 'menunggu':
                                                    echo '<label class="label label-warning">Menunggu</label>';
                                                    break;
                                                case 'diterima':
                                                    echo '<label class="label label-primary">Diterima</label>';
                                                    break;
                                                case 'delegasi':
                                                    echo '<label class="label label-success">Didisposisilan</label>';
                                                    break;

                                                case 'selesai':
                                                    echo '<label class="label label-primary">Selesai</label>';
                                                    break;
                                                } ?></td>
                                            
                                            <td><?= ($surat) ? '<a href="'. base_url('assets/file/surat_masuk/'). $surat->file .'" class="btn btn-sm btn-success" target="_blank"> Lihat </a>' : '-' ?></td>
                                           <!--  <td style="text-align: center !important;">
                                                <div class="btn-group">
                                                    <a class="btn btn-sm btn-success " type="button" href="<?= base_url('user/detail-surat/' . $val->id_surat) ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Surat"><i class="fa fa-eye"></i></a>
                                                    <?php if ($val->status == 'menunggu'): ?>
                                                        
                                                    <button class="btn btn-sm btn-primary " type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Surat" onclick="terima('<?= $val->id_detail ?>')"><i class="fa fa-check"></i></button>
                                                    <?php endif ?>
                                                </div>
                                            </td> -->
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
    
    function terima(id){
        swal({
            title: "Apakah Anda Ingin Menerima Surat ini?",
            text: "Surat akan diubah status menjadi telah diterima",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "green",
            confirmButtonText: "Terima Surat",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: false 
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: "<?= base_url('user') ?>",
                    type: 'POST',
                    data: {
                        id: id,
                        terima: true
                    },
                    success: function() {
                        // swal("Dihapus!", "Data Telah Dihapus.", "success");
                        location.reload();
                    }
                });
            } else {
                swal("Batal", "Anda Harus menerima surat :)", "error");
            }
        });
    }
</script>