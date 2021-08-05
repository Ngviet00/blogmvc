<?php
if (!isset($_SESSION['current_user']["id"])) {
   header("Location:login.php");
}
require_once("./Pages/header.php");
require_once("./Pages/navbar.php");
?>

<div id="wrapper">
   <div id="sidebar">
      <?php require_once("./Pages/sidebar.php");
      ?>
   </div>
   <div id="content_main_category" class="bg-light pt-4">
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Thêm mới</h1>
      <form method="POST" action="?controller=user&action=add" class="w-50 ml-5">

         <div class="form-group">
            <label for="username" class="pb-2">Tên tài khoản</label>
            <input type="text" required class="form-control" name="username" id="username" value="">
         </div>

         <div class="form-group">
            <label for="password" class="pb-2">Mật khẩu</label>
            <input type="password" required class="form-control" name="password" id="password" value="">
         </div>

         <div class="form-group">
            <label for="phone" class="pb-2">Số điện thoại</label>
            <input type="text" required class="form-control" name="phone" id="phone" value="">
         </div>

         <div class="form-group">
            <label for="address" class="pb-2">Địa chỉ</label>
            <input type="text" required class="form-control" name="address" id="address" value="">
         </div>

         <div class="input-group mb-3 w-50">
            <div class="input-group-prepend w-25">
               <label class="input-group-text" for="inputGroupSelect01">Chức vụ</label>
            </div>
            <select name="role" class="custom-select" id="inputGroupSelect01">
               <option value="2">User</option>
            </select>
         </div>

         <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>