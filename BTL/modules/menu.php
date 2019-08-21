
<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top"> <!-- bắt đầu nav -->
	<a class="navbar-brand" href="trangchu.php">HTNshop.vn</a>
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		
	    <ul class="navbar-nav menu-may-tinh ml-sm-5">
	    	
		    <li class="nav-item mn-mt">
                <a class="nav-link text-left" href="maytinh.php" role="button">MÁY TÍNH</a>
				<!-- <div class="dropdown-menu sub-menu">
                    <a class="dropdown-item" href="#">ASUS</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">DELL</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">ACER</a>
                  
				</div> -->
            </li>
            
            
			<li class="nav-item mn-mt mr-4 ml-sm-5">
				<a class="nav-link text-left" href="mayanh.php" role="button">MÁY ẢNH</a>
				<!-- <div class="dropdown-menu sub-menu">
					<a class="dropdown-item" href="#">Canon</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Sony</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Máy ảnh cơ</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Máy ảnh kỹ thuật số</a>
				</div> -->
			</li>
			
			<li class="nav-item mn-mt">
				<form class="form-inline" id="data_form" method="get" action="">
				    <input class="form-control mr-sm-2" type="text" placeholder="Nhập tên sản phẩm..." id="searchBox" name="searchBox" >
				    <button class="btn btn-success" type="submit">Tìm Kiếm</button>
				    <div id="live_result">
				    	
				    </div>
			  	</form>
			  	
			</li>
	    </ul>
		

	</div>
	<div class="gh-dn-hd">
		<!-- <a href="#form-dangnhap" data-toggle="modal" id="dang-nhap" class="dn-dk"> -->
		<?php
			if(isset($_SESSION['user']['hoten']) and isset($_SESSION['user']['quyen'])) {
				$htdn = $_SESSION['user']['hoten'];
				$pq = $_SESSION['user']['quyen'];
				$id  = $_SESSION['user']['ID'];
				if($pq==1) {

					echo "  <div class='dropdown'>
							<a id='dang-nhap' class='dropdown-toggle dn-dk' data-toggle='dropdown'>$htdn</a>
							<ul class='dropdown-menu' id='dang-xuat'>							
								
								<li><a href='logout.php' class='text-center'>Đăng xuất<i class='fas fa-sign-out-alt ml-3'></i></a></li>    
						    </ul>
					    </div>
					";
					echo "<div class='mr-md-3'>
							<a href='cntrangthaigh.php'><i class='fas fa-file-invoice-dollar'></i></a>
						</div>";
					echo "<div>
							<a href='admin.php' data-toggle='tooltip' data-placement='bottom' title='Trang quản trị' class='mr-4'><i class='fas fa-file-alt'  style='font-size:25px; color:#FFF;'></i></a>
						</div>";
				}
				else if($pq==2) {
					echo "<div>
							<a href='cntrangthaigh.php'><i class='fas fa-file-invoice-dollar'></i></a>
						</div>";
					echo "<div class='dropdown'>
							<a id='dang-nhap' class='dropdown-toggle dn-dk' data-toggle='dropdown'>$htdn</a>
							<ul class='dropdown-menu' id='dang-xuat'>
								<li>
									<a href='lsgiaodich.php?id=$id' class='text-center'>Lịch sử mua hàng
									<i class='fas fa-history ml-3'></i>
									</a>
								</li>
								<li><a href='logout.php' class='text-center'>Đăng xuất<i class='fas fa-sign-out-alt ml-3'></i></a></li>
								 
						    </ul>
					    </div>
					";					
				}
				else {
					echo "  <div class='dropdown'>
							<a id='dang-nhap' class='dropdown-toggle dn-dk' data-toggle='dropdown'>$htdn</a>
							<ul class='dropdown-menu' id='dang-xuat'>
								<li>
									<a href='lsgiaodich.php?id=$id' class='text-center'>Lịch sử mua hàng
									<i class='fas fa-history ml-3'></i>
									</a>
								</li>
								<li>
									<a href='logout.php' class='text-center'>Đăng xuất<i class='fas fa-sign-out-alt ml-3'></i>
									</a>
								</li>

								 
						    </ul>
					    </div>
					";
				}
												
			}
			else{
				echo "<a href='#form-dangnhap' data-toggle='modal' id='dang-nhap' class='dn-dk'>Đăng nhập</a>";
			}
		?>
		

	</div>
	<div id="gio-hang"> <!-- bắt đầu giỏ hàng -->
		<a href="giohang.php">
			<i class="fas fa-shopping-bag" style="font-size: 25px;color: #ffca00;">
				<span class="badge-danger">
					<?php
						$kt = 1;
						if(isset($_SESSION['cart'])) {
							foreach ($_SESSION['cart'] as $key => $value) {
								if(isset($key)) {
									$kt=2;
								}
							}
						}
						if($kt!=2) {
							echo "0";
						}
						else {
							$kt=$_SESSION['cart'];
							echo count($kt);
						}
					?>
				</span>
			</i>
		</a> 
	</div> <!-- kết thúc giỏ hàng -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
</nav> <!-- kết thúc nav -->
<script type="text/javascript">
	$(document).ready(function(){
		$("[data-toggle='tooltip']").tooltip();
	})
	
</script>
