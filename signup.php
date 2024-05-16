<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/resturantsignup.css">
    <title>Resturant</title>
    
</head>
<body>
    <?php 
        if (isset($_COOKIE['PHPSESSID'])) { 
            die("<a style='color:#fff' href='/'>You Are Already Logged in.</a>");   
        }
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
    $confirmPassword = testinput($_POST["confirm_password"]);
    $isAdmin = testinput($_POST["is_admin"]);
    if(check($firstName) && check($lastName) && check($email) && check($phoneNumber) && check($address) && check($password) && check($confirmPassword) && check($isAdmin) ){
        echo "<a href='/'>SOMETHING WENT WRONG</a>";
        die();
    }
    $sql = "SELECT email FROM user where email='". $email. "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<a href='/'>EMAIL IS ALREADY USED</a>";
        die();
    }
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $picture = $_FILES['file'];
        $file_name = $picture['name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        if(!($extension == "png" || $extension == "jpg" || $extension == "jpeg")){
            echo "<a href='/'>PLEASE UPLOAD A PICTURE</a>";
            
            die();
        }
            $file_tmp_name = $picture['tmp_name'];
            $upload_dir = 'profile/';
            if (move_uploaded_file($file_tmp_name, $upload_dir .$email.$picture['name'])) {
                $sql = "INSERT INTO user (first_name, last_name, email, phone_number,address, password,isAdmin,pic_path) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$phoneNumber. "','".$address. "','".$password. "',".$isAdmin. ",'".$email."".$picture['name']. "')";
            } else {
                echo "<a href='/'>FILE UPLOAD FAILED</a>";
                die();
            }
            
        }else{
            $sql = "INSERT INTO user (first_name, last_name, email, phone_number,address, password,isAdmin) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$phoneNumber. "','".$address. "','".$password. "',".$isAdmin. ")";
        }
            if (mysqli_query($conn, $sql)) {
                header("Location: /signin.php");
                die();
            } else {
                echo "<a href='/'>MYSQL ERROR HAS OCCURED</a>";
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
        <div id="sgnup">
            <form id="signup" name="signup" action="" method="post" onsubmit="alrt(event)" enctype="multipart/form-data"> 
                <label> First Name</label>
                <input type="text" name="first_name" placeholder="First Name" required>
                <label>Last Name </label>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <label> Email</label>
                <input type="email" name="email" placeholder="Email" required>
                <label> Phone Number</label>
                <input type="tel" name="phone_number" placeholder="Phone Number" required >
                <label>Address</label>
                <input type="text" name="address" placeholder="Address" required>
                <label>Password</label>
                <input type="password" name="password"  placeholder="Password" id="password" required>
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirmpassword" required>
                <span id="message"></span>
                <label>Privileges</label>
                <select name="is_admin" id="isAdmin" title="Privileges">
                    <option value="1" selected>Admin</option>
                    <option value="0">User</option>
                </select>
                <label >Picture</label>
                <input type="file" name="file" id="picture" accept=".png,.jpg,.jpeg">
                <input type="submit" value="Sign Up" id="btn" >
                <p> Already have an account?  <a href="./signin.php">Sign In</a></p>
               
            </form>
        </div>
        <script src="./javascript/resturantsignup.js"></script>
</body>
</html>