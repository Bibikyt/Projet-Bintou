<?php 

	$host = "localhost";
	$user = "root";
	$pass = "";
	$base = "reseau_social";
	$conn = mysqli_connect($host, $user, $pass, $base);

	if(!$conn){
		die("Erreur de connexion : " . mysqli_connect_error());
	}



?>