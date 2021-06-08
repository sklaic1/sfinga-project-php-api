<?php 
/***************************************************************************
 *                            gladiatus igrac file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
//unos podataka za igrace
?>
 <script language="javascript">
 <!-- 
 var state = 'none';
 function showhide(layer_ref){
  if(state == 'block'){ state = 'none';
  }else{ state = 'block'; }
  if(document.all){ //IS IE 4 or 5 (or 6 beta)
   eval("document.all." +layer_ref+ ".style.display = state"); }
  if (document.layers) { //IS NETSCAPE 4 or below
   document.layers[layer_ref].display = state; }
  if (document.getElementById &&!document.all) {
   hza = document.getElementById(layer_ref); hza.style.display = state; }
 } 
 //-->
 </script> 
<?php
function novi_clan(){//unos podataka za novog clana
	print "<br><p class=\"title_inner\">Novi igrac/clan</p>\n";
	print "Za dodavanje novog igraca, otidite u igri na starnicu <b>Savez - Forum Gladiatora - Članovi</b>.<br>\n";
	print "Kliknite na igraca kojeg zelite dodati u bazu.\n";
	print "<form action=\"/index.php?menu=7&amp;action=5\" method=\"post\">\n";
	print "<input type=\"hidden\" value=\"igrac\" name=\"obrada\">\n";
	print "U slijedece polje (ispod) unesite igracev ID koji vam pise u adresi.<br>\n";
	print "Evo primjer dijela adrese od kud morate prepisati/prekopirati ID (podebljan je):<br>\n";
	print "<i>...gladiatus.org/game/index.php?mod=player&amp;p=</i><b>87082</b><i>&amp;sh=...</i><br>\n";
	print "ID igraca: <input type=\"text\" name=\"iid\" value=\"\" style=\"width:200px\"><br>\n";
	print "Nakon toga oznacite cijelu stranicu sa kombinacijom tipaka <b>CTRL+A</b> te ju kopirajte (CTRL+C).<br>\n";
	print "Kliknite u doljnje polje i sa <b>CTRL+V</b> zaljepite taj sadrzaj unutra.<br>\n";
	print "<textarea name=\"txt_unosa\" cols=\"80\" rows=\"10\" class=\"input\"></textarea><br>\n";
	print "Odaberite status igraca: <select name=\"stat\">\n";
	print "<option value=\"0\">Nije u savezu - ne donira</option>\n";
	print "<option value=\"1\">Blokiran - ne donira</option>\n";
	print "<option value=\"2\" selected=\"selected\">Ukljucen u donacije</option>\n";
	print "</select><br>\n<b>Napomena:</b> ukoliko maknete ili stavite igraca/clana na ukljucenost u donacije,\n";
	print "potrebno je napraviti novi izracun donacija.<br>\n";
	print "<input type=\"checkbox\" name=\"obr_donac\" value=\"1\">Obracunati za donacije samo <b>preostalo</b> vrijeme.<br>\n";
	print "<b>Napomena:</b> ovu opciju koristite samo ako traje prikupljanje za donaciju i zelite da ovom novom clanu ne obracunavate period od pocetka sakupljanja do sada.<br>\n";
	print "Za dodati novog igraca kliknite na gumb: \n";
	print "<input type=\"submit\" value=\"Dodaj igraca\" class=\"button1\">\n</form>\n";
}//end novi_clan
   
	$displ="";
	@$OBR = $_POST["obrada"];@$UREDI = $_GET["igrac"];//povuci za obradu oznaku
	print "<div class=\"title_box\"><div class=\"title_inner\">Uredivanje podataka o \n";
	print "<a href=\"\" onclick=\"showhide('Igrac'); return(false);\">Igracima</a> u savezu\n";
	if(isset($OBR)&&!empty($OBR)&&($OBR=="igrac")){ print " <i>- podaci azurirani</i>"; $displ="";}
	if(isset($UREDI)&&!empty($UREDI)&&is_numeric($UREDI)) $displ=" display: none;";
	print "</div></div>\n";
	print "<div style=\"width:90%;\" class=\"title2_box\">\n";
	print "<div id=\"Igrac\" style=\"{$displ}\" class=\"title2_inner\">\nTrenutni igraci u bazi:<br>\n";
	//izvuci koliko je dana proteklo od pocetka donacije
	$result = mysqli_query($MySQL, "SELECT UNIX_TIMESTAMP(NOW())-UNIX_TIMESTAMP(donacija) FROM glad_don ORDER BY donacija DESC LIMIT 0,1");
	$db_data = mysqli_fetch_row($result); // get data from row
	$proteklo_vrijeme=1;//postavi default protekle sekunde
	if(!empty($db_data)) $proteklo_vrijeme=$db_data[0];//izvuci protekle sekunde
	if(isset($OBR)&&!empty($OBR)&&($OBR=="igrac")){//zahtjev za obradu podataka
	 @$iid = trim($_POST["iid"]); @$podaci = $_POST["txt_unosa"];//podaci za obradu
	 if(isset($podaci)&&!empty($podaci)&&is_numeric($iid)){//postoji, obradi ih
	  @$stat = $_POST["stat"];if(!isset($stat)) $stat=2;//set default
	  @$dugovi = $_POST["dugovi"];if(!isset($dugovi)) $dugovi=0;//set default
	  @$obrdonac = $_POST["obr_donac"]; 
	  $pindx=strpos($podaci,"Otkaži"); $kindx=strpos($podaci,"<",$pindx);
	  $ime=trim(substr($podaci,$pindx+7,$kindx-$pindx-7));
	  $pindx=strpos($podaci,"Level",$kindx);; $kindx=strpos($podaci,"Životni",$pindx);
	  $level=trim(substr($podaci,$pindx+6,$kindx-$pindx-6));
	  if(isset($obrdonac)&&$obrdonac&&!empty($level)&&is_numeric($level))//obracunaj dugove za donaicje ako nije bio
	   $dugovi=round((($level+1)*$proteklo_vrijeme)/270)*-1;
	  if(!empty($ime)&&!empty($level)&&is_numeric($level))// update samo ako postoje
	   mysqli_query($MySQL, "INSERT INTO glad_igraci (`id`,`ime`,`lvl`,`stat`,`dugovi`) VALUES ('{$iid}','{$ime}','{$level}','{$stat}','{$dugovi}') ON DUPLICATE KEY UPDATE ime=\"{$ime}\", lvl=\"{$level}\", stat=\"{$stat}\", dugovi=\"{$dugovi}\"");
	 }else{//ne postoje podaci testiraj da li trebamo obrisati zapis
	  if(isset($UREDI)&&!empty($UREDI)&&is_numeric($UREDI))//brisanje igraca
	   mysqli_query($MySQL, "DELETE FROM glad_igraci WHERE id=\"{$UREDI}\"");
	  else if(isset($iid)&&!empty($iid)&&is_numeric($iid)){//update
	   @$stat = $_POST["stat"];if(!isset($stat)) $stat=2;//set default
	   @$dugovi = $_POST["dugovi"];if(!isset($dugovi)) $dugovi=0;//set default
	   mysqli_query($MySQL, "UPDATE glad_igraci SET stat=\"{$stat}\", dugovi=\"{$dugovi}\" WHERE id=\"{$iid}\"");
	  }//end else if podaci za brisanje
	 }//end else if postoje podaci
	}//end if zahtjev za obraditi
	print "<table border=0><tr style=\"background-color:#dbcba5; font-weight:bold;\">\n";
	print "<td>ID</td><td>Ime</td><td>Level</td><td>Status igraca</td><td>Dugovi</td><td>Donirano</td>\n";
	$result = mysqli_query($MySQL, "SELECT id,ime,lvl,stat,dugovi,dato FROM glad_igraci ORDER BY stat DESC, ime");
	$db_data = mysqli_fetch_row($result); // get data from row
	while(!empty($db_data)){// prodi sve zapise
	 print "<tr><td>{$db_data[0]}</td><td><a href=\"/index.php?menu=7&amp;action=5&amp;igrac={$db_data[0]}\">{$db_data[1]}</a></td>\n";
	 print "<td>{$db_data[2]}</td><td><span style=\"color:#";
	 switch ($db_data[3]) {
	   case 0: print "aa0000;\">nije u savezu - ne donira"; break;
	   case 1: print "aaaa00;\">blokiran - ne donira"; break;
	   case 2: print "00aa00;\">ukljucen u donacije"; break;
	 }//end switch
	 print "</span></td><td><span style=\"color:#";
	 if($db_data[4]>0) print "aa0000"; else print "00aa00";
	 print ";\">".number_format($db_data[4], 0, ',', '.')." Zlata</span></td>\n";
	 print "<td>".number_format($db_data[5], 0, ',', '.')." Zlata</td></tr>\n";
	 $db_data = mysqli_fetch_row($result); // get next data from row
	}//end while
	print "</table></div><div>\n";
	if(!empty($UREDI)&&!empty($UREDI)&&is_numeric($UREDI)){//uredi clana
	 $result = mysqli_query($MySQL, "SELECT * FROM glad_igraci WHERE id=\"{$UREDI}\"");
	 $db_data = mysqli_fetch_row($result); // get data from row
	 if(!empty($db_data)){//postoji podatak
	  print "<br><p class=\"title_inner\">Uredi igraca/clana\n";
	  print "- ID igraca: {$db_data[0]}, Ime: {$db_data[1]}, Level: {$db_data[2]}</p>\n";
	  print "<form action=\"/index.php?menu=7&amp;action=5\" method=\"post\">\n";
	  print "<input type=\"hidden\" value=\"igrac\" name=\"obrada\">\n";
	  print "<input type=\"hidden\" value=\"{$db_data[0]}\" name=\"iid\">\n";
	  print "Za azuriranje imena i levela igraca, otidite u igri na starnicu <b>Savez - Forum Gladiatora - Članovi</b>.<br>\n";
	  print "Kliknite na igraca da vidite njegove podatke ili potrazite igraca ako nije u savezu.<br>\n";
	  print "Nakon toga oznacite cijelu stranicu sa kombinacijom tipaka <b>CTRL+A</b> te ju kopirajte (CTRL+C).<br>\n";
	  print "Kliknite u doljnje polje i sa <b>CTRL+V</b> zaljepite taj sadrzaj unutra.<br>\n";
	  print "<textarea name=\"txt_unosa\" cols=\"80\" rows=\"10\" class=\"input\"></textarea><br>\n";
	  print "Status igraca: <select name=\"stat\">\n<option value=\"0\"";
	  if($db_data[3]==0) print " selected=\"selected\"";
	  print ">Nije u savezu - ne donira</option>\n<option value=\"1\"";
	  if($db_data[3]==1) print " selected=\"selected\"";
	  print ">Blokiran - ne donira</option>\n<option value=\"2\"";
	  if($db_data[3]==2) print " selected=\"selected\"";
	  print ">Ukljucen u donacije</option>\n</select><br>\n";
	  print "<br><span style=\"color:#0000aa;\">Dugovi prema savezu se automatski racunaju, ako uredujete ovaj podatak, onda smatram da znate sto radite!</span><br>\n";
	  print "Duguje savezu: <input type=\"text\" name=\"dugovi\" value=\"{$db_data[4]}\" style=\"width:100px\"> Zlata.<br>\n";
	  print "<br><input type=\"submit\" value=\"Azuriraj igraca\" class=\"button1\">\n</form>\n"; 
	  print "<form action=\"/index.php?menu=7&amp;action=5&amp;igrac={$db_data[0]}\"";
	  print " onsubmit=\"return confirm('Da li ste sigurni da zelite obrisati igraca {$db_data[1]}";
	  print " ({$db_data[0]}) i sve njegove podatke?')\" method=\"post\">\n";
	  print "<input type=\"hidden\" value=\"igrac\" name=\"obrada\">\n";
	  print "<input type=\"submit\" value=\"Obrisi igraca\" class=\"button1\">\n</form>\n"; 
	 }else novi_clan();//end if postoji podatak
	}else novi_clan();//end else if uredi clana
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>