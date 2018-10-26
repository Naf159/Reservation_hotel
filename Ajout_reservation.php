<?php 
 include("connexion.php"); 
mysql_query("SET NAMES UTF8");
 $result=mysql_query("select (Max(N_reservation)+1) as N_reservation from reservation");
 $arr = mysql_fetch_array($result);
$reservation=$arr['N_reservation'];
 if(isset($_POST['valider'])) {
if(!empty($_POST['name'])&&!empty($_POST['arrive'])&&!empty($_POST['dep'])){
$client=$_POST['name'];
$nom_complet=explode(" ",$client);
$nom= $nom_complet[0];
$prenom=$nom_complet[1];

 $arrive=$_POST['arrive'];
 $depart=$_POST['dep'];
 $client2=mysql_query("select Num_client_p from client_principal where Nom  LIKE '%".$nom."%' and Prenom LIKE '%".$prenom."%'");
 $client3=mysql_fetch_array($client2);
 $client1=$client3['Num_client_p'];
$date_a=date("Y-m-d", strtotime($arrive));
$date_dep=date("Y-m-d", strtotime($depart));
$total=0;

$sql1="select sum(Tarif) from prestation where N_reservation is NULL";
$fetch1=mysql_fetch_row(mysql_query($sql1));
$tarif_prest=$fetch1[0];
$sql2="select sum(Tarif) from chambre C , type_chambre T where C.N_type=T.N_type and C.N_reservation is NULL";
$fetch2=mysql_fetch_row(mysql_query($sql2));
$tarif_type=$fetch2[0];
$sql3="select sum(tarif) from chambre C , supplement S where C.N_supplement=S.N_supplement and C.N_reservation is NULL";
$fetch3=mysql_fetch_row(mysql_query($sql3));
$tarif_supplement=$fetch3[0];
$total=$tarif_prest+(($tarif_type+$tarif_supplement)*3);
mysql_query("insert into reservation values('$reservation','$client1','$date_a','$date_dep','1','$total',NULL)");
mysql_query("update chambre set N_reservation='".$reservation."' where N_reservation is NULL");
mysql_query("update client_secondaire set N_reservation='".$reservation."' where N_reservation is NULL");
mysql_query("update prestation set N_reservation='".$reservation."' where N_reservation is NULL");
echo "<script>alert('Reservation enregistrée');</script>\n"; 
echo "<script>document.location.href='Reservation.php';</script>\n"; 
}
else {echo "<script type=\"text/javascript\">alert('Formulaire incomplet')</script>";
echo "<script>document.location.href='Ajout_reservation.php';</script>\n"; }

}
if (isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['categorie'])  ){
if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['categorie'])){

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];

$categorie=$_POST["categorie"];

$requete1="INSERT INTO client_secondaire values('','$nom','$prenom','$categorie',NULL)";
$result1=mysql_query($requete1);
if(!$result1)
{
echo "<script type=\"text/javascript\">alert('Erreur :".mysql_error()."')</script>";
}
else
echo "<script type=\"text/javascript\">alert('Le client est enregistré ')</script>";


}

}



if (isset($_POST["annuler"])){
echo "<script>document.location.href='Reservation.php';</script>\n"; 
}
if (isset($_POST['type'])&& isset($_POST['sup'])&& isset($_POST['etage']) && $_POST['etage']!="0"&&!empty($_POST['etage'])){

$type=$_POST['type'];
   $sup=$_POST['sup'];
	
   $etage=$_POST['etage'];
$requete1=mysql_query("select N_type from type_chambre where Type='".$type."'");
$requete2=mysql_query("select N_supplement from supplement where Libelle='".$sup."'");
 $t = mysql_fetch_array($requete1);
 $N_type=$t['N_type'];
 $s = mysql_fetch_array($requete2);
 $N_sup=$s['N_supplement'];

$result=mysql_query("insert into chambre  values('','$N_type',NULL,'$etage','$N_sup')");
}
if (isset($_POST['tarif'])&& isset($_POST['extra']) && $_POST['tarif']!="0" &&!empty($_POST['tarif'])){

$tarif=$_POST['tarif'];
$extra=$_POST['extra'];
$N_extra=mysql_fetch_row(mysql_query("select N_extra from extras where Libelle='$extra'"));

$requette="insert into prestation values ('',NULL,'$tarif','$N_extra[0]')";
$result=mysql_query($requette);
}





