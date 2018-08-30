<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">assignment</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Data Alumni SMK Negeri 1 Ketapang Lampung Selatan</h4>
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
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($alumni as $r){?>
						<tr>
							<td><a href="<?php echo base_url("alumni/profil")."/".nura_enc($r->no_identitas)?>"><?php echo $r->nama?></a></td>
							<td><?php echo $r->alamat_skrg?></td>
							<td><?php echo $r->jurusan?></td>
							<td><?php echo $r->angkatan?></td>
							<td><?php echo $r->status?></td>
							<td><?php echo $r->pekerjaan?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>