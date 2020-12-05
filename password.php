<?php
session_start();
?>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>mot de passe oublié</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="style/css/Authentification_style.css">
     <link rel="stylesheet" href="style/css/input_style.css">

</head>
<body>
<img src="style/images/bg-contact.jpg" id="heroimage">
<div class="container">
<form class="login-form"  method="POST"  action="password.php">
  <div style="margin-left: -300px; color: white;font-size: 18px;font-family: Maiandra GD">Administrateur<br><input style="width: 90px;height: 30px;" type="radio" name="radyo" value="admin"></div>  
  <div style="margin-left: 100px; margin-top: -60px;color: white;font-size: 18px;font-family: Maiandra GD">Enseignant<br><input style="width: 90px;height: 30px;border-radius: -110%" type="radio" name="radyo" value="enseignant"></div>
  <div style="margin-left: 500px;margin-bottom: 70px; margin-top: -60px;color: white;font-size: 18px;font-family: Maiandra GD">Etudiant<br><input style="width: 70px;height: 30px;border-radius: -110%" type="radio" name="radyo" value="etudiant"></div>
 
  <div class="form">
  <div class="thumbnail"><img src="style/images/logo/1.png" ></div> 
	<div style="font-size: 20px "> Entrez votre login :</div>
	 <br><br>
    <input type="text" placeholder="votre login" name="login" required />
    <input id="cta"  type="submit" name="entrer" value="Envoyer">
	<br>
	<br>
  
	<?php
	
	
	$dbh=new PDO("mysql:host=localhost;dbname=pfe_db","root","");
	if (isset($_POST['entrer'])) 
	{
		
		if ($_POST["radyo"]=="enseignant")
		{
			$Login = $_POST['login'];
			$sth =$dbh->query("SELECT email_ens FROM enseignant WHERE login_ens='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$email=$row;
			$sth =$dbh->query("SELECT password_ens FROM enseignant WHERE login_ens='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$password=$row;
			$msg="votre mot de passe de GestEtud est:".$password;

			require 'PHPMailerAutoload.php';

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "in-v3.mailjet.com";
			$mail->SMTPSecure = "ssl";
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = '7feffa19f77c1cc6e21eb2a13c666fe7';
			$mail->Password = '38d7db7b793ee4abc2ea2e46bf93b1a8';
			$mail->From="gestetud18@gmail.com";
			$mail->addAddress($email);
			$mail->Subject = 'Recuperer mot de passe';
			$mail->Body = $msg;
			if ($mail->send())
				echo '<p style="color:green">Un e-mail est envoyé à votre adresse principale</p>';			
		}
		
		if ($_POST["radyo"]=="admin")
		{
			$Login = $_POST['login'];
			$sth =$dbh->query("SELECT email_admin FROM admin WHERE login_admin='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$email=$row;
			$sth =$dbh->query("SELECT password_admin FROM admin WHERE login_admin='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$password=$row;
			$msg="votre mot de passe de GestEtud est:".$password;

			require 'PHPMailerAutoload.php';

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "in-v3.mailjet.com";
			$mail->SMTPSecure = "ssl";
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = '7feffa19f77c1cc6e21eb2a13c666fe7';
			$mail->Password = '38d7db7b793ee4abc2ea2e46bf93b1a8';
			$mail->From="gestetud18@gmail.com";
			$mail->addAddress($email);
			$mail->Subject = 'Recuperer mot de passe';
			$mail->Body = $msg;
			if ($mail->send())
				echo '<p style="color:green">Un e-mail est envoyé à votre adresse principale</p>';			
		}
		
		if ($_POST["radyo"]=="etudiant")
		{
			$Login = $_POST['login'];
			$sth =$dbh->query("SELECT email_etud FROM etudiant WHERE login_etud='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$email=$row;
			$sth =$dbh->query("SELECT password_etud FROM etudiant WHERE login_etud='$Login' ");
			
			$resultat=$sth->fetch(PDO::FETCH_ASSOC);
			foreach($resultat as $row)
				$password=$row;
			$msg="votre mot de passe de GestEtud est:".$password;

			require 'PHPMailerAutoload.php';

			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "in-v3.mailjet.com";
			$mail->SMTPSecure = "ssl";
			$mail->Port = 465;
			$mail->SMTPAuth = true;
			$mail->Username = '7feffa19f77c1cc6e21eb2a13c666fe7';
			$mail->Password = '38d7db7b793ee4abc2ea2e46bf93b1a8';
			$mail->From="gestetud18@gmail.com";
			$mail->addAddress($email);
			$mail->Subject = 'Recuperer mot de passe';
			$mail->Body = $msg;
			if ($mail->send())
				echo '<p style="color:green">Un e-mail est envoyé à votre adresse principale</p>';			
		}
	}
?>
	</form>
</div>
</body>
</html>
