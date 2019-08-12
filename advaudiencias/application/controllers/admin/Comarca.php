<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comarca extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('rbac');
		$this->load->model('admin/comarca_model', 'comarca');

		$this->rbac->check_module_access();
    }

	//-----------------------------------------------------
	function index($type='')
	{
		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
		$this->session->set_userdata('msg','');
		$this->session->unset_userdata('msg');
		$this->session->set_flashdata('msg', '');

		$data['view']='admin/comarca/index';
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
		$data['info'] = $this->comarca->get_all();
		$this->load->view('admin/comarca/list',$data);
	}

	//--------------------------------------------------
	function add()
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){
				$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
				$this->form_validation->set_rules('estado', 'Estado', 'trim|required');
				$this->form_validation->set_rules('comarca', 'Comarca', 'trim|required');

                $data['codigo'] = $this->comarca->get_last_id();

				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/comarca/add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'codigo' => $this->input->post('codigo'),
						'estado' => $this->input->post('estado'),
						'comarca' => $this->input->post('comarca'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->comarca->add_comarca($data);
					if($result){
						$this->session->set_flashdata('msg', 'Comarca adicionada com sucesso!');
						redirect(base_url('admin/comarca'));
					}
				}
			}
			else
			{
                $data['codigo'] = $this->comarca->get_last_id();
				$data['view']='admin/comarca/add';
				$this->load->view('layout',$data);
			}
	}

	//--------------------------------------------------
	function edit($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){

			$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
            $this->form_validation->set_rules('estado', 'Estado', 'trim|required');
            $this->form_validation->set_rules('comarca', 'Comarca', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['comarca'] = $this->comarca->get_comarca_by_id($id);
				$data['view'] = 'admin/comarca/edit';
				$this->load->view('layout', $data);
			}
			else{

				$data = array(
					'codigo' => $this->input->post('codigo'),
                    'estado' => $this->input->post('estado'),
                    'comarca' => $this->input->post('comarca'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->comarca->edit($data, $id);

				if($result){
					$this->session->set_flashdata('msg', 'Comarca atualizada com sucesso!');
					redirect(base_url('admin/comarca'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/comarca');
		}
		else{
			$data['comarca'] = $this->comarca->get_comarca_by_id($id);;
			$data['view'] = 'admin/comarca/edit';
			$this->load->view('layout',$data);
		}
	}

    //------------------------------------------------------------
	function delete($id='')
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->comarca->delete($id))
		{
			$this->session->set_flashdata('success','Comarca deletada com sucesso.');
			redirect('admin/comarca');
		}
		else{
			$this->session->set_flashdata('error','Não foi possível deletar a Comarca, pois a mesma se encontra associada a uma Audiência.');
			$data['view'] = 'admin/comarca/index';
			$data['msg'] = 'Não foi possível deletar a Comarca, pois a mesma se encontra associada a uma Audiência.';
			$this->load->view('layout', $data);
			//$this->session->set_flashdata('msg', 'Comarca atualizada com sucesso!');
			//redirect(base_url('admin/comarca'));
		}
	}

}

?>