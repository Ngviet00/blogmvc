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
         <a href="?controller=post" class="btn btn-info mt-3 ml-5 pt-2">
            Danh sách bài viết
         </a>
      </div>
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Tạo Mới Bài Viết </h1>

      <form method="POST" action="?controller=post&action=add" class="w-75 ml-5 pb-5" enctype='multipart/form-data'>

         <div class="form-group">
            <label for="title" class="pb-1">Tiêu đề:</label>
            <input type="text" required class="form-control" name="title" id="title">
         </div>

         <div class="form-group">
            <label for="short_des" class="pb-1">Mô tả ngắn:</label>
            <input type="text" required class="form-control" name="short_des" id="short_des">
         </div>

         <div class="form-group">
            <label for="post_content" class="pb-1">Nội dung:</label>
            <textarea required class="form-control" id="post_content" name="post_content" rows="3"></textarea>
         </div>

         <div class="form-group">
            <label for="createdBy" class="pb-1">Người tạo:</label>
            <input type="text" required disabled class="form-control" name="createdBy" id="createdBy" value="<?php echo $_SESSION["current_user"]["username"] ?>">
         </div>

         <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">Danh mục</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="category_id">
               <?php
               foreach ($category as $value) {
               ?>
                  <option value="<?php echo $value['id'] ?>"><?php echo $value['name']; ?></option>
               <?php
               }
               ?>

            </select>
         </div>

         <div class="input-group mb-3 w-50">
            <div class="input-group-prepend">
               <label class="input-group-text" for="inputGroupSelect01">Trạng thái:</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="featured">
               <option value="0">Phụ</option>
               <option value="1">Chính</option>
            </select>
         </div>

         <div class="form-group">
            <label for="imgFile" class="pb-1">Chọn file:</label>
            <input type="file" name="file" class="form-control-file" id="imgFile">
         </div>

         <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
      </form>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>
<script>
   CKEDITOR.replace('post_content');
</script>