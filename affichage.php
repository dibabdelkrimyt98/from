<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage PHP</title>
</head>
<body>
    <?php
        if(isset($_POST['Civilite'])){
            $civilite = $_POST['Civilite'];
        } else{
            $civilite="";
        }     

        if(isset($_POST['NomPrenom'])){
            $nomPrenom=$_POST['NomPrenom'];
        } else{
            $nomPrenom="";
        }     
            
        if(isset($_POST['Adresse'])){
            $adresse=$_POST['Adresse'];
        } else{
            $adresse="";
        }    
            
        if(isset($_POST['CodePostal'])){
            $codePostal =$_POST['CodePostal'];
        } else{
            $codePostal="";
        }    
            
        if(isset($_POST['Localite'])){
            $localite=$_POST['Localite'];
        } else{
            $localite="";
        }     

        if(isset($_POST['Pays'])){
            $pays = $_POST['Pays'];
        } else{
            $pays = "";
        }

        if(isset($_POST['Plateforme'])){
            $plateforme = implode(', ', $_POST['Plateforme']);
        } else{
            $plateforme = "";
        }

        if(isset($_POST['Application'])){
            $application = implode(', ', $_POST['Application']);
        } else{
            $application = "";
        }

        if(isset($_POST['dateNaissance'])){
            $dateNaissance = $_POST['dateNaissance'];
        } else{
            $dateNaissance = "";
        }

        if(isset($_POST['dateRendezVous'])){
            $dateRendezVous = $_POST['dateRendezVous'];
        } else{
            $dateRendezVous = "";
        }

        
        echo "Votre Civilité est : $civilite <br>";
        echo "Votre Nom / prénom est : $nomPrenom <br>";
        echo "Votre Adresse est : $adresse <br>";
        echo "Votre Code Postal est : $codePostal <br>";
        echo "Votre Localité est : $localite <br>";
        echo "Votre Pays est : $pays <br>";
        echo "Votre Date de naissance est : $dateNaissance <br>";
        echo "Votre Date de rendez vous est : $dateRendezVous <br>";
        echo "Vos Plateformes sont : $plateforme <br>";
        echo "Vos Applications sont : $application <br>";

        if(isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imageName = $_FILES['image']['name'];
            echo "<img src='data:image/jpeg;base64," . base64_encode(file_get_contents($imageTmpName)) . "' alt='$imageName' width='200'><br>";
        }

        if(isset($_FILES['image2']['tmp_name']) && !empty($_FILES['image2']['tmp_name'])) {
            $image2TmpName = $_FILES['image2']['tmp_name'];
            $image2Name = $_FILES['image2']['name'];
            echo "<img src='data:image/jpeg;base64," . base64_encode(file_get_contents($image2TmpName)) . "' alt='$image2Name' width='200'><br>";
        }

        
    ?>
</body>
</html>
