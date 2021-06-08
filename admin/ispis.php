<?php 
/***************************************************************************
 *                            gladiatus ispis file
 *                            -------------------
 *   copyright            : (C) 2010 by Silvio Klaic
 *   email                : info@sklaic.info
 ***************************************************************************/
//ispis clanova i visine doniranoga
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
	$dani = array( "Mon" => "Ponedjeljak", "Tue" => "Utorak", "Wed" => "Srijeda", "Thu" => "Cetvrtak", "Fri" => "Petak", "Sat" => "Subota", "Sun" => "Nedjelja");
	print "<div class=\"title2_box\" style=\"width:90%;\">\n<div class=\"title2_inner\">\n";
	$result = mysqli_query($MySQL, "SELECT zgrada,vri_zgr,man_dan,UNIX_TIMESTAMP(don_dan),UNIX_TIMESTAMP(donacija) FROM glad_don ORDER BY donacija DESC LIMIT 0,1");
	$db_data = mysqli_fetch_row($result); // get data from row
	if(!empty($db_data)){//postoji zapis za donaciju
	 if(!empty($db_data[2])) $termin=$db_data[2]; else $termin=sprintf("%s (%s)",date('d.m.Y',$db_data[3]),$dani[date('D',$db_data[3])]);
	 $zgrada=$db_data[0]; $zlato=$db_data[1]; $poc_don=date('d.m.Y',$db_data[4]);//izvuci podatke za donaciju
	}else{ $termin="xx.xx.xxxx"; $zgrada=""; $zlato="xxx"; }//default
	print "<h2>Stanje</h2>\nPocetak sakupljanja za donacije je {$poc_don}.<br>\n";
	print "Novi termin donacija je {$termin} i donira se za {$zgrada}.<br>\n";
	print "Treba skupiti potrebnih ".number_format($zlato, 0, ',', '.')." zlata.\n";
	print "<table border=0 width=\"100%\">\n";
	print "<tr style=\"background-color:#dbcba5; font-weight:bold;\">\n";
	print "<td>Igrac</td><td>Level</td><td>Dnevni iznos</td>\n";
	print "<td>Ukupno za donirati</td><td>Donirano</td><td>Novi dugovi</td></tr>\n";
	$result = mysqli_query($MySQL, "SELECT ime,lvl,dugovi,dato,ukupno FROM glad_igraci WHERE stat=\"2\" ORDER BY ime");
	$db_d = mysqli_fetch_row($result); // get data from row
	while(!empty($db_d)){//prodi sve
	 print "<tr style=\"background-color:#";//scan for color
	 if((($db_d[2]+$db_d[4])-$db_d[3])>0) print "eaa"; else print "aea";
	 print ";\"><td>{$db_d[0]}</td><td>{$db_d[1]}</td>\n<td>";
	 print number_format(($db_d[1]+1)*20*16, 0, ',', '.');//novi izracun
	 print "</td><td>";//ispis ukupne donacije: dugovi+ukupno
	 if(($db_d[2]+$db_d[4])>0) print number_format($db_d[2]+$db_d[4], 0, ',', '.');
	 else print "nista";
	 //razlika (dugovi+ukupno)-dato
	 print "</td><td>{$db_d[3]}</td><td>".number_format(($db_d[2]+$db_d[4])-$db_d[3], 0, ',', '.');
	 print "</td></tr>\n";
	 $db_d = mysqli_fetch_row($result); // get data from next row
	}//end while
   
	print "</table>\nFormatiran ispis za forum u <a href=\"\" onclick=\"showhide('PocDon'); return(false);\">pocetku donacija</a>:<br>\n";
	print "<div id=\"PocDon\" style=\"width:90%; display: none;\">\n";
	print "<textarea cols=\"80\" rows=\"10\" class=\"input\">\n";
	print "Pocetak sakupljanja za donacije je {$poc_don}.\n";
	print "Novi termin donacija je {$termin} i donira se za {$zgrada}.\n";
	print "Treba sakupiti potrebnih ".number_format($zlato, 0, ',', '.')." zlata.\n\n";
	print "[table][tr][td]Igrac[/td][td]Level[/td][td]Dnevni iznos[/td][td]Ukupno za donirati[/td][/tr]\n";
	$result = mysqli_query($MySQL, "SELECT ime,lvl,dugovi,dato,ukupno FROM glad_igraci WHERE stat=\"2\" ORDER BY ime");
	$db_d = mysqli_fetch_row($result); // get data from row
	while(!empty($db_d)){//prodi sve
	 print "[tr][td]{$db_d[0]}[/td][td]{$db_d[1]}[/td][td]";
	 print number_format(($db_d[1]+1)*20*16, 0, ',', '.');//novi izracun
	 print "[/td][td]";
	 if(($db_d[2]+$db_d[4])>0) print "[color=cyan]".number_format($db_d[2]+$db_d[4], 0, ',', '.')."[/color]";
	 else print "[b]nista*[/b]";
	 print "[/td][/tr]\n";
	 $db_d = mysqli_fetch_row($result); // get data from next row
	}//end while
	print "[/table]\n\n[b]* - [/b] Svi kojima pise nista pod iznos za donacije nisu obavezni za tu donaciju nista donirati zbog viska koji su dali prije.\nOdnosno slobodni su da daju koliko zele, pa ce im se odbiti od slijedece donacije.\n\n";
	print "Znaci klasika, ne donirati nista do {$termin}, a ako ne mozete na taj dan biti online,";
	print " onda mozete dati i dan prije.\n</textarea></div>\n";
   
	print "<br>Formatiran ispis za forum na <a href=\"\" onclick=\"showhide('KraDon'); return(false);\">kraju donacija</a>:<br>\n";
	print "<div id=\"KraDon\" style=\"width:90%; display: none;\">\n";
	print "Ovaj tekst se koristi na kraju donacija kad se vise nece azurirati podaci o donacijama kao zavrsni ispis.<br>\n";
	print "<textarea cols=\"80\" rows=\"10\" class=\"input\">\n";
	print "Evo donacija za dizanje {$zgrada} su odradene, ovdje su podaci tko je koliko dao u odnosu na ono sto je trebao:\n\n";
	print "[table][tr][td]Igrac[/td][td]Level[/td][td]Dnevni iznos[/td][td]Razlika u ocekivanoj donaciji[/td][/tr]\n";
	$result = mysqli_query($MySQL, "SELECT ime,lvl,dugovi,dato,ukupno FROM glad_igraci WHERE stat=\"2\" ORDER BY ime");
	$db_d = mysqli_fetch_row($result); // get data from row
	while(!empty($db_d)){//prodi sve
	 print "[tr][td]{$db_d[0]}[/td][td]{$db_d[1]}[/td][td]";
	 print number_format(($db_d[1]+1)*20*16, 0, ',', '.');//novi izracun
	 print "[/td][td]";
	 if((($db_d[2]+$db_d[4])-$db_d[3])>0) print "[color=red]";
	 else print "[color=green]";
	 print number_format((($db_d[2]+$db_d[4])-$db_d[3])*(-1), 0, ',', '.')."[/color]";
	 print "[/td][/tr]\n";
	 $db_d = mysqli_fetch_row($result); // get data from next row
	}//end while
	print "[/table]\n\nSvi koji su u minusu, ce za slijedeci put morati dati iznos koji je uvecan za dug koji nisu sad dali.\n";
	print "Oni koji su dali vise, njima se zahvaljujemo.\n</textarea></div>\n";
	@mysqli_close($link_id);// zatvori bazu
	print "</div></div>\n";
	
	# Close MySQL connection
	@mysqli_close($MySQL);
?>