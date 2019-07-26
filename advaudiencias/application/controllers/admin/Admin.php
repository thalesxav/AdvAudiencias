<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('rbac');
		$this->load->model('admin/admin_model', 'admin');

		$this->rbac->check_module_access();
    }

	//-----------------------------------------------------		
	function index($type='')
	{
		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		
		$data['admin_roles'] = $this->admin->get_admin_roles();
		$data['view']='admin/admin/index';
		$this->load->view('layout',$data);
	}

	//---------------------------------------------------------
	function filterdata()
	{
		$this->session->set_userdata('filter_type',$this->input->post('type'));
		$this->session->set_userdata('filter_status',$this->input->post('status'));
		$this->session->set_userdata('filter_keyword',$this->input->post('keyword'));
	}

	//--------------------------------------------------		
	function list_data()
	{
		$data['info'] = $this->admin->get_all();
		$this->load->view('admin/admin/list',$data);
	}

	//-----------------------------------------------------------
	function change_status()
	{   
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->change_status();
	}
	
	//--------------------------------------------------
	function add()
	{	
		$this->rbac->check_operation_access(); // check opration permission

		$data['admin_roles']=$this->admin->get_admin_roles();

		if($this->input->post('submit')){
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				//$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
				//$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
				//$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				//$this->form_validation->set_rules('password', 'Password', 'trim|required');
				$this->form_validation->set_rules('role[]', 'Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/admin/add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'admin_role_id' => $this->ArrayToStringConcat($this->input->post('role[]')),
						'estados' => $this->ArrayToStringConcat($this->input->post('estados[]')),
						'username' => $this->input->post('username'),
						//'firstname' => $this->input->post('firstname'),
						//'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						//'mobile_no' => $this->input->post('mobile_no'),
						'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'is_active' => 1,
						'created_at' => date('Y-m-d : h:m:s'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->admin->add_admin($data);
					if($result){
						
						$this->session->set_flashdata('msg', 'Usuário adicionado com sucesso!');
						redirect(base_url('admin/admin'));
					}
				}
			}
			else
			{
				$data['view']='admin/admin/add';
				$this->load->view('layout',$data);	
			}
	}

	//--------------------------------------------------
	function edit($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		$data['admin_roles'] = $this->admin->get_admin_roles();
		//var_dump($data['admin_roles']);exit;

		if($this->input->post('submit')){

			//var_dump($this->input->post('role[]'));exit;

			$this->form_validation->set_rules('username', 'Usuário', 'trim|required');
			//$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			//$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required');
			//$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
			$this->form_validation->set_rules('role[]', 'Role', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['admin'] = $this->admin->get_admin_by_id($id);
				$data['view'] = 'admin/admin/edit';
				$this->load->view('layout', $data);
			}
			else{
				
				$data = array(
					//'admin_role_id' => $this->input->post('role'),
					'admin_role_id' => $this->ArrayToStringConcat($this->input->post('role[]')),
					'username' => $this->input->post('username'),
					//'firstname' => $this->input->post('firstname'),
					//'lastname' => $this->input->post('lastname'),
					'email' => $this->input->post('email'),
					'estados' => $this->ArrayToStringConcat($this->input->post('estados[]')),
					//'mobile_no' => $this->input->post('mobile_no'),
					'is_active' => 1,
					'updated_at' => date('Y-m-d : h:m:s'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->admin->edit_admin($data, $id);

				if($result){
					$this->session->set_flashdata('msg', 'Usuário atualizado com sucesso!');
					redirect(base_url('admin/admin'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/admin');
		}
		else{
			$data['admin'] = $this->admin->get_admin_by_id($id);
			$data['view'] = 'admin/admin/edit';
			$this->load->view('layout',$data);
		}		
	}

	public function ArrayToStringConcat($array)
	{
		$retorno = "";
		foreach($array as $strValue)
			$retorno .= $strValue . ",";

		return  substr($retorno,0,-1);
	}

	public function change_pwd($id = 0)
	{
		if($this->input->post('submit'))
		{
			//var_dump($id);exit;
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('confirm_pwd', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['admin'] = $this->admin->get_admin_by_id($id);
				$data['view'] = 'admin/admin/user_edit';
				$this->load->view('layout', $data);
			}
			else{
				//var_dump(password_hash($this->input->post('password'), PASSWORD_BCRYPT));exit;
				$data = array(
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->admin->change_pwd($data, $id);
				if($result){
					$this->session->set_flashdata('msg', 'Senha atualizada com sucesso!');
					redirect(base_url('admin/admin'));
				}
			}
		}
		else
		{
			//var_dump($id);
			$this->rbac->check_operation_access(); // check opration permission
			$data['admin'] = $this->admin->get_admin_by_id($id);
			$data['view'] = 'admin/admin/change_pwd';
			$this->load->view('layout', $data);
		}
	}

	//--------------------------------------------------
	function check_username($id=0)
    {
		$this->db->from('admin');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('admin_id !='.$id);
		$query=$this->db->get();
		if($query->num_rows() >0)
			echo 'false';
		else 
	    	echo 'true';
    }

    //------------------------------------------------------------
	function delete($id='')
	{   
		$this->rbac->check_operation_access(); // check opration permission

		$this->admin->delete($id);
		$this->session->set_flashdata('success','User has been Deleted Successfully.');	
		redirect('admin/admin');
	}
	
}

?>