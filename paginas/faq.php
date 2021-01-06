<?php
if($lang == 'pt'){
	$name_pag1 = 'Assistência técnica';
	$txt = 'Clique sobre as perguntas frequentes abaixo e tire suas dúvidas.';
	$txtresposta = 'Resposta';
}
else if($lang == 'es'){
	$name_pag1 = 'Assistência técnica';
	$txt = 'Haga clic sobre las preguntas más frecuentes de abajo y hacer tus preguntas.';
	$txtresposta = 'Respuestas';
}
else{
	$name_pag1 = 'Technical Assistance';
	$txt = 'Click on the frequently asked questions below and ask your questions.';
	$txtresposta = 'Replies';
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>FAQ</span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<?php
//######### INICIO Paginação
		$pg = @$url4;
        $numreg = 9; // 
        if (!isset($pg)) {
                $pg = 0;
        }
        $inicial = $pg * $numreg;
        $sql_conta = mysql_query("SELECT * FROM faq");
        $quantreg = mysql_num_rows($sql_conta);
//######### FIM dados Paginação

foreach (consulta("SELECT titulo,texto FROM faq ORDER BY id DESC LIMIT $inicial, $numreg") as $faq){
	$pergunta = $faq['titulo'];
	$resposta = $faq['texto'];
	
	$total = sizeof(consulta("SELECT titulo,texto FROM faq ORDER BY id DESC LIMIT $inicial, $numreg"));
	
	$z++;
	
?>
<div class="faq">
    <div id="produtos_vitrine_busca">
        <div class="produtos_vitrine_top"></div>
        <div class="produtos_vitrine_center">
        	<p class="pergunta"><a href="#" onclick="ver_faq('txtresposta<?php echo $z;?>','resposta<?php echo $z;?>','<?php echo $total;?>')" ><?php echo $pergunta;?></a></p>
            <p style="display:none;" id="txtresposta<?php echo $z;?>" class="txtresposta"><?php echo $txtresposta;?></p>
            <div style="display:none;" id="resposta<?php echo $z;?>" class="resposta"><p><?php echo $resposta;?></p></div>
        </div>
        <div class="produtos_vitrine_bottom"></div>
    </div>
</div>
<?php
}
include("inc/paginacao2.php");
?>