<?php foreach ($info as $r){?>
	<div class="col-md-6">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content" style="height:180px !important">
				<h3 class="title"><a href="<?php echo base_url()."index/info/".nura_enc($r->no_info)?>"><?php echo $r->judul_info?></a></h3>
				<p class="title"><?php echo $this->M_data->bts_kata(strip_tags($r->isi),25);?> ... (<small><a href="<?php echo base_url()."index/info/".nura_enc($r->no_info)?>">Lihat selengkapnya</a></small>)</p>
			</div>
			<div class="card-footer">
				<div class="stats">
					<i class="material-icons">access_time</i> <?php echo $this->M_data->waktu($r->waktu)?>
				</div>
			</div>
		</div>
	</div>
<?php }?>
<div class="col-md-12">
	<div class="btn-toolbar">
		<button class="btn btn-success btn-sm" onclick="kehal('1')" type="button">Terbaru</button>
		<div class="btn-group">
			<?php
			$i=-1;
			if ($this->uri->segment(3)==null){$pg=1;}else{$pg=$this->uri->segment(3);}
			if ($tothal>2){$n=1; if ($pg==$tothal){$n=$n-1;$i=-2;}}else{$n=$tothal-2;}
			for ($i;$i<=$n;$i++){
				if ($pg>=2){$hal=$pg+$i;}else{$hal=$pg+$i+1;}
			?>
			<button class="btn btn-default btn-sm <?php if ($hal==$pg){echo "active";}?>" onclick="kehal('<?php echo $hal?>')" type="button"><?php echo $hal?></button>
			<?php }?>
		</div>
		<button class="btn btn-primary btn-sm" onclick="kehal('<?php echo $tothal?>')" type="button">Terlama</button>
	</div>
</div>

<script>
	function kehal(a){
		location.href="<?php echo base_url().'index/index/'?>"+a;
	}
</script>