<?php
if(isset($_POST['busca'])){
	$_SESSION['busca'] = $_POST['busca'];
}
else{
	$_SESSION['busca'] = $_SESSION['busca'];
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Busca';
			$txt_result1 = 'Sua busca retornou';
			$txt_result2 = 'resultado(s)';
			$bt_detalhes = 'Mais detalhes';
		}
		else if($lang == 'es'){
			$name_pag = 'Búsqueda';
			$txt_result1 = 'Su búsqueda ha dado';
			$txt_result2 = 'resultado(s)';
			$bt_detalhes = 'Més detalls';
		}
		else{
			$name_pag = 'Search';
			$txt_result1 = 'Your search returned';
			$txt_result2 = 'result(s)';
			$bt_detalhes = 'More details';
		}
		?>
        <span><?php echo $name_pag;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $_SESSION['busca'];?></span>
    </div>
</div>
    
    <?php

	//######### INICIO Paginação
		$pg = @$url4;
        $numreg = 9; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("SELECT id FROM produtos WHERE nome_".$lang." LIKE '%".$_SESSION['busca']."%' OR sigla LIKE '%".$_SESSION['busca']."%' OR palavras_busca LIKE '%".$_SESSION['busca']."%' AND ativo_inativo = 1 AND ".$lang." = 1");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação

	?>
    <div id="produtos_vitrine_busca">
    	<div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
        	<p class="quant_busca"><?php echo $txt_result1.' '.$quantreg.' '.$txt_result2;?></p>
			<?php
			$sql = "SELECT nome_".$lang.",sigla,foto,id,marca FROM produtos WHERE nome_".$lang." LIKE '%".$_SESSION['busca']."%' OR sigla LIKE '%".utf8_decode($_SESSION['busca'])."%' OR palavras_busca LIKE '%".$_SESSION['busca']."%' AND ativo_inativo = 1 AND ".$lang." = 1 ORDER BY id DESC LIMIT $inicial, $numreg";

				foreach (consulta($sql) as $produtos) {
						$nome = $produtos["nome_".$lang];
						$id_produto = $produtos["id"];
						$marca = $produtos["marca"];
						
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
				?>
				<div class="box_produtos">
					<div class="box_produtos_top"></div>
					<div class="box_produtos_center">
						<h3><a href="<?php echo $_SESSION['url'].$lang?>/produto/<?php echo $marca;?>/<?php echo $id_produto;?>/<?php echo coloca_traco(retira_acentos($nome))?>"><?php echo $codigo;?></a></h3>
						<div class="imagem_produto">
							<div class="top_imagem_produto"></div>
							<div class="center_imagem_produto">
								<a title="<?php echo $nome;?>" href="<?php echo $_SESSION['url'].$lang?>/produto/<?php echo $marca;?>/<?php echo $id_produto;?>/<?php echo coloca_traco(retira_acentos($nome))?>"><img src="<?php echo $_SESSION['url'];?>phpthumb/phpThumb.php?src=<?php echo $_SESSION['url'];?>images/produtos/<?php echo $foto;?>&w=160&h=137" alt="<?php echo $nome;?>" /></a>
							</div>
							<div class="bottom_imagem_produto"></div>
						</div>
						<h3><a class="nomeProd" href="<?php echo $_SESSION['url'].$lang?>/produto/<?php echo $marca;?>/<?php echo $id_produto;?>/<?php echo coloca_traco(retira_acentos($nome))?>"><?php echo $nome;?></a></h3>
						<a class="bt_detalhes" href="<?php echo $_SESSION['url'].$lang?>/produto/<?php echo $marca;?>/<?php echo $id_produto;?>/<?php echo coloca_traco(retira_acentos($nome))?>"><?php echo $bt_detalhes;?></a>
					</div>
					<div class="box_produtos_bottom"></div>
				</div>
				<?php
				} 
					include('inc/paginacao_busca.php');

			?>
        </div>
        <div class="produtos_vitrine_bottom"></div>
    </div>
