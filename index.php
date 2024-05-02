
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP6 – DAW</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

$conn = new mysqli("localhost", "root", "", "tpdaw");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $civilite = $nomPrenom = $adresse = $codePostal = $localite = $pays = $dateNaissance = $dateRendezVous = $plateformes = $applications = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Numero'])) {
        $id = $_POST['Numero'];

        
        $stmt = $conn->prepare("SELECT * FROM form WHERE id =?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
       

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $id = $row['id'];
            $civilite = $row["civilite"];
            $nomPrenom = $row["nomPrenom"];
            $adresse = $row["adresse"];
            $codePostal = $row["codePostal"];
            $localite = $row["localite"];
            $pays = $row["pays"];
            $dateNaissance = $row["dateNaissance"];
            $dateRendezVous = $row["dateRendezVous"];
            $plateformes = $row["plateforme"];
            $applications = $row["application"];
        } else {
            echo "0 results";
        }
        $result->free_result();
    }
}

$conn->close();
?>
<form action="enregistrement.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="labelContainer">
                <label for="numero">Num&eacute;ro:</label>
            </div>
            <div class="inputContainer">
                <input type="text" name="Numero" id="numero" value="<?php echo $id; ?>">
            </div>
            <div class="kkContainer">
                <input type="submit" value="Rechercher" formaction="index.php">
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="civilite">Civilit&eacute;</label>
            </div>
            <div class="inputContainer">
                <input type="radio" name="Civilite" id="monsieur" value="Monsieur" <?php if ($civilite == "Monsieur") echo "checked"; ?>>
                <label for="monsieur">Monsieur</label>

                <input type="radio" name="Civilite" id="madame" value="Madame" <?php if ($civilite == "Madame") echo "checked"; ?>>
                <label for="madame">Madame</label>

                <input type="radio" name="Civilite" id="mademoiselle" value="Mademoiselle" <?php if ($civilite == "Mademoiselle") echo "checked"; ?>>
                <label for="mademoiselle">Mademoiselle</label>
            </div>
        </div>
        
        <div class="container">
            <div class="labelContainer">
                <label for="nomPrenom">Nom / pr&eacute;nom</label>
            </div>
            <div class="inputContainer">
                <input type="text" name="NomPrenom" id="nomPrenom" size="30" value="<?php echo $nomPrenom; ?>">
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="adresse">Adresse</label>
            </div>
            <div class="inputContainer">
                <textarea name="Adresse" id="adresse" cols="30" rows="2"><?php echo $adresse; ?></textarea>
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="postalLocalite">No postal / Localit&eacute;</label>
            </div>
            <div class="inputContainer">
                <input type="text" name="CodePostal" id="codePostal" size="4" value="<?php echo ($localite != null) ? $codePostal : '22000'; ?>" maxlength="5" pattern="[0-9]{1,5}">

                <input type="text" name="Localite" id="localite" value="<?php echo ($localite != null) ? $localite : 'Sidi Bel Abb&egrave;s'; ?>">
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="pays">Pays</label>
            </div>
            <div class="inputContainer">
                <select name="Pays" id="pays">
                    <option value="Alg&eacute;rie" selected  <?php if($pays == "Algérie") echo "selected"; ?>>Alg&eacute;rie</option>
                    <option value="Bahre&iuml;n" <?php if($pays == "Bahre&iuml;n") echo "selected"; ?>>Bahre&iuml;n</option>
                    <option value="&Eacute;gypte" <?php if($pays == "&Eacute;gypte") echo "selected"; ?>>&Eacute;gypte</option>
                    <option value="Irak" <?php if($pays == "Irak") echo "selected"; ?>>Irak</option>
                    <option value="Jordanie" <?php if($pays == "Jordanie") echo "selected"; ?>>Jordanie</option>
                    <option value="Kowe&iuml;t" <?php if($pays == "Kowe&iuml;t") echo "selected"; ?>>Kowe&iuml;t</option>
                    <option value="Liban" <?php if($pays == "Liban") echo "selected"; ?>>Liban</option>
                    <option value="Libye" <?php if($pays == "Libye") echo "selected"; ?>>Libye</option>
                    <option value="Maroc" <?php if($pays == "Maroc") echo "selected"; ?>>Maroc</option>
                    <option value="Oman" <?php if($pays == "Oman") echo "selected"; ?>>Oman</option>
                    <option value="Palestine" <?php if($pays == "Palestine") echo "selected"; ?>>Palestine</option>
                    <option value="Qatar" <?php if($pays == "Qatar") echo "selected"; ?>>Qatar</option>
                    <option value="Arabie saoudite" <?php if($pays == "Arabie saoudite") echo "selected"; ?>>Arabie saoudite</option>
                    <option value="Soudan" <?php if($pays == "Soudan") echo "selected"; ?>>Soudan</option>
                    <option value="Syrie" <?php if($pays == "Syrie") echo "selected"; ?>>Syrie</option>
                    <option value="Tunisie" <?php if($pays == "Tunisie") echo "selected"; ?>>Tunisie</option>
                    <option value="&eacute;mirats arabes unis" <?php if($pays == "&eacute;mirats arabes unis") echo "selected"; ?>>&eacute;mirats arabes unis</option>
                    <option value="Y&eacute;men" <?php if($pays == "Y&eacute;men") echo "selected"; ?>>Y&eacute;men</option>
                </select>
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="dateNaissance">Date de naissance</label>
            </div>
            <div class="inputContainer">
                <input type="date" name="dateNaissance" id="dateNaissance" value="<?php echo $dateNaissance; ?>">
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="dateRendezVous">Date de rendez vous</label>
            </div>
            <div class="inputContainer">
                <input type="date" name="dateRendezVous" id="dateRendezVous" value="<?php echo $dateRendezVous; ?>">
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="plateforme">Plateforme(s)</label>
            </div>
            <div class="inputContainer">
                <input type="checkbox" name="Plateforme[]" id="windows" value="Windows" <?php if(strpos($plateformes, "Windows") !== false) echo "checked"; ?>>
                <label for="windows">Windows</label>

                <input type="checkbox" name="Plateforme[]" id="macintosh" value="Macintosh" <?php if(strpos($plateformes, "Macintosh") !== false) echo "checked"; ?>>
                <label for="macintosh">Macintosh</label>

                <input type="checkbox" name="Plateforme[]" id="unix" value="Unix" <?php if(strpos($plateformes, "Unix") !== false) echo "checked"; ?>>
                <label for="unix">Unix</label>
            </div>
        </div>
        <div class="container">
            <div class="labelContainer">
                <label for="application">Application(s)</label>
            </div>
            <div class="inputContainer">
                <select name="Application[]" id="application" multiple>
                    <option value="Bureautique" <?php if(strpos($applications, "Bureautique") !== false) echo "selected"; ?>>Bureautique</option>
                    <option value="DAO" <?php if(strpos($applications, "DAO") !== false) echo "selected"; ?>>DAO</option>
                    <option value="Statistiques" <?php if(strpos($applications, "Statistiques") !== false) echo "selected"; ?>>Statistiques</option>
                    <option value="SGBD" <?php if(strpos($applications, "SGBD") !== false) echo "selected"; ?>>SGBD</option>
                    <option value="Internet" <?php if(strpos($applications, "Internet") !== false) echo "selected"; ?>>Internet</option>
                </select>
            </div>
        </div>
        <div class="container">
            <div class="imageContainer" id="image1">
                <?php
                    if (!empty($row["image1"])) {
                        echo "<td><img src='images/" . $row["image1"] . "' alt='Image 1' width ='100'></td>";
                    } else {
                        echo "<td></td>"; 
                    }
                ?>
            </div>
            <div class="imageContainer" id="image2">
                <?php
                    if (!empty($row["image2"])) {
                        echo "<td><img src='images/" . $row["image2"] . "' alt='Image 2' width ='100'></td>";
                    } else {
                        echo "<td></td>"; 
                    }
            ?>
            </div>
        </div>
        <div class="container">
            <div class="buttonContainer">
                <input type="submit" name="Affichage" value="Affichage PHP" formaction="affichage.php">

                <input type="button" value="Affichage JavaScript" onclick="affichageJavaScript()">

                <input type="submit" name="Enregistrer" value="Enregistrer" >

                <input type="submit" value="Affichage Liste" name="Liste" formaction="affichageBDD.php">

                <input type="file" accept="image/*" name="image" id="imageUpload" style="display: none;">
                <button type="button" onclick="document.getElementById('imageUpload').click();">Inserer Image</button>

                <input type="file" accept="image/*" name="image2" id="imageUpload2" style="display: none;">
                <button type="button" onclick="document.getElementById('imageUpload2').click();">Inserer Image2</button>

                <input type="submit" value="Supprimer" formaction="supprimer.php">

                <input type="submit" value="Modifier" formaction="modifier.php">

            </div>
        </div>
        
    </form>
    
    
    <script>
        /* let uniqueId = localStorage.getItem("uniqueId") || 1;
        if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
            uniqueId++;
            localStorage.setItem("uniqueId", uniqueId);
        }
        document.getElementById("numero").value = uniqueId;// */
    
        function affichageJavaScript(){
            const civilite = document.querySelector('input[name="Civilite"]:checked').value;
            const nomPrenom = document.getElementById('nomPrenom').value;
            const adresse = document.getElementById('adresse').value;
            const codePostal = document.getElementById('codePostal').value;
            const localite = document.getElementById('localite').value;
            const pays = document.getElementById('pays').value;
            const plateforme = [];
            document.querySelectorAll('input[name="Plateforme[]"]:checked').forEach(function(checkbox) {
                plateforme.push(checkbox.value);
            });
            const application = [];
            document.querySelectorAll('#application option:checked').forEach(function(option) {
                application.push(option.value);
            });
            alert(`Votre Civilité est : ${civilite}\n` 
                + `Votre Nom est : ${nomPrenom}\n`
                + `Votre adresse est : ${adresse}\n`
                + `Votre Code Postal est : ${codePostal}\n`
                + `Votre Localité est : ${localite}\n`
                + `Votre Pays est : ${pays}\n`
                + `Vos Plateformes : ${plateforme}\n`
                + `Vos Plateformes : ${application}`); 
        }

        function displayUploadedFile(input) {
            const file = input.files[0];
            const reader = new FileReader();
    
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.width = 150; 

                const imageContainer = document.querySelector('#image1');
                imageContainer.innerHTML = ''; 
                imageContainer.appendChild(img);
            }
    
            reader.readAsDataURL(file);
        }

        function displayUploadedFile2(input) {
            const file = input.files[0];
            const reader = new FileReader();
    
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.width = 150; 

                const imageContainer = document.querySelector('#image2');
                imageContainer.innerHTML = '';
                imageContainer.appendChild(img);
            }
    
            reader.readAsDataURL(file);
        }

        document.getElementById('imageUpload').addEventListener('change', function() {
            displayUploadedFile(this);
        });

        document.getElementById('imageUpload2').addEventListener('change', function() {
            displayUploadedFile2(this);
        });
    </script>
</body>
</html>
