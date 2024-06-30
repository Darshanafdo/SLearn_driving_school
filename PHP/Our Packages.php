<?php
session_start();

if (!isset($_SESSION['username'])) {
   header("Location: index.php");
   exit();
}

$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Our packages</title>

   <link rel="stylesheet" href="../CSS/Main/footer.css">
   <link rel="stylesheet" href="../CSS/Main/header.css">
   <link rel="stylesheet" href="../CSS/Body/our_package.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>
   <html>
   <header>

      <nav class="nav">

         <div class="logo"><a href="#"><img src="../Images/Main/logo.png"></a>
         </div>

         <ul class="nav-links">
            <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
            <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
            <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
            <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
            <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
            <li><a class="action_btn" href="#"></i>
                  <?php echo 'Hi ';
                  echo htmlspecialchars($username); ?>
               </a></li>
            <li><a class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
         </ul>

         <div class="toggle_btn" id="toggleButton">
            <i class="fa-solid fa-bars" id="toggleIcon"></i>
         </div>
      </nav>
   </header>
   <br>

   <div class="dropdown_menu" id="dropdownMenu">
      <ul class="nav-links">
         <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
         <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
         <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
         <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
         <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
         <li><a class="action_btn" href="#"></i>
               <?php echo 'Hi ';
               echo htmlspecialchars($username); ?>
            </a></li>
         <li><a class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
      </ul>
   </div>


   <!-- php methanata code tikak add karanna one db aken data ena nisa -->

   <div class="container">
      <h1 class="title"> Our light vehicle packages </h1>

      <div class="products-container">

         <div class="product" data-name="p-1">
            <img src="img/pexels-photo-2169104.jpeg" alt="">
            <h3>Full Package <br> (Bike, Car, Threewheel)</h3>
            <div class="price">Rs.20,000</div>
         </div>

         <div class="product" data-name="p-2">
            <img src="img/bike new.jpg" alt="">
            <h3>Bike</h3>
            <div class="price">Rs.5500</div>
         </div>

         <div class="product" data-name="p-3">
            <img src="img/wheel.jpg" alt="">
            <h3>Threewheel</h3>
            <div class="price">Rs.6500</div>
         </div>

         <div class="product" data-name="p-4">
            <img src="img/car new.jpg" alt="">
            <h3>Car</h3>
            <div class="price">Rs.11,000</div>
         </div>

         <div class="product" data-name="p-5">
            <img src="img/Bus.jpeg" alt="">
            <h3>Bike & Threewheel</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-6">
            <img src="img/Bike car.jpg" alt="">
            <h3>Bike & car</h3>
            <div class="price">Rs.15,000</div>
         </div>

         <div class="product" data-name="p-7">
            <img src="img/Bus.jpeg" alt="">
            <h3>Car & Threewheel</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-8">
            <img src="img/Full.jpg" alt="">
            <h3>Full Package <br> (Bus , Lorry, Tipper)</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-9">
            <img src="img/Bus.jpeg" alt="">
            <h3>Bus</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-10">
            <img src="img/lorry.jpg" alt="">
            <h3>Lorry</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-11">
            <img src="img/Tipper.jpg" alt="">
            <h3>Tipper</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-12">
            <img src="img/lorry and bus.jpg" alt="">
            <h3>Bus & Lorry</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-13">
            <img src="img/Bus.jpeg" alt="">
            <h3>Bus & Tipper</h3>
            <div class="price">Rs.10,500</div>
         </div>

         <div class="product" data-name="p-14">
            <img src="img/Bus.jpeg" alt="">
            <h3>Lorry & Tipper</h3>
            <div class="price">Rs.10,500</div>
         </div>

      </div>

   </div>

   <div class="products-preview">

      <div class="preview" data-target="p-1">
         <i class="fas fa-times"></i>
         <img src="img/pexels-photo-2169104.jpeg" alt="">
         <h3>Full Package (Bike,Threewheel,Car) </h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.20,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-2">
         <i class="fas fa-times"></i>
         <img src="img/bike new.jpg" alt="">
         <h3>Bike</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.5,500</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-3">
         <i class="fas fa-times"></i>
         <img src="img/wheel.jpg" alt="">
         <h3>Threewheel</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.6,500</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-4">
         <i class="fas fa-times"></i>
         <img src="img/car new.jpg" alt="">
         <h3>Car</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.11,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-5">
         <i class="fas fa-times"></i>
         <img src="img/Bus.jpeg" alt="">
         <h3>Bike & Threewheel</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.10,500</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-6">
         <i class="fas fa-times"></i>
         <img src="img/Bike car.jpg" alt="">
         <h3>Bike & Car</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.15,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-7">
         <i class="fas fa-times"></i>
         <img src="img/Bus.jpeg" alt="">
         <h3>Threewheel & Car</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.16,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-8">
         <i class="fas fa-times"></i>
         <img src="img/Full.jpg" alt="">
         <h3>Full Package (Bus, Lorry,Tipper)</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.2,500</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-9">
         <i class="fas fa-times"></i>
         <img src="img/Bus.jpeg" alt="">
         <h3>Bus</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.27,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-10">
         <i class="fas fa-times"></i>
         <img src="img/lorry.jpg" alt="">
         <h3>Lorry</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.25,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-11">
         <i class="fas fa-times"></i>
         <img src="img/Tipper.jpg" alt="">
         <h3>Tipper</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.50,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-12">
         <i class="fas fa-times"></i>
         <img src="img/lorry and bus.jpg" alt="">
         <h3>Bus & Lorry</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.25,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-13">
         <i class="fas fa-times"></i>
         <img src="img/Bus.jpeg" alt="">
         <h3> Bus & Tipper</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.30,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

      <div class="preview" data-target="p-14">
         <i class="fas fa-times"></i>
         <img src="img/Bus.jpeg" alt="">
         <h3>Lorry & Tipper</h3>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>( 250 )</span>
         </div>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
         <div class="price">Rs.35,000</div>
         <div class="buttons">
            <a href="#" class="buy">buy now</a>

         </div>
      </div>

   </div>


   <!-- methana idan copy karala ganna  -->

   <footer class="footer-distributed">

      <div class="footer-left">

         <h3>SL<span>earn</span></h3>

         <p class="footer-links">
            <a href="#" class="link-1">Home</a>

            <a href="#"> About </a>

            <a href="#"> Contact us </a>



            <!-- me comment tikath copy karala ganna. -->

            <!-- <a href="#"> Login </a>
       
       <a href="#"> ...... </a>
       
       <a href="#"> ..... </a> -->
         </p>

         <p class="footer-company-name"> SLearn © 2023 </p>
      </div>


      <div class="footer-center">

         <div>
            <i class="fa fa-map-marker"></i>
            <p><span> Sri Lanka College of Technology</span> Olcott Mawatha, Colombo - 10 </p>
         </div>

         <div>
            <i class="fa fa-phone"></i>
            <p>+947108528520</p>
         </div>

         <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">SLearnschool@gamil.com</a></p>
         </div>

      </div>


      <div class="footer-right">

         <p class="footer-company-about">
            <span>About the company</span>
            Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit,
            eu auctor lacus
            vehicula sit amet.
         </p>

         <div class="footer-icons">

            <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
         </div>

      </div>

   </footer>

   <!-- methanin iwaraii  -->

   <script src="../JS/Main/header.js"></script>




</body>

</html>