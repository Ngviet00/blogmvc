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
      <div class="d-flex justify-content-between">
         <a href="index.php?controller=category&action=index&page=1" class="btn btn-success mt-3 ml-5">
            Danh Sách Danh mục
         </a>
      </div>

      <h1 class="mt-4 ml-5 pb-3" id="list_category">Cập Nhật Danh Mục</h1>
      <form action="?controller=category&action=update&id=<?php echo $id ?>" method="POST" class="pl-5">

         <div class="form-group">
            <label for="name" class="pb-2">Tên danh mục</label>
            <input type="text" class="form-control w-75" id="name" name="name" required value="<?php echo $oneCategory['name'] ?>">
         </div>

         <div class="form-group">
            <label for="createdBy" class="pb-2">Người Sửa</label>
            <input disabled type="text" class="form-control w-75" name="created_by" id="createdBy" value="<?php echo $_SESSION["current_user"]["username"] ?>">
         </div>

         <button type="submit" class="btn btn-primary">Cập nhật</button>

      </form>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>