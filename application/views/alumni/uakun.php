<?php
if ($alumni->foto_profil==''){
	$pp=base_url()."assets/img/faces/avatar.png";
}else{$pp=base_url()."assets/img/pp/".$alumni->foto_profil;}
?>
<form action="<?php echo base_url('proses/uakun/'.$alumni->no_identitas)?>" method="post">
	<div class="col-md-8">
		<div class="card card-stats">
			<div class="card-header" data-background-color="red">
				<i class="material-icons">info_outline</i>
			</div>
			<div class="card-content">
				<h3 class="title">Ubah data Akun <?php echo $alumni->nama?></h3>
				
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Sandi Lama</label>
						<input type="password" name="sandil" class="form-control">
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Sandi Baru</label>
						<input type="password" name="sandib" class="form-control">
					</div>
				</div>
				<div class="input-group col-sm-8">
					<span class="input-group-addon"><i class="material-icons">lock</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Ulang Sandi Baru</label>
						<input type="password" name="ulangsandi" class="form-control">
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">Simpan Akun</button>
			</div>
		</div>
	</div>
</form>
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#" id="gmbpp"><img class="img" src="<?php echo $pp?>" /></a>
			</div>
			<div class="content">
				<?php if (nura_des($this->session->userdata(nura_enc('noid')))==$alumni->no_identitas){?>
				<button class="btn btn-warning btn-raised btn-round" data-toggle="modal" data-target="#UbahPP">Ubah Foto Profil</button>
				<?php }?>
			</div>
		</div>
	</div>
	
	<!-- Classic Modal -->
                                            <div class="modal fade" id="UbahPP" tabindex="-1" role="dialog" aria-labelledby="ModalUbahPP" aria-hidden="true">
                                                <div class="modal-dialog modal-small">
																									<form id="fuploadpp" action="<?php echo base_url('proses/upp/'.$alumni->no_identitas)?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                <i class="material-icons">clear</i>
                                                            </button>
                                                            <h4 class="modal-title">Ubah Foto Profil</h4>
                                                        </div>
                                                        <div class="modal-body">
                                            <div class="col-sm-12" align="center">
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle">
                                                    <img class="img" src="<?php echo $pp?>" />
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                <div>
                                                    <span class="btn btn-round btn-warning btn-file btn-sm">
                                                        <span class="fileinput-new">Pilih Gambar</span>
                                                        <span class="fileinput-exists">Ganti</span>
                                                        <input type="file" name="pp" accept="image/JPEG"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists btn-sm" data-dismiss="fileinput"><i class="material-icons">clear</i> Hapus</a>
                                                </div>
                                            </div>
																						</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-simple">Simpan</button>
                                                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
																									</form>
                                                </div>
                                            </div>
                                            <!--  End Modal -->
																						
<script>
	$(document).ready(function(e){
		$("#fuploadpp").on("submit",(function(e){
			e.preventDefault();
			$.ajax({
				url:"<?php echo base_url('proses/upp').'/'.$alumni->no_identitas?>",
				type:"POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function(data){
					swal({
                title: 'Sukse...',
                text: "Foto Profil berhasil diperbarui..",
                type: 'success',
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false
            });
						$("#gmbpp").html(data);
						$("#UbahPP").modal("hide");
				},
				error: function(){
					swal({
                title: 'Upload GAGAL.!!',
                text: "Silahkan ulangi beberapa saat lagi.!",
                type: 'warning',
                confirmButtonClass: 'btn btn-success',
                buttonsStyling: false
            });
				}
			})
		}))
	})
</script>