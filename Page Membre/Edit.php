<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
  </head>
  <body>
    
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="./member.php" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
        <img src="./img/boul-removebg-preview.png" alt="Boulvard" width="30%"  fill="none"> 
        <div class="dropdown text-end position-relative top-0 start-50">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="./Img/pngwing.com.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="./New announcement.php">New announcement</a></li>
            <li><a class="dropdown-item" href="./Member-Listings.php">My announcement</a></li>
            <li><a class="dropdown-item" href="./Profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
</header>
  <?php    
  session_start();
           // Check if the user is logged in
           if(!isset($_SESSION['id'])) {
            // Redirect the user to the login page
            header("Location: http://localhost/login%20page/Log-in.php");
            exit;
          }
  ?>
<div class="container-fluid">
  <div class="row">
  <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./Profile.php">
              <span data-feather="home" class="align-text-bottom"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./Member-Listings.php">
              <span data-feather="file" class="align-text-bottom"></span>
              My Listings
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./New announcement.php">
              <span data-feather="file" class="align-text-bottom"></span>
              New Listing
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Listing eddit</h1>
      </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                          <?php
                                // Connect to the database
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "gestion-des-annonces-d-une-agence-immobili-re";
                                $conn = mysqli_connect($servername, $username, $password, $dbname);

                                // Check if the form was submitted
                                if (isset($_POST['submit'])) {
                                    // Get the announcement ID from the URL
                                    $id = $_GET['id'];

                                    // Get the existing announcement data from the database
                                    $sql = "SELECT * FROM announcement WHERE Announcement_ID=?";
                                    $stmt = mysqli_prepare($conn, $sql);
                                    mysqli_stmt_bind_param($stmt, "i", $id);
                                    mysqli_stmt_execute($stmt);
                                    $result = mysqli_stmt_get_result($stmt);
                                

                                    // Check if the announcement exists in the database
                                    if ($result !== false && $result->num_rows > 0) {
                                        $announcement_info = $result->fetch_assoc();

                                        // Get the form data and update the announcement data
                                        $titre = !empty($_POST['Titre']) ? $_POST['Titre'] : $announcement_info['Titre'];
                                        $type = !empty($_POST['type']) ? $_POST['type'] : $announcement_info['type'];
                                        $adresse = !empty($_POST['adresse']) ? $_POST['adresse'] : $announcement_info['Adresse'];
                                        $ville = !empty($_POST['Ville']) ? $_POST['Ville'] : $announcement_info['Ville'];
                                        $category = !empty($_POST['category']) ? $_POST['category'] : $announcement_info['Category'];
                                        $montant = !empty($_POST['montant']) ? $_POST['montant'] : $announcement_info['Prix'];
                                        $details = !empty($_POST['Details']) ? $_POST['Details'] : $announcement_info['Details'];

                                          // Update the announcement in the database
                                        $sql = "UPDATE announcement SET Titre=?, type=?, Adresse=?, Ville=?, Category=?, Prix=?, Details=?, LastModified=NOW() WHERE Announcement_ID=?";
                                        $stmt = mysqli_prepare($conn, $sql);
                                        mysqli_stmt_bind_param($stmt, "sssssssi", $titre, $type, $adresse, $ville, $category, $montant, $details, $id);
                                        mysqli_stmt_execute($stmt);

                                        // Fetch existing Announcement_ID from the image table
                                        $sql = "SELECT Announcement_ID FROM image WHERE Announcement_ID = ?";
                                        $stmt = mysqli_prepare($conn, $sql);
                                        mysqli_stmt_bind_param($stmt, "i", $id);
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        $row = mysqli_fetch_assoc($result);
                                        $announcement_id = $row['Announcement_ID'];

                                        // Update the image table with the new images
                                        if (isset($_FILES['images'])) {
                                            $images = $_FILES['images'];
                                            $file_count = count($images['name']);

                                            for ($i = 0; $i < $file_count; $i++) {
                                                $file_name = $images['name'][$i];
                                                $file_tmp = $images['tmp_name'][$i];
                                                $file_type = $images['type'][$i];
                                                $file_size = $images['size'][$i];
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
                                                $new_file_path = "../img/" . $new_file_name_random;

                                                // Store the uploaded file
                                                if (!move_uploaded_file($file_tmp, $new_file_path)) {
                                                    // Handle error: Failed to store file
                                                }

                                                // Set principal image
                                                $is_principal = ($i == 0) ? 1 : 0;
                                                $image_p = ($is_principal == 1) ? "oui" : "non";

                                                // Update the image table
                                                if ($announcement_id !== null) {
                                                    $sql = "UPDATE image SET ImageUrl=?, Image_P=? WHERE Announcement_ID=?";
                                                    $stmt = mysqli_prepare($conn, $sql);
                                                    mysqli_stmt_bind_param($stmt, "ssi", $new_file_path, $image_p, $announcement_id);
                                                    mysqli_stmt_execute($stmt);
                                                } else {
                                                    $stmt = $conn->prepare("INSERT INTO image (`ImageUrl`,`Announcement_ID`,`Image_P`) VALUES (?, ?, ?)");
                                                    $stmt->bind_param("sis", $new_file_path, $id, $image_p);
                                                    $stmt->execute();
                                                }
                                            }
                                        }
                                      }
                            }
                               // Get the announcement data from the database and display the form
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM announcement WHERE Announcement_ID=$id";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            // Display the form with the announcement data pre-populated
                     

                            ?>

                                <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data">
                                  <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Titre</label>
                                    <input type="text" name="titre" id="titre" class="form-control" placeholder="<?php echo $row['Titre']; ?>">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Image</label>
                                    <input type="file" name="images[]" multiple class="form-control" id="validationCustom02">
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Type</label>
                                    <select class="form-select" id="validationCustom04" name="type">
                                      <option value="#" <?php if ($row['Type'] == 'maison') echo 'selected'; ?>>Select</option>
                                      <option value="maison" <?php if ($row['Type'] == 'maison') echo 'selected'; ?>>Maison</option>
                                      <option value="appartement" <?php if ($row['Type'] == 'appartement') echo 'selected'; ?>>Appartement</option>
                                      <option value="terrain" <?php if ($row['Type'] == 'terrain') echo 'selected'; ?>>Terrain</option>
                                      <option value="bureau" <?php if ($row['Type'] == 'bureau') echo 'selected'; ?>>bureau</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Please select a valid Type.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Adresse</label>
                                    <input type="text" id="adresse" name="adresse" class="form-control" placeholder="<?php echo $row['Adresse']; ?>">
                                    <div class="invalid-feedback">
                                      Please provide a valid Adresse.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" id="validationCustom04" name="Ville">
                                        <option selected disabled value="">Choose a City</option>
                                        <option value="Agadir" <?php if ($row['Ville'] == 'Agadir') echo 'selected'; ?>>Agadir</option>
                                        <option value="Al Hoceima" <?php if ($row['Ville'] == 'Al Hoceima') echo 'selected'; ?>>Al Hoceima</option>
                                        <option value="Azrou" <?php if ($row['Ville'] == 'Azrou') echo 'selected'; ?>>Azrou</option>
                                        <option value="Beni Mellal" <?php if ($row['Ville'] == 'Beni Mellal') echo 'selected'; ?>>Beni Mellal</option>
                                        <option value="Benslimane" <?php if ($row['Ville'] == 'Benslimane') echo 'selected'; ?>>Benslimane</option>
                                        <option value="Boujdour" <?php if ($row['Ville'] == 'Boujdour') echo 'selected'; ?>>Boujdour</option>
                                        <option value="Boulemane" <?php if ($row['Ville'] == 'Boulemane') echo 'selected'; ?>>Boulemane</option>
                                        <option value="Casablanca" <?php if ($row['Ville'] == 'Casablanca') echo 'selected'; ?>>Casablanca</option>
                                        <option value="Chefchaouen" <?php if ($row['Ville'] == 'Chefchaouen') echo 'selected'; ?>>Chefchaouen</option>
                                        <option value="Dakhla" <?php if ($row['Ville'] == 'Dakhla') echo 'selected'; ?>>Dakhla</option>
                                        <option value="El Jadida" <?php if ($row['Ville'] == 'El Jadida') echo 'selected'; ?>>El Jadida</option>
                                        <option value="Errachidia" <?php if ($row['Ville'] == 'Errachidia') echo 'selected'; ?>>Errachidia</option>
                                        <option value="Essaouira" <?php if ($row['Ville'] == 'Essaouira') echo 'selected'; ?>>Essaouira</option>
                                        <option value="Fes" <?php if ($row['Ville'] == 'Fes') echo 'selected'; ?>>Fes</option>
                                        <option value="Guelmim" <?php if ($row['Ville'] == 'Guelmim') echo 'selected'; ?>>Guelmim</option>
                                        <option value="Ifrane" <?php if ($row['Ville'] == 'Ifrane') echo 'selected'; ?>>Ifrane</option>
                                        <option value="Kénitra" <?php if ($row['Ville'] == 'Kénitra') echo 'selected'; ?>>Kénitra</option>
                                        <option value="Khemisset" <?php if ($row['Ville'] == 'Khemisset') echo 'selected'; ?>>Khemisset</option>
                                        <option value="Khénifra" <?php if ($row['Ville'] == 'Khénifra') echo 'selected'; ?>>Khénifra</option>
                                        <option value="Khouribga" <?php if ($row['Ville'] == 'Khouribga') echo 'selected'; ?>>Khouribga</option>
                                        <option value="Laayoune" <?php if ($row['Ville'] == 'Laayoune') echo 'selected'; ?>>Laayoune</option>
                                        <option value="Larache" <?php if ($row['Ville'] == 'Larache') echo 'selected'; ?>>Larache</option>
                                        <option value="Marrakech" <?php if ($row['Ville'] == 'Marrakech') echo 'selected'; ?>>Marrakech</option>
                                        <option value="Meknes" <?php if ($row['Ville'] == 'Meknes') echo 'selected'; ?>>Meknes</option>
                                        <option value="Mohammadia" <?php if ($row['Ville'] == 'Mohammadia') echo 'selected'; ?>>Mohammadia</option>
                                        <option value="Nador" <?php if ($row['Ville'] == 'Nador') echo 'selected'; ?>>Nador</option>
                                        <option value="Ouarzazate" <?php if ($row['Ville'] == 'Ouarzazate') echo 'selected'; ?>>Ouarzazate</option>
                                        <option value="Ouezzane" <?php if ($row['Ville'] == 'Ouezzane') echo 'selected'; ?>>Ouezzane</option>
                                        <option value="Oujda" <?php if ($row['Ville'] == 'Oujda') echo 'selected'; ?>>Oujda</option>
                                        <option value="Rabat" <?php if ($row['Ville'] == 'Rabat') echo 'selected'; ?>>Rabat</option>
                                        <option value="Safi" <?php if ($row['Ville'] == 'Safi') echo 'selected'; ?>>Safi</option>
                                        <option value="Sale" <?php if ($row['Ville'] == 'Sale') echo 'selected'; ?>>Sale</option>
                                        <option value="Sefrou" <?php if ($row['Ville'] == 'Sefrou') echo 'selected'; ?>>Sefrou</option>
                                        <option value="Settat" <?php if ($row['Ville'] == 'Settat') echo 'selected'; ?>>Settat</option>
                                        <option value="Sidi Kacem" <?php if ($row['Ville'] == 'Sidi Kacem') echo 'selected'; ?>>Sidi Kacem</option>
                                        <option value="Tanger" <?php if ($row['Ville'] == 'Tanger') echo 'selected'; ?>>Tanger</option>
                                        <option value="Tan-Tan" <?php if ($row['Ville'] == 'Tan-Tan') echo 'selected'; ?>>Tan-Tan</option>
                                        <option value="Taza" <?php if ($row['Ville'] == 'Taza') echo 'selected'; ?>>Taza</option>
                                        <option value="Tétouan" <?php if ($row['Ville'] == 'Tétouan') echo 'selected'; ?>>Tétouan</option>
                                        <option value="Tiznit" <?php if ($row['Ville'] == 'Tiznit') echo 'selected'; ?>>Tiznit</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      Please select a valid City.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">Category</label>
                                    <select class="form-select" id="validationCustom04"  id="category" name="category">
                                      <option value="#" disabled> Vente ou Location</option>
                                      <option value="vente" <?php if ($row['Category'] == 'vente') echo 'selected'; ?>>Vente</option>
                                      <option  value="location <?php if ($row['Category'] == 'location') echo 'selected'; ?>">Location</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Please select a valid City.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom05" class="form-label">Prix</label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">DH</span>
                                    <input type="number" placeholder="<?php echo $row['Prix']; ?>" min="1" step="any" name="montant" class="form-control" id="validationCustom05">
                                    <div class="invalid-feedback">
                                      Please provide a valid Price.
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-md-12">
                                    <te for="validationCustom03" class="form-label">Details</te>
                                    <textarea name="Details" placeholder="<?php echo $row['Details']; ?>" type="text" class="form-control" id="validationCustom03"></textarea>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck">
                                      <label class="form-check-label" for="invalidCheck">
                                        Agree to terms and conditions
                                      </label>
                                      <div class="invalid-feedback">
                                        You must agree before submitting.
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <button name="submit" class="btn btn-primary" type="submit">Submit form</button>
                                  </div>
                                </form>
                                <?php
                              
                                 
                       
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
 </div>
      
    </main>
  </div>
</div>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>
</html>