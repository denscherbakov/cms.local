<?php

namespace Engine\Core\Db;

class Db
{
    /**
     * @var
     */
    private $link;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     */
    private function connect()
    {
        $config = [
            'host' => 'localhost',
            'dbname' => 'test',
            'user' => 'root',
            'pass' => ''
        ];

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];

        $this->link = new \PDO($dsn, $config['user'], $config['pass']);

        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     */
    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);

        if ($result === false){
            return [];
        }
        return $result;
    }
}