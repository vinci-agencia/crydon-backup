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
                $name_pag = 'Empresa';
                $name_pag1 = 'História';
                $txt = 'CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.';
            }
            else if($lang == 'es'){
                $name_pag = 'Empresa';
                $name_pag1 = 'Historia';
                $txt = 'CROYDON, símbolo de calidad en equipos para hoteles, bares y restaurantes desde 1962.';
            }
            else{
                $name_pag = 'Company';
                $name_pag1 = 'History';
                $txt = 'CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since 1962.';
            }
            ?>
            <span><?php echo $name_pag;?></span>
            <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
            <span><?php echo $name_pag1;?></span>
        </div>
    </div>
    <p class="texto_internas"><?php echo $txt;?></p>
    <?php
    foreach (consulta("select texto_".$lang." from historia order by id desc") as $historia){
        $texto = $historia['texto_'.$lang];
        echo '<div class="txt_historia"><p>'.$texto.'</p></div>';
    }
    ?>
</div>