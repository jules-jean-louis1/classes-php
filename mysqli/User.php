<?php
class User
{
    //déclaration des attribus
    public $id;
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;


    //déclaration des méthodes
    public function __construct()
    {
        
    }

    public function register($id, $login, $password, $email, $firstname, $lastname)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        require_once('bdd_connect.php');
        $user_check = "SELECT login FROM utilisateurs WHERE login = '$login'; ";
        $check = mysqli_query($connect, $user_check);
        $request = mysqli_query($connect, "INSERT INTO utilisateurs SET login='$login', password='$password', email='$email', firstname='$firstname', lastname='$lastname'");
        
        if (mysqli_num_rows($check) > 0) {
            echo "Ce login est déjà utilisé";
        } else {
            if ($request) {
                echo "Inscription réussie";
            } else {
                echo "Erreur";
            }
        }

    }

    public function connect($login,$password)
    {
        require('bdd_connect.php');
        session_start();
        $queryLogin = mysqli_query($connect, "SELECT `login` FROM `utilisateurs` WHERE login='".$_POST['login']."'");

        if(mysqli_num_rows($queryLogin)){
            $queryPassword = mysqli_query($connect, "SELECT `password` FROM `utilisateurs` WHERE `login`= '".$_POST['mdp']. "'"); 
        
                if(mysqli_num_rows($queryPassword)){
                    echo "Vous êtes connecté";
                    $_SESSION['login']=$_POST['login'];
                    
                }else {
                    echo "Mot de passe incorrect";
                }
        }
    }

    public function disconnect()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    public function delete()
    {
        require_once('bdd_connect.php');
        session_start();
        session_destroy();

        $this->id = $_SESSION['id'];
        $queryDelete = mysqli_query($connect, "DELETE FROM utilisateurs WHERE id = $this->id");   
    }

    public function update($login,$password,$email,$firstname,$lastname)
    {
        require_once('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryUpdate = mysqli_query($connect, "UPDATE utilisateurs SET login='$login', password='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE id = $this->id");

        if ($queryUpdate) {
            echo "Modification réussie";
        } else {
            echo "Erreur";
        }
    }

    public function isConnected()
    {
        require('bdd_connect.php');
        session_start();
        if (isset($_SESSION['login'])) {
            echo "Vous êtes connecté";
        } else {
            echo "Vous n'êtes pas connecté";
        }
    }

    public function getALLInfos()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryInfos = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryInfos);
        return $result;
    } 

    public function getLogin()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryLogin = mysqli_query($connect, "SELECT login FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryLogin);
        return $result;
    }
    public function getPassword()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryPassword = mysqli_query($connect, "SELECT password FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryPassword);
        return $result;
    }

    public function getEmail()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryEmail = mysqli_query($connect, "SELECT email FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryEmail);
        return $result;
    }

    public function getFirstname()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryFirstname = mysqli_query($connect, "SELECT firstname FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryFirstname);
        return $result;
    }
    public function getLastname()
    {
        require('bdd_connect.php');
        session_start();
        $this->id = $_SESSION['id'];
        $queryLastname = mysqli_query($connect, "SELECT lastname FROM utilisateurs WHERE id = $this->id");
        $result = mysqli_fetch_assoc($queryLastname);
        return $result;
    }
}
?>