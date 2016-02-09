<?php
/**
 * Created by PhpStorm.
 * User: javi
 * Date: 3/2/16
 * Time: 23:20
 */

namespace BestClone\DB;



use PDOStatement;

class Mssql implements DBInterface
{

    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @var \PDOStatement
     */
    private $stmt;

    /**
     * @var string
     */
    private $database;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;



    /**
     * @param        $host
     * @param        $bd
     * @param string $user
     * @param string $pass
     */
    function __construct($host, $bd, $user = "sa", $pass = "enblanco")
    {
        $this->host = $host;
        $this->database = $bd;
        $this->user = $user;
        $this->pass = $pass;
        $this->conectar();
    }


    /**
     * @return int
     */
    function conectar()
    {
        if($this->conn instanceof \PDO) {
            return 1;
        }

        try{
            $dsn = "dblib:dbname={$this->database};host={$this->host}";
            //$dsn = "odbc:mssql";
            $this->conn = new \PDO($dsn, $this->user, $this->pass);
        } catch(\PDOException $ex) {
            return 0;
        }

        return 1;

    }

    /**
     * @return \PDO
     */
    public function getConnection()
    {
        return $this->conn;
    }

    /**
     * @param $sql
     *
     * @return PDOStatement
     */
    function consulta($sql)
    {
        $this->stmt = $this->conn->prepare($sql);

        return $this->stmt;
    }

    public function prepare($sql)
    {
        $this->stmt = $this->conn->prepare($sql);

        return $this->stmt;
    }

    public function query($sql)
    {
        $this->stmt = $this->conn->query($sql);

        return $this->stmt;
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function bindParams($params = [])
    {
        foreach($params as $param => $value) {
            $this->stmt->bindValue($param, $value);
        }

        return $this->stmt;
    }

}