<?php
    require ('fonctionConnexion.php');

    // RECUPERER INFOS SALLE
    function RecupererSalle(){
        $conn = ConnectPDO();
        $sql = "SELECT IdS, NomS, CapaciteS, TypeS, SA.IdSITE,NomSITE FROM SALLE SA,SITE SI WHERE SA.IdSITE = SI.IdSITE";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $resSalle = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resSalle;
    }
 
   

 
    //modifier salle
    function ModifierSalle($nomSalle,$capaciteSalle,$typeSalle,$IdSITE,$IdS){
        $cx = ConnectDB();
        $sql ="UPDATE SALLE SET NomS='$nomSalle',CapaciteS= '$capaciteSalle', typeS='$typeSalle', IdSITE='$IdSITE' WHERE IdS= '$IdS'";
        $querysql = mysqli_query($cx,$sql);
        return "gestionSalles.php";
    }
   
   
    
      //supprimer salle
function SupprimerSalle($IdS){
    //On récupère l'identifiant de la matière
    
    
    $cx = ConnectDB(); 
    $RecupererMateriel="SELECT IdMat FROM MATERIELS WHERE IdS = '$IdS';";
    $queryrecupererMateriel = mysqli_query($cx,$RecupererMateriel);
    $resIdMat = mysqli_fetch_array($queryrecupererMateriel);
    $IdMat = $resIdMat['IdMat'];
    //On met à jour les matériels qui sont équipé dans la salle à supprimer 
    $supprimerMateriel = "UPDATE MATERIELS SET IdS = NULL WHERE IdMat ='$IdMat';";
                    $querysupprimerMateriel = mysqli_query($cx,$supprimerMateriel);
    
    // On récupère les numéros de séance qui se déroulent dans la salle que l'on souhaite supprimer
    $conn = ConnectPDO();
    $sql = "SELECT NumS FROM SEANCES WHERE IdS = '$IdS';";
    $stmt = $conn->prepare($sql); 
    $stmt->execute();
    $resSalle = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Pour chaque numéro de sééance on surpprime les réservations associées et les profs qui dispensnet ccette séance 
//    var_dump($resSalle);
//    die();
         for($i=0;$i<=count($resSalle)-1;$i++){
            
           $a = $resSalle[$i]['NumS'];
           $supprimerDispense= "DELETE FROM DISPENSE WHERE NumS = '$a'";
           $querysupprimerDispense = mysqli_query($cx,$supprimerDispense);

           $supprimerReserver ="DELETE FROM RESERVER WHERE NumS ='$a'";
           $querysupprimerReserver = mysqli_query($cx,$supprimerReserver);
           
           $supprimerSeance = "DELETE FROM SEANCES WHERE NumS ='$a'";
           $querysupprimerSeance = mysqli_query($cx,$supprimerSeance);
           
          
          
         }
     
        // On supprime la salle 
          $supprimerSalle = "DELETE FROM SALLE WHERE IdS= $IdS;";
                $querysupprimerSalle = mysqli_query($cx,$supprimerSalle);
                 return  "gestionSalles.php" ;
              
}
    // RECUPERER INFOS SITE
    function RecupererSite(){
        $conn = ConnectPDO();
        $sql = "SELECT IdSITE, NomSITE, NumRue, RueSite, Ville, BoitePostale FROM SITE";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $resSite = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resSite;
    }
    

    // RECUPERER IDENTIFIANT SITE
    function RecupererIdSite($Site){
        $conn = ConnectPDO();
        $cx=ConnectDB();
        $searchIdSite = "SELECT IdSITE FROM SITE WHERE NomSITE = '$Site'";
        $querySearchIdSite = mysqli_query($cx, $searchIdSite);
        $resIdSite = mysqli_fetch_array($querySearchIdSite);
        return $resIdSite['IdSITE'];
    }
    
    // INSERER SALLE
    function InsererSalle($nomSalle, $resIdSite){
        $cx = ConnectDB();
        $typeSalle = $_GET['choixTypeSalle'];
        $capaciteSalle = $_GET['capaciteMaxSalle'];
        $Site = $_GET['choixSite'];
        $InsertSalle = "INSERT INTO SALLE(IdS, NomS, CapaciteS, TypeS, IdSITE) "
                . "VALUES (NULL, '$nomSalle', '$capaciteSalle', '$typeSalle', '$Site')";
        $queryInsererSalle = mysqli_query($cx, $InsertSalle);
        if($queryInsererSalle){
            header('Location: creationSalle.php');
        } else{
            echo "Erreur de codage <br><br>". mysqli_error($cx);
        }
    }
    
      function RecupererInfoSalle($IdS){
        $conn = ConnectPDO();
        $sql = "SELECT  NomS, CapaciteS, TypeS, SA.IdSITE,NomSITE 
               FROM SALLE SA,SITE SI 
               WHERE SA.IdSITE = SI.IdSITE
               AND  SA.IdS ='$IdS'";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $resSalle = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resSalle;
    }
?>