<?php
  namespace component\database\connectors\mysql;

use Exception;

  class connection_failed_exception extends Exception {
        
        public function reason(){
  return "connection failed because: " .  $this->getMessage();
        }
  }