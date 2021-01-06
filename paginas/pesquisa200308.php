<?php
/**
 * Created by PhpStorm.
 * User: Jaime Matos
 * Date: 03/10/14
 * Time: 11:23
 */
?>
<script type="text/javascript" src="<?php echo $_SESSION['url']; ?>js/maskedinput-1.1.4.js"></script>
<script type="text/javascript">
    /* M?scara Dinamica para telefones de 9 e 8 digitos*/
    function mascara(o, f) {
        v_obj = o
        v_fun = f
        setTimeout("execmascara()", 1)
    }
    function execmascara() {
        v_obj.value = v_fun(v_obj.value)
    }
    function mtel(v) {
        v = v.replace(/\D/g, "");             //Remove tudo o que n?o ? d?gito
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca par?nteses em volta dos dois primeiros d?gitos
        v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca h?fen entre o quarto e o quinto d?gitos
        return v;
    }
    function id(el) {
        return document.getElementById(el);
    }
    window.onload = function () {
        id('telefone').onkeypress = function () {
            mascara(this, mtel);
        }
    };
</script>

<script>
    $(document).ready(function () {
        //$(".telefone").mask("(99) 9999-9999");

        $('#estado').change(function () {
            var uf = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?php echo $_SESSION['url'];?>paginas/estados.php",
                data: "acao=buscaCidade&uf=" + uf,
                dataType: "xml",
                success: function (xml) {
                    var html = '<option value="">Selecione</option>';
                    $(xml).find('cidades').each(function () {
                        $(xml).find('cidade').each(function () {
                            var cidade = $(this).find('nome').text();
                            var id_cidade = $(this).find('id').text();
                            html += "<option value='" + id_cidade + "'>" + cidade + "</option>";
                        });
                    });
                    $('#cidade').html(html);
                },
                error: function () {
                    alert("Ocorreu um erro inesperado durante o processamento.");
                }
            });

        })

        $("#departamento").change(function () {
            if ($(this).val() == "vendas@croydon.com.br")
                $("#area_atuacao").show();
            else
                $("#area_atuacao").hide();
        })

        $("#area_atuacao_select").change(function () {
            if ($(this).val() == "outros")
                $("#outra_atuacao").show();
            else
                $("#outra_atuacao").hide();
        })
    })
