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
    $sql = 'select * from autorizadas where tipo= 2 or tipo= 3 order by nome';
    
    if(isset($url4)) {?>
        map.setZoom(7);
        <?php $sql = 'select * from autorizadas where (tipo= 2 or tipo= 3) and id_estado = '.$url4.' order by nome';?>
    <?php } 
    
    if($_POST){
        $tipo = $_POST['tipo'];
        $local = strtolower($_POST['local']);
        $id_estado = $url4;
        $sql = "select * from autorizadas where (LOWER(endereco) LIKE '%".$local."%') and (tipo = ".$tipo." or tipo = 3) and id_estado = ".$url4." order by nome";
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
<?php
if($lang == 'pt'){
	$name_pag1 = 'Assist�ncia t�cnica';
	$name_pag = 'Autorizadas';
	$txt = 'Saiba onde encontrar nossas assist�ncias t�cnicas autorizadas dos Fornos Combinados pelo Brasil';
	$nao_existe = 'Selecione, no menu ao lado, o  estado que deseja.';
	$sem_resultados = 'Nenhum Resultado Foi Encontrado.';
}
else if($lang == 'es'){
	$name_pag1 = 'Assist�ncia t�cnica';
	$name_pag = 'Autorizado';
	$txt = 'Sepa d�nde encontrar nuestro centro de servicio autorizado por el Brasil';
	$nao_existe = 'Seleccione el men� al lado del estado que se desea.';
	$sem_resultados = 'No se encontraron resultados.';
}
else{
	$name_pag1 = 'Technical Assistance';
	$name_pag = 'Authorized';
	$txt = 'Know where to find our service center authorized by Brazil';
	$nao_existe = 'Select from the menu next to the state you want.';
	$sem_resultados = 'No results were found.';
}
?>
<div class="breadcrumb_internas">
	
</div>
<div class="container" id="autorizadas">
<div class="conteudo-pagina fundo-pag">
	<div class="row">
           <div class="col-md-12 col-sm-12">
			<?php 
			if(isset($url4)){ ?>


			

			<?php }?>
			<p class="texto_internas"><?php echo $txt;?></p>
		   </div>
	</div>
	
		
	</div>
	<div class="row">
           <div class="col-md-5 col-sm-5">
		   
			
			<ul class="estados">
				<?php
				 foreach (consulta("select nome,id from estados ORDER BY nome ASC") as $estados){
					 $nome_estado = $estados['nome'];
					 $id_estado = $estados['id'];
					 
					 $quant = sizeof(consulta("select id from autorizadas where id_estado = '$id_estado'"));
					 
					 if($id_estado == $url4){
						$classe = 'selecionado';
					 }
					 else{
						$classe = '';
					 }
					 
					 if($quant > 0){
				?>
				<div class="col-md-6">
                        <a class="link-estados <?php echo ($estados['id'] == @$url4 ? 'link-estados-selected' : ''); ?>" href="<?php echo $_SESSION['url'].$lang.'/conteudo/autorizadas-fornos-combinados/'.$estados['id'];?>">&raquo; <?php echo $estados['nome'];?></a>
                    </div>
				<?php
					}
				 }
				 ?>
			</ul>
			<?php
				if(isset($url4)){
					$idEstado = $url4;
							foreach (consulta("select nome from estados where id = '".$idEstado."'") as $e){
								foreach (consulta("select sigla from estados2 where nome = '".$e['nome']."'") as $es){
									$sigla = $es['sigla'];
								}
							}
				}
				else{
					$mapa = 'mapa_vazio.png';
				}
				foreach (consulta("select imagem from estados where id = '$idEstado'") as $estados){
					$mapa = $estados['imagem'];
				}
			?>
			</div>
			
			<div class="col-md-7 col-sm-7">
				<div class="col-md-2 col-sm-2">
				</div>
               <div class="col-md-10 col-sm-10">
				<div id="map" style="height: 350px;" >
				</div>
				</div>
            
						<!--	<img class="img_mapa" src="<?php echo $_SESSION['url'];?>images/mapas/<?php echo $mapa;?>" alt="mapa" style="float:right;" /> -->
			<?php
				 if($idEstado == 1 or $idEstado == 2 or $idEstado == 3 or $idEstado == 21 or $idEstado == 22 or $idEstado == 14){
					$classe = 'norte';
				 }
				 else if($idEstado == 4 or $idEstado == 5 or $idEstado == 9 or $idEstado == 10 or $idEstado == 15 or $idEstado == 16 or $idEstado == 17 or $idEstado == 20 or $idEstado == 25){
					$classe = 'nordeste';
				 }
				 else if($idEstado == 8 or $idEstado == 11 or $idEstado == 12 or $idEstado == 27){
					$classe = 'centrooeste';
				 }
				 else if($idEstado == 7 or $idEstado == 13 or $idEstado == 18 or $idEstado == 24){
					$classe = 'sudeste';
				 }
				 else if($idEstado == 6 or $idEstado == 19 or $idEstado == 23){
					$classe = 'sul';
				 }
				 else{
					$classe = '';
				 }
				 
					 if($_POST){
						$sql = "select * from autorizadas where endereco LIKE '%".$_POST['buscaC']."%' and id_estado = '$idEstado' and (tipo= 2 or tipo= 3) order by endereco ASC";   
					 }
					 else{
						$sql = "select * from autorizadas where id_estado = '$idEstado' and (tipo= 2 or tipo= 3) order by nome";
					 }
					 
				 $quantidade = sizeof(consulta($sql));
				 
				 if(isset($url4)){
				 
					 if($quantidade > 0){
					 ?>
			</div>
	</div>
		   

   <br><br>
		 <div id="coluna_direita_informacoes">
		 <?php
			 foreach (consulta($sql) as $representantes){
				 $nome = $representantes['nome'];
				 $endereco = $representantes['endereco'];
				 $cep = $representantes['cep'];
				 $telefone = $representantes['telefone'];
				 $cel = $representantes['cel'];
				 $fax = $representantes['fax'];
				 $contato = $representantes['contato'];
				 $email = $representantes['email'];
				 $msn = $representantes['msn'];
				 $skype = $representantes['skype'];
		?>
			
				
           
             <div class="col-md-4">
				<div class="box-lista-assist" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?> assist-forno"><?php echo $nome?></h3>
				<ul class="fonte_assist2">
					<li class="assist-forno2"><?php echo $endereco.' - '.$sigla;?></li>
					<?php
					if($cep != ""){
					 echo '<li class="assist-forno2">CEP: '.$cep.'</li>';
					}
					?>
				
					<?php
					if($cel != ''){
						$cel = ' / '.$cel;
					}else{
						$cel = '';
					}
					if($telefone != ""){
					echo '<li class="assist-forno2">Telefone: '.$telefone.$cel.'</li>';
					}
					if($fax != ''){
					echo '<li class="assist-forno2">Fax: '.$fax.'</li>';
					}
					?>
			
					<?php
					if($contato != ""){
					 echo '<li class="assist-forno2">Contato: '.$contato.'</li>';
					}
					if($email != ""){
					 echo '<li class="assist-forno2">E-mail: <a class="assist-forno2" href="mailto:'.$email.'">'.$email.'</a></li>';
					}
					if($msn != ""){
					 echo '<li class="assist-forno2">MSN: '.$msn.'</li>';
					}
					if($skype != ""){
					 echo '<li class="assist-forno2">Skype: '.$skype.'</li>';
					}
					?>
				</ul>
			</div>
				</div>
				
			
			
		<?php
				}
			}
			else{
				?>

                <div class="box_informacoes" id="box_infos_<?php echo $classe;?>" style="float:right;">
				<h3 class="<?php echo $classe;?>">Em Breve</h3>
				<ul>
					<li>Teremos uma Assist�ncia t�cnica dispon�vel para esta �rea.</li>
					
				</ul>
				
			</div>
            <?php
			}
		 ?>
		 </div>
		 <?php
     }
	 else{
		 echo '<p class="no_exist">'.$nao_existe.'</p>';
	 }
	?>
	</div>
	<div class="margem">
				</div>
	</div>