<?php
    require_once 'fonctionSalle.php';
     $resS = RecupererSalle();
     $resSite = RecupererSite();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script src="javascript.js"></script>
        <title>Insertion UE</title>
    </head>
    <body>
        <div class="myNavbar">
            <div class="navbar-header">
                <img src="images/logo.JPG" alt="Logo" style="width:52px;">
            </div>
            <a href="homeAdmin.php">Accueil</a>
            <div class="subnav">
                <button class="subnavbtn">Création &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                <a href="creationUtilisateurs.html">Utilisateurs</a>
                <a href="#company">Formations</a>
                <a href="creationSalle.php">Salles</a>
                <a href="#company">Matériels</a>
                <a href="creationUE.php">Unités d'enseignements</a>
                <a href="creationMatiere.php">Matières</a>
                </div>
            </div> 
            <div class="subnav">
                <button class="subnavbtn">Gestion &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="gestionUtilisateurs.html">Utilisateurs</a>
                    <a href="#company">Formations</a>
                    <a href="#company">Salles</a>
                    <a href="#company">Matériels</a>
                    <a href="gestionUE.php">Unités d'enseignements</a>
                    <a href="gestionUE.php">Matières</a>
                </div>
            </div>
            <div class="subnav">
                <button class="subnavbtn">Consulter planning &nbsp;<i class="fa fa-caret-down"></i></button>
                <div class="subnav-content">
                    <a href="#company">Par formation</a>
                    <a href="#company">Par salle</a>
                    <a href="#company">Par enseignant</a>
                </div>
            </div>
            <div class="subnav2">
                <a href = "index.php" class="subnavbtn2">Deconnection&nbsp;<span class="glyphicon glyphicon-log-in"></span></a>
            </div>
            <div class="subnav2">
                <button class="subnavbtn3"><span class="glyphicon glyphicon-user"></span>&nbsp;Nom Prénom</button>
            </div>
        </div>  
        <div class="container">
            <br>
            <div class="row"></div>
            <div class="container" style="background-color: white; padding: 15px;">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction();" placeholder="Rechercher.." title="">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary">Creer salle</button>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <table class="table table-hover">
                            <thead>
                                <th>NomS</th><th>CapaciteS</th><th>TypeS</th><th>NomSITE</th>
                            </thead>
                            <tbody>
                                <?php
                                    for($i=0;$i<=count($resS)-1;$i++){
                                ?>
                                    <tr>
                                        <td><?php echo $resS[$i]['NomS']; ?></td>
                                        <td><?php echo $resS[$i]['CapaciteS']; ?></td>
                                        <td><?php echo $resS[$i]['TypeS']; ?></td>  
                                        <td><?php echo $resS[$i]['NomSITE']; ?></td>  
                                        <?php
                                        $IdS = $resS[$i]['IdS'];
                                        $IdSITE= $resS[$i]['NomSITE'];
                                        ?>
                                        <td><p><a href="creationSalle.php?action=modifier&IdS=<?php echo $IdS; ?>"><button type="button" class="btn btn-warning">Modifier</button></a>
                                                <a href="actionSalle.php?action=supprimer&id=<?php echo $IdS; ?>"><button type="button" class="btn btn-danger" >Supprimer</button></a></p></td>
                                    </tr>                   
                                <?php
                                    }                                     
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>

    </body>
</html>
