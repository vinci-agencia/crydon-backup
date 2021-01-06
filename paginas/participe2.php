<?php
/**
 * Created by PhpStorm.
 * User: Jaime
 * Date: 08/10/2015
 * Time: 14:23
 */
?>


<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/maskedinput-1.1.4.js"></script>
<?php
$busca =1;
$cidade = mysql_fetch_array(mysql_query('select * from participe where idparticipe = "' . $busca . '"'));
$localEvento = $cidade['local'];
$datasEveneto = $cidade['datas'];
$mapaEvento = $cidade['mapa'];

if ($lang == 'pt') {
    ?>
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
        function id(el) {
            return document.getElementById(el);
        }
        window.onload = function () {
            id('telefone').onkeypress = function () {
                mascara(this, mtel);
            }
        };
    </script>
    <?php
}else{
    ?>
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
        function mtel_int(v) {
            v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d{2})(\d)/g, "+$1($2) $3");
            v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function id(el) {
            return document.getElementById(el);
        }
        window.onload = function () {
            id('telefone_int').onkeypress = function () {
                mascara(this, mtel_int);
            }
        };
    </script>
    <?php
}
?>

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
        <table>
            <tr>
                <td style="width: 33%;">
                    <?php echo  $localEvento; ?>
                </td>
                <td style="width: 33%"></td>
                <td style="width: 33%">
                    <iframe src="<?php echo  $mapaEvento; ?>" width="500" height="183" frameborder="0" style="border:0"></iframe>
                </td>
            </tr>
        </table>
        <div class="contato_right" style="font-size: 14px !important;">
        <?php echo $datasEveneto; ?>
        </div>
        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">

            <!--<div id="area_atuacao">
                <label>Locais para demostração</label>
                <select name="local_demostracao" id="area_atuacao_select">
                    <option value="">Selecione</option>
                    <option value="2">São Paulo</option>
                    <option value="2">São Paulo</option>
                </select>
            </div>-->
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
                        <?php foreach (consulta("select sigla,id from estados2 order by sigla asc") as $estados) { ?>
                            <option value="<?php echo $estados['id']; ?>"><?php echo $estados['sigla']; ?></option>
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
            <input required class="input_form1" type="text" name="nome"/>
            <label>Compañia</label>
            <input required class="input_form1" type="text" name="empresa"/>
            <label>Teléfono</label>
            <input required type="text" id="telefone_int" class="input_form2 telefone" maxlength="20" name="telefone"/>
            <label>Email</label>
            <input required class="input_form1" type="text" name="email"/>
            <label>Estado</label>
            <input required class="input_form1" type="text" name="estado_es"/>
            <label>Ciudad</label>
            <input required class="input_form1" type="text" name="cidade_es"/>
            <label>País</label>
            <select style="width: 300px; border: 1px solid #dad9d9; border-radius: 3px; background: #fff;"
                    name="pais" id="pais">
                <option value="">Selecione</option>
                <?php foreach (consulta("select * from pais order by paisId ASC") as $row) : ?>
                    <option value="<?php echo $row['nomePT']; ?>"><?php echo $row['nomeES']; ?></option>
                <?php endforeach; ?>
            </select>
            <label>Departamento</label>
            <select name="departamento">
                <option value="importacao@croydon.com.br">Importación</option>
                <option value="exportacao@croydon.com.br">Exportación</option>
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
            <input required class="input_form1" type="text" name="nome"/>
            <label>Company</label>
            <input required class="input_form1" type="text" name="empresa"/>
            <label>Phone</label>
            <input required type="text" id="telefone_int" class="input_form2 telefone" maxlength="20" name="telefone"/>
            <label>Email</label>
            <input required class="input_form1" type="text" name="email"/>
            <label>State</label>
            <input required class="input_form1" type="text" name="estado_en"/>
            <label>City</label>
            <input required class="input_form1" type="text" name="cidade_en"/>
            <label>Country</label>
            <select style="width: 300px; border: 1px solid #dad9d9; border-radius: 3px; background: #fff;"
                    name="pais" id="pais">
                <option value="">Selecione</option>
                <?php foreach (consulta("select * from pais order by paisId ASC") as $row) : ?>
                    <option value="<?php echo $row['nomePT']; ?>"><?php echo $row['nomeEN']; ?></option>
                <?php endforeach; ?>
            </select>
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


    function isoToUTF8 ($decodifica)
    {

        $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", "?", "/", "!", "#", "$", "@", "%", "'", '"', "(", ")", "_", "+", "=", "§", "[", "]", "{", "}", "ª", "º", "°", ":", ";", ",", ".", "\\", "|", "'", "`", "^", "~", "*");
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", "?", "", "!", "-", "$", "@", "%", "'", '"', "(", ")", "_", "+", "=", "", "[", "]", "{", "}", "", "", "", ":", ";", ",", ".", "", "|", "'", "", "", "", "*");
        $decodifica = (str_replace($array1, $array2, $decodifica));

        return $caracterUTF8 = ucwords(mb_strtolower($decodifica, 'UTF-8'));
    }

    function isoToUTF8Mensagem ($decodifica)
    {

        $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç", "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç", "?", "/", "!", "#", "$", "@", "%", "'", '"', "(", ")", "_", "+", "=", "§", "[", "]", "{", "}", "ª", "º", "°", ":", ";", ",", ".", "\\", "|", "'", "`", "^", "~", "*");
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c", "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C", "?", "", "!", "-", "$", "@", "%", "'", '"', "(", ")", "_", "+", "=", "", "[", "]", "{", "}", "", "", "", ":", ";", ",", ".", "", "|", "'", "", "", "", "*");
        $decodifica = (str_replace($array1, $array2, $decodifica));

        return $caracterUTF8 = ucfirst(mb_strtolower($decodifica, 'UTF-8'));
    }

    if (isset($_POST['uf']) && $_POST['uf'] != "") {
        $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "' . $_POST['uf'] . '"'));
        $uf = $estado['sigla'];
    } else if (isset($_POST['estado_es']) && $_POST['estado_es'] != "") {
        $uf = isoToUTF8($_POST['estado_es']);
    } else if (isset($_POST['estado_en']) && $_POST['estado_en'] != "") {
        $uf = isoToUTF8($_POST['estado_en']);
    } else {
        $uf = '';
    }

    if (isset($_POST['cidade']) && $_POST['cidade'] != "") {
        $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "' . $_POST['cidade'] . '"'));
        $cidade = isoToUTF8($cidade['nome']);
    } else if (isset($_POST['cidade_es']) && $_POST['cidade_es'] != "") {
        $cidade = isoToUTF8($_POST['cidade_es']);
    } else if (isset($_POST['cidade_en']) && $_POST['cidade_en'] != "") {
        $cidade = isoToUTF8($_POST['cidade_en']);
    } else {
        $cidade = '';
    }

    if(isset($_POST['pais'])){
        isoToUTF8($pais = $_POST['pais']);
    }else{
        $pais = 'Brasil';
    }

    $nome = isoToUTF8($_POST['nome']);
    $empresa = isoToUTF8($_POST['empresa']);
    $telefone = $_POST['telefone'];
    $email = mb_strtolower($_POST['email'], 'UTF-8');
    $mensagem = isoToUTF8Mensagem($_POST['mensagem']);
    $departamento = mb_strtolower($_POST['departamento'], 'UTF-8');

    if (isset($_POST['area_atuacao']))
        $area_atuacao = isoToUTF8($_POST['area_atuacao']);
    else
        $area_atuacao = '';

    if (isset($_POST['outra_atuacao']))
        $outra_atuacao = isoToUTF8($_POST['outra_atuacao']);
    else
        $outra_atuacao = '';

    $mm = $departamento;

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
				<b>País:</b>
			</td>
		  </tr>
		  <tr>
			<td>
				' . $pais . '
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
				<b>Departamento:</b>
			</td>
		  </tr>
		  <tr>
			<td>
				' . $departamento . $area_atuacao . $outra_atuacao . '
			</td>
		  </tr>
		  <tr>
			<td>
				<b>Mensagem:</b>
			</td>
		  </tr>
		  <tr>
			<td>
				' . $mensagem . '
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
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->Host = "smtp.croydon.com.br"; // sets the SMTP server
        $mail->Port = 587;                    // set the SMTP port for the GMAIL server
        $mail->Username = "site@croydon.com.br"; // SMTP account username
        $mail->Password = "ciml@50y";        // SMTP account password
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddAddress($mm, 'CROYDON');
        //$mail->AddCC('ciclano@croydon.com.br', 'Ciclano'); // Copia
        $mail->AddBCC('marketing@croydon.com.br', 'marketing'); // Cópia Oculta
        $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->Subject = 'CONTATO - SITE CROYDON';
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

    //PASTA TEMP
    $caminho = getcwd() . '/temp_contato/';
//NOME DE DOCUMENTO (LOG DE ERRO)
    $data = date('d-m-Y-H-i-s');
//DATA E HORA DA CRIAÇÃO DO DOCUMENTO
    $dataDocumento = date('d-m-Y H:i:s');
    $dataEnvio = date('Y-m-d H:i:s');
//MES EM FORMATO NUMERICO
    $mesIdentificador = $mesDocumento = date('m');
//TRANSFORMAR EM MES POR EXTENSO
    switch ($mesDocumento) {
        case '01':
            $mesDocumento = str_replace($mesDocumento, "Janeiro", $mesDocumento);
            break;
        case '02':
            $mesDocumento = str_replace($mesDocumento, "Fevereiro", $mesDocumento);
            break;
        case '03':
            $mesDocumento = str_replace($mesDocumento, "Março", $mesDocumento);
            break;
        case '04':
            $mesDocumento = str_replace($mesDocumento, "Abril", $mesDocumento);
            break;
        case '05':
            $mesDocumento = str_replace($mesDocumento, "Maio", $mesDocumento);
            break;
        case '06':
            $mesDocumento = str_replace($mesDocumento, "Junho", $mesDocumento);
            break;
        case '07':
            $mesDocumento = str_replace($mesDocumento, "Julho", $mesDocumento);
            break;
        case '08':
            $mesDocumento = str_replace($mesDocumento, "Agosto", $mesDocumento);
            break;
        case '09':
            $mesDocumento = str_replace($mesDocumento, "Setembro", $mesDocumento);
            break;
        case '10':
            $mesDocumento = str_replace($mesDocumento, "Outubro", $mesDocumento);
            break;
        case '11':
            $mesDocumento = str_replace($mesDocumento, "Novembro", $mesDocumento);
            break;
        case '12':
            $mesDocumento = str_replace($mesDocumento, "Dezembro", $mesDocumento);
            break;
    }


    $anoDocumento = date('Y');
    $ultimoAno = date('Y', strtotime('-1 year'));

    //MES ANTERIOR

    $mesAnterior = date("m", strtotime('-1 month'));
    switch ($mesAnterior) {
        case '01':
            $mesAnterior = str_replace($mesAnterior, "Janeiro", $mesAnterior);
            break;
        case '02':
            $mesAnterior = str_replace($mesAnterior, "Fevereiro", $mesAnterior);
            break;
        case '03':
            $mesAnterior = str_replace($mesAnterior, "Março", $mesAnterior);
            break;
        case '04':
            $mesAnterior = str_replace($mesAnterior, "Abril", $mesAnterior);
            break;
        case '05':
            $mesAnterior = str_replace($mesAnterior, "Maio", $mesAnterior);
            break;
        case '06':
            $mesAnterior = str_replace($mesAnterior, "Junho", $mesAnterior);
            break;
        case '07':
            $mesAnterior = str_replace($mesAnterior, "Julho", $mesAnterior);
            break;
        case '08':
            $mesAnterior = str_replace($mesAnterior, "Agosto", $mesAnterior);
            break;
        case '09':
            $mesAnterior = str_replace($mesAnterior, "Setembro", $mesAnterior);
            break;
        case '10':
            $mesAnterior = str_replace($mesAnterior, "Outubro", $mesAnterior);
            break;
        case '11':
            $mesAnterior = str_replace($mesAnterior, "Novembro", $mesAnterior);
            break;
        case '12':
            $mesAnterior = str_replace($mesAnterior, "Dezembro", $mesAnterior);
            break;
    }

    if((!isset($_POST['cidade_en']))||(!isset($_POST['cidade_es']))) {
        $ddi = 55;
        $pos = strripos($telefone, '(');
        if ($pos === false) {
            $ddd = "";
        } else {
            $ddd = explode(")", $telefone);
            $ddd = str_ireplace('(', '', $ddd[0]);
            $telefone = explode(" ", $telefone);
            $telefone = $telefone[1];
        }
    }else{
        $pos = strripos($telefone, '+');
        if ($pos === false) {
            $ddi = "";
            $ddd = "";
        } else {
            $ddi = substr($telefone, 1,2);
            $ddd = substr($telefone, 4,2);
            $telefone = explode(" ", $telefone);
            $telefone = $telefone[1];
        }
    }

    //VERIFICAR SE DEPARTAMENTO É ASSISTENCIA TECNICA PARA CRIAÇÃO DO ARQUIVO CSV
    /*if ($departamento == "at@croydon.com.br") {


//CAMINHO DO DOCUMENTO A SER CRIADO
        $file_path = $caminho . 'planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';

        $dados = '';

//VERIFICA A EXISTENCIA DO ARQUIVO
        if (!file_exists($file_path)) {
            // CASO NÃO EXISTA CRIA O NOME DAS COLUNAS DA TABELA
            $dados .= 'CLIENTE;TELEFONE;CIDADE/UF;DATA;PESSOA FISICA OU JURIDICA;RAMO DE ATIVIDADE;E-MAIL;RECLAMAÇÃO';
            $dados .= "\n";


            unlink($caminho . 'planilha_follow-up_' . $mesAnterior . '_'.$ultimoAno.'_'.'.csv');
        }
//DADOS A SEREM INCLUIDOS NAS COLUNAS DA TABELA
        $dados .= '"' . $nome . '";"' . $telefone . '";"' . $cidade . ' - ' . $uf . '";"' . $dataDocumento . '";"' . $empresa . '";"' . $area_atuacao . '";"' . $email . '";"' . $mensagem . '"';
        $dados .= "\n";

//ADCIONA A LINHA NA TABELA
        if (fwrite($file = fopen($file_path, 'a+'), $dados)) {
            fclose($file);

//CAMINHO ABSOLUTO DA PASTA TEMP
            $file = getcwd() . '/temp_contato/planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';
//CAMINHO ABSOLUTO DA PASTA PROPOSTAS (PASTA DE REDIRECIONAMENTO DE ARQUIVO PARA SERVIDOR LOCAL)
            $newFile_path = getcwd() . '/propostas/planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';
//COPIA O ARQUIVO DA PASTA TEMP PARA PASTA PROPOSTAS
            copy($file, $newFile_path);
            ?>
            <script>alert('teste')</script>
            <?php
            if (!copy($file, $newFile_path)) {
                $txt = "Erro na copia do arquivo csv na data " . $dataDocumento;
// LOG DE ERRO
                file_put_contents("/home/croydon/public_html/temp_contato/Erro_copia_arquivo_csv-" . $data . ".txt", $txt);
            }
//echo "Arquivo gravado com sucesso!";
        } else {
            $txt = "Erro na geração do arquivo csv na data " . $dataDocumento;
// // LOG DE ERRO
            file_put_contents("/home/croydon/public_html/propostas/Erro_geracao_arquivo_csv-" . $data . ".txt", $txt);
        }


    }*/
    if ($departamento == "at@croydon.com.br" || $departamento == "crc@croydon.com.br" || $departamento == "vendas@croydon.com.br" || $departamento == "importacao@croydon.com.br" || $departamento == "exportacao@croydon.com.br") {

        $file_path = $caminho . 'planilha_follow-up_crc_' . $mesDocumento . '_' . $anoDocumento . '_' . '.xml';

        $dadosXML = array();

        $cont = 0;
        if (file_exists($file_path)) {


            if (($response_xml_data = file_get_contents($file_path)) === false) {
                echo "Error fetching XML\n";
            } else {
                libxml_use_internal_errors(true);
                $data = simplexml_load_string($response_xml_data);
                if (!$data) {
                    echo "Error loading XML\n";
                    foreach (libxml_get_errors() as $error) {
                        echo "\t", $error->message;
                    }
                } else {

                    foreach ($data->crc as $crc) {

                        $dadosXML[$cont]['nome'] = $crc->nome;
                        $dadosXML[$cont]['empresa'] = $crc->empresa;
                        $dadosXML[$cont]['cargo'] = $crc->cargo;
                        $dadosXML[$cont]['endereco'] = $crc->endereco;

                        $dadosXML[$cont]['numero'] = $crc->numero;
                        $dadosXML[$cont]['complemento'] = $crc->complemento;
                        $dadosXML[$cont]['cep'] = $crc->cep;
                        $dadosXML[$cont]['cidade'] = $crc->cidade;

                        $dadosXML[$cont]['uf'] = $crc->uf;
                        $dadosXML[$cont]['pais'] = $crc->pais;
                        $dadosXML[$cont]['ddi'] = $crc->ddi;
                        $dadosXML[$cont]['ddd'] = $crc->ddd;

                        $dadosXML[$cont]['telefone'] = $crc->telefone;
                        $dadosXML[$cont]['email'] = $crc->email;
                        $dadosXML[$cont]['tipo'] = $crc->tipo;
                        $dadosXML[$cont]['mensagem'] = $crc->mensagem;

                        $dadosXML[$cont]['data'] = $crc->data;
                        $dadosXML[$cont]['mes'] = $crc->mes;
                        $dadosXML[$cont]['ano'] = $crc->ano;
                        $cont++;
                    }

                }
            }

            unlink($caminho . 'planilha_follow-up_crc_' . $mesAnterior . '_'. $anoDocumento . '_' . '.xlm');

            unlink(getcwd().'/follow-up/planilha_follow-up_' . $mesAnterior . '_'. $anoDocumento . '_' . '.xlm');
        }


        $dadosXML[$cont]['nome'] = htmlspecialchars($nome);
        $dadosXML[$cont]['empresa'] = htmlspecialchars($empresa);
        $dadosXML[$cont]['cargo'] = htmlspecialchars($area_atuacao);
        $dadosXML[$cont]['endereco'] = htmlspecialchars('');

        $dadosXML[$cont]['numero'] = htmlspecialchars('');
        $dadosXML[$cont]['complemento'] = htmlspecialchars('');
        $dadosXML[$cont]['cep'] = htmlspecialchars('');
        $dadosXML[$cont]['cidade'] = htmlspecialchars($cidade);

        $dadosXML[$cont]['uf'] = htmlspecialchars($uf);
        $dadosXML[$cont]['pais'] = $pais;
        $dadosXML[$cont]['ddi'] = htmlspecialchars($ddi);
        $dadosXML[$cont]['ddd'] = htmlspecialchars($ddd);

        $dadosXML[$cont]['telefone'] = htmlspecialchars($telefone);
        $dadosXML[$cont]['email'] = htmlspecialchars($email);
        $dadosXML[$cont]['tipo'] = 5;
        $dadosXML[$cont]['mensagem'] = htmlspecialchars($mensagem);

        $dadosXML[$cont]['data'] = $dataEnvio;
        $dadosXML[$cont]['mes'] = $mesIdentificador;
        $dadosXML[$cont]['ano'] = $anoDocumento;

// Receberá todos os dados do XML
        $xml = '<?xml version="1.0" encoding="ISO-8859-1"?>';

// A raiz do meu documento XML
        $xml .= '<listas>';

        for ( $i = 0; $i < count( $dadosXML ); $i++ ) {
            $xml .= '<crc>';
            $xml .= '<nome>' . $dadosXML[$i]['nome'] . '</nome>';
            $xml .= '<empresa>' . $dadosXML[$i]['empresa'] . '</empresa>';
            $xml .= '<cargo>' . $dadosXML[$i]['cargo'] . '</cargo>';
            $xml .= '<endereco>' . $dadosXML[$i]['endereco'] . '</endereco>';
            $xml .= '<numero>' . $dadosXML[$i]['numero'] . '</numero>';
            $xml .= '<complemento>' . $dadosXML[$i]['complemento'] . '</complemento>';
            $xml .= '<cep>' . $dadosXML[$i]['cep'] . '</cep>';
            $xml .= '<cidade>' . $dadosXML[$i]['cidade'] . '</cidade>';
            $xml .= '<uf>' . $dadosXML[$i]['uf'] . '</uf>';
            $xml .= '<pais>' . $dadosXML[$i]['pais'] . '</pais>';
            $xml .= '<ddi>' . $dadosXML[$i]['ddi'] . '</ddi>';
            $xml .= '<ddd>' . $dadosXML[$i]['ddd'] . '</ddd>';
            $xml .= '<telefone>' . $dadosXML[$i]['telefone'] . '</telefone>';
            $xml .= '<email>' . $dadosXML[$i]['email'] . '</email>';
            $xml .= '<tipo>' . $dadosXML[$i]['tipo'] . '</tipo>';
            $xml .= '<mensagem>' . $dadosXML[$i]['mensagem'] . '</mensagem>';
            $xml .= '<data>' . $dadosXML[$i]['data'] . '</data>';
            $xml .= '<mes>' . $dadosXML[$i]['mes'] . '</mes>';
            $xml .= '<ano>' . $dadosXML[$i]['ano'] . '</ano>';
            $xml .= '</crc>';
        }

        $xml .= '</listas>';

// Escreve o arquivo
        if (fwrite($fp = fopen($file_path, 'w+'), $xml)) {
            fclose($fp);

//CAMINHO ABSOLUTO DA PASTA TEMP
            $file = getcwd() . '/temp_contato/planilha_follow-up_crc_' . $mesDocumento . '_' . $anoDocumento . '_' . '.xml';
//CAMINHO ABSOLUTO DA PASTA PROPOSTAS (PASTA DE REDIRECIONAMENTO DE ARQUIVO PARA SERVIDOR LOCAL)
            $newFile_path = getcwd() . '/follow-up/planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.xml';
//COPIA O ARQUIVO DA PASTA TEMP PARA PASTA PROPOSTAS
            copy($file, $newFile_path);
            if (!copy($file, $newFile_path)) {
                $txt = "Erro na copia do arquivo csv na data " . $dataDocumento;
// LOG DE ERRO
                file_put_contents(getcwd() ."/temp_contato/Erro_copia_arquivo_xlm-" . $data . ".txt", $txt);
            }
//echo "Arquivo gravado com sucesso!";
        } else {
            $txt = "Erro na geração do arquivo csv na data " . $dataDocumento;
// // LOG DE ERRO
            file_put_contents(getcwd() ."/temp_contato/Erro_escrita_arquivo_xlm-" . $data . ".txt", $txt);
        }


    }

}
?>
