<?php
class RBAC 
{	
	private $module_access;
	function __construct()
	{
		
		$this->obj =& get_instance();
		$this->obj->module_access = $this->obj->session->userdata('module_access');
	}

	//----------------------------------------------------------------
	function set_access_in_session()
	{
		//var_dump($this->obj->session);exit;
		$this->obj->db->from('module_access');
		$this->obj->db->where_in('admin_role_id',explode(',', trim($this->obj->session->userdata('admin_role_id'))));
		$query=$this->obj->db->get();
		//echo $this->obj->db->last_query();exit;
		$data=array();
		foreach($query->result_array() as $v)
		{
			$data[$v['module']][$v['operation']] = '';
		}
		$this->obj->session->set_userdata('module_access',$data);
	} 	

	//--------------------------------------------------------------	
	function check_module_permission($module)
	{
		//var_dump($this->obj->module_access);exit;
		if(isset($this->obj->module_access[$module])) 
			return 1;
		else 
		 	return 0;
	}

	//--------------------------------------------------------------	
	function Check_operation_permission($operation)
	{
		//var_dump($operation);
		//var_dump($this->obj->module_access[$this->obj->uri->segment(2)][$operation]);exit;
		if(isset($this->obj->module_access[$this->obj->uri->segment(2)][$operation])) 
			return 1;
		else 
		 	return 0;
	}

	//--------------------------------------------------------------	
	function check_module_access()
	{
		if(!$this->check_module_permission($this->obj->uri->segment(2)))
		{
			$back_to = $_SERVER['REQUEST_URI'];
			$back_to = $this->obj->functions->encode($back_to);
			redirect('access_denied/index/'.$back_to);
		}
	}

	//--------------------------------------------------------------	
	function check_operation_access()
	{
		//var_dump($this->obj->uri->segment(3));
		if(!$this->check_operation_permission($this->obj->uri->segment(3)))
		{
			$back_to =$_SERVER['REQUEST_URI'];
			$back_to = $this->obj->functions->encode($back_to);
			redirect('access_denied/index/'.$back_to);
		}
	}

}
?>