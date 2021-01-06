<?php
$pg = @$url3;
$categoria = @$url4;
$numreg = 9; 
if (!isset($pg)) {
    $pg = 0;
}
if (!isset($categoria)) {
    $categoria = "";
}
$inicial = $pg * $numreg;
if(!empty($categoria)){
    $sql_conta = mysql_query("SELECT id FROM blog WHERE id_categoria = ".$categoria);
} else {
    $sql_conta = mysql_query("SELECT id FROM blog");
}
$quantreg = mysql_num_rows($sql_conta);
?>
<div class="container" id="blog">
    <div class="box_titulo" id="titulo_blog">
        <div class="box_titulo_texto">
            <h1>BLOG</h1>
        </div>
    </div>
    <div class="conteudo-pagina">
        <div class="row">
            <div class="col-md-12" id="categorias-blog">
                <a href="<?php echo $_SESSION['url'].$lang.'/blog/0/4';?>"><img src="<?php echo $_SESSION['url']; ?>images/receitas.png" alt="Receitas" /></a>
                <a href="<?php echo $_SESSION['url'].$lang.'/blog/0/1';?>"><img src="<?php echo $_SESSION['url']; ?>images/dicas.png" alt="Dicas" /></a>
                <a href="<?php echo $_SESSION['url'].$lang.'/blog/0/2';?>"><img src="<?php echo $_SESSION['url']; ?>images/eventos.png" alt="Eventos" /></a>
                <a href="<?php echo $_SESSION['url'].$lang.'/blog/0/3';?>"><img src="<?php echo $_SESSION['url']; ?>images/noticias.png" alt="Notícias" /></a>
				<a href="<?php echo $_SESSION['url'].$lang.'/blog/0/5';?>"><img src="<?php echo $_SESSION['url']; ?>images/videos.png" alt="Vídeos" /></a>
				<a href="http://croydon.com.br/uploads/index.php?tipo=download&arq=985234&ext=pdf" download> 
  <img src="<?php echo $_SESSION['url']; ?>images/cat_blog.png">
</a>
				
				
            </div>
        </div>
        <?php 
        if(@$url3 != 'post'){
            if(!empty($categoria)){
                $sql = "SELECT * FROM blog WHERE id_categoria = ".$categoria." ORDER BY id DESC LIMIT $inicial, $numreg";
            } else {
                $sql = "SELECT * FROM blog ORDER BY id DESC LIMIT $inicial, $numreg";
            }
            
            foreach (consulta($sql) as $posts){ 
                $titulo = $posts['titulo'];
                $texto  = $posts['texto'];
                $imagem = $posts['imagem'];
                $id = $posts['id'];
            ?>
                <div class="lista-blog">
                    <div class="col-md-7">
                        <h4><?php echo $titulo;?></h4>
                        <div class="texto-blog"><?php echo $texto;?></div>
                        <a href="<?php echo $_SESSION['url'].$lang.'/blog/post/'.$id;?>">Saiba mais</a>
                    </div>
                    <div class="col-md-5">
                        <img src="<?php echo $_SESSION['url']; ?>images/blog/<?php echo $imagem;?>" alt="<?php echo $titulo;?>" style="width: 100%;" />
                    </div>
                </div>
            <?php
            }
        } else {
            foreach (consulta("SELECT * FROM blog WHERE id = ".@$url4) as $post){ 
                $titulo = $post['titulo'];
                $texto  = $post['texto'];
                $imagem = $post['imagem'];
                $id = $post['id'];
            ?>
                <div class="post">
                    <h1><?php echo $titulo;?></h1>
                    <div class="texto-post"><?php echo $texto;?></div>
                    <img src="<?php echo $_SESSION['url']; ?>images/blog/<?php echo $imagem;?>" alt="<?php echo $titulo;?>" style="width: 100%;" />
                </div>
            <?php
            }
        }
        ?>
        <?php if(@$url3 != 'post'){ ?>
            <div class="row">
                <div class="col-md-12"><?php include('inc/paginacao_blog.php');?></div>
            </div>
        <?php } else { ?>
            <div class="post-voltar">
                <div id="paginacao">
                    <a href="<?php echo $_SESSION['url'].$lang.'/blog';?>">&lt;</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>