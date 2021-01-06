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
    <div class="box_titulo" id="titulo_ondecomprar">
        <div class="box_titulo_texto">
            <h1>ONDE COMPRAR</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <img src="<?php echo $_SESSION['url'];?>images/mapa_ondecomprar.png" alt="Onde Comprar" />
            </div>
            <div class="col-md-5 col-sm-5">
                <p>Saiba onde encontrar nossos</p>
                <p>revendedores e representantes pelo Brasil</p>
                 <div class="obs" style="margin-top:50px;">
                    <span style="size:12px; color:red;"> *ATEN&Ccedil;&Atilde;O! </span><span style="size:12px;text-align: justify;">Os Revendedores relacionados abaixo s&atilde;o empresas INDEPENDENTES que revendem nossos produtos. A CROYDON N&Atilde;O SE RESPONSABILIZA pelas negocia&ccedil;&otilde;es feitas entre o revendedor e o cliente final, nem pelo prazo de entrega acertado entre as partes.</span>
                </div>
                <div class="box-btn-ondecompra">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-7">
                            <a class="btn-revendedores" href="<?php echo $_SESSION['url'].$lang.'/conteudo/lojas-online/1';?>" title="Lojas Online">Lojas Online</a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-7">
                            <a class="btn-revendedores" href="<?php echo $_SESSION['url'].$lang.'/conteudo/revendedores';?>" title="Revendedores">Lojas F&iacute;sicas</a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-7">
                            <a class="btn-representantes" href="<?php echo $_SESSION['url'].$lang.'/conteudo/representantes';?>" title="Representantes">Representantes Comercias</a>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>