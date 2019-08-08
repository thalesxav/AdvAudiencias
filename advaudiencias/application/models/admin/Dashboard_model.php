<?php
	class Dashboard_model extends CI_Model{

		public function get_count_usuarios(){
			return $this->db->count_all('ci_admin');
		}
		public function get_count_advogados(){
			return $this->db->count_all('advogados');
		}
		public function get_count_comarcas(){
			return $this->db->count_all('comarcas');
		}
		public function get_count_audiencias(){
			return $this->db->count_all('audiencias');
		}

		public function get_count_audiencias_por_mes($minvalue, $maxvalue)
		{
			$array_retorno = array();
			//Aatual
			$this->db->select('tipo_audiencia, count(*) as quantidade');
			$this->db->from('audiencias');
			//$this->db->where('tipo_audiencia IN (1,2,3,4,5,6,7)');
			$this->db->where('data >=', $minvalue);
			$this->db->where('data <=', $maxvalue);
			$this->db->group_by("tipo_audiencia");
			$query=$this->db->get();
			//echo $this->db->last_query();
			//var_dump($query->result_array());exit;
			return $query->result_array();
			//$array_retorno['cadastrada'] = $this->db->count(1, );
			
		}
	}

?>
