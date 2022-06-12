<?php include "includes/header.php";
if(!isset($_SESSION['admin'])){
    header("location:login.php");
    die();
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.6.0/css/all.min.css" integrity="sha512-ykRBEJhyZ+B/BIJcBuOyUoIxh0OfdICfHPnPfBy7eIiyJv536ojTCsgX8aqrLQ9VJZHGz4tvYyzOM0lkgmQZGw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
	.chat{
			margin-top: auto;
			margin-bottom: auto;
			color:black;
		}
		.contacts_body{
			padding:  0.75rem 0 !important;
			overflow-y: auto;
			black-space: nowrap;
			height: 600px;
		}
		.msg_card_body{
			overflow-y: auto;
		}
		.card-header{
			border-radius: 15px 15px 0 0 !important;
			border-bottom: 0 !important;
		}
	 .card-footer{
		border-radius: 0 0 15px 15px !important;
			border-top: 0 !important;
	}
		.container{
			align-content: center;
		}
		.search{
			border-radius: 15px 0 0 15px !important;
			/* background-color: #9830B0 !important; */
			border:0 !important;
			color:black !important;
		}
		.search:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.type_msg{
			/* background-color: #9830B0 !important; */
			border:0 !important;
			color:black !important;
			height: 60px !important;
			overflow-y: auto;
		}
			.type_msg:focus{
		     box-shadow:none !important;
           outline:0px !important;
		}
		.attach_btn{
	border-radius: 15px 0 0 15px !important;
	background-color: #9830B0 !important;
			border:0 !important;
			color: black !important;
			cursor: pointer;
		}
		.send_btn{
	border-radius: 0 15px 15px 0 !important;
	background-color: #9830B0 !important;
			border:0 !important;
			color: black !important;
			cursor: pointer;
		}
		.search_btn{
			border-radius: 0 15px 15px 0 !important;
			background-color: #9830B0 !important;
			border:0 !important;
			color: black !important;
			cursor: pointer;
		}
		.contacts{
			list-style: none;
			padding: 0;
		}
		.contacts li{
			width: 100% !important;
			padding: 5px 10px;
			margin-bottom: 15px !important;
		}
	.active{
			background-color: #9830B0;
	}
		.user_img{
			height: 70px;
			width: 70px;
			border:1.5px solid #f5f6fa;
		
		}
		.user_img_msg{
			height: 40px;
			width: 40px;
			border:1.5px solid #f5f6fa;
		
		}
	.img_cont{
			position: relative;
			height: 70px;
			width: 70px;
	}
	.img_cont_msg{
			height: 40px;
			width: 40px;
	}
	.online_icon{
		position: absolute;
		height: 15px;
		width:15px;
		background-color: #4cd137;
		border-radius: 50%;
		bottom: 0.2em;
		right: 0.4em;
		border:1.5px solid black;
	}
	.offline{
		background-color: #c23616 !important;
	}
	.user_info{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 15px;
	}
	.user_info span{
		font-size: 20px;
		color: black;
	}
	.user_info p{
	font-size: 10px;
	color: black;
	}
	.video_cam{
		margin-left: 50px;
		margin-top: 5px;
	}
	.video_cam span{
		color: black;
		font-size: 20px;
		cursor: pointer;
		margin-right: 20px;
	}
	.msg_cotainer{
		margin-top: auto;
		margin-bottom: auto;
		margin-left: 10px;
		border-radius: 25px;
		background-color: #82ccdd;
		padding: 10px;
		position: relative;
	}
	.msg_cotainer_send{
		margin-top: auto;
		margin-bottom: auto;
		margin-right: 10px;
		border-radius: 25px;
		background-color: #78e08f;
		padding: 10px;
		position: relative;
	}
	.msg_time{
		position: absolute;
		left: 15px;
		bottom: -20px;
		color: black;
		font-size: 10px;
	}
	.msg_time_send{
		position: absolute;
		right:15px;
		bottom: -20px;
		color: black;
		font-size: 10px;
	}
	.msg_head{
		position: relative;
	}
	#action_menu_btn{
		position: absolute;
		right: 10px;
		top: 10px;
		color: black;
		cursor: pointer;
		font-size: 20px;
	}
	.action_menu{
		z-index: 1;
		position: absolute;
		padding: 15px 0;
		background-color: rgba(0,0,0,0.5);
		color: black;
		border-radius: 15px;
		top: 30px;
		right: 15px;
		display: none;
	}
	.action_menu ul{
		list-style: none;
		padding: 0;
	margin: 0;
	}
	.action_menu ul li{
		width: 100%;
		padding: 10px 15px;
		margin-bottom: 5px;
	}
	.action_menu ul li i{
		padding-right: 10px;
	
	}
	.action_menu ul li:hover{
		cursor: pointer;
		background-color: rgba(0,0,0,0.2);
	}
	@media(max-width: 576px){
	.contacts_card{
		margin-bottom: 15px !important;
	}
	}
