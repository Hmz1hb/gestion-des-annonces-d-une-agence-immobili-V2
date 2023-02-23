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
  <?php    session_start();
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
        <h1 class="h2">My Listings</h1>
      </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                            <div class="content">
                            <?php  
                            // check if form was submitted and set filter conditions
                            $filter_conditions = "";
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $type = $_POST["type"];
                            $min_price = $_POST["min_price"];
                            $max_price = $_POST["max_price"];
                            $category = $_POST['category'];
                            $ville = $_POST['Ville'];


                            // build filter conditions
                            if ($type != "#") {
                                $filter_conditions .= " AND `Type`='$type'";
                            }
                            if ($min_price != "") {
                                $filter_conditions .= " AND `Prix`>='$min_price'";
                            }
                            if ($max_price != "") {
                                $filter_conditions .= " AND `Prix`<='$max_price'";
                            }
                            if($category != "#"){
                                $filter_conditions .= " AND `Category` ='$category' ";
                            }
                            if( $ville != ""){
                                $filter_conditions .= " AND `Ville` = '$ville'";
                            
                            }
                            }
                            try {
                            $conn = new PDO("mysql:host=localhost;dbname=gestion-des-annonces-d-une-agence-immobili-re;port=3306;charset=UTF8", 'root', '');
                            // set the PDO error mode to exception

                            // modify query to include filter conditions
                            $content = $conn->query("SELECT announcement.Announcement_ID, Titre, Prix, Details, Type, ImageUrl FROM announcement, image WHERE announcement.Announcement_ID=image.Announcement_ID AND Image_P='oui' AND Membre_ID = '{$_SESSION['id']}' $filter_conditions");

                            echo "<div class='container'>";
                            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3'>";
                            while ($ligne = $content->fetch()) {
                                echo '  <div class="col">
                                <div class="card shadow-sm">
                                    <img id="card_img" src="' . $ligne['ImageUrl'] . '" alt="' . $ligne['Titre'] . '" width="100%" height="225" fill="none">
                                    <div class="card-body">
                                        <h4 id="card_title">' . $ligne['Titre'] . '</h4>
                                        <h5 id="card_price" class="text-danger">' . $ligne['Prix'] . ' MAD</h5>
                                        <p id="card_text" class="card-text">Card details</p>
                                        <h5 id="annonce-type" class="text-danger">POUR : ' . $ligne['Type'] . '</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="details.php?id=' . $ligne['Announcement_ID'] . '" id="edit" class="btn btn-sm btn-outline-secondary">Details</a>
                                                <a href="Edit.php?id=' . $ligne['Announcement_ID'] . '" id="edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form method="post" action="delete.php">
                                                <input type="hidden" name="id" value="' . $ligne['Announcement_ID'] . '">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                              </form>
                                              

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                            } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
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
