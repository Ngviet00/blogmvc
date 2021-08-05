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
         <a href="?controller=post&action=addPost" class="btn btn-info mt-3 ml-5 pt-2">
            Thêm bài viết
         </a>
      </div>
      <h1 class="mt-4 ml-5 pb-3" id="list_category">Danh sách</h1>
      <table class="table table-striped">
         <thead>
            <tr>
               <th scope="col">STT</th>
               <th scope="col" style="width: 15%;">Tiêu đề</th>
               <th scope="col">Hình ảnh</th>
               <th scope="col" style="width: 45%;">Mô tả ngắn</th>
               <th scope="col">Danh mục</th>
               <th scope="col">Tác vụ</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($post as $key => $value) {
            ?>
               <tr>
                  <th><?php echo $serial++; ?></th>
                  <td style="line-height: 20px;">
                     <?php
                     if (strlen($value['title']) > 1) {
                        $str = explode("\n", wordwrap($value['title'], 60));
                        $str = $str[0] . '...';
                        echo $str;
                     }
                     ?>
                  </td>
                  <td><img style="width: 70px;height:70px;" src="<?php echo "upload/" . $value['image_desc'] ?>" alt=""></td>

                  <td style="line-height: 20px;">

                     <?php
                     if (strlen($value['short_desc']) > 50) {
                        $str = explode("\n", wordwrap($value['short_desc'], 190));
                        $str = $str[0] . '...';
                        echo $str;
                     }else{
                        echo $str;
                     }
                     ?>
                  </td>
                  <td>
                     <?php
                     foreach ($category as $cate) {
                        if ($cate['id'] == $value['category_id']) {
                           echo $cate['name'];
                        }
                     }
                     ?>
                  </td>
                 <td>
                     <a href="?controller=post&action=updatePost&id=<?php echo $value['id'] ?>">Sửa</a> |
                     <a href="?controller=post&action=delete&id=<?php echo $value['id'] ?>">Xóa</a>
                  </td>
               </tr>
            <?php
            }
            ?>
         </tbody>
      </table>
      <div id="pagination" class="pb-3">
         <nav aria-label="..." class="row justify-content-center">
            <ul class="pagination">
               <li class="page-item <?php if ($current_page == 1) {
                                       echo "disabled";
                                    } ?>">
                  <a class="page-link" href="index.php?controller=post&action=index&page=<?php echo $current_page - 1 ?>">Previous</a>
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
                        <a class="page-link" href="index.php?controller=post&action=index&page=' . $i . '">' . $i . '</a>
                     </li>';
                  }
               }
               ?>
               <li class="page-item <?php if ($current_page == $total_page) {
                                       echo "disabled";
                                    } ?>">
                  <a class="page-link" href="index.php?controller=post&action=index&page=<?php echo $current_page + 1 ?>">Next</a>
               </li>
            </ul>
      </div>
   </div>
</div>

<?php
require_once('./Pages/footer.php');
?>