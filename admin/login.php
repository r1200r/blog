<?php 

$title = "page d'autenfication";
include_once('includes/actions.php');


if (isset($_POST["action"]) && $_POST["action"] === "login") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$login = login($username, $password);
	if ($login === false){
		echo "mauvais identifiants";
	}
	else{
		session_start();
		$_SESSION["user"] = array('id'=> $login['id_user'],'username' => $login["username"]);
			header("location:index.php");		
		
		//echo "bravo!";   //pour une redirection directement sur une page voulu
			
	}
}
			
include_once('includes/header.php'); // on indique le chemin relatif du fichier header 
require_once('views/login.view.php');
include_once("includes/footer.php");	