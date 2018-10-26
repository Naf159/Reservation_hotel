<?php 
if(isset($_POST["valider_ajout"])){
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
$N_extra="Select max(N_extra)+1 from extras";
$N_reservation=$_POST["Num"];
$Libelle=$_POST["label"];
$Tarif=$_POST["tarif"];
$requete="INSERT INTO extras values('$N_extra','$N_reservation','$Libelle','$Tarif')";
$result=mysql_query($requete);
if(!$result)
{
}
else{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
}
if(isset($_POST["fermer_popup"]))
{ 
echo "<script type=\"text/javascript\">alert('L'ajout est fait avec succé!')</script>";
echo "<script type=\"text/javascript\">window.opener.parent.top.location.reload()</script>";
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

<h3>Ajouter un extra<h3>
<form method=POST ACTION="">
<div >
<table cellspacing=10 bgcolor=#C1EBFF>
<tr><td>N_reservation: </td><td><input type="text" name=Num size=5> </td>
<td>Libelle: </td><td><input type="text" name=label size=5></td>
<td>Tarif: </td> <td><input type="text" name=tarif size=5></td>
</tr>
<tr>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>
<input type=submit name=valider_ajout value=Valider></td>
<td><input type=submit  value=annuler name=fermer_popup></td>
</tr>
</table>
</div>
</form>

</body>
</html>