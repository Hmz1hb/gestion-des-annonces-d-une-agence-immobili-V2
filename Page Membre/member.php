
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
<?php    session_start();
           // Check if the user is logged in
           if(!isset($_SESSION['id'])) {
            // Redirect the user to the login page
            header("Location: http://localhost/login%20page/Log-in.php");
            exit;
          }
  ?>

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


  <main>

  <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="font-weight-light">Experience Urban Living with Boulevard's Building Album</h1>
          <p class="lead text-muted">Welcome to Boulevard Real Estate's Building Collection. Here, you'll discover a curated selection of our most sought-after properties. Each building has been carefully selected for its unique features and prime location. Browse through our collection to find your next dream home or investment opportunity. Our team of experts is dedicated to providing unparalleled service, so feel free to reach out to us with any questions or inquiries. Discover the perfect property for you with Boulevard Real Estate.</p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <section class="search-sec mb-5">
          <div class="container">
            <form action="" method="post" novalidate="novalidate">
              <div class="row">
                <div class="col-lg-12">
                  <div class="row">
                    <div class="col-lg-2 col-md-12 col-sm-12 p-0">
                      <select name="category" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="#">Rental or Sale</option>
                        <option value="location">Rental</option>
                        <option value="vente">Sale</option>
                      </select>
                    </div>
                      <div class="col-lg-2 col-md-6 col-sm-12 p-0">
                      <select name="type" class="form-control search-slt" id="exampleFormControlSelect1">
                        <option value="#">Type</option>
                        <option value="maison">Maison</option>
                        <option value="appartement">Appartement</option>
                        <option value="terrain">Terrain</option>
                        <option value="bureau">bureau</option>
                      </select>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 p-0">
                      <input type="text" name="Ville" class="form-control search-slt" placeholder="Ville">
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 p-0">
                      <input name="min_price" type="text" class="form-control search-slt" placeholder="Min-Price">
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 p-0">
                      <input type="text" name="max_price" class="form-control search-slt" placeholder="Max-Price">
                    </div>
                    <div class="col-lg-2 col-md-12
                     col-sm-12 p-0">
                      <button type="submit" class="btn btn-danger wrn-btn"><i class="fa-solid fa-magnifying-glass"></i> Filter</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
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
   $content = $conn->query("SELECT `announcement`.`Announcement_ID`, `Titre`, `Prix`, `Details`, `Type`, `ImageUrl` FROM `announcement`, `image` WHERE `announcement`.`Announcement_ID`=`image`.`Announcement_ID` AND `Image_P`='oui'$filter_conditions");

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
  </main>
  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-right mb-1">
        <a href="#"><i class="fa-solid fa-arrow-up" style="color: #55595c;"></i></a>
    </div>
  </footer>
</body>

</html>