<?php include("db.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Consulta</title>
</head>
<body>
<div>
<table width="725" border="1">
<tbody>
<tr>
<td with="725" border="1">
	<?php
	$link = mysql_connect(HOST, USER, "") or die("NÃO PUDE CONECTAR");
	mysql_select_db("UNAMA") or die("NÃO PUDE SELECIONAR O BANCO DE DADOS");
?>
<form id="form1" name="frmbusca" method="post" action="consulta.php">
<input nome="palavra" type="text" id="palavra" size="70" maxlength="70">
<input type="submit" name="submit" id="submit" value="Buscar">
</form>
<?php
$palavra = trim($_POST['palavra']);
if ($palavra <> ""){
    #FAZENDO QUERY SQL
    $query = "SELECT * FROM `usuario` where `NOME_USUARIO` = '%$palavra%' ORDER BY `ID_USUARIO` "; 
  $result = mysql_query($query) or die("query falhou");
  #
  print "<table>\n";
  print '
  <tr>
    <td>CODIGO:</td>
    <td>NOME:</td>
    </tr>
    ';
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)){
            print "<tr>";
            #NOME DO CAMPO QUE LEVA AO TEXTO
        $line["NOME_USUARIO"];
            #função que converte caracteres acentuadas por maiusculas acentuadas.
        $tituloMaiuscula = strtoupper(strt($line["NOME_USUARIO"], "áéíóúâêôãõàèìòùç", "ÁÉÍÓÚÂÊÔÃÕÀÈÌÒÙÇ"));
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
</tbody>
    </table>
</body>
</html>