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

	<body>

		<h1>Tableau jeu</h1>

		<script type="text/javascript">
			function tableJeu()
			{
				var jeux = ["test1", "test2", "test3", "test4"];

				var genre = ["genre1", "genre2", "genre3", "genre4"];

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

		</script>

		<footer>
			<p>Nous somme le :</p>
			<?php
				echo date('d/m/Y h:i:s'); /*fonction date permettant d'afficher la date (si on veut rafraichir autom : 'setInterval'*/
			?>
		</footer>

	</body>
</html>