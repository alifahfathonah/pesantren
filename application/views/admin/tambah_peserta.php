<div class="row">
    <div class="col-md-12">
    	<div class="portlet light">
    		<div class="portlet-title">   			
     <button class="btn btn-primary" data-toggle="collapse" data-target="#tes"><i class="fa fa-plus"></i> Tambah Peserta</button>
    		</div>
    		<div class="portlet-body collapse" id="tes" >
                <?=form_open_multipart('admin/tambah_peserta');  ?>
    			<div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
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
        <div class="portlet light">
            <div class="portlet-title">
                Peserta
            </div>
             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1_2">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Name</th>
                                                <th>Total Votes</th>
                                                <th>Temp Votes</th>
                                                <th>Detail</th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>1</td>
                                                <td>Dummy</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>dummy</td>
                                                <td>
                                                    <div class="btn-group">
                                                    <a type="button" href="<?=base_url('admin/edit_peserta')?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit Data</a>
                                                     <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i> Edit Votes</button>
                                                     <button class="btn btn-xs btn-danger" data-target="#exampleModal"><i class="fa fa-trash"></i> Hapus Data</button>
                                                     </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
        </div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'editor1' );
        CKEDITOR.replace( 'editor2' );
</script>