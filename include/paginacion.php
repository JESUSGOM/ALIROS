<?
    mysql_connect("localhost","root","");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ejemplo de paginación de resultados</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Pragma" content="no-cache" />
<style type="text/css">
<!--
a.p:link {
    color: #0066FF;
    text-decoration: none;
}
a.p:visited {
    color: #0066FF;
    text-decoration: none;
}
a.p:active {
    color: #0066FF;
    text-decoration: none;
}
a.p:hover {
    color: #0066FF;
    text-decoration: underline;
}
a.ord:link {
    color: #000000;
    text-decoration: none;
}
a.ord:visited {
    color: #000000;
    text-decoration: none;
}
a.ord:active {
    color: #000000;
    text-decoration: none;
}
a.ord:hover {
    color: #000000;
    text-decoration: underline;
}
-->
</style>
</head>
<body bgcolor="#FFFFFF">
<script language="JavaScript">
function muestra(queCosa)
{
    alert(queCosa);
}
</script>
<div align="center"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Paginación
de Resultados de una consulta SQL (sobre MySQL)<br><br><p><a href="http://www.pclandia.com">www.pclandia.com</a></p> </font></strong> </div>
<hr noshade style="color:CC6666;height:1px">
<br>
<?
//inicializo el criterio y recibo cualquier cadena que se desee buscar
$criterio = "";
$txt_criterio = "";
if ($_GET["criterio"]!=""){
   $txt_criterio = $_GET["criterio"];
   $criterio = " where co_id like '%" . $txt_criterio . "%' or co_nombre like '%" . $txt_criterio . "%' or co_pais like '%" . $txt_criterio . "%'";
}


$sql="SELECT * FROM tpv.comercios ".$criterio;
$res=mysql_query($sql);
$numeroRegistros=mysql_num_rows($res);
if($numeroRegistros<=0)
{
    echo "<div align='center'>";
    echo "<font face='verdana' size='-2'>No se encontraron resultados</font>";
    echo "</div>";
}else{
    //////////elementos para el orden
    if(!isset($orden))
    {
       $orden="co_id";
    }
    //////////fin elementos de orden

    //////////calculo de elementos necesarios para paginacion
    //tamaño de la pagina
    $tamPag=5;

    //pagina actual si no esta definida y limites
    if(!isset($_GET["pagina"]))
    {
       $pagina=1;
       $inicio=1;
       $final=$tamPag;
    }else{
       $pagina = $_GET["pagina"];
    }
    //calculo del limite inferior
    $limitInf=($pagina-1)*$tamPag;

    //calculo del numero de paginas
    $numPags=ceil($numeroRegistros/$tamPag);
    if(!isset($pagina))
    {
       $pagina=1;
       $inicio=1;
       $final=$tamPag;
    }else{
       $seccionActual=intval(($pagina-1)/$tamPag);
       $inicio=($seccionActual*$tamPag)+1;

       if($pagina<$numPags)
       {
          $final=$inicio+$tamPag-1;
       }else{
          $final=$numPags;
       }

       if ($final>$numPags){
          $final=$numPags;
       }
    }

//////////fin de dicho calculo

//////////creacion de la consulta con limites
$sql="SELECT * FROM tpv.comercios ".$criterio." ORDER BY ".$orden.",co_id ASC LIMIT ".$limitInf.",".$tamPag;
$res=mysql_query($sql);

//////////fin consulta con limites
echo "<div align='center'>";
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>";
echo "ordenados por <b>".$orden."</b>";
if(isset($txt_criterio)){
    echo "<br>Valor filtro: <b>".$txt_criterio."</b>";
}
echo "</font></div>";
echo "<table align='center' width='80%' border='0' cellspacing='1' cellpadding='0'>";
echo "<tr><td colspan='3'><hr noshade></td></tr>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=co_id&criterio=".$txt_criterio."'>Código</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=co_nombre&criterio=".$txt_criterio."'>Nombre</a></th>";
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=co_pais&criterio=".$txt_criterio."'>País</a></th>";
while($registro=mysql_fetch_array($res))
{
?>
   <!-- tabla de resultados -->
    <tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" onClick="javascript:muestra('<? echo "[".$registro["co_id"]."] ".$registro["co_nombre"]." - ".$registro["co_pais"]; ?>');">
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["co_id"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["co_nombre"]; ?></b></font></td>
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["co_pais"]; ?></b></font></td>
    </tr>
   <!-- fin tabla resultados -->
<?
}//fin while
echo "</table>";
}//fin if
//////////a partir de aqui viene la paginacion
?>
    <br>
    <table border="0" cellspacing="0" cellpadding="0" align="center">
    <tr><td align="center" valign="top">
<?
    if($pagina>1)
    {
       echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
       echo "<font face='verdana' size='-2'>anterior</font>";
       echo "</a> ";
    }

    for($i=$inicio;$i<=$final;$i++)
    {
       if($i==$pagina)
       {
          echo "<font face='verdana' size='-2'><b>".$i."</b> </font>";
       }else{
          echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>";
          echo "<font face='verdana' size='-2'>".$i."</font></a> ";
       }
    }
    if($pagina<$numPags)
   {
       echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>";
       echo "<font face='verdana' size='-2'>siguiente</font></a>";
   }
//////////fin de la paginacion
?>
    </td></tr>
    </table>
<hr noshade style="color:CC6666;height:1px">
<div align="center"><font face="verdana" size="-2"><a class="p" href="index.php">::Inicio::</a></font></div>

<form action="busqueda.php" method="get">
Criterio de búsqueda:
<input type="text" name="criterio" size="22" maxlength="150">
<input type="submit" value="Buscar">
</form>

</body>
</html>
<?
    mysql_close();
?>