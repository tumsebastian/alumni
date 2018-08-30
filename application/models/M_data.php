<?php
	class M_data extends CI_Model {
			
		function data($tbl,$whr=null,$lmt=null,$offs=null,$odf=null,$ad=null,$dstnc=null){
			if ($dstnc!=null){
				$this->db->select($dstnc);
				$this->db->distinct();
			}
			if ($whr!=null){$this->db->where($whr);}
			if ($odf!=null){$this->db->order_by($odf,$ad);}
			if ($lmt!=null){
				$hsl=$this->db->get($tbl,$lmt,$offs);
			}else{$hsl=$this->db->get($tbl);}
			return $hsl;
		}
		
		function cari($tbl,$whr,$and=null,$lmt=null,$offs=null,$odf=null,$ad=null){
			if ($and!=null){$this->db->like($whr);}else{$this->db->or_like($whr);}
			if ($odf!=null){$this->db->order_by($odf,$ad);}
			if ($lmt!=null){
				$hsl=$this->db->get($tbl,$lmt,$offs);
			}else{$hsl=$this->db->get($tbl);}
			return $hsl;
		}
		
		function jml($tbl,$whr=null,$odf=null,$ad=null){
			if ($whr!=null){$this->db->where($whr);}
			if ($odf!=null){$this->db->order_by($odf,$ad);}
			
			$hsl=$this->db->count_all_results($tbl);
			return $hsl;
		}
		
		function bts_kata($str, $bts){
			$words = explode(" ",$str);
			return implode(" ",array_splice($words,0,$bts));
		}
		
		function waktu($intwkt){
			$waktu=time() - $intwkt;
			$whari=floor($waktu/(3600*24));
			if ($whari>7){$waktu=date("d M y H:i",$intwkt)." WIB";}
			else if ($whari<=0){
				$wjam=floor($waktu/3600);
				if ($wjam<=0){
					$wmnt=floor($waktu/60);
					if ($wmnt<=0){$waktu="Baru saja";}
					else{$waktu=$wmnt." menit lalu";}
				}else{$waktu=$wjam." jam ".floor(($waktu%3600)/60)." menit lalu";}
			}else{$waktu=$whari." hari ".(floor($waktu/3600)-(24*$whari))." jam lalu";}
			return $waktu;
		}
		function select_by_date_range($data)
		{
			$condition = "angkatan BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
			$this->db->select('*');
			$this->db->from('tb_alumni');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result();
			} else {
			return false;
			}
			/*$condition = "angkatan BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
			$this->db->select('*');
			$this->db->from('tb_alumni');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result_array();
			} else {
			return false;
			}*/
		}
		/*function select_by_date_range_print($data)
		{
			$condition = "angkatan BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
			$this->db->select('*');
			$this->db->from('tb_alumni');
			$this->db->where($condition);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
			return $query->result_array();
			} else {
			return false;
			}
		}*/
		public function show_all_data() {
	        $this->db->select('*');
	        $this->db->from('tb_alumni');
	        $query = $this->db->get();
	        if ($query->num_rows() > 0) {
	            return $query->result();
	        } else {
	            return false;
	        }
	    }
	}
?>