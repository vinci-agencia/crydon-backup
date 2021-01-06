<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Localização';
			$name_pag1 = 'Empresa';
			$txt = 'CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.';
			$txt_link_map = 'Clique aqui e visualize nosso mapa com pontos de referência.';
		}
		else if($lang == 'es'){
			$name_pag = 'Localización';
			$name_pag1 = 'Empresa';
			$txt = 'CROYDON, símbolo de equipos de calidad para hoteles, bares y restaurantes desde 1962.';
			$txt_link_map = 'Haga clic aquí para ver nuestro mapa con puntos de referencia.';
		}
		else{
			$name_pag = 'Location';
			$name_pag1 = 'Company';
			$txt = 'CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962.';
			$txt_link_map = 'Location Map.';
		}
		?>
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<div id="map_canvas"></div>
<a href="<?php echo $_SESSION['url'];?>images/localizacao/mapa_ref.jpg" class="lightbox" id="visualizar_mapa"><?php echo $txt_link_map;?></a>
