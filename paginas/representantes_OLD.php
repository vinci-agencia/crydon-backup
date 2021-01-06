        <?php
        if($lang == 'pt'){
			$name_pag = 'Representantes';
			$txt = 'Saiba onde encontrar nossos representantes  pelo Brasil';
			$name_pag1 = 'Onde Comprar';
			$nao_existe = 'Selecione, no menu ao lado, o  estado que deseja.';
		}
		else if($lang == 'es'){
			$name_pag = 'Representantes';
			$txt = 'Sepa d�nde encontrar nuestros representantes en Brasil';
			$name_pag1 = 'D�nde Comprar';
			$nao_existe = 'Seleccione el men� al lado del estado que se desea.';
		}
		else{
			$name_pag = 'Representatives';
			$txt = 'Know where to find our representatives in Brazil';
			$name_pag1 = 'Where to Buy';
			$nao_existe = 'Select from the menu next to the state you want.';
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
<p class="texto_internas"><?php echo $txt;?></p>
<ul class="estados">
	<?php
	 foreach (consulta("select nome,id from estados ORDER BY nome ASC") as $estados){
		 $nome_estado = $estados['nome'];
		 $id_estado = $estados['id'];
		 
		 $quant = sizeof(consulta("select id from onde_comprar where id_tipo = 1 AND id_estado = '$id_estado'"));

		 if($id_estado == $url4){
		 	$classe = 'selecionado';
		 }
		 else{
		 	$classe = '';
		 }
		 
		 if($quant > 0){
	?>
	<li>&raquo; <a class="<?php echo $classe;?>" href="<?php echo $_SESSION['url'].$lang?>/conteudo/representantes/<?php echo $id_estado;?>"><?php echo $nome_estado;?></a></li>
    <?php
		}
	 }
	 ?>
</ul>
<?php
	if(isset($url4)){
		$idEstado = $url4;
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
	 
	 $sql = "select * from onde_comprar where id_tipo = 1 and id_estado = '$idEstado' order by ordem";
	 $quantidade = sizeof(consulta($sql));
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
			<li><?php echo $endereco;?></li>
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
	?>
    </div>
    <?php
	 }
	 else{
		 echo '<p class="no_exist">'.$nao_existe.'</p>';
	 }
	?>