<?php	

include("connexion.php");

     echo  '<table  >
  <tr>
<td ><label style="margin-left:33px;" >Type_chambre: </label>
<br /> 
<select size=1  name="type"  id="type" onChange="show(this.value);" />';


$ligne=mysql_query("select type from type_chambre");
 while ($lib= mysql_fetch_array($ligne) ) {
	echo '<option value="'.$lib['type'].'" >'.$lib['type']; }
	echo" </option>
	</select>
  

</td>

<td><label style=\"margin-left:25px\" >Supplément : </label>
<a href=\"#\" Onclick=\"window.open('Sup.php','wclose','width=510,height=180,scrollbars=yes') \">
<img src=\"plus.png\" width=\"16\" height=\"13\" class=\"icone\" /></a>
  <select  size=1 name=\"sup\" id=\"sup\"/>";

$ligne=mysql_query("select Libelle from supplement");
 while ($lib= mysql_fetch_array($ligne) ) { 
	echo '<option > '. $lib['Libelle'];  } 
	echo "</option>
	</select>
  
  
  </td>
   
</tr>
<br >

<tr>
<td>
<label style=\"margin-left:15px\";>Capacité : 
</label> 
<span id=\"cap\">
 <input type=\"text\" value=\"1\"/>
 </span>
</td>
<td>
<label style=\"margin-left:8px\";>Etage :</label>
 <input name=\"etage\" type=text id=\"etage\"/>
</td>
    <tr><td></td><td></td><td>
	<input name=ajouter_chambre value=\"+\" type=button onClick=\"merde1();\" /> </td></tr>
     </table> ";

if(isset($_GET["id"])){
$requete="SELECT N_chambre,Type,N_etage,Libelle from chambre C,type_chambre T,supplement S where C.N_supplement=s.N_supplement and C.N_type=T.N_type and C.N_reservation='".$_GET["id"]."' order by 1 ";

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
           echo '<a href="modif_chambre.php?id='.$id.'&reserv='.$_GET['id'].'">';
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"<td width=80>";
			 echo '<a href="supp_chambre.php?id='.$id.'&reserv='.$_GET['id'].'">  <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    }
			else { 
			echo "<tr>
		    
			<td>".$ligne['Type']." </td>
			<td>".$ligne['N_etage']." </td>
			<td>". $ligne['Libelle']."</td>
			
			
	
		   
		   <td width=80>";
            echo '<a href="modif_chambre.php?id='.$id.'&reserv='.$_GET['id'].'">';
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			echo"<td width=80>";
			 echo '<a href="supp_chambre.php?id='.$id.'&reserv='.$_GET['id'].'">  <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    }$i++;
		
			} 		 
echo "</table> <br></center>";         
}}
else {
$requete="SELECT N_chambre,Type,N_etage,Libelle from chambre C,type_chambre T,supplement S where C.N_supplement=s.N_supplement and C.N_type=T.N_type and C.N_reservation is NULL order by 1 ";
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
			echo"<td width=80>";
			 echo '<a href="supp_chambre.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    }$i++;
		
			} 		 
echo "</table><br></center> ";         
}}

		?>

