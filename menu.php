<?php
echo "
<!-- Début du CSS pour le menu -->
<style>
ul.CssMenu ul{display:none}
ul.CssMenu li:hover>ul{display:block}
ul.CssMenu ul{position: absolute;left:98%;top:-1px;}
ul.CssMenu ul ul{position: absolute;left:98%;top:-2px;}
ul.CssMenu,ul.CssMenu ul {
	margin:0px;
	list-style:none;
	padding:0px 1px 1px 0px;
	background-color:#000000;  /* couleur du fond du menu qui fait le contour du menu */
	background-repeat:repeat;
	border-width:0px;
	border-style:solid;
}
ul.CssMenu table {border-collapse:collapse}
ul.CssMenu {
	display:block;
	zoom:1;
	width:100px;  /* largeur du 1er menu */
	float: left;
}
ul.CssMenu ul{
	width:100px; /* largeur des sous-menu */
}
ul.CssMenu li{
	display:block;
	margin:1px 0px 0px 1px;
	font-size:0px;
}
ul.CssMenu a:active, ul.CssMenu a:focus {
outline-style:none;
}
ul.CssMenu a, ul.CssMenu li.dis a:hover, ul.CssMenu li.sep a:hover {
	display:block;
	vertical-align:middle;
	zoom:1;
	background-color:#333333;  /* couleur du fond du menu */
	border-width:0px;
	border-color:#E4E1DE;
	border-style:solid;
	text-align:left;
	text-decoration:none;
	padding:4px;
	_padding-left:0;
	font:normal 14px Verdana; /* font du texte du menu */
	color:#3365FF;  /* couleur du texte du menu */
	text-decoration:none;
	cursor:default;
}
ul.CssMenu span{
	overflow:hidden;
}
ul.CssMenu ul li {
	float:none;
}
ul.CssMenu ul a {
	text-align:left;
	white-space:nowrap;
}
ul.CssMenu li.sep{
	text-align:left;
	padding:0px;
	line-height:0;
}
ul.CssMenu li.sep span{
	float:none;	padding-right:0;
	width:100%;
	height:3;
	display:inline-block;
	background-color:;	background-image:none;}
ul.CssMenu li:hover{
	position:relative;
}
ul.CssMenu li:hover>a{
	background-color:#555555; /* couleur du fond du menu précédent sélectionné */
	border-color:#FFFFFF;
	border-style:solid;
	font:normal 14px Verdana; /* font du texte du menu précédent */
	color:#88d8cb; /* couleur du texte du menu précedent sélectionné */
	text-decoration:none;
}
ul.CssMenu li a:hover{
	position:relative;
	background-color:#555555; /* couleur du fond du menu sélectionné */
	border-color:#FFFFFF;
	border-style:solid;
	font:normal 14px Verdana; /* font du texte du menu survolé */
	color:#88d8cb; /* couleur du texte survolé */
	text-decoration:none;
}
ul.CssMenu li.dis a {
	color: #AAAAAA !important;
}
ul.CssMenu img {border: none;float:left;_float:none;margin-right:4px;width:24px;
height:24px;
}
ul.CssMenu ul img {width:16px;
height:16px;
}
ul.CssMenu img.over{display:none}
ul.CssMenu li.dis a:hover img.over{display:none !important}
ul.CssMenu li.dis a:hover img.def {display:inline !important}
ul.CssMenu li:hover > a img.def  {display:none}
ul.CssMenu li:hover > a img.over {display:inline}
ul.CssMenu a:hover img.over,ul.CssMenu a:hover ul img.def,ul.CssMenu a:hover a:hover ul img.def,ul.CssMenu a:hover a:hover img.over,ul.CssMenu a:hover a:hover a:hover img.over{display:inline}
ul.CssMenu a:hover img.def,ul.CssMenu a:hover ul img.over,ul.CssMenu a:hover a:hover ul img.over,ul.CssMenu a:hover a:hover img.def,ul.CssMenu a:hover a:hover a:hover img.def{display:none}
ul.CssMenu a:hover ul,ul.CssMenu a:hover a:hover ul{display:block}
ul.CssMenu a:hover ul ul{display:none}
ul.CssMenu span{
	display:block;
	background-image:url(./images/arrow_sub5.gif);
	background-position:right center;
	background-repeat: no-repeat;
   padding-right:12px;}
