<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">assignment</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Data Alumni SMK Negeri 1 Ketapang Lampung Selatan</h4>
			<div class="toolbar">
				<a href="<?php echo base_url("admin/talumni")?>" class="btn btn-dager btn-sm">Tambah</a>
				<?php if ($pil=="N"){?><a href="<?php echo base_url("admin/data_alumni/aktif")?>" class="btn btn-primary btn-sm pull-right">Alumni Aktif</a><?php }else{?>
				<a href="<?php echo base_url("admin/data_alumni/unconfirm")?>" class="btn btn-primary btn-sm pull-right">Alumni Belum Terkonfirmasi</a><?php }?>
				<a href="<?php echo base_url("admin/cariprint")?>" class="btn btn-success btn-sm pull-right"><i class="material-icons">print</i> print</a>
			</div>
			<div class="material-datatables">
				<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Jurusan</th>
							<th>Angkatan</th>
							<th>Status</th>
							<th>Pekerjaan</th>
							<th class="disabled-sorting text-right">Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Jurusan</th>
							<th>Angkatan</th>
							<th>Status</th>
							<th>Pekerjaan</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($alumni as $r){?>
						<tr>
							<td><a href="<?php echo base_url("admin/profil")."/".nura_enc($r->no_identitas)?>"><?php echo $r->nama?></a></td>
							<td><?php echo $r->alamat_skrg?></td>
							<td><?php echo $r->jurusan?></td>
							<td><?php echo $r->angkatan?></td>
							<td><?php echo $r->status?></td>
							<td><?php echo $r->pekerjaan?></td>
							<td class="text-right">
								<a href="<?php echo base_url('admin/uprofil/'.nura_enc($r->no_identitas))?>" class="btn btn-simple btn-warning btn-icon edit" title="ubah"><i class="material-icons">dvr</i></a>
								<a href="#" onclick="konfhapus('<?php echo $r->no_identitas?>')" class="btn btn-simple btn-danger btn-icon remove" title="hapus"><i class="material-icons">close</i></a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	function konfhapus(a){
		if (confirm("Yakin ingin menghapus data ini "+a+".?")==true){
			location.href="<?php echo base_url("proses/halumni")?>/"+a;
		}
	}
</script>