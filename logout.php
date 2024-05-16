<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
</head>
<body>
    <?php 
    if (!isset($_COOKIE['PHPSESSID'])) {
        header("Location: /");
        die();
    }
    $PHPSESSID = $_COOKIE['PHPSESSID'];
  session_id($PHPSESSID);
  session_start();
    session_destroy();    
    setcookie('PHPSESSID',"",time()-6000);
    header("Location: /");

    ?>
</body>
</html>