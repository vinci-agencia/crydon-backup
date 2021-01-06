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
                $name_pag1 = 'Cartão BNDES';
            }
            else if($lang == 'es'){
                $name_pag1 = 'Tarjeta BNDES';
            }
            else{
                $name_pag1 = 'BNDES Card';
            }
            ?>
            <span><?php echo $name_pag1;?></span>
        </div>
    </div>
    <?php
    foreach (consulta("select texto_".$lang." from bndes order by id desc LIMIT 1") as $bndes){
        $texto = $bndes['texto_'.$lang];
        echo '<div class="txt_bndes"><p>'.$texto.'</p></div>';
    }
    ?>
</div>



	 