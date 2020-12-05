<?php

session_start();

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Gestion_filières</title>
<link rel="shortcut icon" type="image/x-icon" href="#" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" href="style/css/input_style.css">
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
     <a href="Acceuil_Admin.php" ><img style="width: 200px;margin-top: 70px;margin-left: 25px;" src="style/images/logo/1.png"></a>
     
  <div class="search">    
      <form class="searchform" method="get">
          <input type="text" id="s" name="s" value="Recherche" />
      </form>
    </div>

    <!-- Begin Menu -->
<div id="menu" class="menu-v">
      <ul>
        <li><a href="Acceuil_Admin.php" class="active"><img src="style/images/icons/home.png" id="icons">Accueil</a>
          
        <li><a href="#"><img src="style/images/icons/calendar.png" id="icons">Absence</a>
        <ul>
            <li><a href="suivre_absence_admin.php">Suivre l'absence</a></li>
            <li><a href="gestion_convocation.php">Gestion des convocations</a></li>
            
          </ul>
        </li>
        <li><a href="#"><img src="style/images/icons/flash.png" id="icons">Options</a>
          <ul>
            <li><a href="gestion_filieres.php">Gestion des Filières</a></li>
            <li><a href="gestion_enseignants.php">Gestion des Enseignants</a></li>
            <li><a href="gestion_etudiants.php">Gestion des Etudiants</a></li>
          </ul>
        </li>
    <li><a href="modifier_admin.php"><img src="style/images/icons/user.png" id="icons">Compte</a></li>
        <li><a href="contact_admin.php"><img src="style/images/icons/email.png" id="icons">Contacter</a>
        </li>
        <li><a href="A_propos_admin.php"><img src="style/images/icons/information.png" id="icons">A propos</a></li>
      </ul>
    </div>
    <!-- End Menu -->
    <a href="Authentification.php"><img src="style/images/background/small-button-hi.png" id="buttonimg">
    <h1 id="typename1">Administrateur</h1>
   <img src="style/images/icons/power-button.png" id="typelog1"></a>
    
  </div>
  <!-- End Sidebar -->
  
  <!-- Begin Content -->
  <div style="display: flex;position: absolute;margin-top: 0px;margin-left: 300px;">

  <section style="width: 220px;margin-left:  -18px;margin-right: 30px; height: 783px;"> 
  <form method="POST" >
  <ul style="list-style: none;">
    <br><br><br><br><br><br><br><br>
    <li><button id="cta" style="width: 150px"; name="add">Ajouter Filières</button></li><br><br><br><br><br><br><br><br>
    <li><button id="cta" style="width: 150px"; name="delete">Supprimer Filières</button></li><br><br><br><br><br><br><br><br>
    <li><button id="cta" style="width: 150px"; name="update">Modifier Filières</button></li><br><br><br><br><br><br>
  </ul>
  </form>
  </section>
  
  <section style="width: 900px;height: 783px;">
  <?php
  $con=mysqli_connect("localhost","root","","pfe_db");  
    if (isset($_POST["add"]) || isset($_POST["entrer"]) || isset($_POST['ajouter'])) {
      ?>
      <form style="background-color: #045c7c;box-shadow: 0px 0px 2px black;color: white; margin-top: 10px;margin-left: 120px;margin-right: 200px;text-align: center;border-top-left-radius: 7px;border-top-right-radius: 7px;" method="POST">
       <br><h3 style="font-family: Bree Serif;color: white;">Nouveau Filière</h3>
        Nom de filières :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nomfilier" value="<?php if(isset($_POST['nomfilier'])){ echo $_POST['nomfilier'];} ?>"><br><br>
        Chef de filières :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cheffilier" value="<?php if(isset($_POST['cheffilier'])){ echo $_POST['cheffilier'];} ?>"><br><br>
        Nombre des niveaux :&nbsp&nbsp&nbsp<input type="text" name="nbrniveau" value="<?php if(isset($_POST['nbrniveau'])){ echo $_POST['nbrniveau'];} ?>"><br>
        <br><input type="submit" id="vta" name="entrer" value="Entrer"><br><br>
        </form>
        <form  method="POST">
        <?php  
        if (isset($_POST["entrer"])) {
          $nomfilier=$_POST["nomfilier"];
          
          $_SESSION['nomfilier'] = $_POST['nomfilier'];
          $cheffilier=$_POST["cheffilier"];
          $query="insert into filiere(nom_filiere,chef_filiere) values ('".$nomfilier."','".$cheffilier."')";
          $res_insert=mysqli_query($con,$query);
        /*if ($res_insert) {
          echo "Data inserted<br>";
        }
        else die("Error in query".mysqli_error($con));*/
//write or desplay data from database 
          echo "<br>";?>
          <div style="background-color: #045c7c;box-shadow: 0px 0px 2px black;margin-top: -5px;margin-left: 0px;margin-right: 400px;width:420px;text-align: center;border-top-left-radius: 7px;color: white;border-bottom-left-radius: 7px;">
          <br><h4 style="font-family: Bree Serif;color: white;">Niveau 1er :</h4>
          Nom de Module 1 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S1N1"><br>
          Nom de Module 2 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S1N1"><br>
          Nom de Module 3 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S1N1"><br>
          Nom de Module 4 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S1N1"><br><br>
          Nom de Module 1 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S2N1"><br>
          Nom de Module 2 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S2N1"><br>
          Nom de Module 3 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S2N1"><br>
          Nom de Module 4 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S2N1"><br>
          <br><br>
          </div>
          <div style="background-color: #045c7c;box-shadow: 0px 0px 2px black;margin-top: -266px;margin-left: 428px;margin-right: 90px;width:420px;text-align: center;border-top-right-radius: 7px;color: white;border-bottom-right-radius: 7px;">
          <br><h4 style="font-family: Bree Serif;color: white;">Niveau 2éme :</h4>
          Nom de Module 1 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S1N2"><br>
          Nom de Module 2 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S1N2"><br>
          Nom de Module 3 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S1N2"><br>
          Nom de Module 4 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S1N2"><br><br>
          Nom de Module 1 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S2N2"><br>
          Nom de Module 2 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S2N2"><br>
          Nom de Module 3 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S2N2"><br>
          Nom de Module 4 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S2N2"><br>
          <br><br>
          </div>
          <div style="background-color: #045c7c;margin-top: 6px;margin-left: 200px;margin-right: 200px;width:420px;text-align: center;border-bottom-left-radius: 7px;box-shadow: 0px 0px 2px black;color: white;border-bottom-right-radius: 7px;">
          <br><h4 style="font-family: Bree Serif;color: white;">Niveau LP :</h4>
          Nom de Module 1 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S1N3"><br>
          Nom de Module 2 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S1N3"><br>
          Nom de Module 3 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S1N3"><br>
          Nom de Module 4 de Semèstre 1 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S1N3"><br><br>
          Nom de Module 1 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M1S2N3"><br>
          Nom de Module 2 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M2S2N3"><br>
          Nom de Module 3 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M3S2N3"><br>
          Nom de Module 4 de Semèstre 2 :&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="M4S2N3"><br>
        <br><br>
          </div>
        <input style="margin-left: 370px;margin-top: 5px;" id="vta" type="submit" name="ajouter" value="Ajouter">
      <br><br>
      </form>
      
      <?php  
 }


 if (isset($_POST["ajouter"])) {
    
    $qury="select id_filiere from filiere where nom_filiere='".$_SESSION['nomfilier']."'";
    $execute = mysqli_query($con,$qury);
    $row = mysqli_fetch_assoc($execute);
    $query2_1="insert into niveau(type_niveau,id_filiere) values ('1er','".$row['id_filiere']."')";
    $query2_2="insert into niveau(type_niveau,id_filiere) values ('2eme','".$row['id_filiere']."')";
    $query2_3="insert into niveau(type_niveau,id_filiere) values ('LP','".$row['id_filiere']."')";
    $res_insert2_1=mysqli_query($con,$query2_1);
    $res_insert2_2=mysqli_query($con,$query2_2);
    $res_insert2_3=mysqli_query($con,$query2_3);
    if ($res_insert2_1) {
        ?>
        
        <?php
  
    }
    else 
      {
        die("Error in query".mysqli_error($con));
    }
 
  $qury1="select id_niveau from niveau where id_filiere='".$row['id_filiere']."'" ;
  $execute2 = mysqli_query($con,$qury1); 
  while($row2 = mysqli_fetch_assoc($execute2))
  {
    $ids_niveau[] = $row2['id_niveau'];
  }

  $query3_1_1="insert into semestre(nom_semestre,id_niveau) values ('S1','".$ids_niveau[0]."')";
  $query3_1_2="insert into semestre(nom_semestre,id_niveau) values ('S2','".$ids_niveau[0]."')";
  
  
  $query3_2_1="insert into semestre(nom_semestre,id_niveau) values ('S1','".$ids_niveau[1]."')";
  $query3_2_2="insert into semestre(nom_semestre,id_niveau) values ('S2','".$ids_niveau[1]."')";

  $query3_3_1="insert into semestre(nom_semestre,id_niveau) values ('S1','".$ids_niveau[2]."')";
  $query3_3_2="insert into semestre(nom_semestre,id_niveau) values ('S2','".$ids_niveau[2]."')";

$res_insert3_1_1=mysqli_query($con,$query3_1_1);
$res_insert3_1_2=mysqli_query($con,$query3_1_2);

$res_insert3_2_1=mysqli_query($con,$query3_2_1);
$res_insert3_2_2=mysqli_query($con,$query3_2_2);

$res_insert3_3_1=mysqli_query($con,$query3_3_1);
$res_insert3_3_2=mysqli_query($con,$query3_3_2);

if ($res_insert3_1_1) {
  ?>

 
  <?php
}
else die("Error in query".mysqli_error($con));
 

    $_SESSION['M1S1N1'] = $_POST['M1S1N1'];
    $_SESSION['M2S1N1'] = $_POST['M2S1N1'];
    $_SESSION['M3S1N1'] = $_POST['M3S1N1'];
    $_SESSION['M4S1N1'] = $_POST['M4S1N1'];

    $_SESSION['M1S2N1'] = $_POST['M1S2N1'];
    $_SESSION['M2S2N1'] = $_POST['M2S2N1'];
    $_SESSION['M3S2N1'] = $_POST['M3S2N1'];
    $_SESSION['M4S2N1'] = $_POST['M4S2N1'];


    $_SESSION['M1S1N2'] = $_POST['M1S1N2'];
    $_SESSION['M2S1N2'] = $_POST['M2S1N2'];
    $_SESSION['M3S1N2'] = $_POST['M3S1N2'];
    $_SESSION['M4S1N2'] = $_POST['M4S1N2'];

    $_SESSION['M1S2N2'] = $_POST['M1S2N2'];
    $_SESSION['M2S2N2'] = $_POST['M2S2N2'];
    $_SESSION['M3S2N2'] = $_POST['M3S2N2'];
    $_SESSION['M4S2N2'] = $_POST['M4S2N2'];


    $_SESSION['M1S1N3'] = $_POST['M1S1N3'];
    $_SESSION['M2S1N3'] = $_POST['M2S1N3'];
    $_SESSION['M3S1N3'] = $_POST['M3S1N3'];
    $_SESSION['M4S1N3'] = $_POST['M4S1N3'];

    $_SESSION['M1S2N3'] = $_POST['M1S2N3'];
    $_SESSION['M2S2N3'] = $_POST['M2S2N3'];
    $_SESSION['M3S2N3'] = $_POST['M3S2N3'];
    $_SESSION['M4S2N3'] = $_POST['M4S2N3'];

    for($i=0;$i<count($ids_niveau);$i++)
    {
    $qury2="select id_semestre from semestre where id_niveau='".$ids_niveau[$i]."'" ;
    $execute3 = mysqli_query($con,$qury2);
    while($row3 = mysqli_fetch_assoc($execute3))
    {
      $ids_semestre[] = $row3['id_semestre'];
    }
    }
    for($i=0;$i<count($ids_semestre);$i++)
    {
     // echo $ids_semestre[$i]."<br><br>";
    }

  $query4_1_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S1N1']."','".$ids_semestre[0]."')";
  $query4_1_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S1N1']."','".$ids_semestre[0]."')";
  $query4_1_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S1N1']."','".$ids_semestre[0]."')";
  $query4_1_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S1N1']."','".$ids_semestre[0]."')";

  $query4_2_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S2N1']."','".$ids_semestre[1]."')";
  $query4_2_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S2N1']."','".$ids_semestre[1]."')";
  $query4_2_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S2N1']."','".$ids_semestre[1]."')";
  $query4_2_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S2N1']."','".$ids_semestre[1]."')";

  $query4_3_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S1N2']."','".$ids_semestre[2]."')";
  $query4_3_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S1N2']."','".$ids_semestre[2]."')";
  $query4_3_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S1N2']."','".$ids_semestre[2]."')";
  $query4_3_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S1N2']."','".$ids_semestre[2]."')";
  
  $query4_4_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S2N2']."','".$ids_semestre[3]."')";
  $query4_4_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S2N2']."','".$ids_semestre[3]."')";
  $query4_4_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S2N2']."','".$ids_semestre[3]."')";
  $query4_4_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S2N2']."','".$ids_semestre[3]."')";

  $query4_5_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S1N3']."','".$ids_semestre[4]."')";
  $query4_5_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S1N3']."','".$ids_semestre[4]."')";
  $query4_5_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S1N3']."','".$ids_semestre[4]."')";
  $query4_5_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S1N3']."','".$ids_semestre[4]."')";
  
  $query4_6_1="insert into module(nom_module,id_semestre) values ('".$_SESSION['M1S2N3']."','".$ids_semestre[5]."')";
  $query4_6_2="insert into module(nom_module,id_semestre) values ('".$_SESSION['M2S2N3']."','".$ids_semestre[5]."')";
  $query4_6_3="insert into module(nom_module,id_semestre) values ('".$_SESSION['M3S2N3']."','".$ids_semestre[5]."')";
  $query4_6_4="insert into module(nom_module,id_semestre) values ('".$_SESSION['M4S2N3']."','".$ids_semestre[5]."')";

