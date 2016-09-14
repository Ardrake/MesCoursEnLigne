<?php

class Etudiant {
    var $StudentID;
    var $LastName;
    var $FirstName;
    var $Address;
    var $City;
    var $Province;
    var $PostalCode;
    var $EmailAddress;
    var $UserName;
    var $listeDesCours=array();
    
    function Etudiant($studentid, $lastname, $firstname, $adresse, $city, $province, $postalcode, $emailaddress, $username, $listedescours=array())
    {
        $this->StudentID = $studentid;
        $this->LastName = $lastname;
        $this->FirstName = $firstname;
        $this->Address = $adresse;
        $this->City = $city;
        $this->Province = $province;
        $this->PostalCode = $postalcode;
        $this->EmailAddress = $emailaddress;
        $this->UserName = $username;
        $this->listeDesCours = $listedescours;
    }
    
    public function getNomEtudiant()
    {
        return $this->FirstName." ".$this->LastName;
    }
    
    public function ajouteCours(Cours $monCour)
    {
       $this->listeDesCours[$monCour->id] = $monCour;
    }
    
    public function retireCours($idCour)
    {
        if (isset($this->listeDesCours[$idCour])) {        
            unset($this->listeDesCours[$idCour]);   
            echo "<br> Cours ".$idCour." trouvé et effacé de la liste <br><br>";
        }
        else {
            echo "Cours NON trouvé <br>";
        }
    }
    
    public function getCours()
    {
        return $this->listeDesCours;
    }
    
}

class Cours {
    public $id;
    public $nom;
    var $cout;
    public $tuteur;
    var $materiel=array();
    
    public function Cours($id, $nom, $cout, $tuteur, $materiel=array()) {
        $this->id = $id;
        $this->nom = $nom;
        $this->cout = $cout;
        $this->tuteur = $tuteur;
        $this->materiel = $materiel;
    }
    
    public function getCout() {
        return $this->cout;
    }
    
    public function ajouteMateriel(Materiel $monMateriel) {
       $this->listeDesCours[$monMateriel->id] = $monMateriel;
    }
    
    
    
}

class Materiel {
    var $id;
    var $nom;
    var $chemin;
    var $type;
    
    public function Materiel($id, $nom, $chemin, $type) {
        $this->id = $id;
        $this->nom = $nom;
        $this->cout = $chemin;
        $this->tuteur = $type;
    }
}

?>