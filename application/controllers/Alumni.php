<?php
	class Alumni extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('M_proses');
			$this->load->model('M_data');
		}
		
		function index($hal='iu',$ke=1){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Beranda Alumni";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"active","m2"=>"","m3"=>"","m4"=>"");
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				if ($hal=='ik'){
					$data["info"]	= $this->M_data->data("tb_karir_center",null,6,(($ke-1)*6),"waktu","desc")->result();
					$data["tothal"] = ceil($this->M_data->data("tb_karir_center")->num_rows()/6);
				}else{
					$data["info"]	= $this->M_data->data("tb_info_umum",null,6,(($ke-1)*6),"waktu","desc")->result();
					$data["tothal"] = ceil($this->M_data->data("tb_info_umum")->num_rows()/6);
				}
				$this->template->load('alumni/template','alumni/beranda',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		
		function info($no){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Informasi Umum";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				if (substr(nura_des($no),0,2)=="IU"){$tbl="tb_info_umum";}else{$tbl="tb_karir_center";}
				$data["di"]	= $this->M_data->data($tbl,array("no_info"=>nura_des($no)))->row();
				$data['komen'] = $this->M_data->data("tb_komentar",array("no_info"=>nura_des($no)))->result();
				$data["info"]	= $this->M_data->data("tb_info_umum",null,4,0,"waktu","desc")->result();
			
				$this->template->load('alumni/template','info',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		public function testalumni()
		{
			$data = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
			var_dump($data);
		}
		
		function tinfo(){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Tambah Informasi Karir Center";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
			
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				$this->template->load('alumni/template','alumni/tinfo',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		
		function komunitas(){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Informasi Umum";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"active","m3"=>"","m4"=>"");
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				$this->template->load('alumni/template','alumni/komunitas',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		function chat(){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data=$this->M_data->data("tb_pesan",null,50,0,"waktu","desc")->result();
				usort($data, function ($a,$b){return strcmp($a->waktu,$b->waktu);});
				
				foreach($data as $r){
					if ($r->no_identitas=='Admin'){
						$tmbh="<span style='color:red'>Administrator Sistem</span>";
					}else{
						$tmbh=$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->jurusan." - ".$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->angkatan;
					}
					if ($r->no_identitas=='Admin'){
						$pp=base_url()."assets/img/faces/admin.png";
					}else if ($this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil==''){
						$pp=base_url()."assets/img/faces/avatar.png";
					}else{$pp=base_url()."assets/img/pp/".$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil;}
					
					if ($r->no_identitas=='Admin'){
						$dcm="left";$dct="right";
						$nama="<span style='color:red'><b>Admin</b></span>";
					}else if (nura_des($this->session->userdata(nura_enc('noid')))==$r->no_identitas){
						$dcm="right";$dct="left";
						$nama="Anda";
					}else{$dct="right";$dcm="left";$nama=$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->nama;}
					?>
						<div class="direct-chat-msg <?php echo $dcm?>">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-<?php echo $dcm?>"><?php echo $nama." (<i>".$tmbh."</i>)"?></span>
								<span class="direct-chat-timestamp pull-<?php echo $dct?>"><?php echo $this->M_data->waktu($r->waktu)?></span>
              </div>
							<img class="direct-chat-img" src="<?php echo $pp?>" alt="message user image">
							<div class="direct-chat-text"><?php echo $r->pesan?></div>
						</div>
					<?php
				}
			}
		}
		
		// function data_alumni(){
		// 	if ($this->session->has_userdata(nura_enc('noid'))){
		// 		$data["judulapp"]	= "SIA || Data Alumni";
		// 		$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
		// 		$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
		// 		if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
		// 		$data["alumni"]=$this->M_data->data("tb_alumni")->result();
		// 		$this->template->load('alumni/template','alumni/alumni',$data);
		// 		}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
		// 	}else{
		// 		redirect(base_url()."index/login");
		// 	}
		// }
		
		function profil($noid=null){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Profil Alumni";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"active");
				if ($noid==null){$noid=nura_des($this->session->userdata(nura_enc('noid')));}else{$noid=nura_des($noid);}
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>$noid))->row();
				$this->template->load('alumni/template','alumni/profil',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		
		function uprofil($noid=null){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Ubah Profil Alumni";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"active");
				if ($noid==null){$noid=nura_des($this->session->userdata(nura_enc('noid')));}else{$noid=nura_des($noid);}
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>$noid))->row();
				$this->template->load('alumni/template','alumni/uprofil',$data);
				// var_dump($data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		
		function uakun($noid=null){
			if ($this->session->has_userdata(nura_enc('noid'))){
				$data["judulapp"]	= "SIA || Ubah Akun Alumni";
				$data["profil"] = $this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($this->session->userdata(nura_enc('noid')))))->row();
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"active");
				if ($noid==null){$noid=nura_des($this->session->userdata(nura_enc('noid')));}else{$noid=nura_des($noid);}
				
				if (nura_des($this->session->userdata(nura_enc('konfirm')))=="Y"){
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>$noid))->row();
				$this->template->load('alumni/template','alumni/uakun',$data);
				}else{$this->template->load('alumni/template','alumni/konfirm',$data);}
			}else{
				redirect(base_url()."index/login");
			}
		}
		
		function login(){
			$data["judulapp"]	= "SIA || Login Alumni";
			if ($this->session->has_userdata(nura_enc('idpengguna'))){
				redirect(base_url()."alumni/");
			}else{
				$this->load->view('login',$data);
			}
		}
	}
?>