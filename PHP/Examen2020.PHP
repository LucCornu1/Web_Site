<!DOCTYPE html> <!-- Ceci est un modèle de base, penser à faire une copie avant de faire des modifications -->
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" href="">
		<link rel="stylesheet" type="text/css" href="">
		<link rel="shortcut icon" type="image/x-icon" href="">
		<script type="text/javascript" src="">
			
		</script>
		<title>
			<?php
			$titre = "Examen2020 - PHP";
			echo $titre;
			?>
		</title>

		<style type="text/css">
			table, th, td{
				border: 1px solid grey;
			}
			table{
			  border-collapse: collapse;
			}
			table.centre{
			  margin: auto;
			}
			table.centre td{
			  text-align: center;
			}
			table#jolie tr:first-child{
			  background: LightPink;
			}
			table#jolie tr:nth-child(2n){
			  background: #EFD3C9;
			}
			table#jolie tr:nth-child(2n+3){
			  background: #BCBCD0;
			}
			table tr:only-child{
			  background: red;
			}
			div{
			  width: 15%;
			}
			div.centre{
			  margin: auto;
			}
			#titre{
			  font-weight: bold;
			  font-size: 1.5em;
			  color: blue;
			}
		</style>
	</head>

	<body>

		<?php
			echo "<div class='centre' id='titre'>Etudiants en ".date("Y")."</div>";

			define('BASE','db_school');
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

			function select_Classe($connexion)
			{
				$req = "SELECT * FROM Classe";

				try
				{
					$stmt = $connexion->prepare($req);
					$stmt->execute();
				}
				catch(Exception $e)
				{	
					echo $e;
					exit();
				}

				echo "<form id='classe_form' method='get' action='#' ><fieldset><legend>Choix de classe(s) :</legend><select name='classe[]' id='classe' required multiple>";

				foreach($stmt as $row)
				{
					echo '<option value='.$row['id_Classe'].'>'.$row['libelle_Classe'].'</option>';
				}
				echo "</select><input type='submit' name='submit'/></fieldset></form>";
			}

			$connexion = connect_bd();

			select_Classe($connexion);
		?>

		<table name="etudiants" id="jolie" class="centre">
		<?php
			function select_Etudiant($connexion)
			{
				if (isset($_GET['classe']))
				{
					$req2 = "SELECT nom_Etudiant, prenom_Etudiant, email_Etudiant, libelle_Classe FROM etudiant e, frequenter f, classe c WHERE e.id_Etudiant = f.id_Etudiant AND f.id_Classe = c.id_Classe AND f.id_Classe IN (:idClasse0";
					for ($i = 1; $i< count($_GET['classe']); $i++)
					{
						$req2 .= ", :idClasse".$i;
					}
					$req2 .= ")";

					//echo $req2;

					$stmt2 = $connexion->prepare($req2);

					for($i = 0; $i<count($_GET['classe']); $i++)
					{
						$stmt2->bindValue(":idClasse".$i, $_GET['classe'][$i], PDO::PARAM_INT);
					}

					$stmt2->execute();

					echo "<thead><tr><th>Classe</th><th>Nom</th><th>Prénom</th><th>Email</th></tr></thead>";
					echo "<tbody>";

					foreach($stmt2 as $row)
					{
						echo "<tr><td>".$row['libelle_Classe']."</td><td>".$row['nom_Etudiant']."</td><td>".$row['prenom_Etudiant']."</td><td>".$row['email_Etudiant']."</td></tr>";
					}
					echo "</tbody></table>";
				}
			}

			select_Etudiant($connexion);
		?>
        </table>


		<br>

		<footer>
			<div>Nous somme le :</div>
			<?php
				echo date('d/m/Y h:i:s'); /*fonction date permettant d'afficher la date (si on veut rafraichir autom : 'setInterval'*/
			?>
		</footer>

	</body>
</html>