<?php
list($titulo, $description, $keywords) = meta_tags($page,$url3,$url4,$url6,$lang);

if($lang == 'pt'){
    $meta_padrao = 'CROYDON, equipamentos para Hot&eacute;is, Bares e Restaurantes';
}
else if($lang == 'en'){
    $meta_padrao = 'CROYDON, equipment for Hotels, Bars and Restaurants'; 
}
else{
    $meta_padrao = 'CROYDON, equipos para hoteles, bares y restaurantes'; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <meta http-equiv="content-language" content="<?php echo $lang;?>">
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <meta name="google-site-verification" content="laLX1hl8uUuSPR9uuoXMgY8Ebl3a6RNdifw1cLUEHiY" />
    <meta property="fb:admins" content="100008468190200" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?php echo $titulo;?> - <?php echo $meta_padrao;?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url'];?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url'];?>css/geral.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="<?php echo $_SESSION['url'];?>js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/geral.js"></script>                    
    <script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/valida.js"></script>
    <script type="text/javascript" src="<?php echo $_SESSION['url'];?>js/bootstrap.min.js"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-66160505-1', 'auto');
        ga('send', 'pageview');

    </script>
    <script type="text/javascript">
        $(function() {
            $(".btn-modal").click(function(e){
                e.preventDefault();
                var img = $(this).attr('href');
                $("#modal .modal-body").html('<img src="'+img+'" />');
                $("#modal").modal("show");
            });
        });

        function pega_busca(id,id_form){
            var busca = document.getElementById(id).value;
            var word=/ /g; 	
            var palavra = busca.replace(word,"-"); 
            document.getElementById(id_form).action = '<?php echo $_SESSION['url'].$lang;?>/busca/'+retira_acentos(palavra);
            document.getElementById(id_form).submit();
        }
    </script>

    <?php 
    if($url3 == 'localizacao'){
        if($lang == 'pt'){
            $key = 'ABQIAAAABa-FrcfJahHSQQLqBk-n0RRiBMqss8WGt6rPPrAFvbfRayzOLxTRL51sVCYtRCzpoP01L4DGx0CCJg';
        }
        else if($lang == 'es'){
            $key = 'ABQIAAAABa-FrcfJahHSQQLqBk-n0RTzgr1lr8KGFzmbKuXNxWZgVnuGtxQwEqa5NJc2fLiIUhUnxTeOnWIeIQ';
        }
        else{
            $key = 'ABQIAAAABa-FrcfJahHSQQLqBk-n0RTz5kjFLxYcQaqZZDNbGs-9qYXmlBSc4Xp-Cr9KPa6V1ZoMKsGcKZTveQ';
        }
    ?>
    <?php
    }
    if($lang == 'pt'){
        $value_busca = 'Que produto est&aacute;  buscando?';
        $txt_news = 'Cadastre-se aqui e receba mais novidades';
        $txt_direitos = 'Todos os direitos reservados.';
        $value_news = 'Nome';
        $tit_videos = 'VÍDEOS';
    }
    else if($lang == 'es'){
        $value_busca = '?Que producto est&aacute;  buscando?';
        $txt_news = 'Reg&iacute;strate aqu&iacute;  para recibir m&aacute;s noticias';
        $txt_direitos = 'Todos los derechos reservados.';
        $value_news = 'Nombre';
        $tit_videos = 'VIDEOS';
    }
    else{
        $value_busca = 'Products search';
        $txt_news = 'Sign up here to receive more news';
        $txt_direitos = 'All rights reserved.';
        $value_news = 'Name';
        $tit_videos = 'VIDEOS';
    }
    ?>
</head>
<body <?php if($url3 == 'localizacao'){ echo 'onload="initialize();document.form.reset();"';}?>>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.7&appId=1689842777969381";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <nav class="navbar navbar-inverse">
        <div class="container"><div class="row">
  <div class="col-md-3">
		<div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="box-idioma">
                    <a href="<?php echo $_SESSION['url'];?>pt"><img src="<?php echo $_SESSION['url'];?>images/bandeira_brasil.png" alt="Português" /></a>
                    <a href="<?php echo $_SESSION['url'];?>es"><img src="<?php echo $_SESSION['url'];?>images/bandeira_espanha.png" alt="Espanhol" /></a>
                    <a href="<?php echo $_SESSION['url'];?>en"><img src="<?php echo $_SESSION['url'];?>images/bandeira_eua.png" alt="Inglês" /></a>
                   
                </div>
				
					
            </div>
  </div>
  

  
  <div class="col-md-5"> <div class="navbar-center"> 

			
                <form class="navbar-form" method="POST" onsubmit="pega_busca('busca_topo','formBuscaT')" id="formBuscaT">
                    <div class="form-group has-feedback pesquisatop" >
					
                        <input id="busca_topo" type="text" class="form-control" placeholder="<?php echo $value_busca; ?>" />
                        <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                    </div>
                </form>
			
            </div>
</div>

<div class="col-md-4" class="navbar-right">
	 
    <a class="sac" href="<?php echo $_SESSION['url'];?>pt/sac"><img src="/images/sac.png" class="sac"></a>
    <a class="wpp" href="<?php echo $_SESSION['url'];?>pt"><img src="/images/Whatsapp.png" class="wpp"></a>
  
    
  </div>
</div>
            
			
           
            <div class=" hidden-sm hidden-lg hidden-md">
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php 
                        foreach (consulta("select nome_".$lang.",nome_pt, id, submenu from menu WHERE ".$lang." = 1 ORDER BY id ASC") as $menu){ 
                            $link_menu = strtolower(retira_acentos(coloca_traco($menu['nome_pt'])));
                            $nome_menu = strtoupper($menu['nome_'.$lang]);

                            if('produtos' == strtolower($menu['nome_pt'])){
                                $link_menu = 'vitrines/croydon';
                            }
                            
                            if('empresa' == strtolower($menu['nome_pt'])){
                                $link_menu = '#empresa';
                            }
                        ?>
                            <li>
                                <a href="<?php if($sub_menu == 0){ echo $_SESSION['url'].$lang.'/'.$link_menu;}else{ echo "#"; }?>"><?php echo $nome_menu; ?></a>
                            </li>
                        <?php } ?> 
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="box-logo text-center">
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">
            <img src="<?php echo $_SESSION['url'];?>images/logo_nova.png" alt="croydon" />
        </a>
    </div>
    <div class="container">
        <div id="menu" class="menu-<?php echo $lang;?> hidden-xs">
            <ul>
                <?php 
                foreach (consulta("select nome_".$lang.",nome_pt, id, submenu from menu WHERE ".$lang." = 1 ORDER BY id ASC") as $menu){ 
                    $link_menu = strtolower(retira_acentos(coloca_traco($menu['nome_pt'])));
                    //$nome_menu = strtoupper(utf8_encode($menu['nome_'.$lang]));
                    $nome_menu = strtoupper($menu['nome_'.$lang]);

                    if('produtos' == strtolower($menu['nome_pt'])){
                        $link_menu = 'vitrines/croydon';
                    }
                    
                    if('empresa' == strtolower($menu['nome_pt'])){
                        $link_menu = '#empresa';
                    }
                ?>
                    <li>
                        <a href="<?php echo $_SESSION['url'].$lang.'/'.$link_menu;?>"><?php echo $nome_menu; ?></a>
                    </li>
                <?php } ?>       
            </ul>
        </div>
    </div>
