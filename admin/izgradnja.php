<?php 
/***************************************************************************
 *                            gladiatus donacije file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
//donacije za igrace
function izracunaj_donacije($MySQL, $cijena, $startdat){//azuriraj clanove i izvuci datum
	$result = mysqli_query($MySQL, "SELECT lvl,dugovi,id FROM glad_igraci WHERE stat=\"2\"");
	$db_data = mysqli_fetch_row($result); // get data from row
	while(!empty($db_data)){//prodi sve
	 $dnevno[$db_data[2]]=($db_data[0]+1)*20*16;//nova pravila
	 $dugovi[$db_data[2]]=$db_data[1];
	 $db_data = mysqli_fetch_row($result); // get data from next row
	}//end while
	//Prodi sve i povecavaj dane dok ne predemo zadanu donaciju
	$tcijena=0;$dani=0;//postavi default cijenu doniranog i broj dana
	while($tcijena<$cijena){//idi dok se ne nade broj dana
	 $tcijena=0; ++$dani;
	 foreach($dnevno as $id => $lova){//prodi zapise
	  $igrlov=($lova*$dani)+$dugovi[$id];
	  if($igrlov>0) $tcijena=$tcijena+$igrlov;
	 }//end foreach
	}//end while korz dane
	//zapisi za svakoga koliko dnevno mora dati
	$result = true;
	foreach($dnevno as $id => $lova){//prodi zapise
	 $igrlov=$lova*$dani;
	 if(!mysqli_query($MySQL, "UPDATE glad_igraci SET ukupno=\"{$igrlov}\" WHERE id=\"{$id}\"")) $result = false;
	}//end foreach
	if(!$result) print "<span style=\"color: #f00\"><b>GRESKA!</b> kod upisa donacija clanovima.</span>\n";
	return ($startdat+($dani*24*60*60)+1);//zavrsni datum
}//end izracunaj_donacije()
   
	$dani = array( "Mon" => "Ponedjeljak", "Tue" => "Utorak", "Wed" => "Srijeda", "Thu" => "Cetvrtak", "Fri" => "Petak", "Sat" => "Subota", "Sun" => "Nedjelja");
	@$OBR = $_POST["obrada"];//povuci za obradu oznaku
	print "<div class=\"title_box\"><div class=\"title_inner\">Kreiranje - racunanje donacija\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="donacije")){ print " <i>- podaci azurirani</i>";}
	print "</div></div>\n";
	print "<div id=\"Donacije\" style=\"width:90%;\" class=\"title2_box\">\n";
	print "<div class=\"title2_inner\">\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="donacije")){//zahtjev za obradu podataka
	 @$podaci = $_POST["donacija"];//datum donacije
	 if(isset($podaci)&&!empty($podaci)){//postoji, azuriraj stanje
	  $result = mysqli_query($MySQL, "SELECT UNIX_TIMESTAMP(donacija),zgrada,vri_zgr FROM glad_don WHERE donacija=FROM_UNIXTIME(\"".$podaci."\")");
	  $db_data = mysqli_fetch_row($result); // get data from row
	  if(!empty($db_data)){//postoji zapis za donaciju, azuriraj ga
	   @$zgrada = $_POST["zgrada"];
	   if(isset($zgrada)&&!empty($zgrada)){//postoji, izvuci podatak
		$result = mysqli_query($MySQL, "SELECT zlato FROM glad_zgrade WHERE naziv=\"".$zgrada."\"");
		$db_d = mysqli_fetch_row($result); // get data from row
		if(!empty($db_d)) $cijena=$db_d[0];//postoji zapis
		else{ $zgrada=$db_data[1]; $cijena=$db_data[2];}//set from database
	   }else{//ne postoji podatak za zgradu
		$zgrada=$db_data[1]; $cijena=$db_data[2];//set from database
	   }//end else if ne postoji podatak za zgradu
	   @$datum = $_POST["man_dan"];//datum donacije
	   if(!isset($datum)) $datum="";//ako ne postoji
	   $dnadan=izracunaj_donacije($MySQL, $cijena, $podaci);//azuriraj clanove i izvuci datum
	   mysqli_query($MySQL, "UPDATE glad_don SET zgrada=\"{$zgrada}\", vri_zgr=\"{$cijena}\", man_dan=\"{$datum}\", don_dan=FROM_UNIXTIME(\"".$dnadan."\") WHERE donacija=FROM_UNIXTIME(\"".$podaci."\")");
	  }else print "<span style=\"color:#aa0000\">Ne postoji zapis u bazi o donaciji kreiranoj ".date('d.m.Y - H:i:s',$podaci)." ({$podaci})!</span><br>\n";
	  //end else if postoji zapis za donaciju
	 }else{//ne postoji, novi zahjev?
	  @$zgrada = $_POST["zgrada"];
	  if(isset($zgrada)&&!empty($zgrada)){//postoji, izvuci podatak
	   $result = mysqli_query($MySQL, "SELECT zlato FROM glad_zgrade WHERE naziv=\"".$zgrada."\"");
	   $db_d = mysqli_fetch_row($result); // get data from row
	   if(!empty($db_d)) $cijena=$db_d[0];//postoji zapis
	   else{ $zgrada=""; $cijena=0;}//set default
	  }else{//ne postoji podatak za zgradu
	   $zgrada=""; $cijena=0;//set default
	  }//end else if ne postoji podatak za zgradu
	  @$datum = $_POST["man_dan"];//datum donacije
	  if(!isset($datum)) $datum="";//ako ne postoji
	  mysqli_query($MySQL, "INSERT INTO glad_don (`donacija`,`zgrada`,`vri_zgr`,`man_dan`) VALUES (NOW(),\"{$zgrada}\",\"{$cijena}\",\"{$datum}\")");
	  $result = mysqli_query($MySQL, "SELECT id,dugovi,dato,ukupno FROM glad_igraci WHERE dato>\"0\"");
	  $db_data = mysqli_fetch_row($result); // get data from row
	  while(!empty($db_data)){//prodi sve
	   mysqli_query($MySQL, "UPDATE glad_igraci SET ukupno=\"0\", dato=\"0\", dugovi=\"".(($db_data[1]+$db_data[3])-$db_data[2])."\" WHERE id=\"".$db_data[0]."\"");
	   $db_data = mysqli_fetch_row($result); // get data from next row
	  }//end while
	 }//end else if postoje podaci
	}//end if zahtjev za obraditi
	$result = mysqli_query($MySQL, "SELECT UNIX_TIMESTAMP(donacija),zgrada,vri_zgr,man_dan,UNIX_TIMESTAMP(don_dan) FROM glad_don ORDER BY donacija DESC LIMIT 0,1");
	$db_data = mysqli_fetch_row($result); // get data from row
	if(!empty($db_data)){//postoji zapis za donaciju
	 print "<p class=\"title_inner\">Azuriranje podataka o trenutno aktivnoj donaciji</p>\n";
	 print "<br>Ovdje mozete postaviti i izracunati nove parametre za trenutno aktivnu donaciju.<br>\n";
	 print "Svaka promjena ovdje, nakon izracuna se primjenjuje na svakog clana koji donira.<br>\n";
	 print "<br><form action=\"/index.php?menu=7&amp;action=8\" method=\"post\">\n";
	 print "<input type=\"hidden\" value=\"donacije\" name=\"obrada\">\n";
	 print "Donacija aktivirana na dan ".date('d.m.Y - H:i:s',$db_data[0]).".<br>\n";
	 print "<input type=\"hidden\" value=\"".$db_data[0]."\" name=\"donacija\">\n";
	 print "<span style=\"color:#0000aa\"><b>Napomena:</b> Ako su se promjenili i azurirali";
	 print " podaci o gradevinama cijene gradevina nece pasati sa aktivnim stanjem.</span><br>\n";
	 print "Gradevina koja se dize u savezu: <select name=\"zgrada\">\n";
	 $result = mysqli_query($MySQL, "SELECT * FROM glad_zgrade");
	 $db_d = mysqli_fetch_row($result); // get data from row
	 $pase = true;
	 while(!empty($db_d)){//ispisi sve
	  print "<option value=\"".$db_d[0]."\"";
	  if($db_data[1]==$db_d[0]){ print " selected=\"selected\"";
	   if($db_data[2]!=$db_d[2]) $pase=false; }//oznaci da li pasu vrijednosti
	  print ">".$db_d[0]." - Lvl ".$db_d[1]." (".number_format($db_d[2], 0, ',', '.')." Zlata)</option>\n";
	  $db_d = mysqli_fetch_row($result); // get data from next row
	 }//end while
	 print "</select><br>\nZadnja snimljena cijena gradevine: ".number_format($db_data[2], 0, ',', '.')." zlata<br>\n";
	 if(!$pase){ print "<span style=\"color:#aa0000\">Snimljena cijena gradevine ne pase sa novim stanjem!<br>\n";
	  print "Nakon izracuna ce se postaviti na novu vrijednost.<br>\n<b>Ako ste zavrsili sa trenutnom donacijom,";
	  print " kreirajte novu, nemojte postojecu nadogradivat zbog pracenja dugova clanova.</b></span><br>\n";}
	 print "<span style=\"color:#0000aa\"><b>Napomena:</b> datum donacija je opcionalan i sluzi samo za modificiranje ispisa izracunatog datuma.</span><br>\n";
	 print "Datum donacija: <input type=\"text\" name=\"man_dan\" value=\"".$db_data[3]."\" style=\"width:100px\"><br>\n";
	 if($db_data[0]>$db_data[4]) print "<span style=\"color:#aa0000\">Automatski izracunat datum za donaciju nije jos izracunat!</span><br>\n";
	 else print "Automatski izracunat datum za donaciju je: ".date('d.m.Y',$db_data[4])." (".$dani[date('D',$db_data[4])].")<br>\n";
	 print "<input type=\"submit\" value=\"Izracunaj donacije\" class=\"button1\">\n</form>\n";
	}//end if podaci
	print "<p class=\"title_inner\">Kreiranje nove aktivne donacije</p>\n";
	print "<br>Prije kreiranja nove donacije napravite slijedece:<br>\n";
	print "<ul><li>Azurirajte podatake o donacijama kako bi zadnje donacije igraca bile upisane.</li>\n";
	print "<li>Uredite podatake o Igracima u savezu, dodjate nove igrace, te neaktivne i izbacene oznacite pravim statusom.<br>\n";
	print "<b>Napomena:</b> Izbacene clanove ne brisati iz baze, bolje da ostanu radi kontrole.</li>";
	print "<li>Uredite podatake o gradevinama, znaci azurirajte cijene gradevina, jer su se sigurno promjenile sa proslom donacijom.</li></ul>\n";
	print "Nakon kreiranja nove aktivne donacije, obracunat ce se i snimiti dugovi igracima od prijasnje.<br>\n";
	print "<span style=\"color:#aa0000\">Automatski izracunat datum za donaciju nije ovime ukljucen, jos ga je potrebno izracunati preko Izracuna Doancije!</span><br>\n";
	print "<br><form action=\"/index.php?menu=7&amp;action=8\" method=\"post\"";
	print " onsubmit=\"return confirm('Da li ste sigurni da zelite kreirati nove donacije? To ce azurirati podatke o dugovima svim igracima/clanovima.')\">\n";
	print "<input type=\"hidden\" value=\"donacije\" name=\"obrada\">\n";
	print "<input type=\"hidden\" value=\"donacija\" name=\"\">\n";//za novu
	print "Gradevina koja se dize u savezu: <select name=\"zgrada\">\n";
	$result = mysqli_query($MySQL, "SELECT * FROM glad_zgrade");
	$db_d = mysqli_fetch_row($result); // get data from row
	while(!empty($db_d)){//ispisi sve
	 print "<option value=\"".$db_d[0]."\">".$db_d[0]." - Lvl ".$db_d[1]." (".number_format($db_d[2], 0, ',', '.')." Zlata)</option>\n";
	 $db_d = mysqli_fetch_row($result); // get data from next row
	}//end while
	print "</select><br>\n";
	print "<span style=\"color:#0000aa\"><b>Napomena:</b> datum donacija je opcionalan i sluzi samo za modificiranje ispisa izracunatog datuma.</span><br>\n";
	print "Datum donacija:<input type=\"text\" name=\"man_dan\" value=\"".$db_data[3]."\" style=\"width:100px\"><br>\n";
	print "Za kreiranje nove donacije kliknite na: \n";
	print "<input type=\"submit\" value=\"Nova donacija\" class=\"button1\">\n</form>\n";
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>