<?php 
if(isset($_POST['insert'])) {
include("connexion.php");

 $nom=$_POST['nom'];

 $pre=$_POST['prenom'];
 $titre=$_POST['titre'];
  $tel=$_POST['tel'];
 $mail=$_POST['mail'];
 $adr=$_POST['adr'];
 $ville=$_POST['ville'];
  $code=$_POST['code'];
  
mysql_query("INSERT INTO client_principal values('','$nom','$pre','$titre','$tel','$mail','$adr','$ville','$code','')");
echo "<script type=\"text/javascript\">alert('Ajout réussi !')</script>";
echo "<script type=\"text/javascript\">window.opener.location.reload();</script>";
echo "<script type=\"text/javascript\">window.close()</script>";
}
if(isset($_POST['annuler'])) 
echo "<script type=\"text/javascript\">window.close()</script>";
?>
<html>
<head>
<title>
Ajout d'un Nouveau client
</title>
<style>
@import "Style.css"

</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form action="" method="POST" >
<center>
<div style="background-color:lavender;border:1px solid lavender;border-radius:10px;margin-left:1px;height:320;">
<table style="margin-left:1cm;" >
<tr> <td width=60%>  <h3 style="color:steelblue;Margin-left:140px;text-decoration:underline;"> Nouveau client </h3></td></tr>
<tr>
<td>
<Label>Nom:</Label><input name="nom" type="text"/>
</td>
<td>
<Label>Prenom:</Label><input name="prenom" type="text"/>
</td>
<tr>
<td>
<Label>Titre(Mr/Mlle/Mme):</Label><input name="titre" type="text"/>
</td>

<td>
<Label>Tel:</Label><input name="tel" type="text"/>
</td>
<tr>
<td>
<Label>E-mail:</Label><input name="mail" type="text"/>
</td>
<td>
<Label>Adresse:</Label><input name="adr" type="text" />
</td>
</tr>
<tr>
<td>
<Label>Ville:</Label> <input name="ville" type="text"/>
</td>
<td>
<Label>Code postal:</Label><input name="code" type="text"/>
</td>
</tr>
<tr><tr>
<tr >
<td >
<input type=submit name="insert" value="Envoyer" style="position:relative;top:0.4cm;left:3.3cm;" />  <input type=submit name="annuler" value="Annuler"style="position:relative;top:0.4cm;left:4cm" />
</td>
</tr><br>
</form>
</table> </div>
</center>

</body>

</html>
