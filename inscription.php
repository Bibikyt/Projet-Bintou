<?php
    include 'db.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="include/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<form id="msform" method="POST" action="ajout.php">
  <fieldset>
    <h2 class="fs-title">Creer votre compte</h2>
    <input type="text" name="nom" placeholder="Nom" />
    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="mdp" placeholder="Password" />
    <input type="password" name="cmdp" placeholder="Confirmation password" />

    <div class="form-group input-group">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"></label>
            <input type="file" class="form-control" name="img" >
        </div>
</div></div>
    <button name="inscrire" class="btn btn-succes" type="submit">Inscrire</button>
  </fieldset>
  
</form>
</body>
</html>