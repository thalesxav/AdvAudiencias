<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apuracao_model extends CI_Model{

	//-----------------------------------------------------
	function get_relatorio_por_advogado()
	{
		/*
		select audiencias.codigo as codigo_audiencia, audiencias.data, audiencias.hora, comarcas.estado, advogados.nome, audiencias.processo, audiencias.tipo_audiencia, advogados.vlr_justica_comum, advogados.vlr_adv_preposto, advogados.vlr_preposto, advogados.vlr_procon, advogados.vlr_trabalhista, advogados.vlr_outros, advogados.banco, advogados.agencia, advogados.conta
		FROM audiencias
		INNER JOIN advogados on (audiencias.codigo_advogado = advogados.codigo)
		INNER join comarcas on (audiencias.codigo_comarca = comarcas.codigo)
		INNER join advogado_comarca on (advogados.codigo = advogado_comarca.codigo_advogado and comarcas.codigo = advogado_comarca.codigo_comarca)
		where advogados.codigo = '1'
		*/
		$this->db->select('audiencias.codigo as codigo_audiencia, audiencias.data, audiencias.hora, comarcas.estado, advogados.nome, audiencias.processo, audiencias.tipo_audiencia, advogados.vlr_justica_comum, advogados.vlr_adv_preposto, advogados.vlr_preposto, advogados.vlr_procon, advogados.vlr_trabalhista, advogados.vlr_outros, advogados.banco, advogados.agencia, advogados.conta, advogados.codigo as codigo_advogado');
        $this->db->from('audiencias');
		$this->db->join('advogados', 'advogados.codigo = audiencias.codigo_advogado', 'Inner');
		$this->db->join('comarcas', 'comarcas.codigo = audiencias.codigo_comarca', 'Inner');
		$this->db->join('advogado_comarca', 'advogados.codigo = advogado_comarca.codigo_advogado and comarcas.codigo = advogado_comarca.codigo_comarca', 'Inner');
		
		if($this->session->userdata('filter_status')!='')
			$this->db->where('audiencias.status',$this->session->userdata('filter_status'));

		$this->db->order_by('codigo_audiencia	','asc');
		$query = $this->db->get();
		//var_dump($query);
		return $query->result_array();
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