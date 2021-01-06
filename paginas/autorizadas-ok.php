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
    $sql = 'select * from autorizadas where tipo= 1 or tipo= 3 order by nome';
    
    if(isset($url4)) {?>
        map.setZoom(7);
        <?php $sql = 'select * from autorizadas where (tipo= 1 or tipo= 3) and id_estado = '.$url4.' order by nome';?>
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












<div class="container" id="autorizadas">
    <div class="box_titulo" id="titulo_assistenciatecnica">
        <div class="box_titulo_texto">
            <h1>ASSIST&Ecirc;NCIA T&Eacute;CNICA</h1>
        </div>
    </div>
    <div class="conteudo-pagina fundo-pag">
        <p>Saiba onde encontrar nossas assist&ecirc;ncias t&eacute;cnicas autorizadas pelo Brasil</p>
		
        
        		<div class="row"><br><br>
		<!-- PESQUISA -->	
<?php


//######### INICIO Paginação
	$pg = @$_GET['pg'];
	$numreg = 500;
	if (!isset($pg)) {
		$pg = 0;
		$get_pg = '';
	}
	else{
		$get_pg = 'pg='.$pg.'&';
	}	
	$inicial = $pg * $numreg;
//######### FIM dados Paginação

if(isset($_POST['busca'])){
	$nome_estado = $_POST['estado'];
	foreach(consulta("SELECT id FROM estados WHERE nome = '$nome_estado'") as $estado){
		$idestado = $estado['id'];
	}
	$busca = $_POST['busca'];	
	$sql = "SELECT nome,id_estado,endereco,id,ordem,telefone FROM autorizadas WHERE nome LIKE '%".$busca."%' AND id_estado = ".$idestado." ORDER BY ordem ASC LIMIT $inicial, $numreg";
	$sql_conta = mysql_query("SELECT id FROM autorizadas WHERE nome LIKE '%".$busca."%' AND id_estado = ".$idestado."");
}
else if(isset($_GET['idestado'])){
	$idestado = $_GET['idestado'];
	$busca = $_GET['busca'];	
	$sql = "SELECT nome,id_estado,endereco,id,ordem,telefone FROM autorizadas WHERE nome LIKE '%".$busca."%' AND id_estado = ".$idestado." ORDER BY ordem ASC LIMIT $inicial, $numreg";
	$sql_conta = mysql_query("SELECT id FROM autorizadas WHERE nome LIKE '%".$busca."%' AND id_estado = ".$idestado."");
}
else if(isset($_POST['buscaC'])){
	$id_est = @$_GET['id_est'];
        $sql = "select nome,id_estado,endereco,id,ordem,telefone from autorizadas where endereco LIKE '%".$_POST['buscaC']."%' order by endereco ASC LIMIT $inicial, $numreg";   
	$sql_conta = mysql_query("SELECT id FROM autorizadas where endereco LIKE '%".$_POST['buscaC']."%'");
}
else{
	$id_est = @$_GET['id_est'];
	$sql = "SELECT nome,id_estado,endereco,id,ordem,telefone FROM autorizadas WHERE id_estado = '$id_est' ORDER BY ordem ASC LIMIT $inicial, $numreg";
	$sql_conta = mysql_query("SELECT id FROM autorizadas WHERE id_estado = '$id_est'");
}

$quantreg = mysql_num_rows($sql_conta);

if(isset($_GET['ordem'])){
	$ordem = $_GET['ordem'];
    $id = $_GET['id'];
	if(isset($_GET['idestado'])){
		$est = $_GET['idestado'];
	}
	else{
		$est = $_GET['id_est'];
	}

	if($ordem == 'maior'){
		$res1 = mysql_fetch_array(mysql_query("SELECT ordem FROM autorizadas WHERE id = '$id'"));
		$ordem1 = $res1['ordem'];
		$ordem2 = $ordem1 - 1;
		$res2 = mysql_fetch_array(mysql_query("SELECT id FROM autorizadas WHERE ordem = '$ordem2' and id_estado = '$est'"));
		$id2 = $res2['id'];
		$sql1 = "UPDATE autorizadas SET ordem = '$ordem2' WHERE id = '$id' and id_estado = '$est'";
		$sql2 = "UPDATE autorizadas SET ordem = '$ordem1' WHERE id = '$id2' and id_estado = '$est'";
		mysql_query($sql1);
		mysql_query($sql2);
	}
	else{
		$res1 = mysql_fetch_array(mysql_query("SELECT ordem FROM autorizadas WHERE id = '$id'"));
		$ordem1 = $res1['ordem'];
		$ordem2 = $ordem1 + 1;
		$res2 = mysql_fetch_array(mysql_query("SELECT id FROM autorizadas WHERE ordem = '$ordem2' and id_estado = '$est'"));
		$id2 = $res2['id'];
		$sql1 = "UPDATE autorizadas SET ordem = '$ordem2' WHERE id = '$id' and id_estado = '$est'";
		$sql2 = "UPDATE autorizadas SET ordem = '$ordem1' WHERE id = '$id2' and id_estado = '$est'";
		mysql_query($sql1);
		mysql_query($sql2);
	}
	
        echo "<script>location.href = '".$_SESSION['url']."admin/autorizadas.php?id_est=".$_GET['id_est']."';</script>";
	 
}
else if(isset($_GET['valor'])){
    $id = $_GET['id'];
    $val = $_GET['valor'];
    $est = $_GET['idestado'];

    $res1 = mysql_fetch_array(mysql_query("SELECT ordem FROM autorizadas WHERE id = '$id' and id_estado = '$est'"));
    $sql1 = "UPDATE autorizadas SET ordem = '$val' WHERE id = '$id' and id_estado = '$est'";

    $res2 = mysql_fetch_array(mysql_query("SELECT ordem,id FROM autorizadas WHERE ordem = '".$val."' and id_estado = '".$est."'"));
    $sql2 = "UPDATE autorizadas SET ordem = '".$res1['ordem']."' WHERE id = '".$res2['id']."' and id_estado = '$est'";
    
    mysql_query($sql1);
    mysql_query($sql2);
}
?>
<div id="content">

<div class = "row">
<form action="" method="post">
    <div class="col-md-3">
	<input  class="form-control" type="text" name="buscaC" id="buscaA" value="" placeholder = "Digite um estado, cidade ou bairro" />
	</div>
	<div class="col-md-2">
    <button class="bt-pesquisar" type="submit" value="">Buscar</button>
	</div>
</form>
</div> 

  <?php
  if(isset($_POST['busca']) or isset($_GET['idestado'])){
  	echo '<p class="quant_resultados">Sua busca retornou em '.$quantreg.' resultado(s).</p>';
	
  }
  if(!isset($_POST['busca']) and !isset($_GET['idestado']) and !isset($_GET['id_est']) and !isset($_POST['buscaC']) ){
  echo '<p></p>';
  }
  else{
  ?>

<div class="container">
  <div class="row tit-lista">
    <div class="col-md-3">
      <h3>Estado</h3>
    </div>
    <div class="col-md-3">
        <h3>Nome</h3>
    </div>
    <div class="col-md-3">
      <h3>Endere&ccedil;o</h3>
    </div>
	    <div class="col-md-3">
      <h3>Telefone</h3>
    </div>
  </div>
  
   <?php
			$cor = "#eef3f6";
			$i = 0;
			foreach (consulta($sql) as $autorizadas){
				$i++;	
				$id = $autorizadas['id'];
				$ordem = "<span class='ordem'>".$autorizadas['ordem']."</span>";
				$id_estado = $autorizadas['id_estado'];
				$nome = $autorizadas['nome'];
				$endereco = $autorizadas['endereco'];
				$telefone = $autorizadas['telefone'];
				foreach(consulta("SELECT nome FROM estados WHERE id = '$id_estado'") as $estado){
					$estado = $estado['nome'];
					
				}
                if ($cor == "#ffffff"){
                   $cor = "#eef3f6";
				 }
                else{
                   $cor = "#ffffff";
			    }
				
				 $quant_regs = sizeof(consulta($sql));
				 
				if(isset($_GET['busca'])){
					$get_busca = 'busca='.$_GET['busca'].'&';
				} 
				else{
					$get_busca = '';
				}
								
				if(isset($_GET['idestado'])){
					$get_estado = 'idestado='.$_GET['idestado'];
				}
				else if(isset($_GET['id_est'])){
					$get_estado = 'id_est='.$_GET['id_est'];
				}
				else{
					$get_estado = 'id_est='.$idestado;
				}
				
				$url_menor = 'autorizadas.php?'.$get_pg.$get_busca.$get_estado.'&id='.$id.'&ordem=menor';
				$url_maior = 'autorizadas.php?'.$get_pg.$get_busca.$get_estado.'&id='.$id.'&ordem=maior';
				
				if($i == 1){
					$seta_ordem = "<p class='seta_ordem'><a href='".$url_menor."'><img src='imagem/seta_menos.png' alt='Diminuir Ordem' /></a></p>";
				}
				else if($i == $quant_regs){
					$seta_ordem = "<p class='seta_ordem'><a href='".$url_maior."'><img src='imagem/seta_mais.png' alt='Aumentar Ordem' /></a></p>";
				}
				else{
					$seta_ordem = "<p class='seta_ordem'><a href='".$url_maior."'><img src='imagem/seta_mais.png'                                   alt='Aumentar Ordem' /></a>
								  <a href='".$url_menor."'><img src='imagem/seta_menos.png'                                   alt='Diminuir Ordem' /></a></p>";
								  
				}
			?>
  
    <div class="row margem-lista">
    <div class="col-md-3">
      <td><?php echo $estado;?></td>
    </div>
    <div class="col-md-3">
      <td><?php echo $nome;?></td>
    </div>
    <div class="col-md-3">
      <td><?php echo $endereco;?></td>
    </div>
	<div class="col-md-3">
      <td>
<?php echo $telefone;?>
	  
	  </td>
    </div>
  </div>
  
  		<?php
			}
			?>
</div>


        <?php
		if(isset($_POST['busca']) or isset($_GET['idestado'])){ 
			echo "<div class='paginacao_estados'>";
			include("inc/paginacao_busca1.php");
			echo "</div>";
		}
		else{
			echo "<div class='paginacao_estados'>";
			include("inc/paginacao_estados.php");
			echo "</div>";
		}
	}
		?>       
</div>
</div>

<!-- PESQUISA -->	
        
        
        
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <?php if(isset($url4)) :?>
                <form method="POST">
                    <div class="row">
                        <div class="form-group col-md-11">
                          <!--  <input type="text" name="local" class="form-control" placeholder="Digite o local desejado(bairro, cidade ou estado)"> -->
                        </div>						
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
						<br>
						<!--<a href="http://croydon.com.br/pt/conteudo/autorizadas-fornos-combinados/9" class="bt-pesquisar">Fornos Combinados</a>-->
                        <!--    <label class="radio-inline">
                                <input type="radio" name="tipo" value="1" checked> Equipamentos em Geral
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="tipo" value="2"> Fornos Combinados
                            </label>-->
                        </div>
                        <div class="col-md-1"></div>
                        </div>
                    </div>
                  <!--  <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <input type="submit" value="Pesquisar" class="bt-pesquisar" />
							
                        </div>
                        <div class="col-md-2"></div>
                    </div> -->
					
                </form>
                <?php endif ?>
                <?php foreach (consulta("select b.id, b.nome from autorizadas a inner join estados b on a.id_estado = b.id group by b.id order by nome") as $estados){ ?>
                    <div class="col-md-6">
                        <a class="btn btn-success link-estados <?php echo ($estados['id'] == @$url4 ? 'link-estados-selected ' : ''); ?>" href="<?php echo $_SESSION['url'].$lang.'/conteudo/autorizadas/'.$estados['id'];?>"> <?php echo $estados['nome'];?></a>
                    </div>
                <?php }?>
            </div>
            <!--<div class="col-md-7 col-sm-7">
                <div id="map"></div>-->
			 <div class="col-md-6 col-sm-6">
                <img src="<?php echo $_SESSION['url'];?>images/mapa_ondecomprar.png" alt="Onde Comprar" />
            </div>
            </div>
			

		
			

                <div class="coluna_direita_informacoes">
            			<div class="fonte_assist2" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?>"><?php echo $nome?></h3>
				<ul class="fonte_assist2">
					<li class="fonte_assist2"><?php echo $endereco.' - '.$sigla;?></li>
					<?php
					if($cep != ""){
					 echo '<li class="fonte_assist2">CEP: '.$cep.'</li>';
					}
					?>
				</ul>
				<ul >
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
				</ul>
				<ul>
					<?php
					if($contato != ""){
					 echo '<li class="assist-forno2">Contato: '.$contato.'</li>';
					}
					if($email != ""){
					 echo '<li class="assist-forno2">E-mail: <a href="mailto:'.$email.'">'.$email.'</a></li>';
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
           </div>
            
            <div class="row">
            <?php
if($lang == 'pt'){
	$name_pag1 = 'Assistência técnica';
	$name_pag = 'Autorizadas';
	$txt = 'Saiba onde encontrar nossas assistências técnicas autorizadas dos Fornos Combinados pelo Brasil';
	$nao_existe = 'Selecione, no menu ao lado, o  estado que deseja.';
	$sem_resultados = 'Nenhum Resultado Foi Encontrado.';
}
else if($lang == 'es'){
	$name_pag1 = 'Assistência técnica';
	$name_pag = 'Autorizado';
	$txt = 'Sepa dónde encontrar nuestro centro de servicio autorizado por el Brasil';
	$nao_existe = 'Seleccione el menú al lado del estado que se desea.';
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

	<div class="row">
           <div class="col-md-12 col-sm-12">
<?php 
if(isset($url4)){ ?>




<?php }?>

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

				</div>
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
            $sql = "select * from autorizadas where endereco LIKE '%".$_POST['buscaC']."%' and id_estado = '$idEstado' and tipo = 1 or tipo = 3 order by endereco ASC";   
         }
         else{
            $sql = "select * from autorizadas where id_estado = '$idEstado' and tipo = 1 or tipo = 3 order by nome";
         }
         
     $quantidade = sizeof(consulta($sql));
	 
	 if(isset($url4)){
	 
		 if($quantidade > 0){
		 ?>
        </div>
	</div>
    
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
               <div class="coluna_direita_informacoes">
			<div class="box-lista-assist" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?> sudeste assist-forno" fonte_assist><?php echo $nome?></h3>
				<ul class="fonte_assist2">
					<li class="fonte_assist2"><?php echo $endereco.' - '.$sigla;?></li>
					<?php
					if($cep != ""){
					 echo '<li class="fonte_assist2">CEP: '.$cep.'</li>';
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
					 echo '<li class="assist-forno2">E-mail: <a href="mailto:'.$email.'">'.$email.'</a></li>';
					}
					if($msn != ""){
					 echo '<li class="assist-forno2">MSN: '.$msn.'</li>';
					}
					if($skype != ""){
					 echo '<li class="fonte_assist2">Skype: '.$skype.'</li>';
					}
					?>
				</ul>
               </div>
			</div>
    </div>
		<?php
				}
			}
			else{
				?>
                <div class="box-lista-assist" id="box_infos_<?php echo $classe;?>">
				<h3 class="<?php echo $classe;?>">Em Breve</h3>
				<ul>
					<li>Teremos uma Assistência técnica disponível para esta área.</li>
					
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
	</div>
	




	
	</DIV>
	</div>
                	<div class="margem">
				</div>
            </div>
        </div>
    
	</div>
</div>