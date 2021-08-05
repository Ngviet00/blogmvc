<?php
class UserModel extends BaseModel
{
   const TABLE = 'users';
   public function getAllUser($table)
   {
      return $this->all($table);
   }
   public function addUser($table, $data)
   {
      return $this->add($table, $data);
   }
   public function updateUser($id, $table, $data)
   {
      return $this->update($id, $table, $data);
   }
   public function getOneUser($id, $table)
   {
      return $this->find($id, $table);
   }
   public function deleteUser($id, $table)
   {
      return $this->delete($id, $table);
   }
   public function getRowUser($table)
   {
      return $this->getRow($table);
   }
   public function getUserByPagination($table, $start, $limit)
   {
      return $this->getAllByPagination($table, $start, $limit);
   }
}
