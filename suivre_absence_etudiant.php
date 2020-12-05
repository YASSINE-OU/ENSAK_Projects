<?php

session_start();

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>suivre_absence_etudiant</title>
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
    
    $con=mysqli_connect("localhost","root","","pfe_db"); ?>
  
  <div style="display: flex;position: absolute;margin-top: 0px;margin-left: 300px;">
  <section style="background-color: #596d7f; width: 240px;height: 100%;margin-top: 150px;color: white;box-shadow: 0px 0px 2px black;border-radius: 8px;"> 
  <br><br><br><br><br><br>
  <form method="POST" style="list-style: none;text-align: center;margin-top: -60px;">


    <?php 


    //$koky="select * from etudiant where id_etud = 1" ;

    $qury11="select * from etudiant where id_etud = '".$_COOKIE['etudiant']."'" ;
    $result11 = mysqli_query($con,$qury11); 
    $row11 = mysqli_fetch_assoc($result11);

    $qury22="select * from etudier where id_etud='".$row11['id_etud']."'" ;
    $result22 = mysqli_query($con,$qury22);
    $row22 = mysqli_fetch_assoc($result22);

    $qury33="select * from module where id_module='".$row22['id_module']."'" ;
    $result33 = mysqli_query($con,$qury33);
    $row33 = mysqli_fetch_assoc($result33);

    $qury44="select * from semestre where id_semestre='".$row33['id_semestre']."'" ;
    $result44 = mysqli_query($con,$qury44);
    $row44 = mysqli_fetch_assoc($result44);

    $qury55="select * from niveau where id_niveau='".$row44['id_niveau']."'" ;
    $result55 = mysqli_query($con,$qury55);
    $row55 = mysqli_fetch_assoc($result55);

?>
    Votre filière est :<br><br><select name="lise1" size="1">
    <?php  $qury1="select * from filiere where id_filiere='".$row55['id_filiere']."'" ;
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
        Votre niveau :<br><br><select name="lise2" size="1">
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
        
        </select><br><br><input type="submit" id="vta" style="width: 120px;" name="select_module" value="Select Module">
        


        

  
    
        



     
    
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
        }echo"<br>";
        }
        
    }
  ?>  <br><br></select><input  id="vta" style="width: 180px;margin-bottom: 20px; margin-top: 15px;" type="submit" name="bahet" value="Générer liste d'absence"><br><br>
  <input  id="vta" style="width: 180px;margin-bottom: 20px; margin-top: 15px;" type="submit" name="bahet2" value="Générer liste des retard">
    <?php 
    

