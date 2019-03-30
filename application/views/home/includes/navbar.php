<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <i class="fa fa-reorder"></i>
            </button>
            <a href="#" class="navbar-brand">Pondok Pesantren Al-Bahja</a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Data Master <span class="caret"></span></a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="">Visi Misi</a></li>
                        <li><a href="">Tentang</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('home/informasi') ?>"> Informasi </a>
                </li>
                <li>
                    <a href="<?= base_url('register') ?>"> Pendaftaran </a>
                </li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?= base_url('login') ?>">
                        <i class="fa fa-sign-out"></i> Login
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>