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
    $sql = 'select * from autorizadas where tipo= 1 or tipo= 3 order by ordem';
    
    if(isset($url4)) {?>
        map.setZoom(7);
        <?php $sql = 'select * from autorizadas where (tipo= 1 or tipo= 3) and id_estado = '.$url4.' order by ordem';?>
    <?php } 
    
    if($_POST){
        $tipo = $_POST['tipo'];
        $local = strtolower($_POST['local']);
        $id_estado = $url4;
        $sql = "select * from autorizadas where (LOWER(endereco) LIKE '%".$local."%') and (tipo = ".$tipo." or tipo = 3) and id_estado = ".$url4." order by ordem";
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
<div class="container" id="autorizadas">
    <div class="box_titulo" id="titulo_assistenciatecnica">
        <div class="box_titulo_texto">
            <h1>ASSIST&Ecirc;NCIA T&Eacute;CNICA</h1>
        </div>
    </div>
    <div class="conteudo-pagina fundo-pag">
        <p>Saiba onde encontrar nossas assist&ecirc;ncias t&eacute;cnicas autorizadas pelo Brasil</p>
		
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <?php if(isset($url4)) :?>
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-11">
                            <input type="text" name="local" class="form-control" placeholder="Digite o local desejado(bairro, cidade ou estado)">
                        </div>						
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
						<br>
						<!--<a href="http://croydon.com.br/pt/conteudo/autorizadas-fornos-combinados/9" class="bt-pesquisar">Fornos Combinados</a>-->
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="1" checked> Equipamentos em Geral
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="2"> Fornos Combinados
                            </label>
                        </div>
                        <div class="col-md-1"></div>
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
                <?php foreach (consulta("select b.id, b.nome from autorizadas a inner join estados b on a.id_estado = b.id group by b.id") as $estados){ ?>
                    <div class="col-md-6">
                        <a class="link-estados <?php echo ($estados['id'] == @$url4 ? 'link-estados-selected' : ''); ?>" href="<?php echo $_SESSION['url'].$lang.'/conteudo/autorizadas/'.$estados['id'];?>">&raquo; <?php echo $estados['nome'];?></a>
                    </div>
                <?php }?>
            </div>
            <div class="col-md-7 col-sm-7">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>