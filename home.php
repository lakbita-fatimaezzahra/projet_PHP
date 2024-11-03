<?php
session_start();
if(empty($_SESSION['email'])){
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title> Electro-Shop</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
  <link rel="shortcut icon" href="images/favicon.png" type="">
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="./images/hero-bg.png" alt="">
      </div>
    </div>

    <?php
     include("./include/accessData.php");
     include("./include/fonction.php");
    include("./include/nav.php");
    $pageCourant=isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $requet="SELECT count(*) FROM produit";
    $resultat= $conn->query($requet);
    $produits=(int)$resultat->fetch(PDO::FETCH_NUM)[0];
    $pages=ceil($produits/6);
    $debut=($pageCourant-1)* 6;
    $requet = "SELECT * from produit order by date_creation DESC limit  6 offset $debut";
    $resultat= $conn->query($requet);
    $produit=$resultat->fetchAll();

  

 
    ?>
    <!-- home section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Crypto <br>
                      Currency
                    </h1>
                    <p>
                      Explicabo esse amet tempora quibusdam laudantium, laborum eaque magnam fugiat hic? Esse dicta aliquid error repudiandae earum suscipit fugiat molestias, veniam, vel architecto veritatis delectus repellat modi impedit sequi.
                    </p>
                    <div class="btn-box">
                      <a href="about.php" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="./images/image1.png" alt="">
                  </div>
                </div>
              </div>
              

            </div>
          </div>
          </div>
          </div>       
      </div>

    </section>
    <!-- end slider section -->
  </div>


  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Products</span>
          </h2>
          <p>
            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
          </p>
        </div>
        <div class="row">
        <?php
                foreach($produit as $value){?>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="">
                <img src="<?= $value['image']?>" alt="" class="imgProduit">
              </div>
              <div class="detail-box">
                <h5>
                 <?= $value['libelle']?>
                </h5>
                <p class="tailleP">
                <?= $value['description']?>
                </p>
                <a href="produit.php?id=<?= $value['reference']?>">
                  Read More
                </a>
              </div>
            </div>
          </div><?PHP } ?>
</div>
        <div class="btn-box">
        <ul class="pagination">
        <?php if($pageCourant>1){?>
    <li class="page-item">
    <a class="page-link" href="?page=<?php echo $pageCourant - 1; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>  </li><?php } ?>
      
      
      <?php
      for($i=1;$i<=$pages;$i++){
        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
      }
 
   
  ?> <?php if($pageCourant<$pages){?>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $pageCourant + 1; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li><?php } ?>
  </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- end service section -->



         

 
  <?php
    include("./include/footer.php");
    
    ?>


  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>