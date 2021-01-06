<div id='coin-slider'>
	<?php
     foreach (consulta("select imagem_".$lang." , link_".$lang." , title_".$lang.", target_".$lang." from banners WHERE ativo = 1 AND ".$lang." = 1 AND id_tipo = 5 ORDER BY id DESC") as $banners){
	$imagem = $banners['imagem_'.$lang]; 
	$link = $banners['link_'.$lang]; 
	$title = $banners['title_'.$lang];
	$target = $banners['target_'.$lang];
    echo '<a title="'.$title.'" href="'.$link.'" title="notícias croydon" target="'.$target.'"><img src="'.$_SESSION['url'].'images/banners/'.$imagem.'" alt="'.$title.'" /></a>';
	}
	?>
</div>

<div id="banners_home">
	<?php
    foreach (consulta("select imagem_".$lang." , link_".$lang." , title_".$lang.", target_".$lang." from banners WHERE ativo = 1 AND ".$lang." = 1 AND id_tipo = 15") as $banners){
	$imagem = $banners['imagem_'.$lang]; 
	$link = $banners['link_'.$lang]; 
	$title = $banners['title_'.$lang];
	$target = $banners['target_'.$lang];
    echo '<a href="'.$link.'" title="'.$title.'" class="banner_noticias" target="'.$target.'">
        <img src="'.$_SESSION['url'].'images/banners/'.$imagem.'" alt="'.$titleo.'" />
    </a>';
	}
	foreach (consulta("select imagem_".$lang." , link_".$lang." , title_".$lang.", target_".$lang." from banners WHERE ativo = 1 AND ".$lang." = 1 AND id_tipo = 7") as $banners){
	$imagem = $banners['imagem_'.$lang]; 
	$link = $banners['link_'.$lang]; 
	$title = $banners['title_'.$lang];
	$target = $banners['target_'.$lang];
    echo '<a href="'.$link.'" class="banner_destaques" title="destaques croydon" target="'.$target.'">
        <img title="'.$title.'" src="'.$_SESSION['url'].'images/banners/'.$imagem.'" alt="'.$title.'" />
    </a>';
	}
	foreach (consulta("select imagem_".$lang." , link_".$lang." , title_".$lang.", target_".$lang." from banners WHERE ativo = 1 AND ".$lang." = 1 AND id_tipo = 9") as $banners){
	$imagem = $banners['imagem_'.$lang]; 
	$title = $banners['title_'.$lang];
	$link = $banners['link_'.$lang];
	$target = $banners['target_'.$lang];
    echo '<a href="'.$link.'" class="banner_bndes" title="'.$title.'" target="'.$target.'">
        <img title="'.$title.'" src="'.$_SESSION['url'].'images/banners/'.$imagem.'" alt="'.$title.'" />
    </a>';
	}
echo '</div>';
	?>
<div id="box_video">
	<p><?php echo $tit_videos;?></p> 
        <div style="margin: 10px 0 0 15px; float: left;">
        <?php
        foreach (consulta("SELECT url_".$lang." FROM videos WHERE ".$lang." = 1 ORDER BY id DESC LIMIT 1") as $videos){
                echo getVideo($videos['url_'.$lang],275,193);
	}
	?>
        </div>
    <a class="img_videos_<?php echo $lang;?>" href="<?php echo $_SESSION['url'].$lang;?>/videos">Assista todos os nossos vídeos</a>
</div>
