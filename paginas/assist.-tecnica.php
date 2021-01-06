<script>
function mapserro() {
  alert("Ola! Estamos com um problema o Google Maps. Favor utilizar o Menu e navegar pela lista abaixo.");
}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-18535728-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-18535728-1');
</script>

<div class="container" id="ondecomprar">
    <div class="box_titulo" id="titulo_assistenciatecnica">
        <div class="box_titulo_texto">
            <h1>ASSIST&Ecirc;NCIA T&Eacute;CNICA</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <img src="<?php echo $_SESSION['url'];?>images/mapa_ondecomprar.png" alt="Onde Comprar" />
            </div>
            <div class="col-md-5 col-sm-5">
                <p>Saiba onde encontrar nossas autorizadas pelo</p>
                <p>Brasil. Ou solicite o manual de seu equipamento.</p>
              <div class="obs" style="margin-top:50px;">
                    <span style="size:12px; color:red;"> *ATEN&Ccedil;&Atilde;O! </span><span style="size:12px;">Os assistentes t&eacute;cnicos abaixo s&atilde;o empresas INDEPENDENTES que t&ecirc;m acesso aos componentes originais de f&aacute;brica e est&atilde;o AUTORIZADOS A ATENDER nossos produtos durante o per&iacute;odo de vig&ecirc;ncia da Garantia por defeito de fabrica&ccedil;&atilde;o. A CROYDON N&Atilde;O SE RESPONSABILIZA pelas negocia&ccedil;&otilde;es/combina&ccedil;&otilde;es feitas entre o assistente e o cliente final. Solicitamos aos clientes que fa&ccedil;am contato com o assistente escolhido antes de se dirigirem ao local.</span>
                </div>
              
                <div class="box-btn-ondecompra">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                            <a class="btn-revendedores vinte" href="<?php echo $_SESSION['url'].$lang.'/conteudo/autorizadas';?>" title="Autorizadas Geral">Autorizadas em Geral</a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
					
					<div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                            <a class="btn-revendedores vinte" href="<?php echo $_SESSION['url'].$lang.'/conteudo/autorizadas-fornos-combinados/9';?>" title="Autorizadas Fornos">Autorizadas Fornos Combinados</a>
                  
                        </div>
                        <div class="col-md-2"></div>
                    </div>
					    
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-9">
                            <a class="btn-representantes vinte" href="<?php echo $_SESSION['url'].$lang.'/conteudo/manuais';?>" title="Manuais">Lista de Pe&ccedil;as</a>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>