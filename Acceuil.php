
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
	h4{
	text-align:left;
	text-decoration:none;
	color:gray;
	}
	h1{
	text-align:left;
	color:Steelblue;
	}
	hr{
	color:navy;
	
	background-color:navy;
	height: 2px;
  margin: -0.5em 0;
  padding: 0;
  color: #F00;
  background-color: Steelblue;
  border: 0;
	}
	.style{
border:1px solid #fcfcfc ;
border-radius:14px;
}

#reflet{ 
 font-weight:2000;
		font-size:80px;
    float:left; 
	Color:rgb(28,118,201);
    -webkit-box-reflect: below -3px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.3)));
	
    }
	#reflet1{ 
 font-weight:2000;
		font-size:80px;
    float:left; 
	Color:GRAY;
    -webkit-box-reflect: below -3px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.3)));
	
    }
                      
                      
        #reflet2{
            float:left;  margin-left:50px;
			Color:rgb(28,118,201);
                -webkit-box-reflect: below 4px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(white));
            -webkit-border-radius: 3px;
            border-radius: 3px;
        font-weight:2000;
		font-size:larger;
            }
	
	span{
color:Steelblue;
size:8px;

}
legend{
font-size:20px;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Acceuil</title>

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

<link rel="stylesheet" type="text/css" href="style_Log.css" />
</head>
 <body>
   
<?php include('connexion.php');?>
 <img src="logo.jpg" class="img" />


<center>

<div class="menu1">
<div style="width:900px;height:2000px;;background-color:#EFF0FF;border:1px;margin-top:25px; -webkit-border-top-right-radius: 10px;
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


<div class="cadre_principal" style="margin-left:10px;padding-left:10px;padding-right:10px; color:black;">
<form>
<h1 style="margin-left:0.2cm">Bienvenue</h1>
<hr />
<h4 style="text-align:center;text-decoration:none;">
<?php
if(isset($_GET["Prenom"]) or isset($_GET["Nom"]))
{
echo $_GET["Nom"];
echo "   ";
echo $_GET["Prenom"];
echo "  !";
}
 ?>
</h4> 
<fieldset style="width:780px;border-color:steelblue;background-color:steelblue;position:relative;left:0.7cm;">
Votre derni&egrave;re connexion a été le:14/06/2014 &agrave; 13:45:01
</fieldset>
<fieldset style="width:750px;border-color:steelblue;position:relative;left:0.7cm;" >
<legend style="background-color:#F7F7F0;color:steelblue;padding:2px;text-align:left;">A propos</legend>
<fieldset style="width:750px;border-color:white;border-width:0px;text-align:left;">
<legend style="background-color:#F7F7F0;color:steelblue;padding:2px;">EasyBooking</legend>
Cette application est r&eacute;alis&eacute;e dans le cadre 
de stage de fin d'&eacute;tude pour l'obtention du Diplome Universitaire de Technologie.
Elle pr&eacute;sente une solution web qui permet aux d&eacute;ffirents administrateurs de g&eacute;rer
les r&eacute;servations d'un hotel.


</fieldset>
<fieldset style="width:750px;border-color:white;border-width:0px;padding:2px;text-align:left;">
<legend style="background-color:#F7F7F0;color:steelblue;padding:2px;">R&eacute;alisation</legend>
<span><i><u>Travail de :</u></i></span><BR>
<i >Nafissa MOUNIR<BR>
Sarra BOUTAHLIL<BR>
Samira BOURHILA<BR></i>
<span><i><b><u>Encadr&eacute; par:</u></b></i></span><br>
<i >Mr.Mustapha AMROUCH<br>
Mr.Rachid MBARKI</i>
</fieldset>



</fieldset>

<br><br>
<center>


<div id=Apropos>
</div>

</center>
</form>
</div>

</center>
</body>
</html>