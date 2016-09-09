<html>
	<head>
            <meta charset="utf-8" />
            <title>Tâche du Tuteur en ligne</title>
            <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	</head>
        <?php

        require_once('fonction.php');
        require_once('ClassMesCours.php');
        require_once('Navigation.php');
        session_start();
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
            <?php
             if (check_admin_user() == 1){
                 affiche_navigation('magister');   
             }
            else {
                 header('Location: index.php'); 
             }
            ?>
                
                <div id="left">
                    <div class="article">
                        <h3>Tâche du Tuteur en ligne</h3>
                        <p>Liste des cours</p>
                    </div>
                </div>
            </div>
        </div>
        </body>


</html>


  