?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

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


 

	<style type="text/css">
	
 </style>

<script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        source:'getautocomplete.php',
                        minLength:1
                    });
                });
        </script>


		<script  type='text/javascript'>
		function show1() {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("div_chambre").innerHTML=xmlhttp.responseText;// ( id dyal div fin ghat afficher dakchi li biti )
    }
  }
 
  xmlhttp.open("GET","div_chambre.php",true);
  xmlhttp.send();
} 

function SubmitForm1() {
var type = $("#type").val();
var sup = $("#sup").val();
var etage = $("#etage").val();
if ( etage !='')
$.post("Ajout_reservation.php", { type: type, sup: sup, etage: etage },
   function() {
    alert("chambre enregistrèe"  );
    	
   });
  else 
	alert("Formulaire incomplet"  );
}
function SubmitForm2() {
var nom= $("#nom").val();
var prenom = $("#prenom").val();

var categorie = $("input[name='categorie']:checked").val();
if(nom !='' && prenom !='' && categorie !='')
$.post("Ajout_reservation.php", { nom: nom, prenom: prenom, categorie: categorie },
   function(data) {
   
     alert("client secondaire enregistré"  );
   });
   	else 
	alert("Formulaire incomplet"  );
}
function SubmitForm3() {
var extra= $("#extra").val();
var tarif = $("#tarif").val();
if(tarif !='')
$.post("Ajout_reservation.php", { extra:  extra, tarif: tarif },function() {
    alert("Prestation enregistrèe"  );});
	else 
	alert("Formulaire incomplet"  );
}
function show(str) {

  if (str=="") {
    document.getElementById("cap").innerHTML=""; //(id dyal div fin ghat afficher dakchi li biti )
    
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("cap").innerHTML=xmlhttp.responseText;// ( id dyal div fin ghat afficher dakchi li biti )
    }
  }
  xmlhttp.open("GET","test.php?q="+str,true);//( code php  tma fin ghadiri GET  dyal dakchi li biti )
  xmlhttp.send();
  
}


function show2() {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("div_clientS").innerHTML=xmlhttp.responseText;// ( id dyal div fin ghat afficher dakchi li biti )
    }
  }
 
  xmlhttp.open("GET","div_clientS.php",true);
  xmlhttp.send();
} 
function show3() {

   
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("div_prest").innerHTML=xmlhttp.responseText;// ( id dyal div fin ghat afficher dakchi li biti )
    }
  }
 
  xmlhttp.open("GET","div_prest.php",true);
  xmlhttp.send();
} 

function merde1(){
SubmitForm1();
setTimeout(show1,150);
}


function merde2(){
SubmitForm2();
setTimeout(show2,150);
}
function merde3(){
SubmitForm3();
setTimeout(show3,150);
}

		
	 
</script>
<style>
	
	th { 

		background:#E6E6FA; 
		color: #003366; 
		font-weight: bold; 
		
	}
	


</style>

</head>





 <body>
   
			 
	

 <img src="logo.jpg" class="img"/>


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

<div class="cadre_principal"><center>
<div style="background-color:Lavender;width:390px;-webkit-border-top-right-radius: 1px;
     -webkit-border-bottom-left-radius: 1px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    ">
		
<h3 style="color:midnightblue">Nouvelle Réservation</h3></div></center>
<h4 class="titre1">Informations sur la Réservation:</h4>
<form method=POST action="" >
<div class="reserv">

  <table>
  <tr>
<td > <label style="margin-left:25px;" >Réservation: </label> 

 <input type="text" name="res" readonly value="<?php echo $reservation;?> "/>
 
  
  </td>
<td><label >Client : </label> 
 <input type="text" name="name" id="name" />
  <a href="#" Onclick="window.open('Client.php','wclose','width=530,height=350,scrollbars=yes') ">
  <img src="plus.png" width="16" height="13" /></a></td>
</tr>
<br >
<tr>
<td height="24"><label style="margin-left:15px";>Arrivée : </label>  
<input type="text" id="datepick2" name="arrive"  />
</td>
 

<td><label style="margin-left:5px">Départ :  </label> </label><input type="text" id="datepick3" name="dep" style="margin-left:-16px" /></td>
 </td>             
</tr>

<tr> <td id="duree">  <label > </label></td></tr>
</table>

