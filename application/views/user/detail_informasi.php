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
<div class="wrapper wrapper-content  animated fadeInRight article">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="text-center article-title">
                            <span class="text-muted"><i class="fa fa-clock-o"></i> <?= $this->tanggal->convert_date($data->date) ?></span>
                                <h1>
                                    <?= $data->judul ?>
                                </h1>
                            </div>
                            <p>
                                <?= $data->isi ?>
                            </p>
                            


                        </div>
                    </div>
                </div>
            </div>


        </div>