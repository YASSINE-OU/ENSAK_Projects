<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Acceuil_Etudiant</title>
<link rel="shortcut icon" type="image/x-icon" href="#" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
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
</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		  <a href="Acceuil_Etudiant.php" ><img style="width: 200px;margin-top: 70px;margin-left: 25px;" src="style/images/logo/1.png"></a>
		 
	<div class="search">    
      <form class="searchform" method="get">
          <input type="text" id="s" name="s" value ="Recherche" />
      </form>
    </div>
    <!--<img src="style/images/icons/search.png" id="iconsearch">-->
    
    <!-- Begin Menu -->
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="Acceuil_Etudiant.php" class="active"><img src="style/images/icons/home.png" id="icons">Accueil</a>
          
        <li><a href="suivre_absence_etudiant.php"><img src="style/images/icons/calendar.png" id="icons">Absence</a>
        </li>
		<li><a href="modifier_etudiant.php"><img src="style/images/icons/information.png" id="icons">Compte</a></li>
        <li><a href="contact_etudiant.php"><img src="style/images/icons/email.png" id="icons">Contacter</a>
        </li>
        <li><a href="A_propos_etudiant.php"><img src="style/images/icons/information.png" id="icons">A propos</a></li>
      </ul>
    </div>
    <!-- End Menu -->
    <a href="Authentification.php"><img src="style/images/background/small-button-hi.png" id="buttonimg">
    <h1 id="typename1">E t u d i a n t</h1>
   <img src="style/images/icons/power-button.png" id="typelog1"></a>
    
	</div>
	<!-- End Sidebar -->
	<?php 
$con=mysqli_connect("localhost","root","","pfe_db");
?>
	<!-- Begin Content -->
	<img  src="style/images/background/etudiantimg.png" id=heroimg>
	<!-- End Content -->
	    <?php 
    $qury11="select * from etudiant where id_etud = '".$_COOKIE['etudiant']."'" ;
    $result11 = mysqli_query($con,$qury11); 
    $row11 = mysqli_fetch_assoc($result11);
    ?>
	<h1 style="color: white;size: 50px;margin-left: 550px;margin-top: 600px;position: absolute;background-color: gray;padding: 30px;border-radius: 10px;box-shadow: 0px 2px 5px black;">Bonjour dans La platforme de GESTABSENCE M. <?php echo $row11['nom_etud']." ".$row11['prenom_etud']; ?></h1>
</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
<?php mysqli_close($con); ?>
</body>
</html>

