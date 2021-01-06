<div id="banners_marcas">
	<?php
	foreach (consulta("SELECT imagem_".$lang.",title_".$lang." FROM banners WHERE ativo = 1 AND id_tipo = 11") as $banners){
	$banner =  $banners['imagem_'.$lang];
	$title =  $banners['title_'.$lang];
	?>
    <a title="<?php echo $title;?>" href="<?php echo $_SESSION['url'].$lang;?>/vitrines/croydon" class="bannerCroydon"><img src="<?php echo $_SESSION['url'];?>images/banners/<?php echo $banner;?>" alt="<?php echo $title;?>" /></a>
    <?php
	}
	foreach (consulta("SELECT imagem_".$lang.",title_".$lang." FROM banners WHERE ativo = 1 AND id_tipo = 12") as $banners){
	$banner =  $banners['imagem_'.$lang];
	$title =  $banners['title_'.$lang];
	?>
    <a title="<?php echo $title;?>" href="<?php echo $_SESSION['url'].$lang;?>/vitrines/ideali" class="bannerIdeali"><img src="<?php echo $_SESSION['url'];?>images/banners/<?php echo $banner;?>" alt="<?php echo $title;?>" /></a>
    <?php
	}
	?> 
</div>