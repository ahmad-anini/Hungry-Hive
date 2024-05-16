<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/resturantsignin.css">
    <title>Resturant</title>
    
</head>
<body>
<?php 
    if (isset($_COOKIE['PHPSESSID'])) { 
            die("<a style='color:#fff' href='/'>You Are Already Logged In.</a>");   
        }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $servername = "localhost";
        $username = "root";
        $passworddb = "";
        $database = "restaurant";

        $email = $password = "";
        $email = testinput($_POST["email"]);
        $password = testinput($_POST["password"]);
    
        if(check($email) && check($password)){
            echo "<a href='/'>SOMETHING WENT WRONG</a>";
            die();
        }

        $conn = new mysqli($servername, $username, $passworddb, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT email,password,isAdmin FROM user where email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die("Error");
        }
        $row = mysqli_fetch_assoc($result);
        $email_r = $password_r = $isAdmin_r =  '';
        if ($row) {
            $email_r = $row['email'];
            $password_r = $row['password'];
            $isAdmin_r = $row['isAdmin'];
        } else {
            echo "<a href='/'>NO Matching Records Found</a>";
            die();
        }
        if($password_r == $password){
            session_start();
            $_SESSION["isAdmin"] = $isAdmin_r;
            $_SESSION["email"] = $email_r;
            $session_id = session_id();
            setcookie('PHPSESSID',$session_id);
            header("Location: /");
        }else{
            echo "password not matching";
            die();
        }
        mysqli_close($conn);
        die();
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
        <div id="sgnup">
            <form id="signup" name="signup" action="" method="post" onsubmit="alrt(event)"> 
                <label> Email</label>
                <input type="email" name="email" placeholder="Email" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Password" id="password" >
                </p>
                <input type="submit" value="Sign In" id="btn" >
                <p> I dont have an account</p>
                <a href="./signup.php">Create one </a>
            </form>
        </div>
      
</body>
</html>