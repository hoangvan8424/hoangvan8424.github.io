<?php 
	require('../DB/connect.php'); 
	session_start();
	
?>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>Quản trị</title>	
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="../css/bootstrap.min.css">
	  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	  	<link rel="stylesheet" type="text/css" href="../style/style.css">
	  	<link rel="stylesheet" type="text/css" href="../style/admin.css">
	  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		
    </head>
    <body>
    	<?php 
			include("../modules/header.php");
			include("../modules/menu.php");			
		?>

		<div class="container-fluid"> <!-- bắt đầu container-fluid -->
			<div class="row"> <!-- bắt đầu row -->
				<div class="col-md-2"> <!-- bắt đầu cột danh mục -->
			        <ul class="nav nav-pills menu-danhmuc">
			        	
		        		<div class="user-name">
		        			<span><i class="far fa-laugh-wink"></i>Xin chào,</span> 
		        			<span><?php echo $_SESSION['user']['hoten']; ?></span>
		        		</div>
		        	
						<li class="nav-item dm-ql">
							<a class="nav-link" data-toggle="collapse" data-target="#target1">
								<i class="fas fa-camera-retro"></i>							
								<span>Sản phẩm</span>
								<i class="fas fa-chevron-right float-right"></i>
							</a>												
						</li>
						<div id="target1" class="collapse">
							<ul class="nav nav-fill">
								
								<li class="nav-item">
									<a class="nav-link" data-toggle="collapse" data-target="#target2">
										<i class="fas fa-desktop"></i>
										<span style="font-weight: 600;">Máy tính</span>
										<i class="fas fa-chevron-right float-right" style="font-size: 13px; margin-top: 4px;"></i>
									</a>
								</li>
								<div id="target2" class="collapse">
									<ul class="nav nav-fill">
										<li class="nav-item">
											<a href="admin.php?module=qlmt">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>D/s máy tính</span>
											</a>
											
										</li>
										<li class="nav-item">
											<a href="admin.php?module=dacdiemnbmt">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>Đặc điển nổi bật</span>
											</a>
											

										</li>
										<li class="nav-item">
											<a href="admin.php?module=tschmt">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>T/s cấu hình</span>
											</a>
										</li>
									</ul>
								</div>
								<li class="nav-item">
									<a class="nav-link" data-toggle="collapse" data-target="#target3">
										<i class="fas fa-camera-retro"></i>
										<span style="font-weight: 600;">Máy ảnh</span>
										<i class="fas fa-chevron-right float-right" style="font-size: 13px; margin-top: 4px;"></i>
									</a>
								</li>
								<div id="target3" class="collapse">
									<ul class="nav nav-fill">
										<li class="nav-item">
											<a href="admin.php?module=qlma">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>D/s máy ảnh</span>
											</a>
											
										</li>
										<li class="nav-item">
											<a href="admin.php?module=dacdiemnbma">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>Đặc điểm nổi bật</span>
											</a>
										</li>
										<li class="nav-item">
											<a href="admin.php?module=tschma">
												<i class="far fa-circle mr-1 mb-1" style="font-size: 8px;"></i>
												<span>T/s cấu hình</span>
											</a>
										</li>
									</ul>
								</div>
							</ul>
						</div>
							

							
						
						<li class="nav-item dm-ql">
							<a class="nav-link" href="admin.php?module=qlnd">
								<i class="fas fa-users-cog"></i>
								<span>Người dùng</span>
							</a>																
						</li>
						<li class="nav-item dm-ql">
							<a class="nav-link" href="admin.php?module=qlncc">
								<i class="far fa-address-card"></i>
								<span>Nhà cung cấp</span>
							</a>
						</li>
						<li class="nav-item dm-ql">
							<a class="nav-link" href="admin.php?module=qldt">
								<i class="fas fa-clipboard-check"></i>
								<span>Doanh thu</span>
							</a>
						</li>
					</ul>
				</div> <!-- kết thúc cột danh mục -->
				<div class="col-md-10"> <!-- bắt đầu nội dung -->

				<?php
					if(isset($_GET['module'])) {
						$module = $_GET['module'];
						include("admin/".$module.".php");
					}
					else {
						include("admin/qlmt.php");
					}
				?>

				</div> <!-- kết thúc nội dung -->
			</div> <!-- kết thúc row -->
		</div> <!-- kết thúc container-fluid -->

		
<!-- kết thúc quản lý sản phẩm -->
		<?php
			include("../modules/footer.php");
		?>
		
		<script>
			
			
			// var menu = document.getElementsByClassName("dm-ql");
			
			// function ql_nguoidung(){
				
			// 	menu[1].style.background = '#4992BF';
			// 	menu[0].style.background = 'none';
			// 	menu[2].style.background = 'none';
			// 	menu[3].style.background = 'none';

			// }
			function ql_sp(obj) {
				
				
				// menu[1].style.background = 'none';
				obj.style.background = '#4992BF';
				// menu[2].style.background = 'none';
				// menu[3].style.background = 'none';
				

			}
			// function ql_ncc() {
				
			// 	menu[0].style.background = 'none';
			// 	menu[1].style.background = 'none';
			// 	menu[2].style.background = '#4992BF';
			// 	menu[3].style.background = 'none';
			// }
			// function ql_dmsp() {
				
			// 	menu[0].style.background = 'none';
			// 	menu[1].style.background = 'none';
			// 	menu[2].style.background = 'none';
			// 	menu[3].style.background = '#4992BF';
			// }

			function chon_ncc(chon) {
				var luachon = chon.children;
				
				var ketqua = '';
				for (var i = 0; i < luachon.length; i++) {
					if(luachon[i].selected) {
						ketqua += luachon[i].value;
					}
					
				}


				if (ketqua==1) {					
					document.getElementById("target-mt").style.display='block';
					document.getElementById("target-ma").style.display='none';
					document.getElementById("ts-ma").style.display ='none';
					
				}
				else if(ketqua==2) {
					
					
					document.getElementById("target-mt").style.display='none';
					document.getElementById("target-ma").style.display='block';
					
					document.getElementById("ts-mt").style.display ='none';
					
				}
				else {
					
					
					document.getElementById("target-mt").style.display='none';
					document.getElementById("target-ma").style.display='none';
					
				}
			}
			function chon_ncc2(chon) {
				var luachon = chon.children;
				var ketqua = '';
				for (var i = 0; i < luachon.length; i++) {
					if(luachon[i].selected) {
						ketqua += luachon[i].value;
					}
					
				}


				if (ketqua==1) {
					
					document.getElementById("ncc1").style.display='block';
					document.getElementById("ncc2").style.display='none';
					


				}
				else if(ketqua==2) {
					
					document.getElementById("ncc1").style.display='none';
					document.getElementById("ncc2").style.display='block';
					
					
				}
				else {
					
					document.getElementById("ncc1").style.display='none';
					document.getElementById("ncc2").style.display='none';
					
				}
			}


		</script>

    </body>
</html>



