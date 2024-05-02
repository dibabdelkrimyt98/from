<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <?php
    if(isset($_POST['Numero'])){
        $id = $_POST['Numero'];
    } else{
        $id = "";
    } 

    if(isset($_POST['Civilite'])){
        $civilite = $_POST['Civilite'];
    } else{
        $civilite = "";
    }     

    if(isset($_POST['NomPrenom'])){
        $nomPrenom = $_POST['NomPrenom'];
    } else{
        $nomPrenom = "";
    }     

    if(isset($_POST['Adresse'])){
        $adresse = $_POST['Adresse'];
    } else{
        $adresse = "";
    }    

    if(isset($_POST['CodePostal'])){
        $codePostal = $_POST['CodePostal'];
    } else{
        $codePostal = "";
    }    

    if(isset($_POST['Localite'])){
        $localite = $_POST['Localite'];
    } else{
        $localite = "";
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


    $image1Name = $_FILES['image']['name'];
    $image2Name = $_FILES['image2']['name'];

    $tmp1Name = $_FILES['image']['tmp_name'];
    $tmp2Name = $_FILES['image2']['tmp_name'];

    $folder = 'images/'.$image1Name;
    $folder2 = 'images/'.$image2Name;
    
    move_uploaded_file($tmp1Name, $folder);
    move_uploaded_file($tmp2Name, $folder2);
    

        $db = mysqli_connect('localhost', 'root', '', 'tpdaw') or die('Erreur de connexion ' . mysqli_error($db));
        mysqli_select_db($db, 'tpdaw') or die('Erreur de selection ' . mysqli_error($db));

        $stmt = $db->prepare("UPDATE form SET civilite = ?, nomPrenom = ?, adresse = ?, codePostal = ?, localite = ?, pays = ?, plateforme = ?, application = ?, dateNaissance = ?, dateRendezVous = ?, image1 = ?, image2 = ? WHERE id = ?");
        $stmt->bind_param("ssssssssssssi", $civilite, $nomPrenom, $adresse, $codePostal, $localite, $pays, $plateforme, $application, $dateNaissance, $dateRendezVous, $image1Name, $image2Name, $id);
        
        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: ". $stmt->error;
        }
        
        $stmt->close();
        echo 'Vos informations ont été modifiées.';

        mysqli_close($db);
    
    ?>
</body>
</html>