</style>
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
							<div class="card-body text-black">
								<div class="row justify-content-center h-100">
									<div class="col-4 col-xl-3 chat">
										<div class="card mb-sm-3 mb-md-0 mt-md-0 contacts_card" style="height: 600px;
			border-radius: 15px !important;">
											<div class="card-header">
												<div class="input-group">
													<input type="text" placeholder="Search..." name=""
														class="form-control search">
													<div class="input-group-prepend">
														<span class="input-group-text search_btn"><i
																class="fas fa-search"></i></span>
													</div>
												</div>
											</div>
											<div class="card-body contacts_body">
												<ui class="contacts">
													<li class="active">
														<div class="d-flex bd-highlight">
															<div class="img_cont d-none d-md-block">
																<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
																	class="rounded-circle user_img">
																<span class="online_icon"></span>
															</div>
															<div class="user_info">
																<span>Person 1</span>
																<p>last chat (just now)</p>
															</div>
														</div>
													</li>
													<li>
														<div class="d-flex bd-highlight">
															<div class="img_cont d-none d-md-block">
																<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
																	class="rounded-circle user_img">
																<span class="online_icon offline"></span>
															</div>
															<div class="user_info">
																<span>Person 2</span>
																<p>left 7 mins ago</p>
															</div>
														</div>
													</li>
													<li>
														<div class="d-flex bd-highlight">
															<div class="img_cont d-none d-md-block">
																<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
																	class="rounded-circle user_img">
																<span class="online_icon"></span>
															</div>
															<div class="user_info">
																<span>Person 3</span>
																<p>online</p>
															</div>
														</div>
													</li>
												</ui>
											</div>
											<div class="card-footer"></div>
										</div>
									</div>
									<div class="col-8 col-xl-6 chat">
										<div class="card" style="height: 600px;
			border-radius: 15px !important;">
											<div class="card-header msg_head">
												<div class="d-flex bd-highlight">
													<div class="img_cont">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img">
														<span class="online_icon"></span>
													</div>
													<div class="user_info">
														<span>Chat with Person 1</span>
														<p>1767 Messages</p>
													</div>
												</div>
											</div>
											<div class="card-body msg_card_body">
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Hi, how are you samim?
														<span class="msg_time">8:40 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-end mb-4">
													<div class="msg_cotainer_send">
														Hi Khalid i am good tnx how about you?
														<span class="msg_time_send">8:55 AM, Today</span>
													</div>
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														I am good too, thank you for your chat template
														<span class="msg_time">9:00 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-end mb-4">
													<div class="msg_cotainer_send">
														You are welcome
														<span class="msg_time_send">9:05 AM, Today</span>
													</div>
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														I am looking for your next templates
														<span class="msg_time">9:07 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-end mb-4">
													<div class="msg_cotainer_send">
														Ok, thank you have a good day
														<span class="msg_time_send">9:10 AM, Today</span>
													</div>
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Bye, see you
														<span class="msg_time">9:12 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Bye, see you
														<span class="msg_time">9:12 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Bye, see you
														<span class="msg_time">9:12 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Bye, see you
														<span class="msg_time">9:12 AM, Today</span>
													</div>
												</div>
												<div class="d-flex justify-content-start mb-4">
													<div class="img_cont_msg d-none d-md-block">
														<img src="https://cdn-icons-png.flaticon.com/512/219/219986.png"
															class="rounded-circle user_img_msg">
													</div>
													<div class="msg_cotainer">
														Bye, see you
														<span class="msg_time">9:12 AM, Today</span>
													</div>
												</div>
											</div>
											<div class="card-footer">
												<div class="input-group form-group">
													<textarea name=""
														class="form-control type_msg" rows="5"
														placeholder="Type your message..."></textarea>
													<div class="input-group-append">
														<span class="input-group-text send_btn"><i
																class="fas fa-location-arrow"></i></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include "includes/footer.php";?>