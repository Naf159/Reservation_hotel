
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table { 
	
		 
		border-collapse: collapse; 
	
	}
	
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: Gainsboro; 
	}
	th { 
	background-image: linear-gradient(white,#283E68); 
		color: white; 
		font-weight: bold; 
	}
	td{
	color:steelblue;
	}
	td, th { 
 
		padding: 6px;
		 
		border: 1px solid #ccc; 
		text-align: center;
		height:39px;
width:150px;
	
	}
	h3{
	
	color:midnightblue;
	}
	
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Liste des extras</title>

<link href="../datepickr.css" rel="stylesheet" type="text/css" />
<link href="datepickr.min.js" rel="stylesheet"  />
<link href="datepickr.js" rel="stylesheet"  />
<link href="datepickr.css" rel="stylesheet" type="text/css" />
<link href="Style.css" rel="stylesheet" type="text/css" />
<link href="reser_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />


<script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>

</head>





 <body>
   
			 
	

 <img src="logo.jpg" class="img" />


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


<div class="cadre_principal">
<center><br>

<div style="background-color:Lavender;width:390px;height;-webkit-border-top-right-radius: 1px;
     -webkit-border-bottom-left-radius: 1px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    ">
<h3 >Liste de Extras</h3></div></center>
<?php
include("connexion.php");
    $str="SELECT * FROM `extras` WHERE 1";
?>
	<center>
	
<form method=POST ACTION="">


<?php

if(  $res=mysql_query($str))
$i=1;
        {
		
            echo "<table border=2 cellpadding=8  >";
		    echo "<tr>";
			
			echo "<th>Libell&eacute;</th>";
	
			echo "<th colspan=2 >Action</th>";
		    echo "</tr>";
       
             while($L=mysql_fetch_array($res))
             {$id=$L['N_extra'];
			 if($i%2==0)
			 {
			 echo "<tr bgcolor=#C1EBFF>";
			 echo "<td >".$L['Libelle']."</td>";
		
			 echo "<td><a href=\"Extras.php?id=$id\"><img src=\"images/user_edit.png\" /> modifier</a>";
			 echo "<td><a href=\"supprimer_extra.php?id=$id\"><img src=\"images/trash.png \"/>  supprimer</a></td></tr>";
			 }
			 else
			 {
			 
			 echo "<td >".$L['Libelle']."</td>";
			 
			 echo "<td><a href=\"Extras.php?id=$id\"><img src=\"images/user_edit.png\" /> modifier</a></td>";
			 echo "<td><a href=\"supprimer_extra.php?id=$id\"> <img src=\"images/trash.png \"/>supprimer</a></td></tr>";
			 }
			 $i++;
			}
		}
		echo "</table>";

?>
<br>
<input type=submit value="Nouveau extra" name=ajouter_extra class=btnAjout size="10">
<center>
<?php 
if(isset($_POST["ajouter_extra"])){
echo'


<br>
<fieldset style="width:400px;color:midnightblue;border-color:steelblue;text-align:left;">
<legend style="font-weight:bold;">Nouveau Extra</legend>
<td>Libellé:</td> <td><input type="text" name=Libelle size=15 ></td>
<tr>
</tr>
<tr>
<td></td>


<td><input type=submit name=valider_ajout value=Valider  style="\margin-left:30px ;\">


<input type=submit  value=annuler name=annuler></td>
</tr>
</fieldset>';
}
if(isset($_POST["valider_ajout"])){
if(!empty($_POST["Libelle"])){


$Libelle=$_POST["Libelle"];
$requete="INSERT INTO extras values('','$Libelle')";
$result=mysql_query($requete);

if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('L'extra est enregistré')</script>";
echo "<script>document.location.href='Extras.php';</script>\n"; 
}
}

else {
echo "<script type=\"text/javascript\">alert('Formulaire incomplet')</script>";
echo'


<br>
<fieldset style="width:400px;color:midnightblue;border-color:steelblue;text-align:left;">
<legend style="font-weight:bold;">Nouveau Extra</legend>
<td>Libellé:</td> <td><input type="text" name=Libelle size=15 ></td>
<tr>
</tr>
<tr>
<td></td>


<td><input type=submit name=valider_ajout value=Valider  style="\margin-left:30px ;\">


<input type=submit  value=annuler name=annuler></td>
</tr>
</fieldset>';

}}
if(isset($_POST["annuler"]))
{
echo "<script>document.location.href='Extras.php';</script>\n"; 
}
if (isset($_GET["id"])){


$N_extra=$_GET['id'];
$req="SELECT * from extras where N_extra='$N_extra'";
$res=mysql_query($req);
if($res)
{
$L = mysql_fetch_row($res);
$libelle=$L[1];
}
echo'


<br>
<fieldset style="width:400px;color:midnightblue;border-color:steelblue;text-align:left;">
<legend style="font-weight:bold;">Extra numéro'; echo $N_extra.'</legend>
<td>Libellé:</td> <td><input type="text" name=Libelle size=15 value="'.$libelle.'" ></td>
<tr>
</tr>
<tr>
<td></td>


<td><input type=submit name=valider_modif value=Valider  style="\margin-left:30px ;\">


<input type=submit  value=annuler name=annuler></td>
</tr>
</fieldset>';

}

if(isset($_POST["valider_modif"])){


$label=$_POST["Libelle"];

$requete="UPDATE extras SET Libelle='$label' WHERE N_extra='$N_extra'";
$result=mysql_query($requete);
if(!$result)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else{
echo "<script type=\"text/javascript\">alert('L'extra est modifié')</script>";
echo "<script>document.location.href='Extras.php';</script>\n";}
}
 



?>

</div>
</center>
</body>
</html>
