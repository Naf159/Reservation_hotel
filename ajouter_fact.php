<?php 
echo "<table class=\"aligner\">";
echo "<tr><td><Label> Montant Total</Label>";
echo"<input type=text name=mnt_t /></td>";
echo "<td><Label>Date de la facture</Label>";
echo"<input type=text name=date_f /></td></tr>";
echo "<tr><td><Label>Client</Label>";

 echo"<select name=client >";

 $sql=mysql_query("select * from Client_principal order by Nom");
 
 while ($li= mysql_fetch_array($sql) ) {

echo"<option>";
echo $li['Num_client_p']."-".$li['Nom']." ". $li['Prenom']; } 
 
 echo "</option>";
echo"</select></td>";












$client=$_POST['client'];
?> 