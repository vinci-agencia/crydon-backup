<div id="banners_marcas">
	<?php
	if($lang != 'es'){
		foreach (consulta("SELECT imagem_".$lang.",title_".$lang." FROM banners WHERE ativo = 1 AND id_tipo = 13") as $banners){
		$banner =  $banners['imagem_'.$lang];
		$title =  $banners['title_'.$lang];
		?>
		<a title="<?php echo $title;?>" href="<?php echo $_SESSION['url'].$lang;?>/manual/croydon" class="bannerCroydon"><img src="<?php echo $_SESSION['url'];?>images/banners/<?php echo $banner;?>" alt="<?php echo $title;?>" /></a>
		<?php
		}
		foreach (consulta("SELECT imagem_".$lang.",title_".$lang." FROM banners WHERE ativo = 1 AND id_tipo = 14") as $banners){
		$banner =  $banners['imagem_'.$lang];
		$title =  $banners['title_'.$lang];
		?>
		<a title="<?php echo $title;?>" href="<?php echo $_SESSION['url'].$lang;?>/manual/ideali" class="bannerIdeali"><img src="<?php echo $_SESSION['url'];?>images/banners/<?php echo $banner;?>" alt="<?php echo $title;?>" /></a>
		<?php
		}
	}
	else{
		echo '<p>Pronto esta página estará disponible</p>
			  <p>De momento solicite aquí el manual que necesitas</p>
		      <p><a href="mailto:exportacao@croydon.com.br">exportacao@croydon.com.br</a></p>';
	}
	?> 
</div>