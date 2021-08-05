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
         <button type="button" class="btn btn-success mt-3 ml-5" data-toggle="modal" data-target="#exampleModal">
            Thêm mới
         </button>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="?controller=category&action=add" method="POST">
                     <div class="form-group">
                        <label for="name" class="pb-2">Tên danh mục</label>
                        <input type="text" class="form-control" required name="name" id="name" value="">
                     </div>
                     <div class="form-group">
                        <label for="createdBy" class="pb-2">Người tạo</label>
                        <input type="text" class="form-control" disabled name="createdBy" id="createBy" value="<?php echo $_SESSION['current_user']['username'] ?>">
                     </div>
                     <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Danh sách danh mục</h1>
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">STT</th>
               <th scope="col">Tên danh mục</th>
               <th scope="col">Người tạo</th>
               <th scope="col">Tác vụ</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($category as $value) {
            ?>
               <tr>
                  <th><?php echo $serial++; ?></th>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['created_by'] ?></td>
                  <td>
                     <a disabled href="?controller=category&action=edit&id=<?php echo $value['id'] ?>">Sửa</a> |
                     <a href="?controller=category&action=delete&id=<?php echo $value['id'] ?>">Xóa</a>
                  </td>
               </tr>
            <?php
            }
            ?>
         </tbody>
      </table>
      <div id="pagination">
         <nav aria-label="..." class="row justify-content-center">
            <ul class="pagination">
               <li class="page-item <?php if ($current_page == 1) {
                                       echo "disabled";
                                    } ?>">
                  <a class="page-link" href="index.php?controller=category&action=index&page=<?php echo $current_page - 1 ?>">Previous</a>
               </li>
               <?php
               for ($i = 1; $i <= $total_page; $i++) {
                  if ($i == $current_page) {
                     echo '
                        <li class="page-item active">
                           <a class="page-link" href="">' . $i . '<span class="sr-only">(current)</span></a>
                        </li>';
                  } else {
                     echo '
                     <li class="page-item">
                        <a class="page-link" href="index.php?controller=category&action=index&page=' . $i . '">' . $i . '</a>
                     </li>';
                  }
               }
               ?>
               <li class="page-item <?php if ($current_page == $total_page) {
                                       echo "disabled";
                                    } ?>">
                  <a class="page-link" href="index.php?controller=category&action=index&page=<?php echo $current_page + 1 ?>">Next</a>
               </li>
            </ul>
      </div>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>