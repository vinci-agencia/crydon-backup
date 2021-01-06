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
                $name_pag1 = 'Notícia';
            }
            else if($lang == 'es'){
                $name_pag1 = 'Noticias';
            }
            else{
                $name_pag1 = 'News';
            }
            ?>
            <span><?php echo $name_pag1;?></span>
            <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            foreach (consulta("select titulo_".$lang." from noticias where id = '$url3'") as $noticia){
			?>
            <span><?php echo $noticia['titulo_'.$lang];?></span>
            <?php
			}
			?>
        </div>
    </div>
    <?php
    foreach (consulta("select titulo_".$lang.",texto_".$lang." from noticias where id = '$url3'") as $noticia){
		$tit = $noticia['titulo_'.$lang];
        echo  '<p class="texto_internas">'.$tit.'</p>';
        $texto = $noticia['texto_'.$lang];
	    echo '<div class="txt_noticia"><p>'.$texto.'</p></div>';
    }
    ?>
</div>