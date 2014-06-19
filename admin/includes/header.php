<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8"/>
	<title><?php echo $title; ?></title>
	<link type="text/css" href="style.css" media="screen" rel="stylesheet" /> <!-- a active pour le fichier
	css qui reçoit les modification de la page EX/ polices font tableaux decale etc..-->
</head>
	
	<body>
		<header>
			<h1>
			 Administration de mon blog
			 </h1>
			
	<nav>
		<ul>
	
				<?php if (isset($_SESSION) && isset($_SESSION["user"])){ ?> <!--la le Déconnexion disparait si pas connecter -->
				<li><a href="?action=deconnection">Accueil</a></li>
				<li><a href="gestion_articles.php">Gestion des articles</a></li>
				<li><a href="#">menu1</a></li>
				<li><a href="#">menu2</a></li>	
				<li class="deconnexion"><a href="?action=deconnection">Déconnection</a></li>
				<?php } ?>
			</ul>
			<div style ="clear: both;"></div> <!-- pour provoqué l'elargissement du nav -->
			
	</nav>
</header>


