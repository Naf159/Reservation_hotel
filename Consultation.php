
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Consultation</title>

<link href="Style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />



<html>
<head>
<style>
h3{
color:midnightblue;

}
legend{
text-align:left;
text-weight:bolder;
color:midnightblue;
font-style:thick;
font-size:large;
}


	
	}
	
	
	
	table { 
	
	 
		border-collapse: collapse; 
	}
	/* Zebra striping */
	tr:nth-of-type(odd) { 
		background: Gainsboro; 
	}
	th { 

		background:#E6E6FA; 
		color: #003366; 
		font-weight: bold; 
	}
	td, th { 
	 
		border: 1px solid #ccc; 
		text-align: center;
		height:39px;
width:120px;
	
	}
		th { 
		
		background-image: linear-gradient(white,#283E68); 
		color: white; 
		font-weight: bold; 
	}
Label{

color:midnightblue;

}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="tableaux/style.css" />
<script type="text/javascript">
function fnExcelReport()
{

    var tab_text="<table><tr>";
    var textRange;
    tab = document.getElementById('TableData'); 

    for(j = 0 ; j < tab.rows.length ; j++) 
    {   
        tab_text=tab_text+tab.rows[j].innerHTML;
        tab_text=tab_text+"</tr><tr>";
    }

    tab_text=tab_text+"</tr></table>";

    txt.document.open("txt/html","replace");

    txt.document.write(tab_text);
    txt.document.close();
    txt.focus();
    //tb=document.getElementById('TableData').execCommand("SaveAs",true,"Doc.xls");
	tb=txtArea1.document.execCommand("SaveAs",true,"Doc.xls");
    
    return (tb);
}
</script>

<script type="text/javascript">

	$("#btnExport").click(function (e) {
    window.open('data:application/vnd.ms-excel,' + $('#resultat').html());
    e.preventDefault();
});
</script>

<script type="text/javascript">
function getXMLHttpRequest() {
    var xhr = null;
     
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
                        xhr = new XMLHttpRequest();
                    }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
     
    return xhr;
}
             
function AJAX(url){
    xhr_object = getXMLHttpRequest();
     
    xhr_object.open("GET", url, false);
    xhr_object.send(null);
    if(xhr_object.readyState == 4){
        return xhr_object.responseText;
    }else return(false);
}          
function submitForm(){
    var form = document.forms["form"];
    var de = form.de.value;
    var a = form.a.value;
    var client = form.client.value;
                 
    var url = "Consultation2.php?de="+de+"&a="+a+"&client="+client;
                 
    
	document.getElementById('resultat').innerHTML = AJAX(url);
            
}
function go(){
    
    sel = document.getElementById('statut');
	statut = sel.options[sel.selectedIndex].value;
	var form = document.forms["form"];
    var de = form.de.value;
    var a = form.a.value;
    var client = form.client.value;
		 
   
    var url = "Consultation1.php?de="+de+"&a="+a+"&client="+client+"&statut="+statut;
	document.getElementById('resultat').innerHTML = AJAX(url);
            
}
function ok(){
	var form = document.forms["form"];
    var date0 = form.date0.value;
    var datex = form.datex.value;
	
   
                 
    var url = "Statistiques.php?date0="+date0+"&datex="+datex;
	document.getElementById('statistiques').innerHTML = AJAX(url);
            
}
// ?>
</script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>

	<link href="datepicker.css" rel="stylesheet" type="text/css" />


	<script type="text/javascript">
		$(function(){
			$('#a').datepicker({
				inline: true,
				//nextText: '&rarr;',
				//prevText: '&larr;',
				showOtherMonths: true,
				dateFormat: 'yy-mm-dd',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
			});
			$('#de').datepicker({
				inline: true,
				//nextText: '&rarr;',
				//prevText: '&larr;',
				showOtherMonths: true,
				dateFormat: 'yy-mm-dd',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
			});
			$('#date0').datepicker({
				inline: true,
				//nextText: '&rarr;',
				//prevText: '&larr;',
				showOtherMonths: true,
				dateFormat: 'yy-mm-dd',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
			});
			$('#datex').datepicker({
				inline: true,
				//nextText: '&rarr;',
				//prevText: '&larr;',
				showOtherMonths: true,
				dateFormat: 'yy-mm-dd',
				dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
				//showOn: "button",
				//buttonImage: "img/calendar-blue.png",
				//buttonImageOnly: true,
			});
		});
	</script>


