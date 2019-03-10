<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Data Calon Santri</h2>
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
                                    <th>Dokumen</th>
                                    <th>Foto</th>
                                    <th>Nilai Ujian</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>A</td>
                                    <td>palembang, kemaren</td>
                                    <td>L</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">Belum Diinput</td>
                                    <td class="center">Belum Diinput</td>
                                    <td><a data-toggle="modal" class="btn btn-primary" href="#modal-form">Ubah Status</a></td>
                                </tr>
                                <tr>
                                    <td>B</td>
                                    <td>palembang, kemaren</td>
                                    <td>L</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">Belum Diinput</td>
                                    <td class="center">Belum Diinput</td>
                                    <td><a data-toggle="modal" class="btn btn-primary" href="#modal-form">Ubah Status</a></td>
                                </tr>
                                <tr>
                                    <td>C</td>
                                    <td>palembang, kemaren</td>
                                    <td>L</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">Belum Diinput</td>
                                    <td class="center">Belum Diinput</td>
                                    <td><a data-toggle="modal" class="btn btn-primary" href="#modal-form">Ubah Status</a></td>
                                </tr>
                                <tr>
                                    <td>D</td>
                                    <td>palembang, kemaren</td>
                                    <td>L</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">Belum Diinput</td>
                                    <td class="center">Belum Diinput</td>
                                    <td><a data-toggle="modal" class="btn btn-primary" href="#modal-form">Ubah Status</a></td>
                                </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Dokumen</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div id="modal-form" class="modal fade" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="row">
                                        <div><h3 class="m-t-none m-b">Data Calon</h3>
                                            <form role="form">
                                                <div class="form-group"><label>Nama</label> <input type="nama" placeholder="" class="form-control" readonly></div>
                                                <div class="form-group"><label>Jenis Kelamin</label> <input type="jk" placeholder="" class="form-control" readonly></div>
                                                <div class="form-group"><label>Tempat, Tanggal Lahir</label> <input type="ttl" placeholder="" class="form-control" readonly></div>
                                                <div class="form-group"><label>Nilai Ujian</label> <input type="nilai" placeholder="" class="form-control" ></div>
                                                <div class="form-group"><label>Status</label>
                                                <select class="form-control m-b" name="account">
                                                    <option>==Belum Diinput==</option>
                                                    <option>Lulus</option>
                                                    <option>Belum Lulus</option>
                                                </select>
                                            </div>
                                            <div>
                                                <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Ubah</strong></button>
                                            </div>
                                        </form>
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