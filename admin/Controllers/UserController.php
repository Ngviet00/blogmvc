<?php
class UserController extends BaseController
{
   private $userModel;
   public function __construct()
   {
      $this->loadModel('UserModel');
      $this->userModel = new UserModel;
   }

   public function index()
   {
      if (!isset($_SESSION['current_user']["id"])) {
         header("Location:login.php");
      }

      $getRecords = $this->userModel->getRowUser(UserModel::TABLE);

      $total_records = $getRecords[0];

      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

      $limit = 6;

      $total_page = ceil($total_records / $limit);

      if ($current_page > $total_page) {
         $current_page = $total_page;
      } else if ($current_page < 1) {
         $current_page = 1;
      }

      $start = ($current_page - 1) * $limit;

      $serial = (($current_page - 1) * $limit) + 1;

      $user = $this->userModel->getUserByPagination(UserModel::TABLE, $start, $limit);

      $id = $_SESSION['current_user']['id'];

      $oneUser = $this->userModel->getOneUser($id, UserModel::TABLE);

      return $this->view('backEnd.User.index', [
         'user' => $user,
         'oneUser' => $oneUser,
         'current_page' => $current_page,
         'total_page' => $total_page,
         'serial' => $serial
      ]);
   }

   public function addUser()
   {
      if (!isset($_SESSION['current_user']["id"])) {
         header("Location:login.php");
      }
      return $this->view('backEnd.User.addUser');
   }
   public function add()
   {
      if (isset($_POST['submit'])) {
         $username = $_POST['username'];
         $password = $_POST['password'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $role = $_POST['role'];
      }
      $data = [
         'username' => $username,
         'password' => md5($password),
         'phone' => $phone,
         'address' => $address,
         'role' => $role
      ];
      $this->userModel->addUser(UserModel::TABLE, $data);
      header("Location:?controller=user");
   }
   public function update()
   {
      if (isset($_POST['submit'])) {
         $id = $_GET['id'];
         $username = $_POST['username'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
      }
      $data = [
         'username' => $username,
         'phone' => $phone,
         'address' => $address,
      ];
      $this->userModel->updateUser($id, UserModel::TABLE, $data);
      header("Location:?controller=user");
   }
   public function show()
   {
      $id = $_GET['id'];
      $user = $this->userModel->getOneUser($id, UserModel::TABLE);
      return $this->view('backEnd.User.edit', [
         'user' => $user
      ]);
   }

   public function updatePassWord()
   {
      if (isset($_POST['submit'])) {
         $id = $_SESSION['current_user']['id'];

         $message = "";
         $flag = 0;

         $NewPassword = $_POST['NewPassword'];

         $reNewPassword = $_POST['reNewPassword'];

         if ($NewPassword == $reNewPassword) {
            $data = [
               'password' => md5($NewPassword)
            ];

            $message = "Thay đổi thành công";
            $this->userModel->updateUser($id, UserModel::TABLE, $data);
            return $this->view('backEnd.User.updatePassword', [
               'message' => $message,
               'flag' => $flag
            ]);
         } else {

            $message = "Mật khẩu không giống nhau";
            $flag = 1;
            return $this->view('backEnd.User.updatePassword', [
               'message' => $message,
               'flag' => $flag
            ]);
         }
      }
      return $this->view('backEnd.User.updatePassword');
   }

   public function delete()
   {
      $id = $_GET['id'];
      $this->userModel->deleteUser($id, UserModel::TABLE);
      header("Location:?controller=user");
   }
}
