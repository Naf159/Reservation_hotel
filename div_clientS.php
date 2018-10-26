  <?php 
  include("connexion.php");
 echo '<table>
  <tr>
<td > <label style="margin-left:25px;" >Nom: </label> <input type="text" name="nom" id="nom" /></td>
<td><label >Prénom: </label> <input type="text" name="prenom" id="prenom" />
 
</tr>
<br >

<tr><td><label style="margin-left:40px;color: #69F;"> Catégorie client : </Label></td></tr>
<tr>

<td><label style="margin-left:115px">Adulte<input type=radio  name="categorie" value="adulte" id="categorie" /></td>
<td><label>Enfant(-12ans)<input type=radio  name="categorie" value="enfant" id="categorie"/></td>

   </tr>          
  <tr><td></td><td></td><td>
<input type=button  value="+" onClick="merde2();"> </td></tr>
</table>
';

if (isset($_GET["id"])){
$requete="SELECT * from client_secondaire where N_reservation='".$_GET["id"]."' order by 1";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){
echo "<center> <h4> Liste des clients secondaires</h4><table border=2 width=80% style=\"color:midnightblue\">

<th class=th> Nom </th>
<th class=th>Prenom</th>
<th class=th>categorie</th>
<th class=th colspan=2>Action</th>";

	
	$i=1;
	while ($ligne = mysql_fetch_array($result)) { 
	$id=$ligne['N_Client_S'];
	if($i%2==0){
		 echo "<tr bgcolor = \"#C1EBFF\">
		 <td>".$ligne['Nom']."</td>
			<td> ".  $ligne['Prenom']."</td>
			<td>".  $ligne['Categorie']." </td>
	
		 
		   <td width=80>";

			 echo '<a href="modifier_client_S.php?id='.$id.'&reserv='.$_GET["id"].'">';
			echo "<img src=\"images/user_edit.png\"/> modifier</a> </td>";
			 echo"<td width=80>";
			 echo '<a href="supprimer_client_S.php?id='.$id.'&reserv='.$_GET["id"].'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';}
		else {
          echo "<tr>
		 <td>".$ligne['Nom']."</td>
			<td> ".  $ligne['Prenom']."</td>
			<td>".  $ligne['Categorie']." </td>
	
		 
		   <td width=80>";

			 echo '<a href="modifier_client_S.php?id='.$id.'&reserv='.$_GET["id"].'">';
			echo "<img src=\"images/user_edit.png\"/> modifier</a></td>";
			 echo"<td width=80>";
			 echo '<a href="supprimer_client_S.php?id='.$id.'&reserv='.$_GET["id"].'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
	
		
			} 	$i++;	
}			
echo "</table><br></center>";         
}}
else{
$requete="SELECT * from client_secondaire where N_reservation is NULL  order by 1";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){
echo "<center> <h4> Liste des clients secondaires</h4><table border=2 width=80% style=\"color:midnightblue\" >

<th class=th> Nom </th>
<th class=th>Prenom</th>
<th class=th>categorie</th>
<th class=th colspan=2>Action</th>"
;

	
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
					echo"   <td width=80>";
			 echo '<a href="supprimer_client_S.php?id='.$id.'"> <img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
	
		
			} 	$i++;	
}			
echo "</table><br> </center>";         
}
}
		?>