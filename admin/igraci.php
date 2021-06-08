<?php 
/***************************************************************************
 *                            gladiatus igraci file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
//unos podataka za provjeru igraca
	@$UREDI = $_POST["igraci"];//povuci za obradu oznaku
	print "<div class=\"title_box\"><div class=\"title_inner\">Azururanje podataka o Igracima u savezu\n";
	print "</div></div>\n";
	if(isset($UREDI)&&!empty($UREDI)){// data present, check it
	 print "<div id=\"Igraci\" style=\"width:90%;\" class=\"title2_box\">\n";
	 print "<div class=\"title2_inner\">\nStatus igraca u savezu:<br>\n";
	 $result=mysqli_query($MySQL, "SELECT id,ime FROM glad_igraci WHERE stat > 0 ORDER BY stat DESC, ime");
	 $db_data = mysqli_fetch_row($result); // get data from row
	 while(!empty($db_data)){// prodi sve zapise
	  $clanovi[$db_data[1]]=$db_data[0];//get clanove
	  $status[$db_data[1]]=0;//set default da nije u savezu
	  $db_data = mysqli_fetch_row($result); // get next data from row
	 }//end while
   
	 $pindx=strpos($UREDI,"ast 	Status"); $kindx=strpos($UREDI,"Impresum",$pindx);
	 $podaci=explode("\n",substr($UREDI,$pindx+11,$kindx-$pindx-26));
	 print "<table border=0><tr style=\"background-color:#dbcba5; font-weight:bold;\">\n";
	 print "<td>Ime</td><td>Status igraca</td>\n";
	 foreach ( $podaci as $igrred ){// go thru igrace
	  $kindx=strpos($igrred," ");
	  if($kindx){//ime exists
	   $ime=substr($igrred,0,$kindx);
	   if(isset($clanovi[$ime])) $status[$ime]=1;//stari clan
	   else{ $clanovi[$ime]=-1; $status[$ime]=2;} //novi clan
	  }//end if ime exists
	 }//end foreach
	 foreach ( $clanovi as $naziv=>$id ){//ispisi sve igrace
	  print "<tr><td>";
	  if($id>-1) print "<a href=\"/index.php?menu=7&amp;action=5&amp;igrac={$id}\">";
	  print $naziv;
	  if($id>-1) print "</a>";
	  print "</td>\n<td><span style=\"color:#";
	   switch ($status[$naziv]){ // prodi preko clanova
		case 0: print "a00;\">Nije vise u savezu!"; break;//otisao?
		case 1: print "00a;\">Prisutan"; break;//stari clan
		case 2: print "0a0;\">Novi clan!"; break;//novi clan
		default: print "f70;\"><b>Error!</b>"; }//end switch color
	   print "</span></td></tr>\n";
	 }//end foreach
	 print "</table>\n";
	}else{//no data, place input field
	 print "<div id=\"Igraci\" style=\"width:90%;\" class=\"title2_box\">\n";
	 print "<div class=\"title2_inner\">\n<p class=\"title_inner\">Provjera igraca u savezu</p>\n";
	 print "Za provjeru igrca, otidite u igri na starnicu <b>Savez - Forum Gladiatora - Članovi</b>.<br>\n";
	print "<form action=\"/index.php?menu=7&amp;action=4\" method=\"post\">\n";
	print "Oznacite cijelu stranicu sa kombinacijom tipaka <b>CTRL+A</b> te ju kopirajte (CTRL+C).<br>\n";
	print "Kliknite u doljnje polje i sa <b>CTRL+V</b> zaljepite taj sadrzaj unutra.<br>\n";
	print "<textarea name=\"igraci\" cols=\"80\" rows=\"10\" class=\"input\"></textarea><br>\n";
	print "<input type=\"submit\" value=\"Provjeri igrace\" class=\"button1\">\n</form>\n";
	}//end else if data
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>