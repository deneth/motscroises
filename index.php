<!DOCTYPE html>

<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mots Croisés</title>
	<!-- La feuille de styles "base.css" doit être appelée en premier. -->
	<link rel="stylesheet" type="text/css" href="base.css" media="all" />
	<link rel="stylesheet" type="text/css" href="modele04.css" media="screen" />
</head>

<body>

<div id="global">

	<div id="entete">
		<?php include('entete.php'); ?>
	</div><!-- #entete -->

	<div>
		<?php include('menu.php'); ?>
	</div><!-- #navigation -->

	<div id="contenu">
		<?php include("contenu.php"); ?>
	</div><!-- #contenu -->

	<div>
		<?php	
			if ($Page <> "admin" )
			{
				echo "<p><center><a href=\"index.php?page=admin\">Admin</a></center></p>".PHP_EOL;
			}
		?>
	</div>
	<p id="copyright">
		Mise en page &copy; 2012
		<a href="mailto:deneth@gmx.fr"deneth</a>
	</p>

</div><!-- #global -->

</body>
</html>
