<?php

class Smtp{

	private $Mesg      = '亲，你的密码已经发送到你的邮箱里，请注意查收哦(●—●)';  //邮件发送结果
	
	
	
	
	public function smtp( $Smtp = '' ){ $this -> Smtp = $Smtp; return $this; }
	public function pors( $pors = 25 ){ $this -> PORS = $pors; return $this; }
	public function login( $login = '' ) { $this -> LoginMail = $login; return $this; }
	public function pass( $pass = '' ){ $this -> LoginPass = $pass; return $this; }
	public function mails( $mail = '' ) { $this -> MailTo = $mail; return $this; }
	public function from( $form = '' ) { $this -> MailFrom = $form; return $this; }
	public function come( $come = '' ) { $this -> MailCome = $come; return $this; }
	public function title( $title = '' ) { $this -> Title = $title; return $this; }
	public function body( $body = '' ) { $this -> Body = $body; return $this; }
	
	
	public function send(){
		  $fp     = @fsockopen( $this->Smtp, $this->PORS);
		  @set_socket_blocking($fp, true);
		  $Server =  @fgets($fp, 512);
		  $this->Mesg = !preg_match('/^220/i', $Server) ? '邮件服务器连接失败' : $this->Mesg;
		  
		  @fputs($fp, 'HELO phpsetmail' . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^250/i', $Server) ? '与服务器会话失败' : $this->Mesg;
		  
		  @fputs($fp, 'AUTH LOGIN' . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^334/i', $Server) ? '请求与服务器进行用户验证失败' : $this->Mesg;
		  
		  @fputs($fp, base64_encode( $this->LoginMail ) . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^334/i', $Server) ? '用户验证失败' : $this->Mesg;
		  
		  @fputs($fp, base64_encode( $this->LoginPass ) . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^235/i', $Server) ? '用户验证失败' : $this->Mesg;
		  
		  @fputs($fp, 'MAIL FROM:' . $this->LoginMail . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^250/i', $Server) ? '发送用户验证失败' : $this->Mesg;
		  
		  @fputs($fp, 'RCPT TO:' . $this->MailTo . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^250/i', $Server) ? '接受用户名验证失败' : $this->Mesg;
		  
		  @fputs($fp, 'DATA' . "\r\n");
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^354/i', $Server) ? '请求与服务器发送邮件数据失败' : $this->Mesg;
		  
		  @fputs($fp, 'From:' . $this->MailCome ."\r\n");
		  @fputs($fp, 'Subject:' . $this->Title . "\r\n");
		  @fputs($fp, 'To:' . $this->MailTo . "\r\n");
		  @fputs($fp, "\r\n");
		  @fputs($fp, $this->Body . "\r\n");
		  @fputs($fp, '.' . "\r\n");
		  
		  $Server = @fgets($fp, 2000);
		  $this->Mesg = !preg_match('/^250/i', $Server) ? '邮件发送失败' : $this->Mesg;
		  
		  @@fputs($fp, 'QUIT' . "\r\n");
		  @fclose($fp);
		 return $this->Mesg;
	}
	
}

?>