<?php
	class Proses extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('M_proses');
			$this->load->model('M_data');
		}
		
		function cek_nis($nim){
			echo $this->M_data->data("tb_alumni",array("nim"=>$nim))->num_rows();
		}
		function cek_mail($mail){
			echo $this->M_data->data("tb_alumni",array("email"=>str_replace("%10","@",$mail)))->num_rows();
		}
		
		function daftar(){
			$nim=$this->input->post("nim");
			$nama=$this->input->post("nama");
			$email=$this->input->post("email");
			$psn='
					<h4>Halo '.$nama.'</h4><br>
					<p>Terimakasih anda telah mendaftarkan diri sebagai Alumni dari SMK ABC.</p>
					<p>Silahkan lakukan konfirmasi dengan mengeklik tombol dibawah ini.<br>Jika dalam 1x24 jam anda belum melakukan konfirmasi, maka Token konfirmasi ini kadaluarsa.</p>
					<p>Untuk itu silahkan lakukan kirim ulang konfirmasi secepatnya.</p><br>
					<p><a href="'.base_url('proses/konfirmEmail/'.nura_enc($nim).'/'.nura_enc(strval(time()))).'" target="_blank">Konfirmasi</a></p>
					<br><br><br><br>
					<p>Salam Hormat,<br><b>AoC Think</b></p>
			';
			
			/*$this->load->library('email');

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://srv33.niagahoster.com';
			$config['smtp_user'] = 'no-reply@aoc-think.com';
			$config['smtp_pass'] = 'noreply22021993';
			$config['smtp_port'] = '465';
			$config['charset'] = 'iso-8859-1';
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->from('no-reply@aoc-think.com', 'AoC Think');
			$this->email->to($email);

			$this->email->subject('Konfirmasi Pendaftaran Alumni');
			$this->email->message($psn);*/

			if ($this->M_proses->kirimEmail($email,$psn)){

			$data=array(
				"no_identitas"=>$nim,
				"nim"=>$nim,
				"nama"=>$nama,
				"tempat_lahir"=>"-",
				"tgl_lahir"=>0,
				"jk"=>"L",
				"jurusan"=>"-",
				"angkatan"=>"2017",
				"th_lulus"=>"2017",
				"alamat_skrg"=>"-",
				"status"=>"-",
				"pekerjaan"=>"-",
				"email"=>$email,
				"kata_sandi"=>nura_enc($this->input->post("sandi")),
				"konfirm"=>"N"
			);
			
			$this->M_proses->tambah("tb_alumni",$data);
			
			$svdata=array(
				nura_enc('noid')=>nura_enc($nim),
				nura_enc('nim')=>nura_enc($nim),
				nura_enc('nama')=>nura_enc($nama),
				nura_enc('konfirm')=>nura_enc('N')
			);
			$this->session->set_userdata($svdata);
			
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<h4>Selamat Datang ".$nama."</h4>Silahkan melakukan konfirmasi pendaftaran via Email.");
			$this->session->set_flashdata($cekuser);
			
			redirect(base_url("alumni"));
			}else{
				$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<h4>Pendaftaran Gagal.!!</h4>Pendaftaran gagal dilakukan, dikarenakan tidak bisa mengirim konfirmasi ke alamat email yang anda masukan.<br>Silahkan melakukan pendaftaran ulang.<br><br>Terimakasih..");
				$this->session->set_flashdata($cekuser);
			
				redirect(base_url("index/daftar"));  
			}
		}
		
		function konfirmEmail($nim,$wkt){
			if ($this->M_data->data("tb_alumni",array("nim"=>nura_des($nim),"konfirm"=>"N"))->num_rows()>0){
				$cekwkt=((time()-(nura_des($wkt)))/3600);
				if ($cekwkt<=24){
					$this->M_proses->ubah("tb_alumni",array("konfirm"=>"Y"),array("nim"=>nura_des($nim)));
					$konf=array("konfirm"=>"Konfirmasi Sukses..","pesan"=>"Silahkan lengkapi profil anda.<br><br><h4>Terimakasih..</h4>");
					$this->session->set_flashdata($konf);
				}else{
					$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<h4>Konfirmasi Gagal.!!</h4>Konfirmasi gagal dilakukan, dikarenakan waktu konfirmasi telah kadaluarsa.<br>Silahkan melakukan kirim konfirmasi ulang.<br><br>Terimakasih..".$cekwkt." (".time()." - ".nura_des($wkt).")");
					$this->session->set_flashdata($cekuser);
				}
				
				$dt=$this->M_data->data('tb_alumni',array("nim"=>nura_des($nim)))->row();
				$svdata=array(
					nura_enc('noid')=>nura_enc($dt->no_identitas),
					nura_enc('nim')=>nura_enc($dt->nim),
					nura_enc('nama')=>nura_enc($dt->nama),
					nura_enc('konfirm')=>nura_enc($dt->konfirm)
				);
				$this->session->set_userdata($svdata);
				
				redirect(base_url("alumni/profil"));
			}else{
				$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<h4>Token tidak ditemukan.!!</h4>Token yang ingin anda konfirmasi tidak ditemukan/kadaluarsa.<br>Silahkan melakukan pendaftaran ulang.<br><br>Terimakasih..");
				$this->session->set_flashdata($cekuser);
			
				redirect(base_url("alumni"));
			}
		}
		
		function kirimUlang(){
			$nim=$this->session->userdata(nura_enc("noid"));
			if ($this->M_data->data("tb_alumni",array("nim"=>nura_des($nim),"konfirm"=>"N"))->num_rows()>0){
				$dt=$this->M_data->data("tb_alumni",array("nim"=>nura_des($nim)))->row();
				$psn='
					<h4>Halo '.$dt->nama.'</h4><br>
					<p>Terimakasih anda telah mendaftarkan diri sebagai Alumni dari SMK ABC.</p>
					<p>Silahkan lakukan konfirmasi dengan mengeklik tombol dibawah ini.</p>
					<p>Jika dalam 1x24 jam anda belum melakukan konfirmasi, maka Token konfirmasi ini akan dianggap kadaluarsa. Untuk itu, silahkan anda lakukan konfirmasi secepatnya.</p><br>
					<p><a href="'.base_url('proses/konfirmEmail/'.$nim.'/'.nura_enc(strval(time()))).'" target="_blank">Konfirmasi<br>'.base_url('proses/konfirmEmail/'.$nim.'/'.nura_enc(strval(time()))).'</a></p>
					<br><br><br><br>
					<p>Salam Hormat,<br><b>AoC Think</b></p>
				';
				if ($this->M_proses->kirimEmail($dt->email,$psn)){echo "200";}else{echo "500";}
			}else{echo "401";}
		}
		
		function login($user){
			if ($user=='alumni'){
			$data=array('nim'=>$this->input->post('nim'),'kata_sandi'=>nura_enc($this->input->post('sandi')));
			$ada=$this->M_data->data('tb_alumni',$data)->num_rows();
			if ($ada>0){
				$dt=$this->M_data->data('tb_alumni',$data)->row();
				$svdata=array(
					nura_enc('noid')=>nura_enc($dt->no_identitas),
					nura_enc('nim')=>nura_enc($dt->nim),
					nura_enc('nama')=>nura_enc($dt->nama),
					nura_enc('konfirm')=>nura_enc($dt->konfirm)
				);
				$this->session->set_userdata($svdata);
				
				$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Selamat Datang Kembali ".$dt->nama.".</b>");
				$this->session->set_flashdata($cekuser);
				redirect(base_url("alumni"));
			}else{
				$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Email atau kata sandi anda salah.!!</b>");
				$this->session->set_flashdata($cekuser);
				redirect(base_url("index/login"));
			}
			
			}else{
				$data=array('username'=>$this->input->post('user'),'password'=>nura_enc($this->input->post('sandi')));
				$ada=$this->M_data->data('tb_admin',$data)->num_rows();
				if ($ada>0){
					$dt=$this->M_data->data('tb_admin',$data)->row();
					$svdata=array(
						nura_enc('idadmin')=>nura_enc($dt->username)
					);
					$this->session->set_userdata($svdata);
				
					$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Selamat Datang Kembali Admin ".$dt->username.".</b>");
					$this->session->set_flashdata($cekuser);
					redirect(base_url("admin"));
				}else{
					$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Username atau Password anda salah.!!</b>");
					$this->session->set_flashdata($cekuser);
					redirect(base_url("admin/login"));
				}
			
			}
		}
		
		function komen($noi){
			$data=array(
				"no_info"=>nura_des($noi),
				"no_identitas"=> nura_des($this->session->userdata(nura_enc("noid"))),
				"isi"=> $this->input->post("komen_isi"),
				"waktu"=>time()
			);
			
			$this->M_proses->tambah("tb_komentar",$data);
			redirect(base_url("alumni/info/".$noi));
		}
		
		function chat(){
			$data=array(
				"no_identitas"=> nura_des($this->session->userdata(nura_enc("noid"))),
				"pesan"=> $this->input->post("isi"),
				"waktu"=>time(),
				"angkatan"=>0
			);
			
			$this->M_proses->tambah("tb_pesan",$data);
		}
		
		function kirimchat($isi){
			$data=array(
				"no_identitas"=> "Admin",
				"pesan"=> str_replace("%20"," ",$isi),
				"waktu"=>time(),
				"angkatan"=>0
			);
			
			$this->M_proses->tambah("tb_pesan",$data);
			redirect(base_url("admin/komunitas/"));
		}
		
		function hpesan($no){
			$this->M_proses->hapus("tb_pesan",array("nomor"=>$no));
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Pesan berhasil dihapus..</b>");
			$this->session->set_flashdata($cekuser);
			redirect(base_url("admin/komunitas/"));
		}
		
		function talumni(){
			$data=array(
				"no_identitas"=>$this->input->post("noid"),
				"nim"=>$this->input->post("nim"),
				// "nisn"=>$this->input->post("nisn"),
				"nama"=>$this->input->post("nama"),
				"tempat_lahir"=>$this->input->post("tlahir"),
				"tgl_lahir"=>strtotime($this->input->post("tgllahir")),
				"jk"=>$this->input->post("jk"),
				"jurusan"=>$this->input->post("jurusan"),
				"angkatan"=>$this->input->post("angkatan"),
				"th_lulus"=>$this->input->post("lulusan"),
				"alamat_skrg"=>$this->input->post("alamat"),
				"status"=>$this->input->post("status"),
				"telp"=>$this->input->post("telp"),
				"nm_perusahaan"=>$this->input->post("nm_perusahaan"),
				"alamat_perusahaan"=>$this->input->post("alamat_perusahaan"),
				"pekerjaan"=>$this->input->post("pekerjaan"),
				"email"=>$this->input->post("email"),
				"kata_sandi"=>nura_enc($this->input->post("sandi")),
				"konfirm"=>"Y"
			);
			
			$this->M_proses->tambah("tb_alumni",$data);
			
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Profil Alumni berhasil ditambah..</b>");
			$this->session->set_flashdata($cekuser);
			
			redirect(base_url("admin/profil/".nura_enc($this->input->post("noid"))));
		}
		
		function ualumni($noid){
			$data=array(
				"no_identitas"=>$this->input->post("noid"),
				"nim"=>$this->input->post("nim"),
				// "nisn"=>$this->input->post("nisn"),
				"nama"=>$this->input->post("nama"),
				"tempat_lahir"=>$this->input->post("tlahir"),
				"tgl_lahir"=>strtotime($this->input->post("tgllahir")),
				"jk"=>$this->input->post("jk"),
				"jurusan"=>$this->input->post("jurusan"),
				"angkatan"=>$this->input->post("angkatan"),
				"th_lulus"=>$this->input->post("lulusan"),
				"alamat_skrg"=>$this->input->post("alamat"),
				"status"=>$this->input->post("status"),
				"telp"=>$this->input->post("telp"),
				"nm_perusahaan"=>$this->input->post("nm_perusahaan"),
				"alamat_perusahaan"=>$this->input->post("alamat_perusahaan"),
				"pekerjaan"=>$this->input->post("pekerjaan"),
				"email"=>$this->input->post("email")
			);
			
			$this->M_proses->ubah("tb_alumni",$data,array("no_identitas"=>$noid));
			
			$svdata=array(
				nura_enc('noid')=>nura_enc($this->input->post("noid")),
				nura_enc('nis')=>nura_enc($this->input->post("nim")),
				nura_enc('nama')=>nura_enc($this->input->post("nama"))
			);
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Profil Alumni berhasil diubah..</b>");
			
			$this->session->set_flashdata($cekuser);
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				redirect(base_url("admin/profil/".nura_enc($this->input->post("noid"))));
			}else{
				$this->session->set_userdata($svdata);
				redirect(base_url("alumni/profil/".nura_enc($this->input->post("noid"))));
			}
		}
		
		function uakun($noid){
			$data=array('no_identitas'=>$noid,'kata_sandi'=>nura_enc($this->input->post('sandil')));
			$ada=$this->M_data->data('tb_alumni',$data)->num_rows();
			if ($ada>0){
				if ($this->input->post('sandib')==$this->input->post('ulangsandi')){
					$dt=array(
						"kata_sandi"=>nura_enc($this->input->post('sandib'))
					);
					$this->M_proses->ubah("tb_alumni",$dt,array("no_identitas"=>$noid));
					$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Kata sandi baru berhasil diubah..</b>");
				}else{
					$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Kata sandi baru tidak sama.!!</b>");
				}
			}else{
				$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Kata sandi lama anda salah.!!</b>");
			}
			
			$this->session->set_flashdata($cekuser);
			if ($this->session->has_userdata(nura_enc('idadmin'))){
				redirect(base_url("admin/profil/".nura_enc($noid)));
			}else{redirect(base_url("alumni/profil/".nura_enc($noid)));}
		}
		
		function halumni($no){
			$this->M_proses->hapus("tb_alumni",array("no_identitas"=>$no));
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Data Alumni berhasil dihapus..</b>");
			$this->session->set_flashdata($cekuser);
			redirect(base_url("admin/data_alumni/"));
		}
		
		function uakunadm(){
			$data=array('username'=>nura_des($this->session->userdata(nura_enc('idadmin'))),'password'=>nura_enc($this->input->post('sandil')));
			$ada=$this->M_data->data('tb_admin',$data)->num_rows();
			if ($ada>0){
				if ($this->input->post('sandib')==$this->input->post('ulangsandi')){
					$dt=array(
						"username"=>$this->input->post('user'),
						"password"=>nura_enc($this->input->post('sandib'))
					);
					$this->M_proses->ubah("tb_admin",$dt,array("username"=>nura_des($this->session->userdata(nura_enc('idadmin')))));
					$svdata=array(
						nura_enc('idadmin')=>nura_enc($this->input->post('user'))
					);
					$this->session->set_userdata($svdata);
					$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Data Akun Berhasil Diperbarui..</b>");
				}else{
					$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Kata sandi baru tidak sama.!!</b>");
				}
			}else{
				$cekuser=array("cek_type"=>'warning',"cek_pesan"=>"<b>Kata sandi lama anda salah.!!</b>");
			}
			
			$this->session->set_flashdata($cekuser);
			redirect(base_url("admin/akun"));
		}
		
		function tinfo($jns){
			if ($jns=="iu"){
				if ($this->M_data->data("tb_info_umum")->num_rows()>0){
					$ada=substr($this->M_data->data('tb_info_umum',array("no_info"=>"IU".date("ymd")),null,1,0,'no_info','desc')->row()->no_info,8)+1;
				}else{$ada=1;}
				if ($ada<10){$noinf="IU".date("ymd")."0".$ada;}else{$noinf="IU".date("ymd").$ada;}
				
				$data=array("no_info"=>$noinf,"judul_info"=>$this->input->post("judul"),"isi"=>$this->input->post("isi"),"waktu"=>time());
				
				$this->M_proses->tambah("tb_info_umum",$data);
			}else{
				if ($this->M_data->data("tb_karir_center")->num_rows()>0){
					$ada=substr($this->M_data->cari('tb_karir_center',array("no_info"=>"IK".date("ymd")),null,1,0,'no_info','desc')->row()->no_info,8)+1;
				}else{$ada=1;}
				if ($ada<10){$noinf="IK".date("ymd")."0".$ada;}else{$noinf="IK".date("ymd").$ada;}
				
				if ($this->session->has_userdata(nura_enc('noid'))){$ket=nura_des($this->session->userdata(nura_enc('noid')));}else{$ket="Admin";}
				$data=array("no_info"=>$noinf,"judul_info"=>$this->input->post("judul"),"isi"=>$this->input->post("isi"),"waktu"=>time(),"ket"=>$ket);
				
				$this->M_proses->tambah("tb_karir_center",$data);
			}
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Informasi baru berhasil ditambah..</b>");
			$this->session->set_flashdata($cekuser);
			if ($this->session->has_userdata(nura_enc('noid'))){redirect(base_url("alumni/index/ik"));}else{redirect(base_url("admin/index/".$jns));}
		}
		
		function uinfo($jns,$no){
			if ($jns=="iu"){
				$data=array("judul_info"=>$this->input->post("judul"),"isi"=>$this->input->post("isi"),"waktu"=>time());
				
				$this->M_proses->ubah("tb_info_umum",$data,array("no_info"=>$no));
			}else{
				$data=array("judul_info"=>$this->input->post("judul"),"isi"=>$this->input->post("isi"),"waktu"=>time());
				
				$this->M_proses->ubah("tb_karir_center",$data,array("no_info"=>$no));
			}
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Data informasi berhasil diubah..</b>");
			$this->session->set_flashdata($cekuser);
			redirect(base_url("admin/index/".$jns));
		}
		
		function hinfo($jns,$no){
			if ($jns=="iu"){$this->M_proses->hapus("tb_info_umum",array("no_info"=>$no));}
			else{$this->M_proses->hapus("tb_karir_center",array("no_info"=>$no));}
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Data informasi berhasil dihapus..</b>");
			$this->session->set_flashdata($cekuser);
			if ($this->session->has_userdata(nura_enc('noid'))){redirect(base_url("alumni/index/ik"));}else{redirect(base_url("admin/index/".$jns));}
		}
		
		function hkomen($no){
			$this->M_proses->hapus("tb_komentar",array("nomor"=>$no));
			$cekuser=array("cek_type"=>'info',"cek_pesan"=>"<b>Data komentar berhasil dihapus..</b>");
			$this->session->set_flashdata($cekuser);
			if ($this->session->has_userdata(nura_enc('noid'))){redirect(base_url("alumni"));}else{redirect(base_url("admin"));}
		}
		
		function upp($id){
			$new_name=$id.'_'.time();
			$dir='assets/img/pp/';
			
			//inisialisasi & proses upload
			$config['upload_path'] = $dir;
			$config['allowed_types'] = 'jpg|gif|png';
			$config['max_size']     = '10000';
			$config['max_width'] = '4208';
			$config['max_height'] = '4208';
			$config['file_name'] = $new_name;
			//upload
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('pp')){						
				echo $this->upload->display_errors();
			}else{
				$dt=array("foto_profil"=>$this->upload->file_name);
				
				if ($this->M_data->data("tb_alumni",array("no_identitas"=>$id))->row()->foto_profil!=""){unlink($dir.$this->M_data->data("tb_alumni",array("no_identitas"=>$id))->row()->foto_profil);}
				$this->M_proses->ubah("tb_alumni",$dt,array("no_identitas"=>$id));
				
				echo "<img src='".base_url($dir.$this->upload->file_name)."' class='img'>";
			}
		}
		
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
?>