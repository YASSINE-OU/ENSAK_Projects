<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>gestion_absence</title>
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
</head>
<body>
<?php $con=mysqli_connect("localhost","root","","pfe_db"); ?>
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
  
  <!-- Begin Content -->
   <div style="display: flex;position: absolute;margin-top: 0px;margin-left: 300px;">
  <section style="background-color: #596d7f; width: 240px;height: 100%;margin-top: 150px;color: white;box-shadow: 0px 0px 2px black;margin-top: 150px;border-radius: 8px;"> 
  <br><br><br><br><br><br>
  <form method="POST" style="list-style: none;text-align: center;margin-top: -85px;">
    <!--
    Choisir le Niveau :<br><br><select name="lise2" size="1">
        <option>
        <?php
        $con = mysqli_connect("localhost","root","","pfe_db");
        if(isset($_SESSION['lise2']) || isset($_POST['lise2']))
          echo $_POST['lise2'];
        else
          echo "1er";
        ?>

        
        </option>
        <option>
        <?php
        if(isset($_SESSION['lise2']) || isset($_POST['lise2']))
        {
          switch ($_POST['lise2']) {
            case '1er':
              echo "2éme";
              break;
            case '2éme':
              echo "1er";
              break;
            case 'LP':
              echo "1er";
              break;
            default:
              # code...
              break;
          }
        }
        else
          echo "2éme";
        ?>
        </option>
        <option>
        <?php
        if(isset($_SESSION['lise2']) || isset($_POST['lise2']))
        {
          switch ($_POST['lise2']) {
            case '1er':
              echo "LP";
              break;
            case '2éme':
              echo "LP";
              break;
            case 'LP':
              echo "2éme";
            default:
              # code...
              break;
          }
        }
        else
          echo "LP";
        ?>
        </option></select>
        -->
        
    <?php    
        // hna ghadi njbd les id dial les modules li kay9rihom dak lprof
        $query_idmodules = "select * from affecter where id_ens = '".$_COOKIE['enseignant']."'";
        $res_idmodules = mysqli_query($con,$query_idmodules);
        while($rest = mysqli_fetch_assoc($res_idmodules))
        {

          $modules[] = $rest["id_module"];
          
        }
        ?>
        <br><br>
        Choisir le Module :<br><br><select name='lise3' size='1'>
        
        <?php
        
        for($i=0;$i<count($modules);$i++)
        {

          $qury5="select * from module where id_module='".$modules[$i]."'" ;
          $result5 = mysqli_query($con,$qury5);
          
          while($resfinal = mysqli_fetch_assoc($result5))
          {

            $nom_modules[] = $resfinal['nom_module'];

          }
        }
       
          if(isset($_POST['select_seance']) || isset($_POST['bahet']) || isset($_POST['add']) || isset($_POST['delete']) || isset($_POST['update']) || isset($_POST['bahet2']))
            {
              echo "<option>".$_POST['lise3']."</option>";
              
            }
          
          for($i=0;$i<count($nom_modules);$i++)
          {

            if($nom_modules[$i] == $_POST['lise3'])
              continue;
            echo "<option>".$nom_modules[$i]."</option>";
          }
        
        
      session_start();
        ?>
        </select><br><br><input type='submit'  id="vta" style="width: 120px;" name='select_seance' value='Select Seance'><br><br>
    
    <?php
    
    if(isset($_POST['select_seance']) || isset($_POST['bahet']) || isset($_POST['add']) || isset($_POST['delete']) || isset($_POST['update']))
    {
      if(isset($_POST['select_seance']))
      {
      $_SESSION['chosenmodule'] = $_POST['lise3'];
      }
      $getid = "select id_module from module where nom_module='".$_SESSION['chosenmodule']."'";
      $resgetid = mysqli_query($con,$getid);
      $ready = mysqli_fetch_assoc($resgetid);
      
      $_SESSION['id_mod_chosen'] = $ready['id_module'];

      $qury6="select * from seance where id_module='".$_SESSION['id_mod_chosen']."'" ;
      $result6 = mysqli_query($con,$qury6);
      while($row6 = mysqli_fetch_assoc($result6))
      {
        $seances[] = $row6['id_seance'];
        $seancesnom[] = $row6['nom_seance'];
      } 
      
      ?>
     Choiser la Séance :<br><br><select name="lise4" size="1">
     <?php
     
     if(isset($_POST['select_seance']) || isset($_POST['bahet']) || isset($_POST['add']) || isset($_POST['delete']) || isset($_POST['update']))
            {
              echo "<option>".$_POST['lise4']."</option>";
              
            }
     for($i=0;$i<count($seances);$i++)
     {

      if($seancesnom[$i] == $_POST['lise4'])
        continue;
      echo "<option>".$seancesnom[$i]."</option>";
     }
     /* ##########################################################################" WARNING activi lcode bach trecuperer id seance"
     for($i=0;$i<count($seances);$i++)
     {
      echo "<input type='text' name='id_sean$i' style='background:none;border:none;display:none;' value='".$seances[$i]."'>";
     } */
     ?>
     </select>
  
      <?php
    }

    ?>  <br><br><input id="vta" style="margin-bottom: 20px;width: 180px;" type="submit" name="bahet" value="Générer liste d'etudiant">
  </section>



  <section style="margin-left: 45px;width: 820px;height: 783px;">
  <h1 style="text-align: center;color: white ;font-size: 35px;font-family: Cabin;margin-bottom: 40px;margin-top: 35px;">Gestion d'absence</h1>
  <?php  
    if (isset($_POST["bahet"]) || isset($_POST['add']) || isset($_POST['delete']) || isset($_POST['update'])) {
      if(isset($_POST['bahet']))
      {
      $_SESSION['chosenseance'] = $_POST['lise4'];
      }
      $qury6="select * from seance where id_module='".$_SESSION['id_mod_chosen']."'" ;
      $result6 = mysqli_query($con,$qury6);
      while($row6 = mysqli_fetch_assoc($result6))
      {
        $seances[] = $row6['id_seance'];
        $seancesnom[] = $row6['nom_seance'];
      }

      for($i=0;$i<count($seances);$i++)
      {
        if(strcmp($_SESSION['chosenseance'],$seancesnom[$i])==0)
        {
          $_SESSION['id_sean_found'] = $seances[$i];
          break;
        }
      }

      
      ?>
  <style type="text/css">table{border-collapse: collapse;width: 100%;color: black;font-family: Century Gothic}td,th{border: 2px black solid;background-color: #00BEFF}</style>
<table style="margin-bottom:-2px;">
  <tr>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 12%">Nom</td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 12%">Prenom</td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 22%">Etat d'absence</td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 12%;border: 2px black solid;">Retard</td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 14%;background-color: transparent;border-color: transparent;"></td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 14%;background-color: transparent;border-color: transparent;"></td>
  <td style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 14%;background-color: transparent;border-color: transparent;"></td>
  </tr>
</table>
  <?php 
  
    $fak = "select * from etudier where id_module='".$_SESSION['id_mod_chosen']."'";
    $execfak = mysqli_query($con,$fak);
    while($resfak = mysqli_fetch_assoc($execfak))
    {
      
      $qry3 = "select * from etudiant where id_etud ='".$resfak['id_etud']."'";
    $exec3 = mysqli_query($con,$qry3);
    while ($rowx3=mysqli_fetch_assoc($exec3)) 
    {
 

?>  
<table style="margin-bottom:-2px;">
  <tr>
    <?php
        echo "<input type='text' name='id_etudiant' style='background:none;border:none;display:none;' value='".$rowx3['id_etud']."'>";
        
    ?>
    <td style="width: 12%"><?php echo $rowx3['nom_etud']; ?></td>
    <td style="width: 12%"><?php echo $rowx3['prenom_etud']; ?></td>
    <td style="width: 22%">Absent<input type="radio" name="rad" value="Absente">
     &nbsp; Présent<input type="radio" name="rad" value="Present" >
    <br><br></td>
    <td style="width: 12%">Oui<input type="radio" name="rad2" value="Oui"><br>
     Non<input type="radio" name="rad2" value="Non">
    <br><br></td>
    <td style="width: 14%;text-align: center;"><input type="submit" name="add" value="Ajouter"></td>
    <td style="width: 14%;text-align: center;"><input type="submit" name="delete" value="Supprimer"></td>
    <td style="width: 14%;border: 2px black solid;text-align: center;"><input type="submit" name="update" value="Modifier"></td>
  </tr>

</table>
<?php
      }
      }
    }
  


if(isset($_POST['add']))
  {
    
    $addquery = "INSERT INTO absence VALUES('','".$_SESSION['id_sean_found']."','".$_POST['id_etudiant']."','".$_POST['rad2']."');";
    $execadd = mysqli_query($con,$addquery);

    //echo "<script>alert('".$execadd."');</script>";

  }
if(isset($_POST['delete']))
  {
    

    $deletequery = "DELETE FROM absence WHERE id_seance = '".$_SESSION['id_sean_found']."' and id_etud ='".$_POST['id_etudiant']."'";
    $execdelete = mysqli_query($con,$deletequery);

    //echo "<script>alert('".$execdelete."');</script>";

  }
if(isset($_POST['update']))
  {
   


    $updatequery = "UPDATE absence SET justifiee = '".$_POST['rad']."' , retard = '".$_POST['rad2']."' WHERE id_seance = '".$_SESSION['id_sean_found']."' and id_etud ='".$_POST['id_etudiant']."'";
    $execupdate = mysqli_query($con,$updatequery);

    //echo "<script>alert('".$execupdate."');</script>";

  }

mysqli_close($con);


?>
  </form>

  </section>
    
  </div>

  <img src="style/images/background/ebc.png" id=heroimg>
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