<?php 
	if ($_SESSION['user']['valid'] == 'true') {
		if (!isset($action)) { $action = 3; }
		print '
		<h1>Administration</h1>
		<div id="admin">
			<ul>
				<li><a href="index.php?menu=7&amp;action=3">Stanje</a></li>
				<li><a href="index.php?menu=7&amp;action=2">News</a></li>
				<li><a href="index.php?menu=7&amp;action=4">Igrači</a></li>
				<li><a href="index.php?menu=7&amp;action=5">Članovi</a></li>
				<li><a href="index.php?menu=7&amp;action=6">Građevine</a></li>
				<li><a href="index.php?menu=7&amp;action=7">Donacije</a></li>
				<li><a href="index.php?menu=7&amp;action=8">Izgradnja</a></li>
				<li class="users"><a href="index.php?menu=7&amp;action=1">Users</a></li>
			</ul>';
			# Admin Users
			if ($action == 1) { include("admin/users.php"); }
			# Admin News
			else if ($action == 2) { include("admin/news.php"); }
			# Admin ispis donacija
			else if ($action == 3) { include("admin/ispis.php"); }
			# Admin igraci
			else if ($action == 4) { include("admin/igraci.php"); }
			# Admin uredivanje clanova
			else if ($action == 5) { include("admin/igrac.php"); }
			# Admin gradevine
			else if ($action == 6) { include("admin/gradevine.php"); }
			# Admin unos donacija
			else if ($action == 7) { include("admin/donacije.php"); }
			# Admin postavke donacija
			else if ($action == 8) { include("admin/izgradnja.php"); }
		print '
		</div>';
	}
	else {
		$_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
		header("Location: index.php?menu=6");
	}
?>