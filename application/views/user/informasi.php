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
<div class="wrapper wrapper-content  animated fadeInRight blog">
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($data as $value): ?>
            <div class="ibox">
                <div class="ibox-content">
                    <a href="article.html" class="btn-link">
                        <h2>
                        <?= $value->judul ?>
                        </h2>
                    </a>
                    <div class="small m-b-xs">
                        <strong>Administrator</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> <?= $this->tanggal->convert_date($value->date) ?></span>
                    </div>
                    <p>
                        <?= $value->isi ?>
                    </p>
                    <!-- <div class="row">
                        <div class="col-md-6">
                            <h5>Tags:</h5>
                            <button class="btn btn-primary btn-xs" type="button">Model</button>
                            <button class="btn btn-white btn-xs" type="button">Publishing</button>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-right">
                                <h5>Stats:</h5>
                                <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                                <i class="fa fa-eye"> </i> 144 views
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>