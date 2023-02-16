
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
<link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">

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
      <div class="container">
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="./img/boul-removebg-preview.png" alt="Boulvard" width="30%"  fill="none"> 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa-solid fa-bars" style="color: #55595c;"></i>
        </button>
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
            <form action="index.php" method="post" novalidate="novalidate">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="row">
                          <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                              <select name="type" class="form-control search-slt" id="exampleFormControlSelect1">
                                  <option value="#">Rental or Sale</option>
                                  <option value="Location">Rental</option>
                                  <option value="vente">Sale</option>
                              </select>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <input name="min_price" type="text" class="form-control search-slt" placeholder="Enter Minimal price">
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                              <input type="text" name="max_price" class="form-control search-slt" placeholder="Enter Maximal price">
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                              <button type="submit" class="btn btn-danger wrn-btn"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
                          </div>
                          <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                              <button type="button" class="btn btn-secondary wrn-btn" data-bs-toggle="modal" data-bs-target="#pub_modal"><i class="fa-solid fa-pen-to-square"></i> Sell</button>
                          </div>
                      </div>
                  </div>
              </div>
          </form>


            </div>
        </section>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
          <div class="col">
            <div class="card shadow-sm">
              <img id="card_img" src="./images/appartement1.jpg" alt="1" width="100%" height="225" fill="none">
              <div class="card-body">
                <h4 id="card_title">Title</h4>
                <h5 id="card_price" class="text-danger">PRIX DH</h5>
                <p id="card_text" class="card-text">Card details</p>
                <h5 id="annonce-type" class="text-danger">vante / location</h5>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" id="edit" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#edit_modal">Details</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <!-- pub modal -->
      <div class="modal fade" id="pub_modal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body">
              <h6 class="text-center text-capitalize">Unlock the Full Potential of Real Estate Marketing with Boulevard: Join Us Today and Access Exclusive Features to Maximize Your Sales Efforts!</h6>
              <br>
              <button href="#" type="button" id="Join Us" class="btn btn-sm btn-outline-secondary position-relative top-100 start-50 translate-middle">Join Us Now</button>
            </div>
          </div>
        </div>
      </div>
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