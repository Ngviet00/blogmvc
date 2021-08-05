<?php
class CategoryController extends BaseController
{
   private $CategoryModel;
   private $userModel;
   public function __construct()
   {
      $this->loadModel('CategoryModel');
      $this->CategoryModel = new CategoryModel;

      $this->loadModel('UserModel');
      $this->userModel = new UserModel;
   }

   public function index()
   {
      if (!isset($_SESSION['current_user']["id"])) {
         header("Location:login.php");
      }

      $getRecords = $this->CategoryModel->getRowCategory(CategoryModel::TABLE);

      $total_records = $getRecords[0];

      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

      $limit = 4;

      $total_page = ceil($total_records / $limit);

      if ($current_page > $total_page) {
         $current_page = $total_page;
      } else if ($current_page < 1) {
         $current_page = 1;
      }

      $start = ($current_page - 1) * $limit;

      //number STT 1, 2, 4
      $serial = (($current_page - 1) * $limit) + 1;

      $category = $this->CategoryModel->getCategoryByPagination(CategoryModel::TABLE, $start, $limit);

      $id = $_SESSION['current_user']['id'];

      $user = $this->userModel->getOneUser($id, UserModel::TABLE);

      return $this->view('backEnd.Category.index', [
         'category' => $category,
         'current_page' => $current_page,
         'total_page' => $total_page,
         'serial' => $serial,
         'user' => $user
      ]);
   }

   public function add()
   {
      if (isset($_POST['name'])) {
         $name = $_POST['name'];
      }
      $data = [
         'name' => $name,
         'created_by' => $_SESSION["current_user"]["username"]
      ];
      $this->CategoryModel->addCategory(CategoryModel::TABLE, $data);
      header("Location:index.php?controller=category");
   }
   public function update()
   {
      $id = $_GET['id'];
      if (isset($_POST['name'])) {
         $name = $_POST['name'];
      }
      $data = [
         'name' => $name,
         'created_by' => $_SESSION['username'],
         'update_by' => $_SESSION['username']
      ];
      $this->CategoryModel->updateCategory($id, CategoryModel::TABLE, $data);
      header("Location:index.php?controller=category");
   }
   public function edit()
   {
      $id = $_GET['id'];
      $oneCategory = $this->CategoryModel->getOneCategory($id, CategoryModel::TABLE);
      return $this->view('backEnd.Category.edit', [
         'id' => $id,
         'oneCategory' => $oneCategory
      ]);
   }

   public function delete()
   {
      $id = $_GET['id'];
      $this->CategoryModel->deleteCategory($id, CategoryModel::TABLE);
      header("Location:index.php?controller=category");
   }
}
