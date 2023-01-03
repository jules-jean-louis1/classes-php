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
        foreach ($errors as $error) {
            echo $error;
        }
        return array($login, $password, $email, $firstname, $lastname);
    }

    public function connect($login,$password)
    {
        require_once('bdd_connect.php');
        $this->login = $login;
        $this->password = $password;

        $queryUser = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'");
        $user = $queryUser->fetch_all();

        for ($i=0; isset($user[$i]) ; $i++) {
            if ($user[$i][1] == $login && $user[$i][2] == $password) {
                $_SESSION['login'] = $user[$i][1];
                $_SESSION['password'] = $user[$i][2];
                $_SESSION['email'] = $user[$i][3];
                $_SESSION['firstname'] = $user[$i][4];
                $_SESSION['lastname'] = $user[$i][5];
                header('Location: index.php');
            } else {
                echo "Erreur";
            }
        }
    }
    public function disconnect()
    {
        session_destroy();
        header('Location: index.php');
    }
    public function delete()
    {
        require_once('bdd_connect.php');

        $query = mysqli_query($connect, "DELETE FROM utilisateurs WHERE login='".$_SESSION['login']."'");
        session_destroy();
        header('Location: index.php');
    }
    public function update($login,$password,$firstname,$lastname)
    {
        require_once('bddd_connect.php');
        $this->login = $login;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $query = mysqli_query($connect, "UPDATE utilisateurs SET login='$login', password='$password', firstname='$firstname', lastname='$lastname' WHERE login='$login'");

        if ($query) {
            $_SESSION['login'] = $_POST['uplogin'];
            $_SESSION['email'] = $_POST['upemail'];
            $_SESSION['firstname'] = $_POST['upfirstname'];
            $_SESSION['lastname'] = $_POST['uplastname'];
            echo "Modification réussie";
        } else {
            echo "Erreur";
        }
    }
    public function isConnected()
    {
        if (isset($_SESSION['login']) != null) {
            return true;
        } else {
            return false;
        }
    }
    public  function getALLInfos()
    {
        if (isset($_SESSION['login']) != null) {
            return array($_SESSION['login'], $_SESSION['email'], $_SESSION['firstname'], $_SESSION['lastname']);
        } else {
            return false;
        }
    }
    public function getLogin()
    {
        if (isset($_SESSION['login']) != null) {
            return $_SESSION['login'];
        } else {
            return false;
        }
    }
    
}
?>