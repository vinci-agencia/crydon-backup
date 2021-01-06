<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/maskedinput-1.1.4.js"></script>
<script type="text/javascript">
    /* M?scara Dinamica para telefones de 9 e 8 digitos*/
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }
    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }
    function mtel(v) {
        v = v.replace(/\D/g, "");             //Remove tudo o que n?o ? d?gito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca par?nteses em volta dos dois primeiros d?gitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca h?fen entre o quarto e o quinto d?gitos
        return v;
    }
    function id(el) {
        return document.getElementById(el);
    }
    window.onload = function () {
        id('telefone').onkeypress = function () {
            mascara(this, mtel);
        }
    };
</script>

<script>
    $(document).ready(function () {
        //$(".telefone").mask("(99) 9999-9999");

        $('#estado').change(function () {
            var uf = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?php echo $_SESSION['url'];?>paginas/estados.php",
                data: "acao=buscaCidade&uf=" + uf,
                dataType: "xml",
                success: function (xml) {
                    var html = '<option value="">Selecione</option>';
                    $(xml).find('cidades').each(function () {
                        $(xml).find('cidade').each(function () {
                            var cidade = $(this).find('nome').text();
                            var id_cidade = $(this).find('id').text();
                            html += "<option value='" + id_cidade + "'>" + cidade + "</option>";
                        });
                    });
                    $('#cidade').html(html);
                },
                error: function () {
                    alert("Ocorreu um erro inesperado durante o processamento.");
                }
            });

        })

        $("#departamento").change(function () {
            if ($(this).val() == "vendas@croydon.com.br")
                $("#area_atuacao").show();
            else
                $("#area_atuacao").hide();
        })

        $("#area_atuacao_select").change(function () {
            if ($(this).val() == "outros")
                $("#outra_atuacao").show();
            else
                $("#outra_atuacao").hide();
        })
    })
</script>

<div class="breadcrumb_internas">
    <div id="breadcrumb">
        <div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url']; ?>images/icone_bradcrumb.gif" alt="icone breadcrumb"/>
        <a href="<?php echo $_SESSION['url'] . $lang; ?>/home">Home</a>
        <img src="<?php echo $_SESSION['url']; ?>images/seta_bread.gif" alt="icone breadcrumb"/>
        <?php
        if ($lang == 'pt') {
            $name_pag = 'Participe';
        } else if ($lang == 'es') {
            $name_pag = 'Contacto';
        } else {
            $name_pag = 'Contact';
        }
        ?>
        <span><?php echo $name_pag; ?></span>
    </div>
</div>
<?php

