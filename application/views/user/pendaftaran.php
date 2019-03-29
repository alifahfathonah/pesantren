<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Blog</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a>Miscellaneous</a>
            </li>
            <li class="active">
                <strong>Blog</strong>
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
                    <h5>Riwayat Pendaftaran Anda</h5>
                    <div class="ibox-tools">
                        <a href="<?= base_url('user/daftar') ?>" class="btn btn-primary btn-sm">Tambah Pendaftar</a>
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
                                    <th>Nama</th>
                                    <th>Tempat , Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $value): ?>
                                <tr>
                                    <td><?= $value->nama_santri ?></td>
                                    <td><?= $value->tempat_lahir ?> , <?= $value->tanggal_lahir ?></td>
                                    <td><?= ($value->jenis_kelamin === 'L') ? 'Laki Laki' : 'Perempuan' ?></td>

                                    <td class="center"><?= $this->Periode_m->get_row(['id_periode' => $value->id_periode])->nama ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?= base_url('user/edit_daftar/' . $value->id_calon) ?>" class="btn btn-primary">Edit</a>
                                            <!-- <a href="#" class="btn btn-success">Detail</a> -->
                                            <a href="#" class="btn btn-danger">Hapus</a>
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