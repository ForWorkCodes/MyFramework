<?
namespace Main;

class Main
{
    public function __construct()
    {

    }

    public function initSite()
    {

        global $obDb;
        $query = 'SHOW COLUMNS FROM tb_users';
        $resultQuery = $obDb::Query($query);
        while ($arRes = $resultQuery->fetch_assoc())
        {
            $result[] = $arRes;
        }

        return $result;
    }

    public function addSite()
    {
        global $obDb;
        $query = "INSERT INTO tb_site";
        $query .= "(name, email)";
        $query .= "VALUES";
        $query .= "('first', 'first@mail.com')";

        $resultQuery = $obDb::Query($query);
    }

    public static function getSiteName()
    {
        global $obDb;
        $query = 'SELECT name FROM tb_site';
        $resultQuery = $obDb::Query($query);
        while ($arRes = $resultQuery->fetch_assoc())
        {
            $result = $arRes['name'];
        }

        return $result;
    }
}