<div class="breadcrumb_internas">
	<div id="breadcrumb">
    	<div class="borderLeft_bread"></div>
        <div class="borderRight_bread"></div>
        <img src="<?php echo $_SESSION['url'];?>images/icone_bradcrumb.gif" alt="icone breadcrumb" />
        <a href="<?php echo $_SESSION['url'].$lang;?>/home">Home</a>
        <img src="<?php echo $_SESSION['url'];?>images/seta_bread.gif" alt="icone breadcrumb" />
        <span>Currículo</span>
    </div>
</div>
<p class="texto_internas">CROYDON, símbolo de qualidade em equipamentos para Hotéis, Bares e Restaurantes desde 1962.</p>
<div class="contato_right">
	<b>Endereço:</b><br />
    Estrada São Lourenço, 891 - Capivari<br />
    Duque de Caxias - RJ - Brasil - CEP 25243-150<br />
    <br />
    <b>Telefone:</b> (55 21) 2777-8100<br />
    <b>Fax:</b> (55 21) 2777-8106<br />
    <br />
    <br />
    <b>VENDAS</b><br />
    <a href="mailto:vendas@croydon.com.br">vendas@croydon.com.br</a><br />
    <br />
    <b>MARKETING</b><br />
    <a href="mailto:marketing@croydon.com.br">marketing@croydon.com.br</a><br />
    <br />
    <b>ADMINISTRAÇÃO</b><br />
    <a href="mailto:croydon@croydon.com.br">croydon@croydon.com.br</a><br />
    <br />
    <b>RECURSOS HUMANOS:</b><br />
    <a href="mailto:curriculosite@croydon.com.br">curriculo@croydon.com.br</a><br />
     <br />
    <b>ASSISTÊNCIA TÉCNICA:</b><br />
    <a href="mailto:at@croydon.com.br">at@croydon.com.br</a><br />
    <br />
    <b>FINANCEIRO:</b><br />
    <a href="mailto:finaceiro@croydon.com.br">finaceiro@croydon.com.br</a><br />
    <br />
    <b>COBRANÇA:</b><br />
    <a href="mailto:cobranca@croydon.com.br">cobranca@croydon.com.br</a><br />
