<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<br>

<div class="container">

    <div class="alert alert-success">
      <strong>Success!</strong> Please wait to be redirected to the login page
    </div>

</div>

<?php 

    header("refresh:2;url=login.php");
    die();

?> 


