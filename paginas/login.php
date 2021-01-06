<?php
if($lang == 'pt'){
	$txt = 'Logue-se e comece a fazer seu download. Caso ainda não esteja cadastrado cadastre-se!';
	$alert1 = 'Usuario logado. Pode fazer o download!';
	$alert2 = 'Usuario não cadastrado!';
}
else if($lang == 'es'){
	$txt = 'Entra y empieza a descargar. Si no se ha registrado registrate!';
	$alert1 = 'Usuario conectado. Puede descargarlo gratuitamente!';
	$alert2 = 'Usuario no registrado!';
}
else{
	$txt = 'Sign in and start to download it. If you have not registered sign up!';
	$alert1 = 'User logged. You can download it!';
	$alert2 = 'User not registered!';
}
?>
<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/downloads">Downloads</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Login</span>
    </div>
</div>
<p class="texto_internas"><?php echo $txt;?></p>
<div class="faq">
	<form id="form_login" action="" method="post">
	<?php if($lang == 'pt'){?>
        <label>Email:</label>
        <input type="text" name="login" />
        <label>Senha:</label>
        <input type="password" name="senha" />
        <input class="bt_enviar" type="submit" value="" name="Enviar" />
        <a class="btCadastrese" href="<?php echo $_SESSION['url'].$lang;?>/cadastro">Cadastre-se</a>
    <?php }else if($lang == 'es'){ ?>
        <label>Email:</label>
        <input type="text" name="login" />
        <label>Contraseña:</label>
        <input type="password" name="senha" />
        <input class="bt_enviar" type="submit" value="" name="Enviar" />
        <a class="btCadastrese" href="<?php echo $_SESSION['url'].$lang;?>/cadastro">Regístrate</a>
    <?php }else{ ?>
        <label>Login:</label>
        <input type="text" name="login" />
        <label>Password:</label>
        <input type="password" name="senha" />
        <input class="bt_enviar" id="bt_enviar_en" type="submit" value="" name="Enviar" />
        <a class="btCadastrese" href="<?php echo $_SESSION['url'].$lang;?>/cadastro">Sign up</a>
    <?php }?>
    </form>
</div>
<?php
if(isset($_POST['login'])){
	$_SESSION['login'] = $_POST['login'];
	$_SESSION['senha'] = md5($_POST['senha']);
	$sql = "SELECT id FROM clientes WHERE senha = '".$_SESSION['senha']."' AND email='".$_SESSION['login']."'";
	$query = mysql_query($sql);
	$res = mysql_num_rows($query);
	if($res > 0){
		$_SESSION['downAtivo'] = 'sim';
		echo "<script type='text/javascript'>
		alert('".$alert1."');
		window.location.href = '".$_SESSION['url'].$lang."/downloads';
		</script>";
	}
	else{
		echo "<script type='text/javascript'>
		alert('".$alert2."');
		</script>";
	}
}
?>