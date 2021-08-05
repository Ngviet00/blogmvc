<?php
class PostModel extends BaseModel
{
   const TABLE = 'posts';

   public function getAllPost($table)
   {
      return $this->all($table);
   }
   public function getAllPostLimit($table,$start, $limit)
   {
      return $this->allWithLimit($table,$start, $limit);
   }
   public function addPost($table, $data)
   {
      return $this->add($table, $data);
   }
   public function getOnePost($id, $table)
   {
      return $this->find($id, $table);
   }

   public function getRowPost($table)
   {
      return $this->getRow($table);
   }

   public function getPostByPagination($table, $start, $limit)
   {
      return $this->getAllByPagination($table, $start, $limit);
   }

   public function deletePost($id, $table)
   {
      return $this->delete($id, $table);
   }

   public function postFeatured($table)
   {
      return $this->featured($table);
   }

   public function updatePost($id, $table, $data)
   {
      return $this->update($id, $table, $data);
   }
   public function PostCategory($id, $table)
   {
      return $this->findPostCategory($id, $table);
   }
   public function listPostSimilar($id, $table)
   {
      return $this->postSimilar($id, $table);
   }
   public function getSearchPost($search, $table)
   {
      return $this->searchPost($search, $table);
   }
}
