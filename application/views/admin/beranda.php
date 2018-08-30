<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">assignment</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Data <?php if ($jns=='iu'){echo "Informasi Umum";}else{echo "Karir Center";}?></h4>
			<div class="toolbar">
				<a href="<?php echo base_url().'admin/tinfo/'.$jns;?>" class="btn btn-danger btn-sm">Tambah</a>
			</div>
			<div class="material-datatables">
				<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Isi</th>
							<th>Waktu</th>
							<th class="disabled-sorting text-right">Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Judul</th>
							<th>Isi</th>
							<th>Waktu</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $no=1; foreach ($info as $r){?>
						<tr>
							<td><?php echo $no?></td>
							<td><a href="<?php echo base_url("admin/info")."/".nura_enc($r->no_info)?>"><?php echo $r->judul_info?></a></td>
							<td><?php echo $this->M_data->bts_kata(strip_tags($r->isi),6)?>...</td>
							<td><?php echo $this->M_data->waktu($r->waktu)?></td>
							<td class="text-right">
								<a href="<?php echo base_url('admin/komentar/'.$jns.'/'.$r->no_info)?>" class="btn btn-simple btn-success btn-icon comment" title="Komentar"><?php echo $this->M_data->jml("tb_komentar",array("no_info"=>$r->no_info))?> <i class="material-icons">comment</i></a>
								<a href="<?php echo base_url('admin/uinfo/'.$jns.'/'.$r->no_info)?>" class="btn btn-simple btn-warning btn-icon edit" title="ubah"><i class="material-icons">dvr</i></a>
								<a href="#" onclick="konfhapus('<?php echo $r->no_info?>')" class="btn btn-simple btn-danger btn-icon remove" title="hapus"><i class="material-icons">close</i></a>
							</td>
						</tr>
						<?php $no+=1;}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	function konfhapus(a){
		if (confirm("Yakin ingin menghapus data ini "+a+".?")==true){
			location.href="<?php echo base_url("proses/hinfo/".$jns)?>/"+a;
		}
	}
</script>