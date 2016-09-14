<html>
	<head>
            <meta charset="utf-8" />
            <title>Liste des cours</title>
            <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	</head>
        <?php

        require_once('fonction.php');
        require_once('ClassMesCours.php');
        require_once('Navigation.php');
        session_start();
        
        $conn = db_connect();
       
        mysqli_set_charset($conn,"utf8");

        $sql = "SELECT * FROM `courses`";
        if ($sql === FALSE) {
           echo 'Echec de la requete ';
        }
        else {
           $result = mysqli_query($conn,$sql);  
           $num_rows = mysqli_num_rows($result); 
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
            <?php
             if (check_admin_user() == 1){
                 affiche_navigation('magister');   
             }
             else if (check_user() == 1){

                 affiche_navigation('user');
             }
             else {
                 affiche_navigation('guest'); 
                 
             }
            ?>
                <div id="left">
                    <div class="article">
                        <h3>La liste des cours offert en ligne</h3>
                        
                           <?php
                            if (check_admin_user() == 1){
                                //affiche_navigation('magister');   
                            }
                            else if (check_user() == 1){
                                $myStudent = getMyStudent($_SESSION['valid_user']);
                                $studentid = $myStudent->StudentID;
                                $sql = "SELECT * FROM courses 
                                        left outer join studentscourses ON courses.CourseID =  studentscourses.CourseID
                                        where StudentID != '".$studentid."'";
                                $result = mysqli_query($conn,$sql);  
                                $num_rows = mysqli_num_rows($result); 
                                
                                $sql1 = "SELECT * FROM courses 
                                        left outer join studentscourses ON courses.CourseID =  studentscourses.CourseID
                                        where StudentID = '".$studentid."'";
                                $result1 = mysqli_query($conn,$sql1);  
                                $num_rows1 = mysqli_num_rows($result1); 
                                
                                //affiche user;
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?php 
                                            while($row = mysqli_fetch_array($result)) {
                                                    $courseid = $row['CourseID'];
                                                    $coursename = $row['CourseName'];
                                                    $price = $row['Price'];
                                                    echo "<tr><td style='width: 200px; ' >".$courseid."</td>"
                                                            . "<td style='width: 600px;'>".$coursename."</td>"
                                                            . "<td style='width: 200px;'>".$price."</td>"
                                                             ."<td> <input type=button onClick=".'"'."location.href='achats.php?idcour=".$courseid."'".'"'."value='Achetez'></td>"
                                                        . "</tr>";
                                            }
                                            echo "</table>";
                                            ?></th>
                                        </tr>
                                    </thead>
                                </table>
                            <h3>La liste des cours a votre compte</h3>
                           <table>
                                    <thead>
                                        <tr>
                                            <th><?php 
                                            while($row = mysqli_fetch_array($result1)) {
                                                    $courseid = $row['CourseID'];
                                                    $coursename = $row['CourseName'];
                                                    $price = $row['Price'];
                                                    echo "<tr>"
                                                            . "<td style='width: 200px;'>".$courseid."</td>"
                                                            . "<td style='width: 600px;'>".$coursename."</td>"
                                                            . "<td style='width: 200px;'>".$price."</td>"
                                                            ."<td> <input type=button onClick=".'"'."location.href='cour.php?idcour=".$courseid."'".'"'."value='Mon cour'></td>"
                                                        . "</tr>";
                                            }
                                            echo "</table>";
                                            ?></th>
                                        </tr>
                                    </thead>
                                </table>
                        
                             <?php
                               }
                            // affiche guest
                            else {
                                $sql = "SELECT * FROM `courses`";
                                $result = mysqli_query($conn,$sql);  
                                $num_rows = mysqli_num_rows($result); 
                                ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th><?php 
                                            while($row = mysqli_fetch_array($result)) {
                                                    $courseid = $row['CourseID'];
                                                    $coursename = $row['CourseName'];
                                                    $price = $row['Price'];
                                                    echo "<tr><td style='width: 200px;'>".$courseid."</td><td style='width: 600px;'>".$coursename."</td><td>".$price."</td></tr>";
                                            }
                                            echo "</table>";
                                            ?></th>
                                        </tr>
                                    </thead>
                                </table>
                             <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        </body>
</html>