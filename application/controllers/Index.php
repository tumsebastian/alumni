<?php
	class Index extends CI_Controller {
		
		function __construct() {
			parent::__construct();
			$this->load->model('M_proses');
			$this->load->model('M_data');
		}
		
		function index($ke=1){
			$data["judulapp"]	= "SIA || Beranda";
			
			$data["info"]	= $this->M_data->data("tb_info_umum",null,6,(($ke-1)*6),"waktu","desc")->result();
			$data["tothal"] = ceil($this->M_data->data("tb_info_umum")->num_rows()/6);
			
			$this->template->load('template','beranda',$data);
		}
		
		function info($no){
			$data["judulapp"]	= "SIA || Informasi Umum";
			
			$data["di"]	= $this->M_data->data("tb_info_umum",array("no_info"=>nura_des($no)))->row();
			$data['komen'] = $this->M_data->data("tb_komentar",array("no_info"=>nura_des($no)))->result();
			$data["info"]	= $this->M_data->data("tb_info_umum",null,4,0,"waktu","desc")->result();
			
			$this->template->load('template','info',$data);
		}
		
		function daftar(){
			$data["judulapp"]	= "SIA || Daftar Alumni";
			if ($this->session->has_userdata(nura_enc('noid'))){
				redirect(base_url()."alumni/");
			}else{
				$this->load->view('daftar',$data);
			}
		}
		
		function login(){
			$data["judulapp"]	= "SIA || Login Alumni";
			if ($this->session->has_userdata(nura_enc('noid'))){
				redirect(base_url()."alumni/");
			}else{
				$this->load->view('login',$data);
			}
		}
	}
?>