$res_insert4_1_1=mysqli_query($con,$query4_1_1);
$res_insert4_1_2=mysqli_query($con,$query4_1_2);
$res_insert4_1_3=mysqli_query($con,$query4_1_3);
$res_insert4_1_4=mysqli_query($con,$query4_1_4);

$res_insert4_2_1=mysqli_query($con,$query4_2_1);
$res_insert4_2_2=mysqli_query($con,$query4_2_2);
$res_insert4_2_3=mysqli_query($con,$query4_2_3);
$res_insert4_2_4=mysqli_query($con,$query4_2_4);

$res_insert4_3_1=mysqli_query($con,$query4_3_1);
$res_insert4_3_2=mysqli_query($con,$query4_3_2);
$res_insert4_3_3=mysqli_query($con,$query4_3_3);
$res_insert4_3_4=mysqli_query($con,$query4_3_4);

$res_insert4_4_1=mysqli_query($con,$query4_4_1);
$res_insert4_4_2=mysqli_query($con,$query4_4_2);
$res_insert4_4_3=mysqli_query($con,$query4_4_3);
$res_insert4_4_4=mysqli_query($con,$query4_4_4);

$res_insert4_5_1=mysqli_query($con,$query4_5_1);
$res_insert4_5_2=mysqli_query($con,$query4_5_2);
$res_insert4_5_3=mysqli_query($con,$query4_5_3);
$res_insert4_5_4=mysqli_query($con,$query4_5_4);

