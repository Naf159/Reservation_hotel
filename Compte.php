
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Comptes</title>

<link href="Style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />




<head>
<style>
h3{
color:midnightblue;

}
legend{

}


	
	}
	
	
	
	table { 
	
	 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: Gainsboro; 
	}
	th { 

		background:#E6E6FA; 
		color: #003366; 
		font-weight: bold; 
	}
	td, th { 
	 
		border: 1px solid #ccc; 
		text-align: center;
		height:39px;
width:120px;
	
	}
		th { 
		
		background-image: linear-gradient(white,#283E68); 
		color: white; 
		font-weight: bold; 
	}
Label{

color:midnightblue;

}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<link rel="stylesheet" href="tableaux/style.css">
<link href="test.css" rel="stylesheet" type="text/css"/>


</head>

<body>


 <img src="logo.jpg"   class="img"/>

<center>
		
<div class="menu1">
<div style="width:900px;height:2000px;background-color:#EFF0FF;border:1px;margin-top:25px; -webkit-border-top-right-radius: 10px;
     -webkit-border-bottom-left-radius: 10px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    
	">

<ul class="menu">
<li><a href="Acceuil.php" >Acceuil</a></li>
<li><a href="Reservation.php" >Reservation</a></li>




<li><a href="Facture.php">Facturation</a></li>

<li><a href="Consultation.php">Consultation</a></li>
<li><a href="">Bases</a>
<ul>

<li><a href="Supplement.php">Suppl&eacute;ment</a></li>


<li><a href="Type_chambre.php" >Type de Chambre</a></li>

<li><a href="Extras.php">Extras </a></li>

<li><a href="Mode_paiement.php">Mode de paiement  </a></li>

</ul>
</li>
<li><a href="Compte.php">Comptes</a>
<ul>

<li><a href="Compte.php">Liste des comptes</a></li>


<li><a href="Deconnexion.php" >Déconnexion</a></li>
</ul>
</li>
</div>
</div>




<div class="cadre_principal">
<br>
<center>

<div style="background-color:Lavender;width:390px;height;-webkit-border-top-right-radius: 1px;
     -webkit-border-bottom-left-radius: 1px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    ">
<h3 >Liste des comptes</h3></div></center>

<form method=POST ACTION="">

<?php
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
$requete="SELECT * from compte";
$result=mysql_query($requete);?>

<center>

<table>

<tr><th>Nom</th>
<th>Prenom</th>
<th>Identifiant</th>
<th>Mot de passe</th>
<th colspan=2>Action</th></tr>
<?php
	while ($ligne = mysql_fetch_row($result)) { 
	$id=$ligne[0];
	
	?>
		<tr>
		    
			<td><?php echo $ligne['1']; ?></td>
		<td><?php echo $ligne['2']; ?></td>
		<td><?php echo $ligne['3']; ?></td>
		<td><?php echo $ligne['4']; ?></td>
		   <td >

			<?php echo '<a href="Compte.php?id='.$id.'">';?><img src="images/user_edit.png"/> modifier</a>
			</td>
			<td >
			<?php echo '<a href="Supprimer_Compte.php?id='.$id.'">'; ?><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr >
		    
		<?php
		}
		?>
		
	
       
		 
	 
</table>

<br>

<input type=submit value="Nouveau compte" name=Ajouter class=btnAjout size="10">


</form>
</div>

<?php
if(isset($_POST["Ajouter"])){

echo '

<form method=POST ACTION="">

<fieldset style="width:750px;height:100px;margin-top:-900px;text-align:left;border-color:steelblue;">

<legend style="text-align:left;background-color:lavender;font-weight:bold">Nouveau Compte </legend>
<br>
<label  style="margin-left:2px;"for=Nom>Nom:</label><input placeholder=Nom type="text" name=Nom id=Nom size=15 style="position:absolute;left:340px;"/>
<label style="margin-left:20px;"FOR=Prenom>Pr&eacute;nom:</label><input placeholder=Prénom style="position:absolute;left:520px;"type="text" name=Prenom id=Prenom size=15 />

<label for=ID style="margin-left:30px;">Identifiant :</label><input type="text" placeholder=Identifiant style="position:absolute;left:715px;"name=ID id=ID size=15 />
<label for=PSW style="position:absolute;left:845px;">Mot de passe:</label><input placeholder="Mot de passe" type="text" style="position:absolute;left:930px" name=PSW id=PSW size=15 />
<br><br>
<td width=30%><input type=submit name=valider_ajout value=Valider style="margin-left:320px" />
<input type=submit  value=Annuler name=fermer />

</form>

';
}
if(isset($_POST["valider_ajout"])){
if(!empty($_POST["Nom"])&&!empty($_POST["Prenom"])&&!empty($_POST["ID"])&&!empty($_POST["PSW"])){
$Nom=$_POST["Nom"];
$Prenom=$_POST["Prenom"];
$ID=$_POST["ID"];
$PSW=$_POST["PSW"];
$requete="INSERT INTO compte values('','$Nom','$Prenom','$ID','$PSW')";
$result=mysql_query($requete);

if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('Le compte est enregistré avec succées !')</script>";
echo "<script type=\"text/javascript\">window.opener.parent.top.location.reload()</script>";
echo "<script type=\"text/javascript\">document.location.href=\"Compte.php\"</script>";

}

} 
else {
echo "<script type=\"text/javascript\">alert('formulaire incomplet !!!!')</script>";}

}
if(isset($_GET["id"])){
$N_compte=$_GET['id'];
$requete1="SELECT * from compte where N_compte='$N_compte'";
$result1=mysql_query($requete1);
if($result1)
{
$ligne = mysql_fetch_row($result1);

}
echo '
<form method=POST ACTION="">
<div>
<fieldset style="width:750px;height:100px;margin-top:-900px;text-align:left;border-color:steelblue;">


<legend style="text-align:left;background-color:lavender;font-weight:bold">Modification du compte Numéro :'.$N_compte.'</legend>
<br>
<label  style="margin-left:2px;"for=Nom>Nom:</label><input type="text" name=Nom id=Nom  style="position:absolute;left:340px;" size=15 value= '.$ligne[1].' /></td>
<label for=Prenom style="margin-left:20px;">Pr&eacute;nom</label><input type="text" style="position:absolute;left:520px;" name=Prenom id=Prenom size=15 value='. $ligne[2].' /></td></tr>

<label for=ID style="margin-left:30px;">Identifiant</label><input type="text"  style="position:absolute;left:715px;" style="position:absolute;left:715px;"name=ID id=ID size=15 value='.$ligne[3].' /></td>
<label FOR=PSW style="position:absolute;left:845px;">Mot de passe</label><input type="text" style="position:absolute;left:930px" style="position:absolute;left:930px"name=PSW id=PSW size=15 value='.$ligne[4].' /></td></tr>
<br><br>

<input type=submit name=valider_modif value=Valider style="margin-left:320px"/>
<input type=submit  value=Annuler name=fermer /></td></tr>

</fieldset>
</div>
</form>
';
if(isset($_POST["valider_modif"])){
$Nom=$_POST["Nom"];
$Prenom=$_POST["Prenom"];
$ID=$_POST["ID"];
$PSW=$_POST["PSW"];
$requete="UPDATE compte SET `Nom_utilisateur`='$Nom',`prenom_utilisateur`='$Prenom',`identifiant`='$ID',`mot_de_passe` ='$PSW' WHERE N_compte='$N_compte' ";
$result=mysql_query($requete);
if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('La modification est effectuée avec succés')</script>";
echo "<script type=\"text/javascript\">window.opener.parent.top.location.reload()</script>";
echo "<script type=\"text/javascript\">window.close() </script>";
echo "<script>document.location.href='Compte.php';</script>\n";}





}
}
if(isset($_POST["fermer"]))
{

echo "<script type=\"text/javascript\">document.location.href='Compte.php'; </script>";


}
?>
</div>


</body>
</html>