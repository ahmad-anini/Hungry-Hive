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
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/adminpage.css">
</head>

<body>
    <?php
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
      $id="";
      $id = testinput($_POST["id"]);
      echo $id;
      if(check($id)){
        die("<a style='color:#fff' href='/dashboard.php'>Something went wrong</a>");
      }
      $sql = "DELETE FROM user WHERE id=$id";
      $result = mysqli_query($conn, $sql);
      if (!$result) {echo "<a href='/dashboard.php'>Failed to delete row with ID $id: " . mysqli_error($conn)."</a>"; die();}
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
        <form action="/adduser.php" class="col-3 shoppingcartlogo text-center" method="POST">
            <button type="submit" style="background-color: black; border: none;"><i
                    class="fa-solid fa-user-plus"></i></button>
        </form>
    </div>
    <div class="row align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-2 text-center">
                    <p style="color: black;">User Name</p>
                </div>
                <div class="col-2 text-center">
                    <p style="color: black;">Email</p>
                </div>
                <div class="col-2 text-center">
                    <p style="color: black;">Phone Number
                    </p>
                </div>
                <div class="col-2 text-center">
                    <p style="color: black;">Address</p>
                </div>
            </div>
            <?php
      $sql = "SELECT * FROM user WHERE email != '".$_SESSION['email']."';";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        die();
      }
      while($row = mysqli_fetch_assoc($result)){
        $id= $row['id'];
        $firstName = $row['first_name'];
        $lastName = $row['last_name'];
        $email = $row['email'];
        $phoneNumber = $row['phone_number'];
        $address = $row['address'];
        $username = $firstName." ".$lastName;
        echo '
        <form action="" method="post">
        <div class="row align-items-center" >
            <div class="col-2 text-center"> <p style="color: black;">'.$username.'</p></div>
            <div class="col-2 text-center"><p style="color: black;">'.$email.'</p></div> 
            <div class="col-2 text-center"><p style="color: black;">'.$phoneNumber.'</p></div> 
            <div class="col-2 text-center"><p style="color: black;">'.$address.'</p></div>
            <div class="col range justify-content-end" style="margin-right: 10px;"><input type="hidden" name="id" value="'.$id.'"><button type="submit"  id="remove"> <i class="fa-sharp fa-solid fa-trash" id="icon" ></i></button>
          <button type="submit" formaction="/edituser.php" id="edit"><i class="fa-solid fa-pen" id="icon1"></i></button></div>
        </div>
        </form>

        ';
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
    mysqli_close($conn);
  ?>
        </div>
    </div>
</body>