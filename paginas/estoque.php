<?php
@ini_set("display_errors", 1);
@ini_set("log_errors", 1);
@ini_set("error_reporting", E_ALL);
?>
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['url']; ?>css/estoque/css/style.css" />
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/estoque/js/1.4.2-jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/estoque/js/conversao.js"></script>
<!--Efeito na caixa de busca-->
<style>

    .ausu-suggest	{width: 600px;}
    #wrapper 		{margin-left: 38%; position: relative; margin-right: auto; margin-top:75px ;width:  600px;}
    h3 				{font-size: 11px; text-align: center;}
    span 			{font-size: 11px; font-weight: bold}

    a:link			{color: #F06;text-decoration: none;}
    a:visited 		{text-decoration: none;color: #F06;}
    a:hover 		{text-decoration: underline;color: #09F;}
    a:active		{text-decoration: none;color: #09F;}
</style>
<script src="<?php echo $_SESSION['url']; ?>js/estoque/javascript/scripts.js"></script>
<!--Scripts para caixa de busca-->
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/estoque/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/estoque/js/jquery.ausu-autosuggest.min.js"></script>
<script>
    $(document).ready(function() {
        $.fn.autosugguest({
            className: 'ausu-suggest',
            methodType: 'POST',
            minChars: 2,
            rtnIDs: true,
            dataFile: '<?php echo $_SESSION['url']; ?>paginas/data.php'
        });
    });
</script>

<div class="meio_geral">
    <div class="breadcrumb_internas">
        <div id="breadcrumb">
            <div class="borderLeft_bread"></div>
            <div class="borderRight_bread"></div>
            <img src="<?php echo $_SESSION['url']; ?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
            <a href="<?php echo $_SESSION['url'] . $lang; ?>/home">Home</a>
            <img src="<?php echo $_SESSION['url']; ?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            if ($lang == 'pt') {
                $name_pag1 = 'Estoque';
            }
            ?>
            <span><?php echo $name_pag1; ?></span>
            <img src="<?php echo $_SESSION['url']; ?>images/seta_bread.gif" alt="icone breadcrumb" />
            <?php
            foreach (consulta("select titulo_" . $lang . " from noticias where id = '$url3'") as $noticia) {
                ?>
                <span><?php echo $noticia['titulo_' . $lang]; ?></span>
                <?php
            }
            ?>
        </div>
    </div>
<?php
    if (isset($_SESSION['logado_propostas'])){
        ?>
    <div id="wrapper">
        <form action="" method="POST">
            <div class="ausu-suggest">
                <p id="tdfont2">Digite o Código da Maquina:</p>           
                <input type="text" size="25" value="" name="estoqueCroydon" id="codigo" autocomplete="off" /> 

                <input style="display: none" type="submit" value="OK"/>
                <input style="cursor: pointer" type="submit" value="OK"/>
            </div>           
    </div>
    <div style="clear:both"></div>
    <br/>
    <?php 
    //verificar ip do servidor
    //$ip = gethostbyname('croydon.ignorelist.com');
    if(isset($_POST['estoqueCroydon'])){
    $codigo = $_POST['estoqueCroydon'];
    $sqlEstoque = mysql_query("SELECT * FROM estoque_sigla AS es, estoque_descricao AS ed, estoque_saldo AS esd WHERE es.sigla = '$codigo' AND es.id = ed.id AND ed.id = esd.id");
    $resultadoEstoque = mysql_fetch_array($sqlEstoque);
    $linhaEstoque = mysql_num_rows($sqlEstoque);
    if ($linhaEstoque > 0) {
        $curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://croydon.dipmap.com/cgi-bin/estoque?estoqueCroydon='.$_POST['estoqueCroydon'],
    CURLOPT_PORT => 21,
    CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
    CURLOPT_FAILONERROR => 1,
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_TIMEOUT => 10
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
if(!curl_exec($curl)){
    die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
}
$saldo=(int)(str_ireplace('{"qtdisp":', "",$resp));
$saldo = (int)(intval($saldo*1)); 


// Close request to clear up some resources
curl_close($curl);
        ?>
        <table style="text-align: center" border="1" width="800" cellspacing="1">

            <thead>
                <tr>
                    <th>Sigla</th>
                    <th>Descrição</th>
                    <th>Saldo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $resultadoEstoque['sigla']; ?></td>
                    <td><?php echo $resultadoEstoque['descricao']; ?></td>
                    <?php
                    if($saldo <= 5){
                        $styleSaldo = 'style="color:#ED3237"';
                        $mensage = strtoupper ("Entre em contato para confirmar o estoque da maquina codigo: ".$resultadoEstoque['sigla']);
                        echo "<script>alert('".$mensage."');</script>";
                    }
                    else{
                        $styleSaldo = '';
                    }
                    date_default_timezone_set('America/Sao_Paulo');
                    ?>
                    <td <?php echo $styleSaldo; ?>><?php echo $saldo; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-size: small">* <?php echo "Consulta realizada em: " . date("d/m/Y H:i:s."); ?></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php
    }
    if ((isset($_POST['estoqueCroydon'])) AND ($linhaEstoque == 0)) {
        ?>
        <h3>Esta Maquina não esta cadastrada!</h3>
        <?php
    }
    }
    }
    else{
        echo "<script>alert('POR FAVOR FAÇA SEU LOGIN!');
		window.location.href = 'propostas'</script>";
    }
    ?>
</div>
</div>
