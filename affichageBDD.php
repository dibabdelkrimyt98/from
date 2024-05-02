<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    
    $conn = new mysqli('localhost', 'root', '', 'tpdaw');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tableName = "form";

    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    

    if ($result->num_rows > 0) {
        
        echo "<table>";
        echo "<tr>";
        echo "<th>Civilité</th>";
        echo "<th>Nom / Prénom</th>";
        echo "<th>Adresse</th>";
        echo "<th>Code Postal</th>";
        echo "<th>Localité</th>";
        echo "<th>Pays</th>";
        echo "<th>Date de naissance</th>";
        echo "<th>Date de rendez vous</th>";
        echo "<th>Plateformes</th>";
        echo "<th>Applications</th>";
        echo "<th>Images</th>";
        echo "<th>Images</th>";
        echo "</tr>";

        while($row = $result->fetch_assoc()) {

            echo "<tr>";
            echo "<td>" . $row["civilite"] . "</td>";
            echo "<td>" . $row["nomPrenom"] . "</td>";
            echo "<td>" . $row["adresse"] . "</td>";
            echo "<td>" . $row["codePostal"] . "</td>";
            echo "<td>" . $row["localite"] . "</td>";
            echo "<td>" . $row["pays"] . "</td>";
            echo "<td>" . $row["dateNaissance"] . "</td>";
            echo "<td>" . $row["dateRendezVous"] . "</td>";
            echo "<td>" . $row["plateforme"] . "</td>";
            echo "<td>" . $row["application"] . "</td>";
            if (!empty($row["image1"])) {
                echo "<td><img src='images/" . $row["image1"] . "' alt='Image 1' width ='100'></td>";
            } else {
                echo "<td></td>"; 
            }
            
            if (!empty($row["image2"])) {
                echo "<td><img src='images/" . $row["image2"] . "' alt='Image 2' width ='100'></td>";
            } else {
                echo "<td></td>"; 
            }
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found in the table";
    }

    $conn->close();

    ?>
</body>
</html>