$res_insert4_6_1=mysqli_query($con,$query4_6_1);
$res_insert4_6_2=mysqli_query($con,$query4_6_2);
$res_insert4_6_3=mysqli_query($con,$query4_6_3);
$res_insert4_6_4=mysqli_query($con,$query4_6_4);

if ($res_insert4_1_1) {
  ?>

 
  <?php
}
else die("Error in query".mysqli_error($con));


}

}
    if (isset($_POST["delete"])||isset($_POST["supprimer"])) {
      ?>
      <form style="background-color: #045c7c;color: white;box-shadow: 0px 0px 2px black;margin-top: 120px;margin-left: 120px;margin-right: 200px;text-align: center;" method="POST">
     <br>           
    Filière :<select name="lise1" size="1">
    <?php  $qury1="select * from filiere " ;
    $result = mysqli_query($con,$qury1); 
  
       while ($row2 = mysqli_fetch_assoc($result))


     echo '<option>'.$row2["nom_filiere"].'</option>';
   ?>
        </select>
        <br>
 
      <br>
     <input id="vta" type="submit" name="supprimer" value="Supprimer">
      <br><br></form>
      <?php  
      if (isset($_POST["supprimer_filiere"])) {
       $_SESSION["lise1"]=$_POST["lise1"];

      if(!empty($_SESSION['lise1']))
      {
      $qwiry1="select id_filiere from filiere where nom_filiere = '".$_SESSION["lise1"]."'";
      $resolt1= mysqli_query($con,$qwiry1);
      $row1 = mysqli_fetch_assoc($resolt1);
      }
      echo "filiere: ";
      print_r($row1);
      ////////////////////////////////////////////////////////////
      if(!empty($row1['id_filiere']))
      {
      $qwiry2="select id_niveau from niveau where id_filiere = '".$row1['id_filiere']."'";
      $resolt2= mysqli_query($con,$qwiry2);
      if($resolt2)
      {
      while($row2 = mysqli_fetch_assoc($resolt2))
      {
          $niveaux[] = $row2['id_niveau'];
      }
      }
      }
      echo "<br> niveau: ";
      
      if(!empty($niveaux))
      {
      print_r($niveaux);
      }
      ////////////////////////////////////////////////////////////
      if(!empty($niveaux))
      {
      for($i=0;$i<count($niveaux);$i++)
      {
      $qwiry3="select id_semestre from semestre where id_niveau in ('".$niveaux[$i]."' )";
      $resolt3= mysqli_query($con,$qwiry3);
      if($resolt3)
      {
      while($row3 = mysqli_fetch_assoc($resolt3))
      {
        $semestre[] = $row3['id_semestre'];
      }
      }
      }
      }
      echo "<br> semestre:";
      
      if(!empty($semestre))
      {
      print_r($semestre);
      }
      //////////////////////////////////////////////////////////////
      if(!empty($semestre))
      {
      for($i=0;$i<count($semestre);$i++)
      {
      $qwiry4="select id_module from module where id_semestre in ('".$semestre[$i]."')";
      $resolt4= mysqli_query($con,$qwiry4);
      if($resolt4)
      {
      while($row4 = mysqli_fetch_assoc($resolt4))
      {
        $modules[] = $row4['id_module'];
      }
      }}
      }
      echo "<br> module:";
      
      if(!empty($modules))
      {
      print_r($modules);
      }
      //////////////////////////////////////////////////////////////////////
      if(!empty($modules))
      {
      for($i = 0;$i<count($modules);$i++)
      {
      $affecter = "select id_ens from affecter where id_module in ('".$modules[$i]."')";
      $eaffecter = mysqli_query($con,$affecter);
      if($eaffecter)
      {
      while($raffecter = mysqli_fetch_assoc($eaffecter))
      {
        $enseignant[] = $raffecter['id_ens'];
      }
      }
      }
      }
      echo "<br>Affecter:";
      
      if(!empty($enseignant))
      {
      print_r($enseignant);
      }
      /////////////////////////////////////////////////////////////
      if(!empty($modules))
      {
      for($i = 0; $i<count($modules);$i++)
      {
      $qwiry5="select id_etud from etudiant where id_module in ('".$modules[$i]."')";
      $resolt5= mysqli_query($con,$qwiry5);
      if($resolt5)
      {
      while($row5 = mysqli_fetch_assoc($resolt5))
      {
        $etudier[] = $row5['id_etud'];
      }
      }}
      }
      echo "<br>etudier:";
      
      if(!empty($etudier))
      {
      print_r($etudier);
      }
      //////////////////////////////////////////////////////////////
      if(!empty($modules))
      {
      for($i=0 ;$i<count($modules);$i++)
      {
      $qwiry6="select id_seance from seance where id_module = '".$modules[$i]."'";
      $resolt6= mysqli_query($con,$qwiry6);
      if($resolt6)
      {
      while($row6 = mysqli_fetch_assoc($resolt6))
      {
        $seance[] = $row6['id_seance'];
      }
      }}
    }
      echo "<br>seance:";
      
      if(!empty($seance))
      {
      print_r($seance);
      }
      //////////////////////////////////////////////////////////////
      if(!empty($seance))
      {
      for($i = 0; $i<count($seance) ; $i++)
      {
      $qwiry7="select id_absence from etudiant where id_seance = '".$seance[$i]."'";
      $resolt7= mysqli_query($con,$qwiry7);
      if($resolt7) // Garde fou pour tester si il y a des valeurs ou pas
      {
      while($row7 = mysqli_fetch_assoc($resolt7))
      {
        $absence[] = $row7['id_absence'];
      }
      }}
    }
        echo "<br>Absence: ";
       if(!empty($absence)) // garde fou pour savoir si l y a des valeurs ( pour éviter l'erreur sql)
       {
        print_r($absence);
       }
       //////////////////////////////////////////////////////////////
       

       // suppression de l'étudiant qui étudie dans la filière supprimé
       if(!empty($row1['id_filiere']))
       {

       $detudiant = "delete from etudiant where id_filiere ='".$row1['id_filiere']."'";
       $retudiant = mysqli_query($con,$detudiant); 
       }

       //absence
       if(!empty($seance))
       {
       for($i=0; $i<count($seance);$i++)
       {
       $qwiro1="delete from absence where id_seance = '".$seance[$i]."'";
       $reslt1= mysqli_query($con,$qwiro1);
       }
        }
       //affecter
       if(!empty($modules))
       {
       for($i=0;$i<count($modules);$i++)
       {
       $daffecter = "delete from affecter where id_module ='".$modules[$i]."'";
       $resaffecter = mysqli_query($con,$daffecter);
        }
        }
        //enseignant
        if(!empty($enseignant))
        {
        for($i=0;$i<count($enseignant);$i++)
        {
        $denseignant = "delete from enseignant where id_ens ='".$enseignant[$i]."'";
        $resenseignant = mysqli_query($con,$denseignant);
        }
        }
       //etudier
       if(!empty($modules))
      {
       for($i=0;$i<count($modules);$i++)
       {
       $qwiro2="delete from etudier where id_module = '".$modules[$i]."'";
       $reslt2= mysqli_query($con,$qwiro2);
       }
     }
       //seance
      if(!empty($modules))
      {
       for($i=0;$i<count($modules);$i++)
       {
       $qwiro3="delete from seance where id_module = '".$modules[$i]."'";
       $reslt3= mysqli_query($con,$qwiro3);
       }
     }
       //module
        if(!empty($semestre))
        {
       for($i=0;$i<count($semestre);$i++)
       {
       $qwiro4="delete from module where id_semestre = '".$semestre[$i]."'";
       $reslt4= mysqli_query($con,$qwiro4);
       }
        }
       //semestre
       if(!empty($niveaux))
       {
       for($i=0;$i<count($niveaux);$i++)
       {
       $qwiro5="delete from semestre where id_niveau = '".$niveaux[$i]."'";
       $reslt5= mysqli_query($con,$qwiro5);
       }
      }
       //niveau
       if(!empty($row1['id_filiere']))
       {

       $qwiro6= "delete from niveau where id_filiere = '".$row1['id_filiere']."'";
       $reslt6 = mysqli_query($con,$qwiro6);
        }

       //filiere
       if(!empty($_SESSION['lise1']))
       {
       $qwiro7="delete from filiere where nom_filiere = '".$_SESSION["lise1"]."'";
       $reslt7= mysqli_query($con,$qwiro7);
       }
       
        if($retudiant)
        {
          ?>
            
          <?php
        }
  
        if(isset($reslt1))
        {
          if($reslt1)
          {
          ?>
            
          <?php
        }}

        if(isset($resaffecter))
        {
          if($resaffecter)
          {
          ?>
          
          <?php
        }}

        if(isset($resenseignant))
        {
          if($resenseignant)
          {
          ?>

          

          <?php
        }}

        if(isset($reslt2))
        {
          if($reslt2)
          {
          ?>
           
          <?php
        }}

        if(isset($reslt3))
        {
          if($reslt3)
          {
          ?>
           
          <?php
        }}

        if(isset($reslt4))
        {
          if($reslt4)
          {
          ?>
          
          <?php
        }}

        if(isset($reslt5))
        {
          if($reslt5)
          {
          ?>  
        
          <?php
        }}

        if(isset($reslt6))
        {
          if($reslt6)
          {
          ?>  
      
          <?php
        }}
        if(isset($reslt7))
        {
          if($reslt7)
          {
          ?>  
        
          <?php
        }}
        else
        {
          echo "<br>filiere not deleted ".mysqli_error($con);
        }
  }
       
}






































































































