<?php 

    // First we execute our common code to connection to the database and start the session 
    include("include.php");
	require($_SERVER['DOCUMENT_ROOT'].ROOT_PATH."/database.php"); 
     
    // We remove the user's data from the session 
    unset($_SESSION['user']); 
     
    // We redirect them to the login page 
    header("Location: ./"); 
    die("Redirecting to: index.php");

?>