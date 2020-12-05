<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Gestion_etudiants</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
	<div style="display: flex;position: absolute;margin-top: 0px;margin-left: 300px;">
	<!-- Begin Content -->
    <section style="margin-left: -20px;width: 250px;height: 783px;"> 

  <div   id=lista class="container box" >  
   <form method="post" enctype="multipart/form-data">
    <br>
    <h3 style="color: white" >Imoprter Liste Etudiants </h3>
    <input style="margin-left: 40px;"  type="file" name="excel" />
    <br><br>
    <input type="submit" name="import" id="vta" class="btn btn-info" value="Import" />
  <?php
$connect = mysqli_connect("localhost", "root", "", "pfe_db");
if(isset($_POST["import"]))
{
 $extension = pathinfo($_FILES["excel"]["name"])['extension']; // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
  $cne= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $nom = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
  $prenom = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
  $date= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
  $adress = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $email = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
  $phone = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
  $password = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $login = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
  $convocation= mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $query = "INSERT etudiant(CNE,nom_etud,prenom_etud,date_naiss_etud,adresse_etud,email_etud,phone_etud,password_etud,login_etud,convocation) VALUES ('".$cne."','".$nom."','".$prenom."', '".$date."', '".$adress."', '".$email."', '".$phone."', '".$password."', '".$login."', '".$convocation."')";
    mysqli_query($connect, $query);
   
   }
   
  }
  echo '<script type="text/javascript">alert("liste inserée");</script>';
 }  
     
     

 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}
?>
   </form>
   <br />
   <br />
   </div>



	<form method="POST" >
	<ul style="list-style: none;">
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
		<li><button id="pta" name="add">Ajouter Etudiants</button></li><br><br><br><br>
		<li><button id="pta" name="delete">Supprimer Etudiants</button></li><br><br><br><br>
		<li><button id="pta" name="update">Modifier Etudiants</button></li><br><br><br><br>
    <li><button id="pta" name="liston">Liste des Etudiants</button></li>
	</ul>
	</form>
  </section>
   

















	<section style="margin-left: 70px; width: 800px;height: 783px;">
	<?php  
    if (isset($_POST["add"])) {
      ?>
      <form style="background-color: #045c7c;box-shadow: 0px 0px 2px black;text-align: center;border-radius: 7px;color: white;margin-top: 120px;margin-left: 120px;margin-right: 200px;text-align: center;">
        <br>
        <h1 style="color: white">Ajouter Etudiants</h1>
        <br><br><br>
        CNE :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="cne"><br><br>
        Nom :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="nom"><br><br>
        Prenom :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="prenom"><br><br>
        Date de Naissence :&nbsp&nbsp&nbsp<input type="text" name="date-naiss"><br><br>
        Adresse &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:<input type="text" name="adresse"><br><br>
        Nom d'utilisateur :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="username"><br><br>
        Password &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:<input type="password" name="pass"><br><br>

         
        Filière :<select name="lise2" size="1">
        <option>GI</option>
        <option>GE</option>
        <option>GBI</option>
        </select>
        <br><br>
        Niveau :<select name="lise2" size="1">
        <option>1er</option>
        <option>2éme</option>
        <option>LP</option>
        </select>
        <br><br>
        <input id="vta" type="submit" name="ajouter" value="Ajouter"><br><br>
      </form>
      
      <?php  
    }


    if (isset($_POST["delete"])) {
      ?>
      <form style="background-color: #045c7c;box-shadow: 0px 0px 2px black;text-align: center;border-radius: 7px;color: white;margin-top: 120px;margin-left: 120px;margin-right: 200px;text-align: center;">
         <br>
        <h1 style="color: white">Supprimer Etudiants</h1>
        <br><br>     
        Filière :<select name="lise2" size="1">
        <option>GI</option>
        <option>GE</option>
        <option>GBI</option>
        </select>
        <br><br>

        Niveau :<select name="lise2" size="1">
        <option>1er</option>
        <option>2éme</option>
        <option>LP</option>
        </select>
        <br><br>
        
        Etudiant :<select name="lise3" size="1">
        <option>Yassine Ouaarab</option>
        <option>Lahssen Boukhla</option>
        <option>Youssra TTahba</option>
        </select><br><br>
      
     <input id="vta" type="submit" name="supprimer" value="Supprimer"><br><br>
      </form>
      <?php  
    }
    ?> 


    <?php  
    


    if (isset($_POST["update"])) {
      ?>
      <form style="background-color: #045c7c;box-shadow: 0px 0px 2px black;text-align: center;border-radius: 7px;color: white;margin-top: 120px;margin-left: 120px;margin-right: 200px;text-align: center;">
        <br>
        <h1 style="color: white">Modifier Etudiants</h1>
        <br><br>
        Filière :<select name="lise2" size="1">
        <option>GI</option>
        <option>GE</option>
        <option>GBI</option>
        </select>
        <br><br>

        Niveau :<select name="lise2" size="1">
        <option>1er</option>
        <option>2éme</option>
        <option>LP</option>
        </select>
        <br><br>
        
        Etudiant :<select name="lise3" size="1">
        <option>Yassine Ouaarab</option>
        <option>Lahssen Boukhla</option>
        <option>Youssra TTahba</option>
        </select><br><br>
      
     <input id="vta" type="submit" name="entrer" value="Entrer"><br><br>
      </form>
                <form style="background-color: red;background-color: #045c7c;box-shadow: 0px 0px 2px black;text-align: center;border-radius: 7px;color: white;margin-top: 90px;margin-left: 120px;margin-right: 200px;text-align: center;">
         <br>
        <h1 style="color: white">Modifier Etudiants</h1>
        <br><br><br>
         CNE :<input type="text" name="cne"><br><br>
        Nom :<input type="text" name="nom"><br><br>
        Prenom :<input type="text" name="prenom"><br><br>
        Date de Naissence :<input type="text" name="date-naiss"><br><br>
        Adresse :<input type="text" name="adresse"><br><br>
        Nom d'utilisateur :<input type="text" name="username"><br><br>
        Password :<input type="password" name="pass"><br><br>

         
        Filière :<select name="lise2" size="1">
        <option>GI</option>
        <option>GE</option>
        <option>GBI</option>
        </select>
        <br><br>
        Niveau :<select name="lise2" size="1">
        <option>1er</option>
        <option>2éme</option>
        <option>LP</option>
        </select>
        <br><br>
        <input id="vta" type="submit" name="modifier" value="Modifier"><br><br>
      </form>

                
                <?php  
              }

              if (isset($_POST["liston"])) {
      ?>
      
<style type="text/css">table{border-collapse: collapse;width: 100%;color: black;font-family: Century Gothic}td,th{border: 2px black solid;background-color: #00BEFF}</style>
  <h1 style="text-align: center;font-size: 35px;color: white;font-family: Cabin;margin-bottom: 40px;margin-top: 20px;">Liste des Etudiants</h1>
<table>
  <tr>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;">Nom</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;">Prenom</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;">Date de Naissence</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;">Adresse</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;">Nom d'utilisateur</th>
  <th style="background-color: #0099FA;font-family: Bree Serif;font-size: 15px;border: 2px black solid;">Mots de passe</th>
  
  
  </tr>
  <tr>
    <td>lahssen</td>
    <td>rezo</td>
    <td>25/07/1991</td>
    <td>595 Hay Tamdghouste Tiznit</td>
    <td>moradmz@gmail.com</td>
    <td style="border: 2px black solid;">713</td>
  </tr>


</table>
<?php  
    }
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