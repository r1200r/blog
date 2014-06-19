<?php

$config = require("config.php");
require_once("functions.php");

$configDB = $config["db"];
connectDB($configDB["host"],$configDB["username"], $configDB["password"], $configDB["db"]);



		
if (isset($_POST["action"]) && $_POST["action"] === "login") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$login = login($username, $password);
	if ($login === false){
		echo "mauvais identifiants";
	}
	else{
		session_start();
		$_SESSION["user"] = $login["username"];
			header("location:index.php");		
		
		//echo "bravo!";   //pour une redirection directement sur une page voulu
		
		
	}
}
if (isset($_POST["action"]) && $_POST["action"] === "addArticle"){  //addArticle doit etre ecrit pareille que dans add_article
	$title = $_POST["title"];
	$text = $_POST["text"];
	
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
	mysql_real_escape_string($text) ."', NOW(),1)"); //or die(mysql_error());exit;(pour voir les erreur dans mysql
			header("location: gestion_articles.php");
		}
}	
			
		

if (isset($_GET["action"]) && $_GET["action"] === "deconnection") { // GET en MAJUSCULES 
	unset($_SESSION["user"]);
	header("location: login.php");
	}
	
	if (isset($_POST["action"]) && $_POST["action"] === "edit_article"){  //addArticle doit etre ecrit pareille que dans add_article
	$title = $_POST["title"];
	$text = $_POST["text"];
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