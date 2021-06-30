<?
namespace Query;

abstract class Query
{
    protected   $error,
                $db_data,
                $mysqli;

    public function __construct($db_data)
    {
        $this->startCheck($db_data);
        $this->startConnection();
    }

    /**
     * Проверка всех важных переменных
     * @param $db_data
     * @throws \Exception
     */
    private function startCheck($db_data)
    {
        if (empty($db_data['name']))
            $this->error .= "need name DB <br> \r\n";
        if (empty($db_data['login']))
            $this->error .= "need login DB <br> \r\n";
        if (empty($db_data['pass']))
            $this->error .= "need pass DB <br> \r\n";
        if (empty($db_data['host']))
            $this->error .= "need host DB <br> \r\n";

        $this->db_data = $db_data;

        if (!empty($this->error))
            throw new \Exception($this->error);
    }

    /**
     * Начало соединения
     */
    protected function startConnection()
    {
        global $DB;

        $DB = $this->mysqli = new \mysqli(
            $this->db_data['host'],
            $this->db_data['login'],
            $this->db_data['pass'],
            $this->db_data['name']
        );

        if (mysqli_connect_errno())
            throw new \Exception("Connect failed: %s\n", mysqli_connect_error());

        $this->mysqli->set_charset('utf8');
        $DB->set_charset('utf8');
    }

    public static function Query($sql)
    {
        global $DB;

        if (!$result = $DB->query($sql))
            throw new \Exception("Error DB: (" . $DB->errno . ") " . $DB->error);

        return $result;
    }

    public static function QueryInsert($sql)
    {
        global $DB;

        if (!$result = $DB->query($sql))
            throw new \Exception("Error DB: (" . $DB->errno . ") " . $DB->error);

        return $DB->insert_id;
    }

    /**
     * Закрытие соединения
     */
    public function endConnection()
    {
        $this->mysqli->close();
    }
}