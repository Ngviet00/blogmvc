<?php
require "Shared/header.php";
require "Shared/headerTop.php";
require "Shared/navbar.php";
require "Shared/scroll.php";
?>

<div id="wp_content" class="container pt-4 d-flex justify-content-between">
   <div id=content>
      <?php
      if (isset($_GET['q'])) {
      ?>
          <div id="list_post">
             <h2>Từ khóa: <?php echo $_GET['q']; ?></h2>
             <?php
                if ($listSearchPost->num_rows > 0) {
                   foreach ($listSearchPost as $value) {
                ?>
                     <div id="post" class="d-flex">
                        <div id="image_post">
                           <a href="?controller=home&action=postDetail&id=<?php echo $value['id'] ?>">
                              <img style="height: 183px;" src="admin/upload/<?php echo $value['image_desc'] ?>" alt="">
                           </a>
                        </div>
                        <div id="title_post">
                           <h3>
                              <a
                                 href="?controller=home&action=postDetail&id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
                           </h3>
                           <span><i class="fa fa-clock-o" aria-hidden="true"></i>
                              <?php echo date("g:i:s a", strtotime($value["created_at"])); ?> &nbsp;</span>
                           <span><?php echo date("F j, Y", strtotime($value["created_at"])); ?>&nbsp;</span>
                           <span>
                              <?php
                                             foreach ($category as $c) {
                                                if ($c['id'] == $value['category_id']) {
                                                   echo $c['name'];
                                                }
                                             }
                                             ?>
                           </span>
                           <p>
                              <?php
                                             echo $value['short_desc'];
                                             ?>
                           </p>
                        </div>
                     </div>
             <?php
                   }
                   require "Shared/covid.php";
                } else {
                   ?>
             <h2 class="text-danger">Không tìm thấy bài viết cần tìm</h2>
             <?php
                }
                ?>
          </div>
      <?php
      } else {
      ?>
          <div id="main_post">
             <div id="image" style="width: auto;">
                <a href="?controller=home&action=postDetail&id=<?php echo $postFeatured['id'] ?>">
                   <img style="width:45em;height: 432px;" src="admin/upload/<?php echo $postFeatured['image_desc']; ?>"
                      alt="loi khong hien thi">
                </a>
                <div>
                   <a href="?controller=home&action=postDetail&id=<?php echo $postFeatured['id'] ?>">
                      <?php echo $postFeatured['title'] ?>
                   </a>
                   <span>
                      <?php echo $postFeatured['short_desc']; ?>
                   </span>
                </div>
             </div>
          </div>
          <hr>
          <div id="list_post">
             <?php
                foreach ($post as $value) {
                   if ($value['id'] != $postFeatured['id']) {
                ?>
                     <div id="post" class="d-flex">
                        <div id="image_post">
                           <a href="?controller=home&action=postDetail&id=<?php echo $value['id'] ?>">
                              <img style="height: 183px;" src="admin/upload/<?php echo $value['image_desc'] ?>" alt="">
                           </a>
                        </div>
                        <div id="title_post">
                           <h3>
                              <a
                                 href="?controller=home&action=postDetail&id=<?php echo $value['id'] ?>"><?php echo $value['title'] ?>
                              </a>
                           </h3>
                           <span><i class="fa fa-clock-o" aria-hidden="true"></i>
                              <?php echo date("g:i:s a", strtotime($value["created_at"])); ?> &nbsp;</span>
                           <span><?php echo date("F j, Y", strtotime($value["created_at"])); ?>&nbsp;</span>
                           <span>
                              <?php
                                   foreach ($category as $c) {
                                      if ($c['id'] == $value['category_id']) {
                                         echo $c['name'];
                                      }
                                   }
                               ?>
                           </span>
                           <p>
                              <?php
                                       echo $value['short_desc'];
                                       ?>
                           </p>
                        </div>
                     </div>
             <?php
                   }
                }
                ?>
          </div>
          <nav class="d-flex justify-content-center">
              <ul class="pagination">
                  <li class="page-item <?php if($current_page == 1){echo "d-none";} ?>">
                     <a class="page-link" href="index.php?page=<?php echo $current_page-1; ?>">
                        Previous
                     </a>
                  </li>
                  <?php
                     for($i = 1; $i <= $total_page;$i++){
                        if($i == $current_page){
                           ?>
                              <li class="page-item"><a class="page-link text-secondary"><?php echo $i; ?></a></li>
                           <?php
                        }else{
                           ?>
                              <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                           <?php
                        }
                     } 
                  ?>
                  <li class="page-item <?php if($current_page == $total_page){echo "d-none";} ?>">
                     <a class="page-link" href="index.php?page=<?php echo $current_page+1; ?>">
                        Next
                     </a>
                  </li>
              </ul>
         </nav>
          <?php require "Shared/covid.php"; ?>
      <?php
        }
      ?>
   </div>
   <div id="sidebar">
      <?php require "Shared/sidebar.php" ?>
   </div>
   <?php require "Shared/backToTop.php"; ?>
</div>

<?php require "Shared/footer.php"; ?>
