<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INSPINIA | Register</title>
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/plugins/iCheck/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/animate.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/plugins/datapicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/inspinia') ?>/static_full_version/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Pendaftaran Calon Santri</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10"><input type="text" class="form-control"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Jenis Kelamin </label>
                                <div class="col-sm-10">
                                    <div><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Laki-Laki</label>
                                    <label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Perempuan</label></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Tempat Lahir</label>
                            <div class="col-sm-10"><input type="text" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group" id="data_1"><label class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" value="--/--/----">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Berat & Tinggi Badan</label>
                    <div class="col-sm-2">
                        <div class="input-group m-b"><input type="text" class="form-control"> <span class="input-group-addon">kg</span></div>
                        <div class="input-group m-b"><input type="text" class="form-control"> <span class="input-group-addon">cm</span></div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10"><textarea name="alamat" class="form-control"></textarea>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto Terbaru</label>
                    <div class="col-sm-10">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ijazah/SKHU</label>
                    <div class="col-sm-10">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white" type="submit">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</body>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/inspinia.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="<?= base_url('assets/inspinia') ?>/Static_Full_Version/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('#data_1 .input-group.date').datepicker({
todayBtn: "linked",
keyboardNavigation: false,
forceParse: false,
calendarWeeks: true,
autoclose: true
});
});
</script>