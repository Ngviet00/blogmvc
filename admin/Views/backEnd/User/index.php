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
         <?php
            if($_SESSION["current_user"]["role"] ==1){
               ?>
                  <a href="?controller=user&action=addUser" class="btn btn-primary mt-3 ml-5 pt-2">
                     Thêm người dùng
                  </a>
               <?php
            }else{
               ?> 
                  <a class="btn btn-secondary mt-3 ml-5 pt-2 text-white" style="cursor: not-allowed;">
                     Thêm người dùng
                  </a>
               <?php
            }
         ?>
      </div>
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Danh sách</h1>
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">STT</th>
               <th scope="col">Tên tài khoản</th>
               <th scope="col">Số điện thoại</th>
               <th scope="col">Địa chỉ</th>
               <th scope="col">Chức vụ</th>
               <th scope="col">Tác vụ</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($user as $key => $value) {
               if ($value['id'] != $_SESSION['current_user']['id']) {
            ?>
                  <tr>
                     <th><?php echo $serial++ ?></th>
                     <td><?php echo $value['username']; ?></td>
                     <td><?php echo $value['phone'] ?></td>
                     <td><?php echo $value['address']; ?></td>
                     <td>
                        <?php
                        if ($value['role'] == 1) {
                           echo 'Admin';
                        } else {
                           echo 'User';
                        }
                        ?>
                     </td>
                     <td>
                        <?php
                           if($_SESSION["current_user"]["role"] ==1){
                              ?> 
                                 <a href="?controller=user&action=show&id=<?php echo $value['id']
                                                                           ?>">Sửa</a> |
                                 <a href="?controller=user&action=delete&id=<?php echo $value['id']
                                                                        ?>">Xóa</a>
                              <?php
                           }else{
                              ?>
                              <span>Sửa</span> |
                              <span>Xóa</span>
                              <?php
                           }
                        ?>
                     </td>
                  </tr>
               <?php
               }
               ?>
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