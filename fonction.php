<?php
require_once('ClassMesCours.php');

function monMenu() {
    
}

function login($username, $password) {
// check username and password with db
  //echo "login user: ".$username." User: ".$password."<br>";
  $conn = db_connect();
  if (!$conn) {
    echo "no connection";
    return 0;
  }
  // check if username is unique
  $result = $conn->query("select * from users
                         where username='".$username."'
                         and password = '".$password."'");
  if (!$result) {
     echo "no result";
     return 0;
  }
  if ($result->num_rows>0) {
        //echo "record trouvé";
  	$row = $result->fetch_assoc();
        //admin is true
        if ($row["admin"] == 1) {
            $_SESSION['admin_user'] = $username;
            //echo "log in magister";
            return 1;
        } //admin is false
        else {
            $_SESSION['valid_user'] = $username;
            $_SESSION['myStudent'] = getMyStudent($username);
            //echo "log in usager";
            return 1;
        }
    } else {
        echo "combinaison usager et mot de passe inexistant";
            return 0;
    }
}

function check_admin_user() {
  if (isset($_SESSION['admin_user'])) {
    return true;
  } else {
    return false;
  }
}

function check_user() {
	if(isset($_SESSION['valid_user'])) {
		return true;
	}else{
		return false;
	}
}

function db_connect() {
   $result = new mysqli('localhost', 'root', '', 'MesCours');
   if (!$result) {
      echo 'erreur connection';
      return false;
   }
   $result->autocommit(TRUE);
   return $result;
}

function getMyStudent($username){
    $conn = db_connect();
    if (!$conn) {
      return 0;
    }
    // retour objet Etudiant
    $result = $conn->query("select * from students
                           where username='".$username."'");
                               
    if (!$result) {
       //echo "student non trouvé";
       return 0;
    }
     if ($result->num_rows>0) {
        /* fetch object array */
        //echo "Trouvé etudiant";
        //print_r($result);
        
        while ($obj = mysqli_fetch_array($result)) {
                $myStudent = new Etudiant($obj[0], $obj[1], $obj[2], $obj[3], $obj[4], $obj[5], $obj[6], $obj[7], $obj[8]);
        }
        return $myStudent;
    }
    /* free result set */
    $result->close();
}

function display_login_form() {
  // dispaly form asking for name and password
?>
    <form method="post" action="index.php">
        <h2>Usager:<input type="text" name="username"/>
           Mot de passe:<input type="password" name="password"/>
           <input type="submit" value="Connexion"/>
           <input type="submit" value="Réinitialiser"/></h2>
    </form>
    <?php
    $username = $password =  "";
    $valide = true;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
          $nomErr = "le nom est requis";
          echo $nomErr;
          $valide = false;
        } 
    }
    else {
         $valide = false;
    }
    if ($valide){
        //login('magister','signum');
        //echo "log in valide<br>";
        //login('imastarr5','eggcel');
        login($_POST["username"], $_POST["password"]);
        
    }
}


  function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

