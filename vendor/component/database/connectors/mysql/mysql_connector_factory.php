<?php
  namespace component\database\connectors\mysql;

  /**
   * this is the mysql connector factory
   * it accepts an instance of either pdo
   * connector or mysqli connector
   * note the pdo or mysqli should imlement
   * the mysql_connector_interface
   */
  class mysql_connector_factory {

        /**
         * hold an instance of the connector
         * 
         * @var
         */

         private $mysql_connector = null;

         /**
          * holds the database connection 
          *
          * @var object 
          */

          private $connection = null;

         public function __construct(mysql_connector_interface $connector)
         {
                $this->mysql_connector = $connector;
         }

         /**
          * initiate mysql database connection
          *
          * @param string $host
          * @param string $username
          * @param string $password
          * @param string $dbname
          * @return component\database\connectors\mysql\mysql_connector_factory
          */

          public function connect(string $host , string $username, string $password , string $dbname = null)
          {
              $this->create_connection($host , $username , $password , $dbname);
                return $this;
          }
          /**
           * return the database connection
           * @return component\database\connectors\mysql\mysql_connector_factory
           */

           public function get_connection()
           {
                return $this->connection;
           }

           /**
            * create the connection
            *  
            * @param string $host
            * @param string $username
            * @param string $password
            * @param string $dbname
            */

            private function create_connection(string $host , string $username , string $password , $dbname = null)
            {
                $this->connection =  $this->mysql_connector->connect($host , $username , $password , $dbname);
            }

  }