<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="shortcut icon" href="assets/img/logo/_logo.png" />
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/custom_css/custom_css.css">
</head>
<body>
 <div class="container">
 	<div class="header">
 		<h1>Connexion</h1>
 	</div>
	 <?php
	 require_once "traitement/Traitement.php";
	  if(isset($_SESSION['msg_error']) AND !empty($_SESSION['msg_error'])): ?>
	  <div style=" color: white; padding: 15px; background-color: red; margin: 20px;">Mot d'utilisateur ou mot de passe incorrect</div>
	 <?php
	  endif ;
	  unset($_SESSION['msg_error']);
	 ?>
 	<div class="main">
 		<form action="traitement/getLogin.php" method="post">
 			<span>
 				<i class="fa fa-user"></i>
 				<input type="text" name="username" placeholder="Nom d'utilisateur" required autocomplete="off">
 			</span><br>
 			<span>
 				<i class="fa fa-lock"></i>
 				<input type="password" name="password" placeholder="Mot de passe" required placeholder="password">
 			</span><br>
 				<button>Se connecter</button>
		</form>
 	</div>
 </div>
</body>
</html>

