<?php

session_start();

$login=$_SESSION['login'];

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Modifier_Compte</title>
<link rel="shortcut icon" type="image/x-icon" href="#" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" href="style/css/input_style.css">
<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="style/css/input_style.css">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="style/js/carousel.js"></script>
<script type="text/javascript" src="style/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="style/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div id="inputText">
<!-- Begin Wrapper -->

<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar"><br><br>
	<!--<input type="search"/>
	   <input name="query" id="query" type="text" size="23" maxlength="30">
	   <button onclick="highlight('ihssane')">Highlight</button>
		<input name="searchit" type="button" value="Recherche" onClick="Hilitor()">-->
		 <a href="Acceuil_Enseignant.php" ><img style="width: 200px;margin-top: 40px;margin-left: 25px;" src="style/images/logo/1.png"></a>
		 
	<div class="search">    
      <form class="searchform" method="get">
          <input type="text" id="s" name="s" value="Recherche" onfocus="this.value=''" onblur="this.value='type and hit enter'"/> 
      </form>
    </div>

    <!-- Begin Menu -->
	
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="Acceuil_Enseignant.php" class="active"><img src="style/images/icons/home.png" id="icons">Accueil</a>
          
        <li><a href="#"><img src="style/images/icons/calendar.png" id="icons">Absence</a>
          <ul>
            <li><a href="gestion_absence.php">Gestion d'absences</a></li>
            <li><a href="suivre_absence_enseignant.php">Suivre d'absence</a></li>
          </ul>
        </li>
		<li><a href="modifier_enseignant.php"><img src="style/images/icons/information.png" id="icons">Compte</a></li>
        <li><a href="contact_Enseignant.php"><img src="style/images/icons/email.png" id="icons">Contacter</a>
        </li>
        <li><a href="A_propos_Enseignant.php"><img src="style/images/icons/information.png" id="icons">A propos</a></li>
      </ul>
    </div>
	
	 <!--ligne ajouté-->
    <!-- End Menu -->
    
    <a href="Authentification.php"><img src="style/images/background/small-button-hi.png" id="buttonimg">
    <h1 id="typename1">E n s e i g n a n t</h1>
   <img src="style/images/icons/power-button.png" id="typelog1"></a>
    
	</div>
	<!-- End Sidebar -->
	<img src="style/images/background/gg.jpg" id=heroimg ">
	<!-- Begin Content -->
	

  <section style="color: white;font-family: Arial;font-weight: bold; position: absolute;background-color: #45596a;  width: 375px;margin-top: 200px; margin-left: 650px;margin-right: 30px; height: 350px;padding: 20px;border-radius: 10px;"> 
  <h2 style="text-align: center;color: white ;font-size: 30px;font-family: Cabin;margin-bottom: 40px;margin-top: 20px;">Changer le mots de passe :</h2>
  <form method="POST" style="">

 <form style="box-shadow: 0px 0px 2px black;color: white; margin-top: 10px;margin-left: 120px;margin-right: 200px;text-align: center;border-top-left-radius: 7px;border-top-right-radius: 7px;" method="POST">
       <br><br>
        Mot de passe:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="ancien"  required><br><br>
		Nouveau mot de passe:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password"  name="new" required><br><br>	
		Confirmer mot de passe:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="password" name="new2" required><br><br>
        <br><br><input style="margin-left: 150px;" type="submit" id="vta" name="entrer" value="Modifier"><br><br>
		<?php
				$dbh=new PDO("mysql:host=localhost;dbname=pfe_db","root","");
				if (isset($_POST['entrer'])) 
				{
					
					$sth =$dbh->query("SELECT password_ens FROM enseignant WHERE login_ens='$login' ");
					$resultat=$sth->fetch(PDO::FETCH_ASSOC);
					foreach($resultat as $row)
						$password=$row;
					if ($_POST['ancien']== $password)
					{
						if ($_POST['new']==$_POST['new2'])
						{
							$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$sql = "update enseignant set password_ens ='".$_POST['new2']."' WHERE login_ens='$login'";
								
							// Prepare statement
							$stmt = $dbh->prepare($sql);
							// execute the query
							$stmt->execute();
							
							if ($stmt->rowCount()==1)
							  echo '<p style="color:lightgreen;text-align:center;margin-top:20px;font-weight: bold;font-family: arial;font-size:20px;">Mot de passe bien modifié</p>';
						
						}
						else
							echo '<p style="color:red">les 2 mots de passe ne sont pas identiques</p>';
							
					}
					else
						echo '<p style="color:#ff7a75;text-align:center;margin-top:20px;font-weight: bold;font-family: arial;font-size:20px;">Mot de passe incorrecte</p>';
						
					 
					
				}
		?>
        </form>
  <ul style="list-style: none;">
    <br><br><br><br><br><br><br><br>
   

  </ul>
  </form>
  </section>
	<!-- End Content -->
	

<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->

</form>
</body>
</html>
