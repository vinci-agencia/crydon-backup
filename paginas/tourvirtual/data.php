<?php
/**Autor: Jaime Matos
    Data:26/09/2012
    *O arquivo encontra-se comentado para que possa ajudar a terceiros nas futuras modifica�oes do arquivo
 * 
 */

# Conectando ao banco de Dados
$con    =   mysql_connect("dbmy0050.whservidor.com","croydon","@caxiasRJ86");
if (!$con){ die('Could not connect: ' . mysql_error()); }
mysql_select_db("croydon", $con);

# Variaveis Locais
$id     =   @$_POST['id'];          // O id da caixa de busca da pagina Index.
$data   =   @$_POST['data'];        // Valor da caixa de texto.

if ($id && $data)
{
    if ($id=='codigo')
    {
        $query  = "SELECT *
                  FROM estoque_sigla
                  WHERE sigla LIKE '%$data%'
                  LIMIT 5";

        $result = mysql_query($query);

        $dataList = array();

        while ($row = mysql_fetch_array($result))
        {
            $toReturn   = $row['sigla'];
            $dataList[] = '<li id="' .$row['sigla'] . '"><a href="#">' . htmlentities($toReturn) . '</a></li>';
        }

        if (count($dataList)>=1)
        {
            $dataOutput = join("\r\n", $dataList);
            echo $dataOutput;
        }
        else
        {
            echo '<li><a href="#">Este codigo nao existe</a></li>';
        }
    }
    

}
else
{
    echo 'Request Error';
}
?>
