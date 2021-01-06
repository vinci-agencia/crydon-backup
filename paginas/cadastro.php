<?php
if($lang == 'pt'){
	$txt = 'Cadastre-se e comece a fazer seu download!';
	$mens_email = 'Parabéns! Você foi cadastrado na aréa de downloads da Croydon. <a href="http://croydon.com.br/pt/downloads">Clique aqui</a> e faça seus downloads.';
	$alert3 = 'Cadastrado com sucesso, Em breve você estará recebendo um email com seu login e senha!';
}
else if($lang == 'es'){
	$txt = 'Entra y empieza a descargar!';
	$mens_email = '¡Felicitaciones! Usted ha sido registrado en la zona de descarga de Croydon. <a href="http://croydon.com.br/pt/downloads">Haga clic aquí</a> y hacer tus descargas';
	$alert3 = 'Registrado con éxito, pronto recibirá un email con tu nombre de usuario y contraseña!';
}
else{
	$txt = 'Sign in and start to download it!';
	$mens_email = 'Congratulations! You have been registered in the download area of Croydon. <a href="http://croydon.com.br/pt/downloads"Click here</a> and make your downloads';
	$alert3 = 'Registered successfully, you will soon be receiving an email with your login and password!';
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/downloads">Downloads</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/login">Login</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Cadastro</span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<div class="faq">
	<form id="form_login" action="" method="post">
		<?php if($lang == 'pt'){?>
        <label>Nome:</label>
        <input size="30" type="text" name="nome" />
        <label>Email:</label>
        <input size="30" type="text" name="email" />
        <label>Telefone:</label>
        <input size="30" type="text" name="telefone" />
        <label>Cidade:</label>
        <input size="30" type="text" name="cidade" />
        <label>Estado:</label>
        <input size="30" type="text" name="estado" />
        <label>País:</label>
        <input size="30" type="text" name="pais" />
        <label>Senha:</label>
        <input size="30" type="password" name="senha" />
        <input class="bt_enviar" type="submit" value="" name="Enviar" />
        <?php }else if($lang == 'es'){?>
        <label>Nombre:</label>
        <input size="30" type="text" name="nome" />
        <label>Correo electrónico:</label>
        <input size="30" type="text" name="email" />
        <label>Teléfono:</label>
        <input size="30" type="text" name="telefone" />
        <label>Ciudad:</label>
        <input size="30" type="text" name="cidade" />
        <label>Estado:</label>
        <input size="30" type="text" name="estado" />
        <label>País:</label>
        <input size="30" type="text" name="pais" />
        <label>Contraseña:</label>
        <input size="30" type="password" name="senha" />
        <input class="bt_enviar" type="submit" value="" name="Enviar" />
        <?php }else{?>
        <label>Name:</label>
        <input size="30" type="text" name="nome" />
        <label>Email:</label>
        <input size="30" type="text" name="email" />
        <label>Phone:</label>
        <input size="30" type="text" name="telefone" />
        <label>City:</label>
        <input size="30" type="text" name="cidade" />
        <label>State:</label>
        <input size="30" type="text" name="estado" />
        <label>Country:</label>
        <input size="30" type="text" name="pais" />
        <label>Password:</label>
        <input size="30" type="password" name="senha" />
        <input class="bt_enviar" id="bt_enviar_en" type="submit" value="" name="Enviar" />
        <?php }?>
	</form>
</div>
<?php
if(isset($_POST['nome'])){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$pais = $_POST['pais'];
	$senha = md5($_POST['senha']);
	
	$sql = "INSERT INTO clientes (nome,email,telefone,cidade,estado,pais,senha) VALUES ('$nome','$email','$telefone','$cidade','$estado','$pais','$senha')";

	if(mysql_query($sql)){
		
		//Incluir a classe excelwriter
	   include("inc/excelwriter.inc.php");
	   
		//Você pode colocar aqui o nome do arquivo que você deseja salvar.
		$excel=new ExcelWriter("cadastros.xls");
	
		if($excel==false){
			echo $excel->error;
	   }
	
	   //Escreve o nome dos campos de uma tabela
	   $myArr=array('NOME','EMAIL','TELEFONE','CIDADE','ESTADO','PAIS');
	   $excel->writeLine($myArr);
	
	   //Seleciona os campos de uma tabela
	   $consulta = "SELECT * FROM clientes order by id DESC";
	   $resultado = mysql_query($consulta);
	   if($resultado==true){
		  while($linha = mysql_fetch_array($resultado)){
			 $myArr=array($linha['nome'],$linha['email'],$linha['telefone'],$linha['cidade'],$linha['estado'],$linha['pais']);
			 $excel->writeLine($myArr);
		  }
	   }	
		
		$excel->close();
	
		$mm = $email;

		$m = '
		<!DOCTYPE HTML>
            <html>
                <head>
	               <meta http-equiv="content-type" content="text/html" />
	               <meta name="author" content="Croydon" />

	               <title>Cadastro - Downloads Croydon</title>
                </head>
										
			<body>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td><b>'.utf8_encode($mens_email).'</b></td>
			  </tr>		  
			  <tr>
			  <br />
			  <tr>
				<td><b>Email:</b></td>
			  </tr>		  
			  <tr>
				<td>'.$email.'</td>
			  </tr>
			  <tr>
				<td><b>Senha:</b></td>
			  </tr>		  
			  <tr>
				<td>'.$_POST['senha'].'</td>
			  </tr>
			</table>
			
			</body>
		</html>';
        
        
        //
        require_once('PHPMailer/class.phpmailer.php');
    include("PHPMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

    $mail->IsSMTP(); // telling the class to use SMTP

    try {
    $mail->Host       = "smtp.croydon.com.br"; // SMTP server
    //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Host       = "smtp.croydon.com.br"; // sets the SMTP server
    $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "site@croydon.com.br"; // SMTP account username
    $mail->Password   = "ciml@50y";        // SMTP account password
    $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
    $mail->AddAddress($mm, $nome);
    $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
    $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
    $mail->Subject = 'Cadastro - Downloads Croydon';
    //$mail->AltBody = 'PEDIDO ONLINE - REPRESENTANTE: '.$_POST["cod_rep"]; // optional - MsgHTML will create an alternate automatically
    $mail->MsgHTML($m);
    //$mail->AddAttachment('images/phpmailer.gif');      // attachment
    //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
    $mail->Send();
    echo "<script charset='utf-8'>
			alert('".$alert3."');
			window.location.href = '".$_SESSION['url'].$lang."/login';
			</script>";
    }catch (phpmailerException $e) {
    echo $e->errorMessage(); //Pretty error messages from PHPMailer
    }catch (Exception $e) {
    echo $e->getMessage(); //Boring error messages from anything else!
}
//	
	}

}
?>