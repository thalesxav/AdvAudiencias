<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/dashboard_model', 'dashboard_model');
			$this->load->model('dashboard_model');
		}

		public function index()
		{
			$date = new DateTime('now');
			$date->modify('last day of this month');
			$data_ini = date('Y-m-01');
			$data_fim = $date->format('Y-m-d');

			if($this->input->get('submit'))
			{
				$date = str_replace('/', '-', $this->input->get('data_ini'));
				$data_ini = date("Y-m-d", strtotime($date));
				$date = str_replace('/', '-', $this->input->get('data_fim'));
				$data_fim = date("Y-m-d", strtotime($date));
				/*echo $data_ini;
				echo $data_fim;
				exit;*/
			}
			else
			{
				$data['usuarios'] = $this->dashboard_model->get_count_usuarios();
				$data['advogados'] = $this->dashboard_model->get_count_advogados();
				$data['comarcas'] = $this->dashboard_model->get_count_comarcas();
				$data['audiencias'] = $this->dashboard_model->get_count_audiencias();
			}

			$total = 0;
			$retorno = $this->dashboard_model->get_count_audiencias_por_mes($data_ini, $data_fim);

			foreach($retorno as $k => $v)
			{
				if($v['tipo_audiencia'] == 1)
					$data['justica_comum'] = $v['quantidade'];
				if($v['tipo_audiencia'] == 2)
					$data['adv_preposto'] = $v['quantidade'];
				if($v['tipo_audiencia'] == 3)
					$data['preposto'] = $v['quantidade'];
				if($v['tipo_audiencia'] == 4)
					$data['procon'] = $v['quantidade'];
				if($v['tipo_audiencia'] == 5)
					$data['trabalhista'] = $v['quantidade'];
				if($v['tipo_audiencia'] == 6)
					$data['outros'] = $v['quantidade'];	
					
				$total = $total + $v['quantidade'];
			}

			if(!isset($data['justica_comum']))
				$data['justica_comum'] = 0;
			if(!isset($data['adv_preposto']))
				$data['adv_preposto'] = 0;
			if(!isset($data['preposto']))
				$data['preposto'] = 0;
			if(!isset($data['procon']))
				$data['procon'] = 0;
			if(!isset($data['trabalhista']))
				$data['trabalhista'] = 0;
			if(!isset($data['outros']))
				$data['outros'] = 0;

			$data['total'] = $total;


			//--------------------

			$retorno = $this->dashboard_model->get_count_status_audiencias_por_mes($data_ini, $data_fim);

			foreach($retorno as $k => $v)
			{
				if($v['status'] == 1)
					$data['audiencia_cadasrtada'] = $v['quantidade'];
				if($v['status'] == 2)
					$data['adv_confirmado'] = $v['quantidade'];
				if($v['status'] == 3)
					$data['defesa_elaborada'] = $v['quantidade'];
				if($v['status'] == 4)
					$data['protocolado'] = $v['quantidade'];
				if($v['status'] == 5)
					$data['enviado_correspondente'] = $v['quantidade'];
				if($v['status'] == 6)
					$data['ata_recebida'] = $v['quantidade'];	
				if($v['status'] == 7)
					$data['pago'] = $v['quantidade'];	
				if($v['status'] == 8)
					$data['arquivado'] = $v['quantidade'];											
			}

			if(!isset($data['audiencia_cadasrtada']))
				$data['audiencia_cadasrtada'] = 0;
			if(!isset($data['adv_confirmado']))
				$data['adv_confirmado'] = 0;
			if(!isset($data['defesa_elaborada']))
				$data['defesa_elaborada'] = 0;
			if(!isset($data['protocolado']))
				$data['protocolado'] = 0;
			if(!isset($data['enviado_correspondente']))
				$data['enviado_correspondente'] = 0;
			if(!isset($data['ata_recebida']))
				$data['ata_recebida'] = 0;
			if(!isset($data['pago']))
				$data['pago'] = 0;
			if(!isset($data['arquivado']))
				$data['arquivado'] = 0;								

			$data['total'] = $total;

			$date = new DateTime($data_ini);
			$data['data_ini'] = $date->format('d/m/Y');
			$date = new DateTime($data_fim);
			$data['data_fim'] = $date->format('d/m/Y');
			
			if($this->input->get('submit'))
			{
				echo json_encode($data);
				exit;
			}
			//var_dump($data);exit;
			$data['title'] = 'Painel';
			$data['view'] = 'admin/dashboard/dashboard1';
			$this->load->view('layout', $data);
		}
		
	}

?>	