<?php
class DashboardController extends BaseController
{
   private $postModel;
   private $userModel;
   private $categoryModel;
   public function __construct()
   {
      $this->loadModel('PostModel');
      $this->postModel = new PostModel;

      $this->loadModel('UserModel');
      $this->userModel = new UserModel;

      $this->loadModel('CategoryModel');
      $this->categoryModel = new CategoryModel;
   }
   public function index()
   {
      $user = $this->userModel->getRowUser(UserModel::TABLE);
      $category = $this->categoryModel->getRowCategory(CategoryModel::TABLE);
      $post = $this->postModel->getRowPost(PostModel::TABLE);

      return $this->view('backEnd.dashboard', [
         'user' => $user,
         'post' => $post,
         'category' => $category,
      ]);
   }
}
