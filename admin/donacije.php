<?php 
/***************************************************************************
 *                            gladiatus unos donacija file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
	$ime = array(); $zlato = array(); $tstamp = array();
	@$OBR = $_POST["obrada"];//povuci za obradu oznaku
	print "<div class=\"title_box\"><div class=\"title_inner\">Azuriranje podataka o donacijama\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="donac")){ print " <i>- podaci azurirani</i>";}
	print "</div></div>\n";
	print "<div id=\"Donac\" style=\"width:90%;\" class=\"title2_box\">\n";
	print "<div class=\"title2_inner\">\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="donac")){//zahtjev za obradu podataka
	 @$podaci = $_POST["txt_unosa"];//podaci za obradu
	 if(isset($podaci)&&!empty($podaci)){//postoji, obradi ih
	  $pocetak = strpos($podaci,"Igrač	Rank	Zlato	Datum")+25;
	  $kraj = strpos($podaci,"Impresum")-20;
	  $cnt=0;//set counter
	  while($pocetak<$kraj){//izvuci sve zapise
	   $pindx=$pocetak; $kindx=strpos($podaci,"	",$pindx);
	   $ime[$cnt]=substr($podaci,$pindx,$kindx-$pindx-1);//izvuci ime
	   $pindx=strpos($podaci,"	",$kindx+1)+1; $kindx=strpos($podaci,"	",$pindx);
	   $zlato[$cnt]=str_replace(".","",trim(substr($podaci,$pindx,$kindx-$pindx-1)));//donirano
	   $pindx=strpos($podaci,", ",$kindx)+2; $kindx=strpos($podaci,"\n",$pindx);
	   $datum=substr($podaci,$pindx,$kindx-$pindx-1);//datum
	   $tstamp[$cnt]=mktime(substr($datum,13,2),substr($datum,16,2),substr($datum,19,2),intval(substr($datum,3,2)),intval(substr($datum,0,2)),substr($datum,6,4));
	   $pocetak=$kindx+1;//postavi za novi red polozaj
	   if(!empty($ime[$cnt])&&!empty($zlato[$cnt])&&!empty($tstamp[$cnt])&&is_numeric($zlato[$cnt])&&is_numeric($tstamp[$cnt])) $cnt++;
	  }//end while kroz podatke
	  print "<br>\n";
	  for($i=$cnt-1;$i>=0;$i--){//run thru data
	   $result = mysqli_query($MySQL, "SELECT id,dato,UNIX_TIMESTAMP(termin) FROM glad_igraci WHERE ime=\"".$ime[$i]."\"");
	   $db_data = mysqli_fetch_row($result); // get data from row
	   if(!empty($db_data)){//postoji podatak, prekontroliraj
		if($tstamp[$i]>$db_data[2])//azuriraj podatak
		 mysqli_query($MySQL, "UPDATE glad_igraci SET dato=\"".($db_data[1]+$zlato[$i])."\", termin=FROM_UNIXTIME(\"".$tstamp[$i]."\") WHERE id=\"{$db_data[0]}\"");
	   }//end if postoji podatak
	  }//end for $i
	 }//end if postoje podaci
	}//end if zahtjev za obraditi
	print "Za azuriranje podataka o donacijama, otidite u igri na starnicu <b>Savez - Banka - Knjiga donacija</b>.<br>\n";
	print "<form action=\"/index.php?menu=7&amp;action=7\" method=\"post\">\n";
	print "<input type=\"hidden\" value=\"donac\" name=\"obrada\">\n";
	print "Oznacite cijelu stranicu sa kombinacijom tipaka <b>CTRL+A</b> te ju kopirajte (CTRL+C).<br>\n";
	print "Kliknite u doljnje polje i sa <b>CTRL+V</b> zaljepite taj sadrzaj unutra.<br>\n";
	print "<textarea name=\"txt_unosa\" cols=\"80\" rows=\"10\" class=\"input\"></textarea><br>\n";
	print "Za azuriranje kliknite na gumb: \n";
	print "<input type=\"submit\" value=\"Obradi donacije\" class=\"button1\">\n</form>\n";
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>