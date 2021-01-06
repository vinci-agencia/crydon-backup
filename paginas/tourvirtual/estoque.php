<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url'];?>css/estoque/css/style.css" />
<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/estoque/js/1.4.2-jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/estoque/js/conversao.js"></script>
<!--Efeito na caixa de busca-->
<style>
    div				{margin: 10px; font-family: Arial, Helvetica, sans-serif; font-size:12px; }
	.ausu-suggest	{width: 600px;}
    #wrapper 		{margin-left: 28%; position: relative; margin-right: auto; margin-top:75px ;width:  600px;}
    h3 				{font-size: 11px; text-align: center;}
	span 			{font-size: 11px; font-weight: bold}

	a:link			{color: #F06;text-decoration: none;}
	a:visited 		{text-decoration: none;color: #F06;}
	a:hover 		{text-decoration: underline;color: #09F;}
	a:active		{text-decoration: none;color: #09F;}
</style>
<script src="<?php echo $_SESSION['url'];?>js/estoque/javascript/scripts.js"></script>
<!--Scripts para caixa de busca-->
<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/estoque/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/estoque/js/jquery.ausu-autosuggest.min.js"></script>
<script>
$(document).ready(function() {
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'GET',
            minChars: 2,
              rtnIDs: true,
            dataFile: '<?php echo $_SESSION['url'];?>paginas/data.php'
    });
});
</script>


<div class="meio_geral">
    <div class="breadcrumb_internas">
        <div id="breadcrumb">
            <div class="borderLeft_bread"></div>
            <div class="borderRight_bread"></div>
            <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
            <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
            <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            if($lang == 'pt'){
                $name_pag1 = 'Estoque';
            }
            ?>
            <span><?php echo $name_pag1;?></span>
            <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            foreach (consulta("select titulo_".$lang." from noticias where id = '$url3'") as $noticia){
			?>
            <span><?php echo $noticia['titulo_'.$lang];?></span>
            <?php
			}
			?>
        </div>
    </div>
    <div id="wrapper">
       <form action="redirecionamento.php" target="_blank" method="POST">
           <div class="ausu-suggest">
           <p id="tdfont2">DIGITE O CÓDIGO DA PEÇA:</p>           
              <input type="text" size="25" value="" name="nome" id="codigo" autocomplete="off" /> 
              <input type="submit" value="OK"/>
           </div>           
          </div>
      </div>
</div>
