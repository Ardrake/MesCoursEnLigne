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
       $nomErr = $prenomErr = "";
       $nom = $prenom = $couriel = "";
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
                  Enregistrment <span class="error">* champs obligatoire.</span>
                  <hr>
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        Nom: <span class="error">* <?php echo $nomErr;?></span><br>
                        <input type="text" name="nom" value="<?php echo $nom;?>"><br>
                        Prénom: <span class="error">* <?php echo $prenomErr;?></span><br>
                        <input type="text" name="prenom" value="<?php echo $prenom;?>">
                        <input type="submit" name="submit" value="Envoyez"> 
                  </form>
              </div>
          </div>
        

    </body>
</html>
