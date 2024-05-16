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
  <link rel="stylesheet" href="./css/userpage.css">
</head>
<body>
<?php 

if (!isset($_COOKIE['PHPSESSID'])) {
  die("YOU ARE NOT AUTHORIZED");
}
  $PHPSESSID = $_COOKIE['PHPSESSID'];
  session_id($PHPSESSID);
  session_start();
if(!$_SESSION['isAdmin']){die("<b style='color:#fff'>You are not authorized</b>");}

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $servername = "localhost";
    $username = "root";
    $passworddb = "";
    $database = "restaurant";
    $conn = new mysqli($servername, $username, $passworddb, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $firstName = $lastName = $email = $phoneNumber = $address = $password = $isAdmin = $picture = "";
    $firstName = testinput($_POST["first_name"]);
    $lastName = testinput($_POST["last_name"]);
    $email = testinput($_POST["email"]);
    $phoneNumber = testinput($_POST["phone_number"]);
    $address = testinput($_POST["address"]);
    $password = testinput($_POST["password"]);
    $isAdmin = testinput($_POST["is_admin"]);
    if(check($firstName) && check($lastName) && check($email) && check($phoneNumber) && check($address) && check($password) &&  check($isAdmin) ){
        echo "SOMETHING WENT WRONG";
        die();
    }
    $sql = "SELECT email FROM user where email='". $email. "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "EMAIL IS ALREADY USED";
        die();
    }
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $picture = $_FILES['file'];
        $file_name = $picture['name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        if(!($extension == "png" || $extension == "jpg" || $extension == "jpeg")){
            echo "PLEASE UPLOAD A PICTURE";
            die();
        }
            $file_tmp_name = $picture['tmp_name'];
            $upload_dir = 'profile/';
            if (move_uploaded_file($file_tmp_name, $upload_dir .$email.$picture['name'])) {
                $sql = "INSERT INTO user (first_name, last_name, email, phone_number,address, password,isAdmin,pic_path) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$phoneNumber. "','".$address. "','".$password. "',".$isAdmin. ",'".$email."".$picture['name']. "')";
            } else {
                echo "File upload failed";
                die();
            }
            
        }else{
            $sql = "INSERT INTO user (first_name, last_name, email, phone_number,address, password,isAdmin) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$phoneNumber. "','".$address. "','".$password. "',".$isAdmin. ")";
        }
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                header("Location: /dashboard.php");
                die();
            } else {
                echo "A MYSQL ERROR HAS OCCURED";
            }
        mysqli_close($conn);
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
    ?>
    <div class="row align-items-center " id="row">
        <div class="col-3">
          <p style="margin-left: 30px;"> <i class="fa-solid fa-mobile-screen-button"></i> 2671194</p>
        </div>
        <div class="text-center col-6">
          <img src="./img/res.png" id="img" alt="">
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
            <form id="signup" name="signup" action="" method="post" onsubmit="alrt(event)"> 
                <label > First Name</label>
                <input type="text" name="first_name" class="in" placeholder="First Name" required>
                <label>Last Name</label>
                <input type="text" name="last_name" class="in" placeholder="Last Name" required>
                <label> Email</label>
                <input type="email" name="email"  placeholder="Email" required class="in">
                <label> Phone Number</label>
                <input type="tel" required name="phone_number" class="in" placeholder="Phone Number">
                <label>Address</label>
                <input type="text" required class="in" name="address" placeholder="Address">
                <label>Password</label>
                <input type="password"  placeholder="Password" name="password" id="password" required class="in">
                <label>Privileges</label>
                <select name="is_admin" id="isAdmin" title="Privileges" class="in">
                    <option value="1" selected>Admin</option>
                    <option value="0">User</option>
                </select>
                <label >Picture</label>
                <input type="file" name="file" id="picture" accept=".png,.jpg,.jpeg" class="in">
                <input type="submit" value="Submit" id="btn" >
            </form>
        </div>
</body>