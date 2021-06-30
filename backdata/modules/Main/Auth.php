<?
namespace Main;

class Auth
{
    public function __construct()
    {
        global $obUser;

        if ($obUser->isAuthorized())
            return false;
    }

    public function authUser($arData)
    {
        $check = $this->checkAuthData($arData);
        if (!$check)
            throw new \Exception('non check');

        $validate = $this->validateDataForAuth($arData);
        if (!$validate)
            throw new \Exception('non valid');

        $arReuslt = $this->queryAuth($arData);

        if (empty($arReuslt))
            throw new \Exception('user not find');

        $confirm = $this->compareDataAuth($arData, $arReuslt);

        if ($confirm)
        {
            $_SESSION['USER']['ID'] = $arReuslt['id'];
        }

        return $confirm;
    }

    public function registerNewUser($arData)
    {
        $check = $this->checkRegData($arData);
        if (!$check)
            throw new \Exception('non check');

        $validate = $this->validateDataForReg($arData);
        if (!$validate)
            throw new \Exception('non valid');

        $id_new_user = $this->queryRegister($arData);

        return $id_new_user;
        // may be auth right now
    }

    private function checkRegData($arData)
    {
        return true;
    }

    private function checkAuthData($arData)
    {
        return true;
    }

    private function validateDataForReg($arData)
    {
        return true;
    }

    private function validateDataForAuth($arData)
    {
        return true;
    }

    private function queryRegister($arData)
    {
        global $obDb;

        $query = "
            INSERT INTO tb_users
            (Name, Login, Email, pass)
            VALUES
            ('{$arData['NAME']}', '{$arData['LOGIN']}', '{$arData['EMAIL']}', '{$arData['PASS']}')
        ";

        try {
            $resultQuery = $obDb::QueryInsert($query);
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }

        return $resultQuery;
    }

    private function queryAuth($arData)
    {
        global $obDb;

        $query = "
            SELECT * FROM tb_users
            WHERE login = '{$arData['LOGIN']}'
        ";

        try {
            $resultQuery = $obDb::Query($query);

            while ($arUser = $resultQuery->fetch_assoc())
            {
                $reuslt = $arUser;
            }
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }

        return $reuslt;
    }

    private function compareDataAuth($arData, $arUser)
    {
        if ($arData['PASS'] != $arUser['pass'])
            return false;
        else
            return true;
    }
}