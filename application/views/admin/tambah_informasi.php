<link href="<?= base_url() ?>/assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
<script src="<?= base_url() ?>/assets/js/plugins/daterangepicker/daterangepicker.js"></script>

<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Informasi</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="active">
				<strong>Data Informasi</strong>
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
					<h5>Masukan Informasi</h5>
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
					<?= form_open('admin/tambah_informasi',['class' => 'form-horizontal']); ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Judul Informasi </label>
							<div class="col-sm-10">
								<input type="text" name="judul" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Isi</label>
							<div class="col-sm-10">
								<textarea name="isi" class="form-control" rows="4"></textarea>
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