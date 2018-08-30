<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="red">
			<i class="material-icons">assignment</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Data Pesan</h4>
			<div class="toolbar">
				<button class="btn btn-danger btn-sm" onclick="kirimchat()">Tambah</button>
			</div>
			<div class="material-datatables">
				<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Pesan</th>
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
						<?php $no=1; foreach ($pesan as $r){?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php if ($r->no_identitas=='Admin'){echo "<b>Admin</b>";}else{echo $this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->nama;}?></td>
							<td><?php echo $this->M_data->bts_kata(strip_tags($r->pesan),5)?>...</td>
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
			location.href="<?php echo base_url("proses/hpesan")?>/"+a;
		}
	}
	function kirimchat(){
		swal({
			title: 'Ketik pesan anda disini..',
      html: '<div class="form-group">' +
							'<input id="pesan" type="text" class="form-control" />' +
            '</div>',
      showCancelButton: true,
      confirmButtonClass: 'btn btn-success',
      cancelButtonClass: 'btn btn-danger',
      buttonsStyling: false
		}).then(function(result) {
			location.href="<?php echo base_url('proses/kirimchat')?>/"+$("#pesan").val();
		}).catch(swal.noop);
	}
</script>