if (isset($_POST["update"]) || isset($_POST["entrer2"]) || isset($_POST['modifier'])) {
      ?>
       <form style="background-color: #045c7c;color: white;margin-top: 120px;box-shadow: 0px 0px 2px black;margin-left: 120px;margin-right: 200px;text-align: center;" method="POST">
          <br>      
        Filière :<select name="lise1" size="1">
<?php  $qury1="select * from filiere " ;
  $result = mysqli_query($con,$qury1); 
  
       while ($row2 = mysqli_fetch_assoc($result))


     echo '<option>'.$row2["nom_filiere"].'</option>';
   ?>
        </select>
        <br><br>
 
      
     <input type="submit" id="vta" name="entrer2" value="Modifier">
     <br><br>
      </form>
        <form style="background-color: red;margin-top: 60px;margin-left: 120px;margin-right: 200px;text-align: center;" method="POST">
        <?php  
        if (isset($_POST["entrer2"])) {

      if(!empty($_SESSION['lise1']))
      {
      $qwiry1="select * from filiere where nom_filiere = '".$_SESSION["lise1"]."'";
      $resolt1= mysqli_query($con,$qwiry1);
      $row1 = mysqli_fetch_assoc($resolt1);
      }
      echo "filiere: ";
      //print_r($row1);
      ////////////////////////////////////////////////////////////
      if(!empty($row1['id_filiere']))
      {
      $qwiry2="select * from niveau where id_filiere = '".$row1['id_filiere']."'";
      $resolt2= mysqli_query($con,$qwiry2);
      if($resolt2)
      {
      while($row2 = mysqli_fetch_assoc($resolt2))
      {
          $niveaux[] = $row2['id_niveau'];
      }
      }
      }
      echo "<br> niveau: ";
      
      if(!empty($niveaux))
      {
      print_r($niveaux);
      }
      ////////////////////////////////////////////////////////////
      if(!empty($niveaux))
      {
      for($i=0;$i<count($niveaux);$i++)
      {
      $qwiry3="select * from semestre where id_niveau in ('".$niveaux[$i]."' )";
      $resolt3= mysqli_query($con,$qwiry3);
      if($resolt3)
      {
      while($row3 = mysqli_fetch_assoc($resolt3))
      {
        $semestre[] = $row3['id_semestre'];
      }
      }
      }
      }
      echo "<br> semestre:";
      
      if(!empty($semestre))
      {
      print_r($semestre);
      }
      //////////////////////////////////////////////////////////////
      if(!empty($semestre))
      {
      for($i=0;$i<count($semestre);$i++)
      {
      $qwiry4="select * from module where id_semestre in ('".$semestre[$i]."')";
      $resolt4= mysqli_query($con,$qwiry4);
      if($resolt4)
      {
      while($row4 = mysqli_fetch_assoc($resolt4))
      {
        $modules[] = $row4['id_module'];
      }
      }}
      }
      echo "<br> module:";
      
      if(!empty($modules))
      {
      print_r($modules);
      }
      
          echo "<br>";?>
          Niveaux 1er :<br>
          Nom de Module 1 :de Semèstre 1 <input type="text" name="M1S1N1" value=""><br>
          Nom de Module 2 :de Semèstre 1 <input type="text" name="M2S1N1" value=""><br>
          Nom de Module 3 :de Semèstre 1 <input type="text" name="M3S1N1"><br>
          Nom de Module 4 :de Semèstre 1 <input type="text" name="M4S1N1"><br><br>
          Nom de Module 1 :de Semèstre 2 <input type="text" name="M1S2N1"><br>
          Nom de Module 2 :de Semèstre 2 <input type="text" name="M2S2N1"><br>
          Nom de Module 3 :de Semèstre 2 <input type="text" name="M3S2N1"><br>
          Nom de Module 4 :de Semèstre 2 <input type="text" name="M4S2N1"><br>

          Niveaux 2éme :<br>
          Nom de Module 1 :de Semèstre 1 <input type="text" name="M1S1N2"><br>
          Nom de Module 2 :de Semèstre 1 <input type="text" name="M2S1N2"><br>
          Nom de Module 3 :de Semèstre 1 <input type="text" name="M3S1N2"><br>
          Nom de Module 4 :de Semèstre 1 <input type="text" name="M4S1N2"><br><br>
          Nom de Module 1 :de Semèstre 2 <input type="text" name="M1S2N2"><br>
          Nom de Module 2 :de Semèstre 2 <input type="text" name="M2S2N2"><br>
          Nom de Module 3 :de Semèstre 2 <input type="text" name="M3S2N2"><br>
          Nom de Module 4 :de Semèstre 2 <input type="text" name="M4S2N2"><br>

          Niveaux LP :<br>
          Nom de Module 1 :de Semèstre 1 <input type="text" name="M1S1N3"><br>
          Nom de Module 2 :de Semèstre 1 <input type="text" name="M2S1N3"><br>
          Nom de Module 3 :de Semèstre 1 <input type="text" name="M3S1N3"><br>
          Nom de Module 4 :de Semèstre 1 <input type="text" name="M4S1N3"><br><br>
          Nom de Module 1 :de Semèstre 2 <input type="text" name="M1S2N3"><br>
          Nom de Module 2 :de Semèstre 2 <input type="text" name="M2S2N3"><br>
          Nom de Module 3 :de Semèstre 2 <input type="text" name="M3S2N3"><br>
          Nom de Module 4 :de Semèstre 2 <input type="text" name="M4S2N3"><br>


        <input type="submit" name="modifier" value="Modifier">
      </form>
      
      <?php  


 if (isset($_POST["modifier"])) {
    
   ?>

  

  <?php
}
else die("Error in query".mysqli_error($con));
 

    $_SESSION['M1S1N1'] = $_POST['M1S1N1'];
    $_SESSION['M2S1N1'] = $_POST['M2S1N1'];
    $_SESSION['M3S1N1'] = $_POST['M3S1N1'];
    $_SESSION['M4S1N1'] = $_POST['M4S1N1'];

    $_SESSION['M1S2N1'] = $_POST['M1S2N1'];
    $_SESSION['M2S2N1'] = $_POST['M2S2N1'];
    $_SESSION['M3S2N1'] = $_POST['M3S2N1'];
    $_SESSION['M4S2N1'] = $_POST['M4S2N1'];


    $_SESSION['M1S1N2'] = $_POST['M1S1N2'];
    $_SESSION['M2S1N2'] = $_POST['M2S1N2'];
    $_SESSION['M3S1N2'] = $_POST['M3S1N2'];
    $_SESSION['M4S1N2'] = $_POST['M4S1N2'];

    $_SESSION['M1S2N2'] = $_POST['M1S2N2'];
    $_SESSION['M2S2N2'] = $_POST['M2S2N2'];
    $_SESSION['M3S2N2'] = $_POST['M3S2N2'];
    $_SESSION['M4S2N2'] = $_POST['M4S2N2'];


    $_SESSION['M1S1N3'] = $_POST['M1S1N3'];
    $_SESSION['M2S1N3'] = $_POST['M2S1N3'];
    $_SESSION['M3S1N3'] = $_POST['M3S1N3'];
    $_SESSION['M4S1N3'] = $_POST['M4S1N3'];

    $_SESSION['M1S2N3'] = $_POST['M1S2N3'];
    $_SESSION['M2S2N3'] = $_POST['M2S2N3'];
    $_SESSION['M3S2N3'] = $_POST['M3S2N3'];
    $_SESSION['M4S2N3'] = $_POST['M4S2N3'];

  $query4_1_1="update module set nom_module ='".$_SESSION['M1S1N1']."')";
  $query4_1_2="update module set nom_module ='".$_SESSION['M2S1N1']."')";
  $query4_1_3="update module set nom_module ='".$_SESSION['M3S1N1']."')";
  $query4_1_4="update module set nom_module ='".$_SESSION['M4S1N1']."')";

  $query4_2_1="update module set nom_module ='".$_SESSION['M1S2N1']."')";
  $query4_2_2="update module set nom_module ='".$_SESSION['M2S2N1']."')";
  $query4_2_3="update module set nom_module ='".$_SESSION['M3S2N1']."')";
  $query4_2_4="update module set nom_module ='".$_SESSION['M4S2N1']."')";

  $query4_3_1="update module set nom_module ='".$_SESSION['M1S1N2']."')";
  $query4_3_2="update module set nom_module ='".$_SESSION['M2S1N2']."')";
  $query4_3_3="update module set nom_module ='".$_SESSION['M3S1N2']."')";
  $query4_3_4="update module set nom_module ='".$_SESSION['M4S1N2']."')";
  
  $query4_4_1="update module set nom_module ='".$_SESSION['M1S2N2']."')";
  $query4_4_2="update module set nom_module ='".$_SESSION['M2S2N2']."')";
  $query4_4_3="update module set nom_module ='".$_SESSION['M3S2N2']."')";
  $query4_4_4="update module set nom_module ='".$_SESSION['M4S2N2']."')";

  $query4_5_1="update module set nom_module ='".$_SESSION['M1S1N3']."')";
  $query4_5_2="update module set nom_module ='".$_SESSION['M2S1N3']."')";
  $query4_5_3="update module set nom_module ='".$_SESSION['M3S1N3']."')";
  $query4_5_4="update module set nom_module ='".$_SESSION['M4S1N3']."')";

  $query4_6_1="update module set nom_module ='".$_SESSION['M1S2N3']."')";
  $query4_6_2="update module set nom_module ='".$_SESSION['M2S2N3']."')";
  $query4_6_3="update module set nom_module ='".$_SESSION['M3S2N3']."')";
  $query4_6_4="update module set nom_module ='".$_SESSION['M4S2N3']."')";

$res_insert4_1_1=mysqli_query($con,$query4_1_1);
$res_insert4_1_2=mysqli_query($con,$query4_1_2);
$res_insert4_1_3=mysqli_query($con,$query4_1_3);
$res_insert4_1_4=mysqli_query($con,$query4_1_4);

$res_insert4_2_1=mysqli_query($con,$query4_2_1);
$res_insert4_2_2=mysqli_query($con,$query4_2_2);
$res_insert4_2_3=mysqli_query($con,$query4_2_3);
$res_insert4_2_4=mysqli_query($con,$query4_2_4);

$res_insert4_3_1=mysqli_query($con,$query4_3_1);
$res_insert4_3_2=mysqli_query($con,$query4_3_2);
$res_insert4_3_3=mysqli_query($con,$query4_3_3);
$res_insert4_3_4=mysqli_query($con,$query4_3_4);

$res_insert4_4_1=mysqli_query($con,$query4_4_1);
$res_insert4_4_2=mysqli_query($con,$query4_4_2);
$res_insert4_4_3=mysqli_query($con,$query4_4_3);
$res_insert4_4_4=mysqli_query($con,$query4_4_4);

$res_insert4_5_1=mysqli_query($con,$query4_5_1);
$res_insert4_5_2=mysqli_query($con,$query4_5_2);
$res_insert4_5_3=mysqli_query($con,$query4_5_3);
$res_insert4_5_4=mysqli_query($con,$query4_5_4);

$res_insert4_6_1=mysqli_query($con,$query4_6_1);
$res_insert4_6_2=mysqli_query($con,$query4_6_2);
$res_insert4_6_3=mysqli_query($con,$query4_6_3);
$res_insert4_6_4=mysqli_query($con,$query4_6_4);

if ($res_insert4_1_1) {
  ?>

 

  <?php
}
else die("Error in query".mysqli_error($con));


}

}










































 
  mysqli_close($con);
  ?> 
  </section>
    
  </div>
  <img src="style/images/background/schooladmin3.png" id=heroimg>
  
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