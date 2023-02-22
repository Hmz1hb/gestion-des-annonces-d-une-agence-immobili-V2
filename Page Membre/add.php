<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form   action="" method="post">

        <label for="titre"><Title></Title></label>
          <input type="text" class="form-control" id="titre" name="titre"><br>


          <label for="img">image</label>
          <input type="file" name="images[]"id="image" multiple><br>
       

          <label for="adresse">Adresse</label>
          <input type="text" class="form-control" id="adresse" name="adresse"><br>

          <label for="montant">price</label>
          <input type="number"  step="0.01" class="form-control" id="montant" name="montant"><br>

          <label for="dateAnnonce">Date PUB</label>
          <input type="date" class="form-control" id="dateAnnonce" name="dateP"><br>
          <select name="type" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="#">Type</option>
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                        <option value="terrain">Terrain</option>
                        <option value="bureau">bureau</option>
                      </select>

          <select class="form-control" id="category" name="category"><br>
            <option>Vente</option>
            <option>Location</option>
          </select>
          <button type="submit" name="submit" class="btn btn-dark-subtle m-4">Ajouter</button>

</form>
    <?php


   
        session_start();
    $sessionId= $_SESSION['id'];

if (
    isset($_POST['titre']) && isset($_POST['image']) 
    && isset($_POST['adresse']) && isset($_POST['montant'])
    && isset($_POST['dateP']) && isset($_POST['type'])
) {
    $TitreContent = $_POST['titre'];
    $adresseContent = $_POST['adresse'];
    $montantContent= number_format($_POST['prix'], 2, '.', '');
    $datePContent = $_POST['dateAnnonce'];
    $typeContent = $_POST['type'];
    $categoryContent = $_POST['category'];

    if (!empty($_FILES['image']['name'])) {
        $file_count = count($_FILES['images']['name']);

        for ($i = 0; $i < $file_count; $i++) {
            $file_name = $_FILES['images']['name'][$i];
            $file_tmp = $_FILES['images']['tmp_name'][$i];
            $file_type = $_FILES['images']['type'][$i];
            $file_size = $_FILES['images']['size'][$i];
            $new_file_name = "default.jpg";
    
            // Allowed file extensions
            $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    
            // Get the file extension of the uploaded file
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
            // Check if the uploaded file extension is allowed
            if (!in_array($file_ext, $allowed_extensions)) {
                // Handle error: Invalid file extension
            }
    
            // Set a maximum file size limit
            $max_size = 5000000; // 5MB
    
            // Check if the uploaded file size is within the limit
            if ($file_size > $max_size) {
                // Handle error: File size too large
            }
    
            // Validate the uploaded file before storing it
            $image_info = getimagesize($file_tmp);
            if (!$image_info) {
                // Handle error: Invalid image file
            }
    
            // Generate a unique file name
            $new_file_name_random = time() . "-" . $file_name;
            $new_file_path = "./images/" . $new_file_name_random;
    
            // Store the uploaded file
            if (!move_uploaded_file($file_tmp, $new_file_path)) {
                // Handle error: Failed to store file
            }

    
            // Determine if the file is the principal image
            $is_principal = ($i == 0 && isset($_POST['principal_image']) && $_POST['principal_image'] == $i) ? 1 : 0;
    
            // Set the Image_P value
            $image_p = ($is_principal == 1) ? "OUI" : "NON";
            try {
                $conn = new PDO("mysql:host=localhost;dbname=gestion-des-annonces-d-une-agence-immobili-re;port=3306;charset=UTF8", 'root', '');
                // set the PDO error mode to exception
                 
                $stmt = $conn->prepare("INSERT INTO announcement (Titre, Prix, DatePub, LastModified, adresse, Category, Type, Membre_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $TitreContent);
                $stmt->bindParam(2, $montantContent);
                $stmt->bindParam(3, date("Y/m/d"));
                $stmt->bindParam(4, date("Y/m/d"));
                $stmt->bindParam(5, $adresseContent);
                $stmt->bindParam(6, $categoryContent);
                $stmt->bindParam(7, $typeContent);
                $stmt->bindParam(8, $sessionId);    
                $stmt->execute();
                $order_id = $conn->lastInsertId();
            
                $stmt = $conn->prepare("INSERT INTO image (url, announcement_id, is_principal) VALUES (?, ?, ?)");
                $stmt->bindParam(1, $new_file_name_random);
                $stmt->bindParam(2, $order_id);
                $stmt->bindParam(3, $image_p);    
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
    }
}            
    try {
        $conn = new PDO("mysql:host=localhost;dbname=gestionimmobilier;port=3306;charset=UTF8", 'root', '');
        // set the PDO error mode to exception
     
      
        $stmt = $conn->prepare("INSERT INTO announcement (Titre, Prix,DatePub,LastModified, adresse,Category, Type, Membre_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam( $TitreContent, $montantContent,date("Y/m/d")  ,$adresseContent, $categoryContent, $typeContent, $sessionId);    
        $stmt->execute();
        $order_id = $conn->lastInsertId();

        $stmt = $conn->prepare("INSERT INTO image (Titre, Prix,DatePub,LastModified, adresse,Category, Type, Membre_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam( $new_file_name,array($new_file_name_random),$order_id,);    
        $stmt->execute();
      
       
          
       
       
        }
       catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

    } }
}

    ?>
</body>
</html>