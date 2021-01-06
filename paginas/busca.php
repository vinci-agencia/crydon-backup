<?php
$busca = @$url3;

if ($lang == 'pt') {
    $bt_detalhes = 'Saiba Mais';
    $obs_foto = 'As fotos/desenhos s&atilde;o meras ilustra&ccedil;&otilde;es. Devido &agrave;s evolu&ccedil;&otilde;es tecnol&oacute;gicas, as informa&ccedil;&otilde;es poder&atilde;o ser alteradas sem aviso pr&eacute;vio.';
} else if ($lang == 'es') {
    $bt_detalhes = 'Sepa Mas';
    $obs_foto = 'Los retratos son s&oacute;lo ilustraci&oacute;n y los datos pueden camb&iacute;arse sin aviso previo.';
} else {
    $bt_detalhes = 'Know more';
    $obs_foto = 'The pictures are only an illustration and the data can be changed without previous notice.';
}

$pg = @$url4;
$numreg = 9; // 
if (!isset($pg)) {
    $pg = 0;
}
$inicial = $pg * $numreg;
$sql_conta = mysql_query("SELECT id FROM produtos WHERE nome_".$lang." LIKE '%".$busca."%' OR sigla LIKE '%".$busca."%' OR palavras_busca LIKE '%".$busca."%' AND ativo_inativo = 1 AND ".$lang." = 1");
$quantreg = mysql_num_rows($sql_conta);
?>
<div class="container" id="busca">
    <div class="box_titulo" id="titulo_produtos">
        <div class="box_titulo_texto">
            <h1>PRODUTOS</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <?php
            $sql = "SELECT nome_".$lang.",sigla,foto,id,marca FROM produtos WHERE nome_".$lang." LIKE '%".$busca."%' OR sigla LIKE '%".utf8_decode($busca)."%' OR palavras_busca LIKE '%".$busca."%' AND ativo_inativo = 1 AND ".$lang." = 1 ORDER BY id DESC LIMIT $inicial, $numreg";
            $quantidade = sizeof(consulta($sql));
            if ($quantidade > 0) {
                foreach (consulta($sql) as $produtos) {
                    $nome = $produtos["nome_" . $lang];
                    $id_produto = $produtos["id"];
                    $marca = $produtos["marca"];
                    
                    //exceção sigla em ingles
                    if ($id_produto == '146' and $lang == 'en') {
                        $codigo = 'ASSEMBLY';
                    } else if ($id_produto == '145' and $lang == 'en') {
                        $codigo = 'INFORMATION';
                    } else {
                        $codigo = $produtos["sigla"];
                    }

                    //exceção sigla em espanhol
                    if ($id_produto == '145' and $lang == 'es') {
                        $codigo = 'INFORMACIÓN';
                    }
                    if ($id_produto == '146' and $lang == 'es') {
                        $codigo = 'MONTAJES';
                    }

                    //exceção imagens em ingles
                    if ($id_produto == '124' and $lang == 'en') {
                        $foto = 'SACL-G-SACE-G-SACQ-G-en.jpg';
                    } else if ($id_produto == '84' and $lang == 'en') {
                        $foto = 'sacl-sace-sacq-en.jpg';
                    } else if ($id_produto == '83' and $lang == 'en') {
                        $foto = 'scgl-scge-en.jpg';
                    } else if ($id_produto == '85' and $lang == 'en') {
                        $foto = 'sadl-sade-sadq-en.jpg';
                    } else if ($id_produto == '125' and $lang == 'en') {
                        $foto = 'SADL-G-SADE-G-SADQ-G-en.jpg';
                    } else {
                        $foto = $produtos["foto"];
                    }
                    
                    $url_produto = $_SESSION['url'] . $lang . '/produto/' . $marca . '/' . $id_produto . '/' . coloca_traco(retira_acentos($produtos["nome_" . $lang]));
                    ?>
                    <div class="col-md-3">
                        <div class="box-produto-vitrine text-center">
                            <h3>
                                <a href="<?php echo $url_produto; ?>"><?php echo $codigo; ?></a>
                            </h3>
                            <a title="<?php echo $nome; ?>" href="<?php echo $url_produto; ?>">
                                <img src="<?php echo $_SESSION['url']; ?>images/produtos/<?php echo $foto; ?>" alt="<?php echo $nome; ?>" />
                            </a>
                            <h4>
                                <a href="<?php echo $url_produto; ?>"><?php echo $nome; ?></a>
                            </h4>
                            <a class="btn-detalhes" href="<?php echo $url_produto; ?>"><?php echo $bt_detalhes; ?></a>
                        </div>
                    </div>
                    <?php
                }
                
                echo '<div class="col-md-12">';
                include('inc/paginacao_busca.php');
                echo '</div>';
            } else {
                if ($lang == 'pt') {
                    echo '<div class="col-md-12"><p>Essa busca n&atilde;o possui produtos.</p></div>';
                } else if ($lang == 'es') {
                    echo '<div class="col-md-12"><p>Esta b&uacute;squeda no tiene productos.</p></div>';
                } else {
                    echo '<div class="col-md-12"><p>This search has no products.</p></div>';
                }
            }
            ?>
            <div>
                <div class="col-md-12">
                    <div class="box-observacao-vitrine"><?php echo $obs_foto; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
