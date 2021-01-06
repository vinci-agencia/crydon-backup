<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <?php
        if($lang == 'pt'){
			$name_pag = 'Tour Virtual';
			$name_pag1 = 'Empresa';
			$txt = 'Selecione uma das opções abaixo e conheça a nossa empresa.';
			$txt_plugin = 'Caso não consiga visualizar a imagem acima <a href="'.$_SESSION['url'].'tourvirtual/msjavx86.exe">clique aqui</a>, para baixar o plugin.';
		}
		else if($lang == 'es'){
			$name_pag = 'Tour Virtual';
			$name_pag1 = 'Empresa';
			$txt = 'Seleccione una opción a continuación y cumplir con nuestra empresa.';
			$txt_plugin = 'Si no puede ver la imagen de arriba, <a href="'.$_SESSION['url'].'tourvirtual/msjavx86.exe">haga clic </a> para descargar el plugin.';
		}
		else{
			$name_pag = 'Virtual Tour';
			$name_pag1 = 'Company';
			$txt = 'Select an option below and meet our company.';
			$txt_plugin = 'If you can not view the image above <a href="'.$_SESSION['url'].'tourvirtual/msjavx86.exe">click here</a> to download the plugin.';
		}
		?>
        <span><?php echo $name_pag1;?></span>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span><?php echo $name_pag;?></span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<div id="produtos_vitrine_busca">
   <div class="produtos_vitrine_top"></div>
   <div class="produtos_vitrine_center">
   		<ul class="lista_tourvirtual">
        	<?php
			if($lang == 'pt'){ 
			?>
        	<li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/tour1.ipx">Linha de montagem (1)</a></li>
        	<li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_4th_Floor_Bathroom.ipx">Linha de montagem (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bar.ipx">Puncionadeira</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/fabrica.ipx">Panorâmica da fábrica (1)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Basement.ipx">Panorâmica da fábrica (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Kitchen.ipx">Panorâmica da fábrica (3)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bedroom.ipx">Almoxarifado</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garage.ipx">Ferramentaria</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garden.ipx">Área para expansão</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Office.ipx">Administração</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Barn.ipx">Refeitório</a></li>
            <?php
			}
			else if($lang == 'es'){
			?>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/tour1.ipx">Línea de montaje (1)</a></li>
        	<li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_4th_Floor_Bathroom.ipx">Línea de montaje (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bar.ipx">Puncionadera</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/fabrica.ipx">Panorámica de la f&aacute;brica (1)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/fabrica.ipx">Panor&aacute;mica de la f&aacute;brica</a><a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Basement.ipx"> (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/fabrica.ipx">Panor&aacute;mica de la f&aacute;brica</a><a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Kitchen.ipx"> (3)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bedroom.ipx">Almacén</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garage.ipx">Herramientaria</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garden.ipx">&Aacute;rea de expansi&oacute;n</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Office.ipx">Administración</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Barn.ipx">Refectorio</a></li>
            <?php
			}
			else{
			?>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/tour1.ipx">Assembly line (1)</a></li>
        	<li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_4th_Floor_Bathroom.ipx">Assembly line (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bar.ipx">Punching</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/fabrica.ipx">Overview of the factory (1)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Basement.ipx">Overview of the factory (2)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Kitchen.ipx">Overview of the factory (3)</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Bedroom.ipx">Warehouse</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garage.ipx">Tooling</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Garden.ipx">Area for expansion</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Office.ipx">Administration</a></li>
            <li>&raquo; <a href="<?php echo $_SESSION['url'].$lang?>/conteudo/tour-virtual/croydon_Barn.ipx">Refectory</a></li>
            <?php
			}
			?>
        </ul>
        <div class="box_tourvirtual">
<div id="cont_box_tourvirtual">
        
                 <applet code="IpixViewer.class" archive = "IpixViewer.jar" codebase = "<?php echo $_SESSION['url'];?>tourvirtual" width = "320" height = "240" name = "IpixViewer">
        			 <param name="url" id="url_tour" value="<?php echo $_SESSION['url'];?>paginas/tourvirtual/<?php if(isset($url4)){ echo $url4;}else{echo 'tour1.ipx';}?>" />
                     <param name="Warp" value="1" />
                     <param name="Toolbar" value="large" />
                     <param name="BackgroundColor" value="#FFFFF" />
                     <param name="HelpURL" value="help/java3_2" />
                     <param name="SpinSpeed" value="-5" />
                     <param name="SpinStyle" value="flat" />
         		  </applet>

                <p><?php echo $txt_plugin;?></p>
            </div>
        </div>
   </div>
   <div class="produtos_vitrine_bottom"></div>
</div>