<?php
	class M_proses extends CI_Model {
	
		function tambah($tbl,$data){
			$this->db->insert($tbl, $data);
		}
		function ubah($tbl,$data,$whr){
			$this->db->where($whr);
			$this->db->update($tbl, $data);
		}
		function hapus($tbl,$whr){
			$this->db->where($whr);
			$this->db->delete($tbl);
		}
		
		function kirimEmail($to,$psn){
			$this->load->library('email');

			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_user'] = 'jicitservices@gmail.com';
			$config['smtp_pass'] = 'm0nash01';
			$config['smtp_port'] = 465;
			$config['charset'] = 'iso-8859-1';
			$config['mailtype'] = 'html';

			$this->email->initialize($config);

			$this->email->from('jicitservices@gmail.com', 'JIC IT SERVICES');
			$this->email->to($to);

			$this->email->subject('Konfirmasi Pendaftaran Alumni (Mohon jangan dibalas email ini.)');
			$this->email->message($psn);
			
			return $this->email->send();
		}
	}
?>