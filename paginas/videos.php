<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Vídeos';
			$tit_pag_video = 'Confira aqui nossos vídeos!';
		}
		else if($lang == 'es'){
			$name_pag = 'Videos';
			$tit_pag_video = 'Aquí puede ver nuestros videos!';
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
$_SERVER["REQUEST_URI"];
$get_url_amigavel = (explode("/",$_SERVER["REQUEST_URI"]));
        
if(!isset($get_url_amigavel[3])){
	//######### INICIO Paginação
		$pg = @$url3;
        $numreg = 10; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("select id from videos where ".$lang." = 1");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	
foreach (consulta("SELECT * FROM videos WHERE ".$lang." = 1 ORDER BY id DESC LIMIT $inicial, $numreg") as $videos){
	$titulo = $videos['titulo_'.$lang];
?>
<a href="http://croydon.com.br/<?php echo $lang.'/videos/'.$videos['url_amigavel']; ?>">
<div style="float: left; margin: 20px 20px 2px 20px;"><img src="http://croydon.com.br/<?php echo $videos['miniatura']; ?>" />
<?php
        
        //echo getVideo($videos['url_'.$lang],140,100);
?>
<div style="width: 140px;height: 35px; white-space: pre-line;"><p class="titulo_video" style="width: 140px;white-space: pre-line; margin: 0px !important;"><?php echo $titulo ?></p></div>
</div>
</a>
<?php
}
include("inc/paginacao.php");
}
else{
    $urlAmigavel=$get_url_amigavel[3];
    foreach (consulta("SELECT titulo_".$lang.",url_".$lang.",url_amigavel FROM videos WHERE url_amigavel = '".$urlAmigavel."' AND ".$lang." = 1") as $videos){
	$titulo = $videos['titulo_'.$lang];
?>
<div style="text-align: center;">
        <p class="titulo_video"><?php echo $titulo; ?></p>
<?php
        echo getVideo($videos['url_'.$lang],600,385);
        
?>
</div>
<?php

}
}
?>