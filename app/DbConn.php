<?php

namespace App;

/**
 * Description of DbConn
 *
 * @author nitins
 */
class DbConn {

    private $serverName = "";
    private $userName = "";
    private $password = "";
    private $port = "";
    private $dbName = "";
    private $connection = '';

    public function connectDatabase() {
        $this->connection = new \mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
        return $this->connection;
    }

    function setServerName($serverName) {
        $this->serverName = $serverName;
    }

    function setUserName($userName) {
        $this->userName = $userName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPort($port) {
        $this->port = $port;
    }

}
