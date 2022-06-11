<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<div class="wrapper ">
	<?php include "includes/sidenav.php";?>
	<div class="main-panel">
		<?php include "includes/nav.php";?>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header card-header-primary">
								<h4 class="card-title ">Messenger</h4>
								<p class="card-category"> View Chats Details here</p>
							</div>
							<div class="card-body">
							</div>
						</div>
					</div>
				</div>
		<?php include "includes/footer.php";?>