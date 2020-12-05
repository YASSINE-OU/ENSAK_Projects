<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>gestion_convocation</title>
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
<body style="color: white;">
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



<style type="text/css">#vta{width: 160Px;}</style>










  <?php $con=mysqli_connect("localhost","root","","pfe_db");?>
  
  <div style="display: flex; position: absolute;margin-top: 0px;margin-left: 300px;">
  <section style="background-color: #596d7f; width: 240px;height: 100%;margin-top: 150px;color: white;box-shadow: 0px 0px 2px black;margin-top: 150px;border-radius: 8px;"> 
  <br>
  <form method="POST" style="list-style: none;text-align: center;">
    Choisir la filiére  :<br><br><select name="lise1" size="1">
    <?php  $qury1="select * from filiere " ;
    $result1 = mysqli_query($con,$qury1); 
      
      if(isset($_POST['select_module']) || isset($_POST['select_seance']) || isset($_POST['bahet']))
      {
          echo '<option>'.$_POST['lise1'].'</option>';
      }

       while ($row1 = mysqli_fetch_assoc($result1))
       {

          if(strcmp($_POST['lise1'], $row1['nom_filiere'])==0)
            continue;
          
            echo '<option>'.$row1["nom_filiere"].'</option>';
        }
  ?>
        </select>
        <br><br>

        <?php 



        ?>
        Choisir le Niveau :<br><br><select name="lise2" size="1">
        <option>
        <?php
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
        </option>
      </select><br><br>
        Choiser La Seméstre  :<br><br><select name="listo" size="1" value="">
        <option>
          <?php 
          if(isset($_POST['listo']) || isset($_SESSION['listo']) )
          {
          echo $_POST['listo']; 
          }
          else
            echo "S1";
          ?>
        </option>
        <option>
          <?php
          if(isset($_SESSION['listo']) || isset($_POST['listo']) )
                {
                if($_POST['listo'] === "S1" )
                    echo "S2";
                else
                    echo "S1";
                }
          else
                echo "S2";
          ?>
        </option>
        
        </select><br><br><input id="vta" type="submit" name="select_module" value="Select Module">
        


        

  
    
        



     
    
<?php  

  if(isset($_POST['lise1']) /*|| isset($_POST['N']) || isset($_POST['S']) || isset($_POST['M']) || isset($_POST['SE'])*/)
  {

   $_SESSION["lise1"]=$_POST["lise1"];
    $qury2="select * from filiere where nom_filiere='".$_SESSION["lise1"]."'" ;
    $result2 = mysqli_query($con,$qury2);
    $row2 = mysqli_fetch_assoc($result2);

    // Was missing
    $_SESSION['id_filiere'] = $row2['id_filiere'];
    //echo $row2['nom_filiere'];
    }


    if(isset($_POST['lise2']) /*|| isset($_POST['S']) || isset($_POST['M']) || isset($_POST['SE'])*/)
    {
      $_SESSION["lise2"]=$_POST["lise2"];
      $qury3="select * from niveau where type_niveau='".$_SESSION["lise2"]."' and id_filiere='".$_SESSION["id_filiere"]."'" ;
      $result3 = mysqli_query($con,$qury3);
      $row3 = mysqli_fetch_assoc($result3);
      $_SESSION['id_niveau'] = $row3['id_niveau'];
      //echo $row3['type_niveau'];
    }
  

    if(isset($_POST['select_module']) || isset($_POST['select_seance']) || isset($_POST['bahet']))
    {
      if(isset($_POST['select_module']) && !empty($_POST['listo']) || isset($_POST['select_seance']) || isset($_POST['bahet']))
      {
      $_SESSION["listo"]=$_POST["listo"];
    
      $qury4="select * from semestre where nom_semestre='".$_SESSION["listo"]."' and id_niveau='".$_SESSION["id_niveau"]."'" ;
    
      $result4 = mysqli_query($con,$qury4); 
    
      $row4 = mysqli_fetch_assoc($result4);


      $_SESSION['id_semestre'] = $row4['id_semestre'];
      //echo $row4['id_semestre'];
      

   // $_SESSION["lise3"]=$_POST["lise3"];
   // if(isset($_POST['M'])) we don't need to post Modules  here because we click on semestre and automatically shows up its modules
    
    $qury5="select * from module where id_semestre='".$_SESSION['id_semestre']."'" ;
    $result5 = mysqli_query($con,$qury5);
    while($row5 = mysqli_fetch_assoc($result5))
    {
      $modules[] = $row5['nom_module'];
    }
    }
    ?>
        <br><br>Choisir le Module :<br><br><select name='lise3' size='1'>
        <?php
        if(isset($_POST['select_module']) && !empty($_POST['listo']) || isset($_POST['select_seance']) || isset($_POST['bahet']))
        {

          if(isset($_POST['select_seance']))
            echo "<option>".$_POST['lise3']."</option>";
        for($i=0;$i<count($modules);$i++)
        {
          if($modules[$i] === $_POST['lise3'])
            continue;
          echo "<option>".$modules[$i]."</option>";
        }
        }
        
        ?>
        </select>
        
    <?php
    }
                           
