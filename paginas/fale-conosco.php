<?php
$text_nome = "Nome";
$text_telefone = "Telefone";
$text_email = "E-mail";
$text_empresa = "Empresa";
$text_assunto = "Assunto";
$text_departamento = "Falar com";
$text_mensagem = "Mensagem";
$text_enviar = "Enviar";
$confirmacao = false;

if($lang == 'es'){
    $text_nome = "Nombre";
    $text_telefone = "Tel&eacute;fono";
    $text_email = "Email";
    $text_empresa = "Compa&ntilde;ia";
    $text_assunto = "Sujeto";
    $text_departamento = "Hablar con";
    $text_mensagem = "Mensaje";
    $text_enviar = "Enviar";
            
} else if($lang == 'en'){
    $text_nome = "Name";
    $text_telefone = "Phone";
    $text_email = "Email";
    $text_empresa = "Company";
    $text_assunto = "Subject";
    $text_departamento = "Talk to";
    $text_mensagem = "Message";
    $text_enviar = "Send";
}

if($_POST['faleconosco']){
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha_data = $_POST['g-recaptcha-response'];
    }

    if ($captcha_data) {
        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdHyicTAAAAAMqURnBS_6r4sc6qU7OSL3VEdtdQ&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if ($resposta.success) {
            $mm = $_POST['departamento'];
            $m = '
                <html>
                        <head>
                        <title> </title>
                        </head>

                        <body>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                                <td>
                                        <b>Nome:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['nome'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>E-mail:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['email'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Telefone:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['telefone'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Empresa:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['empresa'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Departamento:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['departamento'] . '
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        <b>Mensagem:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['mensagem'] . '
                                </td>
                          </tr> 


                        </table>

                        </body>
                </html>';
            

            require_once('PHPMailer/class.phpmailer.php');
            include("PHPMailer/class.smtp.php"); 

            $mail = new PHPMailer(true); 
            $mail->IsSMTP();

            try {
                $mail->Host = "smtp.croydon.com.br"; // SMTP server
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->Host = "smtp.croydon.com.br"; // sets the SMTP server
                $mail->Port = 587;                    // set the SMTP port for the GMAIL server
                $mail->Username = "site@croydon.com.br"; // SMTP account username
                $mail->Password = "ciml@50y";        // SMTP account password
                $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
                $mail->AddAddress($mm, 'CROYDON');
                $mail->AddBCC('marketing@croydon.com.br', 'marketing'); // Cópia Oculta
                $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
                $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
                $mail->Subject = 'CONTATO - SITE CROYDON';
                $mail->MsgHTML($m);
                $mail->Send();
                $confirmacao = true;
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Pretty error messages from PHPMailer
            } catch (Exception $e) {
                echo $e->getMessage(); //Boring error messages from anything else!
            }
        }
    }
}

if($_POST['curriculo']){
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha_data = $_POST['g-recaptcha-response'];
    }

    if ($captcha_data) {
        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LdJzwYUAAAAAHOrjHUEEVDs1KFnQfbMou7ueBAI&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if ($resposta.success) {
            $mm = 'curriculosite@croydon.com.br';
            $m = '
                <html>
                        <head>
                        <title> </title>
                        </head>

                        <body>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                                <td>
                                        <b>Nome:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['nome'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>E-mail:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['email'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Telefone:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['telefone'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Endereço:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['endereco'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Escolaridade:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['escolaridade'] . '
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        <b>Area de interesse:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['area_interesse'] . '
                                </td>
                          </tr> 
                          <tr>
                                <td>
                                        <b>Resumo profissional:</b>
                                </td>
                          </tr>  
                          <tr>
                                <td>
                                        ' . $_POST['resumo_profissional'] . '
                                </td>
                          </tr> 
                        </table>
                        </body>
                </html>';
            

            require_once('PHPMailer/class.phpmailer.php');
            include("PHPMailer/class.smtp.php"); 

            $mail = new PHPMailer(true); 
            $mail->IsSMTP();

            try {
                $mail->AddAttachment($_FILES["curriculo"]['tmp_name'], $_FILES["curriculo"]['name']);
                $mail->Host = "smtp.croydon.com.br"; // SMTP server
                $mail->SMTPAuth = true;                  // enable SMTP authentication
                $mail->Host = "smtp.croydon.com.br"; // sets the SMTP server
                $mail->Port = 587;                    // set the SMTP port for the GMAIL server
                $mail->Username = "site@croydon.com.br"; // SMTP account username
                $mail->Password = "ciml@50y";        // SMTP account password
                $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
                $mail->AddAddress($mm, 'CROYDON');
                $mail->AddBCC('marketing@croydon.com.br', 'marketing'); // Cópia Oculta
                $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
                $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
                $mail->Subject = 'CURRICULO - SITE CROYDON';
                $mail->MsgHTML($m);
                $mail->Send();
                $confirmacao = true;
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Pretty error messages from PHPMailer
            } catch (Exception $e) {
                echo $e->getMessage(); //Boring error messages from anything else!
            }
        }
    }
}
?>
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit&hl=pt-BR"></script>
<script type="text/javascript">
    /* Máscara Dinamica para telefones de 9 e 8 digitos*/
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }
    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }
    function mtel(v) {
        v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
        return v;
    }
    window.onload = function () {
        document.getElementById('telefone').onkeypress = function () {
            mascara(this, mtel);
        }
        document.getElementById('telefone2').onkeypress = function () {
            mascara(this, mtel);
        }
    };
    
    var CaptchaCallback = function(){        
        $('.g-recaptcha').each(function(){
            grecaptcha.render(this,{'sitekey' : '6LdHyicTAAAAAGrrwxnUQJc164GwVijLnNdhFhUa', 'sitekey' : '6LdJzwYUAAAAACzAed8iJhoFW7sun_a3Xl2NgaMZ'});
        })
    };
</script>
<div class="container" id="contato">
    <div class="box_titulo" id="titulo_contato">
        <div class="box_titulo_texto">
            <h1>FALE CONOSCO</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <?php if($confirmacao) :?>
                <div class="col-md-12 box-confirmacao">
                    <p><b>Seu email foi enviado com sucesso. Em breve entraremos em contato.</b></p>
                </div>
            <?php endif;?>
            <div class="col-md-6 col-sm-6">
                <div class="contato_left">
                    <h3>
                        <?php 
                        if($lang == 'pt'){
                            echo 'Envie sua mensagem';
                        } else if($lang == 'es'){
                            echo 'Hable con nosotros';
                        } else if($lang == 'en'){
                            echo 'Contact us';
                        }                        
                        ?>
                    </h3>
                    <form class="form-faleconosco" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" required name="nome" class="form-control" placeholder="<?php echo $text_nome;?>">
                        </div>
                        <div class="form-group">
                            <input type="text" id="telefone" maxlength="15" required name="telefone" class="form-control" placeholder="<?php echo $text_telefone;?>">
                        </div>
                        <div class="form-group">
                            <input type="text" required name="email" class="form-control" placeholder="<?php echo $text_email;?>">
                        </div>
                        <div class="form-group">
                            <input type="text" required name="empresa" class="form-control" placeholder="<?php echo $text_empresa;?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="assunto" class="form-control" placeholder="<?php echo $text_assunto;?>">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="departamento">
                                <option value=""><?php echo $text_departamento;?></option>
                                <?php if($lang == 'pt') {?>
                                    <?php foreach (consulta("select * from contato_departamentos order by id ASC") as $row) : ?>
                                        <option value="<?php echo $row['email']; ?>"><?php echo $row['titulo']; ?></option>
                                    <?php endforeach; ?>
                                <?php } else if($lang == 'es') { ?>
                                    <option value="importacao@croydon.com.br">Importaci&oacute;n</option>
                                    <option value="exportacao@croydon.com.br">Exportaci&oacute;n</option>
                                <?php } else if($lang == 'en') { ?>
                                    <option value="importacao@croydon.com.br">Import</option>
                                    <option value="exportacao@croydon.com.br">Export</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea rows="10" name="mensagem" class="form-control"><?php echo $text_mensagem;?></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-sm-0 col-xs-0"></div>
                            <div class="col-md-8 col-sm-12 col-xs-12 box-captcha">
                                <div class="g-recaptcha" data-sitekey="6LdHyicTAAAAAGrrwxnUQJc164GwVijLnNdhFhUa"></div>
                            </div>
                            <div class="col-md-2 col-sm-0 col-xs-0"></div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="<?php echo $text_enviar;?>" name="faleconosco" class="bt-contato" />
                        </div>
                    </form>
                </div>
            </div>
            <?php if($lang == 'pt') {?>
            <div class="col-md-6 col-sm-6">
                <div class="contato_right">
                    <h3>Envie seu curr&iacute;culo</h3>
                    <form class="form-curriculo" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" id="telefone2" maxlength="15" name="telefone" class="form-control" placeholder="Telefone">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="E-mail" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="endereco" class="form-control" placeholder="Endere&ccedil;o" required>
                        </div>
                        <div class="form-group">
                            <select name="escolaridade" class="form-control">
                                <option value="">Escolaridade</option>
                                <option value="ensino_fundamental_incompleto">Ensino Fundamental (1&ordm; Grau) Incompleto</option>
                                <option value="ensino_fundamental_completo">Ensino Fundamental (1&ordm; Grau) Completo</option>
                                <option value="nivel_tecnico">Nivel T&eacute;cnico</option>
                                <option value="ensino_medio_incompleto">Ensino M&eacute;dio (2&ordm; Grau) Incompleto</option>
                                <option value="ensino_medio_completo">Ensino M&eacute;dio (2&ordm; Grau) Completo</option>
                                <option value="superior_incompleto">Superio Incompleto</option>
                                <option value="superior_completo">Superior Completo</option>
                                <option value="posgraducao_incompleto">P&oacute;s Gradua&ccedil;&atilde;o Incompleta</option>
                                <option value="posgraduacao_completo">P&oacute;s Gradua&ccedil;&atilde;o Completa</option>
                                <option value="mestrado_incompleto">Mestrado Incompleto</option>
                                <option value="mestrado_completo">Mestrado Completo</option>
                                <option value="doutorado_incompleto">Doutorado Incompleto</option>
                                <option value="doutorado_completo">Doutorado Completo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="area_interesse" class="form-control" placeholder="&Aacute;rea de interesse">
                        </div>
                        <div class="form-group">
                            <input type="file" name="curriculo" class="form-control" placeholder="Anexar curr&iacute;culo">
                        </div>
                        <div class="form-group">
                            <textarea rows="10" name="resumo_profissional" class="form-control">Resumo profissional</textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2 col-sm-0 col-xs-0"></div>
                            <div class="col-md-8 col-sm-12 col-xs-12 box-captcha">
                                <div class="g-recaptcha" data-sitekey="6LdJzwYUAAAAACzAed8iJhoFW7sun_a3Xl2NgaMZ"></div>
                            </div>
                            <div class="col-md-2 col-sm-0 col-xs-0"></div>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Enviar" name="curriculo" class="bt-contato" />
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
        