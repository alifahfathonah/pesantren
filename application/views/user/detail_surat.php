<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
    <h2>Data Surat Masuk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url() ?>">Home</a>
            </li>
            <li class="active">
                <strong>Detail Surat Masuk</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="m-b-md">
                                        <h2><?= $data->nama ?></h2>
                                        <hr>
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Tanggal Masuk :</dt> <dd><?= $this->tanggal->convert_date($data->tanggal_masuk) ?></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-7">
                                    <dl class="dl-horizontal">
                                        <dt>Nomor Agenda</dt><dd><?= $data->no_agenda ?></dd>
                                        <dt>Sifat Surat</dt><dd><?= $data->sifat_surat ?></dd>

                                        <dt>Jenis Surat:</dt> <dd>  <?= $this->Jenis_surat_m->get_row(['id_jenis' => $data->id_jenis_surat])->jenis ?></dd>
                                        <dt>Kode Hal:</dt> <dd>  <?= $this->Kode_hal_m->get_row(['id_hal' => $data->kode_hal])->rincian ?></dd>
                                        <dt>File Surat:</dt> <dd><a href="<?= base_url('assets/file/surat_masuk/' . $data->file) ?>" target="_blank" class="btn btn-xs btn-primary">Lihat Surat</a></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt>Detail Surat:</dt>
                                        <dd>
                                            <?= $data->deskripsi ?>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <dl class="dl-horizontal">
                                        <dt>
                                        <?php 
                                        $det_a = $this->Detail_surat_m->get_row(['id_delegasi' => $this->session->userdata('kode') , 'id_surat' => $data->id_surat]);
                                        if($det_a->status == 'menunggu') :
                                         ?>
                                            <button class="btn btn-sm btn-primary " type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Terima Surat" onclick="terima('<?= $det_a->id_detail ?>')"><i class="fa fa-check"></i> Terima Surat</button>
                                        <?php elseif($det_a->status =='diterima') : ?>
                                            <button class="btn btn-sm btn-success " type="button" data-toggle="modal" data-target="#delegasi" onclick="delegasi('<?= $det_a->id_surat ?>' , '<?= $det_a->id_detail ?>' )"><i class="fa fa-send" ></i> Disposisikan Surat</button>
                                        <?php endif; ?>
                                        </dt>
                                        <?php if($det_a->status == 'menunggu') : ?>
                                            
                                            <dd>
                                                <button class="btn btn-sm btn-primary " type="button" onclick="selesai('<?= $det_a->id_detail ?>' )"><i class="fa fa-check" ></i> Selesai</button>
                                            </dd>
                                        <?php elseif ($det_a->status = 'selesai'): ?>
                                            <dd>
                                                
                                                <?php if (file_exists(base_url('assets/hasil/' . $det_a->id_surat .'.pdf'))) : ?>
                                                    <a href="<?= base_url('assets/hasil/'. $det_a->id_surat .'.pdf') ?>" class="btn btn-xs btn-info">Lihat hasil Scan</a>
                                                <?php endif; ?>
                                            </dd>
                                        <?php endif ?>
                                        <hr>
                                    </dl>
                                </div>
                            </div>

                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#tab-1" data-toggle="tab">Aktivitas Surat</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab-1">
                                                    <table class="table table-striped table-responsive datable">
                                                        <thead>
                                                            <tr>
                                                                <th>Status</th>
                                                                <th>Dari</th>
                                                                <th>Tanggal Disposisi</th>
                                                                <th>Kepada</th>
                                                                <th>Tanggal Diterima</th>
                                                                <th>Isi Disposisi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($detail as $det): ?>
                                                            <?php if ($det->id_delegasi === $kode): ?>    
                                                            <tr style="background-color: #b3ffb3 !important; color: black !important;">
                                                            <?php else : ?>
                                                            <tr >
                                                            <?php endif; ?>
                                                                <td>
                                                                    <?php 
                                                                        switch ($det->status) {
                                                                            case 'menunggu':
                                                                                echo '<span class="label label-warning"><i class="fa fa-warning"></i>  Menunggu</span>';
                                                                                break;
                                                                            case 'diterima':
                                                                                echo '<span class="label label-success"><i class="fa fa-info"></i>  Diterima</span>';
                                                                                break;
                                                                            case 'delegasi':
                                                                                echo '<span class="label label-info"><i class="fa fa-check"></i> Didisposisikan</span>';
                                                                                break;
                                                                            case 'selesai':
                                                                                echo '<span class="label label-primary"><i class="fa fa-check"></i> Selesai</span>';
                                                                                break;
                                                                         } 
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?= ($this->Unit_m->get_row(['unit' => $det->id_unit])) ? $this->Unit_m->get_row(['unit' => $det->id_unit])->unit . ' - ' . $this->Unit_m->get_row(['unit' => $det->id_unit])->nama_unit : '-' ?>
                                                                </td>
                                                                <td>
                                                                    <?= $this->tanggal->convert_date($det->date_unit) ?>
                                                                </td>
                                                                <td>
                                                                    <?= ($this->Unit_m->get_row(['unit' => $det->id_delegasi])) ? $this->Unit_m->get_row(['unit' => $det->id_delegasi])->unit . ' - ' . $this->Unit_m->get_row(['unit' => $det->id_delegasi])->nama_unit : '-' ?>
                                                                </td>
                                                                <td style="text-align: center !important;">
                                                                    <?php 
                                                                        if($det->date_delegasi) { 
                                                                            echo $this->tanggal->convert_date($det->date_delegasi); 
                                                                        }
                                                                        else{
                                                                            $start_date = new DateTime($det->date_unit);
                                                                            $end_date = new DateTime(date("Y-m-d"));
                                                                            $interval = $start_date->diff($end_date);
                                                                            
                                                                            if ($interval->days > 3) 
                                                                                echo '<span class="label label-danger"><i class="fa fa-warning"></i>&nbsp;  '.$interval->days.' hari</span>';
                                                                            else
                                                                                echo '<span class="label label-info"><i class="fa fa-info"></i>&nbsp;  '.$interval->days.' hari</span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <p class="small">
                                                                        <?= ($det->komentar) ? $det->komentar : '-' ?>
                                                                    </p>
                                                                </td>
                                                            </tr>           
                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal inmodal" id="delegasi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <?= form_open('user/surat-masuk') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-send modal-icon"></i>
                <h4 class="modal-title">Disposisikan Surat</h4>
                <!-- <small class="font-bold">delegasikan sura</small> -->
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_surat" id="id_surat">
                <input type="hidden" name="id_det" id="id_det">
                <div class="form-group">
                    <label>Unit yang akan didelegasikan</label> 
                    <select name="id_delegasi" class="form-control">
                        <option value="">= Silahkan Pilih</option>
                        <?php foreach ($this->Unit_m->get() as $value): ?>
                            <option value="<?= $value->unit ?>"><?= $value->unit . ' - ' . $value->nama_unit ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Isi Disposisi</label>
                    <textarea name="komentar" class="form-control" rows="5"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <input name="simpan" class="btn btn-primary" type="submit" value="Disposisikan">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- end of modal -->

<div class="modal inmodal" id="up" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <?= form_open_multipart('user/surat-masuk') ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-send modal-icon"></i>
                <h4 class="modal-title">Upload Hasil Disposisi Surat</h4>
                <!-- <small class="font-bold">delegasikan sura</small> -->
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_surat" id="id_surat">
                <input type="hidden" name="id_det" id="id_det">
                <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <input name="upload" class="btn btn-primary" type="submit" value="Disposisikan">
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
    function delegasi(id_surat , id_det){
        console.log(id_surat);
        $("#id_surat").val(id_surat);
        $("#id_det").val(id_det);
    }

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
                swal("Batal", "Data Aman :)", "error");
            }
        });
    }

    function selesai(id){
        swal({
            title: "Apakah Anda Ingin Menyelesaikan Surat ini?",
            text: "Surat akan diubah status menjadi selesai",
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
                        selesai: true
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