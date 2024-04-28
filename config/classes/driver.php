<?php
class Driver Extends Database {
    private $db;

    public function __construct()
    {
        $this->db = $this->db_connection();
    }

    public function generateNationalities() {
        $qry = $this->db->prepare("SELECT * FROM countries");
        $qry->execute();
        $countries = $qry->fetchAll();
        for ($i = 0; $i < count($countries); $i++) {
            echo '<option value='.$countries[$i]["iso"].'>'.$countries[$i]["name"].'</option>';
        }      
    }

    public function generateRacingSeries() {
        $qry = $this->db->prepare("SELECT * FROM series");
        $qry->execute();
        $series = $qry->fetchAll();
        for ($i = 0; $i < count($series); $i++) {
            echo '<option value='.$series[$i]["code"].'>'.$series[$i]["name"].'</option>';
        }         
    }

    public function getDriverData($id) {
        $qry = $this->db->prepare("SELECT * FROM drivers WHERE id = :id");
        $qry->bindParam(':id', $id);
        $qry->execute();
        $data = $qry->fetchAll();
        return $data[0];
    }

    public function addDriver() {
        $name = strip_tags($_POST['fullname']);
        $nationality = strip_tags($_POST['nationality']);
        $birthday = strip_tags($_POST['birthday']);
        $series = strip_tags($_POST['series']);
        $team = strip_tags($_POST['team']);
        $wiki = strip_tags($_POST['wiki']);

        if($name == "" || $nationality == "" || $birthday == "" || $series == "" || $team == "") {
            $err = "Not enough details provided.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }

        $qry = $this->db->prepare('SELECT name FROM drivers WHERE name = :name');
        $qry->bindParam(':name', $name);
        $qry->execute();
        if ($qry->rowCount() > 0) {
            $err = "Driver with this name already exists.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;   
        } 

        $qry = $this->db->prepare("SELECT name FROM countries WHERE iso = :iso");
        $qry->bindParam(":iso", $nationality);
        $qry->execute();
        if($qry->rowCount() == 0) {
            $err = "Incorrect nationality.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        } else {
            $nationality = $qry->fetchAll();
            $nationality = $nationality[0]["name"];
        }

        $qry = $this->db->prepare("SELECT name FROM series WHERE code = :code");
        $qry->bindParam(":code", $series);
        $qry->execute();
        if($qry->rowCount() == 0) {
            $err = "Incorrect series.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        } else {
            $series = $qry->fetchAll();
            $series = $series[0]["name"];
        }

        $date_before = new DateTime('1944-01-01');
        $date_selected = new DateTime($birthday);
        $date_after = new DateTime('2005-12-31');

        if ($date_selected < $date_before || $date_selected > $date_after) {
            $err = "Incorrect date.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;          
        }

    
        $target_dir = "../assets/img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = false;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if(basename($_FILES["image"]["name"]) == null) {
            $target_file = "../assets/img/stig.webp";
        } else {
            // Check if its a true image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
    
            // Check if the file is true image, is smaller than 20MB and is either JPG, JPEG or PNG.
            if ($check && $_FILES["image"]["size"] < 2000000 && ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")) {
                $uploadOk = true;
            } 
        
            if ($uploadOk) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            } else {
                $target_file = "../assets/img/stig.webp";
            }       
        }
    
        try{
            $qry = $this->db->prepare("INSERT INTO drivers (name, nationality, birthday, series, team, wiki_page, pic_address, added_by) 
            VALUES (:name, :nationality, :birthday, :series, :team, :wiki, :pic_address, :added_by)");
            $qry->bindParam(':name', $name);
            $qry->bindParam(':nationality', $nationality);
            $qry->bindParam(':birthday', $birthday);
            $qry->bindParam(':series', $series);
            $qry->bindParam(':team', $team);
            $qry->bindParam(':wiki', $wiki);
            $qry->bindParam(':pic_address', $target_file);
            $qry->bindParam(':added_by', $_SESSION['id']);
            $qry->execute(); 
        } catch(PDOException $e) {
            echo $e->getMessage();
        } 
    
        header("Location: database.php");
        exit;
    }

