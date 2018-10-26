
<?php 

$r=$_GET['q'];


if(isset($r)){

?>
  
	
<html>
<body>

<center>
<table border=2  >
<th>Date d'arrivé</th>
<th>Date de départ</th>
<th>Montant</th>


<?php 
mysql_connect("localhost","root","") or die( mysql_error () );
mysql_select_db("hotelerie") or die( mysql_error () );


$requete="Select * from reservation  where N_reservation='$r' and statut in (select N_statut from statut where statut='confirmée')";
$result=mysql_query($requete);
$i=1;
	while ($ligne = mysql_fetch_array($result)) { 
	
	 if($i%2==0)
	 {?>
		<tr bgcolor = "#C1EBFF">
		    
			<td><?php echo $ligne['Date_arrive']; ?></td>
			<td><?php echo $ligne['Date_depart'];?></td>
			<td><?php echo $ligne['montant']."DH"; ?></td>
		   
	<?php

	}
	
else	{	?>    
		 <tr >
		    <td><?php echo $ligne['Date_arrive']; ?></td>
			<td><?php echo $ligne['Date_depart'];?></td>
			<td><?php echo $ligne['montant']."DH"; ?></td>
		   
		</tr>
		
		<?php
		}
$i++;
		
	}


	
	
	
}


?>


	</html>