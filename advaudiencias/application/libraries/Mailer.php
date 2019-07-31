<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
	}
	//=============================================================
	function Tpl_Registration($username, $password, $email_verification_link)
	{
    $login_link = base_url('auth/login');  

		$tpl = '<h3>Olá ' .strtoupper($username).'</h3>
            <p>Bem vindo!</p>
            <p>Ative sua conta clicando no link abaixo:</p>  
            <p>'.$email_verification_link.'</p>
            <p>Sua senha é:</p>  
            <h3>'.$password.'</h3>
            <br>

            <p>Obrigado! <br> 
            </p>
    ';
		return $tpl;		
  }    

	//=============================================================
	function Tpl_PwdResetLink($username, $reset_link)
	{
		$tpl = '<h3>Olá ' .strtoupper($username).'</h3>
            <p>Recebemos uma solicitação para recriar sua senha.</p> 
            <p>Para continuar, basta clicar no link abaixo:</p> 
            <p>'.$reset_link.'</p>

            <br>
            <br>

            <p>Obrigado!</p>
    ';
		return $tpl;		
	}

	

}
?>