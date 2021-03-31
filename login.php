<?php session_start();?>
<?php include("db.php")?>
<?php 
	if (@$_POST["submit"] <> ""){
		$validpwd = False;
		$userid = @$_POST["userid"];
		$userid = (get_magic_quotes_gpc()) ? stripslashes($userid) : $userid;
		$passwd = @$_POST["passwd"];
		$passwd = (get_magic_quotes_gpc()) ? stripslashes($passwd) : $passwd;
		if (!$validpwd){
			$conn = mysql_connect(HOST, USER, PASS);
			mysql_select_db(DB);
			$rs = mysql_query ("SELECT * FROM `USUARIO` WHERE `NOME_USUARIO` = '" .$userid ."'") or die(mysql_error());
			if ($row = mysql_fetch_array($rs)){
				if (strtoupper($row["SENHA_USUARIO"]) == strtoupper($passwd)){
					$_SESSION["plano_status_User"] = $row["NOME_USUARIO"];
					$validpwd = True;
				}
			}
			mysql_free_result($rs);
			mysql_close($conn);
		}
		if ($validpwd){
			$_SESSION["plano_status"] = "NOME_USUARIO";
			header("Location: principal.php"); //redirecionar para a pagina com permissão;
		}
	}
else{
	$validpwd = True;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>PAGINA DE LOGIN</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- Templat	eEndEditable -->
</head>

<body background="images/fundo.png" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
<table width="776" border="0" cellpadding="0" cellspacing="0">
	<tr align="center" valign="middle">
		<td width="30" height="350"><p><b><span style="font-family: Arial, Verdana"><font color="#CC0000" size="+3" face="Verdana, Arial, Helvetica, Sans-Serif"><b>B</b></font><font color="#330066" size="+2" face="Verdana, Arial, Helvetica, Sans-Serif"><b>em</b></font><font color="#CC0000" size="+3" face="Verdana, Arial, Helvetica, Sans-Serif"> <b>V</b></font><font color="#330066" size="+2" face="Verdana, Arial, Helvetica, Sans-Serif"><b>indo</b> </font><font color="#CC0000" size="+3" face="Verdana, Arial, Helvetica, Sans-Serif"><b>A</b></font><font color="#330066" size="+2" face="Verdana, Arial, Helvetica, Sans-Serif"><b>dministrador</b></font></span></font></p>
		<table width="230" height="10" border="0" align="center">
			<form action="login.php" method="post" name="form1" id="form1">
			 <tr>
			 	<td>
    			   <label for="textfield"><span style="text-align: right; font-family: Arial, Verdana; font-weight: bold; color: #CC0000;">L</span><span style="font-family: Arial, Verdana; color: #330066; font-weight: bolder;">ogin:</span></label></td>
				 <td><input name="userid" type="text" id="userid" maxlength="30">
				 </td>
			 </tr>
			 <tr>
				 <td>
    				<label for="password"><span style="font-family: Arial, Verdana; font-weight: bold; color: #CC0000;">S</span><span style="font-family: Arial, Verdana; font-weight: bolder; color: #330066;">enha:</span></label></td>
				 <td><input name="passwd" type="password" id="passwd" maxlength="20">
				 </td>
			 </tr>
			 <tr>
				 <td width="144" height="15" ></td>
				 <td width="28"></td>
			 </tr>
			 <tr align="center" valign="middle">
				 <td colspan="2" valign="top"><div align="center">
    				<input type="submit" name="submit" id="submit" value="Enviar">
    				<input type="reset" name="reset" id="reset" value="Redefinir">
					 </div>
				 </td>
			 </tr>  				
			</form>
			</table>
			
			<?php if (!$validpwd) { ?> 
				<div align="center"><font color = "FF0000" size="2" class="Verdana" style="font-family: Arial, Verdana; font-weight: bold;"> Usuário ou senha incorreta </font></span> <?php } ?>
				</div>
	</td>
	</tr>		
</table>
</div>
</body>
</html>
