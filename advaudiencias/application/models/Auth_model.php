<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	public function login($data)
	{
		$this->db->select('admin_role_id');
		$this->db->from('ci_admin');
		$this->db->where('email',$data['username']);
		$query=$this->db->get();
		$idsArray = $query->row_array();
		$IN = implode (",", $idsArray);
		var_dump($IN);

		$this->db->select('*, ci_admin.admin_role_id as roles_ids');
		$this->db->from('ci_admin,ci_admin_roles');
		$this->db->where_in('ci_admin_roles.admin_role_id', $idsArray);
		$this->db->where('ci_admin.email', $data['username']);

		//echo $this->db->_compile_select();exit;

		$query = $this->db->get();
		//echo $this->db->last_query();
		//var_dump($result = $query->row_array());exit;
		//var_dump($query);exit;
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
			//var_dump(password_hash($data['password'], PASSWORD_BCRYPT));
			//var_dump($result['password']);exit;
			$validPassword = password_verify($data['password'], $result['password']);
			//var_dump($validPassword);exit;
		    if($validPassword){
				//var_dump($query->row_array());//exit;
		        return $result = $query->row_array();
		    }

		}
	}

	//--------------------------------------------------------------------
	public function register($data){
		$this->db->insert('ci_admin', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function email_verification($code){
		$this->db->select('email, token, is_active');
		$this->db->from('ci_admin');
		$this->db->where('token', $code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('token', $code);
			$this->db->update('ci_admin', array('is_verify' => 1, 'token'=> ''));
			return true;
		}
		else{
			return false;
			}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('ci_admin', array('email' => $email));

    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }

    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id){
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('admin_id', $user_id);
    	$this->db->update('ci_admin', $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code){

    	$result = $this->db->get_where('ci_admin',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('ci_admin', $data);
		return true;
    }

    //--------------------------------------------------------------------
	public function get_admin_detail(){
		$id = $this->session->userdata('admin_id');
		$query = $this->db->get_where('ci_admin', array('admin_id' => $id));
		return $result = $query->row_array();
	}

	//--------------------------------------------------------------------
	public function update_admin($data){
		$id = $this->session->userdata('admin_id');
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}

	//--------------------------------------------------------------------
	public function change_pwd($data, $id){
		$this->db->where('admin_id', $id);
		$this->db->update('ci_admin', $data);
		return true;
	}

}

?>