<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enregistrement</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
        require_once('fonction.php');
        require_once('ClassMesCours.php');
        require_once('Navigation.php');
        
        session_start();
        // definir les variable et initialisé leur contenu
       $nomErr = $prenomErr = $adsresseErr = $villeErr = $provinceErr = $codepostal = $usager = "";
       $nom = $prenom = $province = $ville = $addresse = $couriel = $cpErr = $courielErr = $userErr = "";
       $valide = TRUE;
       
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nom"])) {
              $nomErr = "le nom est requis";
              $valide = FALSE;
            } else {
              $nom = test_input($_POST["nom"]);
              // Validé le nom
              if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {
                $nomErr = "Seulement des lettre et espace sont permis";
                $valide = FALSE;
              }
            }
             if (empty($_POST["prenom"])) {
              $prenomErr = "le prenom est requis";
              $valide = FALSE;
            } else {
              $prenom = test_input($_POST["prenom"]);
              // Validé le prenom
              if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {
                $prenomErr = "Seulement des lettre et espace sont permis";
                $valide = FALSE;
              }
            }
        }
    ?>
    <body>
        <div id="top"> 
        </div>
        <div id="banner">
         
            <div class="title_tagline">
                <h1 class="title">Mes Cours Enligne</h1>
              <h2>- Le pouvoir des connaissances</h2>
            </div>
        </div>
          <div id="main">
              <div id="content">
                  <?php affiche_navigation('guest');?>
                  <div id="left">
                    <div class="article">
                        Enregistrment <span class="error">* champs obligatoire.</span>
                        <hr>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            Nom: <span class="error">* <?php echo $nomErr;?></span> 
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                            Prénom: <span class="error">* <?php echo $prenomErr;?></span>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            Usager: <span class="error">* <?php echo $userErr;?></span> <br>

                            <input style='width: 140px;' type="text" name="nom" value="<?php echo $nom;?>">
                            <input style='width: 140px;' type="text" name="prenom" value="<?php echo $prenom;?>">
                            &emsp;&emsp;&emsp;
                            <input style='width: 120px;' type="text" name="usager" value="<?php echo $usager;?>"><br>

                            Addresse: <span class="error">* <?php echo $adsresseErr;?></span><br>
                            <input style='width: 350px;' type="text" name="addresse" value="<?php echo $addresse;?>"><br>

                            Ville: <span class="error">* <?php echo $villeErr;?></span> 
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                             Province: <span class="error">* <?php echo $provinceErr;?></span><br> 
                            <input style='width: 320px;' type="text" name="Ville" value="<?php echo $ville;?>">&emsp;
                            <input style='width: 110px;' type="text" name="province" value="<?php echo $province;?>"><br>

                            Code Postal: <span class="error">* <?php echo $cpErr;?></span> <br>
                            <input style='width: 100px;' type="text" name="CodePostal" value="<?php echo $codepostal;?>"><br>

                            Couriel: <span class="error">* <?php echo $courielErr;?></span> <br>
                            <input style='width: 400px;' type="text" name="CodePostal" value="<?php echo $couriel;?>"><br>

                            <br><input type="submit" name="submit" value="Envoyez"> 

                        </form>
                    </div>
                  </div>
              </div>
          </div>
        

    </body>
</html>
