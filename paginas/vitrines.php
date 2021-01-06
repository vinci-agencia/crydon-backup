<?php if(isset($url4)){ ?>
<script type="text/javascript">
    $(function() {
        location.hash = 'produtos-vitrine';
    });
</script> 
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-18535728-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-18535728-1');
</script>

<?php } ?>
<?php	
    if($lang == 'pt'){
        $bt_detalhes = 'Saiba Mais';
        $obs_foto = 'As fotos/desenhos s&atilde;o meras ilustra&ccedil;&otilde;es. Devido &agrave;s evolu&ccedil;&otilde;es tecnol&oacute;gicas, as informa&ccedil;&otilde;es poder&atilde;o ser alteradas sem aviso pr&eacute;vio.';
        $tit = 'PRODUTOS';
    } else if($lang == 'es'){
        $bt_detalhes = 'Sepa Mas';
        $obs_foto = 'Los retratos son s&oacute;lo ilustraci&oacute;n y los datos pueden camb&iacute;arse sin aviso previo.';
        $tit = 'PRODUCTOS';
    } else{
        $bt_detalhes = 'Know more';
        $obs_foto = 'The pictures are only an illustration and the data can be changed without previous notice.';
        $tit = 'PRODUCTS';
    }
    
    $pg = @$url8;
    $numreg = 9; 
    
    if (!isset($pg)) {
        $pg = 0;
    }
    
    $inicial = $pg * $numreg;
    $sql_conta = mysql_query("SELECT id FROM produtos WHERE ativo_inativo = 1 AND id_subcategoria = '$url6' AND marca = '$url3' AND ".$lang." = 1");
    $quantreg = mysql_num_rows($sql_conta);
?>
<div class="container" id="produtos">
    <?php  if(!isset($url4)): ?>
    <div class="box_titulo" id="titulo_produtos">
        <div class="box_titulo_texto">
            <h1><?php echo $tit;?></h1>
			
			   
    <a href="http://croydon.com.br/uploads/index.php?tipo=download&arq=878287&ext=pdf" class="cat_virtual" download style="float: right;"> 
  <img src = "../../images/cat_prod.png">
