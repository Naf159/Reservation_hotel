<html>
<head>
<style>
</style>
<script type="text/javascript" src="media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="media/js/jquery.js"></script>
<link href="media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">	
<link rel="stylesheet" href="tableaux/style.css">

</head>
<body>
<div id="dvData">
<table width="100%" class="display" id="example" cellspacing="0">

<?php
try
            {
               
				  $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND    => "SET NAMES utf8"
  );
                $bdd = new PDO('mysql:host=localhost;dbname=hotelerie', 'root', '', $options);
				}
                 
                catch(Exception $e)
                 
            {
                die('Erreur : '.$e->getMessage());
            }
			mysql_query("SET NAMES UTF8");
echo '<thead><tr><th>Reservation</th>';
echo '<th>Client</th>';
echo '<th>Date D&eacute;but</th>';
echo '<th >Date Fin</th>';
echo '<th>Statut</th></tr></thead>';

if(isset($_GET["statut"])){
echo '<tbody>';
if(isset($_GET["statut"])&&!empty($_GET['de'])&&!empty($_GET['a'])&&!empty($_GET['client'])){
		
echo "<script type=\"text/javascript\">alert(La valeur de statut est:".$_GET['statut'].")</script>";
$req6=$bdd->query("SELECT N_reservation, Nom, Prenom, Date_arrive, Date_depart, S.statut FROM  reservation R,  client_principal C, statut S WHERE 
C.Num_client_p = R.Client_p and S.N_statut = R.statut and R.Client_p='".$_GET['client']."' AND R.statut='".$_GET['statut']."' and (Date_arrive
 between '".$_GET['de']."' AND '".$_GET['a']."' ) and (Date_depart between '".$_GET['de']."' AND '".$_GET['a']."' ) ORDER BY 1");

$req6->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req6->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req6->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req6->execute();
while ($L6=$req6->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr >";
echo "<td>",$L6->N_reservation,"</td>";
echo "<td>",$L6->Nom," ",$L6->Prenom,"</td>";
echo "<td>",$L6->Date_arrive,"</td>";
echo "<td>",$L6->Date_depart,"</td>";
echo "<td>",$L6->statut,"</td></tr>";
}
 }
 if(isset($_GET["statut"])&&empty($_GET['de'])&&empty($_GET['a'])&&empty($_GET['client'])){

$req7=$bdd->query("Select N_reservation, Nom , Prenom, Date_arrive, Date_depart, S.statut from  reservation R, client_principal C, statut S WHERE R.statut='".$_GET['statut']."' and S.N_statut=R.statut and C.Num_client_p=R.Client_p order by N_reservation");

$req7->execute();
while ($L7=$req7->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr >";
echo "<td>",$L7->N_reservation,"</td>";
echo "<td>",$L7->Nom," ",$L7->Prenom,"</td>";
echo "<td>",$L7->Date_arrive,"</td>";
echo "<td>",$L7->Date_depart,"</td>";
echo "<td>",$L7->statut,"</td></tr>";
}
 }
 if(isset($_GET["statut"])&&empty($_GET['de'])&&empty($_GET['a'])&&!empty($_GET['client'])){
 $req8=$bdd->query("SELECT N_reservation, Nom, Prenom, Date_arrive, Date_depart, S.statut FROM  reservation R,  client_principal C,  statut S  WHERE Client_P ='".$_GET['client']."'AND R.statut='".$_GET["statut"]."' AND S.N_statut = R.statut AND C.Num_client_p = R.Client_p ORDER BY N_reservation");
$req8->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req8->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req8->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req8->execute();
while ($L8=$req8->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr>";
echo "<td>",$L8->N_reservation,"</td>";
echo "<td>",$L8->Nom," ",$L8->Prenom,"</td>";
echo "<td>",$L8->Date_arrive,"</td>";
echo "<td>",$L8->Date_depart,"</td>";
echo "<td>",$L8->statut,"</td></tr>";
}
 }
 
 
 if(isset($_GET["statut"])&&!empty($_GET['de'])&&!empty($_GET['a'])&&empty($_GET['client'])){
 $req9=$bdd->query("SELECT N_reservation, Nom, Prenom, Date_arrive, Date_depart, S.statut FROM  reservation R,  client_principal C, statut S WHERE C.Num_client_p = R.Client_p and S.N_statut = R.statut and R.statut='".$_GET["statut"]."' AND (Date_arrive between '".$_GET['de']."' AND '".$_GET['a']."' )and
 (Date_depart between '".$_GET['de']."' and '".$_GET['a']."') ORDER BY 1");
 $req9->bindValue(':de', $_GET['de'], PDO::PARAM_STR);
$req9->bindValue(':a', $_GET['a'], PDO::PARAM_STR);
$req9->bindValue(':client', $_GET['client'], PDO::PARAM_STR);
$req9->execute();
while ($L9=$req9->fetch(PDO::FETCH_OBJ) ) 
{ 
echo "<tr>";
echo "<td>",$L9->N_reservation,"</td>";
echo "<td>",$L9->Nom," ",$L9->Prenom,"</td>";
echo "<td>",$L9->Date_arrive,"</td>";
echo "<td>",$L9->Date_depart,"</td>";
echo "<td>",$L9->statut,"</td></tr>";
}
 }
 }
 
  echo "</table>";
  
 
  ?>
  </div>

  </body>
  </html>