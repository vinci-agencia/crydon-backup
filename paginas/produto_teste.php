<?php 
$sql = "SELECT * FROM produtos WHERE id = $url4";
$idCategoria = '';
$idSubCategoria = '';
foreach (consulta($sql) as $produto){
    $idCategoria = $produto['id_categoria'];
    $idSubCategoria = $produto['id_subcategoria'];
}

if($lang == 'pt'){
    $obs_foto = 'As fotos/desenhos s&atilde;o meras ilustra&ccedil;&otilde;es. Devido &agrave;s evolu&ccedil;&otilde;es tecnol&oacute;gicas, as informa&ccedil;&otilde;es poder&atilde;o ser alteradas sem aviso pr&eacute;vio.';
} else if($lang == 'es'){
    $obs_foto = 'Los retratos son s&oacute;lo ilustraci&oacute;n y los datos pueden camb&iacute;arse sin aviso previo.';
} else{
    $obs_foto = 'The pictures are only an illustration and the data can be changed without previous notice.';
}
?>
<div class="container" id="produto">
    <?php
    foreach (consulta("SELECT banner_".$lang.",nome_".$lang." FROM subcategorias WHERE ".$lang." = 1 AND id = '$idSubCategoria' LIMIT 1") as $banners){
        $banner = $banners['banner_'.$lang];
    }
    ?>
    <div class="box_titulo hidden-xs" <?php echo ($banner != "" ? "style='background-image: url(".$_SESSION['url']."images/banners/".$banner.")';" : ""); ?>>
        <?php if($banner == "") :?>
        <div class="box_titulo_texto">
            <h1>PRODUTOS</h1>
        </div>
        <?php endif;?>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-5" id="menu-vitrine">
                <?php include("inc/menu_direita.php");?>   
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7">
                <?php
//                foreach (consulta("SELECT banner_".$lang.",nome_".$lang." FROM subcategorias WHERE ".$lang." = 1 AND id = '$idSubCategoria' LIMIT 1") as $banners){
//                    $banner = $banners['banner_'.$lang];
//                    $nome = $banners['nome_'.$lang];
//                    if($banner != ""){
//                        echo '<div class="banner_vitrine"><img title="'.$nome.'" src="'.$_SESSION['url'].'images/banners/'.$banner.'" alt="'.$nome.'" /></div>';
//                    }
//                }
                ?>
                <?php
                foreach (consulta("select * from produtos WHERE id = '$url4'") as $produto){
                    $nome = $produto['nome_'.$lang];
                    $txt_manual_produto = strtolower($produto['descricao_manual_'.$lang]);

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
                    } else{
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
                    <h1 class="titulo-produto" id="titulo-produto-<?php echo $idCategoria;?>"><?php echo $sigla;?> - <?php echo $nome?></h1>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="box-img-produto">
                                <a class="btn-modal" title="<?php echo $sigla;?> - <?php echo $nome?>" href="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto_ampliada;?>">
                                    <img src="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto;?>" alt="<?php echo $nome;?>"/>
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <a  class="btn-manuais-produto" href="#box-manuais-produto" role="button" aria-controls="box-manuais-produto" aria-expanded="false" data-toggle="collapse"><?php echo $txt_manual_produto;?></a>
                                    <ul class="collapse" id="box-manuais-produto"> 
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
                                <?php if($lang == 'pt') {?>
                                <div class="col-md-6">
                                    <a class="btn-ondecomprar-produto" href="<?php echo $_SESSION['url'].$lang.'/onde-comprar';?>">Onde Comprar</a>
                                </div> 
                                <?php } ?>
                                                                
        
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $consulta_link = "SELECT link FROM produtos WHERE id = $url4";
                                    $exec_link = mysql_query($consulta_link) or die(mysql_error());
                                    $link = mysql_fetch_assoc($exec_link);
                                    ?>
                                        
                         
                                    <a target="_blank" class="produtos_yt" href="<?=$link['link']?> ">
                                        <img style="width: 22em; margin-top:20px;" src="/images/produtos_yb.png"></a> 
                                    <iframe width="560" height="315" src="<?=$link['link']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    
                           <?php
$seleciona = mysql_query("SELECT link FROM produtos WHERE id = $url4");
while($exibe = mysql_fetch_array($seleciona)){
$mostra = $exibe['link'];

echo "<iframe width=\"420\" height=\"315\" src=\"".$mostra."\" frameborder=\"0\" allowfullscreen>";
echo "</iframe>";
}
?>
                                    
                                </div>                                
                            </div>
                            <?php if($produto['descricao_comercial_'.$lang] != ""){?>
                            <div class="box-descricao-comercial">
                                <?php echo $produto['descricao_comercial_'.$lang]; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-7">
                            <?php if($produto['descricao_tecnica_'.$lang] != ""){?>
                            <div class="box-descricao-tecnica">
                                <h3>Dados T&eacute;cnicos</h3>
                                <p><?php echo $produto['descricao_tecnica_'.$lang]; ?></p>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box-observacao-vitrine"><?php echo $obs_foto;?></div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
    