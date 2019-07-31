<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function sendEmail($to = '', $subject  = '', $body = '', $attachment = '', $cc = '')
    {
		/*$to = "xavier.thales@gmail.com";
		$subject = "assunto";
		$txt = $body;
		$headers = "From: nao-responda@agenciathax.com.br";
		
		mail($to, $s
		eubject, $txt, $headers);
		exit;*/
		
		$headers  = "From: nao-responda@agenciathax.com.br\n";
		//$headers .= "Cc: testsite < mail@testsite.com >\n"; 
		//$headers .= "Reply-To: xavier.thales@gmail.com\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();
		$headers .= "X-Priority: 1\n"; // Urgent message!
		$headers .= "Return-Path: xavier.thales@gmail.com\n"; // Return path for errors
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$return = mail($to, $subject, $body, $headers);

		if($return){
			return "success";
		}
		else
		{
			var_dump(mail($to, $subject, $body, $headers));exit;
			//echo $controller->email->print_debugger();
			return "error";
		}
		/*exit;

		$controller =& get_instance();
        
       	$controller->load->helper('path'); 
       	
       	// Configure email library
		
		$config = array();
        $config['useragent']            = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36";
        $config['mailpath']             = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']             = "smtp";
        $config['smtp_host']            = "ssl://smtp.gmail.com";
        $config['smtp_port']            = "465";
		$config['smtp_timeout'] 		= '30';
		$config['smtp_user']    		= "xavier.thales@gmail.com";
		$config['smtp_pass']    		= "C@sa743957774*";
        $config['mailtype'] 			= 'html';
        $config['charset']  			= 'utf-8';
        $config['newline']  			= "\r\n";
        $config['wordwrap'] 			= TRUE;

        $controller->load->library('email');

        $controller->email->initialize($config);   
		
			
		$controller->email->from( 'no-reply@adminlite.com' , 'B&T Sociedade de Advogados' );
		
		$controller->email->to($to);
		
		$controller->email->subject($subject);
		
		$controller->email->message($body);
		
		if($cc != '') 
		{	
			$controller->email->cc($cc);
		}	
		
		if($attachment != '')
		{
			$controller->email->attach(base_url()."uploads/invoices/" .$attachment);
		 
		}
			
		if($controller->email->send()){
			return "success";
		}
		else
		{
			echo $controller->email->print_debugger();
			return "error";
		}*/
		  
        
    }
	
	
	

?>