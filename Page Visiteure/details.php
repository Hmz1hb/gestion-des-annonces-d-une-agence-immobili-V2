
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Boulevard</title>

  <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/album/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  /*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
@media (min-width: 992px){
    .search-sec{
        position: relative;
    }
}

</style>

</head>

<body>

  <header>
    <div class="collapse" id="navbarHeader" style="background-color: #55595c;">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">About</h4>
            <p class="text-white">Boulevard Real Estate is a full-service real estate agency committed to providing exceptional service to all of our clients. Our experienced agents have a deep understanding of the local real estate market and are equipped to assist with all your buying, selling, and renting needs. From the initial search to closing the deal, we work closely with our clients to ensure a smooth and successful transaction. With our network of industry professionals and cutting-edge technology, we are able to provide our clients with a competitive edge in today's fast-paced market. Whether you're looking to purchase your dream home, sell your current property, or rent a new place, Boulevard Real Estate is here to help. Contact us today to learn how we can assist you with your real estate needs.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contact</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white">Follow on Twitter</a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-light shadow-sm">
      <div class="container" id>
        <a href="./Guest.php" class="navbar-brand d-flex align-items-center">
          <img src="./img/boul-removebg-preview.png" alt="Boulvard" width="30%"  fill="none"> 
        </a>
        <a href="../login page/Log-in.php"><i class="fa-solid fa-user-plus"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars" style="color: #55595c;"></i>
        </button>
      </div>

      
    </div>
  </header>

  <main>
  <section class="py-5 text-center container">
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "gestion-des-annonces-d-une-agence-immobili-re";
      $conn = new mysqli($servername, $username, $password, $dbname);
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // Retrieve the images for the announcement
      $announcement_id = 1; // Replace with the actual announcement ID
      $query = "SELECT * FROM image WHERE Announcement_ID = $announcement_id ORDER BY Image_P DESC";
      $result = mysqli_query($conn, $query);
      
      // Generate the carousel indicators
      $count = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $active = ($count == 0) ? 'active' : '';
        echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $count . '" class="' . $active . '" aria-current="' . $active . '" aria-label="Slide ' . ($count+1) . '"></button>';
        $count++;
      }
      ?>
    </div>
    <div class="carousel-inner">
      <?php
      // Reset the result set pointer
      mysqli_data_seek($result, 0);
      
      // Generate the carousel items
      $count = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $active = ($count == 0) ? 'active' : '';
        echo '<div class="carousel-item ' . $active . '">';
        echo '<img src="' . $row['ImageUrl'] . '" class="d-block w-100" alt="...">';
        echo '</div>';
        $count++;
      }
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion-des-annonces-d-une-agence-immobili-re";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM announcement WHERE Announcement_ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $titre = $row['Titre'] ?? '';
    $details = $row['Details'] ?? '';
    $prix = $row['Prix'] ?? '';
    $adresse = $row['Adresse'] ?? '';

    echo '<div class="album py-5 bg-light">
        <div class="container">
            <div class="single-post">
                <div class="blog_details">
                    <h2 style="color: #2d2d2d;">'.$titre.'</h2>
                    <p class="excert mt-5">'.$details.'</p>
                    <h5 class="text-primary-emphasis">'.$adresse.'</h5>
                    <h5 class="text-danger mt-5">PRIX '.$prix.' DH</h5>
                </div>
            </div>
        </div>
    </div>';
  }
} else {
  echo "0 results";
}

$conn->close();
?>


    <!-- <div class="album py-5 bg-light">
      <div class="container">
      <div class="single-post">
      <div class="blog_details">
        <h2 style="color: #2d2d2d;">Announce title</h2>
       <p class="excert mt-5">
        Announce details here
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nulla aliquid eos cupiditate optio, quia accusantium vel illum expedita cum delectus ea dolorum quis natus, nobis deleniti, ipsam iste! Odio, reiciendis!
       </p>
      <h5 class="text-primary-emphasis">Address</h5>
      <h5 class="text-danger mt-5">PRIX DH</h5>
      </div>
      </div>
      </div>
    </div> -->
  </main>
  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#"><i class="fa-solid fa-arrow-up" style="color: #55595c;"></i></a>
    </div>
  </footer>
<script src="./java.js"></script>
</body>

</html> 