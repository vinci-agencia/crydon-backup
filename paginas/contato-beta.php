
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/maskedinput-1.1.4.js"></script>
<?php
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
            $name_pag = 'Contato';
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
        <p class="texto_internas">CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde
            1962.</p>
        <?php echo $texto; ?>
        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
            <label>Nome</label>
            <input required class="input_form1" type="text" name="nome"/>
            <label>Empresa</label>
            <input required class="input_form1" type="text" name="empresa"/>
            <label>Telefone</label>
            <input required type="text" class="input_form2 telefone" id="telefone" maxlength="15" name="telefone"/>
            <label>Email</label>
            <input required class="input_form1" type="email" name="email"/>

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
            </div>
            <label>Departamentos</label>
            <select style="width: 300px; border: 1px solid #dad9d9; border-radius: 3px; background: #fff;"
                    name="departamento" id="departamento">
                <option value="">Selecione</option>
                <?php foreach (consulta("select * from contato_departamentos order by id ASC") as $row) : ?>
                    <option value="<?php echo $row['email']; ?>"><?php echo $row['titulo']; ?></option>
                <?php endforeach; ?>
            </select>
            <!--<div id="area_atuacao">
                <label>Área de atuação</label>
                <select name="area_atuacao" id="area_atuacao_select">
                    <option value="">Selecione</option>
                    <option value="representante comercial">representante comercial</option>
                    <option value="lojas de equipamentos">lojas de equipamentos</option>
                    <option value="proprietários de bares">proprietários de bares</option>
                    <option value="proprietários de restaurante">proprietários de restaurante</option>
                    <option value="proprietários de hotel">proprietários de hotel</option>
                    <option value="proprietários de buffet">proprietários de buffet</option>
                    <option value="proprietários de padaria">proprietários de padaria</option>
                    <option value="proprietários de lanchonete">proprietários de lanchonete</option>
                    <option value="outros">Outros</option>
                </select>
            </div>
            <div id="outra_atuacao" style="display: none;">
                <label>Qual?</label>
                <input class="input_form2" type="text" name="outra_atuacao" />
            </div>-->
            <label>Mensagem</label>
            <textarea name="mensagem" class="input_form3"></textarea>
            <input type="submit" class="btEnviar" value=""/>
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

    if (isset($_POST['uf']) && $_POST['uf'] != "") {
        $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "' . $_POST['uf'] . '"'));
        $uf = $estado['sigla'];
    } else if (isset($_POST['estado_es']) && $_POST['estado_es'] != "") {
        $uf = $_POST['estado_es'];
    } else if (isset($_POST['estado_en']) && $_POST['estado_en'] != "") {
        $uf = $_POST['estado_en'];
    } else {
        $uf = '';
    }

    if (isset($_POST['cidade']) && $_POST['cidade'] != "") {
        $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "' . $_POST['cidade'] . '"'));
        $cidade = $cidade['nome'];
    } else if (isset($_POST['cidade_es']) && $_POST['cidade_es'] != "") {
        $cidade = $_POST['cidade_es'];
    } else if (isset($_POST['cidade_en']) && $_POST['cidade_en'] != "") {
        $cidade = $_POST['cidade_en'];
    } else {
        $cidade = '';
    }

    if(isset($_POST['pais'])){
        $pais = $_POST['pais'];
    }else{
        $pais = 'Brasil';
    }

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $mensagem = str_ireplace(';',',',$_POST['mensagem']);
    $departamento = $_POST['departamento'];

    if (isset($_POST['area_atuacao']))
        $area_atuacao = ' - ' . $_POST['area_atuacao'];
    else
        $area_atuacao = '';

    if (isset($_POST['outra_atuacao']))
        $outra_atuacao = ' - ' . $_POST['outra_atuacao'];
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
        $mail->AddAddress(/*$mm*/'ti@croydon.com.br', 'CROYDON');
        //$mail->AddCC('ciclano@croydon.com.br', 'Ciclano'); // Copia
        $mail->AddBCC('ti@croydon.com.br', 'ti'); // Cópia Oculta
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
    $data = date('d-m-Y-H-m-s');
//DATA E HORA DA CRIAÇÃO DO DOCUMENTO
    $dataDocumento = date('d-m-Y H:m:s');
    $dataEnvio = date('Y-m-d H:m:s');
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
    if ($departamento == "at@croydon.com.br") {


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


    }
    if ($departamento == "at@croydon.com.br" || $departamento == "crc@croydon.com.br" || $departamento == "vendas@croydon.com.br" || $departamento == "importacao@croydon.com.br" || $departamento == "exportacao@croydon.com.br") {


//CAMINHO DO DOCUMENTO A SER CRIADO
        $file_path = $caminho . 'planilha_follow-up_crc_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';

        $dados = '';

//VERIFICA A EXISTENCIA DO ARQUIVO
        if (!file_exists($file_path)) {
            // CASO NÃO EXISTA CRIA O NOME DAS COLUNAS DA TABELA
            $dados .= 'nome;empresa;cargo;endereco;numero;complemento;cep;cidade;uf;pais;ddi;ddd;telefone;email;tipo;mensagem;data;mes;ano;';
            $dados .= "\n";

            unlink($caminho . 'planilha_follow-up_crc_' . $mesAnterior . '_'. $anoDocumento . '_' . '.csv');

            unlink('/follow-up/planilha_follow-up_' . $mesAnterior . '_'. $anoDocumento . '_' . '.csv');
        }

//DADOS A SEREM INCLUIDOS NAS COLUNAS DA TABELA
        $dados .= '"' . $nome . '";"' . $empresa . '";"' . $area_atuacao . '";"' . '' . '";"' . '' . '";"' . '' . '";"' . '' . '";"' . $cidade . '";"' . $uf . '";"' . $pais . '";"' . $ddi . '";"' . $ddd . '";"'. $telefone.'";"'. $email . '";"5";"' . $mensagem .'";"'.$dataEnvio.'";"'.$mesIdentificador.'";"'.$anoDocumento. '"';
        $dados .= "\n";

//ADCIONA A LINHA NA TABELA
        if (fwrite($file = fopen($file_path, 'a+'), $dados)) {
            fclose($file);

//CAMINHO ABSOLUTO DA PASTA TEMP
            $file = getcwd() . '/temp_contato/planilha_follow-up_crc_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';
//CAMINHO ABSOLUTO DA PASTA PROPOSTAS (PASTA DE REDIRECIONAMENTO DE ARQUIVO PARA SERVIDOR LOCAL)
            $newFile_path = getcwd() . '/follow-up/planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.csv';
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


    }

}
?>