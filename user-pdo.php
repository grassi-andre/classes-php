<?php

include('bdd.php');

class Userpdo
{

    //proprietés
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    // méthodes



    public function register($login, $password, $email, $firstname, $lastname)
    {

        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;


        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $register = $bdd->prepare("INSERT INTO utilisateurs(login, password, email,firstname,lastname)VALUES(?,?,?,?,?)");
        $register->bindValue($login, PDO::PARAM_STR);
        $register->bindValue($password, PDO::PARAM_STR);
        $register->bindValue($email, PDO::PARAM_STR);
        $register->bindValue($firstname, PDO::PARAM_STR);
        $register->bindValue($lastname, PDO::PARAM_STR);
        $register->execute();
    }

    public function connect($login, $password)
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $connect = $bdd->prepare("SELECT * FROM utilisateurs");
        $connect->execute();

        $result = $connect->fetch();
    }

    public function disconnect()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $disconect = $bdd->prepare("SELECT * FROM utilisateurs");

        $this->$bdd = null;
    }

    public  function delete()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $delete = $bdd->prepare("DELETE from utlisateurs WHERE id = 'id'");
        $delete->execute();
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {


        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $update = $bdd->prepare("UPDATE utilisateus SET login = ?, password = ?, email = ? , lastname = ?");
        $update->bindValue($login, PDO::PARAM_STR);
        $update->bindValue($password, PDO::PARAM_STR);
        $update->bindValue($email, PDO::PARAM_STR);
        $update->bindValue($firstname, PDO::PARAM_STR);
        $update->bindValue($lastname, PDO::PARAM_STR);
        $update->execute();
    }


    public function isConnected($login, $password, $email, $firstname, $lastname)
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $isconect = $bdd->prepare("SELECT * FROM utilisateurs");
        $isconect->execute();
        $result = $isconect->fetch();

        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllinfos()
    {


        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id_session = $_SESSION['id'];


        $infos = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
        $infos->execute(array($id_session));

        $result = $infos->fetch();

        if (isset($id_session)) {

            return $result;
        }
    }

    public function getLogin()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id_session = $_SESSION['id'];

        $get_login = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
        $get_login->execute(array($id_session));
        $result = $get_login->fetch();

        return $result['login'];
    }

    public function getEmail()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id_session = $_SESSION['id'];

        $get_login = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
        $get_login->execute(array($id_session));
        $result = $get_login->fetch();

        return $result['email'];
    }

    public function getFirstname()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id_session = $_SESSION['id'];

        $get_login = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
        $get_login->execute(array($id_session));
        $result = $get_login->fetch();


        return $result['firstname'];
    }

    public function getLastname()
    {

        $bdd = new PDO('mysql:host=localhost;dbname=classes', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $id_session = $_SESSION['id'];

        $get_login = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ? ");
        $get_login->execute(array($id_session));
        $result = $get_login->fetch();


        return $result['lastname'];
    }
}