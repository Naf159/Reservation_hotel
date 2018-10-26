<?php 
if(isset($_POST["valider_ajout"])){
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
if(!empty($_POST["mode"])){
$mode=$_POST["mode"];

$requete="INSERT INTO mode_paiement values('','$mode')";

$result=mysql_query($requete);
if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('Le mode de paiement est enregistre')</script>";
echo "<script type=\"text/javascript\">window.opener.parent.top.location.reload()</script>";
echo "<script type=\"text/javascript\">window.close() </script>";

}

} 
else {
echo "<script type=\"text/javascript\">alert('formulaire incomplet !!!!')</script>";}
if(isset($_POST["fermer_popup"]))
{

echo "<script type=\"text/javascript\">window.close() </script>";


}
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
<tr><td>Mode de paiement: <input type="text" name=mode size=15> </td>
</tr>
<tr>
</tr>
<tr>
<td></td>
<td>
<input type=submit name=valider_ajout value=Valider>

<input type=submit  value=annuler name=fermer_popup></td>
</tr>
</table>
</div>
</form>

</body>
</html>