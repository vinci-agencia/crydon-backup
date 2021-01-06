<?php
	include("inc/menu_direita.php");
	
	if($lang == 'pt'){
		$obs_foto = 'As fotos/desenhos são meras ilustrações. Devido às evoluções tecnológicas, as informações poderão ser alteradas sem aviso prévio.';
		$txt_ampliar_foto = 'CLIQUE NA FOTO PARA AMPLIAR';
	}
	else if($lang == 'es'){
		$obs_foto = 'Los retratos son sólo ilustración y los datos pueden cambíarse sin aviso previo.';
		$txt_ampliar_foto = 'CLICK EN LA FOTO PARA AMPLIAR';
	}
	else{
		$obs_foto = 'The pictures are only an illustration and the data can be changed without previous notice.';
		$txt_ampliar_foto = 'CLICK ON PHOTO TO ENLARGE';
	}
?>
<div id="conteudo_esquerda">
<style>
    .foto_produto_center img{
    padding-right: 10px !important;
    max-width: 290px !important;
    max-height: 310px !important;
}
    </style>
    <?php
	include("inc/breadcrumb.php");
	?>
    <div id="produtos_vitrine">
    	<div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
        	<?php
        	foreach (consulta("select * from produtos WHERE id = '$url4'") as $produto){
				$nome = $produto['nome_'.$lang];
                $txt_manual_produto = strtoupper($produto['descricao_manual_'.$lang]);
				
				//exceção sigla e foto ampliada				
				if($url4 != 145 and $url4 != 146){
				
					//exceção imagens em ingles
					if($url4 == '124' and $lang == 'en'){
						$foto = 'SACL-G-SACE-G-SACQ-G-en.jpg';
						$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					}
					else if($url4 == '84' and $lang == 'en'){
						$foto = 'sacl-sace-sacq-en.jpg';
						$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					}
					else if($url4 == '83' and $lang == 'en'){
						$foto = 'scgl-scge-en.jpg';
						$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					}
					else if($url4 == '85' and $lang == 'en'){
						$foto = 'sadl-sade-sadq-en.jpg';
						$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					}
					else if($url4 == '125' and $lang == 'en'){
						$foto = 'SADL-G-SADE-G-SADQ-G-en.jpg';
						$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					}
					else{
						$foto_ampliada  = $produto['foto'];
					}
					$sigla = $produto['sigla'];
				}
				else{
					if($url4 == 145){
						if($lang == 'pt'){
							$foto_ampliada = 'detalhes-croydon.jpg';
							$sigla = $produto['sigla'];
						}
						else if($lang == 'en'){
							$foto_ampliada = 'detalhes-croydon-en.jpg';
							$sigla = 'INFORMATION';
						}
						else{
							$foto_ampliada = 'detalhes-croydon.jpg';
							$sigla = 'INFORMACIÓN';
						}
					}
					if($url4 == 146){
						if($lang == 'pt'){
							$foto_ampliada  = 'montagem-fogoes-croydon.jpg';
							$sigla = $produto['sigla'];
						}
						else if($lang == 'en'){
							$foto_ampliada  = 'montagem-fogoes-croydon-en.jpg';
							$sigla = 'ASSEMBLY';
						}
						else{
							$foto_ampliada  = 'montagem-fogoes-croydon.jpg';
							$sigla = 'MONTAJES';
						}
					}
				}
				$foto = $produto['foto'];
				
				//exceção imagens em ingles
				if($url4 == '124' and $lang == 'en'){
					$foto = 'SACL-G-SACE-G-SACQ-G-en.jpg';
					$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
				}
				else if($url4 == '84' and $lang == 'en'){
					$foto = 'sacl-sace-sacq-en.jpg';
					$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
				}
				else if($url4 == '83' and $lang == 'en'){
					$foto = 'scgl-scge-en.jpg';
					$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
				}
				else if($url4 == '85' and $lang == 'en'){
					$foto = 'sadl-sade-sadq-en.jpg';
					$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
				}
				else if($url4 == '125' and $lang == 'en'){
					$foto = 'SADL-G-SADE-G-SADQ-G-en.jpg';
					$foto_ampliada = 'SACL-G-SACE-G-SACQ-G-en.jpg';
				}
				else{
					$foto = $produto["foto"];
				}

				$manuais = explode(',',$produto['manuais']);
				$quant_manuais =  sizeof($manuais);
				
			?>
        	<h1><?php echo $sigla;?> - <?php echo $nome?></h1>
            <div class="foto_produto">
            	<div class="foto_produto_top"></div>
                <div class="foto_produto_center">
                	<a class="lightbox" title="<?php echo $sigla;?> - <?php echo $nome?>" href="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto_ampliada;?>"><img src="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto;?>" alt="<?php echo $nome;?>"/></a>
                </div>
                <div class="foto_produto_bottom"></div>
                <?php if($url4 != 145 and $url4 != 146){
				$quant_manuais = sizeof(consulta("select titulo,manual from manuais_prod_".$lang." WHERE id_produto = '$url4'"));
				if($quant_manuais > 0){
				?>
                <div class="box_down_pdf">
                	<div class="box_down_pdf_top"></div>
                    <div class="box_down_pdf_center">
                        <a href="#" class="bt_open_manual" onclick="aparecer('lista_manuais_down')"><?php echo $txt_manual_produto;?></a>
                        <ul id="lista_manuais_down" style="display:none;">
                            <?php 
                            foreach (consulta("select titulo,manual from manuais_prod_".$lang." WHERE id_produto = '$url4'") as $manuais){
                                $titulo_manual = $manuais['titulo'];
                                $manual = $manuais['manual'];
                                $arquivo = (explode('.',$manual));
                                $arq = $arquivo[0];
                                $ext = $arquivo[1];
                            ?>
                                <li><a href="<?php echo $_SESSION['url'];?>uploads/index.php?tipo=manuais&arq=<?php echo $arq;?>&ext=<?php echo $ext;?>"><?php echo $titulo_manual;?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                     </div>
                    <div class="box_down_pdf_bottom"></div>
                </div>
                <?php
					}
				 }?>
                <div class="box_clique" <?php if($url4 == 146){echo 'id="montagem"';}?>>
                	<?php
					if($url4 == 145 and $lang == 'pt'){
						echo '<p>CLIQUE NA FOTO PARA VER OS DETALHES</p>';
					}else if($url4 == 146 and $lang == 'pt'){
						echo '<p>CLIQUE NA IMAGEM PARA VER AS MONTAGENS</p>';
					}
					else{
                	echo '<p>'.$txt_ampliar_foto.'</p>';
                    }?>
                </div>
            </div>
				<?php
                if($produto['descricao_tecnica_'.$lang] != ""){?>
                <div class="descricao_prod">
                    <div class="descricao_prod_top"></div>
                    <div class="descricao_prod_center">
                        <p><?php echo $produto['descricao_tecnica_'.$lang]?></p>
                    </div>
                    <div class="descricao_prod_bottom"></div>
                </div>
                <?php } if($produto['descricao_comercial_'.$lang] != ""){?>
                <div class="descricao_prod">
                    <div class="descricao_prod_top"></div>
                    <div class="descricao_prod_center">
                        <p><?php echo $produto['descricao_comercial_'.$lang]?></p>
                    </div>
                    <div class="descricao_prod_bottom"></div>
                </div>
                <?php
                }
			}
			?>
            <p class="observacao"><?php echo $obs_foto;?></p>
        </div>
        <div class="produtos_vitrine_bottom"></div>
    </div>
</div>
