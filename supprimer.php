<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>
<body>
    <?php
       if(isset($_POST['Numero'])){
            $numero = $_POST['Numero'];
        } else{
            $numero = "";
        }    

        $db = mysqli_connect('localhost', 'root', '', 'tpdaw') or die('Erreur de connexion ' . mysqli_error($db));
        mysqli_select_db($db, 'tpdaw') or die('Erreur de selection ' . mysqli_error($db));

        $tableName = "form";

        $sql_delete = "DELETE FROM $tableName WHERE id = $numero";
        if ($db->query($sql_delete) === TRUE) {
            echo "Vos informations ont été supprimées.";
        } else {
            echo "Error" . $db->error;
        }

        $db->close();
    ?>
</body>
</html>
