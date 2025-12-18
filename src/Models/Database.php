<?php

namespace Models;

use Exception;
use PDO;

class Database
{
  private static $singleton = null;
  protected $db;
  public function __construct()
  {
    try {
      if (self::$singleton == null) {
        self::$singleton = new PDO(
          "mysql:host=mysql-con;dbname=database;charset=utf8",
          "user",
          "password",
        );
      }
      $this->db = self::$singleton;
    } catch (Exception $e) {
      die("Erreur : " . $e->getMessage());
    }
  }

  public function __destruct()
  {
    $this->db = null;
  }
}