</script>
<script language='JavaScript'>
    function SomenteNumero(e){
        var tecla=(window.event)?event.keyCode:e.which;
        if((tecla>47 && tecla<58)) return true;
        else{
            if (tecla==8 || tecla==0) return true;
            else  return false;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_finish').click(function(){
            var a1_1=$('#a1_1').val();
            var a1_2=$('#a1_2').val();
            var a1_6=$('#a1_6').val();
            var a1_7=$('#a1_7').val();
            var a2_2=$('#a2_2').val();
            var a2_4=$('#a2_4').val();
            var empresa=$('#empresa').val();
            var nome=$('#nome').val();
            var telefone=$('#telefone').val();
            var email=$('#email').val();
            if ($("#a1_1:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "1.1 - Telefone, E-mail, Whatsapp e Site:"</span>');
                return false;
            }
            if ($("#a1_2:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "1.2 - Representante (atendimento externo):"</span>');
                return false;
            }
            if ($("#a1_6:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "1.6- Preço do produto:"</span>');
                return false;
            }
            if ($("#a1_7:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "1.7 - Cumprimento dos prazos de entrega:"</span>');
                return false;
            }
            if ($("#a2_2:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "2.2 - Assistência Técnica::"</span>');
                return false;
            }
            if ($("#a2_4:checked").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha a opção "2.4 - Qualidade do produto:"</span>');
                return false;
            }
    

            if ($("#empresa").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha o campo "Nome da Empresa"</span>');
                return false;
            }
            if ($("#nome").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha o campo "Responsável pelas informações:"</span>');
                return false;
            }
            if ($("#telefone").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha o campo "telefone"</span>');
                return false;
            }
            if ($("#email").length == 0){
                $('#dis').slideDown().html('<span id="error">Por favor Preencha o campo "email"</span>');
                return false;
            }

        });
    });
</script>


<style>
    #dis{
        font-style: oblique;
        color: red;
    }
    .section{
        background-color: #BDBBBC;
        border-radius: 10px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        padding: 10px;
    }
    .titulopage{
        border-bottom: 2px solid #BDBBBC;
    }
    #question_q5{
        width: 46% !important;
        float:left !important;
        clear: none !important;
        /*margin-left: 5% !important;*/

    }
    .novo{
        margin-bottom: 0px !important;
    }
</style>

<div class="breadcrumb_internas">
    <div id="breadcrumb">
        <!--<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url']; ?>images/icone_bradcrumb.gif" alt="icone breadcrumb"/>
        <a href="<?php echo $_SESSION['url'] . $lang; ?>/home">Home</a>
        <img src="<?php echo $_SESSION['url']; ?>images/seta_bread.gif" alt="icone breadcrumb"/>-->
        <?php
        if ($lang == 'pt') {
            $name_pag = '';
        } else if ($lang == 'es') {
            $name_pag = '';
        } else {
            $name_pag = '';
        }
        ?>
        <span style="text-align: center;"><?php echo $name_pag; ?></span>
    </div>
</div>
<?php

foreach (consulta("select texto_" . $lang . " from contato order by id desc LIMIT 1") as $contato) {

    $texto = $contato['texto_' . $lang];

    if ($lang == 'pt') {
        ?>

        <link rel="stylesheet" href="/css/pesquisa/exp/reset.css%3Ffb87f3f0ea.css"/>


        <!-- respview.css -->
        <link rel="stylesheet"
              href="/css/pesquisa/exp/support/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css%3Fad7753b880.css"/>
        <link rel="stylesheet"
              href="/css/pesquisa/exp/support/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.beacon.css%3F3e119d5110.css"/>
        <link rel="stylesheet" href="/css/pesquisa/support/fontawesome/css/font-awesome.css"/>
        <link rel="stylesheet" href="/css/pesquisa/fonts/iconFonts.css"/>
        <link rel="stylesheet" href="/css/pesquisa/exp/survey.respondent-pre120.css%3Fdbe5fd02a2.css"/>

        <!--[if IE 8]>
        <link rel="stylesheet" href="/css/pesquisa/exp/survey.respondent.ie8.css?ec74f8bf13" media="all"/><![endif]-->
        <!--[if IE 7]>
        <link rel="stylesheet" href="/css/pesquisa/exp/survey.respondent.ie7.css?cbacd3c153" media="all"/><![endif]-->
        <!--[if IE 6]>
        <link rel="stylesheet" href="/css/pesquisa/exp/survey.respondent.ie6.css?d41d8cd98f" media="all"/><![endif]-->







        <!-- extra Head -->
        <!-- lib/steam/fir/v2/styles.xml -->
        <link rel='stylesheet' href='/css/pesquisa/v2/font-awesome.css%3F065325f5d0.css'/>

        <link rel='stylesheet' href='/css/pesquisa/v2/fir.css%3F3b4370ddda.css'/>
        <style>

            #question_q1 .sq-fir-image {

            }

            #question_q1 .radio .sq-fir-image {
                background-image: url('/css/pesquisa/gfc_btn_demoSite.png');
                height: 30px;
                width: 30px;
            }

            #question_q1 .checkbox .sq-fir-image {

            }

            #question_q1 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na) {

                behavior: url(/css/pesquisa/v2/PIE.htc);
            }

            #question_q1 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na).checked {

            }

            #question_q1 .sq-fir-wrap.sq-fir-icon.sq-fir-disabled {

            }

            #question_q1 .sq-fir-wrap .sq-fir-icon {

            }

            #question_q1 .sq-fir-wrap.checked .sq-fir-icon {

            }
        </style><!-- lib/steam/fir/v2/styles.xml -->

        <style>

            #question_q2 .sq-fir-image {

            }

            #question_q2 .radio .sq-fir-image {
                background-image: url('/css/pesquisa/gfc_btn_demoSite.png');
                height: 30px;
                width: 30px;
            }

            #question_q2 .checkbox .sq-fir-image {

            }

            #question_q2 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na) {

                behavior: url(/css/pesquisa/v2/PIE.htc);
            }

            #question_q2 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na).checked {

            }

            #question_q2 .sq-fir-wrap.sq-fir-icon.sq-fir-disabled {

            }

            #question_q2 .sq-fir-wrap .sq-fir-icon {

            }

            #question_q2 .sq-fir-wrap.checked .sq-fir-icon {

            }
        </style><!-- lib/steam/fir/v2/styles.xml -->

        <style>

            #question_q3 .sq-fir-image {

            }

            #question_q3 .radio .sq-fir-image {
                background-image: url('/css/pesquisa/gfc_btn_demoSite.png');
                height: 30px;
                width: 30px;
            }

            #question_q3 .checkbox .sq-fir-image {

            }

            #question_q3 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na) {

                behavior: url(/css/pesquisa/v2/PIE.htc);
            }

            #question_q3 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na).checked {

            }

            #question_q3 .sq-fir-wrap.sq-fir-icon.sq-fir-disabled {

            }

            #question_q3 .sq-fir-wrap .sq-fir-icon {

            }

            #question_q3 .sq-fir-wrap.checked .sq-fir-icon {

            }
        </style><!-- lib/steam/fir/v2/styles.xml -->

        <style>

            #question_q6 .sq-fir-image {

            }

            #question_q6 .radio .sq-fir-image {

            }

            #question_q6 .checkbox .sq-fir-image {
                background-image: url('/css/pesquisa/gfc_btn_checkbox.png');
                height: 30px;
                width: 30px;
            }

            #question_q6 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na) {

                behavior: url(/css/pesquisa/v2/PIE.htc);
            }

            #question_q6 .sq-fir-wrap.sq-fir-icon:not(.sq-fir-na).checked {

            }

            #question_q6 .sq-fir-wrap.sq-fir-icon.sq-fir-disabled {

            }

            #question_q6 .sq-fir-wrap .sq-fir-icon {

            }

            #question_q6 .sq-fir-wrap.checked .sq-fir-icon {

            }
        </style><!-- lib/steam/ratingscale/v2/styles.xml -->
        <link rel='stylesheet' href='/css/pesquisa/ratingscale/v2/dotted-circle.css%3Fbc521e5423.css'/>

        <link rel='stylesheet' href='/css/pesquisa/ratingscale/v2/font-awesome.css%3F065325f5d0.css'/>

        <link rel='stylesheet' href='/css/pesquisa/ratingscale/v2/ratingscale.css%3F24f1ea7f64.css'/>
        <style>
            /* rating scale CSS */

            #question_q9 .sq-ratingscale-rowlegend {
                position: relative;
                vertical-align: middle;
            }

            #question_q9 .legend-right .sq-ratingscale-rowlegend {
                padding-left: 43px;
            }

            #question_q9 .legend-left .sq-ratingscale-rowlegend {
                padding-right: 43px;
            }

            #question_q9 .sq-ratingscale-vertical-align {
                float: none;
                /*
                margin-top: -19px;
                */
                position: absolute;
                top: 50%;
            }

            #question_q9 .legend-right .sq-ratingscale-vertical-align {
                left: 19px;
            }

            #question_q9 .legend-left .sq-ratingscale-vertical-align {
                right: 19px;
            }

            /* make sure the bubble isn't bigger than the cells */
            #question_q9 .survey-q-grid-cell-clickable {
                min-height: 38px;
                height: 38px;
            }

            /* controls the size of the bubble */
            #question_q9 .sq-ratingscale-bubble.sq-ratingscale-bubble-size {
                width: 38px;
                height: 38px;
            }

            /* size of the bubble if icon fonts is used */
            #question_q9.sq-ratingscale-use-icon .sq-ratingscale-bubble-inner.fa {
                font-size: 38px;
                margin: 0 0 0 3.0px;
            }

            /* allows bubble customization */
            #question_q9.sq-ratingscale-use-bubble-image .sq-ratingscale-bubble,
            #question_q9.sq-ratingscale-use-icon .sq-ratingscale-bubble {

            }

            /* allows bubble customization while in the starting position (launchpad) */
            #question_q9 .sq-ratingscale-row.sq-ratingscale-starting .sq-ratingscale-bubble {
                background-position: 0 0;
            }

            #question_q9.sq-ratingscale-use-icon .sq-ratingscale-row.sq-ratingscale-starting .sq-ratingscale-bubble-inner {

            }

            /* allows bubble customization while on an answer (launchpad) */
            #question_q9 .sq-ratingscale-row.sq-ratingscale-answered .sq-ratingscale-bubble {
                background-position: 100% 0;
            }

            #question_q9.sq-ratingscale-use-icon .sq-ratingscale-row.sq-ratingscale-answered .sq-ratingscale-bubble-inner {

            }

            /* allows bubble customization while the bubble is disabled (a "no answered" is checked) */
            #question_q9.sq-ratingscale-disabled .sq-ratingscale-bubble {

            }

            #question_q9 .sq-ratingscale-containment .survey-q-grid-cell-clickable {
                /*
                 * ********** 16471 bug **********
                 * 2013.10.07 10:23:00
                 * as of chrome 30, td.outerWidth() is incorrectly reported by jQuery
                 *   to be 46
                 * all other browsers and versions are currently unaffected
                 * 2013.10.07 10:38:00
                 * after further investigation, according to CSS code in the styles.xml,
                 *   the td.outerWidth() is specifed to be 38. add 3 padding on each side and
                 *   1 border for each side, the total comes out to be 46.
                 * that means chrome 30 reports the specified width, and not the actual
                 *   width of the element. the specified width is 46, and the actual
                 *   width is 105.
                 * it looks like the fix is to use "auto" for the height and width
                 * ********** 16471 bug **********
                 */

                /* width: 38px; */
                /* height: 38px; */

            }

            #question_q9 .sq-ratingscale-containment .survey-q-grid-cell-clickable .sq-ratingscale-radio {
                width: 30.0px;
                height: 30.0px;
                line-height: 32px;
                font-size: 26.0px;

            }

            /* allows the radio input cells, while selected, to be customized */
            #question_q9 .sq-ratingscale-containment .survey-q-grid-cell-clickable.sq-ratingscale-selected {

            }


        </style><!-- lib/steam/atmrating/v2/styles.xml -->
        <link rel='stylesheet' href='/css/pesquisa/atmrating/v2/atmrating.css%3F849d0162b3.css'/>
        <style>
            /* Button Container Width */
            #question_q12 .atmrating_input,
            #question_q12 .atmrating_legend table,
            #question_q12 .atmrating_oo {
                width: 100%;
            }

            /* Button */
            #question_q12 .atmrating-btn {

            }

            /* Button Selected */
            #question_q12 .atmrating-hover,
            #question_q12 .atmrating-selected {

            }
        </style><!-- lib/steam/bcme/v2/styles.xml -->
        <link rel='stylesheet' href='/css/pesquisa/bcme/v2/font-awesome.css%3Fd8e7e39c9a.css'/>

        <link rel='stylesheet' href='/css/pesquisa/bcme/v2/bcme.css%3F077e01449f.css'/>

        <link rel='stylesheet' href='/css/pesquisa/bcme/v2/tipped.css%3F09368046dc.css'/>

        <link rel='stylesheet' href='/css/pesquisa/bcme/v2/tipped-custom-skins.css%3F3eed9d8b8a.css'/>


        <style type="text/css">
            #question_q13 .survey-q-answers {
                display: none;
            }

            #question_q13 .sq-bcme-container {
                width: 640px;
                height: 360px;
            }

            /* Custom CSS */
            #question_q13 .sq-bcme-container {

                behavior: url("/css/pesquisa/bcme/v2/PIE.htc");
            }

            #question_q13 .sq-bcme-content .sq-bcme-overlay-container .sq-bcme-watermark {

            }

            #question_q13 .sq-bcme-content .sq-bcme-overlay-container .sq-bcme-overlay-content {

                behavior: url("/css/pesquisa/bcme/v2/PIE.htc");
            }

            #question_q13 .sq-bcme-content .sq-bcme-overlay-container .sq-bcme-play-button-big {
                background: url("/css/pesquisa/bcme/v2/playButton.png") no-repeat center;

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls-hide {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-play-button {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-play-button [class^='fa-icon-'] {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-video-position,
            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls.sq-bcme-pause-enable .sq-bcme-video-position {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-position-container,
            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls.sq-bcme-pause-enable .sq-bcme-position-container {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-position-indicator {

            }

            #question_q13 .sq-bcme-overlay-container .sq-bcme-media-controls .sq-bcme-video-length {

            }

            /* Not used anymore
            #question_q13 .sq-bcme-overlay-container .sq-bcme-engagement-container {
                ;
            }
                #question_q13 .sq-bcme-overlay-container .sq-bcme-engagement-container .sq-bcme-engagement-text {
                    ;
                }
            */

            #question_q13 .sq-bcme-content .sq-bcme-slider-container {

            }

            #question_q13 .Horizontal .sq-bcme-slider-container .ui-slider,
            #question_q13 .Vertical .sq-bcme-slider-container .ui-slider {

                behavior: url("/css/pesquisa/bcme/v2/PIE.htc");
            }

            #question_q13 .Horizontal .sq-bcme-slider-container .ui-slider-range-min,
            #question_q13 .Vertical .sq-bcme-slider-container .ui-slider-range-min,
            #question_q13 .Horizontal .sq-bcme-slider-container .ui-slider-range-max,
            #question_q13 .Vertical .sq-bcme-slider-container .ui-slider-range-max {

            }

            #question_q13 .Horizontal .sq-bcme-slider-container .ui-slider-handle,
            #question_q13 .Vertical .sq-bcme-slider-container .ui-slider-handle {

                behavior: url("/css/pesquisa/bcme/v2/PIE.htc");
            }

            #question_q13 .Horizontal .sq-bcme-slider-container .ui-handle-helper-parent,
            #question_q13 .Vertical .sq-bcme-slider-container .ui-handle-helper-parent {

            }

            #question_q13 .Horizontal .sq-bcme-slider-container .sq-bcme-slider-legend,
            #question_q13 .Vertical .sq-bcme-slider-container .sq-bcme-slider-legend {

            }

            #question_q13 .sq-bcme-slider-container .sq-bcme-slider-legend-left {

            }

            #question_q13 .sq-bcme-slider-container .sq-bcme-slider-legend-middle {

            }

            #question_q13 .sq-bcme-slider-container .sq-bcme-slider-legend-right {

            }

            #question_q13 .sq-bcme-container.Horizontal .sq-bcme-buttons-container,
            #question_q13 .sq-bcme-container.Vertical .sq-bcme-buttons-container {

            }

            #question_q13 .sq-bcme-buttons-container .sq-bcme-tuneout-button {

            }

            #question_q13 .sq-bcme-tuneout-button.sq-bcme-tuneout-active {

            }
        </style>

        </head>
