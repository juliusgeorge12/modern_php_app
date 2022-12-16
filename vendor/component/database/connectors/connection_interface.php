<?php
  namespace component\database\connectors;

  /**
   * the database connection interface
   * 
   * @author julius george <julius.business12@gmail.com>
   */
  interface connection_interface {

        public function connect();
  }