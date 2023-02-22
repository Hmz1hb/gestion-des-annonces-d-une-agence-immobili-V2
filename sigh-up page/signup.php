<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js" defer></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
  <style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

    body {
      background-color: #55595c;
    }
  </style>
</head>

<body>
  <form class="h-100" method="POST" action="signup.php">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="./Img/pexels-cottonbro-studio-4569878.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <a href="../Page Visiteure/Guest.php" class="navbar-brand d-flex align-items-center mt-5">
                    <img src="./Img/boul-removebg-preview.png" alt="" srcset="" width="30%" class="position-relative top-0 start-50 translate-middle pt-5">
                  </a>
                  <h3 class="mb-5 text-center">Unlock Real Estate's Full Potential <br> Sign Up Now!</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="Name_Inp" type="text" id="Name_Inp" class="form-control form-control-lg" required />
                        <label class="form-label" for="Name_Inp">First name</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input name="Last_Name_Inp" type="text" id="Last_Name_Inp" class="form-control form-control-lg" required />
                        <label class="form-label" for="Last_Name_Inp">Last name</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="Email_Inp" type="email" id="Email_Inp" class="form-control form-control-lg" required />
                    <label class="form-label" for="Email_Inp">Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="Telephone_Inp" type="tel" id="Telephone_Inp" class="form-control form-control-lg" required />
                    <label class="form-label" for="Telephone_Inp">Phone Number</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input name="Password_Inp" type="password" id="Password_Inp" class="form-control form-control-lg" required />
                    <label class="form-label" for="Password_Inp">Password</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="Password_Confirm_Inp" name="Password_Confirm_Inp" class="form-control form-control-lg" required />
                    <label class="form-label" for="Password_Confirm_Inp">Password Verification</label>
                  </div>

                  <div class="d-flex justify-content-end pt-3">
                    <button type="submit" name="submit" class="btn btn-danger btn-block">Sign Up</button>
                  </div>
                  <div class="text-center mt-3 small">
                    Already have an account? <a href="../login page/Log-in.php">Sign In</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
  ob_start();
  // Redirect to member page if no error occurs
  if (isset($_POST['submit'])) {
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestionimmobilier";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $name = test_input($_POST['Name_Inp']);
    $last_name = test_input($_POST['Last_Name_Inp']);
    $email = test_input($_POST['Email_Inp']);
    $password = test_input($_POST['Password_Inp']);
    $password_confirm = test_input($_POST['Password_Confirm_Inp']);
    $telephone = test_input($_POST['Telephone_Inp']);

    // Verify passwords match
    if ($password !== $password_confirm) {
      exit(); // Terminate the script
    }
    $passHash = password_hash($password, PASSWORD_DEFAULT);
    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO member (Nom_M, Prenom_M, Email_M, MembrePasse, TelephoneM) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $last_name, $email, $passHash, $telephone);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
      // Redirect to member page
      header("Location: https://trello.com/b/owfyRkZr/marketing-overview");

      exit(); // Terminate the script
    } else {
      exit(); // Terminate the script
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ob_end_flush();
  ?>


</body>

</html>