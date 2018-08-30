<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/jic-logo.png" />
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
    <!-- <link href="<?php echo base_url('assets/fonts/material-icons.css')?>" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--     js     -->
		<script src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>
  <div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="white" data-image="<?php echo base_url()?>assets/img/bg.jpg">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            <div class="logo">
                <a href="<?php echo base_url('alumni')?>" class="simple-text logo-mini">
                  <img src="<?php echo base_url()?>assets/img/jic-logo2.png" height="30px" align="left">
                </a>
                <a href="<?php echo base_url('alumni')?>" class="simple-text logo-normal">
                    STIE JIC
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                      <?php if ($profil->foto_profil==''){?>
												<img src="<?php echo base_url()?>assets/img/faces/avatar.png" />
											<?php }else{?>
												<img src="<?php echo base_url('assets/img/pp/'.$profil->foto_profil)?>" />
											<?php }?>
                    </div>
                    <div class="info">
                        <a href="<?php echo base_url('alumni/profil/'.nura_enc($profil->no_identitas))?>"> <?php echo $profil->nama?></a>
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?php echo $menu['m1']?>">
                        <a data-toggle="collapse" href="#beranda">
                            <i class="material-icons">dashboard</i>
                            <p>Beranda <b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="beranda">
                            <ul class="nav">
                                <li>
                                    <a href="<?php echo base_url('alumni/index/iu')?>">
                                        <span class="sidebar-mini">IU</span>
                                        <span class="sidebar-normal">Info Umum</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('alumni/index/ik')?>">
                                        <span class="sidebar-mini">IK</span>
                                        <span class="sidebar-normal">Karir Center</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php echo $menu['m2']?>">
                        <a href="<?php echo base_url('alumni/komunitas')?>">
                            <i class="material-icons">forum</i>
                            <p>Komunitas</p>
                        </a>
                    </li>
                    <!-- <li class="<?php echo $menu['m3']?>">
                        <a href="<?php echo base_url('alumni/data_alumni')?>">
                            <i class="material-icons">group</i>
                            <p>Data Alumni</p>
                        </a>
                    </li> -->
                    <li class="<?php echo $menu['m4']?>">
                        <a href="<?php echo base_url('alumni/profil')?>">
                            <i class="material-icons">account_box</i>
                            <p>Profil Ku</p>
                        </a>
                    </li>
										<li class="">
											<a href="<?php echo base_url('proses/logout')?>">
                        <i class="material-icons">exit_to_app</i>
												<p>Logout</p>
											</a>
										</li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Sistem Informasi Alumni</a>
                    </div>
										<div class="collapse navbar-collapse">
											<form class="navbar-form navbar-right" role="search">
                        <div class="form-group  is-empty">
                          <input type="text" class="form-control" placeholder="Cari..">
                          <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                          <i class="material-icons">search</i>
                          <div class="ripple-container"></div>
                        </button>
                      </form>
										</div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php echo $contents?>
										</div>
								</div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
												Putu Siduarta.
                    </p>
                </div>
            </footer>
        </div>
    </div>
    
</body>
<!--   Core JS Files   -->
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
				demo.initFormExtendedDatetimepickers();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
		
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        $('.card .material-datatables label').addClass('form-group');
    });
		$('.datepicker').datetimepicker({
			format:'DD-MM-YYYY'
		});
		
		<?php if ($this->session->flashdata('konfirm') != null){?>
		swal({
      title: '<?php echo $this->session->flashdata('konfirm')?>',
      text: "<?php echo $this->session->flashdata('pesan')?>",
      type: 'success',
      confirmButtonClass: 'btn btn-success',
      buttonsStyling: false
    });
		<?php }?>
</script>

</html>