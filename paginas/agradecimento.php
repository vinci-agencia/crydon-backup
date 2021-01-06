<?php
/**
 * Created by PhpStorm.
 * User: Jaime Matos
 * Date: 06/10/14
 * Time: 10:22
 */
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
            $name_pag = 'Confirmação';
            $txt = 'CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.';
            $txt_confirmacao = 'Agradecemos sua participação nesta pesquisa!';
        }
        else if($lang == 'es'){
            $name_pag = 'Confirmación';
            $txt = 'CROYDON, símbolo de calidad en equipos para hoteles, bares y restaurantes desde 1962.';
            $txt_confirmacao = 'Tu correo ha sido enviado con éxito. Pronto nos pondremos en contacto contigo.';
        }
        else{
            $name_pag = 'Confirmation';
            $txt = 'CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962.';
            $txt_confirmacao = 'Your email has been sent successfully. Soon we will contact you.';
        }
		?>
<span><?php echo $name_pag;?></span>
</div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<p class="txt_confirmacao"><?php echo $txt_confirmacao;?></p>