?>
      </form>
      </section>












  <?php
      
  ?>
  <section style="margin-left: 45px;width: 820px;height: 783px;">
  <?php  
      global $fuck;
  
    if (isset($_POST["bahet"]) || isset($_POST['aj'])) {
        if(isset($_POST['bahet']))
        {
        $fuck= $_POST['lise3'];
        $_SESSION['lise3'] = $_POST['lise3'];
        }
      ?>

  <?php
  ?>
  <h1 style="text-align: center;color: white ;font-size: 35px;font-family: Cabin;margin-bottom: 40px;margin-top: 35px;">Suivre Absence</h1>
  <style type="text/css">table{border-collapse: collapse;width: 100%;color: black;font-family: Century Gothic}td,th{border: 2px black solid;background-color: #00BEFF}</style>
<table style="margin-bottom:-2px";>
  <tr>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 12%">Séance</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 18%">Heure de debut</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 16%">Heure de fin</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 20%">Module</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 34%;border: 2px black solid;"">Justification</th>
  </tr>
</table>

<?php
      $i = 1;
      $_SESSION['kaka'] = $GLOBALS['fuck'];

      $modquery = "select * from module where nom_module='".$GLOBALS['fuck']."'";
      $modres = mysqli_query($con,$modquery);
      $id_module = mysqli_fetch_assoc($modres);
      
      $seancequery="select * from seance where id_module='".$id_module['id_module']."'" ;
      $seanceres = mysqli_query($con,$seancequery);
      while($seancerow = mysqli_fetch_assoc($seanceres))
      {
        $absquery="select * from absence where id_seance ='".$seancerow['id_seance']."'";
        $absres=mysqli_query($con,$absquery);
 while ($absrow=mysqli_fetch_assoc($absres)) 
 {
        $fucktwo[] = $absrow['id_absence'];
        
?>
  <form method="POST" enctype="multipart/form-data">
  <table style="margin-bottom:-2px; ">
  <tr>
    <td style="width: 12%"><?php echo $i;?></td>
    <td style="width: 18%"><?php echo $seancerow["heure_debut"];?></td>
    <td style="width: 16%"><?php echo $seancerow["heure_fin"];?></td>
    <td style="width: 20%"><input type='text' name='module_name' style='background: none;border: none' value='<?php echo $id_module["nom_module"];?>'></td>
    <td style="width: 34%;border: 2px black solid"><input  type="file" name="doc" /><input type="submit" name="import" class="btn btn-info" value="Import" /></td>
  </tr>
</table>

</form>
                <?php    

   $i++; 
}
}?>
<div style="background-color: white;opacity: 0.5;width: 218px;text-align: center;margin-left: -282px;padding: 10px;margin-top: 330px;color: white;border-radius: 10px;"><h2>Notification</h2>
<h4><?php echo $row11["convocation"]; ?></h4>
</div>
<?php


if (isset($_POST['aj'])){
      
      $modquery = "select * from module where nom_module='".$_POST['module_name']."'";
      $modres = mysqli_query($con,$modquery);
      $id_module = mysqli_fetch_assoc($modres);
      
      $seancequery="select * from seance where id_module='".$id_module['id_module']."'" ;
      $seanceres = mysqli_query($con,$seancequery);
      while($seancerow = mysqli_fetch_assoc($seanceres))
      {
        $absquery="select * from absence where id_seance ='".$seancerow['id_seance']."'";
        $absres=mysqli_query($con,$absquery);
 while ($absrow=mysqli_fetch_assoc($absres)) 
 {
        $fucktwo[] = $absrow['id_absence'];
}

}
   
  for($i=0;$i<count($fucktwo);$i++)
  {

   if($i == $_POST['id_tracker'])
    {
      $id_found = $fucktwo[$i];
    }
  }
  $qoquery="update absence set justifiee ='".$_POST['txtjustf']."' where id_absence = '".$id_found."'";
  $qores = mysqli_query($con,$qoquery);
        } 

  }
  if(isset($_POST["import"])){
      echo "<script>alert('".$_POST['module_name']."');</script>";
      $modquery = "select * from module where nom_module='".$_POST['module_name']."'";
      $modres = mysqli_query($con,$modquery);
      $id_module = mysqli_fetch_assoc($modres);
      
      $seancequery="select * from seance where id_module='".$id_module['id_module']."'" ;
      $seanceres = mysqli_query($con,$seancequery);
      while($seancerow = mysqli_fetch_assoc($seanceres))
      {
        $absquery="select * from absence where id_seance ='".$seancerow['id_seance']."'";
        $absres=mysqli_query($con,$absquery);
 while ($absrow=mysqli_fetch_assoc($absres)) 
 {
        $fucktwo = $absrow['id_absence'];
}

}
   
 
  
       $name=$_FILES['doc']['name'];
   $tmp=$_FILES['doc']['tmp_name'];
      
      
      $dbh=new PDO("mysql:host=localhost;dbname=pfe_db","root","");
      $sql="update absence set justifiee ='".$name."' where id_absence = '".$fucktwo."'";
      //  Prepare statement
              $stmt = $dbh->prepare($sql);
        //      execute the query
            if( $stmt->execute())
            {echo "aaa";
          $sth =$dbh->query("SELECT justifiee FROM absence WHERE id_absence = '".$fucktwo."'");
      
      $resultat=$sth->fetch(PDO::FETCH_ASSOC);
      foreach($resultat as $row)
        $jus=$row;
        
      $fil=$jus;
        
     $name=$_FILES['doc']['name'];
   $tmp=$_FILES['doc']['tmp_name'];

if(move_uploaded_file($tmp,$name))
    {
      $file='informatique.txt';
    $fp=fopen($file,"a+");
    fputs($fp,$name );
fputs($fp, "\r\n" );      
    fclose($fp);
    
    $fp=fopen('informatique.txt',"r");
    
    $s=fgets($fp,filesize($file));
    echo "           <li><a href=". $s.">".$s."</a><br></li>";  }
    }
    }


    ?> 





















<?php  
    if (isset($_POST["bahet2"]) || isset($_POST['aj'])) {
        if(isset($_POST['bahet2']))
        {
        $fuck= $_POST['lise3'];
        $_SESSION['lise3'] = $_POST['lise3'];
        }
      ?>

  <?php
  ?>
  <h1 style="text-align: center;color: white ;font-size: 35px;font-family: Cabin;margin-bottom: 40px;margin-top: 35px;">Suivre Retard</h1>
  <style type="text/css">table{border-collapse: collapse;width: 100%;color: black;font-family: Century Gothic}td,th{border: 2px black solid;background-color: #00BEFF}</style>
<table style="margin-bottom:-2px";>
  <tr>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 10%">Séance</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 18%">Heure de debut</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 15%">Heure de fin</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 20%">Module</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;width: 10%;border: 2px black solid;">Retard</th>
  </tr>
</table>

<?php
      $i = 1;
      $_SESSION['kaka'] = $GLOBALS['fuck'];

      $modquery = "select * from module where nom_module='".$GLOBALS['fuck']."'";
      $modres = mysqli_query($con,$modquery);
      $id_module = mysqli_fetch_assoc($modres);
      
      $seancequery="select * from seance where id_module='".$id_module['id_module']."'" ;
      $seanceres = mysqli_query($con,$seancequery);
      while($seancerow = mysqli_fetch_assoc($seanceres))
      {
        $absquery="select * from absence where id_seance ='".$seancerow['id_seance']."'";
        $absres=mysqli_query($con,$absquery);
 while ($absrow=mysqli_fetch_assoc($absres)) 
      {
        $fucktwo[] = $absrow['id_absence'];
        $retaquery="select * from retard where id_seance ='".$seancerow['id_seance']."'";
        $retares=mysqli_query($con,$retaquery);
 while ($retarow=mysqli_fetch_assoc($retares)) 
 {
        $fucktree[] = $retarow['id_retard'];
        
?>
  <form method="POST">
  <table style="margin-bottom:-2px; ">
  <tr>
    <td style="width: 10%"><?php echo $i;?></td>
    <td style="width: 18%"><?php echo $seancerow["heure_debut"];?></td>
    <td style="width: 15%"><?php echo $seancerow["heure_fin"];?></td>
    <td style="width: 20%"><input type='text' name='module_name' style='background: none;border: none' value='<?php echo $id_module["nom_module"];?>'></td>
    <td style="width: 10%;border: 2px black solid"><?php echo $retarow["retard"];?></td>
  </tr>
</table>

</form>
                <?php    

   $i++; 
}
}
}?>
<div style="background-color: white;opacity: 0.5;width: 218px;text-align: center;margin-left: -282px;padding: 10px;margin-top: 380px;color: white;border-radius: 10px;"><h2>Notification</h2>
<h4><?php echo $row11["convocation"]; ?></h4>
</div>
<?php


if (isset($_POST['aj'])){
      echo "<script>alert('".$_POST['module_name']."');</script>";
      $modquery = "select * from module where nom_module='".$_POST['module_name']."'";
      $modres = mysqli_query($con,$modquery);
      $id_module = mysqli_fetch_assoc($modres);
      
      $seancequery="select * from seance where id_module='".$id_module['id_module']."'" ;
      $seanceres = mysqli_query($con,$seancequery);
      while($seancerow = mysqli_fetch_assoc($seanceres))
      {
        $absquery="select * from absence where id_seance ='".$seancerow['id_seance']."'";
        $absres=mysqli_query($con,$absquery);
 while ($absrow=mysqli_fetch_assoc($absres)) 
 {
        $fucktwo[] = $absrow['id_absence'];
}

}
   
  for($i=0;$i<count($fucktwo);$i++)
  {

   if($i == $_POST['id_tracker'])
    {
      $id_found = $fucktwo[$i];
    }
  }
  $qoquery="update absence set justifiee ='".$_POST['txtjustf']."' where id_absence = '".$id_found."'";
  $qores = mysqli_query($con,$qoquery);
      } 
}


    ?> 







































    
  </section>
    
  </div>
    <?php  mysqli_close($con); 
    session_destroy();
    ?>
	<!-- Begin Content -->
	<img src="style/images/background/23-teaserbild.png" id=heroimg>
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