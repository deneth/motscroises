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
		<?php include('menu2.php'); ?>
	</div><!-- #navigation -->

	<div id="contenu">
		<?php
			function rome($num)
			{
			  //I V X  L  C   D   M
			  //1 5 10 50 100 500 1k
			  $rome =array("","I","II","III","IV","V","VI","VII","VIII","IX");
			  $rome2=array("","X","XX","XXX","XL","L","LX","LXX","LXXX","XC");
			  $rome3=array("","C","CC","CCC","CD","D","DC","DCC","DCCC","CM");
			  $rome4=array("","M","MM","MMM","IVM","VM","VIM","VIIM","VIIIM","IXM");
			  $str=$rome[$num%10];
			  $num-=($num%10);
			  $num/=10;
			  $str=$rome2[$num%10].$str;
			  $num-=($num%10);
			  $num/=10;
			  $str=$rome3[$num%10].$str;
			  $num-=($num%10);
			  $num/=10;
			  $str=$rome4[$num%10].$str;
			  return $str;
			}
			
			$file=$_GET['file'];
			$diff=$_GET['diff'];
			switch ($diff) {
				case "facile":
					$dir="grille/facile/";
					break;
				case "moyenne":
					$dir="grille/moyenne/";
					break;
				case "difficile":
					$dir="grille/difficile/";
					break;
			}
			chdir($dir);
			//$file=$file.".xml";
			$arbre = simplexml_load_file($file); 
			
			echo "<h2>".$arbre['nom']."</h2>";
			$config=$arbre->Config;
			$nb_row=$config->RowNumber;
			$nb_col=$config->ColumnNumber;
			echo "<h3>".$nb_row."x".$nb_col." cases</h3>";
			
			echo "<div class='test'><strong>";
			$i=1;
			echo "<span class='index'>&nbsp;</span>";
			while ($i<=$nb_row) {
				echo "<span class='index'>".$i."</span>";
				$i++;
			}
			echo "<br /><br />";
			$grille=$arbre->Grille;
			$i=1;
			foreach($grille->Row as $row) {
				echo "<span class='index'>".rome($i)."</span>";
				foreach($row as $case) {
					if ($case == '0') {
						echo "<span class='caseblanc'>".$case."</span>";
					} else {
						echo "<span class='casenoire'>".$case."</span>";
					}
				}
				$i++;
				echo "<br /><br />";
			}
			echo "</strong></div>";
			$definition=$arbre->Definition;
			$horiz=$definition->Horizontale;
			$vert=$definition->Verticale;
			echo "<div clas='test2'><strong><ol class='horiz'>";
			foreach($horiz->Data as $def) {
				echo "<li><p>".$def."</p></li>";
			}
			echo "</ol></strong></div>";
			echo "<br /><br /><br /><br /><br /><br />";
			echo "<div class='test3'><strong><ol class='vert'>";
			foreach($vert->Data as $def) {
				echo "<li><p>".$def."</p></li>";
			}
			echo "</ol></strong></div>";
		?>
	</div><!-- #contenu -->

	<div>
		<p><center><a href="admin.php">Admin</a></center></p>
	</div>

	<p id="copyright">
		Mise en page &copy; 2018
		<a href="mailto:didier.faure@gmx.fr">Didier Faure</a>
	</p>

</div><!-- #global -->

</body>
</html>