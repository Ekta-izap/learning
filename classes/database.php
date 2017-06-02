<?php
// Create Database class
    class Database {
        private $connection;
        private $resource;
        // it should allow me to connect and select db using constructor

        public function __construct($host, $username, $password, $dbname)
        {
            $this->connection = mysql_connect($host,$username, $password);
            if($this->connection){
                $this->resource = mysql_select_db($dbname,$this->connection) or die("Wrong database name provided!");
            }

        }

        // it should have execute method which is capable to run all my sql queries.

        public function execute($qry,$objectOf)
        {

            $command=explode(' ',$qry);

            $return = false;

            switch(strtolower($command[0])){
                case 'insert': 
                        mysql_query($qry, $this->connection);
                        if(mysql_unbuffered_query($this->connection)) {
                            $return = mysql_insert_id($this->connection);
                        }
                    break;
                case 'delete': 
                     mysql_query($qry, $this->connection);
                    if(mysql_unbuffered_query($this->connection)) {
                        $return = mysql_affected_rows($this->connection);
                    }
                    break;
                case 'update':
                    mysql_query($qry, $this->connection);
                    $return = mysql_unbuffered_query($this->connection);
                    break;
                case 'select':
                    $query_resource = mysql_query($qry, $this->connection);
                    while($object = mysql_fetch_object($query_resource)){
                        if(!$objectOf || !class_exists($objectOf)){
                            $return[] = $object;
                        }else{
                            $myObject = new $objectOf();
                            foreach($object as $key => $value){
                                $myObject->{$key} = $value;
                            }
                            $return[] = $myObject;
                        }
                    }
                    break;
            }
            return $return;
        }

    }