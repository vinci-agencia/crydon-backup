<style>
    #content{
        height: auto;
    }
    #form_contato input.input_form1{
        height: 27px;
        width: 333px;
    }
</style>
<script>
    function float2moeda(num) {

        x = 0;

        if(num < 0) {
            num = Math.abs(num);
            x = 1;
        }

        if(isNaN(num))
            num = "0";
        
        cents = Math.floor(num * 100 + 0.5) % 100;

        num = Math.floor((num*100+0.5)/100).toString();

        if(cents < 10) cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
            num = num.substring(0,num.length-(4*i+3))+'.'
            +num.substring(num.length-(4*i+3));

        ret = num + ',' + cents;

        if (x == 1) ret = ' - ' + ret;return ret;

    }

    function calculoTotal(){
        
        var total = 0;
        
        $(".subtotal_pedido").each(function(x){
            var subt = $(this).val();
            $(".valoripi_pedido").each(function(y){                
                var vali = $(this).val();
                if(x == y){
                    total = (Number(total) + (Number(subt) + Number(vali)));
                }
            })
        })
        
        $("#total").val(float2moeda(total));
        
    }
    
    function calculoDesconto(desc, valor){
        
        var porcent = Number(Number(desc/100) * Number(valor));
        return porcent;
        
    }
    
    $(document).ready(function(){

        $(".descontos").focusout(function() {
          
            $(".valor_sem_desconto").each(function(){

                var valor = $(this).val();
                var pos   = $(this).attr("pos"); 
                 
                if(valor != ""){
                    
                    var desc1 = Number($("#desc1").val());
                    var desc2 = Number($("#desc2").val());
                    var desc3 = Number($("#desc3").val());
                    var desc4 = Number($("#desc4").val());
                    var desc5 = Number($("#desc5").val());

                    if(desc1 != "")
                        valor = (valor - calculoDesconto(desc1, valor));

                    if(desc2 != "")
                        valor = (valor - calculoDesconto(desc2, valor));

                    if(desc3 != "")
                        valor = (valor - calculoDesconto(desc3, valor));

                    if(desc4 != "")
                        valor = (valor - calculoDesconto(desc4, valor));

                    if(desc5 != "")
                        valor = (valor - calculoDesconto(desc5, valor));

                    var qtd = $("#quantidade_pedido_"+pos).val(); 

                    if(qtd == "")
                        var subtotal = valor;
                    else
                        var subtotal = (valor * qtd);


                    $("#unitarios_pedido_format_"+pos).val(float2moeda(valor));
                    $("#unitarios_pedido_"+pos).val(valor);
                    $('#subtotal_pedido_'+pos).val(subtotal);
                    $('#subtotal_pedido_format_'+pos).val(float2moeda(subtotal));

                    total = 0;

                    $(".subtotal_pedido").each(function(){
                        var subt = $(this).val();
                        if(subt != "")
                            total = (total + Number(subt));
                    })

                    $("#total").val(float2moeda(total));
                }

            })
        
        })
    
        $(".bt-adicionar").click(function(e){
            e.preventDefault();
            var qtd = $(".line-pedidos").size();
            var pos = (qtd + 1);
            var html = "<div class='line-pedidos' style='float: left; margin: 0;'><div style='float:left; width:85px;'><label>C&oacute;digo</label><input class='input_form1 codigo_pedido' id='codigo_pedido_"+pos+"' pos='"+pos+"' type='text' name='codigo_pedido[]' /></div><div style='float:left; width:195px;'><label>Descri&ccedil;&atilde;o</label><input class='input_form1 descricao_pedido' id='descricao_pedido_"+pos+"' pos='"+pos+"' type='text' name='descricao_pedido[]' /></div><div style='float:left; width:85px;'><label>Quantidade</label><input class='input_form1 quantidade_pedido' id='quantidade_pedido_"+pos+"' pos='"+pos+"' type='text' name='quantidade_pedido[]' /></div><div style='float:left; width:85px;'><label>Unit&aacute;rio</label><input class='input_form1 unitarios_pedido_format' id='unitarios_pedido_format_"+pos+"' pos='"+pos+"' type='text' name='unitarios_pedido_format[]' readonly='readonly' /><input class='input_form1 unitarios_pedido' id='unitarios_pedido_"+pos+"' pos='"+pos+"' type='hidden' name='unitarios_pedido[]' readonly='readonly' /><input class='input_form1 valor_sem_desconto' id='valor_sem_desconto_"+pos+"' pos='"+pos+"' type='hidden' name='valor_sem_desconto[]' readonly='readonly' /></div><div style='float:left; width:85px;'><label>Subtotal</label><input class='input_form1 subtotal_pedido' id='subtotal_pedido_"+pos+"' pos='"+pos+"' type='hidden' name='subtotal_pedido[]' readonly='readonly' /><input class='input_form1 subtotal_pedido_format' id='subtotal_pedido_format_"+pos+"' pos='"+pos+"' type='text' name='subtotal_pedido_format[]' readonly='readonly' /></div><div style='float:left; width:85px;'><label>IPI</label><input class='input_form1 ipi_pedido' id='ipi_pedido_"+pos+"' pos='"+pos+"' type='text' name='ipi_pedido[]' /></div><div style='float:left; width:85px;'><label>Valor IPI</label><input class='input_form1 valoripi_pedido' id='valoripi_pedido_"+pos+"' pos='"+pos+"' type='hidden' name='valoripi_pedido[]' readonly='readonly' /><input class='input_form1 valoripi_pedido_format' id='valoripi_pedido_format_"+pos+"' pos='"+pos+"' type='text' name='valoripi_pedido_format[]' readonly='readonly' /></div></div>";
            $("#box-pedidos").append(html);
            $("#codigo_pedido_"+pos).focus();
        })
    
        $("#cnpj").focusout(function() {
            var id = $(this).val();
        
            $('#cod_cli').val("");
            $('#nome_cli').val("");
            $('#inscricao_cli').val("");
            $('#endereco_cli').val("");
            $('#bairro_cli').val("");
            $('#cidade_cli').val("");
            $('#uf_cli').val("");
            $('#cep_cli').val("");
            $('#email_cli').val("");
            $('#fax_cli').val("");
            $('#telefone_cli').val("");

            $.ajax({
                type: "GET",
                url: "../ajax/ajax_propostas.php",
                data: "acao=codigoCli&id="+id+"&codRep="+<?php echo $_SESSION['cod_rep']; ?>,
                dataType: "xml",
                success: function (xml) {
                    $(xml).find('clientes').each(function () {
                        $(xml).find('cliente').each(function () {
                            $('#cod_cli').val($(this).find('cod_cli').text());
                            $('#nome_cli').val($(this).find('nome').text());
                            $('#inscricao_cli').val($(this).find('inscr').text());
                            $('#endereco_cli').val($(this).find('endereco').text());
                            $('#bairro_cli').val($(this).find('bairro').text());
                            $('#cidade_cli').val($(this).find('municipio').text());
                            $('#uf_cli').val($(this).find('uf').text());
                            $('#cep_cli').val($(this).find('cep').text());
                            $('#email_cli').val($(this).find('eMail').text());
                            $('#contato_cli').val($(this).find('contato').text());
                            $('#fax_cli').val($(this).find('fax').text());
                            $('#telefone_cli').val($(this).find('fone').text());
                        });
                    });           
                },
                error: function () {
                    alert("Ocorreu um erro inesperado durante o processamento.");
                }
            });
        })
    
        $(".codigo_pedido").live("keyup", function(){
            var cod = $(this).val();
            var tam = cod.length;
            var uf  = $("#uf_cli").val();
            
            if(tam >= 6){
                if(uf != ""){
                    alert($(this).val())
                    var id  = $(this).val();
                    var pos = $(this).attr("pos");
                    var qtd = $("#quantidade_pedido_"+pos).val();
                    
                    $('#descricao_pedido_'+pos).val("");
                    $('#unitarios_pedido_format_'+pos).val("");
                    $('#unitarios_pedido_'+pos).val("");
                    $('#valor_sem_desconto_'+pos).val("");
                    $('#subtotal_pedido_'+pos).val("");
                    $('#subtotal_pedido_format_'+pos).val("");
                    $('#quantidade_pedido_'+pos).val("");

                    $.ajax({
                        type: "GET",
                        url: "../ajax/ajax_propostas.php",
                        data: "acao=codigoEquip&id="+id+"&uf="+uf,
                        dataType: "xml",
                        success: function (xml) {
                            $(xml).find('equipamentos').each(function () {
                                $(xml).find('equipamento').each(function () {
                                    
                                    var valor = $(this).find('preco').text();
                                    
                                    var desc1 = Number($("#desc1").val());
                                    var desc2 = Number($("#desc2").val());
                                    var desc3 = Number($("#desc3").val());
                                    var desc4 = Number($("#desc4").val());
                                    var desc5 = Number($("#desc5").val());
                                                                
                                    if(desc1 != "")
                                        valor = (valor - calculoDesconto(desc1, valor));
                                    
                                    if(desc2 != "")
                                        valor = (valor - calculoDesconto(desc2, valor));
                                    
                                    if(desc3 != "")
                                        valor = (valor - calculoDesconto(desc3, valor));
                                    
                                    if(desc4 != "")
                                        valor = (valor - calculoDesconto(desc4, valor));
                                    
                                    if(desc5 != "")
                                        valor = (valor - calculoDesconto(desc5, valor));
                                           
                                    var preco = valor;
                                    
                                    if(qtd == "")
                                        var subtotal = valor;
                                    else
                                        var subtotal = (valor * qtd);
                                    
                                    $('#descricao_pedido_'+pos).val($(this).find('descricao').text());
                                    $('#unitarios_pedido_'+pos).val(preco);
                                    $('#unitarios_pedido_format_'+pos).val(float2moeda(preco));
                                    $('#valor_sem_desconto_'+pos).val($(this).find('preco').text());
                                    $('#subtotal_pedido_'+pos).val(subtotal);
                                    $('#subtotal_pedido_format_'+pos).val(float2moeda(subtotal));
                                    $('#quantidade_pedido_'+pos).val(1);
                                    
                                    total = 0;
                                    
                                    $(".subtotal_pedido").each(function(){
                                        var subt = $(this).val();
                                        if(subt != "")
                                            total = (total + Number(subt));
                                    })
                                    
                                    $("#total").val(float2moeda(total));
                                });
                            });           
                        },
                        error: function () {
                            alert("Ocorreu um erro inesperado durante o processamento.");
                        }
                    });
                }
                else{
                    alert("Preencha a UF do cliente!");
                }
            }
            
                
        })
        
        $(".codigo_pedido").live("focusout", function(){
            var cod = $(this).val();
            var tam = cod.length;
            var uf  = $("#uf_cli").val();
     
            if(tam >= 6){
                if(uf != ""){
                    var id  = $(this).val();
                    var pos = $(this).attr("pos");
                    var qtd = $("#quantidade_pedido_"+pos).val();
                    
                    $('#descricao_pedido_'+pos).val("");
                    $('#unitarios_pedido_format_'+pos).val("");
                    $('#unitarios_pedido_'+pos).val("");
                    $('#valor_sem_desconto_'+pos).val("");
                    $('#subtotal_pedido_'+pos).val("");
                    $('#subtotal_pedido_format_'+pos).val("");
                    $('#quantidade_pedido_'+pos).val("");

                    $.ajax({
                        type: "GET",
                        url: "../ajax/ajax_propostas.php",
                        data: "acao=codigoEquip&id="+id+"&uf="+uf,
                        dataType: "xml",
                        success: function (xml) {
                            $(xml).find('equipamentos').each(function () {
                                $(xml).find('equipamento').each(function () {
                                    
                                    var valor = $(this).find('preco').text();
                                    
                                    var desc1 = Number($("#desc1").val());
                                    var desc2 = Number($("#desc2").val());
                                    var desc3 = Number($("#desc3").val());
                                    var desc4 = Number($("#desc4").val());
                                    var desc5 = Number($("#desc5").val());
                                                                
                                    if(desc1 != "")
                                        valor = (valor - calculoDesconto(desc1, valor));
                                    
                                    if(desc2 != "")
                                        valor = (valor - calculoDesconto(desc2, valor));
                                    
                                    if(desc3 != "")
                                        valor = (valor - calculoDesconto(desc3, valor));
                                    
                                    if(desc4 != "")
                                        valor = (valor - calculoDesconto(desc4, valor));
                                    
                                    if(desc5 != "")
                                        valor = (valor - calculoDesconto(desc5, valor));
                                            
                                    var preco = valor;
                                    
                                    if(qtd == "")
                                        var subtotal = valor;
                                    else
                                        var subtotal = (valor * qtd);
                                    
                                    $('#descricao_pedido_'+pos).val($(this).find('descricao').text());
                                    $('#unitarios_pedido_format_'+pos).val(float2moeda(preco));
                                    $('#unitarios_pedido_'+pos).val(preco);
                                    $('#valor_sem_desconto_'+pos).val($(this).find('preco').text());
                                    $('#subtotal_pedido_'+pos).val(subtotal);
                                    $('#subtotal_pedido_format_'+pos).val(float2moeda(subtotal));
                                    $('#quantidade_pedido_'+pos).val(1);
                                    
                                    total = 0;
                                    
                                    $(".subtotal_pedido").each(function(){
                                        var subt = $(this).val();
                                        if(subt != "")
                                            total = (total + Number(subt));
                                    })
                                    
                                    $("#total").val(float2moeda(total));
                                });
                            });           
                        },
                        error: function () {
                            alert("Ocorreu um erro inesperado durante o processamento.");
                        }
                    });
                }
                else{
                    alert("Preencha a UF do cliente!");
                }
            }
            else if(tam == 0){
                var pos = $(this).attr("pos");
                
                $('#descricao_pedido_'+pos).val("");
                $('#unitarios_pedido_'+pos).val("");
                $('#unitarios_pedido_format_'+pos).val("");
                $('#valor_sem_desconto_'+pos).val("");
                $('#subtotal_pedido_'+pos).val("");
                $('#subtotal_pedido_format_'+pos).val("");
                $('#quantidade_pedido_'+pos).val("");
                $('#ipi_pedido_'+pos).val("");
                $('#valoripi_pedido_'+pos).val("");
                $('#valoripi_pedido_format_'+pos).val("");
            }
                
        })
    
        $("#cod_trans").change(function() {
            var id = $(this).val();

            $('#telefone_trans').val("");

            $.ajax({
                type: "GET",
                url: "../ajax/ajax_propostas.php",
                data: "acao=codigoTrans&id="+id,
                dataType: "xml",
                success: function (xml) {
                    $(xml).find('transportadoras').each(function () {
                        $(xml).find('transportadora').each(function () {
                            $('#cnpj_trans').val($(this).find('cnpj').text());
                            $('#inscricao_trans').val($(this).find('ie').text());
                            $('#endereco_trans').val($(this).find('endereco').text());
                            $('#cep_trans').val($(this).find('cep').text());
                            $('#bairro_trans').val($(this).find('bairro').text());
                            $('#cidade_trans').val($(this).find('municipio').text());
                            $('#uf_trans').val($(this).find('uf').text());
                            $('#telefone_trans').val($(this).find('fone').text());
                        });
                    });           
                },
                error: function () {
                    alert("Ocorreu um erro inesperado durante o processamento.");
                }
            });
        })
        
        $(".quantidade_pedido").live("focusout", function(){
            var qtd = $(this).val()
            var pos = $(this).attr("pos");
            var er = /^[0-9]+$/;
            var preco = $('#unitarios_pedido_'+pos).val();
            var total = 0;
     
            if(preco != ""){
                if(er.test(qtd)){
                    var subtotal = (preco * qtd);
                    $('#subtotal_pedido_'+pos).val(subtotal);
                    $('#subtotal_pedido_format_'+pos).val(float2moeda(subtotal));
                }
            }
            
            $(".subtotal_pedido").each(function(){
                var subt = $(this).val();
                if(subt != "")
                    total = (total + Number(subt));
            })

            $("#total").val(float2moeda(total));
            
        })
        
        $(".ipi_pedido").live("focusout", function(){
            var ipi = Number($(this).val());
            var pos = Number($(this).attr("pos"));
            var subtotal = Number($('#subtotal_pedido_'+pos).val());
            var total_ipi = (ipi * subtotal);
            $('#valoripi_pedido_'+pos).val(total_ipi);
            $('#valoripi_pedido_format_'+pos).val(float2moeda(total_ipi));
            
            calculoTotal();
        })
        
         $("#btEnviar").click(function(){
            $("#form_pedido").submit();
        })

    })
