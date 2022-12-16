<?php
 namespace component\contracts\routing;

 interface router {
        /**
         * the router interface 
         * 
         */

         /**
          *  register a route that respond to a get request
          *
          * @param string $path
          * @param callable $callback
          */
         public  function get(string $path , callable $callback): void;

        /**
         * register a route that respond to a post request
         * 
         * @param string $path
         * @param callable $callback
         */

         public function post(string $path , $callback): void;
         /**
         * register a route that respond to a put request
         * 
         * @param string $path
         * @param callable $callback
         */

        public function put(string $path , $callback): void;

        /**
         * register a route that respond to a delete request
         * 
         * @param string $path
         * @param callable $callback
         */

        public function delete(string $path , $callback): void;

        /**
         * register a route that respond to a patch request
         * 
         * @param string $path
         * @param callable $callback
         */

        public function patch(string $path , $callback): void;

        /**
         * register a route that respond to  any request
         * 
         * @param string $path
         * @param callable $callback
         */

        public function any(string $path , $callback): void;
 }