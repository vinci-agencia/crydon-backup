<?php
if($lang == 'pt'){
	$txt = 'Selecione o manual de acordo com a sigla que constar na etiqueta de seu equipamento.';
	$txt2 = 'Caso não encontre o manual desejado abaixo, solicite-o pelo e-mail - at@croydon.com.br';
	$name_pag = 'Manuais';
}
else if($lang == 'es'){
	$txt = 'Seleccione el manual de acuerdo a las cartas que aparecen en la etiqueta de su equipo.';
	$txt2 = 'In case desired manual not found, please request - exportacao@croydon.com.br';
	$name_pag = 'Repuestos';
}
else{
	$txt = 'Select the manual according to the code model that appear on the label of your equipment.';
	$txt2 = 'In case desired manual not found, please request - exportacao@croydon.com.br';
	$name_pag = 'Parts';
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
		if($lang == 'pt'){?>
			<span>Assistência Técnica</span>
			<img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
		<?php } ?>
        <a href="<?php echo $_SESSION['url'].$lang;?>/manuais"><?php echo $name_pag;?></a>
		<img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo strtoupper($url3);?></span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<p class="texto_internas2"><?php echo $txt2;?></p>
<?php
foreach (consulta("SELECT nome_".$lang.", id FROM categorias WHERE marca = '$url3' AND ".$lang." = 1 ORDER BY nome_".$lang." ASC") as $categorias){
	$idCat = $categorias['id'];
	$nomeCat = $categorias['nome_'.$lang];
	$total = sizeof(consulta("SELECT id FROM categorias WHERE marca = '$url3' AND ".$lang." = 1 ORDER BY id DESC"));
	
	$w++;
	
	$totalN[] = sizeof(consulta("SELECT id FROM subcategorias WHERE id_categoria = '$idCat' AND ".$lang." = 1"));
	$totalSub = array_sum($totalN);
	
?>
<div class="faq">
    <div id="produtos_vitrine_busca">
        <div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
        	<p class="tipo_down"><?php echo $nomeCat;?></p>
        	<ul id="lista_manuais" class="lista_manuais">
            	<?php
				foreach (consulta("SELECT nome_".$lang.", id FROM subcategorias WHERE ".$lang." = 1 AND id_categoria = '$idCat' ORDER BY nome_".$lang." ASC") as $subcategorias){
					$nomeSubcat = $subcategorias['nome_'.$lang];
					$idSubcat = $subcategorias['id'];
					$t++;
					
					$totalP[] = sizeof(consulta("SELECT id FROM produtos WHERE id_subcategoria = '$idSubcat' AND marca = '$url3' AND ".$lang." = 1"));
					$totalProd = array_sum($totalP);
				?>
            	<li class="prodSubs"><span></span><a href="#" onclick="ver_manual2('<?php echo $totalSub;?>','lista_manuais_prods<?php echo $t;?>')"><?php echo $nomeSubcat;?></a></li>
				
                <ul style="display:none;" id="lista_manuais_prods<?php echo $t;?>" class="lista_prods_manuais">
                	<?php	
				foreach (consulta("SELECT nome_".$lang.", sigla, id FROM produtos WHERE id_subcategoria = '$idSubcat' AND marca = '$url3' AND ".$lang." = 1 ORDER BY ordem ASC") as $produtos){
					$nomeProd = $produtos['nome_'.$lang];
					$siglaProd = $produtos['sigla'];
					$idProd = $produtos['id'];
					
					$q++;
				    ?>
                	<li id="li_prod_man<?php echo $q;?>"><a href="#" onclick="ver_manual3('<?php echo $totalProd;?>','lista_manuais_manual<?php echo $q;?>','li_prod_man<?php echo $q;?>')"><?php echo $nomeProd.' '.$siglaProd;?></a>
                    <ul class="lista_manuais_manual" id="lista_manuais_manual<?php echo $q;?>" style="display:none;">
                    	<?php
						foreach (consulta("SELECT titulo,manual FROM manuais_".$lang." WHERE id_produto = '$idProd'") as $manuais){
						$tituloManual = $manuais['titulo'];
						$arqManual = $manuais['manual'];
						$arquivo = explode('.',$arqManual);
						$arq = $arquivo[0];
						$ext = $arquivo[1];
				        ?>
                        	<li><a href="<?php echo $_SESSION['url'];?>/uploads/index.php?tipo=manuais&arq=<?php echo $arq;?>&ext=<?php echo $ext;?>"><?php echo $tituloManual;?></a></li>
                        <?php
						}
						?>
                    </ul>
                  </li>
                  <?php
				   }
				  ?>
                </ul>
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