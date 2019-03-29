<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Pendaftaran</h2>
		<ol class="breadcrumb">
			<li>
				<a href="index.html">Home</a>
			</li>
			<li class="active">
				<strong>Calon Santri</strong>
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
					<h5>Edit Data Calon Santri yang ingin didaftarkan</h5>
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
					<?= form_open('user/edit_daftar/' . $data->id_calon,['class' => 'form-horizontal']); ?>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nama Calon Santri</label>
							<div class="col-sm-10">
								<input type="text" name="nama" class="form-control" value="<?= $data->nama_santri ?>">
								<input type="hidden" name="id" value="<?= $data->id_calon ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jenis Kelamin</label>
							<div class="col-sm-10">
								<select name="jenis_kelamin" class="form-control">
									<option value="L"> Laki Laki</option>
									<option value="P"> Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tempat Lahir</label>
							<div class="col-sm-10">
								<input type="text" name="tempat_lahir" class="form-control" value="<?= $data->tempat_lahir ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<div class="input-group date">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="tanggal_lahir" class="form-control" value="08/09/2014" value="<?= $data->tanggal_lahir ?>">
								</div>
							</div>
						</div>
						
						
						<div class="hr-line-dashed"></div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-white" type="submit">Cancel</button>
								<input class="btn btn-primary" type="submit" name="daftar" value="Daftarkan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>