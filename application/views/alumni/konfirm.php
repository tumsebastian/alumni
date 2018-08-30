<div class="well col-sm-12">
	<h3>Mohon Lakukan Konfirmasi via Email..!!</h3><hr>
	<button class="btn btn-primary" onclick="ulang()" type="button">Kirim Ulang Konfirmasi</button> 
	<button class="btn btn-info" onclick="ganti()" type="button">Ganti Alamat Email</button>
</div>

<script>
	function GetxhrObject(){
		var xhr=null;
		try {xhr=new XMLHttpRequest();}
		catch (e){
			try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
			catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
		}
		return xhr;
	};
	
	function ulang(){
		swal({
			html: '<h4>Anda ingin mengirim ulang konfirmasi.?</h4>',
			title: '',
			showCancelButton: true,
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-warning',
			buttonsStyling: false
		}).then(function(result) {
		var xhr = GetxhrObject();
		if (xhr) {
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (xhr.responseText=='200'){
						swal({
							title: 'Sukses.!!',
							html: 'Silahkan melakukan konfirmasi via Email yang telah dikirim secepatnya.',
							type: 'success',
							confirmButtonClass: 'btn btn-success',
							buttonsStyling: false
						});
					}else if (xhr.responseText=='401'){
						swal({
							title: 'Tidak Ditemukan.!!',
							html: 'NIS yang telah anda daftarkan ini mungkin sudah dikonfirmasi/dihapus sebelumnya.<br>Silahkan lakukan login untuk pengecekan ulang.',
							type: 'warning',
							confirmButtonClass: 'btn btn-warning',
							buttonsStyling: false
						});
					}else{
						swal({
							title: 'Gagal.!!',
							html: 'Mohon lakukan beberapa saat lagi.!!',
							type: 'warning',
							confirmButtonClass: 'btn btn-warning',
							buttonsStyling: false
						});
					}
				}
			}
			xhr.open("POST","<?php echo base_url().'proses/kirimUlang/'?>");
			xhr.send();
		}
		}).catch(swal.noop);
	}
	
	function ganti(){
		swal({
			title: 'Ganti Alamat Email',
			html: '<div class="form-group label-floating" align="left">' +
							'<label class="control-label">Alamat Email baru</label><input id="email" type="email" class="form-control" required/>' +
            '</div>',
			showCancelButton: true,
			confirmButtonClass: 'btn btn-success',
			cancelButtonClass: 'btn btn-warning',
			buttonsStyling: false
		}).then(function(result) {
			swal({html:"<h4>Masih dalam tahap pengembangan..</h4>",confirmButtonClass: 'btn btn-success',buttonsStyling: false,type:"info"});
		}).catch(swal.noop);
	}
	
	swal({
		title: 'Konfirmasi Akun.!!',
		html: 'Mohon Lakukan Konfirmasi Akun Anda via Email.!!',
		showCancelButton: false,
		confirmButtonClass: 'btn btn-warning',
		buttonsStyling: false
	});
</script>