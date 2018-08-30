<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">comments</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Data Komentar (<b><?php echo $judul?></b>)</h4>
			<div class="toolbar">
				<a href="<?php echo base_url().'admin/tkomen/'.$jns;?>" class="btn btn-danger btn-sm">Tambah</a>
			</div>
			<div class="material-datatables">
				<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Isi Komentar</th>
							<th>Waktu</th>
							<th class="disabled-sorting text-right">Aksi</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Isi Komentar</th>
							<th>Waktu</th>
							<th></th>
						</tr>
					</tfoot>
					<tbody>
						<?php $no=1; foreach ($komen as $r){?>
						<tr>
							<td><?php echo $no?></td>
							<td><a href="<?php echo base_url("admin/profil")."/".nura_enc($r->no_identitas)?>"><?php echo $this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->nama?></a></td>
							<td><?php echo $r->isi?></td>
							<td><?php echo $this->M_data->waktu($r->waktu)?></td>
							<td class="text-right">
								<a href="#" onclick="konfhapus('<?php echo $r->nomor?>')" class="btn btn-simple btn-danger btn-icon remove" title="hapus"><i class="material-icons">close</i></a>
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
			location.href="<?php echo base_url("proses/hkomen/")?>"+a;
		}
	}
</script>