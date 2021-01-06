<div class="container" id="bndes">
    <div class="conteudo-pagina">
        <div class="col-md-12" style="background-color: #fff; padding: 20px; margin-bottom: 30px;">
            <?php
            foreach (consulta("select texto_".$lang." from bndes order by id desc LIMIT 1") as $bndes){
                $texto = $bndes['texto_'.$lang];
                echo '<div class="txt_bndes"><p>'.$texto.'</p></div>';
            }
            ?>
        </div>
    </div>
</div>