</script>
<?php
$mens = "";

if (!isset($_SESSION['logado_propostas'])) {
    if ($_POST) {
        $sql = "SELECT * FROM login_representantes WHERE login = '" . $_POST['login'] . "' AND senha = '" . $_POST['senha'] . "'";

        if (consulta($sql)) {
            $_SESSION['logado_propostas'] = true;

            foreach (consulta($sql) as $rep) {
                $cod_rep = $rep['codigo_representante'];
            }

            $sql2 = "SELECT * FROM propostas_representantes WHERE pkCodRep = '" . $cod_rep . "'";

            if (consulta($sql2)) {
                foreach (consulta($sql2) as $representante) {
                    $_SESSION['nome_rep'] = $representante['nome'];
                    $_SESSION['cod_rep'] = $representante['pkCodRep'];
                    $_SESSION['endereco_rep'] = $representante['Logradouro'] . ' ' . $representante['Numero'] . ' ' . $representante['Complemento'];
                    $_SESSION['bairro_rep'] = $representante['Bairro'];
                    $_SESSION['cidade_rep'] = $representante['Municipio'];
                    $_SESSION['uf_rep'] = $representante['Estado'];
                    $_SESSION['telefone_rep'] = $representante['Telefone'];
                    $_SESSION['email_rep'] = $representante['eMail'];
                }
            }

            echo "<script>location.href = location.href;</script>";
        } else {
            $mens = "<p style='color: red;'>Login ou senha incorretos</p>";
        }
    }
} else {
    if ($_POST) {

        if($_POST['email_representante'] != "")
            $mail_rep = ','.$_POST['email_representante'];
        else
            $mail_rep = "";
        
        $mm = 'marketing@croydon.com.br,pedidos@croydon.com.br'.$mail_rep;

        $m = "";
        $m .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        
        foreach ($_POST as $key => $val) {

            if (!is_array($val) && $key != "total") {
                if($val != ""){
                    $m .= "<tr>
                            <td width='100%'>
                                <b>" . strtoupper(str_replace("_", " ", $key)) . " : </b>".$val."
                            </td>
                        </tr>  
                        <tr><td>&nbsp;</td></tr>";
                }
            }
        }

        $html_desc = "";
        foreach($_POST['desconto_pagamento'] as $desc){
            if($desc != ""){
                $html_desc .= $desc.'% ,';
            }
        }
        
        $m .= "<tr>
                        <td width='100%'>
                            <b>DESCONTOS : </b>" . substr($html_desc,0,-2) . "
                        </td>
                    </tr><tr><td>&nbsp;</td></tr></table>";

        $q = (count($_POST['codigo_pedido']) - 1);

        $m .= '<table width="100%" border="0" cellspacing="10" cellpadding="0">';
        $m .= "<tr><th width='10%'>CODIGO</th><th width='25%'>DESCRICAO</th><th width='10%'>QTD</th><th width='15%'>UNITARIOS</th><th width='15%'>SUBTOTAL</th><th width='10%'>IPI</th><th width='15%'>VALOR IPI</th></tr>";
        
        for ($x = 0; $x <= $q; $x++) {
            if ($_POST['codigo_pedido'][$x] != "") {
                $m .= "<tr>
                            <td style='text-align: center;'>" . $_POST['codigo_pedido'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['descricao_pedido'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['quantidade_pedido'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['unitarios_pedido_format'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['subtotal_pedido_format'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['ipi_pedido'][$x] . "</td>
                            <td style='text-align: center;'>" . $_POST['valoripi_pedido_format'][$x] . "</td>
                        </tr>";
            }
        }
        
        $m .= '</table>';
        $m .= '<table width="100%" border="0" cellspacing="0" cellpadding="0">';
        $m .= "<tr><td>&nbsp;</td></tr><tr><td rowspan='2'><b>TOTAL</b></td><td>" . $_POST['total'] . "</td></tr></table>";
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From:SITE CROYDON <site@croydon.com.br>\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        
        if (mail($mm, 'PEDIDO ONLINE - REPRESENTANTE: '.$_POST["cod_rep"], $m, $headers)) {
            echo '<script>alert("Enviado com sucesso!");</script>';
        } else {
            echo '<script>alert("Erro, Tente novamente!");</script>';
        }
    }
}
?>
<div class="breadcrumb_internas">
    <div id="breadcrumb">
        <div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url']; ?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'] . $lang; ?>/home">Home</a>
        <img src="<?php echo $_SESSION['url']; ?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Pedido</span>
    </div>
