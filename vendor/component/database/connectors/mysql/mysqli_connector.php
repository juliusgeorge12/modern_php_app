<?php
 namespace component\database\connectors\mysql;

use Exception;
use mysqli;

 class mysqli_connector implements mysql_connector_interface {

       
        /**
         * hold the database connection instance
         * @var object
         */
        protected $connection = null;


        /**
         * the sql prepared statement
         * 
         * @var object 
         */

         private $stmt = null;

        /**
         * hold the result of the 
         * query
         * 
         * @var object $result
         */

         private $result = null;


        
        /**
         * get the databse connection
         * 
         */
        private function get_connection(){
                return $this->connection;
        }

        /**
         * create a new mysqli connection an return it
         * @param string $host
         * @param string $username
         * @param string $password
         * @param string $database
         */

         private function create_connection(string $host, string $username , string $password , string $database = null)
         {
                mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);
                try {
                if(is_null($database)){
                      $connection = new mysqli($host , $username , $password);
                } else {
                       $connection = new mysqli($host , $username , $password , $database);
                }
                $this->connection = $connection;
                return $this;
          } catch(Exception $e){
                throw new connection_failed_exception($e->getMessage());
          }
         }

        /**
         * connect and return the connection instance
         * @return component\database\connectors\mysql\mysql_connector_interface
         */ 

         public function connect(string $host, string $username, $password, $database = null)
         {
               return $this->create_connection($host , $username , $password , $database);
         }

         /**
          * runs a query against the database
          *
          * @param string $sql the sql query
          * @return void
          */

          public function query_with_no_result(string $sql): void
          {
                $this->connection->query($sql);
          }

          /**
           * get the last inserted id
           * 
           */

           public function get_last_inserted_id(): mixed
           {
               return $this->connection->insert_id;
           }

          /**
           * prepare a sql statement
           * @param string $sql
           * @return object
           * 
           */

           public function prepare(string $sql): object
           {
                $this->stmt = $this->connection->prepare($sql);
                return $this;
           }

         /**
           * bind parameters to a prepared statement
           * 
           * @param array $bindings
            * 
           */

           public function bind( array $bindings)
           {
                $types = str_repeat("s" , count($bindings));
                $this->stmt->bind_params($types , ...$bindings);
                return $this;
           }

           /**
            * execute the prepared query 
            *
            * @return bool
            */

            public function execute_query(): bool {
                     return $this->stmt->execute();
            }

           /**
            * 
            * close a prepared statement 
            *
            */

            public function stmt_close()
            {
                $this->stmt->close();
                return $this;
            }
             
            /**
             * 
             * close the connection
             * 
             */

             public function connection_close()
             {
                $this->connection->close();
             }
             /**
              * execute multipe query
              * @param string $query
              */

              public function multiple_query($query)
              {
               return  $this->connection->multi_query($query);
              }

              /**
               * fetch the result 
               * @return object
               */

               public function get_result() : object
               {
                   $this->result = $this->stmt->get_result();
                   return $this->result;
               }

              /**
               * fetch a single row of unprepared query as an associative array
               * 
               */
              public function fetch_assoc(): array
              {
                return $this->connection->fetch_assoc();
              }

              /**
               * fetch the result of an unprepared query as an associative array
               * 
               */
              public function fetch_all_assoc(): array
              {
                return $this->connection->fetch_all(MYSQLI_ASSOC);
              }
              /**
               * fetch the result of an unprepared query as an number array
               * 
               */
              public function fetch_all_num(): array
              {
                return $this->connection->fetch_all(MYSQLI_NUM);
              }
    
              /**
                *  fetch the result of a prepared statement query as
                * an associative array
                *
                */

                public function fetch_assoc_prepared(): array
                {
                        return $this->result->fetch_all(MYSQLI_ASSOC);
                }

                /**
                *  fetch the result of a prepared statement query as
                * a number array
                *
                */

                public function fetch_num_prepared(): array
                {
                        return $this->result->fetch_all(MYSQLI_ASSOC);
                }

              /**
               * fetch a single result
               * of a prepared statement
               */

               public function fetch_one(): array
               {
                return $this->result->fetch_assoc();
               }




 }