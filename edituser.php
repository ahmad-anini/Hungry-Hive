<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adminpage</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/userpage.css">
</head>
<body>
  <?php 
  if($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo '<a href="/dashboard.php">YOU CAN\'T ACCESS THIS PAGE LIKE THAT.</a>';
    die();
  }
      if (!isset($_COOKIE['PHPSESSID'])) { 
        die("<a style='color:#fff' href='/signin.php'>Login again</a>");   
      }
      $session_id = $_COOKIE['PHPSESSID'];
      session_id($session_id);
      session_start();
      
      $servername = "localhost";
      $username = "root";
      $passworddb = "";
      $database = "restaurant";
      
      $conn = new mysqli($servername, $username, $passworddb, $database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      if(!$_SESSION['isAdmin']){die("<a style='color:#fff' href='/home.php'>You are not authorized</a>");}
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $id = $action = '';
      $id = testinput($_POST["id"]);
      
      if(isset($_POST["action"])){
      $action = testinput($_POST["action"]);
      }
      if(check($id)){die("<a style='color:#fff' href='/dashboard.php'>Something went wrong</a>");}
      if($action == "edit"){
        $firstName = $lastName = $email = $phoneNumber = $address = $password = $isAdmin = "";
        $firstName = testinput($_POST["first_name"]);
        $lastName = testinput($_POST["last_name"]);
        $email = testinput($_POST["email"]);
        $phoneNumber = testinput($_POST["phone_number"]);
        $address = testinput($_POST["address"]);
        $password = testinput($_POST["password"]);
        $isAdmin = testinput($_POST["is_admin"]);
        
        if(check($firstName) && check($lastName) && check($email) && check($phoneNumber) && check($address) && check($password) && check($isAdmin) ){
            die("<a style='color:#fff' href='/dashboard.php'>SOMETHING WENT WRONG</a>");
        }
        $sql = "SELECT email FROM user where id=$id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $email_r = "";
        if($row){
          $email_r = $row['email'];
        }else{
          echo "<a style='color:#fff' href='/dashboard.php'>Error</a>";
          die();
        }
        if($email_r != $email){
          $sql = "SELECT email FROM user where email='$email' and email=''";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
              echo "<a style='color:#fff' href='/dashboard.php'>EMAIL IS ALREADY USED</a>";
              die();
          }
        }
        $sql = "UPDATE user SET first_name='$firstName',last_name='$lastName', email='$email', phone_number='$phoneNumber', address='$address', password='$password', isAdmin=$isAdmin WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (!$result) { die("<b style='color:#fff'>Failed to update row with ID $id: mysqli_error($conn)</b>");}
        header('location: /dashboard.php');
      }else{
        $sql = "SELECT * FROM user WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          die();
        }
        $row = mysqli_fetch_assoc($result);
        $firstName_r = $lastName_r = $email_r = $phoneNumber_r = $address_r = $password_r = $isAdmin_r =  "";
        $firstName_r = $row["first_name"];
        $lastName_r = $row["last_name"];
        $email_r = $row["email"];
        $phoneNumber_r = $row["phone_number"];
        $address_r = $row["address"];
        $password_r = $row["password"];
        $isAdmin_r = $row["isAdmin"];
      }
    }
    function testinput($data){
      $data = htmlspecialchars($data);
      $data = trim($data);
      $data = stripcslashes($data);
      return $data;
    }
  
    function check($data){
        if(empty($data)){
            return true;
        }
        return false;
    }
    echo '
    <div class="row align-items-center " id="row">
    <div class="col-3">
      <p style="margin-left: 30px;"> <i class="fa-solid fa-mobile-screen-button"></i> 2671194</p>
    </div>
    <div class="text-center col-6">
      <img src="/img/res.png" id="img" alt="">
      <div class="row justify-content-center gap-4">
        <div class="col-2 text-center"><a href="#">Home</a></div>
        <div class="col-2 text-center"><a href="#">Menu</a></div>
        <div class="col-2 text-center"><a href="#">About</a></div>
        <div class="col-2 text-center"><a href="#">Contact</a></div>
      </div>
    </div>
    <a  href="" class="col-3 shoppingcartlogo text-center">
      <i class="fa-solid fa-cart-shopping fs-5" style="margin-bottom: 30px; color: white;"></i>
      <span class="quantity">0</span>
    </a>
</div>
        <form id="signup" name="signup" action="" method="post" onsubmit="alrt(event)"> 
            <input type="hidden" name="id" value="'.$id.'">
            <label > First Name</label>
            <input type="text" class="in" name="first_name" placeholder="First Name" value ="'.$firstName_r.'">
            <label>Last Name</label>
            <input type="text" class="in" name="last_name" placeholder="Last Name" value ="'.$lastName_r.'">
            <label> Email</label>
            <input type="email" placeholder="Email" name="email" required class="in" value="'.$email_r.'">
            <label> Phone Number</label>
            <input type="tel" required  class="in" name="phone_number" placeholder="Phone Number" value="'.$phoneNumber_r.'">
            <label>Address</label>
            <input type="text" required class="in" name="address" placeholder="Address" value="'.$address_r.'">
            <label>Password</label>
            <input type="password"  placeholder="Password" name="password" id="password" required class="in" value="'.$password_r.'">
            <label>Privileges</label>
            <select name="is_admin" id="isAdmin" title="Privileges" class="in">
                <option value="1"'.($isAdmin_r?"selected":"").'>Admin</option>
                <option value="0"'.($isAdmin_r?"":"selected").'>User</option>
            </select>
            <input type="submit" name="action" value="edit"  id="btn" >
  </form>
    ';
    mysqli_close($conn);
  ?>
</body>