</a>
  
        </div>
    </div>
    <?php else: 
    foreach (consulta("SELECT banner_".$lang.",nome_".$lang." FROM subcategorias WHERE ".$lang." = 1 AND id = '$url6' LIMIT 1") as $banners){
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
    <?php endif ?>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-5" id="menu-vitrine">
                <?php 
                $idCategoria = "";
                if(isset($url4)){
                    $idCategoria = $url4;
                }

                $idSubCategoria = "";
                if(isset($url6)){
                    $idSubCategoria = $url6;
                }
                include("inc/menu_direita.php");
                ?>   
            </div>
            <div class="col-lg-9 col-md-8 col-sm-7">
                <?php
//                if(!isset($url4)){
//                    if($url3 == 'croydon'){
//                        $sql_banner = "SELECT * FROM banners WHERE id_tipo = 1 AND ativo = 1 ORDER BY id DESC LIMIT 1";
//                    } else{
//                        $sql_banner = "SELECT * FROM banners WHERE id_tipo = 2 AND ativo = 1 ORDER BY id DESC LIMIT 1";
//                    }
//                    foreach (consulta($sql_banner) as $banners){
//                        $banner = $banners['imagem_'.$lang];
//                        $title = $banners['title_'.$lang];
//
//                        if($banner != ""){
//                            echo '<div class="banner_vitrine"><img title="'.$title.'" src="'.$_SESSION['url'].'images/banners/'.$banner.'" alt="'.$url3.'" /></div>';
//                        }
//                    }
//                } else {
//                    foreach (consulta("SELECT banner_".$lang.",nome_".$lang." FROM subcategorias WHERE ".$lang." = 1 AND id = '$url6' LIMIT 1") as $banners){
//                        $banner = $banners['banner_'.$lang];
//                        $nome = $banners['nome_'.$lang];
//                        if($banner != ""){
//                            echo '<div class="banner_vitrine"><img title="'.$nome.'" src="'.$_SESSION['url'].'images/banners/'.$banner.'" alt="'.$nome.'" /></div>';
//                        }
//                    }
//                }
                ?>
                
                <div class="produtos-vitrine" id="produtos-vitrine">
                    <div class="row">
                        <?php
                        if(!isset($url6)){
                            $sql = "SELECT nome_".$lang.",sigla,foto,id,id_subcategoria FROM produtos WHERE ativo_inativo = 1 AND vitrine_".$lang." = 1 AND marca = '$url3' AND ".$lang." = 1 ORDER BY ordem_vitrine_".$lang." LIMIT 9";
                        }
                        else{
                            $sql = "SELECT nome_".$lang.",sigla,foto,id FROM produtos WHERE ativo_inativo = 1 AND id_subcategoria = '$url6' AND marca = '$url3' AND ".$lang." = 1 ORDER BY ordem ASC LIMIT $inicial, $numreg";
                        }

                        $quantidade = sizeof(consulta($sql));
                        if($quantidade > 0){
                            foreach (consulta($sql) as $produtos) {
                                $nome = $produtos["nome_".$lang];
                                $id_produto = $produtos["id"];

                                //exceção sigla em ingles
                                if($id_produto == '146' and $lang == 'en'){
                                    $codigo = 'ASSEMBLY';
                                } else if($id_produto == '145' and $lang == 'en'){
                                    $codigo = 'INFORMATION';
                                } else{
                                    $codigo = $produtos["sigla"];
                                }

                                //exceção sigla em espanhol
                                if($id_produto == '145' and $lang == 'es'){
                                    $codigo = 'INFORMACIÓN';
                                }
                                if($id_produto == '146' and $lang == 'es'){
                                    $codigo = 'MONTAJES';
                                }

                                //exceção imagens em ingles
                                if($id_produto == '124' and $lang == 'en'){
                                    $foto = 'SACL-G-SACE-G-SACQ-G-en.jpg';
                                } else if($id_produto == '84' and $lang == 'en'){
                                    $foto = 'sacl-sace-sacq-en.jpg';
                                } else if($id_produto == '83' and $lang == 'en'){
                                    $foto = 'scgl-scge-en.jpg';
                                } else if($id_produto == '85' and $lang == 'en'){
                                    $foto = 'sadl-sade-sadq-en.jpg';
                                } else if($id_produto == '125' and $lang == 'en'){
                                    $foto = 'SADL-G-SADE-G-SADQ-G-en.jpg';
                                } else{
                                    $foto = $produtos["foto"];
                                }

                                if(!isset($url6)){
                                    $id_subcategoria = $produtos["id_subcategoria"];
                                    $nomeSubcat = mysql_fetch_array(mysql_query("SELECT nome_".$lang." FROM subcategorias WHERE id = '$id_subcategoria'"));
                                    $url7 =  $nomeSubcat['nome_'.$lang];
                                }

                                $url_produto = $_SESSION['url'].$lang.'/produto/'.$url3.'/'.$id_produto.'/'.$url7.'/'.coloca_traco(retira_acentos($produtos["nome_".$lang]));
                        ?>
                            <div class="col-md-4">
                                <div class="box-produto-vitrine text-center">
                                    <h3>
                                        <a href="<?php echo $url_produto;?>"><?php echo $codigo;?></a>
                                    </h3>
                                    <a title="<?php echo $nome;?>" href="<?php echo $url_produto;?>">
                                        <img src="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto;?>" alt="<?php echo $nome;?>" />
                                    </a>
                                    <h4>
                                        <a href="<?php echo $url_produto;?>"><?php echo $nome;?></a>
                                    </h4>
                                    <a class="btn-detalhes" href="<?php echo $url_produto;?>"><?php echo $bt_detalhes;?></a>
                                </div>
                            </div>
                        <?php
                            } 
                            if(isset($url6) && $numreg < $quantreg){
                                echo '<div class="col-md-12">';
                                include('inc/paginacao_vitrine.php');
                                echo '</div>';
                            }
                        } else{
                            if($lang == 'pt'){
                                echo '<div class="col-md-12"><p>Essa categoria n&atilde;o possui produtos.</p></div>';
                            }
                            else if($lang == 'es'){
                                echo '<div class="col-md-12"><p>Esta categor&iacute;a no tiene productos.</p></div>';
                            }
                            else{
                                echo '<div class="col-md-12"><p>This category has no products.</p></div>';
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box-observacao-vitrine"><?php echo $obs_foto;?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    