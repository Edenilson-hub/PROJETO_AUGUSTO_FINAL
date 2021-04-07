<?php include ("db.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Consulta</title>
</head>
<body>
<div align="center">
<table width="1024" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutTable-->
    <tr align="center" valign="middle"> 
      <td width="861" height="180" colspan="2">
<?php
$link = mysql_connect(HOST, USER, PASS) or die("NÃO PUDE CONECTAR");
mysql_select_db(DB) or die("NÃO PUDE SELECIONAR O BANCO DE DADOS");
?>
    
        <form name="fmbusca" method="post" action="consulta.php" >
<input name="palavra" type="text" size="70" />
<input type="submit" value="Buscar" />
</form>
<?php
$palavra = trim($_POST['palavra']);
if ($palavra <> ""){
    #FAZENDO QUERY SQL
    $query = "SELECT * FROM usuario WHERE NOME_USUARIO LIKE '%$palavra%' ORDER BY ID_USUARIO";
  $result = mysql_query($query) or die("query falhou");
  print "<table>\n";
  print '
  <tr> 
    	<td width="40" height="23" valign="top"><div align="left"><font color="#0000FF" size="2" face="Geneva, Arial, Helvetica, sans-serif">	<strong>Cod:</strong></font></div></td>
	    <td width="313" valign="top"><div align="left"><font color="#0000FF" size="2" face="Geneva, Arial, Helvetica, sans-serif"><strong>Nome:</strong></font></div></td>
	</tr>
    ';
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
            print "<tr>";
            #NOME DO CAMPO QUE LEVA AO TEXTO
        $line[NOME_USUARIO];
            #função que converte caracteres acentuadas por maiusculas acentuadas.
        $tituloMaiuscula = strtoupper(strtr($line[NOME_USUARIO], "áéíóúâêôãõàèìòùç", "ÁÉÍÓÚÂÊÔÃÕÀÈÌÒÙÇ"));
        print "<td>$line[ID_USUARIO]</td>";
        print "<td>$tituloMaiuscula</td>";
        print "</tr>";
    }
    print "</table>";
    #Liberar o resultado
    mysql_free_result($result);
    #fechando conecção com banco
    mysql_close($link);
} else {
    echo "Digite um nome para realizar a busca.";
}
?>
</td>
</tr>
</table>
</div>
</body>
</html>