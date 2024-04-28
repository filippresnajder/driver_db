<?php
class Contact extends Database {
    private $db;
    
    public function __construct() {
        $this->db = $this->db_connection();
    }

    public function insertText() {
        if (isset($_POST["send"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $text = $_POST["message"];

            if($name == "" || $email == "" || $text == "") {
                $err = "All details must be provided.";
                header("Location: ../templates/error.php?error=".$err."");
                exit;
            }

            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $err = "Incorrect email format.";
                header("Location: ../templates/error.php?error=".$err."");
                exit;
            }

            if (strlen($name) < 3 || strlen($name) > 30) {
                $err = "Name must have betweeen 3 to 30 characters.";
                header("Location: ../templates/error.php?error=".$err."");
                exit;
            }
            if (strlen($text) > 500) {
                $err = "Text must have less than 500 characters.";
                header("Location: ../templates/error.php?error=".$err."");
                exit;
            }

            try{
                $qry = $this->db->prepare("INSERT INTO contact (name, email, message) 
                VALUES (:name, :email, :message)");
                $qry->bindParam(':name', $name);
                $qry->bindParam(':email', $email);
                $qry->bindParam(':message', $text);
                $qry->execute(); 
            } catch(PDOException $e) {
                echo $e->getMessage();
            } 
        } else {
            $err = "Incorrect action.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
    }

    public function getMessages() {
        $qry = $this->db->prepare('SELECT * FROM contact');
        $qry->execute();
        $data = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function generateContactTable() {
        $messages = $this->getMessages();
        echo '<thead>
                <tr class="text-center">
                <th colspan="4">Messages</th>
                </tr>
              </thead>
              <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
              </thead>
             <tbody>';
        for ($i = 0; $i < count($messages); $i++) {
            echo '<form action="" method="post">
                  <tr>
                  <td scope="row">'.$messages[$i]['id'].'</td>
                  <input type="hidden" name=msgid value='.$messages[$i]['id'].'>
                  <td>'.$messages[$i]['name'].'</td>
                  <td>'.$messages[$i]['email'].'</td>
                  <td><input type="submit" class="admin-button" name="removemessage" value="Remove Message"/></td>
                  </tr>
                  <tr>
                  <td colspan="4" class="text-start">'.$messages[$i]['message'].'</td>
                  </tr>
                  </form>';
        }
    }

    public function removeMessage($id) {
        $qry = $this->db->prepare("DELETE FROM contact WHERE id = :id");
        $qry->bindParam(':id', $id);
        $qry->execute();
        $suc = "Message removed.";
        header("Location: ../templates/success.php?success=".$suc."");
        exit;
    }
}
?>