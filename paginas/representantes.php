<script type="text/javascript">
    $(function() {
        $(".top-box-representantes a").click(function(){
            var expanded = $(this).attr('aria-expanded');
            
            if(expanded == 'true'){
               $(this).find('.mais').css('display', 'block');
               $(this).find('.menos').css('display', 'none');
            } else {
                $(this).find('.mais').css('display', 'none');
                $(this).find('.menos').css('display', 'block');
            }
        });
    });
</script>
<div class="container" id="representantes">
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
            <div class="col-md-4 col-sm-4">
                <p>Conhe&ccedil;a nossos representantes no Brasil</p>
                <div class="box-representantes">
                    <div class="top-box-representantes">
                        <a href="#centrooeste" aria-expanded="false" aria-controls="centrooeste" role="button" data-toggle="collapse">
                            Centro-Oeste
                            <span class="mais">+</span>
                            <span class="menos" style="display: none;">-</span>
                        </a>
                    </div>
                    <div id="centrooeste" class="collapse conteudo-box-representantes">
                        <?php 
                        $sql = "select * from onde_comprar where id_tipo = 1 and (id_estado = 8 or id_estado = 11 or id_estado = 12 or id_estado = 27) group by nome order by nome";
                        foreach (consulta($sql) as $representantes){
                            $nome = $representantes['nome'];
                            $endereco = $representantes['endereco'];
                            $cep = $representantes['cep'];
                            $telefone = $representantes['telefone'];
                            $cel = $representantes['cel'];
                            $fax = $representantes['fax'];
                            $contato = $representantes['contato'];
                            $email = $representantes['email'];
                            $msn = $representantes['msn'];
                            $skype = $representantes['skype'];
                        ?>
                        <ul>
                            <li class="nome"><?php echo $nome; ?></li>
                            <?php if(!empty($endereco)) {?>
                                <li><?php echo $endereco; ?></li>
                            <?php } ?>
                            <?php if(!empty($cep)) {?>
                                <li><?php echo $cep; ?></li>
                            <?php } ?>
                            <?php if(!empty($telefone)) {?>
                                <li><?php echo $telefone; ?></li>
                            <?php } ?>
                            <?php if(!empty($cel)) {?>
                                <li><?php echo $cel; ?></li>
                            <?php } ?>
                            <?php if(!empty($fax)) {?>
                                <li><?php echo $fax; ?></li>
                            <?php } ?>
                            <?php if(!empty($contato)) {?>
                                <li><?php echo $contato; ?></li>
                            <?php } ?>
                            <?php if(!empty($email)) {?>
                                <li><?php echo $email; ?></li>
                            <?php } ?>
                            <?php if(!empty($msn)) {?>
                                <li><?php echo $msn; ?></li>
                            <?php } ?>
                            <?php if(!empty($skype)) {?>
                                <li><?php echo $skype; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-representantes">
                    <div class="top-box-representantes">
                        <a href="#nordeste" aria-expanded="false" role="button" data-toggle="collapse" aria-controls="nordeste">
                            Nordeste
                            <span class="mais">+</span>
                            <span class="menos" style="display: none;">-</span>
                        </a>
                    </div>
                    <div id="nordeste" class="collapse conteudo-box-representantes">
                        <?php 
                        $sql = "select * from onde_comprar where id_tipo = 1 and (id_estado = 4 or id_estado = 5 or id_estado = 9 or id_estado = 10 or id_estado = 15 or id_estado = 16 or id_estado = 17 or id_estado = 20 or id_estado = 25) group by nome order by nome";
                        foreach (consulta($sql) as $representantes){
                            $nome = $representantes['nome'];
                            $endereco = $representantes['endereco'];
                            $cep = $representantes['cep'];
                            $telefone = $representantes['telefone'];
                            $cel = $representantes['cel'];
                            $fax = $representantes['fax'];
                            $contato = $representantes['contato'];
                            $email = $representantes['email'];
                            $msn = $representantes['msn'];
                            $skype = $representantes['skype'];
                        ?>
                        <ul>
                            <li class="nome"><?php echo $nome; ?></li>
                            <?php if(!empty($endereco)) {?>
                                <li><?php echo $endereco; ?></li>
                            <?php } ?>
                            <?php if(!empty($cep)) {?>
                                <li><?php echo $cep; ?></li>
                            <?php } ?>
                            <?php if(!empty($telefone)) {?>
                                <li><?php echo $telefone; ?></li>
                            <?php } ?>
                            <?php if(!empty($cel)) {?>
                                <li><?php echo $cel; ?></li>
                            <?php } ?>
                            <?php if(!empty($fax)) {?>
                                <li><?php echo $fax; ?></li>
                            <?php } ?>
                            <?php if(!empty($contato)) {?>
                                <li><?php echo $contato; ?></li>
                            <?php } ?>
                            <?php if(!empty($email)) {?>
                                <li><?php echo $email; ?></li>
                            <?php } ?>
                            <?php if(!empty($msn)) {?>
                                <li><?php echo $msn; ?></li>
                            <?php } ?>
                            <?php if(!empty($skype)) {?>
                                <li><?php echo $skype; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-representantes">
                    <div class="top-box-representantes">
                        <a href="#norte" aria-expanded="false" role="button" data-toggle="collapse" aria-controls="norte">
                            Norte
                            <span class="mais">+</span>
                            <span class="menos" style="display: none;">-</span>
                        </a>
                    </div>
                    <div id="norte" class="collapse conteudo-box-representantes">
                        <?php 
                        $sql = "select * from onde_comprar where id_tipo = 1 and (id_estado = 1 or id_estado = 2 or id_estado = 3 or id_estado = 21 or id_estado = 22 or id_estado = 14) group by nome order by nome";
                        foreach (consulta($sql) as $representantes){
                            $nome = $representantes['nome'];
                            $endereco = $representantes['endereco'];
                            $cep = $representantes['cep'];
                            $telefone = $representantes['telefone'];
                            $cel = $representantes['cel'];
                            $fax = $representantes['fax'];
                            $contato = $representantes['contato'];
                            $email = $representantes['email'];
                            $msn = $representantes['msn'];
                            $skype = $representantes['skype'];
                        ?>
                        <ul>
                            <li class="nome"><?php echo $nome; ?></li>
                            <?php if(!empty($endereco)) {?>
                                <li><?php echo $endereco; ?></li>
                            <?php } ?>
                            <?php if(!empty($cep)) {?>
                                <li><?php echo $cep; ?></li>
                            <?php } ?>
                            <?php if(!empty($telefone)) {?>
                                <li><?php echo $telefone; ?></li>
                            <?php } ?>
                            <?php if(!empty($cel)) {?>
                                <li><?php echo $cel; ?></li>
                            <?php } ?>
                            <?php if(!empty($fax)) {?>
                                <li><?php echo $fax; ?></li>
                            <?php } ?>
                            <?php if(!empty($contato)) {?>
                                <li><?php echo $contato; ?></li>
                            <?php } ?>
                            <?php if(!empty($email)) {?>
                                <li><?php echo $email; ?></li>
                            <?php } ?>
                            <?php if(!empty($msn)) {?>
                                <li><?php echo $msn; ?></li>
                            <?php } ?>
                            <?php if(!empty($skype)) {?>
                                <li><?php echo $skype; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-representantes">
                    <div class="top-box-representantes">
                        <a href="#sudeste" aria-expanded="false" role="button" data-toggle="collapse" aria-controls="sudeste">
                            Sudeste
                            <span class="mais">+</span>
                            <span class="menos" style="display: none;">-</span>
                        </a>
                    </div>
                    <div id="sudeste" class="collapse conteudo-box-representantes">
                        <?php 
                        $sql = "select * from onde_comprar where id_tipo = 1 and (id_estado = 7 or id_estado = 13 or id_estado = 18 or id_estado = 24) group by nome order by nome";
                        foreach (consulta($sql) as $representantes){
                            $nome = $representantes['nome'];
                            $endereco = $representantes['endereco'];
                            $cep = $representantes['cep'];
                            $telefone = $representantes['telefone'];
                            $cel = $representantes['cel'];
                            $fax = $representantes['fax'];
                            $contato = $representantes['contato'];
                            $email = $representantes['email'];
                            $msn = $representantes['msn'];
                            $skype = $representantes['skype'];
                        ?>
                        <ul>
                            <li class="nome"><?php echo $nome; ?></li>
                            <?php if(!empty($endereco)) {?>
                                <li><?php echo $endereco; ?></li>
                            <?php } ?>
                            <?php if(!empty($cep)) {?>
                                <li><?php echo $cep; ?></li>
                            <?php } ?>
                            <?php if(!empty($telefone)) {?>
                                <li><?php echo $telefone; ?></li>
                            <?php } ?>
                            <?php if(!empty($cel)) {?>
                                <li><?php echo $cel; ?></li>
                            <?php } ?>
                            <?php if(!empty($fax)) {?>
                                <li><?php echo $fax; ?></li>
                            <?php } ?>
                            <?php if(!empty($contato)) {?>
                                <li><?php echo $contato; ?></li>
                            <?php } ?>
                            <?php if(!empty($email)) {?>
                                <li><?php echo $email; ?></li>
                            <?php } ?>
                            <?php if(!empty($msn)) {?>
                                <li><?php echo $msn; ?></li>
                            <?php } ?>
                            <?php if(!empty($skype)) {?>
                                <li><?php echo $skype; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
                <div class="box-representantes">
                    <div class="top-box-representantes">
                        <a href="#sul" aria-expanded="false" role="button" data-toggle="collapse" aria-controls="sul">
                            Sul
                            <span class="mais">+</span>
                            <span class="menos" style="display: none;">-</span>
                        </a>
                    </div>
                    <div id="sul" class="collapse conteudo-box-representantes">
                        <?php 
                        $sql = "select * from onde_comprar where id_tipo = 1 and (id_estado = 6 or id_estado = 19 or id_estado = 23) group by nome order by nome";
                        foreach (consulta($sql) as $representantes){
                            $nome = $representantes['nome'];
                            $endereco = $representantes['endereco'];
                            $cep = $representantes['cep'];
                            $telefone = $representantes['telefone'];
                            $cel = $representantes['cel'];
                            $fax = $representantes['fax'];
                            $contato = $representantes['contato'];
                            $email = $representantes['email'];
                            $msn = $representantes['msn'];
                            $skype = $representantes['skype'];
                        ?>
                        <ul>
                            <li class="nome"><?php echo $nome; ?></li>
                            <?php if(!empty($endereco)) {?>
                                <li><?php echo $endereco; ?></li>
                            <?php } ?>
                            <?php if(!empty($cep)) {?>
                                <li><?php echo $cep; ?></li>
                            <?php } ?>
                            <?php if(!empty($telefone)) {?>
                                <li><?php echo $telefone; ?></li>
                            <?php } ?>
                            <?php if(!empty($cel)) {?>
                                <li><?php echo $cel; ?></li>
                            <?php } ?>
                            <?php if(!empty($fax)) {?>
                                <li><?php echo $fax; ?></li>
                            <?php } ?>
                            <?php if(!empty($contato)) {?>
                                <li><?php echo $contato; ?></li>
                            <?php } ?>
                            <?php if(!empty($email)) {?>
                                <li><?php echo $email; ?></li>
                            <?php } ?>
                            <?php if(!empty($msn)) {?>
                                <li><?php echo $msn; ?></li>
                            <?php } ?>
                            <?php if(!empty($skype)) {?>
                                <li><?php echo $skype; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>