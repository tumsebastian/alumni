<form action="<?php echo base_url('admin/cariprint')?>" method="post">
	<div class="col-md-12">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title">Cari Tahun Angkatan</h3>
				
				<div class="input-group col-sm-8">
					<div class="col-sm-4">
						<div class="form-group label-floating">
							<label class="control-label">Tahun Awal</label>
							<input type="number" id="tahunawal" name="tahunawal" class="form-control" required>
						</div>	
					</div>
					<div class="col-sm-4">
						<div class="form-group label-floating">
							<label class="control-label">Tahun Akhir</label>
							<input type="number" id="tahunakhir" name="tahunakhir" class="form-control" required>
						</div>
					</div>
				</div>
				<!-- <div class="input-group col-sm-4">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NIM</label>
						<input type="number" name="nim" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NISN</label>
						<input type="number" name="nisn" class="form-control" required>
					</div>
				</div>
				<div class="input-group col-sm-4">
					<span class="input-group-addon"><i class="material-icons">account_box</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama</label>
						<input type="text" name="nama" class="form-control" onkeypress="return angkadanhuruf(event,'qwertyuioplkjhgfdsazxcvbnmMNBVCXZASDFGHJKLPOIUYTREWQ ',this)" required>
					</div>
				</div> -->
			</div>
			<div class="card-footer">
				<!-- <input type="submit" name="cari" value="Cari"> -->
				<button type="submit" id="btn-search" value="Cari" class="btn btn-success">
					<i class="material-icons">search</i> Cari</button>
				<button type="submit" id="btn-search" value="Cari" class="btn btn-danger" onclick="resetElements();">
					<i class="material-icons">settings_backup_restore</i> Reset</button>
			</div>
			
			<!-- <div class="material-datatables">
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
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div> -->
		</div>
	</div>
</form>
<div class="card">
		
	<?php if (isset($result_display)): ?>
		<div class="card-content">
			<h4 class="card-title">Data Alumni </h4>
			
		<?php if ($result_display == 'No record found !'): ?>
			<h2><?= $result_display ?></h2>
		
	<?php else: ?>
			<!-- <div class="toolbar">
				<button class="btn btn-success btn-sm pull-right" onclick="myFunction()"><i class="material-icons">print</i> Print</button>
				
			</div> -->
			<div class="material-datatables">
				<!-- <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
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
						<?php foreach ($result_display as $r){?>
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
				</table> -->
				<table class="table table-hover tablesorter pdf_border">
			        <thead>
			            <tr class="pdf_border">
			                <th class="header pdf_border">NIM</th> 
			                <th class="header pdf_border">Nama</th>
			                <th class="header pdf_border">Angkatan</th>                      
			                <th class="header pdf_border">Alamat</th>
			                <th class="header pdf_border">Nama Perusahaan</th>
			                <th class="header pdf_border">Alamat Perusahaan</th>
			                <th class="header pdf_border">Jabatan</th>
			                <th class="header pdf_border">Email</th>
			                <th class="header pdf_border">No Telp</th>
			            </tr>
			        </thead>
			       <a class="pull-right btn btn-warning btn-large" style="margin-right:40px" href="<?php echo site_url()?>admin/save_pdf"><i class="material-icons">print</i> print PDF Data</a>
			        <!--
			        	ini windows print
			        <button class="btn btn-success btn-sm pull-right" onclick="frames['frame'].print()" value="printletter"><i class="material-icons">print</i> Print PDF</button>
			        <iframe src="<?php echo site_url()?>admin/save_pdf" style="display:none;" name="frame"></iframe> -->
	
					<!-- <input type="button" onclick="frames['frame'].print()" value="printletter"> -->
			        <tbody>
			            <?php
			            if (isset($result_display) && !empty($result_display)) {
			                foreach ($result_display as $key => $val) {
			                    ?>
			                    <tr class="pdf_border">
			                    	<td class="pdf_border"><?php echo $val->nim; ?></td>
			                    	<td class="pdf_border"><?php echo ucwords(strtolower($val->nama)); ?></td>
			                    	<td class="pdf_border"><?php echo $val->angkatan; ?></td>
			                    	<td class="pdf_border"><?php echo $val->alamat_skrg; ?></td>
			                    	<td class="pdf_border"><?php echo $val->nm_perusahaan; ?></td>
			                    	<td class="pdf_border"><?php echo $val->alamat_perusahaan; ?></td>
			                    	<td class="pdf_border"><?php echo $val->pekerjaan; ?></td>
			                    	<td class="pdf_border"><?php echo $val->email; ?></td>
			                    	<td class="pdf_border"><?php echo $val->telp; ?></td>
			                    </tr>
			                    <?php
			                }
			            } else {
			                ?>
			                <tr>
			                    <td colspan="5" class="alert alert-danger">No Records founds</td>    
			                </tr>
			            <?php } ?>
			 
			        </tbody>
			    </table>

			</div>

<?php endif ?>

	<?php endif ?>		
		</div>
	</div>
<script type="text/javascript">
	function resetElements()
	  {
	    window.location = window.location;
	  }
	function myFunction() {
	    window.print();
	}
</script>

