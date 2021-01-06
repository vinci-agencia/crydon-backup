<?php

 if(stristr($url3, '?') === FALSE) {
     $file = 'paginas/'.$url3.'.php';
 }
else{
    $arq = explode("?",$url3);
    $file = 'paginas/'.$arq[0].'.php';
}
 
if(is_file($file)){
	include($file);
}
else{
	?>
	<div class="meio_geral">
    <div class="breadcrumb_internas">
        <div id="breadcrumb">
            <div class="borderLeft_bread"></div>
            <div class="borderRight_bread"></div>
            <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
            <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
            <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            if($lang == 'pt'){
                $txt = 'CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.';
            }
            else if($lang == 'es'){
                $txt = 'CROYDON, símbolo de equipos de calidad para hoteles, bares y restaurantes desde 1962.';
            }
            else{
                $txt = 'CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962.';
            }
			
			foreach (consulta("select titulo_".$lang." from conteudos where ".$lang." = 1 AND pagina = '".$url3."'") as $conteudo){
        		$titulo = $conteudo['titulo_'.$lang];
    		}
            ?>
            <span><?php echo $titulo;?></span>
        </div>
    </div>
    <p class="texto_internas"><?php echo $txt;?></p>
    <?php
    foreach (consulta("select conteudo_".$lang." from conteudos where ".$lang." = 1 AND pagina = '".$url3."'") as $conteudo){
        echo $conteudo['conteudo_'.$lang];
    }
    ?>
</div>    
    <?php
}
?>
