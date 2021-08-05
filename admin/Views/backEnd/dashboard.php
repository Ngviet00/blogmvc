<?php
if (!isset($_SESSION["current_user"])) {
	header("Location:login.php");
}
require_once("./Pages/header.php");
require_once("./Pages/navbar.php");

?>

<div id="wrapper" style="min-height:700px;">
	<div id="sidebar">
		<?php require_once("./Pages/sidebar.php");
		?>
	</div>
	<div id="content">
		<div id="hello">
			<h1>Welcome to Dashboard</h1>
			<p>Hello <span id="username"><?php echo $_SESSION['current_user']["username"]
													?></span> , welcome to your awesome dashboard!</p>
		</div>

		<div id="statistical">
			<div class="item">
				<div class="icon">
					<i class="fa fa-user" aria-hidden="true"></i>
				</div>
				<div id="number">
					<h1><?php echo $user[0] ?></h1>
					<p>User</p>
				</div>
			</div>
			<div class="item" id="item2">
				<div class="icon">
					<i class="fa fa-id-card-o" aria-hidden="true"></i>
				</div>
				<div id="number">
					<h1><?php echo $post[0] ?></h1>
					<p>Post</p>
				</div>
			</div>
			<div class="item" id="item3">
				<div class="icon">
					<i class="fa fa-envelope-open-o" aria-hidden="true"></i>

				</div>
				<div id="number">
					<h1><?php echo $category[0] ?></h1>
					<p>Category</p>
				</div>
			</div>
		</div>

		<div id="member">
			<div class="item">
				<div class="icon">
					<img src="https://kenh14cdn.com/Images/Uploaded/Share/2011/09/14/110914kpleonvisser.jpg">

				</div>
				<div id="number">
					<h1>Hiddleston</h1>
					<p>CEO of Daimler</p>
				</div>
			</div>
			<div class="item">
				<div class="icon">
					<img src="https://photo-baomoi.zadn.vn/w700_r1/2020_08_18_277_36083481/63fccf9559d6b088e9c7.jpg">

				</div>
				<div id="number">
					<h1>Adelaide</h1>
					<p>COO of General Electric</p>
				</div>
			</div>
		</div>
		<div id="member">
			<div class="item" style="margin-top: 2em !important">
				<div class="icon">
					<img src="https://sohanews.sohacdn.com/k:2014/anhnguyenvetranhdepsoha3-637b0/tai-nang-cua-nhung-chang-trai-viet-9x-khien-nhieu-nguoi-kinh-ngac.jpg">

				</div>
				<div id="number">
					<h1>John</h1>
					<p>CFO of GG</p>
				</div>
			</div>
			<div class="item" style="margin-top: 2em !important">
				<div class="icon">
					<img src="https://img.lovepik.com/photo/50145/5213.jpg_wh860.jpg">

				</div>
				<div id="number">
					<h1>Ibrahim</h1>
					<p>CEO of Technology</p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
require_once('./Pages/footer.php');
?>