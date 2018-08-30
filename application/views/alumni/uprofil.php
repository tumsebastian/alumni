<?php
if ($alumni->foto_profil==''){
	$pp=base_url()."assets/img/faces/avatar.png";
}else{$pp=base_url()."assets/img/pp/".$alumni->foto_profil;}
?>
<form action="<?php echo base_url('proses/ualumni/'.$alumni->no_identitas)?>" method="post">
	<div class="col-md-8">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title">Ubah data Alumni <?php echo $alumni->nama?></h3>
				
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">contact_mail</i></span>
					<div class="form-group label-floating">
						<label class="control-label">No Identitas</label>
						<input type="number" name="noid" class="form-control" value="<?php echo $alumni->no_identitas?>">
					</div>
				</div>
				<div class="input-group col-sm-6">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NIM</label>
						<input type="number" name="nim" class="form-control" value="<?php echo $alumni->nim?>">
					</div>
				</div>
				<!-- <div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NISN</label>
						<input type="number" name="nisn" class="form-control" value="<?php echo $alumni->nisn?>">
					</div>
				</div> -->
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">account_box</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama</label>
						<input type="text" name="nama" class="form-control" value="<?php echo $alumni->nama?>">
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Tempat Lahir</label>
						<input type="text" name="tlahir" class="form-control" value="<?php echo $alumni->tempat_lahir?>">
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Tanggal Lahir</label>
						<input type="text" name="tgllahir" class="form-control datepicker" value="<?php echo date("d-m-Y",$alumni->tgl_lahir)?>">
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">wc</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jenis Kelamin</label>
						<select name="jk" class="selectpicker" data-style="btn btn-success btn-round" title="Jenis Kelamin" data-size="7">
							<option value="L" <?php if ($alumni->jk=="L"){echo "selected";}?>>Laki-laki</option>
							<option value="P" <?php if ($alumni->jk=="P"){echo "selected";}?>>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">info_outline</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jurusan</label>
						<select name="jurusan" class="selectpicker" data-style="btn btn-success btn-round" title="Jurusan" data-size="7" required>
							<option value="AKT" <?php if ($alumni->jurusan=="AKT"){echo "selected";}?>>AKUNTANSI</option>
							<option value="MGT" <?php if ($alumni->jurusan=="MGT"){echo "selected";}?>>MANAJEMEN</option>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Angkatan</label>
						<select name="angkatan" class="selectpicker" data-style="btn btn-success btn-round" title="Angkatan" data-size="7">
							<?php for ($i=1970;$i<=date("Y");$i++){?>
							<option value="<?php echo $i?>" <?php if ($alumni->angkatan==$i){echo "selected";}?>><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Lulusan</label>
						<select name="lulusan" class="selectpicker" data-style="btn btn-success btn-round" title="Lulusan" data-size="7">
							<?php for ($i=1945;$i<=date("Y");$i++){?>
							<option value="<?php echo $i?>" <?php if ($alumni->th_lulus==$i){echo "selected";}?>><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Alamat</label>
						<input type="text" name="alamat" class="form-control" value="<?php echo $alumni->alamat_skrg?>">
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">group</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Status</label>
						<input type="text" name="status" class="form-control" value="<?php echo $alumni->status?>">
					</div>
				</div>
				<div class="input-group col-sm-6">
					<span class="input-group-addon"><i class="material-icons">phone</i></span>
					<div class="form-group label-floating">
						<label class="control-label">No Hp/Telp</label>
						<input type="number" name="telp" class="form-control" value="<?php echo $alumni->telp?>">
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">work</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama Perusahaan</label>
						<input type="text" name="nm_perusahaan" class="form-control" value="<?php echo $alumni->nm_perusahaan?>">
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Alamat Perusahaan</label>
						<input type="text" name="alamat_perusahaan" class="form-control" value="<?php echo $alumni->alamat_perusahaan?>">
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">domain</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jabatan/Posisi</label>
						<input type="text" name="pekerjaan" class="form-control" value="<?php echo $alumni->pekerjaan?>">
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">mail</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $alumni->email?>">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">Simpan Profil</button>
			</div>
		</div>
	</div>
</form>
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#" id="gmbpp"><img class="img" src="<?php echo $pp?>" /></a>
			</div>
			<div class="content">
				<?php if (nura_des($this->session->userdata(nura_enc('noid')))==$alumni->no_identitas){?>
				<button class="btn btn-warning btn-raised btn-round" data-toggle="modal" data-target="#UbahPP">Ubah Foto Profil</button>
				<?php }?>
			</div>
		</div>
	</div>
	
	<!-- Classic Modal -->
                                            <div class="modal fade" id="UbahPP" tabindex="-1" role="dialog" aria-labelledby="ModalUbahPP" aria-hidden="true">
                                                <div class="modal-dialog modal-small">
																									<form id="fuploadpp" action="<?php echo base_url('proses/upp/'.$alumni->no_identitas)?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                <i class="material-icons">clear</i>
                                                            </button>
                                                            <h4 class="modal-title">Ubah Foto Profil</h4>
                                                        </div>
                                                        <div class="modal-body">
                                            <div class="col-sm-12" align="center">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img class="img" src="<?php echo $pp?>" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-warning btn-file btn-sm">
                                                        <span class="fileinput-new">Pilih Gambar</span>
                                                        <span class="fileinput-exists">Ganti</span>
                                                        <input type="file" name="pp" accept="image/JPEG"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists btn-sm" data-dismiss="fileinput"><i class="material-icons">clear</i> Hapus</a>
                                                </div>
                                            </div>
																						</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-simple">Simpan</button>
                                                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
																									</form>
                                                </div>
                                            </div>
                                            <!--  End Modal -->
																						
<script>
	$(document).ready(function(e){
		$("#fuploadpp").on("submit",(function(e){
			e.preventDefault();
			$.ajax({
				url:"<?php echo base_url('proses/upp').'/'.$alumni->no_identitas?>",
				type:"POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data){
					swal({
                title: 'Sukse...',
                text: "Foto Profil berhasil diperbarui..",
                type: 'success',
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false
            });
						$("#gmbpp").html(data);
						$("#UbahPP").modal("hide");
				},
				error: function(){
					swal({
                title: 'Upload GAGAL.!!',
                text: "Silahkan ulangi beberapa saat lagi.!",
                type: 'warning',
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false
            });
				}
			})
		}))
	})
</script>