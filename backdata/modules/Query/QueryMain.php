<?
namespace Query;

class QueryMain extends Query
{
    public function getTableList()
    {

    }

    public function getUsers()
    {
        $sql = "SELECT id FROM `tb_users`";
        if ( $result = $this->mysqli->query($sql) ) {
            while ($row = $result->fetch_assoc()) {
                p_d($row);
            }
            $result->free();
        }
        else
        {
            throw new \Exception("Не удалось создать таблицу: (" . $this->mysqli->errno . ") " . $this->mysqli->error);
        }
    }
}