<?php
	include("inc/menu_direita.php");
	
	if($lang == 'pt'){
		$bt_detalhes = 'Mais detalhes';
		$obs_foto = 'As fotos/desenhos são meras ilustrações. Devido às evoluções tecnológicas, as informações poderão ser alteradas sem aviso prévio.';
	}
	else if($lang == 'es'){
		$bt_detalhes = 'Más detalles';
		$obs_foto = 'Los retratos son sólo ilustración y los datos pueden cambíarse sin aviso previo.';
	}
	else{
		$bt_detalhes = 'More details';
		$obs_foto = 'The pictures are only an illustration and the data can be changed without previous notice.';
	}
?>
<div id="conteudo_esquerda">
	<style>
    .center_imagem_produto img{
    padding-right: 10px !important;
    max-width: 160px !important;
    max-height: 137px !important;
}
    </style>
    <?php
	include("inc/breadcrumb.php");
	
	//######### INICIO Paginação
		$pg = @$url8;
        $numreg = 9; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("SELECT id FROM produtos WHERE ativo_inativo = 1 AND id_subcategoria = '$url6' AND marca = '$url3' AND ".$lang." = 1");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	if(!isset($url4)){
		if($url3 == 'croydon'){
			$sql_banner = "SELECT * FROM banners WHERE id_tipo = 1 AND ativo = 1 ORDER BY id DESC LIMIT 1";
		}
		else{
			$sql_banner = "SELECT * FROM banners WHERE id_tipo = 2 AND ativo = 1 ORDER BY id DESC LIMIT 1";
		}
		foreach (consulta($sql_banner) as $banners){
		$banner = $banners['imagem_'.$lang];
		$title = $banners['title_'.$lang];
			if($banner != ""){
				echo '<img title="'.$title.'" class="banner_subcat" src="'.$_SESSION['url'].'images/banners/'.$banner.'" alt="'.$url3.'" />';
			}
		}
	}
	else{
		foreach (consulta("SELECT banner_".$lang.",nome_".$lang." FROM subcategorias WHERE ".$lang." = 1 AND id = '$url6' LIMIT 1") as $banners){
			$banner = $banners['banner_'.$lang];
			$nome = $banners['nome_'.$lang];
				if($banner != ""){
					echo '<img title="'.$nome.'" class="banner_subcat" src="'.$_SESSION['url'].'images/banners/'.$banner.'" alt="'.$nome.'" />';
				}
			}
	}
	?>
    <div id="produtos_vitrine">
    	<div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
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
						}
						else if($id_produto == '145' and $lang == 'en'){
							$codigo = 'INFORMATION';
						}
						else{
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
						}
						else if($id_produto == '84' and $lang == 'en'){
							$foto = 'sacl-sace-sacq-en.jpg';
						}
						else if($id_produto == '83' and $lang == 'en'){
							$foto = 'scgl-scge-en.jpg';
						}
						else if($id_produto == '85' and $lang == 'en'){
							$foto = 'sadl-sade-sadq-en.jpg';
						}
						else if($id_produto == '125' and $lang == 'en'){
							$foto = 'SADL-G-SADE-G-SADQ-G-en.jpg';
						}
						else{
							$foto = $produtos["foto"];
						}
						
						if(!isset($url6)){
							$id_subcategoria = $produtos["id_subcategoria"];
							$nomeSubcat = mysql_fetch_array(mysql_query("SELECT nome_".$lang." FROM subcategorias WHERE id = '$id_subcategoria'"));
							$url7 =  $nomeSubcat['nome_'.$lang];
						}
						
						$url_produto = $_SESSION['url'].$lang.'/produto/'.$url3.'/'.$id_produto.'/'.$url7.'/'.coloca_traco(retira_acentos($nome));
				?>
				<div class="box_produtos">
					<div class="box_produtos_top"></div>
					<div class="box_produtos_center">
						<h3><a href="<?php echo $url_produto;?>"><?php echo $codigo;?></a></h3>
						<div class="imagem_produto">
							<div class="top_imagem_produto"></div>
							<div class="center_imagem_produto">
								<a title="<?php echo $nome;?>" href="<?php echo $url_produto;?>"><img src="<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto;?>" alt="<?php echo $nome;?>" /></a>
							</div>
							<div class="bottom_imagem_produto"></div>
						</div>
						<h3><a class="nomeProd" href="<?php echo $url_produto;?>"><?php echo $nome;?></a></h3>
						<a class="bt_detalhes" href="<?php echo $url_produto;?>"><?php echo $bt_detalhes;?></a>
					</div>
					<div class="box_produtos_bottom"></div>
				</div>
				<?php
				} 
				if(isset($url6)){
					include('inc/paginacao_vitrine.php');
				}
			}
			else{
				if($lang == 'pt'){
					echo '<p class="txt_cat_vazia">Essa categoria não possui produtos.</p>';
				}
				else if($lang == 'es'){
					echo '<p class="txt_cat_vazia">Esta categoría no tiene productos.</p>';
				}
				else{
					echo '<p class="txt_cat_vazia">This category has no products.</p>';
				}
			}
			?>
            <p class="observacao"><?php echo $obs_foto;?></p>
        </div>
        <div class="produtos_vitrine_bottom"></div>
    </div>
</div>