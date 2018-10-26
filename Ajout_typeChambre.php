<?php 
if(isset($_POST["valider_ajout"])){
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
$N_type="Select max(N_type)+1 from type_chambre";
$Type=$_POST["type"];
$max_pers=$_POST["max_pers"];
$lit_simple=$_POST["lit_simple"];
$lit_double=$_POST["lit_double"];
$requete="INSERT INTO type_chambre values('$N_type','$Type','$max_pers','$lit_simple','$lit_double')";
$result=mysql_query($requete);
if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('Le type de chambre est enregistre')</script>";
echo "<script type=\"text/javascript\">window.opener.parent.top.location.reload()</script>";
echo "<script type=\"text/javascript\">window.close() </script>";

}

}
if(isset($_POST["fermer_popup"]))
{
echo "<script type=\"text/javascript\">window.close() </script>";
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
@import "Style.css"
</style>
</head>

<body>

<h3>Ajouter un type de chambre<h3>
<form method=POST ACTION="">
<div >
<table cellspacing=10 bgcolor=#C1EBFF>
<tr><td>Type de chambre: <input type="text" name=type size=15> </td>
<td>Maximum de personne: <input type="text" name=max_pers size=5></td>

<td>Nombre de lits simples: <input type="text" name=lit_simple size=5></td>
<td>Nombre de lits doubles : <input type="text" name=lit_double size=5></td>
</tr>
<tr>
</tr>
<tr>
<td></td>
<td></td>
<td><input type=submit name=valider_ajout value=Valider></td>
<td>

<input type=submit  value=annuler name=fermer_popup></td>
</tr>
</table>
</div>
</form>

</body>
</html>