<div class="row">
<div class="col-md-12" class="navbar-left">
	 <h1></h1>
  </div>
  </div>

       
        <br/><br/>
        <div class="survey-page">
        <div id="survey">

        <div id="surveyHeader" class="survey-header group">&nbsp;</div>
        <!-- /#surveyHeader -->
        <div id="surveyContent" class="survey-page-content group">
        <div class="top-green-bar"></div>


        <form id="primaryl" method="post" action="" >

        <!-- @@XYZZY@@ -->
        <div id="question_q1" class="survey-q surveyQuestion radio label_q1  ">
        <div class="question section survey-q-question">
            <h2 title="Pergunta" class="survey-q-question-text">
                <div class="demo-header"></div>
                Dados da Empresa:
            </h2>
        </div>
        <!-- /.question -->

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Nome da Empresa</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <input type="text" name="empresa" id="empresa" size="10" class="text"/>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Responsável pelas informações:</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <input type="text" name="nome" id="nome" size="10" class="text"/>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Email:</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <input type="email" name="email" id="email" size="10" class="text"/>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Telefone:</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <input type="text" class="input_form2 telefone" id="telefone" maxlength="15" name="telefone"/>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Estado:</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <select id="estado" name="uf" class="text">
                                <option value="">UF</option>
                                <?php foreach (consulta("select uf,id from estados2 order by uf asc") as $estados) { ?>
                                    <option value="<?php echo $estados['id']; ?>"><?php echo $estados['uf']; ?></option>
                                <?php } ?>
                            </select>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <!-- /.surveyQuestion -->
        <div id="question_q5" class="survey-q surveyQuestion number label_q5  novo">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> Cidade:</h2>
            </div>
            <!-- /.question -->
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <select id="cidade" name="cidade">
                                <option value="">Selecione</option>
                            </select>
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>


        <!-- @@XYZZY@@ -->
        <div id="question_q1" class="survey-q surveyQuestion radio label_q1  ">
            <div class="question section survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text">
                    <div class="demo-header"></div>
                    Solicitamos atribuir a cada questão, uma nota conforme as alternativas:
                </h2>
            </div>
            <!-- /.question -->



            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">
                        <td scope="row" class="row-legend survey-q-grid-rowlegend legend-left ">
                            <span style="font-size: medium;">Otimo</span>
                        </td>
                        <td headers=""
                            class="element groupingCols OneColumnEl    clickableCell survey-q-grid-cell-clickable">
                            4
                        </td>

                    </tr>
                    <tr class="odd colCount-1">
                        <td scope="row" class="row-legend survey-q-grid-rowlegend legend-left ">
                            <span style="font-size: medium;">Bom</span>
                        </td>
                        <td headers=""
                            class="element groupingCols OneColumnEl    clickableCell survey-q-grid-cell-clickable">
                            3
                        </td>

                    </tr>
                    <tr class="even colCount-1">
                        <td scope="row" class="row-legend survey-q-grid-rowlegend legend-left ">
                            <span style="font-size: medium;">Regular</span>
                        </td>
                        <td headers=""
                            class="element groupingCols OneColumnEl    clickableCell survey-q-grid-cell-clickable">
                            2
                        </td>

                    </tr>
                    <tr class="odd colCount-1">
                        <td scope="row" class="row-legend survey-q-grid-rowlegend legend-left ">
                            <span style="font-size: medium;">Ruim</span>
                        </td>
                        <td headers=""
                            class="element groupingCols OneColumnEl    clickableCell survey-q-grid-cell-clickable">
                            1
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>

        <div class="question section survey-q-question">
            <h2 title="Pergunta" class="survey-q-question-text">
                <div class="demo-header"></div>
               
            </h2>
        </div>


        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text">
                    <div class="demo-header"></div>
                    1 - Telefone, E-mail, Whatsapp e Site::
                </h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Considerar o acesso à empresa, tempo de espera e qualidade das informações</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_1" id="a1_1" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_1" id="a1_1" value="1" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
						
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_1" id="a1_1" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_1" id="a1_1" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_1" id="a1_1" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>

                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>


        <!--1.2-->
        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text">2 - Representante (atendimento externo):</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Considerar o profissionalismo, a receptividade e a freqüência das visitas.</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_2" id="a1_2" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_2" id="a1_2" value="1" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					<tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_2" id="a1_2" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_2" id="a1_2" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_2" id="a1_2" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>

                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>


       

       


        <!--1.6--<
        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text">3 - Preço do produto:</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Custo x Benefício.</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_6" id="a1_6" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_6" id="a1_6" value="1" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_6" id="a1_6" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_6" id="a1_6" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_6" id="a1_6" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>

                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>


        <!--1.7-->
        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> 4 - Cumprimento dos prazos de entrega:</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Considerar a pontualidade nas entregas dos Pedidos.</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_7" id="a1_7" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_7" id="a1_7" value="1" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_7" id="a1_7" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_7" id="a1_7" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a1_7" id="a1_7" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
				
                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>





        <!--2.2-->
        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> 5 - Assistência Técnica:</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Considerar suporte à Assistência.</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_2" id="a2_2" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_2" id="a2_2" value="1" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_2" id="a2_2" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_2" id="a2_2" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_2" id="a2_2" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>

                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>



        <!--2.4-->
        <!-- /.surveyQuestion -->
        <div id="question_q2" class="survey-q surveyQuestion radio label_q2  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> 6 - Qualidade do produto:</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text"></h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tr class="legend colGroup">

                        <th colspan="5" id="q2_cg1"
                            class="survey-q-grid-collegend survey-q-grid-group-collegend customRight">
                            <span style="font-size: medium;">Considerar as condições gerais do produto.</span>
                        </th>

                    </tr>
                    <tr class="legend top-legend GtTenColumns colCount-11">

                        <th id="q2_c1" style="display: none" class="legend survey-q-grid-collegend  customRight">
                            0
                        </th>
						<td headers="q2_c1 q2_cg1" style="display: none"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_4" id="a2_4" value="0" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c2" class="legend survey-q-grid-collegend  customRight">
                            1
                        </th>
						<td headers="q2_c2 q2_cg1"
                            class="element groupingRows customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_4" id="a2_4" value="1"style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c3" class="legend survey-q-grid-collegend  customLeft customRight">
                            2
                        </th>
						<td headers="q2_c3 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_4" id="a2_4" value="2" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c4" class="legend survey-q-grid-collegend  customLeft customRight">
                            3
                        </th>
						<td headers="q2_c4 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_4" id="a2_4" value="3" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>
					</tr>
					<tr class="legend top-legend GtTenColumns colCount-11">
                        <th id="q2_c5" class="legend survey-q-grid-collegend  customLeft customRight">
                            4
                        </th>
						<td headers="q2_c5 q2_cg2"
                            class="element groupingRows customLeft customRight    clickableCell survey-q-grid-cell-clickable">
                            <input type="radio" name="a2_4" id="a2_4" value="4" style="margin-top:-4px;"/>
                        </td>
						<td>
						</td>
						<td>
						</td>
						<td>
						</td>

                    </tr>
                    <tbody>
                    <tr class="even colCount-11">

                        
                        
                        
                        
                        

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>



        <!--3.2-->

        <!-- /.surveyQuestion -->
        <div id="question_q5" style="width: 96% !important;" class="survey-q surveyQuestion number label_q5  ">
            <div class="question titulopage survey-q-question">
                <h2 title="Pergunta" class="survey-q-question-text"> 7 - Observações Gerais</h2>
            </div>
            <!-- /.question -->

            <div class="instructions survey-q-instructions">
                <h3 title="Instrução" class="survey-q-instructions-text">Sujestões</h3>
            </div>
            <!-- /.instructions -->
            <div class="answers survey-q-answers">
                <table class="grid survey-q-grid survey-q-grid-borders"
                       summary="This table contains form elements to answer the survey question">
                    <tbody>
                    <tr class="even colCount-1">

                        <td headers="" class="element groupingRows OneColumnEl   ">
                            <input type="text"  name="a3_2" id="a3_2" size="100" class="text" />
                        </td>

                    </tr>
                    </tbody>
                </table>
                <!-- /.grid -->
            </div>
            <!-- /.answers -->
        </div>



        <label id="dis" style="width:250px;"></label><br>
        <!-- /.surveyQuestion -->
        <div id="surveyButtons" class="styled group survey-buttons">
            <input type="submit" name="finish" id="btn_finish" class="btn finish survey-button" value="Enviar"/>

        </div>
            </div>
        </form>


        </div>

        <!-- /#surveyFooter -->
        </div>
        <!-- /#survey -->
        </div>
        <div style="clear: both"></div>
    <?php
    } else {
        ?>
        <p class="texto_internas"> CROYDON, symbol of quality in equipment for Hotels, Bars and Restaurants since
            1962. </p>
        <?php echo $texto; ?>
        <form id="form_contato" action="" name="contato" method="post" onsubmit="return validaForm()">
            <label>Name</label>
            <input class="input_form1" type="text" name="nome"/>
            <label>Company</label>
            <input class="input_form1" type="text" name="empresa"/>
            <label>Phone</label>
            <input type="text" class="input_form2 telefone" maxlength="20" name="telefone"/>
            <label>Email</label>
            <input class="input_form1" type="text" name="email"/>
            <label>State</label>
            <input class="input_form1" type="text" name="estado_en"/>
            <label>City</label>
            <input class="input_form1" type="text" name="cidade_en"/>
            <label>Department</label>
            <select name="departamento">
                <option value="importacao@croydon.com.br">Import</option>
                <option value="exportacao@croydon.com.br">Export</option>
            </select>
            <label>Message</label>
            <textarea name="mensagem" class="input_form3"></textarea>
            <input type="submit" class="btEnviar" id="btEnviarEn" value=""/>
        </form>
    <?php
    }
}

