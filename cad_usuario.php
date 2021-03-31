<?php session_start(); ?>
<?php if (@$_SESSION["plano_status"] <> "NOME_USUARIO") header("location: login.php") ?>
<?php include("db.php") ?>
<?php 
	/* COMANDO PARA CONECTAR AO SERVIDOR DO BANCO DE DADOS*/
	$link = mysql_connect(HOST, USER, "") or die ("NÃO PUDE CONECTAR");
	/*COMANDO PARA SELECIONAR O BANCO DE DADOS"*/
	mysql_select_db("UNAMA") or die("NÃO PUDE SELECIONAR O BANCO DE DADOS");
	/* FAZER A QUERY SQL*/
	$query = "select * from usuario";
	$result = mysql_query($query) or die("QUERY FALHOU.");
	mysql_free_result($result);
	if (@$_POST["submit"] <> ""){
		$ncampo1 = @$_POST["nome"];
		$ncampo2 = @$_POST["senha"];
		$insere = "INSERT INTO `usuario` ( `NOME_USUARIO`,`SENHA_USUARIO` ) VALUES ('$ncampo1','$ncampo2');";
		$result1 = mysql_query($insere) or die ("QUERYFALHOU02");
		if($result1){
			header("Location: conf.php");
	}
		mysql_free_result($result1);
	}
/*FECHANDO CONEXÃO COM SERVIDOR*/
	mysql_close($link);
?>
	
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>PAGINA DE LOGIN</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- Templat	eEndEditable -->
<style type="text/css">
a:link {
    color: #CC0000;
    text-decoration: none;
}
a:visited {
    text-decoration: none;
    color: #CC0000;
}
a:hover {
    text-decoration: none;
    color: #CC0000;
}
a:active {
    text-decoration: none;
    color: #CC0000;
}
a {
    font-family: Arial, Verdana;
    font-weight: bold;
    font-size: 12px;
}
</style>
</head>

<body link="#CC0000" vlink="#CC0000" alink="#CC0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
<table width="776" border="0" cellpadding="0" cellspacing="0">
	<tr align="center" valign="top">
		<td width="30" height="350"><p>&nbsp;</p>
		<table width="500" height="10" border="0" align="center">
			<form action="cad_usuario.php" method="post" name="form1" id="form1">
			 <tr>
			   <td colspan="3" style="text-align: center">Insira os dados para cadastrar</td>
		      </tr>
			 <tr>
			   <td style="text-align: center">NOME</td>
			   <td colspan="2" style="text-align: left"><label for="nome"></label>
		       <input name="nome" type="text" id="nome" size="30" maxlength="30"></td>
		      </tr>
			 <tr>
			 	<td width="215" style="text-align: center">SENHA</td>
				 <td colspan="2" style="text-align: left"><label for="senha"></label>
                 <input name="senha" type="password" id="senha" size="20" maxlength="20"></td>
			  </tr>
			 <tr>
				 <td><a href="principal.php">VOLTAR</a></td>
				 <td width="128"><input type="submit" name="submit" id="submit" value="Enviar"></td>
				 <td width="143"><input type="reset" name="reset" id="reset" value="Redefinir"></td>
			  </tr>
		    </form>
			</table>
		<div align="center"></span></div>
	</td>
	</tr>		
</table>
</div>
</body>
</html>
