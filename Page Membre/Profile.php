<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
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
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><img src="./img/boul-removebg-preview-inverted.png" alt="Boulvard" width="50%"  fill="none"> </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <!-- <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div> -->
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home" class="align-text-bottom"></span>
              My Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              My Listings
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                         <div class="header">
                                <h4 class="title">Edit Profile</h4>
                        </div>
                            <div class="content">
                                <form action="" method="p">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" class="form-control border-input" placeholder="First Name" value="<?php echo $user_info['Prenom_M']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" class="form-control border-input" placeholder="Last Name" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control border-input" placeholder="Email" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input type="tel" name="PhoneNumber" class="form-control border-input" placeholder="Phone number" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-secondary btn-fill btn-wd">Update Profile</button>
                                    </div>
                                </form>
                                <?php 
                                 $_SESSION                                

                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "gestion-des-annonces-d-une-agence-immobili-re";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check for any database connection errors
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                //     // User input
                                //     $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
                                //     $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
                                //     $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                                //     $PhoneNumber = filter_var($_POST['PhoneNumber'], FILTER_SANITIZE_STRING);

                                //     // Update the user's information in the database
                                //     $query = "UPDATE membre SET Nom_M = '$last_name', Prenom_M = '$first_name', Email_M = '$email', TelephoneM = '$PhoneNumber' WHERE Membre_ID = {$_SESSION['id']}";
                                //     if ($conn->query($query) === TRUE) {
                                //         echo "Record updated successfully";
                                //     } else {
                                //         echo "Error updating record: " . $conn->error;
                                //     }

                                //     $success_message = 'Your profile has been updated.';
                                // }

                                // // Get the user's information from the database
                                // $query = "SELECT * FROM member WHERE Membre_ID = {$_SESSION['id']}";
                                // $result = $conn->query($query);

                                // // Fetch the user's information from the result set
                                // if ($result !== false && $result->num_rows > 0) {
                                //     $user_info = $result->fetch_assoc();
                                // } else {
                                //     // Handle any errors
                                //     echo "Error fetching user information: " . $conn->error;
                                // }

                                // Close the database connection
                                $conn->close();
                                
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
