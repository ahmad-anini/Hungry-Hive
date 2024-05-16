<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/menupage.css">
</head>

<body>
  <div class="row align-items-center " id="row">
    <div class="col-3">
      <p style="margin-left: 30px;"> <i class="fa-solid fa-mobile-screen-button"></i> 2671194</p>
    </div>
    <div class="text-center col-6">
      <img src="../img/res.png" id="img" alt="">
      <div class="row justify-content-center gap-4">
        <div class="col-2 text-center"><a href="./">Home</a></div>
        <div class="col-2 text-center"><a href="">Menu</a></div>
        <div class="col-2 text-center"><a href="./#about">About</a></div>
        <div class="col-2 text-center"><a href="./#contact">Contact</a></div>
      </div>
    </div>
    <a  href="" class="col-3 shoppingcartlogo text-center">
      <i class="fa-solid fa-cart-shopping fs-5" style="margin-bottom: 30px; color: white;"></i>
      <span class="quantity">0</span>
    </a>
  </div>
  <div id="discover">
    <div id="overlay">
      <h1>Discover Our Menu</h1>
    </div>
  </div>
  <div class="container" id="cards">
    <div class="row justify-content-center gap-4 " id="menu" style="height: 50px;">
      <div class="col-2 text-center" ><a href="#" id="burgers">Burgers</a></div>
      <div class="col-2 text-center"><a href="#" id="deserts">Deserts</a></div>
      <div class="col-2 text-center"><a href="#" id="drinks">Drinks</a></div>
      <div class="col-2 text-center"><a href="#" id="pizzas">Pizzas</a></div>
      <div class="col-2 text-center"><a href="#" id="salads">Salads</a></div>
    </div>
    <form action="">
    <div class="row justify-content-center burgers food" style="gap: 100px;">
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/roma.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">ROMA</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/balckburger.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">NEAPOLITANO</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/diablo.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">DIABLO</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni, all-natural
            Italian sausage, slow-roasted ham, hardwood smoked bacon, seasoned pork and beef. Best an our Hand Tossed
            crust. With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles. Instead of
            following trends, we set them. We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/roma.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">MILANO</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/burger1.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">Hungry Hive</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/roma.png" alt=""></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">MILANO</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center pizzas food" style="gap: 100px;">
      <div class=" col-3 card" style="width: 200px; margin-top: 30px;" id="card">
        <a href="#" class="btn btn-primary" id="cardbtn"> <img src="../img/roma.png" alt="" class="img"></a>
        <div class="card-body" id="cardbody">
          <h4 class="card-title" id="title">ROMA</h4>
          <p class="card-text " id="discription">Classic marinara sauce, authentic old-world pepperoni,
            all-natural Italian sausage, slow-roasted ham,
            hardwood smoked bacon, seasoned pork and beef.
            Best an our Hand Tossed crust.
            With more than 50 years of experience under our belts,
            we understand how to best serve our customers through tried and true service principles.
            Instead of following trends, we set them.
            We create food we’re proud to serve and deliver it fast, with a smile.</p>
        </div>
        </div>
      </div>
  </form>
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
  <script src="../javascript/menu.js"></script>
</body>
</html>