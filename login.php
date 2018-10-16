<?php

class Login {
    
    protected $localhost = 'localhost';
    protected $user ='root';
    protected $pass = '';
    protected $db = 'studytime';
    protected $conn;
    public $errors = array();
    
    
    function __construct() {
        $this->conn = mysqli_connect($this->localhost, $this->user, $this->pass, $this->db);
    }
    protected function checkInput($var) {
        $var = htmlspecialchars($var);
        $var = trim($var);
        $var = stripcslashes($var);
        
        return $var;
    }
    
  
    
  /*  public function insertIntoTb($username ,$password) {
        $username = $this->checkInput($username);
        $password = $this->checkInput($password);
        
   
        if($this->checkErrors($username, $password)) {
            $this->errors = ['Succes'];
        };
        
        $this->checkUsername($username);
    }*/
    
/*    protected function checkErrors($username, $password) {
        if(strlen($username) > 10 || strlen($username) < 5) {
            array_push($this->errors, 'użytkownik musi mieć min. 5 znaków a max. 10 znaków');
            return false;
        }
        if(strlen($password) < 4) {
            array_push($this->errors, 'Hasło musi mieć min. 4 znaki');
            return false;
        }
        
        return true;
        
    }*/
    
    public function checkUser($username, $password) {
        $username = $this->checkInput($username);
        $password = $this->checkInput($password);
        
        $query = "SELECT id FROM users WHERE username = '".$username."' and password='".$password."'";
        $result = mysqli_query($this->conn, $query);
        // print_r($result);
        if($result->num_rows == 1) {
          array_push($this->errors, "zalogowano");
           header('Location: admin_habit.php');
           exit();
            /*echo '<script type="text/javascript">
           window.location = "http://www.localhost/phpclass/admin_habit.php"
      </script>';*/
            return true;
        }
          else {
              array_push($this->errors, "Nieprawidłowy login lub hasło");
              return false;
             // echo 'Nieprawidłowy login lub hasło';
          }
      
    }  //end of checkUsername
}





?>






