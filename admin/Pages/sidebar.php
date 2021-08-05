<div id="sidebar-wrapper" class="bg-white">
   <ul class="sidebar-nav">
      <li class="text-white bg-secondary text-white text-center border-bottom p-3">
         ADMIN
      </li>
      <li class="border-bottom">
         <a href="?controller=user&action=show&id=<?php echo $_SESSION['current_user']['id'] ?>" class="text-dark">
            Acount
         </a>
      </li>
      <li class="border-bottom">
         <a href="?controller=post&action=index&page=1" class="text-dark">
            Post
         </a>
      </li>
      <li class="border-bottom">
         <a href="?controller=user&action=index&page=1" class="text-dark">User</a>
      </li>
      <li class="border-bottom">
         <a href="?controller=category&action=index&page=1" class="text-dark">Category</a>
      </li>
      <li class="border-bottom">
         <a href="#" class="text-dark">Banner</a>
      </li>
   </ul>
</div>