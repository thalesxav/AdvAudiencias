<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comarca_model extends CI_Model{

	//-----------------------------------------------------
	function get_comarca_by_id($id)
	{
		//$this->db->select('admin_role_id');
		$this->db->from('comarcas');
		$this->db->where('codigo',$id);
		$query=$this->db->get();
		return $query->row_array();
	}

	//-----------------------------------------------------
	function get_all()
	{
		$this->db->from('comarcas');
		/*$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');
		
		if($this->session->userdata('filter_type')!='')
			$this->db->where('ci_admin.admin_role_id',$this->session->userdata('filter_type'));

		if($this->session->userdata('filter_status')!='')
			$this->db->where('ci_admin.is_active',$this->session->userdata('filter_status'));

		$filterData = $this->session->userdata('filter_keyword');
		$where = "(
			ci_admin_roles.admin_role_title like '%$filterData%' OR
			ci_admin.firstname like '%$filterData%' OR
			ci_admin.lastname like '%$filterData%' OR
			ci_admin.email like '%$filterData%' OR
			ci_admin.mobile_no like '%$filterData%' OR
			ci_admin.username like '%$filterData%'
		)";
		$this->db->where($where);

		$this->db->order_by('ci_admin.admin_id','desc');*/
			//$this->db->limit($limit, $offset);
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
		$this->db->insert('comarcas', $data);
		return true;
	}

	public function get_last_id(){
		$this->db->from('comarcas');
		$this->db->order_by('codigo	','desc');
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
		$this->db->where('codigo', $id);
		$this->db->update('comarcas', $data);
		
		//echo $this->db->last_query();exit;
		return true;
	}

		//-----------------------------------------------------
	function delete($id)
	{		
		$this->db->from('advogado_comarca');
		$this->db->where('codigo_comarca',$id);
		$query=$this->db->get();

		if ($query->num_rows() == 0)
		{
			$this->db->where('codigo',$id);
			$this->db->delete('comarcas');
			return true;
		}
		return false;
	} 

}

?>