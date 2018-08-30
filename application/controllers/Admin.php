<?php
	class Admin extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('M_proses');
			$this->load->model('M_data');
		}
		
		function index($hal='iu',$ke=1){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Beranda Alumni";
				$data["menu"]=array("m1"=>"active","m2"=>"","m3"=>"","m4"=>"");
				
				if ($hal=='ik'){
					$data["info"]	= $this->M_data->data("tb_karir_center",null,null,null,"waktu","desc")->result();
					$data["jns"]="ik";
				}else{
					$data["info"]	= $this->M_data->data("tb_info_umum",null,null,null,"waktu","desc")->result();
					$data["jns"]="iu";
				}
				$this->template->load('admin/template','admin/beranda',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		public function test()
		{
			$data = $this->session->has_userdata(nura_enc('idadmin'));
			var_dump($data);
		}
		function info($no){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Informasi Umum";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				
				if (substr(nura_des($no),0,2)=="IU"){$tbl="tb_info_umum";}else{$tbl="tb_karir_center";}
				$data["di"]	= $this->M_data->data($tbl,array("no_info"=>nura_des($no)))->row();
				$data['komen'] = $this->M_data->data("tb_komentar",array("no_info"=>nura_des($no)))->result();
				$data["info"]	= $this->M_data->data("tb_info_umum",null,4,0,"waktu","desc")->result();
			
				$this->template->load('admin/template','info',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function tinfo($jns){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Tambah Informasi";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				$data["jns"]=$jns;
			
				$this->template->load('admin/template','admin/tinfo',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function uinfo($jns,$no){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Ubah Informasi";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				$data["jns"]=$jns;
				if ($jns=="iu"){$tbl="tb_info_umum";}else{$tbl="tb_karir_center";}
				$data["info"]	= $this->M_data->data($tbl,array("no_info"=>$no))->row();
			
				$this->template->load('admin/template','admin/uinfo',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function komunitas(){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Komunitas Alumni";
				$data["pesan"]=$this->M_data->data("tb_pesan",null,null,null,"waktu","desc")->result();
				$data["menu"]=array("m1"=>"","m2"=>"active","m3"=>"","m4"=>"");
				
				$this->template->load('admin/template','admin/komunitas',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		function chat(){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data=$this->M_data->data("tb_pesan",null,null,null,"waktu","desc")->result();
				//usort($data, function ($a,$b){return strcmp($a->waktu,$b->waktu);});
				
				foreach($data as $r){
					if ($this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil==''){
						$pp=base_url()."assets/img/faces/avatar.png";
					}else{$pp=base_url()."assets/img/faces/".$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->foto_profil;}
					if (nura_des($this->session->userdata(nura_enc('noid')))==$r->no_identitas){
						$dcm="right";$dct="left";
						$nama="Anda";
					}else{$dct="right";$dcm="left";$nama=$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->nama;}
					?>
						<div class="direct-chat-msg <?php echo $dcm?>">
							<div class="direct-chat-info clearfix">
								<span class="direct-chat-name pull-<?php echo $dcm?>"><?php echo $nama." (<i>".$this->M_data->data("tb_alumni",array("no_identitas"=>$r->no_identitas))->row()->angkatan."</i>)"?></span>
								<span class="direct-chat-timestamp pull-<?php echo $dct?>"><?php echo $this->M_data->waktu($r->waktu)?></span>
              </div>
							<img class="direct-chat-img" src="<?php echo $pp?>" alt="message user image">
							<div class="direct-chat-text"><?php echo $r->pesan?></div>
						</div>
					<?php
				}
			}
		}
		
		function data_alumni($pil='aktif'){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Data Alumni";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
				if ($pil=="unconfirm")
					{
						$data["alumni"]=$this->M_data->data("tb_alumni",array("konfirm"=>"N"))->result();
						$data['pil']='N';
					}
				else
					{
						$data["alumni"]=$this->M_data->data("tb_alumni",array("konfirm"=>"Y"))->result();
						$data['pil']='Y';
					}
				$this->template->load('admin/template','admin/alumni',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function talumni(){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Tambah Profil Alumni";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
				$this->template->load('admin/template','admin/talumni',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		public function view_table(){
	       $result = $this->M_data->show_all_data();
	        if ($result != false) {
	            return $result;
	        } else {
	            return 'Database is empty !';
	        } 
	    }
		function cariprint(){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Cari Tahun Angkatan";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
				$data["date1"] = $this->input->post('tahunawal');
				$data["date2"] = $this->input->post('tahunakhir');
				
				
				if ($data["date1"] == "" || $data["date2"] == "") {
				$data['date_range_error_message'] = "Both date fields are required";
				} 
				else 
				{
					$result = $this->M_data->select_by_date_range($data);
					if ($result != false){
						$data['result_display'] = $result;
						// $this->save_pdf($data);
					} 
					else {
						$data['result_display'] = "No record found !";
					}
				}
				// var_dump($data);
				
				$this->session->set_userdata($data);
				$data['show_table'] = $this->view_table();
				$this->template->load('admin/template','admin/cariprint',$data);
				// $this->load->view('admin/cetak',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
			    $randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$data = substr(hash('sha256',$randomString, false), 55);
			return $data;
		}
		function save_pdf(){ 
	        //load mpdf libray
				$this->load->library('M_pdf');
				$mpdf = $this->m_pdf->load([
				    'mode' => 'c',
				    'format' => 'A4-L',
				    // 'margin_left' => 32,
				    // 'margin_right' => 25,
				    'margin_left' => 20,
				    'margin_right' => 15,
				    'margin_top' => 48,
				    'margin_bottom' => 25,
				    'margin_header' => 10,
				    'margin_footer' => 10
				  ]);
				$data['getnumber'] = $this->session->all_userdata();
				$data['viewdata'] = $this->session->userdata('result_display');
        		$html = $this->load->view('admin/cetak',$data,true);


        		$pdfFilePath = 'STIE-JIC-'.$this->generateRandomString().'.pdf';
        		$mpdf->SetDisplayMode('fullpage');
        		// $mpdf->SetHTMLHeader($header);
        		// var_dump($pdfFilePath);
				$stylesheet = file_get_contents('/admin/css/style-table.css');
				$mpdf->WriteHTML($stylesheet,1);
        		$mpdf->WriteHTML($html);
        		$mpdf->Output($pdfFilePath, 'D');
				
				// var_dump($data['getnumber']['date1']);
				
		}
		
		function profil($noid=null){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Profil Alumni";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				if ($noid==null){redirect(base_url()."admin/data_alumni");}else{$noid=nura_des($noid);}
				
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>$noid))->row();
				$this->template->load('admin/template','admin/profil',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function uprofil($noid=null){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Ubah Profil Alumni";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($noid)))->row();
				// var_dump($data);
				$this->template->load('admin/template','admin/uprofil',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function uakun($noid=null){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Ubah Akun Alumni";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"active","m4"=>"");
				
				$data["alumni"]=$this->M_data->data("tb_alumni",array("no_identitas"=>nura_des($noid)))->row();
				$this->template->load('admin/template','admin/uakun',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function komentar($jns,$no){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$data["judulapp"]	= "SIA || Data Komentar";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"");
				if ($jns=="iu"){$tbl="tb_info_umum";}else{$tbl="tb_karir_center";}
				$data["komen"]=$this->M_data->data("tb_komentar",array("no_info"=>$no))->result();
				$data["judul"]=$this->M_data->data($tbl,array("no_info"=>$no))->row()->judul_info;
				$data["jns"]=$jns;
				$this->template->load('admin/template','admin/komentar',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function akun(){
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				$noid=nura_des($this->session->userdata(nura_enc('idadmin')));
				$data["judulapp"]	= "SIA || Setting Akun";
				$data["menu"]=array("m1"=>"","m2"=>"","m3"=>"","m4"=>"active");
				$data["akn"]=$this->M_data->data("tb_admin",array("username"=>$noid))->row();
				$this->template->load('admin/template','admin/akun',$data);
			}else{
				redirect(base_url()."admin/login");
			}
		}
		
		function login(){
			$data["judulapp"]	= "SIA || Login Admin";
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				redirect(base_url()."admin/");
			}else{
				$this->load->view('admin/login',$data);
			}
		}
		
		
	}
?>