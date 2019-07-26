<?php
class Mailer 
{
	function __construct()
	{
		$this->CI =& get_instance();
	}
	//=============================================================
	function Tpl_Registration($username, $email_verification_link)
	{
    $login_link = base_url('auth/login');  

		$tpl = '<h3>Olá ' .strtoupper($username).'</h3>
            <p>Bem vindo!</p>
            <p>Ative sua conta clicando no link abaixo :</p>  
            <p>'.$email_verification_link.'</p>

            <br>
            <br>

            <p>Obrigao! <br> 
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