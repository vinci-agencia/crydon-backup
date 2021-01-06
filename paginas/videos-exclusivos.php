<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Vídeos exclusivos';
			$tit_pag_video = 'Confira aqui nossos vídeos exclusivos!';
		}
		else if($lang == 'es'){
			$name_pag = 'Videos exclusivos';
			$tit_pag_video = 'Aquí puede ver nuestros videos exclusivos!';
		}
		else{
			$name_pag = 'Videos';
			$tit_pag_video = 'Check out our videos here!';
		}
		?>
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<p class="texto_internas"><?php echo $tit_pag_video;?></p>

<?php
	//######### INICIO Paginação
		$pg = @$url3;
        $numreg = 10; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("select id from videos where ".$lang." = 1 AND exclusivo = 1");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	
foreach (consulta("SELECT titulo_".$lang.",url_".$lang." FROM videos WHERE ".$lang." = 1 AND exclusivo = 1 ORDER BY id DESC LIMIT $inicial, $numreg") as $videos){
	$titulo = $videos['titulo_'.$lang];

        echo '<p class="titulo_video">'.$titulo.'</p>';
        echo getVideo($videos['url_'.$lang],600,385);

}
include("inc/paginacao.php");
?>