<?php
require "Shared/header.php";
require "Shared/headerTop.php";
require "Shared/navbar.php";
require "Shared/scroll.php";
?>
<style>
img {
   width: 750px;
}
</style>
<div id="wp_content" class="container pt-4 d-flex justify-content-between">
   <div id="content" style="border-right: 1px solid #e5e4e4;padding-right:15px">
      <div id="top_content" class="d-flex justify-content-between">
         <div id="category" class="text-secondary">
            <?php
            foreach ($category as $value) {
               if ($value['id'] == $onePost['category_id']) {
                  echo $value['name'];
               }
            }
            ?>
         </div>
         <div id="time" class="text-secondary">
            <?php echo date("F j, Y g:i:s a", strtotime($onePost["created_at"])); ?>
         </div>
      </div>
      <div id="main_content" class="text-justify" style="text-align:justify">
         <h1 id="title_content" style="padding: 10px 0px;"><?php echo $onePost['title'] ?></h1>
         <div id="short_desc">
            <?php echo $onePost['short_desc'] ?> </div>
         <div id="description">
            <?php echo $onePost['content']; ?>
         </div>
         <div class="fb-comments" data-href="https://banhiep.com" data-width="700" data-numposts="1"></div>
      </div>

      <div class="similar-posts my-4">
         <h2>Bài viết liên quan</h1>
            <div class="d-flex flex-wrap justify-content-between">
               <?php
                  foreach ($listSimilarPost as $value) {
                     ?>
                     <div class="card" style="flex-basis: 32%;">
                        <a href="?controller=home&action=postDetail&id=<?php echo $value['id'] ?>" title="">
                           <img class="card-img-top"
                              height="134px"
                              src="admin/upload/<?php echo $value['image_desc']; ?>" 
                              alt="Card image cap">
                           <div class="card-body">
                              <p style="color: black;text-decoration: none;font-size: 15px;"><?php echo $value['title'] ?></p>
                           </div>
                        </a>
                     </div>
                     <?php
                  }
               ?>
            </div>
      </div>
   </div>
   <div id="sidebar">
      <?php require "Shared/sidebar.php" ?>
   </div>
</div>
<?php require "Shared/footer.php"; ?>