ul.CssMenu li:hover>a>span{	background-image:url(./images/arrow_main4.gif);
}
ul.CssMenu a:hover span{	_background-image:url(./images/arrow_main4.gif)}
ul.CssMenu ul span,ul.CssMenu a:hover table span{background-image:url(./images/arrow_sub5.gif)}
ul.CssMenu ul li:hover > a span{	background-image:url(./images/arrow_main4.gif);}
ul.CssMenu table a:hover span,ul.CssMenu table a:hover a:hover span{background-image:url(./images/arrow_main4.gif)}
ul.CssMenu table a:hover table span{background-image:url(./images/arrow_sub5.gif)}
</style>
<!-- fin du CSS pour le menu -->



<!-- Début du HTML du menu -->
<ul class='CssMenu CssMenum'>
	<li class='CssMenui'><a class='CssMenui' href='index.php'>Acceuil</a></li>
	<li class='CssMenui'><a class='CssMenui' href='#'><span>Grille</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
	<ul class='CssMenum'>
		<li class='CssMenui'><a class='CssMenui' href='#'><span>Facile</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class='CssMenum'>";

// on récupère la liste des grilles facile
$dir="grille/facile/";		
if ($handle = opendir($dir)) { // le dossier courant
	$i=0;
    while (false !== ($file[$i] = readdir($handle))) {
        if ($file[$i] != "." && $file[$i] != ".." && substr($file[$i],strpos($file[$i],".")+1)=="xml") {
            $i++;
        }
    }
    closedir($handle);
}
unset($file[$i]); // Ceci efface le dernier élément du tableau qui est vide
if ($i>0) {	// on affiche le sous menu si il y a des grilles
	$j=0;
	while ($j<$i) {
		echo "<li class='CssMenu'><a class='CssMenu' href='grille.php?diff=facile&file=".$file[$j]."'>Grille ".($j+1)."</a></li>";
		$j++;
	}
}
echo "
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class='CssMenui'><a class='CssMenui' href='#'><span>Moyenne</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class='CssMenum'>";

// on récupère la liste des grilles moyenne
$dir="grille/moyenne/";		
if ($handle = opendir($dir)) { // le dossier courant
	$i=0;
    while (false !== ($file[$i] = readdir($handle))) {
        if ($file[$i] != "." && $file[$i] != ".." && substr($file[$i],strpos($file[$i],".")+1)=="xml") {
            $i++;
        }
    }
    closedir($handle);
}
unset($file[$i]); // Ceci efface le dernier élément du tableau qui est vide
if ($i>0) { // on affiche le sous menu si il y a des grilles
	$j=0;
	while ($j<$i) {
		echo "<li class='CssMenu'><a class='CssMenu' href='grille.php?diff=moyenne&file=".$file[$j]."'>Grille ".($j+1)."</a></li>";
		$j++;
	}
}
echo "
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
		<li class='CssMenui'><a class='CssMenui' href='#'><span>Difficile</span><![if gt IE 6]></a><![endif]><!--[if lte IE 6]><table><tr><td><![endif]-->
		<ul class='CssMenum'>";

// on récupère la liste des grilles difficile
$dir="grille/difficile/";		
if ($handle = opendir($dir)) { // le dossier courant
	$i=0;
    while (false !== ($file[$i] = readdir($handle))) {
        if ($file[$i] != "." && $file[$i] != ".." && substr($file[$i],strpos($file[$i],".")+1)=="xml") {
            $i++;
        }
    }
    closedir($handle);
}
unset($file[$i]); // Ceci efface le dernier élément du tableau qui est vide
if ($i>0) { // on affiche le sous menu si il y a des grilles
	$j=0;
	while ($j<$i) {
		echo "<li class='CssMenu'><a class='CssMenu' href='grille.php?diff=difficile&file=".$file[$j]."'>Grille ".($j+1)."</a></li>";
		$j++;
	}
}
echo"
		</ul>
		<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	</ul>
	<!--[if lte IE 6]></td></tr></table></a><![endif]--></li>
	<li class='CssMenui'><a class='CssMenui' href='#'>License</a></li>
	<li class='CssMenui'><a class='CssMenui' href='#'>Crédit</a></li>
</ul>
<!-- Fin du HTML du menu -->";



?>