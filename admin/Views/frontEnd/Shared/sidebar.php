<h2 id="title">Danh mục phổ biến</h2>
<ul id="category">
   <?php
   foreach ($category as $value) {
   ?>
      <li>
         <a href="?controller=home&action=listPostCategory&id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a>
      </li>
   <?php
   }
   ?>
</ul>

<h2 id="title">Lập trình</h2>
<ul id="different_news">
   <li>
      <a target="_blank" href="https://nordiccoder.com/khoa-hoc/khoa-hoc-react-js-co-ban/">
         <img src="admin/upload/banner.jpg" alt="">
      </a>
      <h3>
         Khóa học lập trình
      </h3>
   </li>
   <li>
      <a target="_blank" href="https://nordiccoder.com/khoa-hoc/khoa-hoc-business-analysis-fundamentals/">
         <img src="admin/upload/img.png" alt="">
      </a>
      <h3>Các bạn đã hiểu gì về Hosting ? Top những hosting tốt nhất hiện nay</h3>
   </li>
   <li>
      <a target="_blank" href="https://nordiccoder.com/khoa-hoc/khoa-hoc-thiet-ke-giao-dien/">
         <img src="admin/upload/img2.jpg" alt="">
      </a>
      <h3>Cách Lựa Chọn Laptop Cho Dân Đồ Họa</h3>
   </li>
</ul>