<?php
include('../inc/config.inc.php');

/**
* pega as cidades pelo id do estado
*/

$acao = isset($_GET['acao']) ? $_GET['acao'] : FALSE;

header('Content-Type: application/xml');

$xml = "<?xml version='1.0' encoding='iso-8859-1'?>\r\n";

switch ($acao){
    
    case 'buscaCidade':
        buscaCidade();
        break;
    
}

function buscaCidade(){
    
    $uf = isset($_GET['uf']) ? (int)$_GET['uf'] : 1;

    global $xml;
    $xml .= '<cidades>';
    
    $sql = "SELECT * FROM cidades WHERE estado_cod = '".$uf."' order by nome asc";
    $query = mysql_query($sql);

    while ($row = mysql_fetch_array($query)) {

        $xml .= '  <cidade>';
        $xml .= '    <id>' . $row['id'] . '</id>';
        $xml .= '    <nome>' . $row['nome'] . '</nome>';
        $xml .= '  </cidade>';
        
    }

    $xml .= '</cidades>';
    echo $xml;
}


?>