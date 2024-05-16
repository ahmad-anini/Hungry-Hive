<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/resturanthomepage.css">
</head>
<body>
  <div class="row align-items-center " id="row">
    <div class="col-3">
      <p style="margin-left: 30px;"> <i class="fa-solid fa-mobile-screen-button"></i> 2671194</p>
    </div>
    <div class="col text-center col-6">
      <img src="../img/res.png" id="img" alt="">
      <div class="row justify-content-center gap-4">
        <div class="col-2"><a href="">Home</a></div>
        <div class="col-2"><a href="./menupage.php">Menu</a></div>
        <div class="col-2"><a href="#about">About</a></div>
        <div class="col-2"><a href="#contact">Contact</a></div>
      </div>
    </div>
    <?php 
    if (!isset($_COOKIE['PHPSESSID'])) {
      echo ('<div class="col-3">
      <div class="row justify-content-center gap-3">
       <div class="col-2"><a href="./signin.php">Login</a></div>
      <div class="col-2"><a href="./signup.php">Signup</a></div>
      </div>
    </div>');
  }
  else{ 
  $PHPSESSID = $_COOKIE['PHPSESSID'];
  session_id($PHPSESSID);
  session_start();
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'restaurant';

// Create a connection to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
$sql = "SELECT * FROM user where email='".$_SESSION['email']."'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
  die();
}
$row = mysqli_fetch_assoc($result);
echo '<div class = "col-3 d-flex flex-column align-items-center gap-3">
<img src="./profile/'.$row["pic_path"].'" style="max-width:75px;" alt="Picture"/>
<a class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-align: center; width: fit-content;">
'.$row['first_name'].' '.$row['last_name'].'
</a>
<ul class="dropdown-menu ">'.($row['isAdmin']?'
<li><a class="dropdown-item" href="dashboard.php">DashBoard</a></li>':'').
'<li><a class="dropdown-item" href="logout.php">Logout</a></li> 
</ul>
</div>
';
  }
  
    ?>
  </div>
  <div id="slide" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#slide" data-bs-slide-to="0" class="active">
      </li>
      <li data-bs-target="#slide" data-bs-slide-to="1"></li>
      <li data-bs-target="#slide" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" id="moveon">
      <div class="carousel-item active">
        <img class="w-100" src="../img/photo-1517248135467-4c7edcad34c4.jpeg" alt="First slide">
      </div>
      <div class="carousel-item " id="pizzacon">
        <div class="container">
          <div class="row justify-content-around align-items-center" style="width: 100%;">
            <div class="col-4">
              <div class="text-slide">
              <h1 style="color: white; border-bottom:solid white 2px ;">Hungry Hive</h1>
              <h4 style="color: white;">Fastets Delivery<br> 24/7 service</h4>
              </div>
            </div>
            <div class="col-4">
              <img src="../img/pizzatranslevelmax.png" alt="Second slide" id="pizza">
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item " id="pizzacon">
        <div class="container">
          <div class="row justify-content-around align-items-center" style="width: 100%;">
            <div class="col-4">
              <div class="text-slide">
              <h1 style="color: white; border-bottom:solid white 2px ;">Hungry Hive</h1>
              <h4 style="color: white;">Making People Happy</h4>
              </div>
            </div>
            <div class="col-4">
              <img src="../img/pizzatransgenderlecvelmax.png" alt="Second slide" id="pizza">
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#slide" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#slide" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
    <div class="vincent_top_corners"></div>
  </div>
</body>
</html>
  <div id="discover">
       <div class="overlay" id="about">
        <div class="vincent_bottom_corners"></div>
        <div><h1 class="abouttitle">About Us</h1>
        </div>
        <div>
          <p  class="aboutp">Welcome to Hungry Hive, the ultimate destination for delicious and convenient takeaway meals. Our takeaway restaurant offers a wide
            range of delectable dishes crafted with the finest ingredients and bursting with flavors.
           Whether you're in the mood for hearty burgers,
           mouthwatering pizzas, savory stir-fries, or fresh salads, we have something to satisfy every craving.
           Our dedicated team is committed to providing exceptional service, ensuring that your order is prepared with care and delivered to you promptly.
           Experience the joy of indulging in restaurant-quality meals from the comfort of your own home with Hungry Hive.</p>
        </div>
       </div>
      </div>
      <div class="contact" id="contact">
          <div><h1 class="contacttitle">Contact Us</h1>
          </div>
          <div class="contacticons">
            <a href="#"><i class="fa-brands fa-facebook-f "></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
           <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
           <a href="#"><i class="fa-regular fa-envelope"></i></a>
          </div>
         </div>
</body>

</html>