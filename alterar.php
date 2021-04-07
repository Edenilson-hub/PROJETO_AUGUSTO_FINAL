<?php session_start();?>
<?php if (@$_SESSION["plano_status"] <> "NOME_USUARIO") header("location: login.php")?>
<?php include("db.php")?>
<?
	if (@$_POST["submit"] <> ""){
		$userid=$_SESSION["plano_status_User"];
		$ncamp1 = @$_POST["anterior"];
		$ncamp2 = @$_POST["atual"];
		/* COMANDO PARA CONECTAR AO SERVIDOR DO BANCO DE DADOS*/
	$link2 = mysql_connect(HOST, USER, "");
		/*COMANDO PARA SELECIONAR O BANCO DE DADOS"*/
	mysql_select_db("UNAMA");
		/* FAZER A QUERY SQL*/
		$result = mysql_query("select * from `usuario` where `NOME_USUARIO`='".$userid."'") or die(mysql_error());	
		if ($linha = mysql_fetch_array($result)) { 
		if (strtoupper($linha["SENHA_USUARIO"]) == strtoupper($ncamp1)) {
		$atualiza = "UPDATE `usuario` SET `SENHA_USUARIO` = '".$ncamp2."' where `NOME_USUARIO` = '".$userid."'";
		mysql_query($atualiza) or die (mysql_error());
		/*if($update1){*/
		header("Location:conf.php");
		}
/*	}*/
	/*	mysql_free_result($atualiza);*/
}/*FECHANDO CONEXÃO COM SERVIDOR*/
mysql_free_result($result);
mysql_close($link2);
}
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
			   <td colspan="3" style="text-align: center"><p>Insira os dados solicitados para alteração da senha do usuario:</p> <br>
				  <p> <?php echo $_SESSION["plano_status_User"]; ?>
		       <p>&nbsp;</p></td>
				</p>
		      </tr>
			 <tr>
			   <td style="text-align: center">SENHA ANTERIOR:</td>
			   <td colspan="2" style="text-align: left"><label for="anterior"></label>
		       <input name="anterior" type="password" id="anterior" size="30" maxlength="30"></td>
		      </tr>
			 <tr>
			 	<td width="215" style="text-align: center">SENHA ATUAL:</td>
				 <td colspan="2" style="text-align: left"><label for="atual"></label>
                 <input name="atual" type="password" id="atual" size="20" maxlength="20"></td>
			  </tr>
			 <tr>
				 <td><a href="../principal.php">VOLTAR</a></td>
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
