<?php session_start(); ?>
<?php if (@$_SESSION["plano_status"] <> "NOME_USUARIO") header("location: login.php") ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>PAGINA COM AUTENTICAÇÃO</title>
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

<body background="images/fundo.png" link="#CC0000" vlink="#CC0000" alink="#CC0000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="top">
<table width="776" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr align="center" valign="top">
		<td width="30" height="350" color="#330066" style="text-align: center"><p><?php
	echo "Você está logado como: ";
	echo $_SESSION["plano_status_User"];
?>&nbsp;</p>
		<table width="500" height="10" border="0" align="center">
			 <tr>
			 	 <td width="125" style="text-align: center"><a href="cad_usuario.php">CADASTRO</a></td>
				 <td width="125" style="text-align: center"><a href="alterar.php">ALTERAR SENHA</a></td>
				 <td width="125" style="text-align: center"><a href="logoff.php">SAIR</a></td>
			 </tr>
			</table>
		<div align="center"></span></div>
	</td>
	</tr>		
</table>
</div>
</body>
</html>
