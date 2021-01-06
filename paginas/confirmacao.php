 <?php
        if($lang == 'pt'){
			$name_pag = 'Confirmação';
			$txt = 'CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.';
			$txt_confirmacao = 'Seu email foi enviado com sucesso. Em breve entraremos em contato.';
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
<div class="container" id="confirmacao">
    <div class="conteudo-pagina">
        <div class="col-md-12" style="background-color: #fff; padding: 20px; margin-bottom: 30px;">
            <p class="texto_internas"><?php echo $txt;?></p>
            <p class="txt_confirmacao"><?php echo $txt_confirmacao;?></p>
        </div>
    </div>
</div>    