foreach (consulta("select texto_" . $lang . " from contato order by id desc LIMIT 1") as $contato) {

    $texto = $contato['texto_' . $lang];

    if ($lang == 'pt') {
        ?>
        <p class="texto_internas">Inscrição para demonstração com degustação dos FORNOS COMBINADOS.</p>
        <br/><br/>
        <div style="text-align: center"><b>Local:</b></div>
        <?php
        if(!isset($_GET['local'])) {
            ?>
            <table>
                <tr>
                    <td style="width: 33%;">
                        <b>Atelliê Ana Salinas</b><br/>

                        <p>Av. Maracanã, 1249 - Tijuca - RJ</p>

                        <p>Sugestão de estacionamento Supermercado Extra</p>

                        <p></p>

                        <p></p>

                        <p></p>
                    </td>
                    <td style="width: 33%"></td>
                    <td style="width: 33%">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3144.060064097663!2d-43.2423895!3d-22.9289488!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997e119d008a3f%3A0x2939bd70fa329b9!2sAv.+Maracan%C3%A3%2C+1249+-+Tijuca%2C+Rio+de+Janeiro+-+RJ!5e1!3m2!1spt-BR!2sbr!4v1452080899626"
                            width="500" height="183" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </td>
                </tr>
            </table>
            <?php
        }elseif($_GET['local']=='mg') {
            ?>
            <table>
                <tr>
                    <td style="width: 33%;">
                        <b>Centro Universitário UNA - Belo Horizonte</b><br/>

                        <p>Av. João Pinheiro, 580 - Lourdes,Belo Horizonte - MG,30130-180,Brasil ( Próximo ao Detran) 2º andar, Laboratório de Gastronomia</p>

                        <p></p>

                        <p></p>

                        <p></p>

                        <p></p>
                    </td>
                    <td style="width: 33%"></td>
                    <td style="width: 33%">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3191.616167676142!2d-43.939560888677214!3d-19.92987489579452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa699ddf35008b1%3A0xa19ea6b9db605e82!2sUNA+Jo%C3%A3o+Pinheiro+II!5e1!3m2!1spt-BR!2sbr!4v1460401934983"
                            width="500" height="183" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </td>
                </tr>
            </table>
            <?php
        }elseif($_GET['local']=='sp') {
            ?>
            <table>
                <tr>
                    <td style="width: 33%;">
                        <b>Elvi Cozinhas Profissionais - São Paulo</b><br/>

                        <p>Rua Francisco Pedroso de Toledo, 577 - Vila Livieiro, São Paulo - SP</p>

                        <p></p>

                        <p></p>

                        <p></p>

                        <p></p>
                    </td>
                    <td style="width: 33%"></td>
                    <td style="width: 33%">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3199.587079452631!2d-46.59272158530819!3d-23.646998570644826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xd70c5a361636edac!2sElvi+Cozinhas+Industriais!5e1!3m2!1spt-BR!2sbr!4v1462237618420" width="500" height="183" frameborder="0" style="border:0" allowfullscreen></iframe>
                        
                    </td>
                </tr>
            </table>
            <?php
        }
            ?>

        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">

            <div id="area_atuacao">
                <label>Locais para demostração</label>
                <select name="local_demostracao" id="area_atuacao_select">
                    <!--<option value="">Selecione</option>-->
        <?php
        if(!isset($_GET['local'])) {
            ?>
            <option value="1">Rio de Janeiro</option>
            <?php
        }elseif($_GET['local']=='mg') {
            ?>
            <option value="2">Minas Gerais</option>
            <?php
        }elseif($_GET['local']=='sp') {
            ?>
            <option value="3">São Paulo</option>
            <?php
        }
            ?>
                </select>
            </div>
            <br/>
            <label>Nome</label>
            <input class="input_form1" type="text" name="nome"/>
            <br/>
            <label>Empresa</label>
            <input class="input_form1" type="text" name="empresa"/>
            <br/>
            <label>Telefone</label>
            <input type="text" class="input_form2 telefone" id="telefone" maxlength="15" name="telefone"/>
            <br/>
            <label>Email</label>
            <input class="input_form1" type="text" name="email"/>
            <br/>

            <div style="width: 100%; float: left;">
                <div style="float: left; margin-right: 10px;">
                    <label>UF</label>
                    <select style="width: 60px;" id="estado" name="uf">
                        <option value="">UF</option>
                        <?php foreach (consulta("select uf,id from estados2 order by uf asc") as $estados) { ?>
                            <option value="<?php echo $estados['id']; ?>"><?php echo $estados['uf']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div style="float: left;">
                    <label>Cidade</label>
                    <select id="cidade" name="cidade">
                        <option value="">Selecione</option>
                    </select>
                </div>
                <br/>
            </div>
            <br/><br/>

            <div id="area_atuacao">
                <label>Área de atuação</label>
                <select name="area_atuacao" id="area_atuacao_select">
                    <option value="">Selecione</option>
                    <?php
                    $atuacao = array(1 => "Representante comenrcial", 2 => "Loja de Equipamento", 3 => "Bar"
                    , 4 => "Lanchonete", 5 => "Restaurante", 6 => "Buffet", 7 => "Padaria", 8 => "Confeitaria"
                    , 9 => "Hotel", 10 => "Pousada", 11 => "Hospital", 12 => "Clinica", 13 => "Serviço de Alimentação"
                    , 14 => "Projetista", 15 => "Consultor", 16 => "Consultor", 17 => "Profissional de Cozinha");
                    asort($atuacao);
                    foreach ($atuacao as $ramo) {
                        ?>
                        <option value="<?php echo $ramo; ?>"><?php echo $ramo; ?></option>
                    <?php
                    }
                    ?>
                    <option value="Outros">Outros</option>
                </select>
            </div>

            <br/>
            <?php
            if ((isset($_GET['link'])) and ($_GET['link'] == 'email')) {
                $cookieEmail = "Email Marketing";
                ?>
                <input class="input_form1" type="hidden" value="<?php echo $cookieEmail; ?>" name="emailMkt"/>
            <?php
            }
            ?>
            <br/>

            <input type="submit" class="btEnviar" value=""/>
            <br/>
        </form>
    <?php
    } else if ($lang == 'es') {
        ?>
        <p class="texto_internas"> CROYDON, símbolo de equipos de calidad para hoteles, bares y restaurantes desde
            1962. </p>
        <?php echo $texto; ?>
        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
            <label>Nombre</label>
            <input class="input_form1" type="text" name="nome"/>
            <label>Compa?ia</label>
            <input class="input_form1" type="text" name="empresa"/>
            <label>Tel?fono</label>
            <input type="text" class="input_form2 telefone" maxlength="20" name="telefone"/>
            <label>Email</label>
            <input class="input_form1" type="text" name="email"/>
            <label>Estado</label>
            <input class="input_form1" type="text" name="estado_es"/>
            <label>Ciudad</label>
            <input class="input_form1" type="text" name="cidade_es"/>
            <label>Departamento</label>
            <select name="departamento">
                <option value="importacao@croydon.com.br">Importaci?n</option>
                <option value="exportacao@croydon.com.br">Exportaci?n</option>
            </select>
            <label>Mensaje</label>
            <textarea name="mensagem" class="input_form3"></textarea>
            <input type="submit" class="btEnviar" value=""/>
        </form>
    <?php
    } else {
        ?>
        <p class="texto_internas"> CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since
            1962. </p>
        <?php echo $texto; ?>
        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
            <label>Name</label>
            <input class="input_form1" type="text" name="nome"/>
            <label>Company</label>
            <input class="input_form1" type="text" name="empresa"/>
            <label>Phone</label>
            <input type="text" class="input_form2 telefone" maxlength="20" name="telefone"/>
            <label>Email</label>
            <input class="input_form1" type="text" name="email"/>
            <label>State</label>
            <input class="input_form1" type="text" name="estado_en"/>
            <label>City</label>
            <input class="input_form1" type="text" name="cidade_en"/>
            <label>Department</label>
            <select name="departamento">
                <option value="importacao@croydon.com.br">Import</option>
                <option value="exportacao@croydon.com.br">Export</option>
            </select>
            <label>Message</label>
            <textarea name="mensagem" class="input_form3"></textarea>
            <input type="submit" class="btEnviar" id="btEnviarEn" value=""/>
        </form>
    <?php
    }
}

if ($_POST['nome'] != "") {

    if (isset($_POST['uf']) && $_POST['uf'] != "") {
        $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "' . $_POST['uf'] . '"'));
        $uf = strtoupper($estado['sigla']);
    } else if (isset($_POST['estado_es']) && $_POST['estado_es'] != "") {
        $uf = $_POST['estado_es'];
    } else if (isset($_POST['estado_en']) && $_POST['estado_en'] != "") {
        $uf = $_POST['estado_en'];
    } else {
        $uf = '';
    }

    if (isset($_POST['cidade']) && $_POST['cidade'] != "") {
        $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "' . $_POST['cidade'] . '"'));
        $cidade = strtoupper($cidade['nome']);
    } else if (isset($_POST['cidade_es']) && $_POST['cidade_es'] != "") {
        $cidade = $_POST['cidade_es'];
    } else if (isset($_POST['cidade_en']) && $_POST['cidade_en'] != "") {
        $cidade = $_POST['cidade_en'];
    } else {
        $cidade = '';
    }
    if ((isset($_GET['t'])) && (!empty($_GET))) {
        $cookieEmail = ucwords($_GET['t']);
    } else {
        if ((!isset($_SESSION['croy05524711105mq'])) or (empty($_SESSION['croy05524711105mq']))) {
            $cookieEmail = "Outros Links";
        } else {
            $cookieEmail = $_SESSION['croy05524711105mq'];
        }
        if (isset($_POST['emailMkt'])) {
            $cookieEmail = $_POST['emailMkt'];
        }
    }


    $nome = strtoupper($_POST['nome']);
    $empresa = strtoupper($_POST['empresa']);
    $telefone = ($_POST['telefone']);
    $email = $_POST['email'];
    $localDemostracao = $_POST['local_demostracao'];
    switch ($localDemostracao) {
        case 1 :
            $localDemostracao = "Rio de Janeiro";
            break;
        case 2 :
            $localDemostracao = "Minas Gerais";
            break;
        case 3 :
            $localDemostracao = "São Paulo";
            break;
    }
    //$mensagem = $_POST['mensagem'];
    //$departamento = $_POST['departamento'];

    $area_atuacao = $_POST['area_atuacao'];


    //$mm = $departamento;

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
				' . $nome . '
			</td>
		  </tr> 
		  <tr>
			<td>
				<b>E-mail:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				' . $email . '
			</td>
		  </tr> 
		  <tr>
			<td>
				<b>Telefone:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				' . $telefone . '
			</td>
		  </tr> 
                  <tr>
			<td>
				<b>Cidade:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				' . $cidade . ' - ' . $uf . '
			</td>
		  </tr> 
		  <tr>
			<td>
				<b>Empresa:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				' . $empresa . '
			</td>
		  </tr>
		  <tr>
			<td>
				<b>Area de Atuação:</b>
			</td>
		  </tr>
		  <tr>
			<td>
				' . $area_atuacao . '
			</td>
		  </tr>
		  <tr>
			<td>
				<b>Local da demostração:</b>
			</td>
		  </tr>
		  <tr>
			<td>
				' . $localDemostracao . '
			</td>
		  </tr>
		  <tr>
		  			<td>
		  				<b>Status:</b>
		  			</td>
		  		  </tr>
		  <tr>
		  			<td>
		  				' . $cookieEmail . '
		  			</td>
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
        $mail->Host = "smtp.croydon.com.br"; // SMTP server
        //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Host = "smtp.croydon.com.br"; // sets the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "site@croydon.com.br"; // SMTP account username
        $mail->Password = "ciml@50y"; // SMTP account password
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddAddress('forno@croydon.com.br', 'CROYDON');
        //$mail->AddCC('ciclano@croydon.com.br', 'Ciclano'); // Copia
        $mail->AddBCC('marketing@croydon.com.br', 'Marketing'); // C?pia Oculta
        $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->Subject = 'INSCRIÇÃO DEMOSTRAÇÃO COM DEGUSTAÇÃO - SITE CROYDON';
        //$mail->AltBody = 'PEDIDO ONLINE - REPRESENTANTE: '.$_POST["cod_rep"]; // optional - MsgHTML will create an alternate automatically
        $mail->MsgHTML($m);
        //$mail->AddAttachment('images/phpmailer.gif');      // attachment
        //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
        $mail->Send();
        echo '<script>window.location.href = "' . $_SESSION['url'] . $lang . '/confirmacao"</script>';
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }
//
    if ((isset($_SESSION['croy05524711105mq'])) AND (!empty($_SESSION['croy05524711105mq']))) {
        session_destroy();

    }

}
?>