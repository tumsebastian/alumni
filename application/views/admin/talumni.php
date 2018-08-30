<form action="<?php echo base_url('proses/talumni/')?>" method="post">
	<div class="col-md-8">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title">Tambah data Alumni</h3>
				
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">contact_mail</i></span>
					<div class="form-group label-floating">
						<label class="control-label">No Identitas</label>
						<input type="number" name="noid" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-6">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NIM</label>
						<input type="number" name="nim" class="form-control" required>
					</div>
				</div>
				<!-- <div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NISN</label>
						<input type="number" name="nisn" class="form-control" required>
					</div>
				</div> -->
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">account_box</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama</label>
						<input type="text" name="nama" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Tempat Lahir</label>
						<input type="text" name="tlahir" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Tanggal Lahir</label>
						<input type="text" name="tgllahir" class="form-control datepicker" required>
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">wc</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jenis Kelamin</label>
						<select name="jk" class="selectpicker" data-style="btn btn-success btn-round" title="Jenis Kelamin" data-size="7" required>
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">info_outline</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jurusan</label>
						<select name="jurusan" class="selectpicker" data-style="btn btn-success btn-round" title="Jurusan" data-size="7" required>
							<option value="AKT">AKUNTANSI</option>
							<option value="MGT">MANAJEMEN</option>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Angkatan</label>
						<select name="angkatan" class="selectpicker" data-style="btn btn-success btn-round" title="Angkatan" data-size="7" required>
							<?php for ($i=1945;$i<=date("Y");$i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-6 col-md-4">
					<span class="input-group-addon"><i class="material-icons">event</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Lulusan</label>
						<select name="lulusan" class="selectpicker" data-style="btn btn-success btn-round" title="Lulusan" data-size="7" required>
							<?php for ($i=1945;$i<=date("Y");$i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Alamat</label>
						<input type="text" name="alamat" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">group</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Status</label>
						<input type="text" name="status" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">phone</i></span>
					<div class="form-group label-floating">
						<label class="control-label">No Hp/Telpon</label>
						<input type="text" name="telp" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">work</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama Perusahaan</label>
						<input type="text" name="nm_perusahaan" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">home</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Alamat Perusahaan</label>
						<input type="text" name="alamat_perusahaan" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">domain</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Jabatan/Posisi</label>
						<input type="text" name="pekerjaan" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">mail</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-12">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Kata Sandi</label>
						<input type="password" name="sandi" class="form-control" required>
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
				<a href="#"><img class="img" src="<?php echo base_url()."assets/img/faces/avatar.png"?>" /></a>
			</div>
			<div class="content">
				<a href="" class="btn btn-warning">Tambah Foto Profil</a>
			</div>
		</div>
	</div>
