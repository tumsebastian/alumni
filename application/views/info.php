<div class="col-md-12">
	<div class="card card-stats">
		<div class="card-header" data-background-color="purple">
			<i class="material-icons">info_outline</i>
		</div>
		<div class="card-content">
			<h3 class="title" align="justify"><?php echo $di->judul_info?></h3>
			<p class="title" align="justify"><?php echo $di->isi;?></p>
		</div>
		<div class="card-footer">
			<div class="stats">
				<i class="material-icons">access_time</i> <?php echo $this->M_data->waktu($di->waktu)?>
			</div>
			<div class="pull-right">
				<?php if ($this->session->has_userdata(nura_enc('noid'))){?>
				<button class="btn btn-success btn-sm" type="button" onclick="fkomen()">Tambah <i class="material-icons">comment</i></button> 
				<?php }else{?>
				<i class="material-icons">comment</i> 
				<?php } echo $this->M_data->jml("tb_komentar",array("no_info"=>$di->no_info))?>
			</div>
		</div>
		<hr>
		<div class="card-content">
			<div class="row hidden" id="box-komen">
				<form action="<?php echo base_url('proses/komen/').nura_enc($di->no_info);?>" method="post">
				<div class="col-xs-8 col-md-10">
					<textarea name="komen_isi" id="komen-isi" onfocus="auto_grow(this)" onkeyup="auto_grow(this)" placeholder="Masukan komentar..." class="form-control" required></textarea>
				</div>
				<div class="col-xs-4 col-md-2" align="left">
					<button type="submit" class="btn btn-success"><i class="material-icons">send</i></button>
				</div>
				</form>
			</div>
			<div id="dkomen">
				<?php foreach ($komen as $r){?>
					<div class="card card-stats">
						<div class="card-header" data-background-color="blue" style="padding:3px;">
							<?php if ($this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil==''){?>
								<img style="height:45px !important; width: 45px; border-radius:5px;" src="<?php echo base_url()?>assets/img/faces/avatar.png" />
							<?php }else{?>
								<img style="height:45px !important; border-radius:5px;" src="<?php echo base_url('assets/img/faces/'.$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil)?>" />
							<?php }?>
						</div>
						<div class="card-content">
							<p class="title" align="justify">
								<b><?php echo $this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->nama?></b>
								(<small><i><?php echo $this->M_data->waktu($r->waktu)?></i></small>)
								<?php if ($this->session->has_userdata(nura_enc('noid')) and $r->no_identitas==nura_des($this->session->userdata(nura_enc('noid')))){?>
								<button class="btn btn-danger btn-xs pull-right" title="Hapus" onclick="konfhapus('<?php echo $r->nomor?>')">X</button>
								<?php }?>
							</p>
							<p align="justify"><?php echo $r->isi?></p>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12"><hr><b>Daftar Informasi Lainnya..</b><hr></div>
<?php foreach ($info as $r){?>
	<div class="col-md-3">
		<div class="card card-stats">
			<div class="card-header" data-background-color="green">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<p class="title"><a href="<?php echo base_url()."index/info/".nura_enc($r->no_info)?>"><?php echo $r->judul_info?></a></p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> <?php echo $this->M_data->waktu($r->waktu)?>
				</div>
			</div>
		</div>
	</div>
<?php }?>

<script>
	function fkomen(){
		$("#box-komen").toggleClass("hidden");
		$("#komen-isi").focus();
	}
	
	function konfhapus(a){
		if (confirm("Yakin ingin menghapus Komentar anda ini "+a+".?")==true){
			location.href="<?php echo base_url("proses/hkomen")?>/"+a;
		}
	}
	
	function auto_grow(elem) {
		elem.style.height = "60px";
		elem.style.height = (elem.scrollHeight)+"px";
	}
</script>