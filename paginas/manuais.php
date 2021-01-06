<?php
$confirmacao = false;

if($_POST){
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha_data = $_POST['g-recaptcha-response'];
    }

    if ($captcha_data) {
        $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfZEwcUAAAAAGy_eopXrrGSTXE7MWUA8CYdmOwz&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
        
        if ($resposta.success) {
            if(isset($_POST['uf']) && $_POST['uf'] != ""){
                $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "'.$_POST['uf'].'"'));
                $uf = $estado['uf'];
            } 
            
            if(isset($_POST['cidade']) && $_POST['cidade'] != ""){
                $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "'.$_POST['cidade'].'"'));
                $cidade = $cidade['nome'];
            }
            
            $modelo = $_POST['modelo'];  
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $n_serie = $_POST['serie'];
            $pais = $_POST['pais']; 

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
                $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
                $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
                $mail->Subject = 'PEDIDO DE MANUAL - SITE CROYDON';
                $mail->MsgHTML($m);
                $mail->Send();
                $confirmacao = true;
            }catch (phpmailerException $e) {
                echo '<script>window.location.href = "Erro. Tente novamente!"</script>';
            }catch (Exception $e) {
                echo '<script>window.location.href = "Erro. Tente novamente!"</script>';
            }
        }
    }
}
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
    $(document).ready(function() {    
        $('#estado').change(function(){       
            var uf = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?php echo $_SESSION['url'];?>paginas/estados.php",
                data: "acao=buscaCidade&uf="+uf,
                dataType: "xml",
                success: function (xml) {
                    var html = '<option value="">Cidade</option>';
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
        });
    })
</script>
<div class="container" id="manuais">
    <div class="box_titulo" id="titulo_assistenciatecnica">
        <div class="box_titulo_texto">
            <h1>ASSIST&Ecirc;NCIA T&Eacute;CNICA</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-md-12"><h3>Para obter a lista de pe&ccedil;as do seu equipamento preencha os dados abaixo:</h3></div>
            <?php if($confirmacao) :?>
                <div class="col-md-12 box-confirmacao">
                    <p><b>Seu email foi enviado com sucesso. Em breve entraremos em contato.</b></p>
                </div>
            <?php endif;?>
            <div class="col-md-6 col-sm-6">
                <form method="POST">
                    <div class="form-group">
                        <input type="text" required name="modelo" class="form-control" placeholder="*1 - Modelo">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="serie" class="form-control" placeholder="*2- N&uacute;mero de S&eacute;rie do Equipamento">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telefone" class="form-control" placeholder="Telefone">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9">
                            <select class="form-control" id="cidade" name="cidade">
                                <option value="">Cidade</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select id="estado" class="form-control" name="uf">
                                <option value="">UF</option>
                                <?php foreach (consulta("select uf,id from estados2 order by uf asc") as $estados){ ?>
                                <option value="<?php echo $estados['id'];?>"><?php echo $estados['uf'];?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="pais" class="form-control" placeholder="Pa&iacute;s">
                    </div>
                    <div class="form-group">
                        <div class="col-md-2 col-sm-0 col-xs-0"></div>
                        <div class="col-md-8 col-sm-12 col-xs-12 box-captcha">
                            <div class="g-recaptcha" data-sitekey="6LfZEwcUAAAAAAxn7lLFxJQ0_hoKKOMj_G4HVXAc"></div>
                        </div>
                        <div class="col-md-2 col-sm-0 col-xs-0"></div>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Enviar" class="bt-enviar" />
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-sm-6">
                <img style="width: 100%;" src="<?php echo $_SESSION['url'];?>images/img-manuais.jpg" alt="Manuais" />
            </div>
        </div>
    </div>
</div>