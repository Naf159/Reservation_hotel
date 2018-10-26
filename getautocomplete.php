<?php
include("connexion.php");
  $term=$_GET["term"];
  $query=mysql_query("SELECT * FROM client_principal where Nom like '%".$term."%' order by Nom ");
 $json=array();
 while($client=mysql_fetch_array($query)){
         $json[]=array(
                    'value'=>$client["Nom"]." ".$client["Prenom"],
                    'label'=>$client["Nom"]." ".$client["Prenom"]
                        );
    }
 
 echo json_encode($json);
 
?>