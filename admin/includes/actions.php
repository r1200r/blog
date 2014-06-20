<?php

$config = require("config.php");
require_once("functions.php");

$configDB = $config["db"];
	connectDB($configDB["host"],$configDB["username"], $configDB["password"], $configDB["db"]);

	if (isset($_GET["action"]) && $_GET["action"] === "deconnection") { // GET en MAJUSCULES 
		unset($_SESSION["user"]);
		header("location: login.php");
	}