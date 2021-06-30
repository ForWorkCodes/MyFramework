<?
namespace User;

abstract class UserAll
{
    private $name;
    private $id;
    protected $user_id;

    public function __construct()
    {
        if (!empty($_SESSION['USER']['ID']))
            $this->user_id = $_SESSION['USER']['ID'];

        $this->arUser = $this->getUser();
    }

    private function checkUser()
    {
        global $obDb;
    }

    private function getUser()
    {
        if (!empty($this->user_id))
        {
            global $obDb;
            $query = "SELECT * FROM tb_users WHERE id = '{$this->user_id}'";
            $resultQuery = $obDb::Query($query);
            while ($arData = $resultQuery->fetch_assoc())
            {
                $arUser = $arData;
            }

            return $arUser;
        }
    }
}

?>