<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Informasi</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Miscellaneous</a>
            </li>
            <li class="active">
                <strong>Informasi</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Data Informasi</h5>
                    <div class="ibox-tools">
                        <a href="<?= base_url('admin/tambah_informasi') ?>" class="btn btn-primary btn-sm">Tambah Informasi</a>
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTables-example"> 
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value): ?>
                                <tr>
                                    <td><?= $value->judul ?></td>
                                    <td><p><?= $value->isi ?></p></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('admin/edit_informasi/' . $value->id_informasi) ?>" class="btn btn-primary">Edit</a>
                                            <!-- <a href="#" class="btn btn-success">Detail</a> -->
                                            <a href="<?= base_url('admin/informasi?aksi=hapus&id=' . $value->id_informasi) ?>" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>   
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ibox-footer">
                    <span class="pull-right">
                        The righ side of the footer
                    </span>
                    This is simple footer example
                </div>
            </div>
        </div>
    </div>
</div>