</div >
<h4 class="titre2">Chambre :</h4>
 
        
        <div class="chambre" id="div_chambre">
		

          <table >
  <tr>
<td ><label style="margin-left:33px;" >Type_chambre: </label>
<br > 
<select size=1  name="type"  id="type" onChange="show(this.value);"/>
<?php
mysql_connect("localhost","root","")or die(mysql_error());
 mysql_select_db("hotelerie")or die(mysql_error()); 
$ligne=mysql_query("select type from type_chambre");
 while ($lib= mysql_fetch_array($ligne) ) { ?>
	<option value="<?php echo $lib['type']; ?>" ><?php echo $lib['type']; } ?></option>
	</select>
  

</td>

<td><label style="margin-left:25px" >Supplément : </label>
<a href="#" Onclick="window.open('Sup.php','wclose','width=510,height=180,scrollbars=yes') ">
<img src="plus.png" width="16" height="13" class="icone" /></a>
  <select  size=1 name="sup" id="sup"/>
<?php
mysql_connect("localhost","root","")or die(mysql_error());
 mysql_select_db("hotelerie")or die(mysql_error()); 
$ligne=mysql_query("select Libelle from supplement");
 while ($lib= mysql_fetch_array($ligne) ) { ?>
	<option ><?php echo $lib['Libelle']; } ?></option>
	</select>
  
  
  </td>
   
</tr>
<br >

<tr>
<td>
<label style="margin-left:15px";>Capacité : 
</label> 
<span id="cap">
 <input type="text" value="1"/>
 </span>
</td>
<td>
<label style="margin-left:8px";>Etage :</label>
 <input name="etage" type=text id="etage"/>
</td>
    <tr><td></td><td></td><td>
	<input value="+" type=button onClick="merde1();" /> </td></tr>
     </table>  
		 
	 
	 <?php


