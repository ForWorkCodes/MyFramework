<?
namespace User;

class User extends UserAll
{
    public function addUser()
    {
        $name = 'Anton';
        $login = 'ADMIN';
        $email = 'test.ru';
        $pass = 'root';
//        $sql = "INSERT INTO tb_users(id, Name, Login, Email, pass) VALUES (1, $name, $login, $email, $pass)";
//        $sql = "CREATE TABLE table_name (column_name column_type);";
//        QueryMain::Query($sql);
    }

    public function isAuthorized()
    {
        if (!empty($this->arUser['id']))
            return true;
        else
            return false;
    }

    public function getID()
    {
        return $this->arUser['id'];
    }

    public function getLogin()
    {
        return $this->arUser['Login'];
    }
}