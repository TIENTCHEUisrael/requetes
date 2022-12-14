<!DOCTYPE html>
<html lang="en">
  
    <?php 
    session_start();
    include_once './database.php';
    $_SESSION["active"] = false;
    $database = new Database();
    $db = $database->getConnection();

    if (isset($_POST['btnsave'])) {	
      $nom = $_POST["nom"];
      $prix = $_POST["prix"];
      $quantite = $_POST["stock"];
      $description = $_POST["description"];
	  $product = $db->query('SELECT * from produit')->fetchAll(PDO::FETCH_OBJ);
        $size = sizeof($product);
        $q="INSERT INTO produit (nom,prix, quantite_stock, description,image, id, categorie, vendeur) VALUES ('$nom', '$prix', '$quantite', '$description','', $size+1, 2, 2)";
        $db->exec($q); 
        echo('good');
      }

    // if(isset($_POST["btnsave"])){ 

    //   $nom = $_POST["nom"];
    //   $prix = $_POST["prix"];
    //   $quantite = $_POST["stock"];
    //   $description = $_POST["description"];
    //   if ( isset($_FILES['image']) )
    //   {
    //     $img_blob = file_get_contents ($_FILES['image']['tmp_name']);      

    //     $product = $db->query('SELECT * from produit')->fetchAll(PDO::FETCH_OBJ);
    //     $size = sizeof($product);
    //     $q="INSERT INTO produit (nom,prix, quantite_stock, description,image, id, categorie, vendeur) VALUES ('$nom', '$prix', '$quantite', '$description','', $size+1, 2, 2)";
    //     $db->exec($q); 
    //     echo('good');  
    //   }else{
    //     echo('Echec');
    //   }
    // }
      
    ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product - Dashboard HTML Template</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="./assets/css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body><nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="./homeAdmin.php">
                    <h1 class="tm-site-title mb-0">Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link" href="homeAdmin.php?page=dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Clients <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="homeAdmin.php?page=ajoutclient">Add Client</a>
                                <a class="dropdown-item" href="homeAdmin.php?page=listclient">List Client</a>
                                <a class="dropdown-item" href="homeAdmin.php?page=listclientacheter">Client ayant acheter</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="homeAdmin.php?page=products">
                                <i class="fas fa-shopping-cart"></i>
                                Products
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="homeAdmin.php?page=accounts">
                                <i class="far fa-user"></i>
                                Accounts
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Ventes <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="homeAdmin.php?page=listventes">List ventes</a>
                                <a class="dropdown-item" href="homeAdmin.php?page=listvendeur">List vendeurs</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="./login.php">
                                Admin, <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="" class="tm-edit-product-form" method="POST">
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
                      name="nom"
                      type="text"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="description"
                      >Description</label
                    >
                    <textarea
                      class="form-control validate"
                      rows="3"
                      name="description"
                      required
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label
                      for="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                    >
                      <option selected>Select category</option>
                      <?php
                          include_once './database.php';
                          $database = new Database();
                          $db = $database->getConnection();
                          $rec = $db->query("SELECT * FROM categorie ")->fetchAll(PDO::FETCH_OBJ);
                              foreach ($rec as $item) {
                                  echo('<option  value="'.$item->Id.'" >'.$item->nom_categorie.'</option>');
                              }
                      ?>   
                    </select>
                  </div>
                  <div class="row">
                      <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="expire_date"
                            >Solde
                          </label>
                          <input
                            id="expire_date"
                            name="prix"
                            type="text"
                            class="form-control validate"
                            data-large-mode="true"
                          />
                        </div>
                        <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Stock
                          </label>
                          <input
                            id="stock"
                            name="stock"
                            type="text"
                            class="form-control validate"
                            required
                          />
                        </div>

                  </div>
                  
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                
                <div class="tm-product-img-dummy mx-auto">
                 <input type="file" name="image" size=50 />
                </div>                              
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="btnsave">Add Product Now</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
        </div>
    </footer> 

    <script src="./assets/js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
    <!-- https://jqueryui.com/download/ -->
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $("#expire_date").datepicker();
      });
    </script>
  </body>
</html>



