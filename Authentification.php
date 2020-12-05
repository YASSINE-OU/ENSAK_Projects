<!DOCTYPE html>
<html lang="en" >


<head>
  <meta charset="UTF-8">
  <title>Authentification</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
	<link rel="stylesheet" href="style/css/Authentification_style.css">
     <link rel="stylesheet" href="style/css/input_style.css">

  
</head>

<body>
<img src="style/images/bg-contact.jpg" id="heroimage" style="width: 1442px;">
  
<div class="container">
<form class="login-form"  method="POST">
  <div style="margin-left: -300px; color: white;font-size: 18px;font-family: Maiandra GD">Administrateur<br><input style="width: 90px;height: 30px;" type="radio" name="radyo" value="admin"></div>  
  <div style="margin-left: 100px; margin-top: -60px;color: white;font-size: 18px;font-family: Maiandra GD">Enseignant<br><input style="width: 90px;height: 30px;border-radius: -110%" type="radio" name="radyo" value="enseignant"></div>
  <div style="margin-left: 500px;margin-bottom: 70px; margin-top: -60px;color: white;font-size: 18px;font-family: Maiandra GD">Etudiant<br><input style="width: 70px;height: 30px;border-radius: -110%" type="radio" name="radyo" value="etudiant"></div>
 
  <div class="form">
  <div class="thumbnail"><img src="style/images/logo/1.png" ></div> 
 <!-- ajouté-->  
    <input type="text" <?php if(isset($_COOKIE["password"])) echo "value=".$_COOKIE["login"]; ?> placeholder="Nom d'utilisateur" name="Login" required />
    <input type="password" <?php if(isset($_COOKIE["password"])) echo "value=".$_COOKIE["password"]; ?> placeholder="Mots de passe" name="password" required />
    <input id="cta"  type="submit" name="entrer" value="Entrer">
	 <!--lignes ajouté-->
	<br><br>
	<input type="checkbox" name="remember">Remember me
	<br>
	<br>
	<a href="password.php">mot de passe oublié </a>
  </form>
</div>

</body>



<?php 
error_reporting(0);
$con=mysqli_connect("localhost","root","","pfe_db"); 
if (isset($_POST['entrer'])) {


		
		
      if ($_POST["radyo"]=="admin") {
        
          $Login = $_POST['Login'];
          $password = $_POST['password'];
          $result = mysqli_query($con,"SELECT * FROM admin WHERE login_admin='$Login' ");
          $test2 = mysqli_fetch_assoc($result);
          $test =mysqli_num_rows($result);

          if($test == 1)
          {
			  session_start();
			$_SESSION['login'] = $Login;
            $mot_pass = mysqli_query($con,"SELECT password_admin FROM admin WHERE login_admin='$Login' ");
            $retur_password = mysqli_fetch_assoc($mot_pass);
               if( ($password) != $retur_password['password_admin'])
                  {
                      echo "<script>alert ('Password  Wrong');</script>";
                  }
                  else
                  {
                    //echo "<script>alert('Welcome To Our WebSite You Are logged in  succsefuly Mr '+'$Login');</script>";
                    echo "<script> window.location.assign('Acceuil_Admin.php')</script>";
					
                    setcookie("admin",$test2['id_admin']);  
					//bloc ajouté
					if (isset($_POST['remember']))
					{
						setcookie("password",$password,time()+3600);
						setcookie("login",$Login,time()+3600);
						
					}					
					
                  }
          }
          else
          {
            echo "<script>alert ('Email Does not Exists');</script>"; 
          }
    }





elseif ($_POST["radyo"]=="enseignant") {
          
          
          $Login = $_POST['Login'];
          $password = $_POST['password'];
          $result = mysqli_query($con,"SELECT * FROM enseignant WHERE login_ens='$Login' ");
          $test =mysqli_num_rows($result);
          $test2 = mysqli_fetch_assoc($result);
          if($test == 1)
          {
			  session_start();
			$_SESSION['login'] = $Login;
            $mot_pass = mysqli_query($con,"SELECT password_ens FROM enseignant WHERE login_ens='$Login' ");
            $retur_password = mysqli_fetch_assoc($mot_pass);
               if( ($password) != $retur_password['password_ens'])
                  {
                      echo "<script>alert ('Password  Wrong');</script>";
                  }
                  else
                  {
                    //echo "<script>alert('Welcome To Our WebSite You Are logged in  succsefuly Mr '+'$Login');</script>";
                    echo "<script> window.location.assign('Acceuil_Enseignant.php')</script>";
                    setcookie("enseignant",$test2['id_ens']);
					//bloc ajouté
					if (isset($_POST['remember']))
					{
						setcookie("password",$password,time()+3600);
						setcookie("login",$Login,time()+3600);
						
					}
                  }
          }
          else
          {
            echo "<script>alert ('Email Does not Exists');</script>"; 
          }
    }








else{
        
      
          $Login = $_POST['Login'];
          $password = $_POST['password'];
          $result = mysqli_query($con,"SELECT * FROM etudiant WHERE login_etud='$Login' ");
          $test =mysqli_num_rows($result);
          $test2 = mysqli_fetch_assoc($result);
          if($test == 1)
          {
			  session_start();
			$_SESSION['login'] = $Login;
            $mot_pass = mysqli_query($con,"SELECT password_etud FROM etudiant WHERE login_etud='$Login' ");
            $retur_password = mysqli_fetch_assoc($mot_pass);
               if( ($password) != $retur_password['password_etud'])
                  {
                      echo "<script>alert ('Password  Wrong');</script>";
                  }
                  else
                  {
                    //echo "<script>alert('Welcome To Our WebSite You Are logged in  succsefuly Mr '+'$Login');</script>";
                    echo "<script> window.location.assign('Acceuil_Etudiant.php')</script>";
                    setcookie("etudiant",$test2['id_etud']);
					//bloc ajouté
					if (isset($_POST['remember']))
					{
						setcookie("password",$password,time()+3600);
						setcookie("login",$Login,time()+3600);
						
					}
                  }
          }
          else
          {
            echo "<script>alert ('Email Does not Exists');</script>"; 
          }
    }






  }

mysqli_close($con);
?>





</html>
