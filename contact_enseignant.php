<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>contact_Enseignant</title>
<link rel="shortcut icon" type="image/x-icon" href="#" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/css/contact.css" media="all" />
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
    

     <!-- <div id="menu" class="menu-v">
      <ul>
        <li><a href="Acceuil_Enseignant.php" class="active"><img src="style/images/icons/home.png" id="icons">Accueil</a>
          
        <li><a href="#"><img src="style/images/icons/calendar.png" id="icons">Absence</a>
          
        </li>
        <li><a href="contact_Enseignant.php"><img src="style/images/icons/email.png" id="icons">Contacter</a>
        </li>
        <li><a href="A_propos_Enseignant.php"><img src="style/images/icons/information.png" id="icons">A propos</a></li>
      </ul>
    </div> -->
    
        
  



  <!-- End Sidebar -->
  
  <!-- Begin Content -->


<!-- contact -->
      <img src="style/images/background/bg_contacts2.jpg" id="heroimgcontact">
      
 
  <form id="contact" action="" method="post">

    <img src="style/images/background/img-01.png" style="margin-left: -370px; margin-top: 65px; position: absolute; width: 250px;">
    <h3 style="text-align: center;margin-top: 20px;">Contacter</h3>
    <br><br><br><br>
    <fieldset>
      <input placeholder="Sujet"  type="text" tabindex="1"  name ="sujet" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address"  type="email"  name ="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...."  tabindex="5" name="msg" required></textarea>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit"  data-submit="...Sending">Submit</button>
    </fieldset>

     <?php
  if (isset($_POST['submit'])) 
  {
    $dbh=new PDO("mysql:host=localhost;dbname=pfe_db","root","");
      $Login = $_SESSION['login'];
      $sth =$dbh->query("SELECT nom_ens FROM enseignant WHERE login_ens='$Login' ");
      
      $resultat=$sth->fetch(PDO::FETCH_ASSOC);
      foreach($resultat as $row)
        $nom=$row;
      $sth =$dbh->query("SELECT prenom_ens FROM enseignant WHERE login_ens='$Login' ");
      
      $resultat=$sth->fetch(PDO::FETCH_ASSOC);
      foreach($resultat as $row)
        $prenom=$row;
    $sujet=$_POST["sujet"];
    $email=$_POST["email"];
    $msg='Nom: '.$nom.' '.$prenom.'
adresse: '.$email.' 
message: '.$_POST["msg"];
    
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
      $mail->addAddress("gestetud18@gmail.com");
      $mail->Subject = $sujet;
      $mail->Body = $msg;
      if ($mail->send())
        echo '<p style="color:green">Votre message est bien envoyé</p>';
      
  }
   ?>
    
  </form>
 

    <!-- contact -->

  <!-- End Content -->

<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="style/js/jquery.corner.js"></script>
<!-- <![endif]-->
</body>
</html>