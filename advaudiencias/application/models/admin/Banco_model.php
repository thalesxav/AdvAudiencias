<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Banco_model extends CI_Model{

	//-----------------------------------------------------
	function get_comarca_by_id($id)
	{
		//$this->db->select('admin_role_id');
		$this->db->from('bancos');
		$this->db->where('cod',$id);
		$query=$this->db->get();
		return $query->row_array();
	}

	//-----------------------------------------------------
	function get_all()
	{
		$this->db->from('bancos');
		$query = $this->db->get();
		$module = array();
		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
		}
		return $module;
	}

		//-----------------------------------------------------
	public function add_comarca($data){
		$this->db->insert('bancos', $data);
		return true;
	}

	public function get_last_id(){
		$this->db->from('bancos');
		$this->db->order_by('cod	','desc');
		$this->db->limit(1);
		$query = $this->db->get();
		//var_dump($query);
		if ($query->num_rows() == 0)
			return 1;

		//var_dump($query->result_array()[0]['codigo']);
		//var_dump($query->result_array());exit;
		return $query->result_array()[0]['codigo'] + 1;
	}

	//---------------------------------------------------
	// Edit Admin Record
	public function edit($data, $id){
		$this->db->where('cod', $id);
		$this->db->update('bancos', $data);
		
		//echo $this->db->last_query();exit;
		return true;
	}

		//-----------------------------------------------------
	function delete($id)
	{		
		$this->db->where('cod',$id);
		$this->db->delete('bancos');
	} 

}

?>