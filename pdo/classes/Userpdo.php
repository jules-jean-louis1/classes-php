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
        // connexion à la base de données pour plesk
        /* try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=jules-jean-louis_classes', 'jjl-classes', 'wAr6r6$81');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit;
        } */
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
    }

    public function connect($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

        $query = $this->pdo->prepare("SELECT * FORM utilisateurs WHERE login = :login AND password = :password");
        $query->execute(
            array(
                'login' => $login,
                'password' => $password
            )
        );
        $user = $query->fetchall(PDO::FETCH_ASSOC);

        for ($i=0; isset($user[$i]) ; $i++) {
            if ($user[$i]['login'] == $login && $user[$i]['password'] == $password) {
                $_SESSION['login'] = $user[$i]['login'];
                $_SESSION['password'] = $user[$i]['password'];
                $_SESSION['email'] = $user[$i]['email'];
                $_SESSION['firstname'] = $user[$i]['firstname'];
                $_SESSION['lastname'] = $user[$i]['lastname'];
                echo "Vous êtes connecté";
            } else {
                echo "Erreur de connexion";
            }
        }
        
    }
    public function disconnect()
    {
        session_destroy();
        echo "Vous êtes déconnecté";
    }
    public function delete()
    {
        $query = $this->pdo->prepare("DELETE FROM utilisateurs WHERE login = :login");
        $query->execute(array('login' => $_SESSION['login']));
    }
    public function update($login, $password, $email, $firstname, $lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $query = $this->pdo->prepare("UPDATE utilisateurs SET login=:login, password=:password, email=:email, firstname=:firstname, lastname=:lastname WHERE login=:login");
        $query->execute(
            array(
                'login' => $login,
                'password' => $password,
                'email' => $email,
                'firstname' => $firstname,
                'lastname' => $lastname
            )
        );
    }
}
?>