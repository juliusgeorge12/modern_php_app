<?php
  namespace component\database\connectors\mysql;

  /**
   * the mysql connector interface
   * a mysql connector connector should 
   * implement this interface 
   * i don't use pdo, i use mysqli so that is 
   * the reason i decide to use a mysql connection factory
   * this way you can pass in a pdo connector or a mysqli 
   * connector
   * 
   */
  interface mysql_connector_interface {

        /**
         * establish a mysql database connection
         * 
         * @param string $host
         * @param string $username
         * @param string $password
         * @param string $database
         * @return object the database object
         */
        public function connect(string $host , string $username , $password , $database = null);

        /**
         * runs a query against the database
         * 
         * @param string $sql the sql query
         * @return void
         */

         public function query_with_no_result(string $sql): void;
         
         /**
          * get the last inserted id
          * 
          * @return mixed
          */

          public function get_last_inserted_id(): mixed;

          /**
           * exec multiple query
           * 
           * @param string|array $query
           */

           public function  multiple_query($query);

           /**
            * prepare a sql prepared statement 
            *
            * @param string $sql
            * @return object
            */

            public function prepare(string $sql): object;


            /**
             * bind parameters to a prepared statement
             * @param array $bindings
             * 
             */

             public function bind(array $bindings);

             /**
              * execute the prepare query 
              * @return bool
              */

              public function execute_query(): bool;

             /**
              * close a prepared statement
              * 
              */

             public function stmt_close();

             /**
              * close the mysql connection
              *
              */

              public function connection_close();


               /**
                * 
                * get the result
                *
                */

                public function  get_result(): object;

              /**
               * fetch the result of an unprepared query as an associative array
               * 
               */
                public function fetch_all_assoc(): array;

                /**
               * fetch the result of an unprepared query as a number array
               * 
               */

                public function fetch_all_num(): array;

                
                /**
                 * fetch a single row of an unprepared statement
                 * as an associative array
                 * 
                 * @return array
                 */

                public function fetch_assoc(): array;

               /**
                *  fetch the result of a prepared statement query as
                * an associative array
                *
                */

                public function fetch_assoc_prepared(): array;
                              
               /**
                *  fetch the result of a prepared statement query as
                * a number array
                *
                */

                public function fetch_num_prepared(): array;
              
               /**
                * fetch a single row of a prepared statement
                *
                */

                public function fetch_one(): array;




  }