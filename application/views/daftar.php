<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/logo.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $judulapp?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url()?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url()?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/fonts/material-icons.css')?>" rel="stylesheet">
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page register-page" filter-color="black" data-image="<?php echo base_url()?>assets/img/bg.jpg">
            <div class="container">
						
<div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
	<form method="post" action="<?php echo base_url('proses/daftar/')?>">
		<div class="card card-login card-hidden">
			<div class="card-header text-center">
				<h4 class="card-title"><img src="<?php echo base_url()?>assets/img/jic-logo2.png" style="width:80px !important"> SMK ABC</h4>
			</div><hr>
			<div class="card-content">
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">NIM Mahasiswa</label>
						<input type="number" id="nis" name="nim" class="form-control" onchange="cek_nis(this)" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">recent_actors</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">mail</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Alamat Email</label>
						<input type="email" id="email" name="email" class="form-control" onchange="cek_mail(this)" required>
					</div>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
					<div class="form-group label-floating">
						<label class="control-label">Kata Sandi</label>
						<input type="password" name="sandi" class="form-control" required>
					</div>
				</div>
			</div>
			<div class="footer text-center">
				<button type="submit" class="btn btn-danger btn-round btn-lg">Daftar</button><br>
				<p style="color:black">Sudah punya Akun.? <a href="<?php echo base_url('index/login')?>">Klik disini</a></p>
			</div>
		</div>
	</form>
</div>

            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright" align="center"><a href="<?php echo base_url()?>">Kembali ke Beranda</a><br>
                        &copy; <script>document.write(new Date().getFullYear())</script> AoC-Think.com 
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Library for adding dinamically elements -->
<script src="<?php echo base_url()?>assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?php echo base_url()?>assets/js/jquery.validate.min.js"></script>
<!-- Promise Library for SweetAlert2 working on IE -->
<script src="<?php echo base_url()?>assets/js/es6-promise-auto.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?php echo base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?php echo base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?php echo base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?php echo base_url()?>assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?php echo base_url()?>assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?php echo base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?php echo base_url()?>assets/js/nouislider.min.js"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?php echo base_url()?>assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?php echo base_url()?>assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?php echo base_url()?>assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?php echo base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?php echo base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?php echo base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url()?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url()?>assets/js/demo.js"></script>
<script type="text/javascript">
  function GetxhrObject(){
		var xhr=null;
		try {xhr=new XMLHttpRequest();}
		catch (e){
			try {xhr=new ActiveXObject("Msxml2.XMLHTTP");}
			catch (e){xhr=new ActiveXObject("Microsoft.XMLHTTP");}
		}
		return xhr;
	};
	
		<?php if ($this->session->flashdata('cek_type') != null){?>
		$.notify({
      message: "<?php echo $this->session->flashdata('cek_pesan')?>"
    },{
      type: "<?php echo $this->session->flashdata('cek_type')?>",
      timer: 4000,
			placement: {
				from: "top",
				align: "right"
			}
     });
		<?php }?>
		$().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
		
		function cek_nis(n){
			var xhr = GetxhrObject();
			if (xhr) {
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (xhr.responseText>0){
						swal({
							title: 'NIS Sudah dipakai.!!',
							html: 'Mohon inputkan NIS Asli Anda.!!',
							type: 'warning',
							confirmButtonClass: 'btn btn-warning',
							buttonsStyling: false
						}).then(function(result) {
							$("#nis").val("");
							$("#nis").focus();
						}).catch(swal.noop);
					}
				}
				if (xhr.status==500 || xhr.status==401 || xhr.status==403 || xhr.status==400){
					swal({
						title: 'Tidak terhubung ke server.!!',
						html: 'Halaman ini akan di refresh setelah anda klik OK',
						type: 'warning',
						confirmButtonClass: 'btn btn-warning',
						buttonsStyling: false
					}).then(function(result) {
						location.href="";
					}).catch(swal.noop);
				}
			}
			xhr.open("POST","<?php echo base_url().'proses/cek_nis/'?>"+n.value);
			xhr.send();
		}
		}
		
		function cek_mail(n){
			var xhr = GetxhrObject();
			if (xhr) {
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					if (xhr.responseText>0){
						swal({
							title: 'Email Sudah dipakai.!!',
							html: 'Mohon inputkan Email yang lain.!!',
							type: 'warning',
							confirmButtonClass: 'btn btn-warning',
							buttonsStyling: false
						}).then(function(result) {
							$("#email").val("");
							$("#email").focus();
						}).catch(swal.noop);
					}
				}
				if (xhr.status==500 || xhr.status==401 || xhr.status==403 || xhr.status==400){
					swal({
						title: 'Tidak terhubung ke server.!!',
						html: 'Halaman ini akan di refresh setelah anda klik OK',
						type: 'warning',
						confirmButtonClass: 'btn btn-warning',
						buttonsStyling: false
					}).then(function(result) {
						location.href="";
					}).catch(swal.noop);
				}
			}
			xhr.open("POST","<?php echo base_url().'proses/cek_mail/'?>"+n.value.replace("@","%10"));
			xhr.send();
		}
		}
</script>

</html>