<form action="<?php echo base_url('proses/uakunadm/')?>" method="post">
	<div class="col-md-8">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title">Ubah data Akun Admin</h3>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">person</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Username</label>
						<input type="text" name="user" class="form-control" value="<?php echo $akn->username?>" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Password Lama</label>
						<input type="password" name="sandil" class="form-control" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Password Baru</label>
						<input type="password" name="sandib" class="form-control" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Ulang Password Baru</label>
						<input type="password" name="ulangsandi" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">Simpan Akun</button>
			</div>
		</div>
	</div>
</form>