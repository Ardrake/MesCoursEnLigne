<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mes Cours</title>
         <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
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
                require_once('fonction.php');
                require_once('ClassMesCours.php');
                require_once('Navigation.php');
                session_start();
                $conn = db_connect();

                $courseid = $_GET['idcour'];
                if (check_admin_user() == 1){
                    //affiche_navigation('magister');   
                }
                else if (check_user() == 1){
                    $myStudent = getMyStudent($_SESSION['valid_user']);
                    $studentid = $myStudent->StudentID;
                    $sql = "SELECT * FROM courses 
                            WHERE CourseID ='".$courseid."'";
                    $result = mysqli_query($conn,$sql);  
                    $num_rows = mysqli_num_rows($result); 
                    }

                     while($row = mysqli_fetch_array($result)) {
                        $courseid = $row['CourseID'];
                        $coursename = $row['CourseName'];

                        echo "<h3>".$courseid." - ".$coursename."</h3>";
                    }
                ?>
            </div>
        </div>
    </body>
</html>
