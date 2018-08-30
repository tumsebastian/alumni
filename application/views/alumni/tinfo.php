<form action="<?php echo base_url('proses/tinfo/ik')?>" method="post">
<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">assignment</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Tambah Data Karir Center</h4>
			<form method="post" action="<?php echo base_url().'proses/tinfo/ik'?>">
				<div class="form-group label-floating">
					<label class="control-label">Judul Informasi</label>
					<input type="text" name="judul" class="form-control" required>
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Isi Informasi</label>
					<textarea name="isi" class="form-control" rows="15" required></textarea>
				</div>
			</form>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-success">Simpan Informasi</button>
		</div>
	</div>
</div>
</form>