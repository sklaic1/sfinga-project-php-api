<?php 
	if(isset($_GET['type'])) $itype = $_GET['type']; else $itype = "SFW";
	if(isset($_POST['category'])) $category = (int)$_POST['category']; else $category=-1;

	print '
	<h1>Waifu API</h1>';
	if($itype == "SFW"){
		$categories = array("waifu", "neko", "shinobu", "megumin", "bully", "cuddle", "cry", "hug", "awoo", "kiss", "lick", "pat", "smug", "bonk", "yeet", "blush",
		 "smile", "wave", "highfive", "handhold", "nom", "bite", "glomp", "slap", "kill", "happy", "wink", "poke", "dance", "cringe");
		print '
		<form class="form-inline" action="/index.php?menu=10&amp;type=SFW" method="post">
		<label>SFW Image Type - <a href="/index.php?menu=10&amp;type=NSFW">Use NSFW Type.</a></label>
		<label for="category">Category:</label>
		<select name="category">';
		for ($i = 0; $i < count($categories); $i++){
            print '<option value="'.$i.'"';
			if ($category==$i) print ' selected="selected"';
			print '>'.$categories[$i]."</option>";
        }
		print '</select>
		<button type="submit">Fetch random image</button>
		</form>';

		if($category>-1){//category selected
			$url = "https://api.waifu.pics/sfw/".$categories[$category];
			$json = file_get_contents($url); 
			$data = json_decode($json,true);
			if($data) print '<img class="waifu" src="'.$data['url'].'">';
			else print '<p>Something went wrong</p>';
		}
	}else if($itype == "NSFW"){
		$categories = array("waifu", "neko", "trap", "blowjob");
		print '
		<form class="form-inline" action="/index.php?menu=10&amp;type=NSFW" method="post">
		<label>NSFW Image Type - <a href="/index.php?menu=10&amp;type=SFW">Use SFW Type.</a></label>
		<label for="category">Category:</label>
		<select name="category">';
		for ($i = 0; $i < count($categories); $i++){
            print '<option value="'.$i.'"';
			if ($category==$i) print ' selected="selected"';
			print '>'.$categories[$i]."</option>";
        }
		print '</select>
		<button type="submit">Fetch random image</button>
		</form>';

		if($category>-1){//category selected
			$url = "https://api.waifu.pics/nsfw/".$categories[$category];
			$json = file_get_contents($url); 
			$data = json_decode($json,true);
			if($data) print '<img class="waifu" src="'.$data['url'].'">';
			else print '<p>Something went wrong</p>';
		}
	}else{
		print '
		<h2>Select image type:</h2>
		<a href="/index.php?menu=10&amp;type=SFW">Switch to SFW Image Type.</a><br>
		<a href="/index.php?menu=10&amp;type=NSFW">Switch to NSFW Image Type.</a>';
	}
?>