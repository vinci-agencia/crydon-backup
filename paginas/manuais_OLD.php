<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/maskedinput-1.1.4.js"></script>
    <script type="text/javascript">  
    /* Máscara Dinamica para telefones de 9 e 8 digitos*/  
    function mascara(o,f){  
        v_obj=o  
        v_fun=f  
        setTimeout("execmascara()",1)  
    }  
    function execmascara(){  
        v_obj.value=v_fun(v_obj.value)  
    }  
    function mtel(v){  
        v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito  
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos  
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos  
        return v;  
    }  
    function id( el ){  
        return document.getElementById( el );  
    }  
    window.onload = function(){  
        id('telefone').onkeypress = function(){  
            mascara( this, mtel );  
        }  
    };  
    </script>  

<script>
    $(document).ready(function() {
 //   $("").mask("(99) 99999-9999");
    
    $('#estado').change(function(){       
        var uf = $(this).val();
        $.ajax({
            type: "GET",
            url: "<?php echo $_SESSION['url'];?>paginas/estados.php",
            data: "acao=buscaCidade&uf="+uf,
            dataType: "xml",
            success: function (xml) {
                var html = '<option value="">Selecione</option>';
                $(xml).find('cidades').each(function () {
                    $(xml).find('cidade').each(function () {
                        var cidade = $(this).find('nome').text();
                        var id_cidade = $(this).find('id').text();
                        html += "<option value='"+id_cidade+"'>"+cidade+"</option>";
                    });
                });
                $('#cidade').html(html);
            },
            error: function () {
                alert("Ocorreu um erro inesperado durante o processamento.");
            }
        });

    })
    
    $("#departamento").change(function(){
        if($(this).val() == "vendas@croydon.com.br")
            $("#area_atuacao").show();
        else
            $("#area_atuacao").hide();
    })
    
    $("#area_atuacao_select").change(function(){
        if($(this).val() == "outros")
            $("#outra_atuacao").show();
        else
            $("#outra_atuacao").hide();
    })
})
</script>
<?php
if($lang == 'pt'){	
    $txt = 'Para obter o manual de seu equipamento preencha os dados abaixo:';
	$name_pag = 'Manuais';
}
else if($lang == 'es'){
	$txt = 'Para obtener el manual de su equipo llene las informaciones abajo:';	
	$name_pag = 'Repuestos';
}
else{
	$txt = 'To request your equipment manual, please complete the information below:';
	$name_pag = 'Parts';
}
?>

