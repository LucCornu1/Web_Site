<!DOCTYPE html> <!-- Ceci est un modèle de base, penser à faire une copie avant de faire des modifications -->
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" href="">
		<link rel="stylesheet" type="text/css" href="../CSS/tbl.CSS">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="">
			
		</script>
		<title>
			PHP - web
		</title>
	</head>

	<!--Texte, avec une partie qui change de couleur sur un évenement-->

	<body>

		<h1>Tableau jeu</h1>

		<script type="text/javascript">
			function tableJeu()
			{
				var jeux = ["test1", "test2", "test3", "test4"];

				var genre = ["genre1", "genre2", "genre3", "genre4"];

				console.log(typeof(jeux));

				rangeI = 4;

				for (var i = 0; i < rangeI; i++) {
					if (i%2==0) {
						name = "pair";
					}else{
						name = "impair";
					}
					document.write("<div class='"+name+"'> <div class='divInside' class='divInside'>"+jeux[i]+"</div> <div class='hidden'>"+genre[i]+"</div> </div>");
				}
			}

			tableJeu();

			function hide()
			{
				var p = document.getElementsByClassName('hidden');
				for (var i = p.length - 1; i >= 0; i--){
                    if (p[i].style.visibility == 'hidden')
                    {
                        p[i].style.visibility = 'visible';
                    }
                    else
                    {
                        p[i].style.visibility = 'hidden';
                    }
                }

			}

			document.write("</br><button Id='bouton' onclick='hide()'>Afficher/Masquer</button>");

			document.write("</br><input type='checkbox' id='check' onchange='hide()'>");


			function over(x)
			{
				x.style.color = 'red';
			}

			function out(x)
			{
				x.style.color = 'black';
			}


			document.write("<p>Lorem Elsass ipsum Mauris sit merci vielmols gal Yo dû. ftomi! tristique geht's Coopé de Truchtersheim lotto-owe dui leverwurscht purus Gal ! Pfourtz ! yeuh. <span onmouseover='over(this)' onmouseout='out(this)'>réchime Oberschaeffolsheim suspendisse ac libero. hopla varius Kabinetpapier kuglopf Racing. Oberschaeffolsheim tchao bissame Pellentesque hoplageiss baeckeoffe porta mamsell munster so senectus kartoffelsalad lacus rossbolla Hans messti de Bischheim Richard Schirmeck libero, vulputate nüdle dolor mollis Chulien auctor, sit DNA, pellentesque quam, Miss Dahlias nullam Carola sed Wurschtsalad jetz gehts los tellus ullamcorper wurscht s'guelt kougelhopf habitant Morbi knepfle salu chambon picon bière Strasbourg risus, rucksack sit hopla barapli id hop commodo in, sagittis schnaps und Chulia Roberstau flammekueche geïz non leo aliquam turpis, bredele Verdammi blottkopf, gravida dignissim eleifend Christkindelsmärik et amet semper wie ch'ai amet, météor bissame elementum adipiscing sed consectetur non quam.</span> Salu bissame ornare schneck ante Gal. ac hopla rhoncus leo Spätzle eget Heineken id, libero, condimentum elit Salut bisamme  morbi ornare schpeck hopla turpis mänele amet knack tellus placerat vielmols, Huguette gewurztraminer</p>");

		</script>


		<h2 id='mContenu1'>111111111111</h2>

		<h2 id='mContenu2'>222222222222</h2>

		<h3 id='Contenu1'>Lorem Elsass ipsum Mauris sit merci vielmols gal Yo dû. ftomi!</h3>

		<h3 id='Contenu2'>Salu bissame ornare schneck ante Gal.</h3>


		<script type="text/javascript">
			function Afficher(event)
			{
				console.log(event);
			}

			function init()
			{
				var X = document.querySelectorAll('h2[id]');
				for (var i = 0; i < X.length; i++) {
                   X[i].addEventListener("mouseover", Afficher(event));
                }
			}
		</script>


		<footer>
			<p>Nous somme le :</p>
			<?php
				echo date('d/m/Y h:i:s'); /*fonction date permettant d'afficher la date (si on veut rafraichir autom : 'setInterval'*/
			?>
		</footer>

	</body>
</html>