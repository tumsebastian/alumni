<?php
if ($alumni->foto_profil==''){
	$pp=base_url()."assets/img/faces/avatar.png";
}else{$pp=base_url()."assets/img/pp/".$alumni->foto_profil;}
?>
	<div class="col-md-8">
		<div class="card card-stats">
			<div class="card-header" data-background-color="green">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title"><?php echo $alumni->nama?></h3>
				<div class="table-responsive">
					<br>
					<table class="table">
						<tbody>
							<tr>
								<th>No Identitas</th>
								<td><?php echo $alumni->no_identitas?></td>
							</tr>
							<tr>
								<th>NIM</th>
								<td><?php echo $alumni->nim ?></td>
							</tr>
							<tr>
								<th>Nama</th>
								<td><?php echo $alumni->nama?></td>
							</tr>
							<tr>
								<th>Tempat, Tanggal Lahir</th>
								<td><?php echo $alumni->tempat_lahir.", ".date("d M Y",$alumni->tgl_lahir)?></td>
							</tr>
							<tr>
								<th>Jenis Kelamin</th>
								<td><?php if ($alumni->jk=="L"){echo "Laki-laki";}else{echo "Perempuan";}?></td>
							</tr>
							<tr>
								<th>Angkatan/Lulusan</th>
								<td><?php echo $alumni->angkatan." / ".$alumni->th_lulus?></td>
							</tr>
							<tr>
								<th>Alamat</th>
								<td><?php echo $alumni->alamat_skrg?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $alumni->status?></td>
							</tr>
							<tr>
								<th>No Hp/Telpon</th>
								<td><?php echo $alumni->telp?></td>
							</tr>
							<tr>
								<th>Nama Perusahaan</th>
								<td><?php echo $alumni->nm_perusahaan?></td>
							</tr>
							<tr>
								<th>Alamat Perusahaan</th>
								<td><?php echo $alumni->alamat_perusahaan?></td>
							</tr>
							<tr>
								<th>Pekerjaan</th>
								<td><?php echo $alumni->pekerjaan?></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><?php echo $alumni->email?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#"><img class="img" src="<?php echo $pp?>" /></a>
			</div>
			<div class="content">
				<h4 class="card-title"><?php echo $alumni->nama?></h4>
				<h6 class="category text-gray">(<?php echo $alumni->angkatan.' - '.$alumni->th_lulus?>)</h6>
			</div>
			<div class="card-footer">
				<a href="<?php echo base_url('admin/uprofil/'.nura_enc($alumni->no_identitas))?>" class="btn btn-warning">Ubah Profil</a>
				<a href="<?php echo base_url('admin/uakun/'.nura_enc($alumni->no_identitas))?>" class="btn btn-warning">Ubah Sandi</a>
			</div>
		</div>
	</div>