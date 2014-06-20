<?php
	$title = "Ajouter un article";
	require_once("includes/authenticated.php");
	include_once("includes/actions.php");
	
$articletitle = '';
$articletext = '';
	
	
	if (isset($_POST["action"]) && $_POST["action"] === "form_article"){  //addArticle doit etre ecrit pareille que dans add_article
		$articletitle = $title = $_POST["title"];
		$articletext = $text = $_POST["text"];
	
	$messages = array();
	if (empty($title)){
		$messages["title"] = "veuillez saisir un titre";

	}
	if (empty($text)){
		$messages["text"] = "veuillez saisir un article";
	}
	if (count($messages) === 0){
		mysql_query("INSERT INTO articles (title, text, date,user) VALUES 
		('" . mysql_real_escape_string($title) ."', '" .
		mysql_real_escape_string($text) ."', NOW()," . $_SESSION['user']['id'] . ")"); //or die(mysql_error());exit;(pour voir les erreur dans mysql
			header("location: gestion_articles.php");
	}
}
	
include_once("includes/header.php");
require_once('views/add_article.view.php');
include_once("includes/footer.php");