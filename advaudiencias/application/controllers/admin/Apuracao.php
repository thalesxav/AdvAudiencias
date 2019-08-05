<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Apuracao extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('rbac');
		$this->load->model('admin/advogado_model', 'advogado');
		$this->load->model('admin/apuracao_model', 'apuracao');
		$this->load->model('admin/comarca_model', 'comarca');

		$this->rbac->check_module_access();
    }

	//-----------------------------------------------------
	function index($type='')
	{
		$this->session->set_userdata('filter_type',$type);
		$this->session->set_userdata('filter_keyword','');
		$this->session->set_userdata('filter_status','');
        $data['advogados']=$this->advogado->get_all();
		$data['view']='admin/apuracao/index';
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
        $data['info'] = $this->apuracao->get_all();
        //var_dump($data['info']);
		$this->load->view('admin/apuracao/list',$data);
    }
    
    function altera_status($id="", $status="")
    {
        //$this->rbac->check_operation_access(); // check opration permission
        //var_dump($id);
        //var_dump($status);

        //$id =  $this->uri->segment(4);
        //$status =  $this->uri->segment(5);

        //var_dump($this->uri);

		if($id=="" || $status==""){
			echo "error";
		}
		else{
            $retorno = $this->apuracao->altera_status($id, $status);
            echo $retorno;
		}
    }

	//--------------------------------------------------
	function add()
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){

        //var_dump($_REQUEST);
            $this->form_validation->set_rules('codigo', 'Código', 'trim|required');
            $this->form_validation->set_rules('data', 'Data', 'trim|required');
            $this->form_validation->set_rules('hora', 'Hora', 'trim|required');
            $this->form_validation->set_rules('codigo_comarca', 'Comarca', 'trim|required');
            $this->form_validation->set_rules('codigo_advogado', 'Advogado', 'trim|required');
            $this->form_validation->set_rules('processo', 'Processo', 'trim|required');
            $this->form_validation->set_rules('grupo_cota', 'Grupo/Cota', 'trim|required');
            $this->form_validation->set_rules('tipo_apuracao', 'Tipo Audiência', 'trim|required');
            $this->form_validation->set_rules('parte_1', 'Parte 1', 'trim|required');
            $this->form_validation->set_rules('parte_2', 'AgêncParte 2ia', 'trim|required');
            $this->form_validation->set_rules('adv_escritorio', 'Advogado Escritório', 'trim|required');
            
            $data['codigo'] = $this->apuracao->get_last_id();
            $data['comarcas'] = $this->comarca->get_all();
            $data['advogados'] = $this->advogado->get_all();

            if ($this->form_validation->run() == FALSE) {
                $data['view'] = 'admin/apuracao/add';
                $this->load->view('layout', $data);
            }
            else{
                $date=date_create($this->input->post('data'));

                $data = array(
                    'codigo' => $this->input->post('codigo'),
                    'data' => date_format($date,"Y/m/d"),
                    'hora' => $this->input->post('hora'),
                    'codigo_comarca' => $this->input->post('codigo_comarca'),
                    'codigo_advogado' => $this->input->post('codigo_advogado'),
                    'processo' => $this->input->post('processo'),
                    'grupo_cota' => $this->input->post('grupo_cota'),
                    'tipo_apuracao' => $this->input->post('tipo_apuracao'),
                    'parte_1' => $this->input->post('parte_1'),
                    'parte_2' => $this->input->post('parte_2'),
                    'adv_escritorio' => $this->input->post('adv_escritorio'),
                    'observacoes' => $this->input->post('observacoes'),
                    'status' => $this->input->post('status'),
                );
                
                $data = $this->security->xss_clean($data);
                $result = $this->apuracao->add_apuracao($data);

                if($result){
                    $this->session->set_flashdata('msg', 'Audiência adicionada com sucesso!');
                    redirect(base_url('admin/apuracao'));
                }
            }
        }
        else
        {
            $data['codigo'] = $this->apuracao->get_last_id();
            $data['comarcas'] = $this->comarca->get_all();
            $data['advogados'] = $this->advogado->get_all();
            $data['view']='admin/apuracao/add';
            $this->load->view('layout',$data);
        }
	}

	//--------------------------------------------------
	function edit($id="")
	{
		$this->rbac->check_operation_access(); // check opration permission

		if($this->input->post('submit')){

			$this->form_validation->set_rules('codigo', 'Código', 'trim|required');
            $this->form_validation->set_rules('data', 'Data', 'trim|required');
            $this->form_validation->set_rules('hora', 'Hora', 'trim|required');
            $this->form_validation->set_rules('codigo_comarca', 'Comarca', 'trim|required');
            $this->form_validation->set_rules('codigo_advogado', 'Advogado', 'trim|required');
            $this->form_validation->set_rules('processo', 'Processo', 'trim|required');
            $this->form_validation->set_rules('grupo_cota', 'Grupo/Cota', 'trim|required');
            $this->form_validation->set_rules('tipo_apuracao', 'Tipo Audiência', 'trim|required');
            $this->form_validation->set_rules('parte_1', 'Parte 1', 'trim|required');
            $this->form_validation->set_rules('parte_2', 'AgêncParte 2ia', 'trim|required');
            $this->form_validation->set_rules('adv_escritorio', 'Advogado Escritório', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['apuracao'] = $this->apuracao->get_advogado_by_id($id);
				$data['view'] = 'admin/apuracao/edit';
				$this->load->view('layout', $data);
			}
			else{

				$date=date_create($this->input->post('data'));

                $data = array(
                    'codigo' => $this->input->post('codigo'),
                    'data' => date_format($date,"Y/m/d"),
                    'hora' => $this->input->post('hora'),
                    'codigo_comarca' => $this->input->post('codigo_comarca'),
                    'codigo_advogado' => $this->input->post('codigo_advogado'),
                    'processo' => $this->input->post('processo'),
                    'grupo_cota' => $this->input->post('grupo_cota'),
                    'tipo_apuracao' => $this->input->post('tipo_apuracao'),
                    'parte_1' => $this->input->post('parte_1'),
                    'parte_2' => $this->input->post('parte_2'),
                    'adv_escritorio' => $this->input->post('adv_escritorio'),
                    'observacoes' => $this->input->post('observacoes'),
                    'status' => $this->input->post('status'),
                );

				$data = $this->security->xss_clean($data);
				$result = $this->apuracao->edit($data, $id);

				if($result){
					$this->session->set_flashdata('msg', 'Audiência atualizada com sucesso!');
					redirect(base_url('admin/apuracao'));
				}
			}
		}
		elseif($id==""){
			redirect('admin/apuracao');
		}
		else{
            $data['apuracao'] = $this->apuracao->get_apuracao_by_id($id)[0];
            $data['comarcas'] = $this->comarca->get_all();
            $data['advogados'] = $this->advogado->get_all();
			$data['comarcas'] = $this->comarca->get_all();
			$data['view'] = 'admin/apuracao/edit';
			$this->load->view('layout',$data);
		}
	}

    //------------------------------------------------------------
	function delete($id='')
	{
		$this->rbac->check_operation_access(); // check opration permission

		$this->apuracao->delete($id);
		$this->session->set_flashdata('success','apuracao deletada com sucesso.');
		redirect('admin/apuracao');
	}

}

?>