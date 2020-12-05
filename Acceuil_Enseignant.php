<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Acceuil_Enseignant</title>
<link rel="shortcut icon" type="image/x-icon" href="#" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
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
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <a href="Acceuil_Enseignant.php" ><img style="width: 200px;margin-top: 70px;margin-left: 25px;" src="style/images/logo/1.png"></a>
		 
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
        <li><a href="modifier_enseignant.php"><img src="style/images/icons/information.png" id="icons">Compte</a>
        </li>
        <li><a href="contact_Enseignant.php"><img src="style/images/icons/email.png" id="icons">Contacter</a>
        </li>
        <li><a href="A_propos_Enseignant.php"><img src="style/images/icons/information.png" id="icons">A propos</a></li>
      </ul>
    </div>
    <!-- End Menu -->
    
    <a href="Authentification.php"><img src="style/images/background/small-button-hi.png" id="buttonimg">
    <h1 id="typename1">E n s e i g n a n t</h1>
   <img src="style/images/icons/power-button.png" id="typelog1"></a>
    
	</div>
	<!-- End Sidebar -->
	<?php 
$con=mysqli_connect("localhost","root","","pfe_db");
?>
	<!-- Begin Content -->
		<img src="style/images/background/enseignantimg.png" id=heroimg>
	<!-- End Content -->
	    <?php 
    $qury11="select * from enseignant where id_ens = '".$_COOKIE['enseignant']."'" ;
    $result11 = mysqli_query($con,$qury11); 
    $row11 = mysqli_fetch_assoc($result11);
    ?>
	<h1 style="color: white;size: 50px;margin-left: 550px;margin-top: 600px;position: absolute;background-color: gray;padding: 30px;border-radius: 10px;box-shadow: 0px 2px 5px black;">Bonjour dans La platforme de GESTABSENCE M. <?php echo $row11['nom_ens']." ".$row11['prenom_ens']; ?></h1>
	<!-- Begin Content -->
	<!-- End Content -->
	

</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>

