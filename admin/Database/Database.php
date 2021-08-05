<?php
class Database
{
   const HOST = "localhost:3306";
   const USERNAME = "root";
   const PASSWORD = "";
   const DBNAME = "blogmvc";

   public function connect()
   {
      $connect = mysqli_connect(self::HOST, self::USERNAME, self::PASSWORD, self::DBNAME) or die('Unable To connect');
      mysqli_set_charset($connect, "utf8");
      if (!$connect) {
         die("Connection failed: " . mysqli_connect_error());
      }
      return $connect;
   }
}
