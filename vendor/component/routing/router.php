<?php
  namespace component\routing;

  /**
   * 
   * the app routing  class
   * this class holds all the routing function and handles the 
   * routing
   */

   class Router {

        /**
         * Route map array that mapps route to controllers
         * 
         * @var array
         */

         private $route_mapping = [];

        public function __construct()
        {
                
        }
        public function talk()
        {
                return "afa how are you doing";
        }
   }