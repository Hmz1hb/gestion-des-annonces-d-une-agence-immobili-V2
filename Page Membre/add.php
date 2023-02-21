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
          <input type="date" class="form-control" id="dateAnnonce" name="dateA"><br>


          <select class="form-control" id="type" name="type"><br>
            <option>Vente</option>
            <option>Location</option>
          </select>
          <button type="submit" class="btn btn-dark-subtle m-4">Ajouter</button>

</form>
    <?php

    
session_start();
echo  $_SESSION['user'];
    
    
    ?>
</body>
</html>