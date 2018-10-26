
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Facturation</title>


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
	td, th { 
	 
		border: 1px solid #ccc; 
		text-align: center;
		height:39px;
width:120px;
	
	}
 
 </style>
<script type='text/javascript'>
 function show(str) {
  if (str=="") {
    document.getElementById("res").innerHTML="";
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
      document.getElementById("res").innerHTML=xmlhttp.responseText;
    }
  }

  xmlhttp.open("GET","select2.php?q="+str,true);
 
  xmlhttp.send();	
  
} 
</script>


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
</div>


<div class="cadre_principal">

<div style="border:1px;background-color:Lavender;width:860px;height:40px;">
<h4 style="margin-left:-550px;padding-top:6px;text-decoration:none;color:navy">Consultation des Factures</h4>
</div>
<form id=form1 name=form1 method=POST action="" >


		 
	<a href="Facture.php"><img src=images/prev.png width=3.5% style="position:relative;left:-380px;top:-36px;"></a>

		 
	 
	
<?php
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );
$requete="SELECT *FROM facture,reservation,client_Principal
WHERE reservation.N_facture=facture.N_facture and reservation.Client_P = client_principal.Num_client_p";
$result=mysql_query($requete);?>

<center>
<table border=1 >
<th>Date</th>
<th>Client</th>
<th>Montant total</th>
<th colspan=4>Action</th>
<?php
$i=1;
	while ($ligne = mysql_fetch_array($result)) { 
	$id=$ligne['N_facture'];
	
	 if($i%2==0)
	 {?>
		<tr bgcolor = "#C1EBFF" border=1px>
		    
			<td><?php echo $ligne['Date_f']; ?></td>
		
			<td><?php 
			if ($ligne['Nom']!="" &&$ligne['Prenom']!="")
			echo $ligne['Nom']." ".$ligne['Prenom'];
else{

echo $ligne['raison_social'];

}

			?></td>
			
			<td><?php echo $ligne['Montant_total']."DH"; ?></td>
			
		   <td >
			<?php echo '<a href="modifier_facture.php?id='.$id.'">'; ?>
			<img src="images/user_edit.png"/> modifier</a></td>
			<td ><?php echo '<a href="supprimer_facture.php?id='.$id.'">'; ?><img src="images/trash.png"/> supprimer</a>
			</td>
			<td >
			<?php echo '<a href="ex.php?id='.$id.'">'; ?>
			<img src="images/impr.gif"/> Imprimer</a></td>
			
		</tr>
	<?php

	}
	
else	{	?>    
		 <tr >
		    
			<td><?php echo $ligne['Date_f']; ?></td>
			<td><?php 
			if ($ligne['Nom']!="" &&$ligne['Prenom']!="")
			echo $ligne['Nom']." ".$ligne['Prenom'];
else{

echo $ligne['raison_social'];

}

			?></td>
				
				
			<td><?php echo $ligne['Montant_total']."DH"; ?></td>
			
		   <td width=80>

		   <?php echo '<a href="modifier_facture.php?id='.$id.'">'; ?>
		   <img src="images/user_edit.png"/> modifier</a></td>
		<td width=80><?php echo '<a href="supprimer_facture.php?id='.$id.'">'; ?><img src="images/trash.png"/> supprimer</a>
			</td>
			<td >
			<?php echo '<a href="ex.php?id='.$id.'">'; ?>
			<img src="images/impr.gif"/>Imprimer</a></td>
			
		</tr>
		
		
		<?php
		}
$i++;
		
	}



		?>
</table>
      <br>
	 
	<input name=ajouter_facture value="Nouvelle facture" type=submit class=input /> 
<?php 
$sys=date("d-m-Y");
if(isset($_POST["ajouter_facture"])){

echo"<br>";
echo"<br>";
echo"<table>";

echo"<tr>";
echo"</tr>";

echo"<fieldset style=\"width:700px;border-color:steelblue; \">";
echo"<legend style=\"color:gray;\" > Nouvelle Facture</legend>";
echo"<br>";
echo "<Label style=\"position:relative;left:-30px;\">Client :</Label>";

echo "<Label style=\"position:relative;left:120px;\">Date de la facture :</Label>";
echo"<input type=text name=date_f value= ";
echo $sys;

echo" style=\"position:relative;left:110px;\" />";


 echo"<select name=client id='client' Onchange='show(this.value)'; style=\"width:180px;position:relative;left:-370px;\">";

echo"<option>";

echo"</option>";
 $sql=mysql_query("select * from Client_principal order by 1");
 
 while ($li= mysql_fetch_array($sql) ) {

echo"<option>";
if ($li['Nom']!=""&& $li['Prenom']!="")
echo $li['Num_client_p']."-".$li['Nom']." ". $li['Prenom']; 
 else{
 echo  $li['Num_client_p']."-".$li['raison_social']; 

 }
 } 
 echo "</option>";
echo"</select>";

echo"</select>";

echo "<input type=submit value=valider name=valider_ajout class=input style=\"position:relative;left:2px;top:-14px;\" />";
echo "<input type=submit value=annuler name=annuler class=input style=\"position:relative;left:322px;top:-3px;\" />";




echo"</form>";
echo"<br>";
echo"<br>";



echo "<div id='res' >";
  

                 
echo"<br>";
	   echo "<div >";
	  
	   
echo"</table>";
echo"</fieldset>";
$sys= date("d-m-Y");



	   
}	   
	
if (isset( $_POST['valider_ajout'])){

$ch= $_POST['ch'];
$count = count($ch);
 $total=0;
 $client=$_POST['client'];
 
$clien=intval(substr($client,0,1));
 	
	$date_f=date("Y-m-d", strtotime($sys));
	mysql_query("insert into facture values('','$date_f','','0','')");
	
    for($i = 0; $i < $count; $i++) {
        $id = (int) $ch[$i]; 

        if ($id > 0) {
		
			$m=mysql_query("select MAX(N_facture) as N_facture from facture");
			 while ($max=mysql_fetch_array($m)){
	
		$N_facture=$max['N_facture'];
		  }
		mysql_query("update reservation set N_facture='$N_facture' ,statut=(select N_statut from statut where statut like'factur%e')where N_reservation='$id'");
          $s=mysql_query("select montant from reservation where N_reservation='$id'");
		 
		  while ($montant=mysql_fetch_array($s)){
		  $total=$total+$montant['montant'];
		
		  }
		 
      }
    }

	mysql_query("update facture set Montant_total='$total',total_impaye='$total' where N_facture='$N_facture'");
	echo"<script> alert('Facture Enregistrée');</script>";
echo '<meta http-equiv="refresh" content="0">';

	
}

	   ?>
	   
	   
 <?php
	   


	   
	   ?> 
	   
		<div>   
	   


</body>
</html>
