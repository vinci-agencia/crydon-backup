<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Dicas e Receitas</span>
    </div>
</div>
<?php
foreach (consulta("SELECT imagem_".$lang." , title_".$lang." FROM banners WHERE id_tipo = 10 AND ativo = 1 ORDER BY id DESC LIMIT 1") as $img_dicas){
	$img = $img_dicas['imagem_'.$lang];
	$title = $img_dicas['title_'.$lang];
	echo '<img title="'.$title.'" class="img_dicas_receitas" src="'.$_SESSION['url'].'/images/banners/'.$img.'" alt="'.$title.'" />';
}
?>
<p class="texto_internas">Confira aqui algumas dicas e receitas que separamos para você!</p>
<ul class="lista_dicas_receitas">
	<?php
	//######### INICIO Paginação
		$pg = @$url3;
        $numreg = 10; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("select id from dicas_receitas");
        $quantreg = mysql_num_rows($sql_conta);
	//######### FIM dados Paginação
	
	$x = 0;
	$total = sizeof(consulta("SELECT titulo,texto FROM dicas_receitas ORDER BY id DESC LIMIT $inicial, $numreg"));
	foreach (consulta("SELECT titulo,texto FROM dicas_receitas ORDER BY id DESC LIMIT $inicial, $numreg") as $dicas){
	$x++;
	$titulo = $dicas['titulo'];
	$texto = $dicas['texto'];
	?>
	<li><a onclick='ver_dica("dica_receita_<?php echo $x;?>","<?php echo $total;?>")' href='javascript:void(0)'><?php echo $titulo;?></a></li>
	<li style="display:none;" id="dica_receita_<?php echo $x;?>" class="txt_dicas_e_receitas"><?php echo $texto;?></li>
    <?php
	}
	?>
</ul>
<?php
include('inc/paginacao.php');
?>