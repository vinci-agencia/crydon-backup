        <div id="footer">
            <div class="container">
                <div class="col-md-3 box-footer">
                    <div class="box-endereco">
                        <a href="<?php echo $_SESSION['url'].$lang;?>/home">
                            <img src="<?php echo $_SESSION['url'];?>images/logo_nova_rodape.png" alt="Croydon" />
                        </a>
                        <p>Estrada S&atilde;o Louren&ccedil;o, 891</p>
                        <p>Capivari - Duque de Caxias</p>
                        <p>RJ- Brasil</p>
                        <p>CEP 25243-150</p>
                        <p>Fone: (55 21) 2777-8100</p>
                        <p>Fax: (55 21) 2777-8106</p>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1 box-footer">
                    <div class="col-md-12">
                        <div class="fb-page" data-href="https://www.facebook.com/croydonmaq/" data-tabs="timeline" data-height="215" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/croydonmaq/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/croydonmaq/">Croydon - Símbolo de Qualidade</a>
                            </blockquote>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box-youtube">
                            <div class="col-md-3">
                                <img src="<?php echo $_SESSION['url'];?>images/icone_youtube.png" alt="Youtube" />
                            </div>
                            <div class="col-md-9">
                                <span>Inscreva-se:</span>
                                <a href="http://youtube.com/mktcroydon" title="youtube" target="_BLANK">youtube.com/mktcroydon</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-md-offset-1 box-footer">
                    <?php foreach (consulta("select imagem_".$lang." , link_".$lang." , title_".$lang.", target_".$lang." from banners WHERE ativo = 1 AND ".$lang." = 1 AND id_tipo = 9") as $banners){
                        $imagem = $banners['imagem_'.$lang]; 
                        $title = $banners['title_'.$lang];
                        $link = $banners['link_'.$lang];
                        $target = $banners['target_'.$lang];
                    ?>
                    <a href="<?php echo $link ?>" class="banner_bndes" title="<?php echo $title ?>" target="<?php echo $target ?>">
                        <img src="<?php echo $_SESSION['url'].'images/banners/'.$imagem;?>" alt="<?php echo $title ?>" />
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
<!--
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcGm0J78XxtXkyuSHV_xfP0BwXjltd5s8&libraries=places&callback=initMap"></script>
      
Minha key
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCwKnuTeR78Sv4FJ3CQRYZ7ZFkFFxXPtns&libraries=places&callback=initMap"></script>
 -->        
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqYkfR-CxX6mWumU0avyw1vIDRifr89ww&libraries=places&callback=initMap"></script> 
    </body>
</html>