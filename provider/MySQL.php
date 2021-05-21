<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Kleptes/provider/Provider.php";

class MySQL extends Provider {

    public function __construct(){
        parent::__construct(self::PROVIDER_MYSQL);
    }

    /**
     * @return stdClass
     */
    protected function serialize_sql_data() : stdClass {
        return json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/Kleptes/settings/sql-ids.json"));
    }

    /**
     * @return MySQLi
     */
    public function connect_sql() : MySQLi {
        $data = $this->serialize_sql_data();
        return new \MySQLi($data->hostname, $data->username, $data->password, $data->dbname);
    }
}