</head>


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


<div class="cadre_principal">


<form action="" name="form" method="GET">

<br>
<center>
<div style="background-color:Lavender;width:390px;-webkit-border-top-right-radius: 1px;
     -webkit-border-bottom-left-radius: 1px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    ">
<h3 >Rechercher une Réservation</h3></div>
</center>
<br>

<fieldset style="width:750px;margin-left:38px;border-color:steelblue">

<legend style="text-align:left;background-color:#F7F7F0;color:steelblue">Paramétres de recherche:</legend>
<label   style="position:relative;left:-50px;">Du :</label>
    <tr><td><input type="text" id="de" name="de"  placeholder="arriv&eacute;e" style="position:absolute;left:340px" /></td>
<td><label  style="margin-left:10px;">Au :</label>
	<input type="text" id="a" name="a" placeholder="depart"style="margin-left:-540px;"  /></td>
<label for=client style="position:relative;left:70px;">Client :</label>  
 
	<td><input type="text" id="client" name="client" placeholder="Code"style="position:absolute;left:780px;" /></td></tr>
 <input type=button value="Rechercher" onclick="submitForm()" name="submit"style="position:absolute;left:950px;" />
</fieldset>
<br>
<br>
	<fieldset style="width:750px;margin-left:38px;border-color:steelblue">
<legend style=";background-color:#F7F7F0;color:steelblue">Statut de la réservation:</legend>
	<label for=statut style="position:absolute;left:490px;">Choix:</label>
				<td><select name=statut id=statut onchange="go()" ></td>
				<option value=0>Aucun</option>
					<?php
					mysql_connect("localhost","root","")or die(mysql_error());
                     mysql_select_db("hotelerie")or die(mysql_error()); 
					 mysql_query("SET NAMES UTF8");
						$res1 = mysql_query("SELECT * FROM  `statut` ORDER BY N_statut");
						
						while($row = mysql_fetch_array($res1)){
							?>
							<option value=<?php echo $row['N_statut']; ?> > <?php echo $row['statut'];} ?></option>
						
				</select>
				
</fieldset>
<br>
<br> 
<fieldset style="width:750px;margin-left:38px;border-color:steelblue">
<legend style="background-color:#F7F7F0;color:steelblue">Résultats de recherche:</legend>
<div id="resultat"></div>
</fieldset>
<br>
<br>
<hr>

<center>
<div style="background-color:lavender;width:390px;-webkit-border-top-right-radius: 1px;
     -webkit-border-bottom-left-radius: 1px;
     -webkit-border-top-left-radius: 10px;
	  -webkit-border-bottom-right-radius: 10px;
	    ">
<h3 >Statistiques</h3></div>
</center>

<fieldset style="width:750px;margin-left:38px;border-color:steelblue">

<legend style="background-color:#F7F7F0;color:steelblue">Paramètres</legend>
<label style="margin-left:50px;">Du:</label>
<td><input type=text name=date0 id=date0 style="position:absolute;left:440px;" /></td>
<label style="position:absolute;left:610px;">Au:</label>

<td><input type=text name=datex id=datex style="position:absolute;left:700px;" /></td>

<td><input type=button name=Afficher Value=Afficher id=Afficher onclick="ok()"style="position:absolute;left:980px;" /></td>
<br>
<div id="statistiques"> </div>
</fieldset>
</form>
</div>
</center>
</body>
<html>