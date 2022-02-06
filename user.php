<?php



class User
{

    //proprietés
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;

    // méthodes

    public function __construct()
    {
    }

    public function register($login, $password, $email, $firstname, $lastname)
    {

        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;

        $db =  mysqli_connect("localhost", "root", "", 'classe');

        $sql =  "INSERT INTO utilisateurs(login,password,email,firstname,lastname)VALUES('$login','$email','$firstname','$lastname','$password')";

        $query = mysqli_query($db, $sql);
    }

    public function connect($login, $password)
    {

        $db =  mysqli_connect("localhost", "root", "", 'classe');

        $sql = "SELECT * FROM utilisateurs";

        $query = mysqli_query($db, $sql);
        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        if (!$db) {

            die('erreur');
        }
    }

    public function disconnect()
    {

        $bdd = mysqli_connect('localhost', 'root', 'root', 'classes');
        $req = "SELECT * FROM utilisateurs";
        $bdd->close();
    }

    public  function delete()
    {

        $bdd = mysqli_connect("localhost", "root", "", "classe");

        $sql = "DELETE from utlisateurs WHERE id = 'id'";
        $sql = mysqli_connect($sql, $bdd);
    }

    public function update($login, $password, $email, $firstname, $lastname)
    {


        $bdd = mysqli_connect("localhost", "root", "");

        $sql = "UPDATE utlisateurs  SET login = '$login', password = '$password', email = '$email',firstname='$firstname', lastname = $lastname";

        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }


    public function isConnected($login, $password, $email, $firstname, $lastname)
    {
        $bdd = mysqli_connect('localhost', 'root', 'root', 'classe');
        $req = "SELECT * FROM utilisateurs";

        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllinfos()
    {



        $id_session = $_SESSION['id'];

        $bdd = mysqli_connect('localhost', 'root', '', 'classe');
        $sql = "SELECT * FROM utilisateurs WHERE id ='$id_session ";
        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        if (isset($id_session)) {

            return $result;
        }
    }

    public function getLogin()
    {

        $id_session = $_SESSION['id'];
        $bdd = mysqli_connect('localhost', 'root', '', 'classe');
        $sql = "SELECT * FROM utilisateurs WHERE id ='$id_session ";
        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $result['login'];
    }

    public function getEmail()
    {

        $id_session = $_SESSION['id'];

        $bdd = mysqli_connect('localhost', 'root', '', 'classe');
        $sql = "SELECT * FROM utilisateurs WHERE id = '$id_session' ";
        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $result['email'];
    }

    public function getFirstname()
    {

        $id_session = $_SESSION['id'];

        $bdd = mysqli_connect('localhost', 'root', '', 'classe');
        $sql = "SELECT * FROM utilisateurs WHERE id ='$id_session ";
        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $result['firstname'];
    }

    public function getLastname()
    {


        $id_session = $_SESSION['id'];
        $bdd = mysqli_connect('localhost', 'root', '', 'classe');
        $sql = "SELECT * FROM utilisateurs WHERE id ='$id_session ";
        $query = mysqli_query($bdd, $sql);

        $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

        return $result['lastname'];
    }
}
