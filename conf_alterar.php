<?php session_start(); ?>
<?php if (@$_SESSION["plano_status"] <> "NOME_USUARIO") header("location: login.php") ?>
<?php include ("db.php") ?>
<html>
<head>
<title>Principal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	color: #330066;
}
a:link {
	color: #330066;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #330066;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style></head>

<body text="#330066" link="#330066" vlink="#330066" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center"> 
  <table width="1024" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr align="center" valign="middle"> 
      <td width="831" height="180"> 
        <p>
          <?
echo $_SESSION["plano_status_User"];
?>
          <br>
        Senha Alterada com SUCESSO!!!</p>
      <a href="principal.php">VOLTAR</a><br>    <br>      </td>
    </tr>
  </table>
</div>
</body>
</html>
