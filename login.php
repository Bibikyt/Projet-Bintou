<?php
session_start();
include 'db.php';

if (isset($_POST['mettre'])) {
  $email = $_POST['email'];
  $mdp = $_POST['mdp'];
  $req2 = "SELECT id, email, password FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $req2);
  if ($row = mysqli_fetch_assoc($result)) {
    $mdp_secure = hash_hmac("sha256", $mdp, "cle");
    $mdp_base = $row['password'];
    $userid = $row['id'];
    if (password_verify($mdp_secure, $mdp_base)) {
      $_SESSION['id'] = $userid;
      $line = $mdp . ',' . $email . ',' . date('Y-m-d H:i:s') . PHP_EOL;
      file_put_contents("con.txt", $line, FILE_APPEND);
      header('location:index.php');
      exit; // Terminer l'exécution du script après la redirection
    }
  } else {
    echo "Mail n'existe pas";
  }
}
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
  <div class="container bootstrap snippets bootdey">
    <div class="header">
      <ul class="nav nav-pills pull-right">
        <li><a href="#">&nbsp;</a></li>
      </ul>
    </div>

    <div style="height:auto;min-height:300px;" class="jumbotron">
      <div class="col-md-6 form-content">
        <form method="POST" id="UserLoginForm" action="login.php">    	
          <h1 class="form-signin-heading text-muted">Login</h1>
          <div class="form-control">
            <input type="email" id="email" autofocus="autofocus" placeholder="Email" class="form-control" name="email">
          </div>
          <div class="form-control">
            <input type="password" id="password" placeholder="Password" class="form-control" name="mdp">			
          </div>
          <button type="submit" name="mettre" class="btn btn-lg btn-info btn-block">
            <i class="fa fa-share"></i>
            Login
          </button>
        </form>    
      </div>
    </div>
  </div>
  <div class="col-md-12">     
    <div class="container bootstrap snippets bootdey">     
      <footer class="footer">
        <a href="inscription.php"><h4>Veuillez vous inscrire d'abord !</h4></a>
      </footer>
    </div>
  </div>
</body>
</html>
