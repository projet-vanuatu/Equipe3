<?php
 require('fonctionSalle.php');

// $IdS=$_GET['IdS'];
 
 //supprimer
 if($_GET['action'] == 'supprimer'){
    $IdS1 = $_GET['id'];
    $SuppSalle=SupprimerSalle($IdS1); 
    header("Location:".$SuppSalle);
 }
    




   
// Modifier une salle 
   
    /*$resSalle = RecupererSalle();
    $Site = $_GET['choixSite'];
    $resIdSite = RecupererIdSite($Site);*/
    if($_GET['action']=='modifier'){
        if(!empty($_GET['IdS'])){
            $IdS =$_GET['IdS'];
            $nomSalle=$_GET['nomSalle'];
            $capaciteSalle=$_GET['capaciteMaxSalle'];
            $typeSalle = $_GET['choixTypeSalle'];
           $IdSITE =$_GET['choixSite'];
           $ModifierSalle=  ModifierSalle($nomSalle,$capaciteSalle,$typeSalle,$IdSITE,$IdS);
           header("Location:".$ModifierSalle);
        }
    }
       
        
    
   /* if(isset($_GET)){
        $nomSalle = $_GET['nomSalle'];
        $capaciteSalle = $_GET['capaciteMaxSalle'];
        $typeSalle = $_GET['choixTypeSalle'];
        $resIdSite = RecupererIdSite($Site);
        $insert = InsererSalle($nomSalle, $resIdSite);
    }*/
?>