<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
		if($lang == 'pt'){?>
			<span>Assistência Técnica</span>
			<img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
		<?php } ?>
        <a href="<?php echo $_SESSION['url'].$lang;?>/manuais"><?php echo $name_pag;?></a>
		<img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />  
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<p class="texto_internas2"><?php echo $txt2;?></p>
<br />
<div id="sombra_img_etiqueta"><img src="http://www.croydon.com.br/images/Etiqueta Modelo-numdeserie.jpg" alt="Modelo e número de série" width="264" height="130" /></div>
<?php 
if($lang == 'pt'){
?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
    <label>*1 Modelo</label>
    <input class="input_form1" type="text" name="modelo" />
    <label>*2 Número de série do equipamento</label>
    <input class="input_form1" type="text" name="n_serie" />
	<label>Contato</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Telefone</label>
    <input type="text" class="input_form2" id="telefone" maxlength="15" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <div style="width: 100%; float: left;">
        <div style="float: left; margin-right: 10px;">
            <label>UF</label>
            <select style="width: 60px;" id="estado" name="uf">
                <option value="">UF</option>
                <?php foreach (consulta("select uf,id from estados2 order by uf asc") as $estados){ ?>
                <option value="<?php echo $estados['id'];?>"><?php echo $estados['uf'];?></option>
                <?php }?>
            </select>
        </div>
        <div style="float: left;">
            <label>Cidade</label>
            <select id="cidade" name="cidade">
                <option value="">Selecione</option>
            </select>
        </div>
    </div>
    <label>País</label>
    <input class="input_form1" type="text" name="pais" />
    <div style="display:none;">
    <label>Email_departamento</label>
    <input class="input_form1" type="text" name="departamento" id="departamento" value="manuais@croydon.com.br" /></div>
    <div class="g-recaptcha" data-sitekey="6LdHyicTAAAAAGrrwxnUQJc164GwVijLnNdhFhUa"></div>
    <input type="submit" class="btEnviar" value="" />
</form>
<?php
}
else if($lang == 'es'){
?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
    <label>*1 Modelo</label>
    <input class="input_form1" type="text" name="modelo" />
    <label>*2 Número de serie del equipo</label>
    <input class="input_form1" type="text" name="n_serie" />
	<label>Contacto</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Teléfono</label>
    <input type="text" class="input_form2" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <label>País</label>
    <input class="input_form1" type="text" name="pais" />
    <label>Estado</label>
    <input class="input_form1" type="text" name="estado_es" />
    <label>Ciudad</label>
    <input class="input_form1" type="text" name="cidade_es" />
    <div style="display:none;">
    <label>Email</label>
    <input class="input_form1" type="text" name="departamento" id="departamento" value="manuais@croydon.com.br" /></div>
    <div class="g-recaptcha" data-sitekey="6LdHyicTAAAAAGrrwxnUQJc164GwVijLnNdhFhUa"></div>    
    <input type="submit" class="btEnviar" value="" />
</form>
<?php
}
else{
?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
    <label>*1 Model</label>
    <input class="input_form1" type="text" name="modelo" />
    <label>*2 Equipment's serial number</label>
    <input class="input_form1" type="text" name="n_serie" />
	<label>Name</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Phone</label>
    <input type="text" class="input_form2" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <label>Country</label>
    <input class="input_form1" type="text" name="pais" />
    <label>State</label>
    <input class="input_form1" type="text" name="estado_en" />
    <label>City</label>
    <input class="input_form1" type="text" name="cidade_en" />
    <div style="display:none;">
    <label>Email</label>
    <input class="input_form1" type="text" name="departamento" id="departamento" value="manuais@croydon.com.br" /></div>
    <div class="g-recaptcha" data-sitekey="6LdHyicTAAAAAGrrwxnUQJc164GwVijLnNdhFhUa"></div>    
    <input type="submit" class="btEnviar" id="btEnviarEn" value="" />
</form>
<?php
}
if($_POST['nome'] != ""){
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha_data = $_POST['g-recaptcha-response'];
    }
    
    if ($captcha_data) {
        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdHyicTAAAAAMqURnBS_6r4sc6qU7OSL3VEdtdQ&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if ($resposta.success) {
            if(isset($_POST['uf']) && $_POST['uf'] != ""){
                $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "'.$_POST['uf'].'"'));
                $uf = $estado['uf'];
            } else if(isset($_POST['estado_es']) && $_POST['estado_es'] != ""){
                $uf = $_POST['estado_es'];
            } else if(isset($_POST['estado_en']) && $_POST['estado_en'] != ""){
                $uf = $_POST['estado_en'];
            } else{
                $uf = '';
            }

            if(isset($_POST['cidade']) && $_POST['cidade'] != ""){
                $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "'.$_POST['cidade'].'"'));
                $cidade = $cidade['nome'];
            } else if(isset($_POST['cidade_es']) && $_POST['cidade_es'] != ""){
                    $cidade = $_POST['cidade_es'];
            } else if(isset($_POST['cidade_en']) && $_POST['cidade_en'] != ""){
                    $cidade = $_POST['cidade_en'];
            } else{
                $cidade = '';
            } 

            $modelo = $_POST['modelo'];  
            $nome = $_POST['nome'];
            $empresa = $_POST['empresa'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $n_serie = $_POST['n_serie'];
            $departamento = $_POST['departamento'];
            $pais = $_POST['pais']; 

            if(isset($_POST['area_atuacao']))
                $area_atuacao = ' - '.$_POST['area_atuacao'];
            else
                $area_atuacao = '';

            if(isset($_POST['outra_atuacao']))
                $outra_atuacao = ' - '.$_POST['outra_atuacao'];
            else
                $outra_atuacao = '';

            $mm = $departamento;

            $m = '
            <html>
                    <head>
                    <title>PEDIDO DE MANUAL - SITE CROYDON</title>
                    </head>

                    <body>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                            <td>
                                    <b>Modelo:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$modelo.'
                            </td>
                      </tr>
              <tr>
                            <td>
                                    <b>Número de série do equipamento:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$n_serie.'
                            </td>
                      </tr> 
                      <tr>
                            <td>
                                    <b>Contato:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$nome.'
                            </td>
                      </tr>
              <tr>
                            <td>
                                    <b>Telefone:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$telefone.'
                            </td>
                      </tr> 
                      <tr>
                            <td>
                                    <b>E-mail:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$email.'
                            </td>
                      </tr> 
              <tr>
                            <td>
                                    <b>País:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$pais.'
                            </td>
                      </tr> 
              <tr>
                            <td>
                                    <b>Cidade:</b>
                            </td>
                      </tr>  
                      <tr>
                            <td>
                                    '.$cidade.' - '.$uf.'
                            </td>
                      </tr>   
                    </table>

                    </body>
            </html>';

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
            $mail->AddAddress('marketing@croydon.com.br', 'Marketing');
            if(!empty($mm)){
            $mail->AddAddress($mm, 'Manuais');
            }    
            $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
            $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
            $mail->Subject = 'PEDIDO DE MANUAL - SITE CROYDON';
            //$mail->AltBody = 'PEDIDO ONLINE - REPRESENTANTE: '.$_POST["cod_rep"]; // optional - MsgHTML will create an alternate automatically
            $mail->MsgHTML($m);
            //$mail->AddAttachment('images/phpmailer.gif');      // attachment
            //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
            $mail->Send();
            echo '<script>window.location.href = "'.$_SESSION['url'].$lang.'/confirmacao"</script>';
            }catch (phpmailerException $e) {
            echo '<script>window.location.href = "Erro. Tente novamente!"</script>';
            }catch (Exception $e) {
                echo '<script>window.location.href = "Erro. Tente novamente!"</script>';
            }
        }
    }
}
?>