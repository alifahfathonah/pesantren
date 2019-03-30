<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Pendaftar</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Admin</a>
            </li>
            <li class="active">
                <strong>Data Pendaftar</strong>
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
                    <h5>Data Pendaftar</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= $data->nama_santri ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat , Tanggal Lahir</td>
                                        <td><?= $data->tempat_lahir ?> , <?= $data->tanggal_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td><?= ($data->jenis_kelamin == 'L') ? 'Laki Laki' : 'Perempuan' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode </td>
                                        <td><?= $this->Periode_m->get_row(['id_periode' => $data->id_periode])->nama ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>