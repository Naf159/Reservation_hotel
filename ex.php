<?php
require('invoice.php');
mysql_connect('localhost','root','');
mysql_select_db('hotelerie');
$N_facture=$_GET['id'];


//Contrat
$query1=mysql_query("select * from facture where N_facture='$N_facture'");
$row=mysql_fetch_assoc($query1)or die(mysql_error());
$N_facture=$row['N_facture'];
$Date_f=$row['Date_f'];
$Montant_total=$row['Montant_total'];

$info_facture="Facture Numero : ".$N_facture."\n \n \n \n Date: ".$Date_f;


//Reservation
$query2=mysql_query("select * from reservation where N_facture='$N_facture'");
$row=mysql_fetch_assoc($query2);

$client=$row['Client_P'];

//client
$query3=mysql_query("select * from client_principal where Num_client_p='$client'");
$row=mysql_fetch_assoc($query3);
$N_client=$row['Num_client_p'];
$Nom=$row['Nom'];
if($Nom!=""){
$info_client=$row['Nom']." ".$row['Prenom']."\n".$row['adresse']."\n".$row['ville']."\n".$row['tel']."\n".$row['email'];
}
else{
$info_client=$row['raison_social']."\n".$row['adresse']."\n".$row['ville']."\n".$row['tel']."\n".$row['email'];

}

$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->Open();

$pdf->AddPage();
$pdf->addSociete( "Hot�l Le Bristol",
                  " Hay DAKHLA \n" .
                  "80000 AGADIR\n".
                  "TEL :(+212)0655987315\n");
$pdf->fact_dev("Facture Num�ro : ".$N_facture);
$pdf->addDate( $Date_f);
$pdf->addClient("Num�ro : ".$N_client);
$pdf->addPageNumber("1");
$pdf->addClientAdresse($info_client);


$pdf->addEcheance($Date_f);

$cols=array( "Num�ro_R�servation"    => 35,
             "Date de d�part"  => 28,
             "Date d'arriv�e"     => 28,
             "Nombre de chambres" => 59,
             "MONTANT TTC" => 48
			  
            
            );
$pdf->addCols( $cols);
$cols=array( "Num�ro_R�servation"    => "C",
             "Date d'arriv�e"  => "C",
             "Date de d�part"     => "C",
              "Nombre de chambres" => "L",
             "MONTANT TTC" => "C"
			 
			 
			 );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$i=0;
$type="";
$query2=mysql_query("select * from reservation where N_facture='$N_facture'");
while($row=mysql_fetch_assoc($query2)){
$N_reservation=$row['N_reservation'];
$sql=mysql_fetch_row(mysql_query("select count(*)from chambre where N_reservation='$N_reservation'"));
$s=$sql[0];
$request=mysql_query("select Type from chambre,type_chambre where chambre.N_type=type_chambre.N_type and N_reservation='$N_reservation'");
for($i=0;$i<$s;$i++){
$rows=mysql_fetch_assoc($request);
$type=$type."".$rows['Type'].",";
}


$Date_arrive=$row['Date_arrive'];
$Date_depart=$row['Date_depart'];
$montant=$row['montant'];
$client=$row['Client_P'];



$line = array( "Num�ro_R�servation"    => $N_reservation,
               "Date d'arriv�e"  => $Date_arrive,
               "Date de d�part"     => $Date_depart,
			   "Nombre de chambres"=>$s." Chambres "."(".$type.")",
               "MONTANT TTC" => $montant."DH" );
$size = $pdf->addLine( $y, $line );
$y   += $size + 2;

}



			 

$pdf->addRemarque("Le montant total que vous devez payez est de : ".$Montant_total."DH");

$pdf->Output();
?>
