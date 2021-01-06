<?php
if($lang == 'pt'){
	$name_pag1 = 'Assistência técnica';
	$name_pag = 'Autorizadas';
	$txt = 'Saiba onde encontrar nossas assistências técnicas autorizadas pelo Brasil';
	$nao_existe = 'Selecione, no menu ao lado, o  estado que deseja.';
	$sem_resultados = 'Nenhum Resultado Foi Encontrado.';
}
else if($lang == 'es'){
	$name_pag1 = 'Assistência técnica';
	$name_pag = 'Autorizado';
	$txt = 'Sepa dónde encontrar nuestro centro de servicio autorizado por el Brasil';
	$nao_existe = 'Seleccione el menú al lado del estado que se desea.';
	$sem_resultados = 'No se encontraron resultados.';
}
else{
	$name_pag1 = 'Technical Assistance';
	$name_pag = 'Authorized';
	$txt = 'Know where to find our service center authorized by Brazil';
	$nao_existe = 'Select from the menu next to the state you want.';
	$sem_resultados = 'No results were found.';
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<?php 
if(isset($url4)){ ?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />

<form style="float: right; width: 340px; margin-top: 20px; margin-bottom: 10px;" action="" method="post" class="content">
    <input style="float: left; height: 25px; margin-right: 10px; width: 240px; color: #666; font-size: 12px; border: 1px solid #BFBDBD; padding-left: 10px;" type="text" name="buscaC" estado="<?php echo $url4;?>" class="buscaC search" id="searchid" placeholder="Digite o endereço , cidade ou bairro" />
    <input style="float: left; margin: 0;" id="bt_busca_complete" type="submit" value="" />
    <div id="result"></div>
</form>
<?php
if(isset($url4)){
		$idEstado = $url4;
        }
        else{
            $idEstado = 0;
        }
        ?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid+',,<?php echo $idEstado; ?>';
if(searchid!='')
{
    $.ajax({
    type: "POST",
    url: "http://croydon.com.br/ajax/buscaAutoComplete.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;    
});

jQuery("#result").live("click",function(e){ 
    var $clicked = $(e.target);
    var $name = $clicked.find('.name').html();
    var decoded = $("<div/>").html($name).text();
    $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut(); 
    }
});
$('#searchid').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>
<?php }?>
<p class="texto_internas"><?php echo $txt;?></p>
<ul class="estados">
	<?php
	 foreach (consulta("select nome,id from estados ORDER BY nome ASC") as $estados){
		 $nome_estado = $estados['nome'];
		 $id_estado = $estados['id'];
		 
		 $quant = sizeof(consulta("select id from autorizadas where id_estado = '$id_estado'"));
		 
		 if($id_estado == $url4){
		 	$classe = 'selecionado';
		 }
		 else{
		 	$classe = '';
		 }
		 
		 if($quant > 0){
	?>
	<li>&raquo; <a class="<?php echo $classe;?>" href="<?php echo $_SESSION['url'].$lang?>/conteudo/autorizadas/<?php echo $id_estado;?>"><?php echo $nome_estado;?></a></li>
    <?php
		}
	 }
	 ?>
</ul>
<?php
	if(isset($url4)){
		$idEstado = $url4;
                foreach (consulta("select nome from estados where id = '".$idEstado."'") as $e){
                    foreach (consulta("select sigla from estados2 where nome = '".$e['nome']."'") as $es){
                        $sigla = $es['sigla'];
                    }
                }
	}
	else{
		$mapa = 'mapa_vazio.png';
	}
	foreach (consulta("select imagem from estados where id = '$idEstado'") as $estados){
		$mapa = $estados['imagem'];
	}
?>
 <img class="img_mapa" src="<?php echo $_SESSION['url'];?>images/mapas/<?php echo $mapa;?>" alt="mapa" />
<?php
	 if($idEstado == 1 or $idEstado == 2 or $idEstado == 3 or $idEstado == 21 or $idEstado == 22 or $idEstado == 14){
	 	$classe = 'norte';
	 }
	 else if($idEstado == 4 or $idEstado == 5 or $idEstado == 9 or $idEstado == 10 or $idEstado == 15 or $idEstado == 16 or $idEstado == 17 or $idEstado == 20 or $idEstado == 25){
	 	$classe = 'nordeste';
	 }
	 else if($idEstado == 8 or $idEstado == 11 or $idEstado == 12 or $idEstado == 27){
	 	$classe = 'centrooeste';
	 }
	 else if($idEstado == 7 or $idEstado == 13 or $idEstado == 18 or $idEstado == 24){
	 	$classe = 'sudeste';
	 }
	 else if($idEstado == 6 or $idEstado == 19 or $idEstado == 23){
	 	$classe = 'sul';
	 }
	 else{
	 	$classe = '';
	 }
	 
         if($_POST){
            $sql = "select * from autorizadas where endereco LIKE '%".$_POST['buscaC']."%' and id_estado = '$idEstado' and (tipo= 2 or tipo= 3) order by endereco ASC";   
         }
         else{
            $sql = "select * from autorizadas where id_estado = '$idEstado' and (tipo= 1 or tipo= 3) order by ordem";
         }
         
     $quantidade = sizeof(consulta($sql));
	 
	 if(isset($url4)){
	 
		 if($quantidade > 0){
		 ?>
		 <div id="coluna_direita_informacoes">
		 <?php
			 foreach (consulta($sql) as $representantes){
				 $nome = $representantes['nome'];
				 $endereco = $representantes['endereco'];
				 $cep = $representantes['cep'];
				 $telefone = $representantes['telefone'];
				 $cel = $representantes['cel'];
				 $fax = $representantes['fax'];
				 $contato = $representantes['contato'];
				 $email = $representantes['email'];
				 $msn = $representantes['msn'];
				 $skype = $representantes['skype'];
		?>
	 
			<div class="box_informacoes" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?>"><?php echo $nome?></h3>
				<ul>
					<li><?php echo $endereco.' - '.$sigla;?></li>
					<?php
					if($cep != ""){
					 echo '<li>CEP: '.$cep.'</li>';
					}
					?>
				</ul>
				<ul>
					<?php
					if($cel != ''){
						$cel = ' / '.$cel;
					}else{
						$cel = '';
					}
					if($telefone != ""){
					echo '<li>Telefone: '.$telefone.$cel.'</li>';
					}
					if($fax != ''){
					echo '<li>Fax: '.$fax.'</li>';
					}
					?>
				</ul>
				<ul>
					<?php
					if($contato != ""){
					 echo '<li>Contato: '.$contato.'</li>';
					}
					if($email != ""){
					 echo '<li>E-mail: <a href="mailto:'.$email.'">'.$email.'</a></li>';
					}
					if($msn != ""){
					 echo '<li>MSN: '.$msn.'</li>';
					}
					if($skype != ""){
					 echo '<li>Skype: '.$skype.'</li>';
					}
					?>
				</ul>
			</div>
		<?php
				}
			}
			else{
				?>
                <div class="box_informacoes" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?>">Em Breve</h3>
				<ul>
					<li>Teremos uma Assistência técnica disponível para esta área.</li>
					
				</ul>
				
			</div>
            <?php
			}
		 ?>
		 </div>
		 <?php
     }
	 else{
		 echo '<p class="no_exist">'.$nao_existe.'</p>';
	 }
	?>