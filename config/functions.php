<?php
function getConnection() {
    $username = "root";
    $password = "";
    try {
    $conn = new PDO("mysql:host=localhost;dbname=driverbase", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
}

function getUserData($arg) {
    $conn = getConnection();
    if (!$conn) {
        $err = "Could not connect to the database.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    $qry = $conn->prepare('SELECT * FROM users WHERE username = :username');
    $qry->bindParam(':username', $arg);
    $qry->execute();

    if ($qry->rowCount() == 0) {
        $err = "User does not exist.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }
    
    $data = $qry->fetchAll(PDO::FETCH_ASSOC);
    $data = $data[0];

    return $data;
}


function Register() {
    $conn = getConnection();
    if (!$conn) {
        $err = "Could not connect to the database.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }
    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $confirm_password = strip_tags($_POST['confirm_password']);

    if($username == "" || $email == "" || $password == "" || $confirm_password == "") {
        $err = "All data must be filled out.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    if (strlen($username) < 3 || strlen($username) > 12) {
        $err = "Username must have betweeen 3 to 12 characters.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Incorrect email format.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    if ($password != $confirm_password) {
        $err = "Passwords don't match.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    if (strlen($password) < 6 || strlen($password) > 18) {
        $err = "Password must have between 6 to 18 characters.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $qry = $conn->prepare('SELECT username, email FROM users WHERE username = :username OR email = :email');
    $qry->bindParam(':username', $username);
    $qry->bindParam(':email', $email);
    $qry->execute();

    if ($qry->rowCount() > 0) {

        $dupe = $qry->fetchAll(PDO::FETCH_ASSOC);
        $dupe = $dupe[0];

        if ($dupe['email'] == $email) {
            $err = "Email is in use.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
        if ($dupe['username'] == $username) {
            $err = "This user already exists.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }

    } 

    try{
        $qry = $conn->prepare("INSERT INTO users (username, email, password) 
        VALUES (:username, :email, :password)");
        $qry->bindParam(':username', $username);
        $qry->bindParam(':email', $email);
        $qry->bindParam(':password', $password);
        $qry->execute(); 
    } catch(PDOException $e) {
        echo $e->getMessage();
    } 

    Login();
}

function Login() {
    $conn = getConnection();
    if (!$conn) {
        $err = "Could not connect to the database.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }

    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    if($username == "" || $password == "") {
        $err = "All data must be filled out.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }
    
    $data = getUserData($username);
    
    if (!password_verify($password, $data['password'])) { // check password hash 
        $err = "Incorrect password.";
        header("Location: ../templates/error.php?error=".$err."");
        exit;
    }
    
    session_start();
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['username'];
    
    header("Location: ../index.php");
    exit;
}

function Logout() {
    session_start();
    if(isset($_SESSION['id'])) {
        unset($_SESSION['id']);
    }
    header("Location: ../index.php");
    exit;
}
?>