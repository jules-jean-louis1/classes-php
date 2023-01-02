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

        $adduser_r = mysqli_query($connect, "INSERT INTO utilisateurs SET login='$login', password='$password', email='$email', firstname='$firstname', lastname='$lastname'");

    }
}
?>