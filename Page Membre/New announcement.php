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
        <h1 class="h2">New Listings</h1>
      </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                                <form class="row g-3 needs-validation" action="" method="post" enctype="multipart/form-data">
                                  <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">Titre</label>
                                    <input type="text" name="titre" id="titre" class="form-control" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Image</label>
                                    <input type="file" name="images[]" multiple class="form-control" id="validationCustom02" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Type</label>
                                    <select class="form-select" id="validationCustom04" name="type" required>
                                      <option value="#">Select</option>
                                      <option value="maison">Maison</option>
                                      <option value="appartement">Appartement</option>
                                      <option value="terrain">Terrain</option>
                                      <option value="bureau">bureau</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Please select a valid Type.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom03" class="form-label">Adresse</label>
                                    <input type="text" id="adresse" name="adresse" class="form-control" required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Adresse.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">City</label>
                                    <select class="form-select" id="validationCustom04" name="Ville" required>
                                        <option selected disabled value="">Choose a City</option>
                                        <option value="Agadir">Agadir</option>
                                        <option value="Al Hoceima">Al Hoceima</option>
                                        <option value="Azrou">Azrou</option>
                                        <option value="Beni Mellal">Beni Mellal</option>
                                        <option value="Benslimane">Benslimane</option>
                                        <option value="Boujdour">Boujdour</option>
                                        <option value="Boulemane">Boulemane</option>
                                        <option value="Casablanca">Casablanca</option>
                                        <option value="Chefchaouen">Chefchaouen</option>
                                        <option value="Dakhla">Dakhla</option>
                                        <option value="El Jadida">El Jadida</option>
                                        <option value="Errachidia">Errachidia</option>
                                        <option value="Essaouira">Essaouira</option>
                                        <option value="Fes">Fes</option>
                                        <option value="Guelmim">Guelmim</option>
                                        <option value="Ifrane">Ifrane</option>
                                        <option value="Kénitra">Kénitra</option>
                                        <option value="Khemisset">Khemisset</option>
                                        <option value="Khénifra">Khénifra</option>
                                        <option value="Khouribga">Khouribga</option>
                                        <option value="Laayoune">Laayoune</option>
                                        <option value="Larache">Larache</option>
                                        <option value="Marrakech">Marrakech</option>
                                        <option value="Meknes">Meknes</option>
                                        <option value="Mohammadia">Mohammadia</option>
                                        <option value="Nador">Nador</option>
                                        <option value="Ouarzazate">Ouarzazate</option>
                                        <option value="Ouezzane">Ouezzane</option>
                                        <option value="Oujda">Oujda</option>
                                        <option value="Rabat">Rabat</option>
                                        <option value="Safi">Safi</option>
                                        <option value="Sale">Sale</option>
                                        <option value="Sefrou">Sefrou</option>
                                        <option value="Settat">Settat</option>
                                        <option value="Sidi Kacem">Sidi Kacem</option>
                                        <option value="Tanger">Tanger</option>
                                        <option value="Tan-Tan">Tan-Tan</option>
                                        <option value="Taza">Taza</option>
                                        <option value="Tétouan">Tétouan</option>
                                        <option value="Tiznit">Tiznit</option>
                                    </select>

                                    <div class="invalid-feedback">
                                      Please select a valid City.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">Category</label>
                                    <select class="form-select" id="validationCustom04"  id="category" name="category" required>
                                      <option value="#"> Vente ou Location</option>
                                      <option>Vente</option>
                                      <option option>Location</option>
                                    </select>
                                    <div class="invalid-feedback">
                                      Please select a valid City.
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="validationCustom05" class="form-label">Prix</label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">DH</span>
                                    <input type="number" min="1" step="any" name="montant" class="form-control" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                      Please provide a valid Price.
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Details</label>
                                    <!-- <input name="Details" type="text" class="form-control" id="validationCustom03" required> -->
                                    <textarea name="Details" type="text" class="form-control" id="validationCustom03" required  aria-label="With textarea"></textarea>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
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
                                    
                                    $sessionId = $_SESSION['id'];
                                    if (!empty($_FILES['images']['name'])) {
                                        $file_count = count($_FILES['images']['name']);
                                    
                                        $TitreContent = $_POST['titre'];
                                        $adresseContent = $_POST['adresse'];
                                        $montantContent = number_format($_POST['montant'], 2, '.', '');
                                        $typeContent = $_POST['type'];
                                        $categoryContent = $_POST['category'];
                                        $detailsContent = $_POST['Details'];
                                        $villeContent = $_POST['Ville'];
                                    
                                        try {
                                            $conn = new PDO("mysql:host=localhost;dbname=gestion-des-annonces-d-une-agence-immobili-re;port=3306;charset=UTF8", 'root', '');
                                            $stmt = $conn->prepare("INSERT INTO announcement (`Titre`,`Prix`,`DatePub`,`LastModified`, `adresse`,`Category`,`Type`, `Membre_ID`, `Details`, `Ville`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                            $stmt->bindParam(1, $TitreContent);
                                            $stmt->bindParam(2, $montantContent);
                                            $stmt->bindValue(3, date("Y/m/d"));
                                            $stmt->bindValue(4, date("Y/m/d"));
                                            $stmt->bindParam(5, $adresseContent);
                                            $stmt->bindParam(6, $categoryContent);
                                            $stmt->bindParam(7, $typeContent);
                                            $stmt->bindParam(8, $sessionId);
                                            $stmt->bindParam(9, $detailsContent);
                                            $stmt->bindParam(10, $villeContent);
                                            $stmt->execute();
                                            $order_id = $conn->lastInsertId();
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
                                                $new_file_path = "../img/" . $new_file_name_random;
                                    
                                                // Store the uploaded file
                                                if (!move_uploaded_file($file_tmp, $new_file_path)) {
                                                    // Handle error: Failed to store file
                                                }
                                    
                                                // Set principal image
                                                    $is_principal = ($i == 0) ? 1 : 0;
                                                    $image_p = ($is_principal == 1) ? "oui" : "non";

                                                    $stmt = $conn->prepare("INSERT INTO image (`ImageUrl`,`Announcement_ID`,`Image_P`) VALUES (?, ?, ?)");
                                                    $stmt->bindParam(1, $new_file_path);
                                                    $stmt->bindParam(2, $order_id);
                                                    $stmt->bindParam(3, $image_p);
                                                    $stmt->execute();
                                                }
                                            } catch (PDOException $e) {
                                                echo "Error: " . $e->getMessage();
                                            }
                                        }
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