</div>
<p class="texto_internas">CROYDON, s&iacute;mbolo de qualidade em equipamentos para Hot&eacute;is, Bares e Restaurantes desde 1962.</p>
<?php if (isset($_SESSION['logado_propostas'])) : ?>
    <form id="form_pedido" action="" name="pedido" method="post">

        <!-- Campos Representante -->
        <div style="margin:0; width:100%; float:left;">
            <h3>Representante</h3>
            <div style="float:left; width:260px;">
                <label>C&oacute;digo</label>
                <input value="<?php echo isset($_SESSION['cod_rep']) ? $_SESSION['cod_rep'] : ''; ?>" class="input_form1" id="cod_rep" type="text" name="cod_rep" />

                <label>Endere&ccedil;o</label>
                <input value="<?php echo isset($_SESSION['endereco_rep']) ? $_SESSION['endereco_rep'] : ''; ?>" class="input_form1" type="text" name="endereco_representante" />

                <label>CEP</label>
                <input value="<?php echo isset($_SESSION['cep_rep']) ? $_SESSION['cep_rep'] : ''; ?>" class="input_form1" type="text" name="cep_representante" />

                <label>E-mail</label>
                <input value="<?php echo isset($_SESSION['email_rep']) ? $_SESSION['email_rep'] : ''; ?>" class="input_form1" type="text" name="email_representante" />

                <label>N&uacute;mero do Pedido</label>
                <input class="input_form1" type="text" name="numero_pedido" />

                <label>Fornecedor</label>
                <input class="input_form1" type="text" name="fornecedor" value="CROYDON" />
            </div>
            <div style="float:left; width:260px;">
                <label>Emissor do Pedido</label>
                <input value="<?php echo isset($_SESSION['nome_rep']) ? $_SESSION['nome_rep'] : ''; ?>" class="input_form1" id="nome_rep" type="text" name="emissor_pedido" />

                <label>Bairro</label>
                <input value="<?php echo isset($_SESSION['bairro_rep']) ? $_SESSION['bairro_rep'] : ''; ?>" class="input_form1" type="text" name="bairro_representante" />

                <label>Telefone</label>
                <input value="<?php echo isset($_SESSION['telefone_rep']) ? $_SESSION['telefone_rep'] : ''; ?>" class="input_form1" type="text" name="telefone_representante" />

                <label>Data de Emiss&atilde;o</label>
                <input class="input_form1" type="text" name="data_pedido" />

                <label>Vendedor(a)</label>
                <input class="input_form1" type="text" name="Vendedor" value="Vendedor" />
            </div>
            <div style="float:left; width:260px; padding-top:60px;">
                <label>Cidade</label>
                <input value="<?php echo isset($_SESSION['cidade_rep']) ? $_SESSION['cidade_rep'] : ''; ?>" class="input_form1" type="text" name="cidade_representante" />
            </div>
            <div style="float:left; width:65px; padding-top:60px;">
                <label>UF</label>
                <input value="<?php echo isset($_SESSION['uf_rep']) ? $_SESSION['uf_rep'] : ''; ?>" class="input_form1" type="text" name="uf_representante" />
            </div>
        </div>
        <!-- Final dos campos Representante -->
        <!-- Campos Cliente -->
        <div style="margin:0; width:100%; float:left;">
            <h3>Cliente</h3>
            <div style="float:left; width:260px;">
                <label>C&oacute;digo Cliente</label>
                <input class="input_form1" type="text" id="cod_cli" name="cod_cli" />

                <label>CNPJ</label>
                <input class="input_form1" type="text" id="cnpj" name="cnpj_cli" />

                <label>Endere&ccedil;o</label>
                <input class="input_form1" type="text" id="endereco_cli" name="endereco_cli" />

                <label>CEP</label>
                <input class="input_form1" type="text" id="cep_cli" name="cep_cli" />

                <label>Email</label>
                <input class="input_form1" type="text" id="email_cli" name="email_cli" />
            </div>
            <div style="float:left; width:260px;">
                <label>Cliente</label>
                <input class="input_form1" type="text" id="nome_cli" name="cliente" />

                <label>Inscri&ccedil;&atilde;o Estadual</label>
                <input class="input_form1" type="text" id="inscricao_cli" name="inscricao_estadual" />

                <label>Bairro</label>
                <input class="input_form1" type="text" id="bairro_cli" name="bairro_cli" />

                <label>Telefone</label>
                <input class="input_form1" type="text" id="telefone_cli" name="telefone_cli" />
            </div>
            <div style="float:left; width:260px; padding-top:120px;">
                <label>Cidade</label>
                <input class="input_form1" type="text" id="cidade_cli" name="cidade_cli" />

                <label>Fax</label>
                <input class="input_form1" type="text" id="fax_cli" name="fax_cli" />
            </div>
            <div style="float:left; width:65px; padding-top:120px;">
                <label>UF</label>
                <input class="input_form1" id="uf_cli" type="text" name="uf_cli" />
            </div>
        </div>
        <!-- Final dos campos Cliente -->
        <!-- Campos Transportadora -->
        <div style="margin:0; width:100%; float:left;">
            <h3>Transportadora</h3>
            <div style="float:left; width:260px;">
                <label style="margin-top:8px;">Transportadora</label>
                <select id="cod_trans" name="transportadora">
                    <option value="">Selecione</option>
                    <?php
                    foreach (consulta("SELECT * FROM propostas_transportadoras ORDER BY nome ASC") as $trans) {
                        echo "<option value='" . $trans['nome'] . "'>" . $trans['nome'] . "</option>";
                    }
                    ?>
                </select>

                <label>CNPJ</label>
                <input class="input_form1" type="text" id="cnpj_trans" name="cnpj_trans" />

                <label>Endere&ccedil;o</label>
                <input class="input_form1" type="text" id="endereco_trans" name="endereco_trans" />

                <label>CEP</label>
                <input class="input_form1" type="text" id="cep_trans" name="cep_trans" />
            </div>
            <div style="float:left; width:260px; padding-top:60px;">
                <label>Inscri&ccedil;&atilde;o Estadual</label>
                <input class="input_form1" type="text" id="inscricao_trans" name="inscricao_trans" />

                <label>Bairro</label>
                <input class="input_form1" type="text" id="bairro_trans" name="bairro_trans" />

                <label>Telefone</label>
                <input class="input_form1" type="text" id="telefone_trans" name="telefone_trans" />
            </div>
            <div style="float:left; width:260px; padding-top:120px;">
                <label>Cidade</label>
                <input class="input_form1" type="text" id="cidade_trans" name="cidade_trans" />
            </div>
            <div style="float:left; width:65px; padding-top:120px;">
                <label>UF</label>
                <input class="input_form1" type="text" id="uf_trans" name="uf_trans" />
            </div>
        </div>
        <!-- Finald dos campos Transportadora -->
        <!-- Campos Condi&ccedil;&otilde;es de Pagamento -->
        <div style="margin:0; width:100%; float:left;">
            <h3>Condi&ccedil;&otilde;es de Pagamento</h3>
            <div style="float:left; width:100%;">
                <label>Prazo</label>
                <input style="width: 200px;" class="input_form1" type="text" id="prazo_pagamento" name="prazo_pagamento" />
            </div>
            <div style="float:left; width:100%;">
                <div style="width: 100px; float: left;">
                    <label>Desconto1</label>
                    <input style="width:70%;" id="desc1" class="input_form1 descontos" type="text" name="desconto_pagamento[]" />
                    <span>%</span>
                </div>
                <div style="width: 100px; float: left;">
                    <label>Desconto2</label>
                    <input style="width:70%;" id="desc2" class="input_form1 descontos" type="text" name="desconto_pagamento[]" />
                    <span>%</span>
                </div>
                <div style="width: 100px; float: left;">
                    <label>Desconto3</label>
                    <input style="width:70%;" id="desc3" class="input_form1 descontos" type="text" name="desconto_pagamento[]" />
                    <span>%</span>
                </div>
                <div style="width: 100px; float: left;">
                    <label>Desconto4</label>
                    <input style="width:70%;" id="desc4" class="input_form1 descontos" type="text" name="desconto_pagamento[]" />
                    <span>%</span>
                </div>
                <div style="width: 100px; float: left;">
                    <label>Desconto5</label>
                    <input style="width:70%;" id="desc5" class="input_form1 descontos" type="text" name="desconto_pagamento[]" />
                    <span>%</span>
                </div>
            </div>
        </div>
        <div style="margin:0; width:100%; float:left;">
            <h3>Observa&ccedil;&otilde;es</h3>
            <textarea name="obs"></textarea>
        </div>
        <!-- Final dos campos Condi&ccedil;&otilde;es de Pagamento -->
        <!-- Campos Pedido -->
        <div style="margin:0; width:100%; float:left;">
            <h3>Pedido</h3>

            <div id="box-pedidos" style="float: left;  margin: 0;">
                <?php for ($x = 1; $x <= 20; $x++) : ?>
                    <div class="line-pedidos" style="float: left; margin: 0;">
                        <div style="float:left; width:85px;">
                            <label>C&oacute;digo</label>
                            <input class="input_form1 codigo_pedido" id="codigo_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="codigo_pedido[]" />
                        </div>
                        <div style="float:left; width:195px;">
                            <label>Descri&ccedil;&atilde;o</label>
                            <input class="input_form1 descricao_pedido" id="descricao_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="descricao_pedido[]" />
                        </div>
                        <div style="float:left; width:85px;">
                            <label>Quantidade</label>
                            <input class="input_form1 quantidade_pedido" id="quantidade_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="quantidade_pedido[]" />
                        </div>
                        <div style="float:left; width:85px;">
                            <label>Unit&aacute;rio</label>
                            <input class="input_form1 unitarios_pedido_format" id="unitarios_pedido_format_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="unitarios_pedido_format[]" readonly="readonly"/>
                            <input class="input_form1 unitarios_pedido" id="unitarios_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="hidden" name="unitarios_pedido[]" readonly="readonly"/>
                            <input class="input_form1 valor_sem_desconto" id="valor_sem_desconto_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="hidden" name="valor_sem_desconto[]" readonly="readonly"/>
                        </div>
                        <div style="float:left; width:85px;">
                            <label>Subtotal</label>
                            <input class="input_form1 subtotal_pedido_format" id="subtotal_pedido_format_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="subtotal_pedido_format[]" readonly="readonly"/>
                            <input class="input_form1 subtotal_pedido" id="subtotal_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="hidden" name="subtotal_pedido[]" readonly="readonly"/>
                        </div>
                        <div style="float:left; width:85px;">
                            <label>IPI</label>
                            <input class="input_form1 ipi_pedido" id="ipi_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="ipi_pedido[]" />
                        </div>
                        <div style="float:left; width:85px;">
                            <label>Valor IPI</label>
                            <input class="input_form1 valoripi_pedido" id="valoripi_pedido_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="hidden" name="valoripi_pedido[]" readonly="readonly"/>
                            <input class="input_form1 valoripi_pedido_format" id="valoripi_pedido_format_<?php echo $x; ?>" pos="<?php echo $x; ?>" type="text" name="valoripi_pedido_format[]" readonly="readonly"/>
                        </div>    
                    </div>
                <?php endfor; ?>    
            </div>

            <div style="float:left; width:510px;">
                <a class="bt-adicionar" href="#"><span>Adicionar Mais Produtos</span></a>
            </div>
            <div style="float:left; margin-top:20px;">
                <!--                <label>
                                    <span class="grande">Subtotal</span>
                                    <input class="input_form1" type="text" id="codigo_pedido" name="subtotal" />
                                </label>-->
                <label>
                    <span class="grande">Total</span>
                    <input class="input_form1" type="text" id="total" name="total" />
                </label>
            </div>
            <div style="float:left; margin-top:20px; width:100%;">
                <label style="float: left; width: auto;"> 
                    <input type="button" id="btEnviar" class="btEnviar" value="" />
                </label>
                <a style="font-size: 15px; float: left; margin: 10px 0 0 15px; text-decoration: underline;" href="<?php echo $_SESSION['url'] . $lang . '/propostas'; ?>">Limpar</a>
            </div>
        </div>
        <!-- Final dos campos Pedido -->
    </form>
<?php else : ?>
    <form style="width: 960px;" id="form_contato" action="" name="contato" method="post">
        <div style="float: left; width: 380px;">
            <label>Login</label>
            <input class="input_form1" type="text" name="login" />

            <label>Senha</label>
            <input class="input_form1" type="password" name="senha" />
        </div>
        <div style="float: left; width: 100%">
            <input type="submit" class="btEnviar" value="" /> 
        </div>
    </form>
    <?php
    echo $mens;
endif;
?>
