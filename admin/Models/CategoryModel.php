<?php
class CategoryModel extends BaseModel
{
   const TABLE = 'categories';
   public function getAllCategory($table)
   {
      return $this->all($table);
   }

   public function addCategory($table, $data)
   {
      return $this->add($table, $data);
   }

   public function updateCategory($id, $table, $data)
   {
      return $this->update($id, $table, $data);
   }

   public function getOneCategory($id, $table)
   {
      return $this->find($id, $table);
   }

   public function deleteCategory($id, $table)
   {
      return $this->delete($id, $table);
   }
   public function getRowCategory($table)
   {
      return $this->getRow($table);
   }
   public function getCategoryByPagination($table, $start, $limit)
   {
      return $this->getAllByPagination($table, $start, $limit);
   }
}
