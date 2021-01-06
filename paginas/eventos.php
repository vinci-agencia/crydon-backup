<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Eventos';
			$name_pag1 = 'Empresa';
			$txt = 'Fique por dentro dos eventos que a Croydon realiza ou participa.';
			$detalhes = 'Detalhes';
		}
		else if($lang == 'es'){
			$name_pag = 'Eventos';
			$name_pag1 = 'Empresa';
			$txt = 'Manténgase informado de los eventos que realiza o participa en Croydon.';
			$detalhes = 'Detalles';
		}
		else{
			$name_pag = 'Events';
			$name_pag1 = 'Company';
			$txt = 'The Company Events.';
			$detalhes = 'Details';
		}
		?>
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<ul class="lista_eventos">
	<?php
	//######### INICIO Paginação
		$pg = @$url4;
        $numreg = 12; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("SELECT * FROM galerias WHERE ".$lang." = 1");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	
	foreach (consulta("SELECT * FROM galerias WHERE ".$lang." = 1 ORDER BY id DESC LIMIT $inicial, $numreg") as $eventos){
	
		$id = $eventos['id'];
				
		foreach (consulta("SELECT foto,legenda_".$lang." FROM fotos WHERE id_galeria = '$id' ORDER BY id DESC LIMIT 1") as $fotos){
			$foto = $fotos['foto'];
			$legenda = $fotos['legenda_'.$lang];
		}
		
		$nome_evento = $eventos['nome_'.$lang];
		$descricao = $eventos['descricao_'.$lang];
		$link_evento = retira_acentos(coloca_traco($nome_evento));
		
		if(strlen($nome_evento)>49){
			$nome_evento = substr($nome_evento,0 , 46).'...';
		}
		if(strlen($descricao)>64){
			$descricao = substr($descricao,0 , 60).'...';
		}
		
	?>
	<li>
    	<a href="<?php echo $_SESSION['url'].$lang;?>/fotos/<?php echo $id;?>/<?php echo $link_evento;?>"><img style="max-height: 149px!important;max-width: 202px!important;" src="<?php echo $_SESSION['url'];?>images/eventos/<?php echo $foto;?>" alt="<?php echo $legenda;?>" /></a>
        <p><?php echo $nome_evento;?></p>
        <span><?php echo $descricao;?></span>
        <a href="<?php echo $_SESSION['url'].$lang;?>/fotos/<?php echo $id;?>/<?php echo $link_evento;?>" class="bt_eventos"><?php echo $detalhes;?></a>
    </li>
    <?php
	}
	?>
</ul>
<?php 
	include("inc/paginacao2.php");
?>
