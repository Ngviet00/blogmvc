<?php
require "Shared/header.php";
require "Shared/headerTop.php";
require "Shared/navbar.php";
require "Shared/scroll.php";
?>
<div id="wp_content" class="container pt-4 d-flex justify-content-between">
   <div id=content>
      <div id="list_post">
         <h2 class="mb-4 text-primary"><?php echo $oneCategory['name']; ?></h2>
         <?php
         foreach ($postCategory as $value) {
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
         ?>
      </div>

   </div>
   <div id="sidebar">
      <?php require "Shared/sidebar.php" ?>
   </div>
</div>

<?php require "Shared/footer.php"; ?>