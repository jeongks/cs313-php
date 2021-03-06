<?php
    session_start();
    // try{
    //     $dbUrl = getenv('DATABASE_URL');
        
    //     $dbOpts = parse_url($dbUrl);
        
    //     $dbHost = $dbOpts["host"];
    //     $dbPort = $dbOpts["port"];
    //     $dbUser = $dbOpts["user"];
    //     $dbPassword = $dbOpts["pass"];
    //     $dbName = ltrim($dbOpts["path"],'/');
        
    //     $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
    //     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
    // catch (PDOException $ex){
    //     echo 'Error!: ' . $ex->getMessage();
    //     die();
    // }
    function dbconnect() {
        $db = NULL;
        try{
            $dbUrl = getenv('DATABASE_URL');
            
            $dbOpts = parse_url($dbUrl);
            
            $dbHost = $dbOpts["host"];
            $dbPort = $dbOpts["port"];
            $dbUser = $dbOpts["user"];
            $dbPassword = $dbOpts["pass"];
            $dbName = ltrim($dbOpts["path"],'/');
            
            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex){
            echo 'Error!: ' . $ex->getMessage();
            die();
        }
        return $db;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="username">username</label>
        <input type="text" name="username" id="username"/>
        <label for="password">password</label>
        <input type="password" name="password" id="password"/>
        <input type="submit" id="submit" name="submit" value="sign in"/>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $username = filter_input(INPUT_POST,"username", FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, "password" , FILTER_SANITIZE_STRING);
            
            // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $db = dbconnect();

            $sql = "SELECT id, username, password FROM login WHERE username = :username";
            $stmt = $db -> prepare($sql);
            $stmt -> bindValue(':username',$username, PDO::PARAM_STR);
            $stmt -> execute();
            $row = $stmt -> fetch();
                    
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                header('Location: welcome.php');
                die();
            } else {
                header('Location: signin.php');
                die();
            }
        }
            
        
        
    ?>
    
</body>
</html>