</div>
<form id="form_contato" action="" name="curriculo" method="post" onsubmit="return validaFormCurriculo()">
	<p>Dados Pessoais</p>
	<label>Nome</label>
    <input class="input_form1" type="text" name="nome" />
    <label>Email</label>
    <input class="input_form1" type="text" name="email" />
    <label>Endereço</label>
    <input class="input_form1" type="text" name="endereco" />
    <label>Bairro</label>
    <input class="input_form2" type="text" name="bairro" />
    <label>Cidade</label>
    <input class="input_form2" type="text" name="cidade" />
    <label>Telefone</label>
    <input type="text" class="input_form2" name="telefone" />
    <label>Data de Nascimento</label>
    <select class="input_form4" name="dia_nascimento">
    	<?php 
		for($x=1;$x<=31;$x++){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <select class="input_form4" name="mes_nascimento">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="ano_nascimento">
    	<?php 
		for($x=1996;$x>=1950;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <label style="margin-bottom:0px;">Sexo</label>
    <input type="radio" style="height:auto;" name="sexo" value="masculino" /><span>Masculino</span>
    <input type="radio" style="height:auto;" name="sexo" value="feminino" /><span>Feminino</span>
    <label style="margin-bottom:0px; margin-top:5px;">Deficiente</label>
    <input type="radio" style="height:auto;" name="deficiente" value="sim" /><span>Sim</span>
    <input type="radio" style="height:auto;" name="deficiente" value="nao" /><span>Não</span>
    <label style="margin-top:5px;">Qual a sua deficiência?</label>
    <ul class="deficiencias">
    <li><input type="checkbox" name="mental" /><label>Mental</label></li>
    <li ><input type="checkbox" name="visual" /><label>Visual</label></li>
    <li><input type="checkbox" name="auditiva" /><label>Auditiva</label></li>
    <li><input type="checkbox" name="fisica" /><label style="">Fisica</label></li>
    <li><input type="checkbox" name="mutiplas_deficiencias" /><label style="display:inline; margin:3px 0 0 5px; float:left;">Múltiplas Deficiências</label></li>
    </ul>
    <label style="margin-top:5px;">Estado Civil</label>
    <select class="input_form2" name="estado_civil">
    	<option value="casado">Casado</option>
        <option value="solteiro">Solteiro</option>
        <option value="desquitado">Desquitado</option>
        <option value="viuvo">Viúvo</option>
        <option value="outros">Outros</option>
    </select>
    
    <p>Escolaridade</p>
    <label>Escolaridade</label>
    <select class="input_form5" name="escolaridade">
    	<option value="ensino_fundamental_incompleto">Ensino Fundamental (1º Grau) Incompleto</option>
        <option value="ensino_fundamental_completo">Ensino Fundamental (1º Grau) Completo</option>
        <option value="nivel_tecnico">Nivel Técnico</option>
        <option value="ensino_medio_incompleto">Ensino Médio (2º Grau) Incompleto</option>
        <option value="ensino_medio_completo">Ensino Médio (2º Grau) Completo</option>
        <option value="superior_incompleto">Superio Incompleto</option>
        <option value="superior_completo">Superior Completo</option>
        <option value="posgraducao_incompleto">Pós Graduação Incompleta</option>
        <option value="posgraduacao_completo">Pós Graduação Completa</option>
        <option value="mestrado_incompleto">Mestrado Incompleto</option>
        <option value="mestrado_completo">Mestrado Completo</option>
        <option value="doutorado_incompleto">Doutorado Incompleto</option>
        <option value="doutorado_completo">Doutorado Completo</option>
    </select>
    
     <p>Curso Superior</p>
     <label>Curso</label>
      <input class="input_form2" type="text" name="curso" />
      <label>Instituição</label>
      <input class="input_form2" type="text" name="instituicao" />
      <label style="margin-bottom:0px;">Concluido</label>
      <input type="radio" style="height:auto;" name="concluido" value="sim" /><span>Sim</span>
      <input type="radio" style="height:auto;" name="concluido" value="nao" /><span>Não</span>
      <label>Início</label>
      <select class="input_form4" name="mes_inicio">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="ano_inicio">
    	<?php 
		for($x=2010;$x>=1960;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <label>Termino</label>
      <select class="input_form4" name="mes_termino">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="ano_termino">
    	<?php 
		for($x=2014;$x>=1960;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    
    <p>Idiomas</p>
    <ul>
    	<li class="lista_idiomas">
            <label>INGLÊS</label>
            <label>Básico</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="ingles_basico_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="ingles_basico_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="ingles_basico_escreve" /><span>Escreve</span></li>
            </ul>
            <label>Intermediário</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="ingles_intermediario_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="ingles_intermediario_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="ingles_intermediario_escreve" /><span>Escreve</span></li>
            </ul>
             <label>Avançado</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="ingles_avancado_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="ingles_avancado_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="ingles_avancado_escreve" /><span>Escreve</span></li>
            </ul>
        </li>
        <li class="lista_idiomas">
            <label>ESPANHOL</label>
            <label>Básico</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="espanhol_basico_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="espanhol_basico_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="espanhol_basico_escreve" /><span>Escreve</span></li>
            </ul>
            <label>Intermediário</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="espanhol_intermediario_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="espanhol_intermediario_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="espanhol_intermediario_escreve" /><span>Escreve</span></li>
            </ul>
             <label>Avançado</label>
            <ul class="idiomas">
            <li><input type="checkbox" name="espanhol_avancado_fala" /><span>Fala</span></li>
            <li><input type="checkbox" name="espanhol_avancado_le" /><span>Lê</span></li>
            <li><input type="checkbox" name="espanhol_avancado_escreve" /><span>Escreve</span></li>
            </ul>
        </li>
    </ul>
    <label>Outros</label>
    <input class="input_form2" type="text" name="outros_idiomas" />
    
    <p>Principais Cursos Realizados</p>
    <textarea name="cursos" class="input_form3"></textarea>
    
    <p>Expreriência Profissional</p>
    <div class="experiencias_profissionais">
    <label>Empresa</label>
    <input class="input_form2" type="text" name="empresa" />
    <label>Função</label>
    <input class="input_form2" type="text" name="funcao" /> 
    <label>Atribuições</label>
    <textarea name="atribuicoes" class="input_form3"></textarea>
    <p>
    <label style="display:inline;">Periodo</label>
      <select class="input_form4" name="periodo_mes_inicio">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_inicio">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <label style="display:inline;">a</label>
    <select class="input_form4" name="periodo_mes_fim">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_fim">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    </p>
    </div>
    
	<div class="experiencias_profissionais">
    <label>Empresa</label>
    <input class="input_form2" type="text" name="empresa2" />
    <label>Função</label>
    <input class="input_form2" type="text" name="funcao2" /> 
    <label>Atribuições</label>
    <textarea name="atribuicoes2" class="input_form3"></textarea>
    <p>
    <label style="display:inline;">Periodo</label>
      <select class="input_form4" name="periodo_mes_inicio2">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_inicio2">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <label style="display:inline;">a</label>
    <select class="input_form4" name="periodo_mes_fim2">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_fim2">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    </p>
    </div>
    
    <div class="experiencias_profissionais">
    <label>Empresa</label>
    <input class="input_form2" type="text" name="empresa3" />
    <label>Função</label>
    <input class="input_form2" type="text" name="funcao3" /> 
    <label>Atribuições</label>
    <textarea name="atribuicoes3" class="input_form3"></textarea>
    <p>
    <label style="display:inline;">Periodo</label>
      <select class="input_form4" name="periodo_mes_inicio3">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_inicio3">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    <label style="display:inline;">a</label>
    <select class="input_form4" name="periodo_mes_fim3">
    	<option value="janeiro">janeiro</option>
        <option value="fevereiro">fevereiro</option>
        <option value="marco">março</option>
        <option value="abril">abril</option>
        <option value="maio">maio</option>
        <option value="junho">junho</option>
        <option value="julho">julho</option>
        <option value="agosto">agosto</option>
        <option value="setembro">setembro</option>
        <option value="outubro">outubro</option>
        <option value="novembro">novembro</option>
        <option value="dezembro">dezembro</option>
    </select>
    <select class="input_form4" name="periodo_ano_fim3">
    	<?php 
		for($x=2011;$x>=1985;$x--){
    	echo '<option value="'.$x.'">'.$x.'</option>';
		}
		?>
    </select>
    </p>
    </div>
    
    <p>Descreva Porque Deseja Trabalhar na Croydon</p>
    <textarea name="porque_trabalhar_croydon" class="input_form3"></textarea>
    
    <input type="submit" class="btEnviar" value="" />
</form>
<?php
if($_POST['nome'] != ""){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$telefone = $_POST['telefone'];
	$dia_nasc = $_POST['dia_nascimento'];
	$mes_nasc = $_POST['mes_nascimento'];
	$ano_nasc = $_POST['ano_nascimento'];
	$data_nascimento = $dia_nasc.' de '.$mes_nasc.' de '.$ano_nasc;
	$sexo = $_POST['sexo'];
	$deficiente = $_POST['deficiente'];
	$mental = $_POST['mental'];
	$visual = $_POST['visual'];
	$auditiva = $_POST['auditiva'];
	$fisica = $_POST['fisica'];
	$mutiplas_deficiencias = $_POST['mutiplas_deficiencias'];

	if($mental == 'on'){
		$mental = 'Possui Deficiência Mental';
	}
	else{
		$mental = '-';
	}
	
	if($visual == 'on'){
		$visual = 'Possui Deficiência Visual';
	}
	else{
		$visual = '-';
	}
	
	if($auditiva == 'on'){
		$auditiva = 'Possui Deficiência Auditiva';
	}
	else{
		$auditiva = '-';
	}
	
	if($fisica == 'on'){
		$fisica = 'Possui Deficiência Fisica';
	}
	else{
		$fisica = '-';
	}
	
	if($mutiplas_deficiencias == 'on'){
		$mutiplas_deficiencias = 'Possui mutiplas_deficiencias';
	}
	else{
		$mutiplas_deficiencias = '-';
	}
	
	if($deficiente == 'sim'){		
		$tipos_deficiencias = '<tr><td><b>Tipos de Deficiências:</b> '.$visual.' ,'.$mental.' ,'.$auditiva.' ,'.$fisica.' ,'.$mutiplas_deficiencias.'</td></tr>';
	}
	else{
		$tipos_deficiencias = '';
	}
	
	$estado_civil = $_POST['estado_civil'];
	$escolaridade = $_POST['escolaridade'];
	
	$curso_superior = $_POST['curso'];
	$instituicao = $_POST['instituicao'];
	$concluido = $_POST['concluido'];
	$mes_inicio = $_POST['mes_inicio'];
	$mes_fim = $_POST['mes_termino'];
	$ano_inicio = $_POST['ano_inicio'];
	$ano_fim = $_POST['ano_termino'];
	$inicio = $mes_inicio.' de '.$ano_inicio;
	$fim = $mes_fim.' de '.$ano_fim;
	
	if($curso_superior != ''){
		$cont_ensino_superior = '<tr>
		  	<td>&nbsp;</td>
		  </tr>
		  <tr>
		  	<td><b>ENSINO SUPERIOR:</b></td>
		  </tr>
		  <tr>
		  	<td>&nbsp;</td>
		  </tr>
		  <tr>
		  	<td><b>Curso:</b> '.$curso_superior.'</td>
		  </tr>
		  <tr>
		  	<td><b>Instituição:</b> '.$instituicao.'</td>
		  </tr>
		  <tr>
		  	<td><b>Concluido:</b> '.$concluido.'</td>
		  </tr>
		  <tr>
		  	<td><b>Iniciou Em:</b> '.$inicio.'  <b>Terminou Em:</b> '.$fim.'</td>
		  </tr>';
	}
	else{
		$cont_ensino_superior ='';
	}
	
	if($_POST['ingles_basico_le'] == 'on'){
		$basico_ingles_le = 'Lê';
	}
	else{
		$basico_ingles_le = '-';
	}
	if($_POST['ingles_basico_escreve'] == 'on'){
		$basico_ingles_escreve = 'Escreve';
	}
	else{
		$basico_ingles_escreve = '-';
	}
    if($_POST['ingles_basico_fala'] == 'on'){
		$basico_ingles_fala = 'Fala';
	}
	else{
		$basico_ingles_fala = '-';
	}
	
	if($_POST['ingles_intermediario_le'] == 'on'){
		$intermediario_ingles_le = 'Lê';
	}
	else{
		$intermediario_ingles_le = '-';
	}
	if($_POST['ingles_intermediario_escreve'] == 'on'){
		$intermediario_ingles_escreve = 'Escreve';
	}
	else{
		$intermediario_ingles_escreve = '-';
	}
    if($_POST['ingles_intermediario_fala'] == 'on'){
		$intermediario_ingles_fala = 'Fala';
	}
	else{
		$intermediario_ingles_fala = '-';
	}
	
	if($_POST['ingles_avancado_le'] == 'on'){
		$avancado_ingles_le = 'Lê';
	}
	else{
		$avancado_ingles_le = '-';
	}
	if($_POST['ingles_avancado_escreve'] == 'on'){
		$avancado_ingles_escreve = 'Escreve';
	}
	else{
		$avancado_ingles_escreve = '-';
	}
    if($_POST['ingles_avancado_fala'] == 'on'){
		$avancado_ingles_fala = 'Fala';
	}
	else{
		$avancado_ingles_fala = '-';
	}
	
	if($_POST['espanhol_basico_le'] == 'on'){
		$basico_espanhol_le = 'Lê';
	}
	else{
		$basico_espanhol_le = '-';
	}
	if($_POST['espanhol_basico_escreve'] == 'on'){
		$basico_espanhol_escreve = 'Escreve';
	}
	else{
		$basico_espanhol_escreve = '-';
	}
    if($_POST['espanhol_basico_fala'] == 'on'){
		$basico_espanhol_fala = 'Fala';
	}
	else{
		$basico_espanhol_fala = '-';
	}
	
	if($_POST['espanhol_intermediario_le'] == 'on'){
		$intermediario_espanhol_le = 'Lê';
	}
	else{
		$intermediario_espanhol_le = '-';
	}
	if($_POST['espanhol_intermediario_escreve'] == 'on'){
		$intermediario_espanhol_escreve = 'Escreve';
	}
	else{
		$intermediario_espanhol_escreve = '-';
	}
    if($_POST['espanhol_intermediario_fala'] == 'on'){
		$intermediario_espanhol_fala = 'Fala';
	}
	else{
		$intermediario_espanhol_fala = '-';
	}
	
	if($_POST['espanhol_avancado_le'] == 'on'){
		$avancado_espanhol_le = 'Lê';
	}
	else{
		$avancado_espanhol_le = '-';
	}
	if($_POST['espanhol_avancado_escreve'] == 'on'){
		$avancado_espanhol_escreve = 'Escreve';
	}
	else{
		$avancado_espanhol_escreve = '-';
	}
    if($_POST['espanhol_avancado_fala'] == 'on'){
		$avancado_espanhol_fala = 'Fala';
	}
	else{
		$avancado_espanhol_fala = '-';
	}
	
	if($_POST['outros_idiomas'] != ''){
		$outros_idiomas = $_POST['outros_idiomas'];
	}
	else{
		$outros_idiomas = 'não possui';
	}
	
	if($_POST['cursos'] != ''){
		$cursos = $_POST['cursos'];
	}
	else{
		$cursos = 'não possui';
	}
	
	if($_POST['empresa'] != ''){
		$empresa = $_POST['empresa'];
	}
	else{
		$empresa = 'não possui';
	}
	
	if($_POST['empresa2'] != ''){
		$empresa2 = $_POST['empresa2'];
	}
	else{
		$empresa2 = 'não possui';
	}
	
	if($_POST['empresa3'] != ''){
		$empresa3 = $_POST['empresa3'];
	}
	else{
		$empresa3 = 'não possui';
	}
	
	if($_POST['funcao'] != ''){
		$funcao = $_POST['funcao'];
	}
	else{
		$funcao = 'não possui';
	}
	
	if($_POST['funcao2'] != ''){
		$funcao2 = $_POST['funcao2'];
	}
	else{
		$funcao2 = 'não possui';
	}

	if($_POST['funcao3'] != ''){
		$funcao3 = $_POST['funcao3'];
	}
	else{
		$funcao3 = 'não possui';
	}	
	
	if($_POST['atribuicoes'] != ''){
		$atribuicoes = $_POST['atribuicoes'];
	}
	else{
		$atribuicoes = 'não possui';
	}
	
	if($_POST['atribuicoes2'] != ''){
		$atribuicoes2 = $_POST['atribuicoes2'];
	}
	else{
		$atribuicoes2 = 'não possui';
	}
	
	if($_POST['atribuicoes3'] != ''){
		$atribuicoes3 = $_POST['atribuicoes3'];
	}
	else{
		$atribuicoes3 = 'não possui';
	}
	
	$per_inicio_mes = $_POST['periodo_mes_inicio'];
	$per_fim_mes = $_POST['periodo_mes_fim'];
	$per_inicio_ano = $_POST['periodo_ano_inicio'];
	$per_fim_ano = $_POST['periodo_ano_fim'];
	
	$comecou = $per_inicio_mes.' de '.$per_inicio_ano;
	$terminou = $per_fim_mes.' de '.$per_fim_ano;
	
	$per_inicio_mes2 = $_POST['periodo_mes_inicio2'];
	$per_fim_mes2 = $_POST['periodo_mes_fim2'];
	$per_inicio_ano2 = $_POST['periodo_ano_inicio2'];
	$per_fim_ano2 = $_POST['periodo_ano_fim2'];
	
	$comecou2 = $per_inicio_mes2.' de '.$per_inicio_ano2;
	$terminou2 = $per_fim_mes2.' de '.$per_fim_ano2;
	
	$per_inicio_mes3 = $_POST['periodo_mes_inicio3'];
	$per_fim_mes3 = $_POST['periodo_mes_fim3'];
	$per_inicio_ano3 = $_POST['periodo_ano_inicio3'];
	$per_fim_ano3 = $_POST['periodo_ano_fim3'];
	
	$comecou3 = $per_inicio_mes3.' de '.$per_inicio_ano3;
	$terminou3 = $per_fim_mes3.' de '.$per_fim_ano3;
	
	$porque_trabalhar = $_POST['porque_trabalhar_croydon'];
	
	$mm = 'curriculosite@croydon.com.br';
	
	$m = '
	<html>
		<head>
		<title> </title>
		</head>
									
		<body>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		  <tr>
		  	<td><b>DADOS PESSOAIS:</b></td>
		  </tr>		
		  <tr>
		  <tr>
		  	<td>&nbsp;</td>
		  </tr>		
		  <tr>
			<td>
				<b>Nome:</b> '.$nome.'
			</td>
		  </tr>   
		  <tr>
			<td>
				<b>E-mail:</b> '.$email.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Endereço:</b> '.$endereco.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Bairro:</b> '.$bairro.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Cidade:</b> '.$cidade.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Telefone:</b> '.$telefone.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Data de Nascimento:</b> '.$data_nascimento.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Sexo:</b> '.$sexo.'
			</td>
		  </tr>  
		  <tr>
			<td>
				<b>Deficiente:</b> '.$deficiente.'
			</td>
		  </tr>  
		  '.$tipos_deficiencias.'
		  <tr>
		  	<td>&nbsp;</td>
		  </tr>
		  <tr>
		  	<td><b>Escolaridade:</b> '.$escolaridade.'</td>
		  </tr>
		  '.$cont_ensino_superior.'
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>IDIOMAS</b>
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Inglês Básico</b>: '.$basico_ingles_le.','.$basico_ingles_escreve.','.$basico_ingles_fala.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Inglês Intermediário</b>: '.$intermediario_ingles_le.','.$intermediario_ingles_escreve.','.$intermediario_ingles_fala.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Inglês Avançado</b>: '.$avancado_ingles_le.','.$avancado_ingles_escreve.','.$avancado_ingles_fala.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Espanhol Básico</b>: '.$basico_espanhol_le.','.$basico_espanhol_escreve.','.$basico_espanhol_fala.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Espanhol Intermediário</b>: '.$intermediario_espanhol_le.','.$intermediario_espanhol_escreve.','.$intermediario_espanhol_fala.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Espanhol Avançado</b>: '.$avancado_espanhol_le.','.$avancado_espanhol_escreve.','.$avancado_espanhol_fala.'
			</td>
		  </tr>
		  <tr>
		   <td>
				<b>Outros Idiomas:</b> '.$outros_idiomas.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Cursos: </b>'.$cursos.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>EXPERIÊNCIAS PROFISSIONAIS</b>
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Empresa:</b> '.$empresa.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Função:</b> '.$funcao.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Atribuições:</b> '.$atribuicoes.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Periodo:</b> '.$comecou.' a '.$terminou.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
          <tr>
		  	<td>
				<b>EXPERIÊNCIAS PROFISSIONAIS 2</b>
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Empresa:</b> '.$empresa2.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Função:</b> '.$funcao2.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Atribuições:</b> '.$atribuicoes2.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Periodo:</b> '.$comecou2.' a '.$terminou2.'
			</td>
		  </tr>		
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>EXPERIÊNCIAS PROFISSIONAIS 3</b>
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Empresa:</b> '.$empresa3.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Função:</b> '.$funcao3.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Atribuições:</b> '.$atribuicoes3.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>Periodo:</b> '.$comecou3.' a '.$terminou3.'
			</td>
		  </tr>
		  <tr>
		  	<td>
				&nbsp;
			</td>
		  </tr>
		  <tr>
		  	<td>
				<b>PORQUE DESEJA TRABALHAR NA CROYDON?</b>
			</td>
		  </tr>
		  <tr>
		  	<td>
				'.$porque_trabalhar.'
			</td>
		  </tr>
		</table>
		
		</body>
	</html>';
	
	
	
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "From:SITE CROYDON <site@croydon.com.br>\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";	
	$headers .= "Cc: marketing@croydon.com.br\r\n";
	
	if(mail($mm, 'CURRICULO - SITE CROYDON', $m, $headers)){
		echo  '<script>window.location.href = "'.$_SESSION['url'].$lang.'/confirmacao"</script>';
	}
	else{
		echo  '<script>alert("Erro, Tente novamente!");</script>';
	}
}
?>