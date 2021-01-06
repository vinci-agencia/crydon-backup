<?php
/**
 * Created by PhpStorm.
 * User: Jaime
 * Date: 13/08/2015
 * Time: 10:14
 */
if((isset($_GET['ubuntuserver']))&&($_GET['ubuntuserver']=='adminCroydon15')) {
    $anoDocumento = date('Y');
    $ultimoAno = date('Y', strtotime('-1 year'));

    $mesDocumento = date('m');
//TRANSFORMAR EM MES POR EXTENSO
    switch ($mesDocumento) {
        case '01':
            $mesDocumento = str_replace($mesDocumento, "Janeiro", $mesDocumento);
            break;
        case '02':
            $mesDocumento = str_replace($mesDocumento, "Fevereiro", $mesDocumento);
            break;
        case '03':
            $mesDocumento = str_replace($mesDocumento, "Março", $mesDocumento);
            break;
        case '04':
            $mesDocumento = str_replace($mesDocumento, "Abril", $mesDocumento);
            break;
        case '05':
            $mesDocumento = str_replace($mesDocumento, "Maio", $mesDocumento);
            break;
        case '06':
            $mesDocumento = str_replace($mesDocumento, "Junho", $mesDocumento);
            break;
        case '07':
            $mesDocumento = str_replace($mesDocumento, "Julho", $mesDocumento);
            break;
        case '08':
            $mesDocumento = str_replace($mesDocumento, "Agosto", $mesDocumento);
            break;
        case '09':
            $mesDocumento = str_replace($mesDocumento, "Setembro", $mesDocumento);
            break;
        case '10':
            $mesDocumento = str_replace($mesDocumento, "Outubro", $mesDocumento);
            break;
        case '11':
            $mesDocumento = str_replace($mesDocumento, "Novembro", $mesDocumento);
            break;
        case '12':
            $mesDocumento = str_replace($mesDocumento, "Dezembro", $mesDocumento);
            break;
    }

//MES ANTERIOR

    $mesAnterior = date("m", strtotime('-1 month'));
    switch ($mesAnterior) {
        case '01':
            $mesAnterior = str_replace($mesAnterior, "Janeiro", $mesAnterior);
            break;
        case '02':
            $mesAnterior = str_replace($mesAnterior, "Fevereiro", $mesAnterior);
            break;
        case '03':
            $mesAnterior = str_replace($mesAnterior, "Março", $mesAnterior);
            break;
        case '04':
            $mesAnterior = str_replace($mesAnterior, "Abril", $mesAnterior);
            break;
        case '05':
            $mesAnterior = str_replace($mesAnterior, "Maio", $mesAnterior);
            break;
        case '06':
            $mesAnterior = str_replace($mesAnterior, "Junho", $mesAnterior);
            break;
        case '07':
            $mesAnterior = str_replace($mesAnterior, "Julho", $mesAnterior);
            break;
        case '08':
            $mesAnterior = str_replace($mesAnterior, "Agosto", $mesAnterior);
            break;
        case '09':
            $mesAnterior = str_replace($mesAnterior, "Setembro", $mesAnterior);
            break;
        case '10':
            $mesAnterior = str_replace($mesAnterior, "Outubro", $mesAnterior);
            break;
        case '11':
            $mesAnterior = str_replace($mesAnterior, "Novembro", $mesAnterior);
            break;
        case '12':
            $mesAnterior = str_replace($mesAnterior, "Dezembro", $mesAnterior);
            break;
    }

    $crcMes = getcwd() . '/follow-up/planilha_follow-up_' . $mesDocumento . '_' . $anoDocumento . '_' . '.xml';
    $crcMesTemp = getcwd() . '/temp_contato/planilha_follow-up_crc_' . $mesDocumento . '_' . $anoDocumento . '_' . '.xml';

    $crcMesAnterior = getcwd() . '/follow-up/planilha_follow-up_' . $mesAnterior . '_' . $anoDocumento . '_' . '.xml';
    $crcMesAnteriorTemp = getcwd() . '/temp_contato/planilha_follow-up_crc_' . $mesAnterior . '_' . $anoDocumento . '_' . '.xml';

    $crcAnoAnterior = getcwd() . '/follow-up/planilha_follow-up_' . $mesAnterior . '_' . $ultimoAno . '_' . '.xml';
    $crcAnoAnteriorTemp = getcwd() . '/temp_contato/planilha_follow-up_crc_' . $mesAnterior . '_' . $ultimoAno . '_' . '.xml';

    $AssistenciaMesAnterior = getcwd() . '/temp_contato/planilha_follow-up_' . $mesAnterior . '_' . $anoDocumento . '_' . '.xml';
    $AssistenciaAnoAnterior = getcwd() . '/temp_contato/planilha_follow-up_' . $mesAnterior . '_' . $ultimoAno . '_' . '.xml';

    //TESTE
    $teste = getcwd() . '/follow-up/teste_' . $mesAnterior . '_' . $anoDocumento . '_' . '.txt';

    if (file_exists($crcMes)) {
        unlink($crcMes);
        echo 'Arquivo CRC do mês foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo CRC do mês!<br/>';
    }
    if (file_exists($crcMesTemp)) {
        unlink($crcMesTemp);
        echo 'Arquivo CRC do mês no diretório temp foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo CRC do mês no diretório temp!<br/>';
    }

    if (file_exists($crcMesAnterior)) {
        unlink($crcMesAnterior);
        echo 'Arquivo CRC do mês anterior foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo CRC do mês anterior!<br/>';
    }
    if (file_exists($crcMesAnteriorTemp)) {
        unlink($crcMesAnteriorTemp);
        echo 'Arquivo CRC do mês anterior no diretório temp foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo CRC do mês anterior no diretório temp!<br/>';
    }

    if (file_exists($crcAnoAnterior)) {
        unlink($crcAnoAnterior);
        echo 'Arquivo CRC do ano anterior foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo CRC do ano anterior!<br/>';
    }
    if (file_exists($crcAnoAnteriorTemp)) {
        unlink($crcAnoAnteriorTemp);
        echo 'Arquivo CRC do ano anterior no diretório temp foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontado o arquivo CRC do ano anterior no diretório temp!<br/>';
    }

    if (file_exists($AssistenciaMesAnterior)) {
        unlink($AssistenciaMesAnterior);
        echo 'Arquivo Assistencia Tecnica do mês anterior no diretório temp foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo Assistencia Tecnica do mês anterior no diretório temp!<br/>';
    }
    if (file_exists($AssistenciaAnoAnterior)) {
        unlink($AssistenciaAnoAnterior);
        echo 'Arquivo Assistencia Tecnica do ano anterior no diretório temp foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo Assistencia Tecnica do ano anterior no diretório temp!<br/>';
    }

    //TESTE
    if (file_exists($teste)) {
        unlink($teste);
        echo 'Arquivo Teste do mês anterior foi deletado com sucesso!<br/>';
    }else{
        echo 'Não foi encontrado o arquivo Teste do mês anterior!<br/>';
    }
}else{
    echo "Erro!";
}

