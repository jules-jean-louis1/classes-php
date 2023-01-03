<?php
class Userpdo
{
    public $login;
    public $password;
    public $email;
    public $firstname;
    public $lastname;
    protected $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        }
    }

    public function register($login,$password,$email,$firstname,$lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $query = $this->pdo->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (:login, :password, :email, :firstname, :lastname)");
        $query->execute(array(
            'login' => $login,
            'password' => $password,
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname
        ));

        $query_check = $this->pdo->prepare("SELECT login FROM utilisateurs WHERE login = :login");
        $query_check->execute(array(
            'login' => $login
        ));
        

    }
}
?>