$requete="SELECT N_chambre,Type,N_etage,Libelle from chambre C,type_chambre T,supplement S where C.N_supplement=s.N_supplement and C.N_type=T.N_type and C.N_reservation is NULL order by N_chambre";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){

echo "<center> <h4> Liste des chambres </h4> <table border=2 width=80% style=\"color:midnightblue\" >
<th>Type_chambre</th>
<th>Etage </th>
<th>Supplement</th>

	<th colspan=2>Action</th>";


 $i=1;

	while ($ligne = mysql_fetch_array($result)) { 
	$id=$ligne['N_chambre'];
			if($i%2==0){
		 echo "<tr bgcolor = \"#C1EBFF\">
		    
			<td>".$ligne['Type']." </td>
			<td>".$ligne['N_etage']." </td>
			<td>". $ligne['Libelle']."</td>
			
			
	
		   
		   <td width=80>";
           echo "<a href=\"modif_chambre.php?id=$id\">";
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"<td width=80>";
			 echo '<a href="supp_chambre.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    }
			else { 
			echo "<tr>
		    
			<td>".$ligne['Type']." </td>
			<td>".$ligne['N_etage']." </td>
			<td>". $ligne['Libelle']."</td>
			
			
	
		   
		   <td width=80>";
           echo "<a href=\"modif_chambre.php?id=$id\">";
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"  <td width=80>";
			 echo '<a href="supp_chambre.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    }$i++;
		
			} 		 
echo "</table></center><br> ";         
}

		?>

  </div>
 




  <h4 class="titre3">Naming list  :</h4>
                
<div class="naming-list" id="div_clientS">
          <table>
  <tr>
<td > <label style="margin-left:25px;" >Nom: </label> <input type="text" name="nom" id="nom" /></td>
<td><label >Prénom: </label> <input type="text" name="prenom" id="prenom" />
 
</tr>
<br >

<tr><td><label style="margin-left:40px;color: #69F;"> Catégorie client : </Label></td></tr>
<tr>

<td><label style="margin-left:115px">Adulte<input type=radio  name="categorie" value="adulte" id="categorie1" /></td>
<td><label>Enfant(-12ans)<input type=radio  name="categorie" value="enfant" id="categorie2"/></td>

   </tr>          
  <tr><td></td><td></td><td>
<input type=button  value="+" onClick="merde2();"> </td></tr>
</table>




    <?php 

$requete="SELECT * from client_secondaire where N_reservation is NULL  order by 1";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){
echo "<center> <h4> Liste des clients secondaires</h4><table border=2 width=80% style=\"color:midnightblue\" >

<th> Nom </th>
<th>Prenom</th>
<th>categorie</th>;

	<th colspan=2>Action</th>";
	$i=1;
	while ($ligne = mysql_fetch_array($result)) { 
	$id=$ligne['N_Client_S'];
	if($i%2==0){
		 echo "<tr bgcolor = \"#C1EBFF\">
		 <td>".$ligne['Nom']."</td>
			<td> ".  $ligne['Prenom']."</td>
			<td>".  $ligne['Categorie']." </td>
	
		 
		   <td width=80>";

			 echo "<a href=\"modifier_client_S.php?id=$id\">";
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"<td width=80>";
			 echo '<a href="supprimer_client_S.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';}
		else {
          echo "<tr>
		 <td>".$ligne['Nom']."</td>
			<td> ".  $ligne['Prenom']."</td>
			<td>".  $ligne['Categorie']." </td>
	
		 
		   <td width=80>";

			 echo "<a href=\"modifier_client_S.php?id=$id\">";
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"<td>";
			 echo '<a href="supprimer_client_S.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
	
		
			} 	$i++;	
}			
echo "</table> </center><br>";         
}

		?>
		 

</div>




  <h4 class="titre4"> Prestation:</h4>
                        
        <div class="extras" id="div_prest">
          <table>
  <tr>
  <td>
  <p>
    <label style="margin-left:45px">Extra :</label>
    <select size=1 name="extra" id="extra"  />
    
</p>
<?php

$ligne=mysql_query("select * from extras");
 while ($lib= mysql_fetch_row($ligne) ) { ?>
	<option value="<?php echo $lib[1];  ?>" ><?php echo $lib[1];  ?></option> <?php } ?>
	</select>
  
  </td>
  <td><p>
    <label style="margin-left:-5px";>Tarif </label>  
      <input type="text" name="tarif" id="tarif"/>
    </p></td>
</tr>           
   </tr>          
  <tr><td></td><td></td><td>
<input type=button  value="+" onClick="merde3();"> </td></tr>
</table>
<?php 

$requete="SELECT * from prestation where N_reservation is NULL  order by 1";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){
echo "<center> <h4> Liste des prestations</h4><table border=2 width=80% style=\"color:midnightblue\" >

<th> Extra </th>
<th>Tarif</th>
<th colspan=2>Action</th>"
;

	$i=1;
	while ($ligne = mysql_fetch_row($result)) { 
	$id=$ligne[0];
		$requete2="select Libelle from extras where N_extra='".$ligne[3]."'";
$extra=mysql_fetch_row(mysql_query($requete2));
	if($i%2==0){
	
		echo '<tr bgcolor = "#C1EBFF">
		    
			<td>  '.$extra[0].' </td>
			<td>'. $ligne[2].'</td>
		
		   <td width=80>

			<a href="modifier_prest.php?id='.$id.'">
			<img src="images/user_edit.png"/> modifier</a></td>
			 <td width=80>
			 <a href="supprimer_prest.php?id='.$id.'"><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    
		
		}
		else{
		echo'<tr>
		<td>  '.$extra[0].' </td>
			<td>'. $ligne[2].'</td>
	<td width=80>

			<a href="modifier_prest.php?id='.$id.'">
			<img src="images/user_edit.png"/> modifier</a></td>
			<td width=80>
			 <a href="supprimer_prest.php?id='.$id.'"><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		
		}
		$i++;
			}
			
		
echo "</table> </center><br>";         
}

		?>

</div>
<input type=submit name=valider value=Valider class="valider" /> &nbsp;&nbsp;<input type=submit name=annuler value=Annuler class="valider" />
<div></div>
</center>
</form>

 </div>

       
<script type="text/javascript" src="datepickr.min.js"></script>
        		
			
<script type="text/javascript">
			new datepickr('datepick2', {
				'dateFormat': 'm/d/y'
			});
			
			
			new datepickr('datepick3', {
				'dateFormat': 'm/d/y'
			});
			new datepickr('datepick4', {
				dateFormat: '\\l\\e jS F Y', /* need to double escape characters that you don't want formatted */
				weekdays: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
				months: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
				suffix: { 1: 'er' },
				defaultSuffix: '' /* the suffix that is used if nothing matches the suffix object, default 'th' */
			});
		</script>

</body>
</html>