    public function generateDrivers() {
        $drivers = $this->getAllDrivers();
    
        if (count($drivers) == 0) {
            echo '<div class="d-flex justify-content-center text-light">
                  <h1 class="form-box text-light">Databáza je zatiaľ prázdna.</h1>
                  </div>';
        } else {
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 ps-5 pe-5">'; 
            for ($i = 1; $i <= count($drivers); $i++) {
                echo '<div class="col">
                            <div class="d-flex flex-column align-items-center box p-3">
                            <h1>'.$drivers[$i-1]['name'].'</h1>
                            <p>Nationality: '.$drivers[$i-1]['nationality'].'</p>
                            <p>Birthday: '.$drivers[$i-1]['birthday'].'</p>
                            <p>Racing Series: '.$drivers[$i-1]['series'].'</p>
                            <p>Racing team: '.$drivers[$i-1]['team'].'</p>';
                if ($drivers[$i-1]['wiki_page'] != null || $drivers[$i-1]['wiki_page'] != "") {
                    echo '<a href="'.$drivers[$i-1]['wiki_page'].'"><img src="'.$drivers[$i-1]['pic_address'].'" class="responsive-img"></a>';
                } else {
                    echo '<img src="'.$drivers[$i-1]['pic_address'].'" class="responsive-img">';
                }
                    echo '</div>
                        </div>';
            }
            echo '</div>';
        }
    }

    public function getAllDrivers() {
        $qry = $this->db->prepare('SELECT * FROM drivers');
        $qry->execute();
        $data = $qry->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getUserNameFromDriver($driverId) {
        $qry = $this->db->prepare("SELECT username FROM users JOIN drivers ON drivers.added_by = users.id WHERE users.id = :uid");
        $qry->bindParam(':uid', $driverId);
        $qry->execute();
        $username = $qry->fetchAll();
        if ($qry->rowCount() == 0) {
            return "Removed account";
        }
        return $username;
    }

    public function generateDriversTable() {
        $drivers = $this->getAllDrivers();
        echo '<thead>
                <tr class="text-center">
                <th colspan="5">Users</th>
                </tr>
              </thead>
              <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Added by</th>
                <th colspan="2">Action</th>
                </tr>
              </thead>
             <tbody>';
        for ($i = 0; $i < count($drivers); $i++) {
            $u = $this->getUserNameFromDriver($drivers[$i]['added_by']);
            if ($u != "Removed account") {
              $u = $u[0]['username'];  
            }
            echo '<tr>
                  <td scope="row">'.$drivers[$i]['id'].'</td>
                  <td>'.$drivers[$i]['name'].'</td>
                  <td>'.$u.'</td>
                  <form action="" method="post">
                  <td><button type="submit" class="admin-button" name="removedriver" value="'.$drivers[$i]['id'].'"/>Remove Driver</td>
                  </form>';
            if  ($drivers[$i]['wiki_page'] == null) {
                echo '<form action="../templates/driver_edit.php" method="post">
                      <td><button type="submit" class="admin-button" name="edit" value="'.$drivers[$i]['id'].'"/>Add Wikipedia page</td>
                      </form>';
            } else {
                echo '<td></td>';
            }
                echo '</tr>';
        }
    }

    public function removeDriver($id) {
        $qry = $this->db->prepare("DELETE FROM drivers WHERE id = :did");
        $qry->bindParam(':did', $id);
        $qry->execute();
        $suc = "Driver removed.";
        header("Location: ../templates/success.php?success=".$suc."");
        exit;
    }

    public function updateWiki($id) {
        $wiki = strip_tags($_POST['wiki-update']);
        if ($wiki == null) {
            $err = "No wiki provided.";
            header("Location: ../templates/error.php?error=".$err."");
            exit;
        }
        $qry = $this->db->prepare("UPDATE drivers SET wiki_page = :wiki WHERE id = :did");
        $qry->bindParam(':wiki', $wiki);
        $qry->bindParam(':did', $id);
        $qry->execute();
        $suc = "Wikipedia updated.";
        header("Location: ../templates/success.php?success=".$suc."");
        exit;
    }
} 
?>