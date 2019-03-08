<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">
    			Edit Peserta
    		</div>
    		<div class="portlet-body">
                <?=form_open_multipart('admin/edit_peserta');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <img src="" class="img img-tumbnail" width= "25%">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama </label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis" class="form-control">
                                <option value="">== silahkan pilih ==</option>
                                <option value="l">Laki-laki</option>
                                <option value="p">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control">
                                <option value="">== silahkan pilih ==</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">kristen</option>
                                <option value="Hindu">hindu</option>
                                <option value="Buddha">buddha</option>
                                <option value="Kong fhu chu">kong fhu chu</option>
                            </select>
                        </div>
                    </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Fakultas </label>
                            <input type="text" name="fakultas" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Jurusan </label>
                            <input type="text" name="jurusan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan </label>
                            <input type="text" name="jurusan" class="form-control">
                        </div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                
                </div>
                </div>
                <?= form_close(); ?>
    		</div>
    	</div>