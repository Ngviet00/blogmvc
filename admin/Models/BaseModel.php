<?php
class BaseModel extends Database
{
   protected $connect;

   public function __construct()
   {
      $this->connect = $this->connect();
   }
   public function all($table)
   {
      $sql = "SELECT * FROM ${table} order by id desc";

      $query = $this->query($sql);

      $data = [];

      while ($row = $query->fetch_assoc()) {
         array_push($data, $row);
      }
      return $data;
   }
   public function allWithLimit($table,$start, $limit)
   {
      $sql = "SELECT * FROM ${table} order by id DESC LIMIT ${start},${limit}";

      $query = $this->query($sql);

      $data = [];

      while ($row = $query->fetch_assoc()) {
         array_push($data, $row);
      }
      return $data;
   }

   public function find($id, $table)
   {
      $sql = "SELECT * FROM ${table} WHERE id = ${id} ";

      $query = $this->query($sql);

      return mysqli_fetch_assoc($query);
   }

   public function findPostCategory($id, $table)
   {

      $sql = "SELECT * FROM ${table} WHERE category_id = ${id} order by id DESC ";

      $query = $this->query($sql);

      $data = [];

      while ($row = $query->fetch_assoc()) {
         array_push($data, $row);
      }
      return $data;
   }

   public function featured($table)
   {
      $sql = "SELECT * FROM ${table} WHERE featured = 1 order by id DESC limit 1";

      $query = $this->query($sql);

      return mysqli_fetch_assoc($query);
   }
   public function add($table, $data)
   {
      $dataKey = array_keys($data);
      $field = implode(',', $dataKey);

      $dataSet = [];
      foreach ($data as $value) {
         array_push($dataSet, "'" . $value . "'");
      }

      $dataSetStr = implode(',', $dataSet);

      $sql = "INSERT INTO ${table} ($field) VALUES ($dataSetStr)";
      return $this->query($sql);
   }
   public function update($id, $table, $data)
   {
      $dataSet = [];

      foreach ($data as $key => $value) {
         array_push($dataSet, "${key} = '" . $value . "'");
      }
      $dataSetStr = implode(',', $dataSet);
      $sql = "UPDATE ${table} SET $dataSetStr WHERE id = ${id}";
      return $this->query($sql);
   }
   public function delete($id, $table)
   {
      $sql = "DELETE FROM ${table} WHERE id = ${id} ";
      return $this->query($sql);
   }

   public function getRow($table)
   {
      $sql = "SELECT COUNT(*) FROM ${table}";
      $result =  $this->query($sql);
      $row = $result->fetch_row();
      return $row;
   }

   public function postSimilar($id, $table)
   {
      $sql = "SELECT * FROM ${table} where id not in ($id) ORDER by id DESC LIMIT 2, 3";
      return $this->query($sql);
   }

   public function getAllByPagination($table, $start, $limit)
   {
      $sql = "SELECT * FROM ${table} ORDER by id DESC LIMIT $start, $limit";
      return $this->query($sql);
   }
   public function query($sql)
   {
      return mysqli_query($this->connect, $sql);
   }

   public function searchPost($search, $table)
   {
      $sql = "SELECT p.*, c.name FROM ${table} as p LEFT JOIN categories as c ON p.category_id = c.id WHERE content LIKE '%$search%' or title LIKE '%$search%' or short_desc like '%search%' or c.name LIKE '%$search%'";
      return $this->query($sql);
   }
}