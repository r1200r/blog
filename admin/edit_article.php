<?php
	
	$title = "Modifier un article";
	require_once("includes/authenticated.php");
	include_once("includes/actions.php");
	
		$query = mysql_query ("SELECT title, text FROM articles WHERE id_article=" . mysql_real_escape_string ($_GET['id_article']));
		$article = mysql_fetch_assoc($query);
	if ($article === false) {
		header("Location: gestion_articles.php");
		}
		$articletitle = $article['title'];
		$articletext = $article['text'];
		
	if (isset($_POST["action"]) && $_POST["action"] === "form_article"){  //addArticle doit etre ecrit pareille que dans add_article
		$articletitle = $title = $_POST["title"];
		$articletext = $text = $_POST["text"];
		$idarticle = $_GET['id_article'];
	
		$messages = array();
	if (empty($title)){
		$messages["title"] = "veuillez saisir un titre";

	}
	if (empty($text)){
		$messages["text"] = "veuillez saisir un article";
	}
	if (count($messages) === 0){
		mysql_query("UPDATE articles SET title='" . mysql_real_escape_string($title) ."', text='". mysql_real_escape_string($text)."' WHERE id_article=" . mysql_real_escape_string($idarticle)); //or die(mysql_error());exit;(pour voir les erreur dans mysql
		header("location: gestion_articles.php");
	}
}	
			
		
	if (isset($_GET["action"]) && $_GET["action"] === "delete_article"){
		mysql_query('DELETE FROM articles WHERE id_article=' . mysql_real_escape_string($_GET['id_article']));
	
		header("location: gestion_articles.php");
	}	

include_once("includes/header.php");
require_once('views/edit_article.view.php');
include_once("includes/footer.php");