if ((isset($_POST['a1_1'])) AND (isset($_POST['a1_2'])) AND (isset($_POST['a1_6'])) AND (isset($_POST['a1_7'])) AND (isset($_POST['a2_2'])) AND (isset($_POST['a2_4'])) AND (isset($_POST['a3_2'])) AND (($_POST['a1_1'] !== "")) AND (($_POST['a1_2'] !== "")) AND (($_POST['a1_6'] !== "")) AND (($_POST['a1_7'] !== "")) AND (($_POST['a2_2'] !== "")) AND (($_POST['a2_4'] !== ""))) {

    $a1_1 = $_POST['a1_1'];
    $a1_2 = $_POST['a1_2'];
    $a1_6 = $_POST['a1_6'];
    $a1_7 = $_POST['a1_7'];
    $a2_2 = $_POST['a2_2'];
    $a2_4 = $_POST['a2_4'];
    $a3_2 = $_POST['a3_2'];
    $a3_3 = $_POST['a3_3'];
    $a4_1 = $_POST['a4_1'];

    $nome = $_POST['nome'];
    $empresa = $_POST['empresa'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $ufBanco = $uf = $_POST['uf'];
    foreach (consulta("select * from estados2 WHERE id='$uf'") as $estados) {
        $uf = $estados['nome'];
    }
    $cidade = $_POST['cidade'];
    foreach (consulta("select * from cidades WHERE id='$cidade'") as $estados) {
        $cidade = $estados['nome'];
    }
    $periodo = (date('Y'));
    $dataEnvio = (date('d-m-Y'));
    $sql_insert = "INSERT INTO pesquisa (atend_telefone,atend_representante,preco_produto,prazo_entrega,suporte_tecnico,qualidade_produto,equip_adquirido,uf,ano) VALUES ('$a1_1','$a1_2','$a1_6','$a1_7','$a2_2','$a2_4','$a3_2','$ufBanco','$periodo')";
    mysql_query($sql_insert);


    //$mm = $departamento;

    $m = '
    	<html>
    		<head>
    		<title> </title>
    		</head>

    		<body>
    		<table width="100%" border="0" cellspacing="0" cellpadding="0">
    		<tr>
    		  			<td>
    		  				<b>Data de Envio:</b>
    		  			</td>
    		  		  </tr>
    		  <tr>
    		  			<td>
    		  				' . $dataEnvio . '<br/><br/>
    		  			</td>
    		  		  </tr>
    		<tr>
    			<td>
    				<b>Dados Cadastrais </b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nome da Empresa: </b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $empresa . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Responsável pelas informações:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $nome . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Email:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $email . '<br/><br/>
    			</td>
    		  </tr>
                      <tr>
    			<td>
    				<b>Telefone:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $telefone . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Estado:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $uf . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Cidade:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				' . $cidade . '<br/><br/>
    			</td>
    		  </tr>
    		<tr>
    			<td>
    				<b>1. Atendimento Comercial </b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>1.1 - Telefone, E-mail, Whatsapp e Site: </b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a1_1 . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>1.2 - Representante (atendimento externo):</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a1_2 . '<br/><br/>
    			</td>
    		  </tr>               
    		  <tr>
    			<td>
    				<b>1.3- Preço do produto:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a1_6 . '<br/><br/>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>1.4 - Cumprimento dos prazos de entrega:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a1_7 . '<br/><br/>
    			</td>
    		  </tr>
    		  		 
    		  		
    		  		 
    		  <tr>
    			<td>
    				<b>1.5 - Assistência Técinica</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a2_2 . '<br/><br/>
    			</td>
    		  </tr>
                      
    		  <tr>
    			<td>
    				<b> 1.6 - Qualidade do produto:</b>
    			</td>
    		  </tr>
    		  <tr>
    			<td>
    				<b>Nota:</b> ' . $a2_4 . '<br/><br/>
    			</td>
    		  </tr>
    		  
    		  
    		  
    		  		  <tr>
    		  			<td>
    		  				<b>1.7 - Observações Gerais</b>
    		  			</td>
    		  		  </tr>
    		  <tr>
    		  			<td>
    		  				' . $a3_2 . '<br/><br/>
    		  			</td>
    		  		  </tr>
    		  		  <tr>
    		  			


    		</table>

    		</body>
    	</html>';


    //
    require_once('PHPMailer/class.phpmailer.php');
    include("PHPMailer/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

    $mail->IsSMTP(); // telling the class to use SMTP

    try {
        $mail->Host = "smtp.croydon.com.br"; // SMTP server
        //$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->Host = "smtp.croydon.com.br"; // sets the SMTP server
        $mail->Port = 587; // set the SMTP port for the GMAIL server
        $mail->Username = "site@croydon.com.br"; // SMTP account username
        $mail->Password = "ciml@50y"; // SMTP account password
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddAddress('marketing@croydon.com.br', 'CROYDON');
        $mail->AddCC('mkt02@croydon.com.br', 'SITE CROYDON'); // Copia
        $mail->AddBCC('ti@croydon.com.br', 'ti'); // C?pia Oculta
        $mail->SetFrom('site@croydon.com.br', 'SITE CROYDON');
        $mail->AddReplyTo('site@croydon.com.br', 'SITE CROYDON');
        $mail->Subject = 'PESQUISA DE SATISFAÇÃO - SITE CROYDON';
        //$mail->AltBody = 'PEDIDO ONLINE - REPRESENTANTE: '.$_POST["cod_rep"]; // optional - MsgHTML will create an alternate automatically
        $mail->MsgHTML($m);
        //$mail->AddAttachment('images/phpmailer.gif');      // attachment
        //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
        $mail->Send();
        echo '<script>window.location.href = "' . $_SESSION['url'] . $lang . '/agradecimento"</script>';
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }

}
?>
