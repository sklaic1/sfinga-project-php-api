<?php 
/***************************************************************************
 *                            gladiatus gradevine file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
//unos podataka za gradevine
	@$OBR = $_POST["obrada"];//povuci za obradu oznaku
	print "<div class=\"title_box\"><div class=\"title_inner\">Uredivanje podataka o Gradevinama\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="grad")){ print " <i>- podaci azurirani</i>";}
	print "</div></div>\n";
	print "<div id=\"Gradevine\" style=\"width:90%;\" class=\"title2_box\">\n";
	print "<div class=\"title2_inner\">\nTrenutno stanje gradevina:<br>\n";
	print "<table border=0><tr style=\"background-color:#dbcba5; font-weight:bold;\">\n";
	print "<td>Naziv gradevine</td><td>Level</td><td>Cijena gradevine</td>\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="grad")){//zahtjev za obradu podataka
	 @$podaci = $_POST["txt_unosa"];//podaci za obradu
	 if(isset($podaci)&&!empty($podaci)){//postoji, obradi ih
	  $pindx=strpos($podaci,"Forum Gladiatora ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+23,$kindx-$pindx-23));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Forum Gladiatora\"");
	  $pindx=strpos($podaci,"Banka ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+13,$kindx-$pindx-13));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Banka\"");
	  $pindx=strpos($podaci,"Doktorova vila ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+22,$kindx-$pindx-22));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Doktorova vila\"");
	  $pindx=strpos($podaci,"Dvorana ratnih heroja ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+29,$kindx-$pindx-29));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Dvorana ratnih heroja\"");
	  $pindx=strpos($podaci,"Knjižnica ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+17,$kindx-$pindx-17));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Knjiznica\"");
	  $pindx=strpos($podaci,"Negotijum X ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+19,$kindx-$pindx-19));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Negotijum X\"");
	  $pindx=strpos($podaci,"Panteon ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+15,$kindx-$pindx-15));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Panteon\"");
	  $pindx=strpos($podaci,"Parna kupelj ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+20,$kindx-$pindx-20));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Parna kupelj\"");
	  $pindx=strpos($podaci,"Saveznički market ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+25,$kindx-$pindx-25));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Saveznicki market\"");
	  $pindx=strpos($podaci,"Skladište ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+17,$kindx-$pindx-17));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Skladiste\"");
	  $pindx=strpos($podaci,"Treniranje ("); $kindx=strpos($podaci,")",$pindx);
	  $pod_l=trim(substr($podaci,$pindx+18,$kindx-$pindx-18));
	  $pindx=$kindx+1; $kindx=strpos($podaci,"Zlato",$pindx);
	  $pod_c=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx)));
	  if(!empty($pod_l)&&!empty($pod_c))// update samo ako postoje
	   mysqli_query($MySQL, "UPDATE glad_zgrade SET lvl=\"{$pod_l}\", zlato=\"{$pod_c}\" WHERE naziv=\"Treniranje\"");
	 }//end if postoje podaci
	}//end if zahtjev za obraditi
	$result = mysqli_query($MySQL, "SELECT * FROM glad_zgrade");
	$db_data = mysqli_fetch_row($result); // get data from row
	while(!empty($db_data)){// prodi sve zapise
	 print "<tr><td><img src=\"/img/{$db_data[0]}.png\" class=\"icon\"> {$db_data[0]}</td><td>{$db_data[1]}</td><td>".number_format($db_data[2], 0, ',', '.')." Zlata</td></tr>\n";
	 $db_data = mysqli_fetch_row($result); // get next data from row
	}//end while
	print "</table>\n";
	print "<br>Za uredivanje podataka, otidite u igri na starnicu <b>Savez - Gradevina</b>.<br>\n";
	print "Tu oznacite cijelu stranicu sa kombinacijom tipaka <b>CTRL+A</b> te ju kopirajte (CTRL+C).<br>\n";
	print "Nakon toga kliknite u doljnje polje i sa <b>CTRL+V</b> zaljepite taj sadrzaj unutra.<br>\n";
	print "Za azuriranje novog stanje kliknite na gumb <b>Azuriraj gradevine</b>.<br>\n";
	print "<form action=\"/index.php?menu=7&amp;action=6\" method=\"post\">\n";
	print "<input type=\"hidden\" value=\"grad\" name=\"obrada\">\n";
	print "<textarea name=\"txt_unosa\" cols=\"80\" rows=\"10\" class=\"input\"></textarea>\n";
	print "<br><input type=\"submit\" value=\"Azuriraj gradevine\" class=\"button1\">\n</form>\n";
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>