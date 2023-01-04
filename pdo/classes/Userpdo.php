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
        $errors = array();

        $sql = "SELECT * FROM utilisateurs WHERE login = :login AND password = :password";
        $query = $this->pdo->prepare($sql);
        $query->execute(['login' => $login, 'password' => $password]);
        $user = $query->fetchall(PDO::FETCH_ASSOC);

        for ($i=0; isset($user[$i]) ; $i++) {
            if ($user[$i]['login'] == $login && $user[$i]['password'] == $password) {
                $_SESSION['login'] = $user[$i]['login'];
                $_SESSION['password'] = $user[$i]['password'];
                $_SESSION['email'] = $user[$i]['email'];
                $_SESSION['firstname'] = $user[$i]['firstname'];
                $_SESSION['lastname'] = $user[$i]['lastname'];
                $errors[] = "Vous êtes connecté";
            } else {
                $errors[] = "Erreur de connexion";
            }
        }
        return $errors;
        
    }
    public function disconnect()
    {   
        session_start();
        $errors = array();
        session_destroy();
        $errors[] = "Vous êtes déconnecté";
        return $errors;
    }
    public function delete()
    {
        $sql = "DELETE FROM utilisateurs WHERE login = :login";
        $query = $this->pdo->prepare($sql);
        $query->execute(['login' => $_SESSION['login']]);
    }
    public function update($login, $password, $email, $firstname, $lastname)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $sql = "UPDATE utilisateurs SET login = :login, password = :password, email = :email, firstname = :firstname, lastname = :lastname WHERE login = :login";
        $query = $this->pdo->prepare($sql);
        $query->execute(['login' => $login, 'password' => $password, 'email' => $email, 'firstname' => $firstname, 'lastname' => $lastname]);
        
    }
    public function isConnected()
    {
        if (isset($_SESSION['login']) != null) {
            return true;
        } else {
            return false;
        }
    }
    public function getALLInfos()
    {
        if (isset($_SESSION['login'])) {
            return array(
                'login' => $_SESSION['login'],
                'password' => $_SESSION['password'],
                'email' => $_SESSION['email'],
                'firstname' => $_SESSION['firstname'],
                'lastname' => $_SESSION['lastname']
            );
        } else {
            return false;
        }
    }
    public function getLogin()
    {
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        } else {
            return false;
        }
    }
}
?>