<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Pendaftar Ulang</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Admin</a>
            </li>
            <li class="active">
                <strong>Data Pendaftar Ulang</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Table Pendaftar</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
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
                                    <td class="center"><a href="<?= base_url('admin/detail_calon/' . $value->id_calon) ?>" class="btn btn-success">Detail</a></td>
                                </tr>
                                    
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                    <th>Tempat, Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>