<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/maskedinput-1.1.4.js"></script>
<script>
$(document).ready(function() {
    $(".telefone").mask("(99) 9999-9999");
    
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

<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Contato';
		}
		else if($lang == 'es'){
			$name_pag = 'Contacto';
		}
		else{
			$name_pag = 'Contact';
		}
		?>
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<?php 

foreach (consulta("select texto_".$lang." from contato order by id desc LIMIT 1") as $contato){

$texto = $contato['texto_'.$lang];

if($lang == 'pt'){
?>
<p class="texto_internas">CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.</p>
<?php echo $texto;?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
	<label>Nome</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Empresa</label>
    <input class="input_form1" type="text" name="empresa" />
    <label>Telefone</label>
    <input type="text" class="input_form2 telefone" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <div style="width: 100%; float: left;">
        <div style="float: left; margin-right: 10px;">
            <label>UF</label>
            <select style="width: 60px;" id="estado" name="uf">
                <option value="">UF</option>
                <?php foreach (consulta("select sigla,id from estados2 order by sigla asc") as $estados){ ?>
                <option value="<?php echo $estados['id'];?>"><?php echo $estados['sigla'];?></option>
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
    <label>Departamento</label>
    <select style="width: 300px; border: 1px solid #dad9d9; border-radius: 3px; background: #fff;" name="departamento" id="departamento">
        <option value="">Selecione</option>
	<?php foreach (consulta("select * from contato_departamentos order by id ASC") as $row) : ?>
	<option value="<?php echo $row['email'];?>"><?php echo $row['titulo'];?></option>
	<?php endforeach;?>
    </select>
    <div style="display: none;" id="area_atuacao">
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
    </div>
    <label>Mensagem</label>
    <textarea name="mensagem" class="input_form3"></textarea>
    <input type="submit" class="btEnviar" value="" />
</form>
<?php
}
else if($lang == 'es'){
?>
<p class="texto_internas"> CROYDON, símbolo de equipos de calidad para hoteles, bares y restaurantes desde 1962. </p>
<?php echo $texto;?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
	<label>Nombre</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Compañia</label>
    <input class="input_form1" type="text" name="empresa" />
    <label>Teléfono</label>
    <input type="text" class="input_form2 telefone" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <label>Estado</label>
    <input class="input_form1" type="text" name="estado_es" />
    <label>Ciudad</label>
    <input class="input_form1" type="text" name="cidade_es" />
    <label>Departamento</label>
    <select name="departamento">
    	<option value="importacao@croydon.com.br">Importación</option>
        <option value="exportacao@croydon.com.br">Exportación</option>
    </select>
    <label>Mensaje</label>
    <textarea name="mensagem" class="input_form3"></textarea>
    <input type="submit" class="btEnviar" value="" />
</form>
<?php
}
else{
?>
<p class="texto_internas"> CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962. </p>
<?php echo $texto;?>
<form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
	<label>Name</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Company</label>
    <input class="input_form1" type="text" name="empresa" />
    <label>Phone</label>
    <input type="text" class="input_form2 telefone" name="telefone" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <label>State</label>
    <input class="input_form1" type="text" name="estado_en" />
    <label>City</label>
    <input class="input_form1" type="text" name="cidade_en" />
    <label>Department</label>
    <select name="departamento">
    	<option value="importacao@croydon.com.br">Import</option>
        <option value="exportacao@croydon.com.br">Export</option>
    </select>
    <label>Message</label>
    <textarea name="mensagem" class="input_form3"></textarea>
    <input type="submit" class="btEnviar" id="btEnviarEn" value="" />
</form>
<?php
}
}
if($_POST['nome'] != ""){

        if(isset($_POST['uf']) && $_POST['uf'] != ""){
            $estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "'.$_POST['uf'].'"'));
            $uf = $estado['sigla'];
        }
		else if(isset($_POST['estado_es']) && $_POST['estado_es'] != ""){
			$uf = $_POST['estado_es'];
		}
		else if(isset($_POST['estado_en']) && $_POST['estado_en'] != ""){
			$uf = $_POST['estado_en'];
		}
        else{
            $uf = '';
        }
        
        if(isset($_POST['cidade']) && $_POST['cidade'] != ""){
            $cidade = mysql_fetch_array(mysql_query('select * from cidades where id = "'.$_POST['cidade'].'"'));
            $cidade = $cidade['nome'];
        }
		else if(isset($_POST['cidade_es']) && $_POST['cidade_es'] != ""){
			$cidade = $_POST['cidade_es'];
		}
		else if(isset($_POST['cidade_en']) && $_POST['cidade_en'] != ""){
			$cidade = $_POST['cidade_en'];
		}
        else{
            $cidade = '';
        }
        
	$nome = $_POST['nome'];
	$empresa = $_POST['empresa'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	$departamento = $_POST['departamento'];
	
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
				'.$nome.'
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
				<b>Cidade:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				'.$cidade.' - '.$uf.'
			</td>
		  </tr> 
		  <tr>
			<td>
				<b>Empresa:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				'.$empresa.'
			</td>
		  </tr> 
		  <tr>
			<td>
				<b>Departamento:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				'.$departamento.$area_atuacao.$outra_atuacao.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Mensagem:</b>
			</td>
		  </tr>  
		  <tr>
			<td>
				'.$mensagem.'
			</td>
		  </tr> 
		   

		</table>
		
		</body>
	</html>';
	
	
	
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "From:SITE CROYDON <site@croydon.com.br>\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "Bcc: marketing@croydon.com.br\r\n";	
	
	if(mail($mm, 'CONTATO - SITE CROYDON', $m, $headers)){
		echo  '<script>window.location.href = "'.$_SESSION['url'].$lang.'/confirmacao"</script>';
	}
	else{
		echo  '<script>alert("Erro, Tente novamente!");</script>';
	}
}
?>