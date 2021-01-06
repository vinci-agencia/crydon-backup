<script type="text/javascript">
    $(function() {
        $('.bt-saibamais').on("click", function(e) {
            e.preventDefault();
            var lang = $(this).attr('lang');
            $('.empresa-hidden-'+lang).show();
            $(this).hide();
        });
    });
</script> 
<div class="container" id="home">
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php 
            $x = 0;
            foreach (consulta("select imagem_" . $lang . " , link_" . $lang . " , title_" . $lang . ", target_" . $lang . " from banners WHERE ativo = 1 AND " . $lang . " = 1 AND id_tipo = 5 ORDER BY id DESC") as $banners) {
            ?>
                <li data-target="#carousel" data-slide-to="<?php echo $x ?>" <?php echo ($x == 0 ? 'class="active"' : '');?>></li>
            <?php 
                $x++;
            } 
            ?>
        </ol>

        <div class="carousel-inner" role="listbox">
            <?php 
            $x = 0;
            foreach (consulta("select imagem_" . $lang . " , link_" . $lang . " , title_" . $lang . ", target_" . $lang . " from banners WHERE ativo = 1 AND " . $lang . " = 1 AND id_tipo = 5 ORDER BY id DESC") as $banners) {
                $imagem = $banners['imagem_' . $lang];
                $link = $banners['link_' . $lang];
                $title = $banners['title_' . $lang];
                $target = $banners['target_' . $lang];
            ?>
                <div class="item <?php echo ($x == 0 ? 'active' : '');?>">
                    <a href="<?php echo  $link;?>" title="<?php echo  $title;?>" target="<?php echo  $target;?>">
                        <img src="<?php echo $_SESSION['url'] . 'images/banners/' . $imagem;?>" alt="<?php echo  $title;?>">
                        <div class="carousel-caption hidden-xs">
                            <span><?php echo  $title;?></span>
                        </div>
                    </a>
                </div>
            <?php 
                $x++;
            } 
            ?>
        </div>
    </div>
    <div id="empresa">
        <div class="box-home1" id="box-home-empresa">
            <img class="seta" src="<?php echo $_SESSION['url'];?>images/seta_box_home1.png" />
            <div class="barra-top"></div>
            <h2 class="text-center">
                <?php if($lang == 'pt'){ ?>
                EMPRESA
                <?php } elseif ($lang == 'es') { ?>
                EMPRESA
                <?php } elseif ($lang == 'en') { ?>
                COMPANY
                <?php } ?>
            </h2>
            <div class="row">
                <div class="box-home-empresa-conteudo">
                    <div class="col-md-7">
                        <div class="box-texto-empresa">
                            <?php if($lang == 'pt'){ ?>
                                <p>A Croydon iniciou sua trajet&oacute;ria de Sucesso em 1962 em um galp&atilde;o de 500m2 em Bonsucesso - RJ com a linha de Refresqueiras. Foi ao longo dos anos  expandindo gradativamente suas linhas de produtos, assim como seu espa&ccedil;o f&iacute;sico e investindo em tecnologias de fabrica&ccedil;&atilde;o. Est&aacute; hoje sediada em um  Parque Industrial de 15.000m2 em Duque de Caxias - RJ contando com excelentes instala&ccedil;&otilde;es Industriais e Administrativas.</p>
                                <p>L&iacute;der do mercado Nacional e reconhecida Mundialmente, possui certifica&ccedil;&otilde;es dos mais rigorosos Laborat&oacute;rios Internacionais de Qualidade. Mais de 50% da  produ&ccedil;&atilde;o &eacute; Exportada para os 4 cantos do mundo. </p>
                                <div style="display: none;" class="empresa-hidden-pt">
                                    <p>Mant&eacute;m acima de tudo como Miss&atilde;o o compromisso assumido, desde a sua funda&ccedil;&atilde;o, com a  qualidade, durabilidade e robustez de seus produtos, utilizando  sempre mat&eacute;rias primas de 1&ordf; linha. O retrato da for&ccedil;a desses valores b&aacute;sicos, est&atilde;o em encontrar-se equipamentos em perfeito  funcionamento h&aacute; mais de  30 anos em diversos estabelecimentos.</p>
                                    <p>Com mais de 4 milh&otilde;es de equipamentos fabricados a Croydon participa de muitas outras hist&oacute;rias de Sucesso, onde se faz presente.</p>
                                </div>
                                <p><a class="bt-saibamais" lang="pt" href="javascript:void(0);">Saiba mais</a></p>
                             <?php } elseif ($lang == 'es') { ?>
                                <p>La empresa inici&oacute; su trayectoria de suceso en 1962 en un almac&eacute;n de 500 m2 en el barrio de Bonsucesso en Rio de Janeiro con una l&iacute;nea de refresqueras. Con el pasar de los a&ntilde;os expandi&oacute; gradualmente su l&iacute;nea de productos, invistiendo en tecnolog&iacute;a de fabricaci&oacute;n y espacio f&iacute;sico de la planta.</p>
                                <p>Lider en el mercado nacional, y reconocida mundialmente, poseyendo certificaciones de los m&aacute;s rigorosos laboratorios de calidad internacionales, com m&aacute;s de 50% de la producci&oacute;n exportada para los 4 cantos del globo.</p>
                                <div style="display: none;" class="empresa-hidden-es">
                                    <p>Tiene como misi&oacute;n desde su fundaci&oacute;n el compromiso con la calidad, durabilidad y robustez utilizando siempre materias primas de alta calidad. Esta forma de trabajo se traduce hoy en los m&aacute;s de 4 miliones de productos fabricados por Croydon, donde se pueden encontrar maquinas con m&aacute;s de 30 a&ntilde;os en perfecto funcionamiento.</p>
                                </div>
                                <p><a class="bt-saibamais" lang="es" href="javascript:void(0);">Sepa mas</a></p>
                            <?php } elseif ($lang == 'en') { ?>
                                <p>Croydon's success story began in 1962 in 500m2 warehouse in Bonsucesso, Rio de Janeiro, producing Juice Dispensers. Gradually we expanded our product line, as well as our phisycal space, and the same time investing in manufaturing technology. Nowadays we are located in a 15.000m2 Industrial Park in Duque de Caxias, Rio de Janeiro, where our modern plant and administrative offices are located.</p>
                                <p> Leader on the Brazilian market and well-know and respected worldwide. Croydons' products are superior quality and certified by International Quality Control Laboratories. More than 50% of Croydon's production is exported abroad.</p>
                                <div style="display: none;" class="empresa-hidden-en">
                                    <p> Croydon keeps, above all, as mission an assumed compromise, since the begining, with quality, durability and robustness of the products, using always the best raw materials. It is not rare to see Croydon's Equipments work perfectly, after 30 years in use, in some of our consumers.</p>
                                    <p> With more than 4 million products manufatured, Croydon takes party in many others success stories wherever is present.</p>
                                </div>
                                <p><a class="bt-saibamais" lang="en" href="javascript:void(0);">Know more</a></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-texto-empresa2">
                            <span class="col-md-1 col-sm-1 col-xs-1">&ldquo;</span>
                            <p class="col-md-10 col-sm-10 col-xs-10">
                                <?php if($lang == 'pt'){ ?>
                                Com mais de 4 milh&otilde;es de equipamentos fabricados a Croydon participa de muitas outras hist&oacute;rias de Sucesso, onde se faz presente.
                                <?php } elseif ($lang == 'es') { ?>
                                Esta forma de trabajo se traduce hoy en los m&aacute;s de 4 miliones de productos fabricados por Croydon, donde se pueden encontrar maquinas con m&aacute;s de 30 a&ntilde;os en perfecto funcionamiento.
                                <?php } elseif ($lang == 'en') { ?>
                                With more than 4 million products manufatured, Croydon takes party in many others success stories wherever is present.
                                <?php } ?>
                            </p>
                            <span class="col-md-1 col-sm-1 col-xs-1 aspas">&rdquo;</span>
                        </div>
                        <div class="box-botoes-empresa2">
                            <?php if($lang == 'pt'){ ?>
                            <a data-toggle="modal" data-target="#modal-comochegar" class="bt-comochegar" href="javascript:void(0);">Como Chegar</a>
                            <a data-toggle="modal" data-target="#modal-videoinstitucional" class="bt-videoinstitucional" href="javascript:void(0);">V\EDdeo Institucional</a>
                            <?php } elseif ($lang == 'es') { ?>
                            <a data-toggle="modal" data-target="#modal-comochegar" class="bt-comochegar" href="javascript:void(0);">Como llegar</a>
                            <a data-toggle="modal" data-target="#modal-videoinstitucional" class="bt-videoinstitucional" href="javascript:void(0);">Video Institucional</a>
                            <?php } elseif ($lang == 'en') { ?>
                            <a data-toggle="modal" data-target="#modal-comochegar" class="bt-comochegar" href="javascript:void(0);"> How To Get</a>
                            <a data-toggle="modal" data-target="#modal-videoinstitucional" class="bt-videoinstitucional" href="javascript:void(0);">Institutional video</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-home2" id="box-home-produtos">
        <img class="seta" src="<?php echo $_SESSION['url'];?>images/seta_box_home2.png" />
        <div class="barra-top"></div>
        <h2 class="text-center">
            <?php if($lang == 'pt'){ ?>
            PRODUTOS
            <?php } elseif ($lang == 'es') { ?>
            PRODUCTOS 
            <?php } elseif ($lang == 'en') { ?>
            PRODUCTS
            <?php } ?>
        </h2>
        <p class="text-center">
            <?php if($lang == 'pt'){ ?>
            Mais de 100 produtos para voc&ecirc;!
            <?php } elseif ($lang == 'es') { ?>
            M&aacute;s de 100 productos para usted. 
            <?php } elseif ($lang == 'en') { ?>
            More than 100 products for you.
            <?php } ?>
        </p>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <?php if($lang == 'pt'){ ?>
                    <div class="col-md-3 col-sm-3">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhafria.png" alt="Linha Fria" />
                        </a>
                        <span>Linha Fria</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Saiba mais</a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquenteeletrica.png" alt="Linha Quente El&eacute;trica" />
                        </a>
                        <span>Linha Quente El&eacute;trica</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Saiba mais</a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquentegas.png" alt="Linha Quente G&aacute;s" />
                        </a>
                        <span>Linha Quente G&aacute;s</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Saiba mais</a>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_fornoscombinados.png" alt="Fornos Combinados" />
                        </a>
                        <span>Fornos Combinados</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Saiba mais</a>
                    </div>
                <?php } elseif ($lang == 'es') { ?>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhafria.png" alt="L&iacute;nea Fria" />
                        </a>
                        <span>L&iacute;nea Fria</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Sepa mas</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquenteeletrica.png" alt="L&iacute;nea Caliente - El&eacute;ctrica" />
                        </a>
                        <span>L&iacute;nea Caliente - El&eacute;ctrica</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Sepa mas</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquentegas.png" alt="L\EDnea Caliente - Gas" />
                        </a>
                        <span>L&iacute;nea Caliente - Gas</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Sepa mas</a>
                    </div>
                <?php } elseif ($lang == 'en') { ?>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhafria.png" alt="Beverage & Food Preparation Equipament" />
                        </a>
                        <span>Beverage & Food Preparation Equipament</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Know more</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquenteeletrica.png" alt="Electric Cooking Equipment" />
                        </a>
                        <span>Electric Cooking Equipment</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Know more</a>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <a class="bt-home-linha" href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">
                            <img src="<?php echo $_SESSION['url'];?>images/icone_linhaquentegas.png" alt="Gas Cooking Equipment" />
                        </a>
                        <span>Gas Cooking Equipment</span>
                        <a href="<?php echo $_SESSION['url'].$lang.'/vitrines/croydon';?>">Know more</a>
                    </div>
                <?php } ?>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <?php if($lang == 'pt'){ ?>
    <div class="box-home1" id="box-home-ondecomprar">
        <img class="seta" src="<?php echo $_SESSION['url'];?>images/seta_box_home1.png" />
        <div class="barra-top"></div>
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <img src="<?php echo $_SESSION['url'];?>images/mapa_home.png" alt="Onde Comprar" />
            </div>
            <div class="col-md-7 col-sm-7">
                <h2>ONDE COMPRAR</h2>
                <p>Saiba onde encontrar nossos</p>
                <p>revendedores e representantes pelo Brasil</p>
				 
				 <div class="obs" style="margin-top:20px;">
                    <span style="size:12px; color:red;"> *ATEN&Ccedil;&Atilde;O! </span><span style="size:12px;text-align: justify;">Os Revendedores relacionados abaixo s&atilde;o empresas INDEPENDENTES que revendem nossos produtos. A CROYDON N&Atilde;O SE RESPONSABILIZA pelas negocia&ccedil;&otilde;es feitas entre o revendedor e o cliente final, nem pelo prazo de entrega acertado entre as partes.</span>
                </div>
                <div class="box-btn-ondecompra row">
                    <div class="col-md-5 col-sm-6 col-xs-8">
                        <a class="btn-revendedores" href="<?php echo $_SESSION['url'].$lang.'/conteudo/revendedores';?>" title="Revendedores">Revendedores</a>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-8">
                        <a class="btn-representantes" href="<?php echo $_SESSION['url'].$lang.'/conteudo/representantes';?>" title="Representantes">Representantes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<div class="modal fade" id="modal-comochegar" tabindex="-1" role="dialog" aria-labelledby="modal-comochegar">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Como Chegar</h4>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14726.425910423148!2d-43.30361883264574!3d-22.668456335108093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x99724dcf7033cf%3A0xb2e7a1eddcbff501!2sEstr.+S%C3%A3o+Louren%C3%A7o%2C+891+-+Figueira%2C+Duque+de+Caxias+-+RJ!5e0!3m2!1spt-BR!2sbr!4v1477615652009" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-videoinstitucional" tabindex="-1" role="dialog" aria-labelledby="modal-videoinstitucional">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">V\EDdeo Institucional</h4>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <?php
                    foreach (consulta("SELECT url_".$lang." FROM videos WHERE ".$lang." = 1 ORDER BY id DESC LIMIT 1") as $videos){
                        echo getVideo($videos['url_'.$lang],275,193);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
