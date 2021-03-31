<?php session_start(); ?>
<?php if (@$_SESSION["plano_status"] <> "NOME_USUARIO") header("location: login.php") ?>
<?php include("db.php") ?>

<?php 
	/* COMANDO PARA CONECTAR AO SERVIDOR DO BANCO DE DADOS*/
	$link2 = mysql_connect(HOST, USER, "") or die ("FALHA NA CONEXÃO DO BANCO DE DADOS");
	/*COMANDO PARA SELECIONAR O BANCO DE DADOS"*/
	mysql_select_db("UNAMA") or die("NÃO FOI POSSIVEL CONECTAR AO BANCO DE DADOS");
	/* FAZER A QUERY SQL*/
	$userid=$_SESSION["plano_status_user"];
	$query = "select * from usuario where `NOME_USUARIO`='".$userid."'";
	$result = mysql_query($query) or die("A QUERY DE CONSULTA TESTE FALHOU.");
	mysql_free_result($result);
	if (@$_POST["submit"] <> ""){
		$ncamp1 = @$_POST["senha anterior"];
		$ncamp2 = @$_POST["senha atual"];
		$atualizar = "UPDATE 'usuario' SET( 'SENHA_USUARIO' ) VALUES ('$ncamp1', '$ncamp2');";
		$update1 = mysql_query($atualizar) or die ("QUERY 2 FALHOU");
		if($update1){
			header("Location:conf_alterar.php");
	}
		mysql_free_result($update1);
	}
/*FECHANDO CONEXÃO COM SERVIDOR*/
	mysql_close($link2);
?>
	
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>PAGINA DE ALTERAÇÃO DE SENHA</title>
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
			<form action="alterar.php" method="post" name="form1" id="form1">
			 <tr>
			   <td colspan="3" style="text-align: center">Insira os dados para alterar senha de Edenilson</td>
		      </tr>
			 <tr>
			   <td style="text-align: center">SENHA ANTERIOR:</td>
			   <td colspan="2" style="text-align: left"><label for="senha anterior"></label>
		       <input name="senha anterior" type="password" id="senha anterior" size="30" maxlength="30"></td>
		      </tr>
			 <tr>
			 	<td width="215" style="text-align: center">SENHA ATUAL:</td>
				 <td colspan="2" style="text-align: left"><label for="senha atual"></label>
                 <input name="senha atual" type="password" id="senha atual" size="20" maxlength="20"></td>
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
