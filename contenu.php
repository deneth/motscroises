<?php
    if (isset($_GET["page"]))
    {
        $Page = $_GET["page"];
    } else
    {
        $Page = "main";
    }
    
    switch ($Page)
    {
    
        case "main":
            $html = "<h2>À propos de Mots Croisés</h2>".PHP_EOL;
            $html .= "<h3>Lorem ipsum dolor</h3>".PHP_EOL;
            $html .= "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ultrices, magna semper mollis volutpat, tortor odio imperdiet nisl, id egestas massa metus vel est. Cras mi quam, tristique in mattis ut, aliquet nec leo. Nulla vitae ante ac est pretium facilisis volutpat vitae tortor. Proin quam sem, elementum eu imperdiet ac, scelerisque id libero. Suspendisse eros metus, fermentum non blandit quis, commodo eget libero. Donec tempus magna eleifend ligula sagittis malesuada. Quisque adipiscing massa non nisi aliquam viverra aliquet elit hendrerit.</p>".PHP_EOL;
            $html .= "<p>Nam nisl mi, tempor id consectetur at, tempus vitae libero. Donec suscipit, risus id pharetra imperdiet, magna arcu ornare enim, ullamcorper interdum nibh nulla a felis. Curabitur nec libero id ante gravida posuere sit amet vitae erat. Nam et purus augue, sit amet vestibulum odio. Integer nec orci nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec eu libero viverra eros gravida scelerisque. Nam ullamcorper sem et diam luctus volutpat. In semper sollicitudin massa eu iaculis. Curabitur semper arcu non quam egestas quis bibendum erat sagittis. Phasellus suscipit commodo elit eget commodo. Praesent et arcu congue velit lacinia tincidunt eget semper dui. Cras mollis tempus nunc quis scelerisque. Fusce a ipsum eu neque dictum iaculis a vitae metus. Praesent aliquet pretium orci, sagittis ullamcorper massa interdum eu. Proin ac eleifend augue.</p>".PHP_EOL;
            $html .= "<p>Integer tempor nisl nec ligula tincidunt convallis. Morbi purus tortor, dapibus rutrum sollicitudin eu, tempor sit amet neque. In elementum hendrerit varius. In vel ligula justo, at lobortis lorem. Phasellus hendrerit, nunc sed ultricies scelerisque, eros nunc dictum enim, malesuada euismod nisl justo ac massa. Donec eget elit risus, sed pulvinar nisi. Quisque erat lectus, faucibus in molestie nec, mattis sit amet risus. Nullam dolor erat, vestibulum vel bibendum a, consequat pretium nulla. Nunc ut neque eu mauris interdum tristique in nec lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla tincidunt elit ac ante blandit sit amet ultrices elit rutrum. Sed lacinia dapibus arcu vitae tincidunt. Vestibulum felis tortor, pulvinar nec posuere in, ullamcorper eu enim.</p>".PHP_EOL;
            $html .= "<p>Sed pulvinar, magna ut faucibus lobortis, quam ligula congue sem, vel dignissim enim mi consequat sapien. Nunc lorem dui, imperdiet in posuere et, malesuada rutrum elit. Vivamus consequat dictum hendrerit. Vestibulum accumsan risus vitae nibh adipiscing eget euismod lorem faucibus. Donec imperdiet rutrum nisl ut lacinia. Donec nec est et magna pulvinar mattis a et nibh. Maecenas accumsan elit tellus, sit amet fringilla massa. Cras vestibulum facilisis porttitor.</p>".PHP_EOL;
            $html .= "<p>Nullam suscipit ante bibendum mauris dignissim facilisis. Aenean ut neque nisl, vel pharetra turpis. Aliquam vitae libero quis tortor feugiat tincidunt. Duis porttitor, augue sit amet tempor euismod, nibh dui elementum dui, id tempor dui felis a sapien. Aenean luctus lacinia tincidunt. Maecenas eu ultrices magna. Nam vel eleifend nulla. Suspendisse vel libero felis, mollis posuere velit. In ac dictum turpis. Vestibulum porttitor ornare purus, et suscipit lacus adipiscing ut. Pellentesque facilisis sollicitudin fringilla. Proin egestas dui tempus mauris adipiscing in lacinia lacus fermentum.</p>".PHP_EOL;
            break;
        case "grille":
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
			
            $html = "<h2 class=\"gras\">".$arbre['nom']."</h2>".PHP_EOL;
            $html .= "<p class=\"difficulte gras\"> Difficulté : ".$diff.PHP_EOL;
			$config=$arbre->Config;
			$nb_row=$config->RowNumber;
			$nb_col=$config->ColumnNumber;
			$html .= "<h3>".$nb_row."x".$nb_col." cases</h3>".PHP_EOL;
			
			$html .= "<div class='test'><strong>".PHP_EOL;
			$i=1;
			$html .= "<span class='index'>&nbsp;</span>".PHP_EOL;
			while ($i<=$nb_row) {
				$html .= "<span class='index'>".$i."</span>".PHP_EOL;
				$i++;
			}
			$html .= "<br /><br />".PHP_EOL;
			$grille=$arbre->Grille;
			$i=1;
			foreach($grille->Row as $row) {
				$html .= "<span class='index'>".rome($i)."</span>".PHP_EOL;
				foreach($row as $case) {
					if ($case == '0') {
						$html .= "<span class='caseblanc'>".$case."</span>".PHP_EOL;
					} else {
						$html .= "<span class='casenoire'>".$case."</span>".PHP_EOL;
					}
				}
				$i++;
				$html .= "<br /><br />".PHP_EOL;
			}
			$html .= "</strong></div>".PHP_EOL;
			$definition=$arbre->Definition;
			$horiz=$definition->Horizontale;
			$vert=$definition->Verticale;
			$html .= "<div clas='test2'><strong><ol class='horiz'>".PHP_EOL;
			foreach($horiz->Data as $def) {
				$html .= "<li><p>".$def."</p></li>".PHP_EOL;
			}
			$html .= "</ol></strong></div>".PHP_EOL;
			$html .= "<br /><br /><br /><br /><br /><br />".PHP_EOL;
			$html .= "<div class='test3'><strong><ol class='vert'>".PHP_EOL;
			foreach($vert->Data as $def) {
				$html .= "<li><p>".$def."</p></li>".PHP_EOL;
			}
			$html .= "</ol></strong></div>".PHP_EOL;
            break;
    }

    echo $html; // affichage de la page
?>