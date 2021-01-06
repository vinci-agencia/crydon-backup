<?php
if($lang == 'pt'){
	$txt = 'Clique sobre as categorias abaixo e faça o seu download!';
	$titulo_login = 'LOGIN/CADASTRO';
}
else if($lang == 'es'){
	$txt = 'Haga clic en las categorías de abajo y descargarlos!';
	$titulo_login = 'LOGIN/REGISTRO';
}
else{
	$txt = 'Click on the categories below and download them!';
	$titulo_login = 'LOGIN/REGISTER';
}

?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Downloads</span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<?php
foreach (consulta("SELECT tipo_".$lang.", id FROM tipo_download ORDER BY id DESC") as $tipo_downloads){
	$tipo = $tipo_downloads['tipo_'.$lang];
	$id = $tipo_downloads['id'];
	$total = sizeof(consulta("SELECT id FROM tipo_download ORDER BY id DESC"));
	
	$w++;
?>
<div class="faq">
    <div id="produtos_vitrine_busca">
        <div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
        	<p class="tipo_down">
            <?php
			if($_SESSION['downAtivo'] == 'sim'){
			?>
            	<a href="#" onclick="ver_down('<?php echo $total;?>','lista_downloads<?php echo $w;?>')"><?php echo $tipo;?></a></p>
            <?php
			}
			else{
			?>
				<a href="<?php echo $_SESSION['url'].$lang;?>/login"><?php echo $tipo;?></a>
            <?php
			}
            ?>
        	<ul id="lista_downloads<?php echo $w;?>" style="display:none;" class="lista_downloads">
            	<?php
				foreach (consulta("SELECT titulo_".$lang.", arquivo_".$lang." FROM arquivos_downloads WHERE id_tipo = '$id' ORDER BY id DESC") as $downloads){
					$titulo = $downloads['titulo_'.$lang];
					$arquivo = $downloads['arquivo_'.$lang];
					
					$arquivo = (explode('.',$arquivo));
					$arq = $arquivo[0];
					$ext = $arquivo[1];
				?>
            	<li><a href="<?php echo $_SESSION['url'];?>/uploads/index.php?tipo=download&arq=<?php echo $arq;?>&ext=<?php echo $ext;?>"><?php echo $titulo;?></a></li>
				<?php
				}
				?>
            </ul>
        </div>
        <div class="produtos_vitrine_bottom"></div>
    </div>
</div>
<?php
}
?>