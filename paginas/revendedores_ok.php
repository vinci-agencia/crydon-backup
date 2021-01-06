
<script type="text/javascript">
function initMap() {    
    var myLatLng = {
        lat : -22.7461201,
        lng : -43.1016081
    };

    var geocoder = new google.maps.Geocoder();
    var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 4,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    
    var infowindow = new google.maps.InfoWindow();
    var address = [];
    var nomes = [];
    var telefones = [];
    var emails = [];
    var contatos = [];
    var celulares = [];
    
    <?php 
    $sql = 'select * from onde_comprar where id_tipo = 2 order by ordem';
    
    if(isset($url4)) {?>
        map.setZoom(7);
        <?php $sql = 'select * from onde_comprar where id_tipo = 2 and id_estado = '.$url4.' order by ordem';?>
    <?php }
    
    if($_POST){
        $local = strtolower($_POST['local']);
        $id_estado = $url4;
        $sql = "select * from onde_comprar where id_estado = ".$id_estado." and id_tipo = 2 and (LOWER(endereco) LIKE '%".$local."%' ) order by ordem";
    } 
    
    foreach (consulta($sql) as $representantes){ 
        $address = trim(addslashes(strip_tags(str_replace('<br />', ' ', $representantes['endereco']))));
        $address = preg_replace( "/\r|\n/", "", $address );
    ?>
        var add = '<?php echo $address;?>';
        var nome = '<?php echo trim(addslashes(strip_tags($representantes['nome'])));?>';
        var telefone = '<?php echo trim(addslashes(strip_tags($representantes['telefone'])));?>';
        var email = '<?php echo trim(addslashes(strip_tags($representantes['email'])));?>';
        var contato = '<?php echo trim(addslashes(strip_tags($representantes['contato'])));?>';
        var celular = '<?php echo trim(addslashes(strip_tags($representantes['cel'])));?>';
        
        address.push(add);
        nomes.push(nome);
        telefones.push(telefone);
        emails.push(email);
        contatos.push(contato);
        celulares.push(celular);
    <?php } ?>
    for (var i = 0; i < address.length; i++) {
        Geocode(address[i], nomes[i], telefones[i], emails[i], contatos[i], celulares[i], i);
    }
    
    function Geocode(address, nome, telefone, email, contato, celular, indice) {
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                var result = results[0].geometry.location;
                var marker = new google.maps.Marker({
                    position: result,
                    map: map,
                    icon: "<?php echo $_SESSION['url'];?>images/pin.png"
                });
                
                if(indice == 0){
                    map.setCenter(result);
                }
                
                var html = "<div class='boxInfoMap'>";
                html += "<p><b>"+nome+"</b></p><p>"+address+"</p><p>Telefone: "+telefone+"</p><p>E-mail: "+email+"</p>";
                if(celular != ""){
                    html += "<p>Celular: "+celular+"</p>";
                }
                if(contato != ""){
                    html += "<p>Contato: "+contato+"</p>";
                }
                html += "</div>";
                
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.close();
                        infowindow.setContent(html);
                        infowindow.open(map, marker);
                    }
                })(marker));
            } else if (status === google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {    
                setTimeout(function() {
                    Geocode(address, nome, telefone, email, contato, celular, indice);
                }, 100);
            } else {
                console.log("Geocode was not successful for the following reason:" + status);
            }
        });
    }
}


</script>
<div class="container" id="revendedores">
    <div class="box_titulo" id="titulo_ondecomprar">
        <div class="box_titulo_texto">
            <h1>ONDE COMPRAR</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <p>Conhe&ccedil;a nossos revendedores no Brasil</p>
                <?php if(isset($url4)) :?>
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-11">
                            <input type="text" required name="local" class="form-control" placeholder="Digite o local desejado(bairro, cidade ou estado)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="submit" value="Pesquisar" class="bt-pesquisar" />
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </form>
                <?php endif ?>
                <?php foreach (consulta("select b.id, b.nome from onde_comprar a inner join estados b on a.id_estado = b.id group by b.id") as $estados){ ?>
                    <div class="col-md-6">
                        <a class="link-estados <?php echo ($estados['id'] == @$url4 ? 'link-estados-selected' : ''); ?>" href="<?php echo $_SESSION['url'].$lang.'/conteudo/revendedores/'.$estados['id'];?>">&raquo; <?php echo $estados['nome'];?></a>
                    </div>
                <?php }?>
            </div>
            <div class="col-md-7 col-sm-7">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>