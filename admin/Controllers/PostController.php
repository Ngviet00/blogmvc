<?php
class PostController extends BaseController
{
   private $postModel;
   private $categoryModel;
   private $userModel;

   public function __construct()
   {
      $this->loadModel('PostModel');
      $this->postModel = new PostModel;

      $this->loadModel('CategoryModel');
      $this->categoryModel = new CategoryModel;

      $this->loadModel('UserModel');
      $this->userModel = new UserModel;
   }
   public function index()
   {
      $getRecords = $this->postModel->getRowPost(PostModel::TABLE);

      $total_records = $getRecords[0];

      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

      $limit = 8;

      $total_page = ceil($total_records / $limit);

      if ($current_page > $total_page) {
         $current_page = $total_page;
      } else if ($current_page < 1) {
         $current_page = 1;
      }

      $start = ($current_page - 1) * $limit;

      $serial = (($current_page - 1) * $limit) + 1;

      $post = $this->postModel->getPostByPagination(PostModel::TABLE, $start, $limit);

      $category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);

      $current_user = $this->userModel->getOneUser($_SESSION['current_user']["id"], UserModel::TABLE);

      return $this->view('backEnd.Post.index', [
         'current_user' => $current_user,
         'post' => $post,
         'category' => $category,
         'current_page' => $current_page,
         'total_page' => $total_page,
         'serial' => $serial
      ]);
   }
   public function addPost()
   {
      $category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);
      return $this->view('backEnd.Post.addPost', [
         'category' => $category
      ]);
   }

   public function update_post()
   {
      $id = $_GET['id'];
      if (isset($_POST['submit'])) {
         $title = $_POST['title'];
         $name = $_FILES['file']['name'];
         $short_des = $_POST['short_des'];
         $content = $_POST['post_content'];
         $featured = $_POST['featured'];
         $createdBy = $_SESSION["current_user"]["username"];
         $category_id = $_POST['category_id'];

         $data = [
            'title' => $title,
            'image_desc' => $name,
            'short_desc' => $short_des,
            'content' => $content,
            'featured' => $featured,
            'created_by' => $createdBy,
            'category_id' => $category_id
         ];

         $target_dir = "upload/";
         $target_file = $target_dir . basename($_FILES["file"]["name"]);

         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         $extensions_arr = array("jpg", "jpeg", "png", "gif");
         if (in_array($imageFileType, $extensions_arr)) {

            $this->postModel->updatePost($id, PostModel::TABLE, $data);
            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
            header("Location:?controller=post");
         }
      }
   }
   public function updatePost()
   {
      $id = $_GET['id'];
      $category = $this->categoryModel->getAllCategory(CategoryModel::TABLE);
      $post = $this->postModel->getOnePost($id, PostModel::TABLE);
      return $this->view('backEnd.Post.update', [
         'post' => $post,
         'category' => $category
      ]);
   }
   public function delete()
   {
      $id = $_GET['id'];
      $this->postModel->deletePost($id, PostModel::TABLE);
      header("Location:?controller=post");
   }
   public function add()
   {
      if (isset($_POST['submit'])) {
         $title = $_POST['title'];
         $name = $_FILES['file']['name'];
         $short_des = $_POST['short_des'];
         $content = $_POST['post_content'];
         $featured = $_POST['featured'];
         $createdBy = $_SESSION["current_user"]['username'];
         $category_id = $_POST['category_id'];

         $data = [
            'title' => $title,
            'image_desc' => $name,
            'short_desc' => $short_des,
            'content' => $content,
            'featured' => $featured,
            'created_by' => $createdBy,
            'category_id' => $category_id
         ];

         $target_dir = "upload/";
         $target_file = $target_dir . basename($_FILES["file"]["name"]);

         $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         $extensions_arr = array("jpg", "jpeg", "png", "gif");
         if (in_array($imageFileType, $extensions_arr)) {

            $this->postModel->addPost(PostModel::TABLE, $data);
            header("Location:?controller=post");

            move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
         }
      }
   }
}
