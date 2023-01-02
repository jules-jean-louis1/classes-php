<?php
class Usert
{
    public $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    public function __construct()
    {

    }

    public function register($login,$password,$email,$firstname,$lastname)
    {
        require('bdd_connect.php');
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $errors = array();
        $valid = 0;
        $user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
        $check = mysqli_query($connect, $user_check);
        
        if (mysqli_num_rows($check) >0 ) {
            $errors[] = "Ce login est déjà utilisé";
            $valid = 1;
        } else {
            if ($valid == 0) {
                $query = mysqli_query($connect, "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')");
                $errors[] = "Inscription réussie"; 
            } else{
                $errors[] = "Erreur";
            }
        }
        return array($login, $password, $email, $firstname, $lastname);
    }

    public function connect($login,$paswword)
    {
        require_once('bdd_connect.php');
        session_start();

        $queryUser = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");
        $user = $queryUser->fetch_all();

        for ($i=0; isset($user[$i]) ; $i++) {
            if ($user[$i][1] == $login && $user[$i][2] == $password) {
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                header('Location: index.php');
            } else {
                echo "Erreur";
            }
        }
        
    }
}
?>