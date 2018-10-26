 <html>
 <head>
 <link rel="stylesheet" href="tableaux/style.css">
 </head>
 <body>
<?php
                    try
            {
                /* La connexion se place ailleurs, dans un fichier commun à toutes les pages
                 * $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                 * $bdd = new PDO('mysql:host=...;dbname=...', '...', '...', $pdo_options);
                 */
				  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8"
  );
               // $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				
                $bdd = new PDO('mysql:host=localhost;dbname=hotelerie', 'root', '', $options);
                /*$req = $bdd->query('select * from reservation');
				if(!empty($_GET['de']) && $_GET['a']!=null && $_GET['client']!=null){
                $req->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
                $req->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
                $req->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
				 $req->execute();
                 
                
				}*/
				}
                 
                catch(Exception $e)
                 
            {
                die('Erreur : '.$e->getMessage());
            }
			mysql_query("SET NAMES UTF8");
echo '<center>';
echo '<table>';
echo '<thead><tr><th>Reservation</th>';
echo '<th>Client</th>';
echo '<th>Date d&eacute;but</th>';
echo '<th>Date Fin</th>';
echo '<th>Statut</th></tr></thead>';
echo '<tbody>';
if(!empty($_GET['de'])&&!empty($_GET['a'])&&!empty($_GET['client'])){
$req0=$bdd->query("SELECT N_reservation, Nom ,Prenom ,Date_arrive, Date_depart, S.statut FROM reservation R ,client_principal C ,statut S where R.Client_P='".$_GET['client']."' and S.N_statut = R.statut AND C.Num_client_p = R.Client_P and (Date_arrive between '".$_GET['de']."' AND '".$_GET['a']."' )and (Date_depart between '".$_GET['de']."' and'".$_GET['a']."') ORDER BY 1");
$req0->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req0->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req0->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req0->execute();

while ($L3=$req0->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr>";
echo "<td>",$L3->N_reservation,"</td>";
echo "<td>",$L3->Nom," ",$L3->Prenom,"</td>";
echo "<td>",$L3->Date_arrive,"</td>";
echo "<td>",$L3->Date_depart,"</td>";
echo "<td>",$L3->statut,"</td></tr>";
}
 }

 if(empty($_GET['de'])&&empty($_GET['a'])&&empty($_GET['client'])){
 $req2=$bdd->query("Select N_reservation, Nom , Prenom, Date_arrive, Date_depart, S.statut from  reservation R,".
" client_principal C, statut S WHERE S.N_statut=R.statut and C.Num_client_p=R.Client_p order by N_reservation");
$req2->execute();
while ($L2=$req2->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr>";
echo "<td>",$L2->N_reservation,"</td>";
echo "<td>",$L2->Nom," ",$L2->Prenom,"</td>";
echo "<td>",$L2->Date_arrive,"</td>";
echo "<td>",$L2->Date_depart,"</td>";
echo "<td>",$L2->statut,"</td></tr>";
}
 }
 if(empty($_GET['de'])&&empty($_GET['a'])&&!empty($_GET['client'])){
 $req1=$bdd->query("SELECT N_reservation, Nom, Prenom, Date_arrive, Date_depart, S.statut FROM  reservation R, client_principal C  ,  statut S WHERE R.Client_P ='".$_GET['client']."' AND S.N_statut = R.statut AND C.Num_client_p = R.Client_p ORDER BY 1");
$req1->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req1->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req1->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req1->execute();
while ($L4=$req1->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr >";
echo "<td>",$L4->N_reservation,"</td>";
echo "<td>",$L4->Nom," ",$L4->Prenom,"</td>";
echo "<td>",$L4->Date_arrive,"</td>";
echo "<td>",$L4->Date_depart,"</td>";
echo "<td>",$L4->statut,"</td></tr>";
}
 }
 if(!empty($_GET['de'])&&!empty($_GET['a'])&&empty($_GET['client'])){
 $req3=$bdd->query("SELECT N_reservation, Nom, Prenom, Date_arrive, Date_depart, S.statut FROM  reservation R,  client_principal C, statut S WHERE C.Num_client_p = R.Client_p and S.N_statut = R.statut AND (Date_arrive between '".$_GET['de']."' AND '".$_GET['a']."' )and (Date_depart between '".$_GET['de']."' and'".$_GET['a']."') ORDER BY 1");
$req3->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req3->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req3->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req3->execute();
while ($L5=$req3->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr bgcolor=white>";
echo "<td>",$L5->N_reservation,"</td>";
echo "<td>",$L5->Nom," ",$L5->Prenom,"</td>";
echo "<td>",$L5->Date_arrive,"</td>";
echo "<td>",$L5->Date_depart,"</td>";
echo "<td>",$L5->statut,"</td></tr>";
}
 }

 echo'<tfoot></tfoot>';
 echo "</table>";
echo '</center>'
	

	
	
	
        ?>
			 
	</body>
  </html>		 
		