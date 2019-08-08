<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/dashboard_model', 'dashboard_model');
			$this->load->model('dashboard_model');
		}

		public function index(){
			$data['usuarios'] = $this->dashboard_model->get_count_usuarios();
			$data['advogados'] = $this->dashboard_model->get_count_advogados();
			$data['comarcas'] = $this->dashboard_model->get_count_comarcas();
			$data['audiencias'] = $this->dashboard_model->get_count_audiencias();
			//echo date('01-m-Y').'<br/>';
			$date = new DateTime('now');
			$date->modify('last day of this month');
			$total = 0;

			$retorno = $this->dashboard_model->get_count_audiencias_por_mes(date('Y-m-01'), $date->format('Y-m-d'));
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

			//var_dump($data);exit;
			$data['title'] = 'Painel';
			$data['view'] = 'admin/dashboard/dashboard1';
			$this->load->view('layout', $data);
		}
		
	}

?>	