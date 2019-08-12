<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Advogado extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('rbac');
		$this->load->model('admin/advogado_model', 'advogado');
		$this->load->model('admin/banco_model', 'banco');
		$this->load->model('admin/comarca_model', 'comarca');

		$this->rbac->check_module_access();
    }

	//-----------------------------------------------------
	function index($type='')
	{
		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');

		$data['view']='admin/advogado/index';
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
		$all = $this->advogado->get_all();
		$new_array = array();
		$array_codigo = array();
		$i=-1;

		foreach($all as $array)
		{
			$exite = false;
			$estado = '';
			foreach($array as $k => $v)
			{
				if($k == 'codigo_advogado')
				{
					if(in_array($v, $array_codigo))
						$exite = true;
					else
						$array_codigo[] = $v;
				}
				else if ($k == 'estado')
					$estado = $v;
			}
			if($exite)
				$new_array[$i]['estado'] = $new_array[$i]['estado'] . ' | ' . $estado;
			else
			{
				$new_array[] = $array;
				$i++;
			}
		}
		$data['info'] = $new_array;
		$this->load->view('admin/advogado/list',$data);
	}

	//--------------------------------------------------
	function get_advogados_por_comarca($codigo_comarca)
	{
		$result = $this->advogado->get_advogados_por_comarca($codigo_comarca);
		echo json_encode($result);
	}

	//--------------------------------------------------
	function add()
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){

				$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
				$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
				//$this->form_validation->set_rules('numero_oab', 'Num. OAB', 'trim|required');
				//$this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
				//$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required');
				//$this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
				$this->form_validation->set_rules('banco', 'Banco', 'trim|required');
				$this->form_validation->set_rules('conta', 'Conta', 'trim|required');
				$this->form_validation->set_rules('agencia', 'Agência', 'trim|required');
				$this->form_validation->set_rules('comarcas[]', 'Comarcas', 'trim|required');
				
                $data['codigo'] = $this->advogado->get_last_id();

				if ($this->form_validation->run() == FALSE) {
					$data['bancos'] = $this->banco->get_all();
					$data['comarcas'] = $this->comarca->get_all();
					$data['view'] = 'admin/advogado/add';
					$this->load->view('layout', $data);
				}
				else{
					$data = array(
						'codigo' => $this->input->post('codigo'),
						'nome' => $this->input->post('nome'),
						'numero_oab' => $this->input->post('numero_oab'),
						'cpf' => $this->input->post('cpf'),
						'email' => $this->input->post('email'),
						'telefone' => $this->input->post('telefone'),
						'banco' => $this->input->post('banco'),
						'conta' => $this->input->post('conta'),
						'agencia' => $this->input->post('agencia'),
						'vlr_justica_comum' => $this->input->post('vlr_justica_comum'),
						'vlr_adv_preposto' => $this->input->post('vlr_adv_preposto'),
						'vlr_preposto' => $this->input->post('vlr_preposto'),
						'vlr_procon' => $this->input->post('vlr_procon'),
						'vlr_trabalhista' => $this->input->post('vlr_trabalhista'),
						'vlr_outros' => $this->input->post('vlr_outros'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->advogado->add_advogado($data);

					$array['codigo_advogado'] = $data['codigo'];
					$array['comarcas'] = $this->input->post('comarcas');
					$result = $this->advogado->add_advogado_comarcas($array);
					if($result){
						$this->session->set_flashdata('msg', 'Advogado adicionada com sucesso!');
						redirect(base_url('admin/advogado'));
					}
				}
			}
			else
			{
				$data['codigo'] = $this->advogado->get_last_id();
				$data['bancos'] = $this->banco->get_all();
				$data['comarcas'] = $this->comarca->get_all();
				$data['view']='admin/advogado/add';
				$this->load->view('layout',$data);
			}
	}

	//--------------------------------------------------
	function edit($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){

			$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required');
			//$this->form_validation->set_rules('numero_oab', 'Num. OAB', 'trim|required');
			//$this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
			//$this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email|required');
			//$this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');
			$this->form_validation->set_rules('banco', 'Banco', 'trim|required');
			$this->form_validation->set_rules('conta', 'Conta', 'trim|required');
			$this->form_validation->set_rules('agencia', 'Agência', 'trim|required');
			$this->form_validation->set_rules('comarcas[]', 'Comarcas', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['advogado'] = $this->advogado->get_advogado_by_id($id);
				$data['bancos'] = $this->banco->get_all();
				$data['comarcas'] = $this->comarca->get_all();
				$data['view'] = 'admin/advogado/edit';
				$this->load->view('layout', $data);
			}
			else{

				$data = array(
					'codigo' => $this->input->post('codigo'),
					'nome' => $this->input->post('nome'),
					'numero_oab' => $this->input->post('numero_oab'),
					'cpf' => $this->input->post('cpf'),
					'email' => $this->input->post('email'),
					'telefone' => $this->input->post('telefone'),
					'banco' => $this->input->post('banco'),
					'conta' => $this->input->post('conta'),
					'agencia' => $this->input->post('agencia'),
					'vlr_justica_comum' => $this->input->post('vlr_justica_comum'),
					'vlr_adv_preposto' => $this->input->post('vlr_adv_preposto'),
					'vlr_preposto' => $this->input->post('vlr_preposto'),
					'vlr_procon' => $this->input->post('vlr_procon'),
					'vlr_trabalhista' => $this->input->post('vlr_trabalhista'),
					'vlr_outros' => $this->input->post('vlr_outros'),
				);

				$data = $this->security->xss_clean($data);
				$result = $this->advogado->edit($data, $id);

				$array['codigo_advogado'] = $data['codigo'];
				$array['comarcas'] = $this->input->post('comarcas');
				$result = $this->advogado->delete_advogados_comarcas($array['codigo_advogado']);
				$result = $this->advogado->add_advogado_comarcas($array);
				
				if($result){
					$this->session->set_flashdata('msg', 'Advogado atualizada com sucesso!');
					redirect(base_url('admin/advogado'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/advogado');
		}
		else{
			//echo $id;
			$data['advogado'] = $this->advogado->get_advogado_by_id($id);
			$data['bancos'] = $this->banco->get_all();
			$data['comarcas'] = $this->comarca->get_all();
			$data['view'] = 'admin/advogado/edit';
			//var_dump($data['advogado']);exit;
			$this->load->view('layout',$data);
		}
	}

    //------------------------------------------------------------
	function delete($id='')
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->advogado->delete($id))
		{
			$this->session->set_flashdata('success','Advogado deletado com sucesso.');
			redirect('admin/advogado');
		}
		else{
			$this->session->set_flashdata('error','Não foi possível deletar o Advogado, pois ele se encontra associado a uma Audiência.');
			$data['view'] = 'admin/advogado/index';
			$data['msg'] = 'Não foi possível deletar o Advogado, pois ele se encontra associado a uma Audiência.';
			$this->load->view('layout', $data);
			//$this->session->set_flashdata('msg', 'Comarca atualizada com sucesso!');
			//redirect(base_url('admin/comarca'));
		}
	}

}

?>