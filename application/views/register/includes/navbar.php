<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?= base_url() ?>/assets/img/logo.png" width="50px"/>
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $this->session->userdata('nama') ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $this->session->userdata('level') ?><b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>

                <li>
                    <a href="<?= base_url('') . (($this->session->userdata("kode") == "ADMIN") ? 'admin' : 'user') ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Data Master</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?= base_url('admin/data-calon')?>"><i class="fa fa-th-large"></i> <span class="nav-label">Data Pendaftaran</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/data-ujian')?>"><i class="fa fa-user"></i> <span class="nav-label">Data Hasil Ujian</span></a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/data-kelulusan')?>"><i class="fa fa-edit"></i> <span class="nav-label">Data Jenis Surat</span></a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>