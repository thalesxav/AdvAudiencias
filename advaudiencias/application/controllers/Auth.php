<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('mailer');
		$this->load->model('auth_model', 'auth_model');
	}
		//--------------------------------------------------------------
	public function index(){
		if($this->session->has_userdata('is_admin_login'))
		{
			redirect('admin/dashboard');
		}
		else{
			//echo "teste"; exit;
			redirect('auth/login');
		}
	}
		//--------------------------------------------------------------
	public function login()
	{
		if($this->input->post('submit')){

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('auth/login');
			}
			else
			{
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
				);
				//var_dump($data);exit;
				$result = $this->auth_model->login($data);
				//var_dump($result);exit;
				if($result)
				{
					if($result['is_verify'] == 0){

						/*$name = $data['username'];
						$email_verification_link = base_url('auth/verify/').md5(rand(0,1000));
						$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
						$this->load->helper('email_helper');
						$to = $data['username'];
						$subject = 'Ative sua conta!';
						$message =  $body ;
						$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
						//$email = true;
						if($email == "success"){*/
							//$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');
							//redirect(base_url('auth/login'));
							$this->session->set_flashdata('error', 'Por favor, verifique seu e-mail e ative sua conta!');
							redirect(base_url('auth/login'));
						/*}
						else{
							echo 'Email Error';
						}*/


						exit;
					}
					if($result['is_active'] == 0){
						$this->session->set_flashdata('error', 'Sua conta não está ativa!');
						redirect(base_url('auth/login'));
						exit;
					}
					if($result['is_admin'] == 1)
					{
						//var_dump($result);
						$admin_data = array(
							'admin_id' => $result['admin_id'],
							'username' => $result['username'],
							'admin_role_id' => $result['roles_ids'],
							'admin_role' => $result['admin_role_title'],
							'is_admin_login' => TRUE
						);
						//var_dump($admin_data);
						$this->session->set_userdata($admin_data);

						$this->rbac->set_access_in_session(); // set access in session

						//exit;
						redirect(base_url('admin/dashboard'), 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('error', 'Usuário ou Senha inválidos!');
					redirect(base_url('auth/login'));
				}
			}
		}
		else{
			//echo "teste"; exit;
			$this->load->view('auth/login');
		}
	}

	//-------------------------------------------------------------------------
	public function register()
	{
		if($this->input->post('submit')){
			$this->form_validation->set_rules('username', 'Username', 'trim|is_unique[ci_admin.username]|required');
			$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|is_unique[ci_admin.email]|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

			if ($this->form_validation->run() == FALSE) {
				$data['title'] = 'Create an Account';
				$this->load->view('auth/register', $data);
			}
			else{
				$data = array(
					'username' => $this->input->post('username'),
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'admin_role_id' => 2, // By default i putt role is 2 for registraiton
					'email' => $this->input->post('email'),
					'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'is_active' => 1,
					'is_verify' => 0,
					'token' => md5(rand(0,1000)),
					'last_ip' => '',
					'created_at' => date('Y-m-d : h:m:s'),
					'updated_at' => date('Y-m-d : h:m:s'),
				);
				$data = $this->security->xss_clean($data);
				$result = $this->auth_model->register($data);
				if($result){
					//sending welcome email to user
					$name = $data['firstname'].' '.$data['lastname'];
					$email_verification_link = base_url('auth/verify/').'/'.$data['token'];
					$body = $this->mailer->Tpl_Registration($name, $email_verification_link);
					$this->load->helper('email_helper');
					$to = $data['email'];
					$subject = 'Activate your account';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					$email = true;
					if($email){
						$this->session->set_flashdata('success', 'Your Account has been made, please verify it by clicking the activation link that has been send to your email.');
						redirect(base_url('auth/login'));
					}
					else{
						echo 'Email Error';
					}
				}
			}
		}
		else{
			$data['title'] = 'Create an Account';
			$this->load->view('auth/register', $data);
		}
	}

		//----------------------------------------------------------
		public function verify(){
			$verification_id = $this->uri->segment(3);
			//var_dump($verification_id);exit;
			$result = $this->auth_model->email_verification($verification_id);
			if($result){
				$this->session->set_flashdata('success', 'Seu e-mai foi verificado com sucesso. Agora você pode fazer Login.');
				redirect(base_url('auth/login'));
			}
			else{
				$this->session->set_flashdata('success', 'Não foi possível ativar sua conta. Entre em contato com o administrador.');
				redirect(base_url('auth/login'));
			}
		}
		//--------------------------------------------------
		public function forgot_password(){
			if($this->input->post('submit')){
				//checking server side validation
				$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
				if ($this->form_validation->run() === FALSE) {
					$this->load->view('auth/forget_password');
					return;
				}
				$email = $this->input->post('email');
				$response = $this->auth_model->check_user_mail($email);
				if($response){
					$rand_no = rand(0,1000);
					$pwd_reset_code = md5($rand_no.$response['admin_id']);
					$this->auth_model->update_reset_code($pwd_reset_code, $response['admin_id']);
					// --- sending email
					$name = $response['firstname'].' '.$response['lastname'];
					$email = $response['email'];
					$reset_link = base_url('auth/reset_password/'.$pwd_reset_code);
					$body = $this->mailer->Tpl_PwdResetLink($name,$reset_link);

					$this->load->helper('email_helper');
					$to = $email;
					$subject = 'Resetar sua senha';
					$message =  $body ;
					$email = sendEmail($to, $subject, $message, $file = '' , $cc = '');
					if($email){
						$this->session->set_flashdata('success', 'Nós enviamos por email as instruções para resetar sua senha.');

						redirect(base_url('auth/forgot_password'));
					}
					else{
						$this->session->set_flashdata('error', 'Houve um problema ao enviar o e-mail. Contato o Administrador.');
						redirect(base_url('auth/forgot_password'));
					}
				}
				else{
					$this->session->set_flashdata('error', 'The Email that you provided are invalid');
					redirect(base_url('auth/forgot_password'));
				}
			}
			else{
				$data['title'] = 'Resetar sua senha';
				$this->load->view('auth/forget_password',$data);
			}
		}
		//----------------------------------------------------------------
		public function reset_password($id=0){
			// check the activation code in database
			if($this->input->post('submit')){
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$result = false;
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}
				else{
					$new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
					$this->auth_model->reset_password($id, $new_password);
					$this->session->set_flashdata('success','Nova senha atualizada com sucesso. Por favor, faça login novamente.');
					redirect(base_url('auth/login'));
				}
			}
			else{
				$result = $this->auth_model->check_password_reset_code($id);
				if($result){
					$data['reset_code'] = $id;
					$data['title'] = 'Reseat Password';
					$this->load->view('auth/reset_password',$data);
				}
				else{
					$this->session->set_flashdata('error','Password Reset Code is either invalid or expired.');
					redirect(base_url('auth/forgot_password'));
				}
			}
		}

		public function logout(){
			$this->session->sess_destroy();
			redirect(base_url('auth/login'), 'refresh');
		}

	}  // end class


	?>