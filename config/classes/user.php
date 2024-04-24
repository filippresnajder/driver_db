<?php
class User Extends Database {
    private $db;

    public function __construct()
    {
        $this->db = $this->db_connection();
    }

    public function Register() {
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
    
        $qry = $this->db->prepare('SELECT username, email FROM users WHERE username = :username OR email = :email');
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
            $qry = $this->db->prepare("INSERT INTO users (username, email, password) 
            VALUES (:username, :email, :password)");
            $qry->bindParam(':username', $username);
            $qry->bindParam(':email', $email);
            $qry->bindParam(':password', $password);
            $qry->execute(); 
        } catch(PDOException $e) {
            echo $e->getMessage();
        } 
    
        $this->Login();
    }

    public function Login() {    
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
    
        if($username == "" || $password == "") {
            $err = "All data must be filled out.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
        
        $data = $this->getUserData($username);
        
        if (!password_verify($password, $data['password'])) { // check password hash 
            $err = "Incorrect password.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
        
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        
        header("Location: ../index.php");
        exit;
    }
    
    public function Logout() {
        if(isset($_SESSION['id'])) {
            unset($_SESSION['id']);
        }
        header("Location: ../index.php");
        exit;
    }


    public function getUserData($arg) {
        $qry = $this->db->prepare('SELECT * FROM users WHERE username = :username');
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

    public function getAllUsers() {
        $qry = $this->db->prepare('SELECT * FROM users');
        $qry->execute();
        $data = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function generateUserTable() {
        $users = $this->getAllUsers();
        echo '<thead>
                <tr class="text-center">
                <th colspan="4">Users</th>
                </tr>
              </thead>
              <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
                </tr>
              </thead>
             <tbody>';
        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]['role'] == 1) $r = "Admin";
            else $r = "User";
            echo '<form action="" method="post">
                  <tr>
                  <td scope="row">'.$users[$i]['id'].'</td>
                  <input type="hidden" name=userid value='.$users[$i]['id'].'>
                  <td>'.$users[$i]['username'].'</td>
                  <td>'.$r.'</td>
                  <td><input type="submit" class="admin-button" name="remove" value="Remove Account"/></td>
                  </tr>
                  </form>';
        }
    }

    public function removeUser($user_id) {
        if ($user_id == $_SESSION['id']) {
            $err = "Can not remove your own account.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
        $qry = $this->db->prepare("DELETE FROM users WHERE id = :uid");
        $qry->bindParam(':uid', $user_id);
        $qry->execute();
        $suc = "User removed.";
        header("Location: ../templates/success.php?success=".$suc."");
        exit;
    }
}
?>