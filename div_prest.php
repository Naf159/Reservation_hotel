    <?php 
include("connexion.php");
	echo' <table>
  <tr>
  <td>
  <p>
    <label style="margin-left:45px">Extra :</label>
    <select size=1 name="extra" id="extra"  />
    
</p>';


$ligne=mysql_query("select * from extras");
 while ($lib= mysql_fetch_row($ligne) ) { 
	 echo '<option value="'.$lib[1].'">'. $lib[1].'</option> '; } 
	echo '</select>
  
  </td>
  <td><p>
    <label style="margin-left:-5px";>Tarif </label>  
      <input type="text" name="tarif" id="tarif"/>
    </p></td>
</tr>           
   </tr>          
  <tr><td></td><td></td><td>
<input type=button  value="+" onClick="merde3();"> </td></tr>
</table>';
if( isset($_GET["id"])){
$requete="SELECT * from prestation where N_reservation='".$_GET["id"]."' order by 1";
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

		<a href="modifier_prest.php?id='.$id.'&reserv='.$_GET["id"].'">
			<img src="images/user_edit.png"/> modifier</a></td >
			<td width=80>
			 <a href="supprimer_prest.php?id='.$id.'&reserv='.$_GET["id"].'"><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		    
		
		}
		else{
		echo'<tr>
		<td>  '.$extra[0].' </td>
			<td>'. $ligne[2].'</td>
	<td width=80>

			<a href="modifier_prest.php?id='.$id.'&reserv='.$_GET["id"].'">
			<img src="images/user_edit.png"/> modifier</a></td>
			<td width=80>
			 <a href="supprimer_prest.php?id='.$id.'&reserv='.$_GET["id"].'"><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		
		}
		$i++;
			}
			echo "</table><br> </center>";  }}
else {
$requete="SELECT * from prestation where N_reservation is NULL order by 1";
$result=mysql_query($requete);
$num_rows = mysql_num_rows($result);
if ($num_rows>0){
echo "<center> <h4> Liste des prestations </h4><table border=2 width=80% style=\"color:midnightblue\" >

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
			<img src="images/user_edit.png"/> modifier</a></td >
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
			<img src="images/user_edit.png"/> modifier</a></td >
			<td width=80>
			 <a href="supprimer_prest.php?id='.$id.'"><img src="images/trash.png"/> supprimer</a>
			</td>
		</tr>';
		
		}
		$i++;
			}
			
		
echo "</table><br> </center>";         
}}

		?>