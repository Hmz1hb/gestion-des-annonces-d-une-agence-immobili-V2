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
          <input type="file" class="form-control" id="image" name="image"><br>

          <label for="adresse">Adresse</label>
          <input type="text" class="form-control" id="adresse" name="adresse"><br>

          <label for="montant">price</label>
          <input type="number" class="form-control" id="montant" name="montant"><br>

          <label for="dateAnnonce">Date PUB</label>
          <input type="date" class="form-control" id="dateAnnonce" name="dateP"><br>


          <select class="form-control" id="type" name="type"><br>
            <option>Vente</option>
            <option>Location</option>
          </select>
          <button type="submit" name="submit" class="btn btn-dark-subtle m-4">Ajouter</button>

</form>
    <?php


   
        session_start();
    echo  $_SESSION['id'];

if (
    isset($_POST['titre']) && isset($_POST['image']) 
    && isset($_POST['adresse']) && isset($_POST['montant'])
    && isset($_POST['dateP']) && isset($_POST['type'])
) {
    $TitreContent = $_POST['titre'];
    $adresseContent = $_POST['adresse'];
    $montantContent = $_POST['montant'];
    $datePContent = $_POST['dateAnnonce'];
    $typeContent = $_POST['type'];

    if (!empty($_FILES['image']['name'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $new_file_name = "default.jpg";

        // Allowed file types
        $allowed_types = array("image/jpeg", "image/png", "image/gif");

        // Check if the uploaded file is of the allowed type
        if (!in_array($file_type, $allowed_types)) {
            // Handle error: Invalid file type
        }

        // Set a maximum file size limit
        $max_size = 5000000; // 5MB

        // Check if the uploaded file size is within the limit
        if ($file_size > $max_size) {
            // Handle error: File size too large
        }

        // Generate a unique file name
        $new_file_name_random = time() . "-" . $file_name;
        $new_file_name = "./images/" . $new_file_name_random;


        // Move the uploaded file to a permanent location
        $upload_path = "./images/" . $new_file_name;
        if (move_uploaded_file($file_tmp, $upload_path)) {
            // Upload successful
        } else {
            // Handle error: Upload failed
        }
    } else {
        // Handle error: No file uploaded
    }







    


}

    ?>
</body>
</html>