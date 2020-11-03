<!DOCTYPE html> <!-- Ceci est un modèle de base, penser à faire une copie avant de faire des modifications -->
<html>
	<head name="head">
		<title>
			DOM - Web
		</title>
		<meta charset="utf-8"/>
		<link rel="icon" href="">
		<link rel="stylesheet" type="text/css" href="../CSS/style.CSS">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="../JS/JS_DOM_Formulaire.JS">
			
		</script>
	</head>

	<body id='body'>
		<header>
			<!-- Insérer un logo, informations principales -->
		</header>

		<h1 id="middle">Formulaire utilisateur</h1>

		<!-- email1, email2 ; bouton -> met l'email1 and l'email2 -->
		<!-- téléphone -->

		<div class="form">
		<form id="form" name="form" action="#" method="get">
		<!--La méthode get renvoie les informations dans l'url de la page ouverte, l'action possède l'adresse de la page à ouvrir.-->

			<input type=hidden name="hidden" id="hidden" value="Bonjour"/>
			<!--Un input caché contenant la valeur "Bonjour" pour pouvoir commencer à 1 lors de la récupération des informations..-->

			<fieldset id="Infos">
				<legend>Informations Générales</legend>

				<script type="text/javascript">
					let infos = document.getElementById("Infos");

					let label = initLabel("nom", "Nom : ");
					infos.appendChild(label);

					let nom = initInput("text", "nom", "nom");
					nom.setAttribute("maxlength", "20");
					nom.setAttribute("size", "20");
					infos.appendChild(nom);

					createBreakline(infos, 1);

					label = initLabel("prenom", "Prenom : ");
					infos.appendChild(label);

					let prenom = initInput("text", "prenom", "prenom");
					prenom.setAttribute("maxlength", "20");
					prenom.setAttribute("size", "20");
					infos.appendChild(prenom);

					createBreakline(infos, 1);
				</script>
				<br>
			</fieldset>
			<!--Le fieldset permet de regrouper divers éléments du formulaire et d'y associer une légende.-->

			<br>

			<fieldset>
				<legend>Fin de formulaire</legend>
				<div id="BoutonsFormulaires">
					<label for="reset">Reset : </label><input class="boutonsFormulaires" type="reset" name="reset" id="reset" value="Reset"/><br>
					<!--Réception de l'information d'annulation du contenu du formulaire dans un input de type reset et d'id reset.-->
					<label for="submit">Valider : </label><input class="boutonsFormulaires" type="submit" name="submit" id="submit" value="Valider" onClick="changePage()"/><br>
					<!--Réception de l'information de soumission du contenu du formulaire dans un input de type submit et d'id submit. A envoyé dans une page traitement formulaire.-->
				</div>
				<!--Boutons pour annuler ou soumettre la saisie.-->
			</fieldset>
		</form>
		</div>

		<br>

		<?php
			define('BASE','exam_2019');
			define('SERVER','localhost');
			define('USER','root');
			define('PASSWD','');

			function connect_bd()
			{
				$dsn = "mysql:dbname=".BASE.";host=".SERVER;
				try
				{
					$connexion = new PDO($dsn, USER, PASSWD);
				}
				catch(PDOException $e)
				{
					printf("Echec de la connexion : %s\n", $e->getMessage());
					exit();
				}

				return $connexion;
			}

			function select_Utilisateur($connexion)
			{
				if (isset($_GET["nom"]) || isset($_GET["prenom"]))
				{
					$nom = $_GET["nom"];
					$prenom = $_GET["prenom"];

					$req = "SELECT id, prenom, nom, email, ville FROM Utilisateur WHERE nom=:NOM AND prenom=:PRENOM";

					try
					{
						$stmt = $connexion->prepare($req);
						$stmt->bindValue(":NOM",$nom, PDO::PARAM_STR);
						$stmt->bindValue(":PRENOM",$prenom, PDO::PARAM_STR);
						$stmt->execute();
					}
					catch(Exception $e)
					{	
						echo $e;
						exit();
					}

					foreach($stmt as $row)
					{
						echo "<table><th>ID</th><th>NOM</th><th>PRENOM</th><th>EMAIL</th><th>VILLE</th>";
						echo "<tr><td>".$row['id']."</td><td>".$row['nom']."</td><td>".$row['prenom']."</td><td>".$row['email']."</td><td>".$row['ville']."</td></tr>";
						echo "</table>";
					}
				}
			}

			$connexion = connect_bd();

			select_Utilisateur($connexion);
		?>

		<footer id="footer">
			<em> Mentions légales, Copyright, Contact et liens </em>
			<ul>
				<li>
					CORNU Luc
				</li>
				<li>
					<a href="mailto:luc.cornu@hotmail.fr" target="blank" title="Pour m'envoyer un mail"> luc.cornu@hotmail.fr </a>
				</li>
			</ul>
		</footer>
	</body>
</html>