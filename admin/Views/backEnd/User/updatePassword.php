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

      <?php
      if (isset($flag)) {
         if ($flag == 0) {
      ?>
            <div class="alert alert-success w-50 ml-5" role="alert">
               <?php echo $message; ?>
            </div>
         <?php
         } else {
         ?>
            <div class="alert alert-danger w-50 ml-5" role="alert">
               <?php echo $message; ?>
            </div>
      <?php
         }
      }
      ?>


      <h1 class="mt-4 ml-5 pb-3" id="list_category">Cập nhật mật khẩu</h1>
      <form action="?controller=user&action=updatePassWord" method="POST" class="pl-5 mt-4">

         <div class="form-group">
            <label for="newPassword" class="pb-3">Mật khẩu mới</label>
            <input type="password" required name="NewPassword" class="form-control w-50" id="newPassword">
         </div>

         <div class="form-group">
            <label for="reNewPassword" class="pb-3">Nhập lại mật khẩu mới</label>
            <input type="password" required name="reNewPassword" class="form-control w-50" id="reNewPassword">
         </div>

         <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
      </form>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>