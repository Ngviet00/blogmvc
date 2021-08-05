<?php
ob_start();
session_start();
require_once('./pages/header.php');
require_once('./Database/Database.php');
?>
<?php
$message = "";
if (count($_POST) > 0) {
   $user_name = $_POST['username'];
   $password = md5($_POST['password']);

   $connect = new Database();

   $conn = $connect->connect();

   $sql = "SELECT * FROM users WHERE username = '" . $user_name . "' AND password = '" . $password . "'";

   $result = mysqli_query($conn, $sql);

   $user = mysqli_fetch_assoc($result);

   $num_rows = mysqli_num_rows($result);

   if ($num_rows == 0) {
      $message = "Invalid Username or Password!";
   } else {
      $_SESSION['current_user'] = $user;
      header("Location:index.php?controller=dashboard");
   }
}
?>
<div class="pt-5" id="login">

   <div class="container">
      <div class="row">
         <div class="col-md-5 mx-auto">
            <div class="card card-body">
               <form id="submitForm" action="login.php" method="post">
                  <input type="hidden" name="_csrf" value="7635eb83-1f95-4b32-8788-abec2724a9a4">
                  <div class="form-group required">
                     <label for="username" class="pb-2">Username</label>
                     <input 
                           type="text" 
                           class="form-control text-lowercase" 
                           id="username" 
                           required="" 
                           name="username"
                           value="<?php if (isset($_POST['username'])) {echo $_POST['username'];} ?>">
                  </div>
                  <div class="form-group required">
                     <label class="d-flex flex-row align-itemster pb-2" for="password">
                        Password
                     </label>
                     <input type="password" <?php if (isset($_POST['password'])) {
                                                echo "autofocus";
                                             } ?> class="form-control" required="" id="password" name="password" value="">
                  </div>
                  <div class="form-group pt-1">
                     <button class="btn btn-primary btn-block" type="submit">Log In</button>
                  </div>
               </form>
               <p class="text-danger">
                  <?php if ($message !== "") {
                     echo $message;
                  }
                  ?>
               </p>
            </div>
         </div>
      </div>
   </div>
</div>