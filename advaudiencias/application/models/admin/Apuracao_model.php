<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apuracao_model extends CI_Model{

	//-----------------------------------------------------
	function get_audiencia_by_id($id)
	{
		$this->db->from('audiencias');
		//$this->db->join('audiencia_comarcas','audiencia_comarcas.codigo_audiencia IN (select X.admin_role_id from audiencia_comarcas X where X.admin_id = ci_admin.admin_id)');
		//$this->db->join('audiencia_comarca', 'audiencias.codigo = audiencia_comarca.codigo_audiencia ', 'Inner');
		//$this->db->join('comarcas', 'comarcas.codigo = audiencia_comarca.codigo_comarca ', 'Inner');
		
		$this->db->where('audiencias.codigo',$id);
		$query=$this->db->get();
		return $query->result_array();
		//echo $this->db->last_query();exit;
		//var_dump($query->result_array());exit;
		//return $query->row_array();
	}

	//-----------------------------------------------------
	function get_all()
	{
        $this->db->select('audiencias.*, comarcas.estado, comarcas.comarca, advogados.nome, advogados.numero_oab');
        $this->db->from('audiencias');
        $this->db->join('comarcas', 'comarcas.codigo = audiencias.codigo_comarca', 'Inner');
        $this->db->join('advogados', 'advogados.codigo = audiencias.codigo_advogado', 'Inner');
		/*$this->db->join('ci_admin_roles','ci_admin_roles.admin_role_id=ci_admin.admin_role_id');
		
		if($this->session->userdata('filter_type')!='')
			$this->db->where('ci_admin.admin_role_id',$this->session->userdata('filter_type'));*/

		if($this->session->userdata('filter_status')!='')
			$this->db->where('audiencias.status',$this->session->userdata('filter_status'));

		/*$filterData = $this->session->userdata('filter_keyword');
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
        
		//echo $this->db->last_query();exit;
		$module = array();
		if ($query->num_rows() > 0) 
		{
			$module = $query->result_array();
        }
        //var_dump($module);exit;
		return $module;
	}

		//-----------------------------------------------------
	public function add_audiencia($data){
		$this->db->insert('audiencias', $data);
		//echo $this->db->last_query();exit;
		return true;
    }
    
    public function altera_status($id, $status)
    {
        $data['status'] = $status;
        $this->db->where('codigo', $id);
		$this->db->update('audiencias', $data);
		
		//echo $this->db->last_query();exit;
		return true;
    }

	public function add_audiencia_comarcas($data){

		$x['codigo_audiencia'] = $data['codigo_audiencia'];

		foreach($data['comarcas'] as $key => $value)
		{
			$x['codigo_comarca'] = $value;
			$this->db->insert('audiencia_comarca', $x);
		}
		
		return true;
	}

	public function get_last_id(){
		$this->db->from('audiencias');
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
		$this->db->update('audiencias', $data);
		
		//echo $this->db->last_query();exit;
		return true;
	}

		//-----------------------------------------------------
	function delete($id)
	{		
		$this->db->where('codigo',$id);
		$this->db->delete('audiencias');
	} 

}

?>