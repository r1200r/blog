<?php
	$title = "mon espace d'administration";
	require_once("includes/authenticated.php");
	include_once("includes/header.php");
	include_once("includes/actions.php"); 
?>

	Mon Administration
	<br />Bonjour&nbsp;<?php echo $_SESSION["user"]; ?>
	
<?php include_once("includes/footer.php"); ?>   
<!-- les variable globale toujours en majuscules -->