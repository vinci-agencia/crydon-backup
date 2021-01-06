<?php		
if($_POST){
   //Incluir a classe excelwriter
   include("inc/excelwriter.inc.php");

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$empresa = $_POST['empresa'];
	$telefone = $_POST['telefone'];
	
	if(isset($_POST['area_atuacao'])){
		if($_POST['outra_atuacao'] != "")
			$atuacao = $_POST['area_atuacao'].' - '.$_POST['outra_atuacao'];
		else 
			$atuacao = $_POST['area_atuacao'];
	}
	else{
		$atuacao = '';
	}
	
	if(isset($_POST['uf']) && $_POST['uf'] != ""){
		$estado = mysql_fetch_array(mysql_query('select * from estados2 where id = "'.$_POST['uf'].'"'));
		$uf = $estado['uf'];
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
		
	$sql = "INSERT INTO newsletter (nome, email, empresa, telefone, uf, cidade, area_atuacao) VALUES ('$nome','$email','$empresa','$telefone','$uf','$cidade','$atuacao')";
	mysql_query($sql);

   //VocÃª pode colocar aqui o nome do arquivo que vocÃª deseja salvar.
    $excel=new ExcelWriter("newsletter.xls");

    if($excel==false){
        echo $excel->error;
   }

   //Escreve o nome dos campos de uma tabela
   $myArr=array('NOME','EMAIL','EMPRESA','TELEFONE','UF','CIDADE','AREA DE ATUACAO','DATA');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
   $consulta = "SELECT * FROM newsletter order by id DESC";
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){
         $myArr=array($linha['nome'],$linha['email'],$linha['empresa'],$linha['telefone'],$linha['uf'],$linha['cidade'],$linha['area_atuacao'],$linha['data']);
         $excel->writeLine($myArr);
      }
   }	
	
	$excel->close();
	
	echo "<script type='text/javascript'>
			   alert('Cadastrado com sucesso!');
				window.setTimeout(location.href='".$_SESSION['url'].$lang."',0);
			</script>";
}
else{ ?>
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
        <span>Newsletter</span>
    </div>
</div>
<?php 

if($lang == 'pt'){
?>
<p class="texto_internas">CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.</p>
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
    <div id="area_atuacao">
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
    <input style="margin-top: 10px; float: left;" type="submit" class="btEnviar" value="" />
</form>
<?php
}
else if($lang == 'es'){
?>
<p class="texto_internas"> CROYDON, símbolo de equipos de calidad para hoteles, bares y restaurantes desde 1962. </p>
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
    <input style="margin-top: 10px;" type="submit" class="btEnviar" value="" />
</form>
<?php
}
else{
?>
<p class="texto_internas"> CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962. </p>
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
    <input style="margin-top: 10px;" type="submit" class="btEnviar" id="btEnviarEn" value="" />
</form>
<?php
}
}
?>