?>  
    <br><br><input id="vta" type="submit" name="bahet" value="Générer liste d'etudiant">
    <br><br>
    <?php 
    session_destroy();

?>
      </form>      
      </section>





<section style="margin-left: 50px;width: 820px;height: 783px;">
<?php  
    if (isset($_POST["bahet"]) || isset($_POST['upd']) || isset($_POST['del'])) {
      ?>
 <style type="text/css">table{border-collapse: collapse;width: 100%;color: black;font-family: Century Gothic}td,th{border: 2px black solid;background-color: #00BEFF}</style>
  <h1 style="text-align: center;color: white ;font-size: 35px;font-family: arial;margin-bottom: 40px;margin-top: 20px;">Gestion des Convocations</h1>
<form method="POST">
<table style="margin-bottom:-2px;">
  <tr>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 16%">Nom</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 16%">Prenom</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 18%">Nombre de fois</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 25%"></th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 25%;border: 2px black solid;"></th>
  </tr>
</table>


<?php 
      if(isset($_POST['bahet']))
      {

      $_SESSION['chosenmodule'] = $_POST['lise3'];
      }
      if(isset($_POST['upd']) || isset($_POST['del']))
      {
        $_SESSION['chosenmodule'] = $_POST['mod'];
      }
      $getid = "select id_module from module where nom_module='".$_SESSION['chosenmodule']."'";
      $resgetid = mysqli_query($con,$getid);
      $ready = mysqli_fetch_assoc($resgetid);


      $getid2 = "select * from etudier where id_module='".$ready['id_module']."'";
      $resgetid2 = mysqli_query($con,$getid2);
      while($ready2 = mysqli_fetch_assoc($resgetid2))
      {
        $etud[] = $ready2['id_etud'];
      }

      for($i=0;$i<count($etud);$i++)
      {

      $getid3 = "select * from etudiant where id_etud='".$etud[$i]."'";
      $resgetid3 = mysqli_query($con,$getid3);
      while($ready3 = mysqli_fetch_assoc($resgetid3))
      {
        $etudiant[] = $ready3['id_etud'];
      }
      }

      $qury6="select * from seance where id_module='".$ready['id_module']."'" ;
      $result6 = mysqli_query($con,$qury6);
      while($row6 = mysqli_fetch_assoc($result6))
      {
          $ids_seance[] = $row6['id_seance'];
      }

      for($i=0;$i<count($etudiant);$i++)
      {
       $abs = 0;
  
      for($j=0;$j<count($ids_seance);$j++)  
      {
        $qury6="select * from absence where id_etud='".$etudiant[$i]."' and id_seance='".$ids_seance[$j]."' " ;
        $result6 = mysqli_query($con,$qury6);
        $row7 = mysqli_fetch_assoc($result6);
        if(!empty($row7['id_absence']))
          {
          $abs++;
          }
      }
      if ($abs == 3 || $abs > 3) {
        echo "<input type='text' style='background:none;border:none;display:none' name='fucking_etud' value='$etudiant[$i]'>";
?>


<table style="margin-bottom:-2px;">
  <tr>
  <td style="width: 16%">
   <?php 

        echo "<input type='text' style='background:none;border:none;display:none' name='mod' value='".$_SESSION['chosenmodule']."'>";
        $find_etud = "select * from etudiant where id_etud='".$etudiant[$i]."'";;
        $exec_find_etud = mysqli_query($con,$find_etud);
        $fetch_find_etud= mysqli_fetch_assoc($exec_find_etud);
        echo $fetch_find_etud['nom_etud'];
   ?>
   </td>
  <td style="width: 16%"><?php echo $fetch_find_etud['prenom_etud']; ?></th>
  <td style="width: 18%"><?php echo $abs ?></th>
  <td style="width: 25%; text-align: center;"><input type="submit" id="vta" name="upd" value="Envoyer Convocation"> </th>
  <td style="width: 25%;border: 2px black solid;text-align: center;"><input type="submit" id="vta" name="del" value="Supprimer Convocation"> </th>
  </tr>
</table>
</form>
<?php 

    
    }
  
}

}
if (isset($_POST['upd'])) {
      $qury6="update etudiant set convocation='"."Tu as une convocation"."' where id_etud='".$_POST['fucking_etud']."'" ;
      $result6 = mysqli_query($con,$qury6);
  }
  if (isset($_POST['del'])) {
      $qury7="update etudiant set convocation='"."Tu as pas de Convocation"."' where id_etud='".$_POST['fucking_etud']."'" ;
      $result7 = mysqli_query($con,$qury7);
  }

?>


  </section>
    
</div>
  <?php mysqli_close($con); ?>
  <!-- Begin Content -->
  <img src="style/images/background/schooladmin2.png" id=heroimg>
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