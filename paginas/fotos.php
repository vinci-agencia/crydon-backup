<style>#lightbox-container-image-box{max-height: 640px!important;max-width: 850px!important;overflow: hidden !important;}#lightbox-image{max-height: 600px!important;max-width: 800px!important;}</style>
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
			$name_pag2 = 'Fotos';
		}
		else if($lang == 'es'){
			$name_pag = 'Eventos';
			$name_pag1 = 'Empresa';
			$name_pag2 = 'Fotos';
		}
		else{
			$name_pag = 'Events';
			$name_pag1 = 'Firm';
			$name_pag2 = 'Photos';
		}
		?>
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang?>/eventos"><?php echo $name_pag;?></a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag2;?></span>
    </div>
</div>
	<?php
	//######### INICIO Paginação
		$pg = $url5;
        $numreg = 12; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("SELECT * FROM fotos WHERE id_galeria = '$url3'");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	
	foreach (consulta("SELECT * FROM galerias WHERE ".$lang." = 1 AND id = '$url3'") as $eventos){
		$nome_evento = $eventos['nome_'.$lang];
		$descricao = $eventos['descricao_'.$lang];
		$data = $eventos['data'];
	}
	?>
	<div id="fotos_esquerda">
    	<h3><?php echo $nome_evento;?></h3>
        <span class="data"><?php echo $data;?></span>
        <p><?php echo $descricao;?></p>
        <?php
		foreach (consulta("SELECT * FROM fotos WHERE id_galeria = '$url3' ORDER BY id DESC LIMIT $inicial, $numreg") as $fotos){
		
		$id = $fotos['id'];
		$foto = $fotos['foto'];
		$legenda = $fotos['legenda_'.$lang];
		
		?>
        <div class="foto_legenda">
        	<a href="javascript:void(0)" onclick="foto_legenda('<?php echo $_SESSION['url'];?>images/eventos/<?php echo $foto;?>','<?php echo $legenda;?>')"><img style="max-height: 82px!important;max-width: 82px!important;" src="<?php echo $_SESSION['url'];?>images/eventos/<?php echo $foto;?>" /></a>
        </div>
        <?php
		}
		?>
    </div>
    <div id="fotos_direita">
    	<?php
    	foreach (consulta("SELECT * FROM fotos WHERE id_galeria = '$url3' ORDER BY id DESC LIMIT 1") as $fotosG){
			$fotoG = $fotosG['foto'];
			$legendaG = $fotosG['legenda_'.$lang];
		?>
        <a id="link_ampliada" class="lightbox" title="<?php echo $legendaG;?>" href="<?php echo $_SESSION['url'];?>images/eventos/<?php echo $fotoG;?>">
            <img style="max-height: 493px!important;max-width: 493px!important;" id="foto_ampliada" src="<?php echo $_SESSION['url'];?>images/eventos/<?php echo $fotoG;?>" alt="<?php echo $legendaG;?>" />
        </a>
        <p id="legenda_ampliada"><?php echo $legendaG;?></p>
        <?php
		}
		?>
    </div>
<?php 
	include("inc/paginacao_fotos.php");
?>
