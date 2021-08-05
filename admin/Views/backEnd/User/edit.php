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
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Thay đổi thông tin</h1>
      <form method="POST" action="?controller=user&action=update&id=<?php echo $user['id']; ?> " class="w-50 ml-5">

         <div class="form-group">
            <label for="username" class="pb-2">Tên tài khoản</label>
            <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username'] ?>">
         </div>

         <div class="form-group">
            <label for="phone" class="pb-2">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user['phone'] ?>">
         </div>

         <div class="form-group">
            <label for="address" class="pb-2">Địa chỉ</label>
            <input type="text" class="form-control" name="address" id="address" value="<?php echo $user['address'] ?>">
         </div>

         <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
      </form>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>