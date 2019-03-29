<link href="<?= base_url() ?>/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<script src="<?= base_url() ?>/assets/js/plugins/daterangepicker/daterangepicker.js"></script>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Periode</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="active">
				<strong>Data Periode</strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">
	</div>
</div>
<div class="wrapper wrapper-content  animated fadeInRight">
	<div class="row">
		<div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Masukan Data Periode</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
							<i class="fa fa-chevron-up"></i>
						</a>
						<a class="close-link">
							<i class="fa fa-times"></i>
						</a>
					</div>
				</div>
				<div class="ibox-content">
					<!-- <form method="get" class="form-horizontal"> -->
					<?= form_open('admin/tambah_periode',['class' => 'form-horizontal']); ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Periode</label>
							<div class="col-sm-10">
								<input type="text" name="nama" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Deskripsi Singkat</label>
							<div class="col-sm-10">
								<textarea name="deskripsi" class="form-control" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group" id="data_5">
							<label class="col-sm-2 control-label">Waktu Periode</label>
							<div class="col-sm-10">
								<div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="input-sm form-control" name="start" >
                                    <span class="input-group-addon">sampai</span>
                                    <input type="text" class="input-sm form-control" name="end" >
                                </div>
							</div>
						</div>
						
						
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-white" type="submit">Cancel</button>
								<input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

        $(document).ready(function(){
			$('#data_5 .input-daterange').datepicker({
		                keyboardNavigation: false,
		                forceParse: false,
		                autoclose: true,
		                format : 'yyyy-mm-dd'
		            });
			$('input[name="daterange"]').daterangepicker();
		});
</script>