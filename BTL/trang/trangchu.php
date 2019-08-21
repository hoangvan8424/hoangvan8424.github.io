<?php
	session_start();
	// unset($_SESSION['cart']);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link href = "../css/jquery-ui.css" rel = "stylesheet">
	<script src="../js/jquery-ui.js"></script>
	<script src="../trang/script.js"></script>
	<script src="../js/script.js"></script>

</head>
<body>
	<?php 
		include("../modules/header.php");
		include("../modules/menu.php"); 
		include("../modules/slide.php");
		include("../modules/form_dangnhap.php");
		include("../modules/form_dangky.php");
		include("../DB/connect.php");
	?>


	<div class="container-fluid">

		<div class="row mt-header"> <!-- row menu -->
	        <div class="logo-mt">
	          <i class="fas fa-desktop pr-2"></i>
	            <span>MÁY TÍNH</span>
	        </div>
	        
		</div> <!-- hết row menu -->

		<div class="row"> <!-- bắt đầu row -->
			<div class="col-sm-4" id="may-tinh-noi-bat"> <!-- bắt đầu cột 4 -->
		        <ul class="nav nav-tabs menu-nb"> <!-- menu nổi bật-mới -->
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb">NỔI BẬT</button>
  					</li>
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" onclick="hienthi_mtm()">MỚI</button>
  					</li>
  					
  				</ul> <!-- hết menu nổi bật-mới -->
  				<?php 
							
							$sql="SELECT * FROM `sanpham` WHERE maloai=2 AND maDM=1 AND trangthai=1 LIMIT 1, 3";
						    $query = mysql_query($sql);
						    $num = mysql_num_rows($query);
						    if($num>0){
					 			while ($row = mysql_fetch_array($query)) {
					 		
					    ?>
				<a href="chitietmt.php?id=<?php echo $row['maSP'];?>">
					<div class="row mb-3">
						<div class="col-sm-12">
							<div class="card mt-nb">
								<div class="mt-nb-1">								
									<img class="card-img-top anh-mt-nb" src="../img/<?php echo $row['hinhanh'] ?>" alt="Máy tính nổi bật 1">
									<div class="card-block tieu-de-mt-nb">
										<div class="gia text-dark">
											<h6 class="id_mt_nb<?php echo $row['maSP'];?>" id="<?php echo $row['maSP'];?>"><?php echo $row['tenSP']; ?></h6>
											<p class="card-text">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.') ; ?>₫</strong></p>
										</div>
										<a class="btn btn-primary btn-block btn-mn" id="addcart_mtnb<?php echo $row['maSP'];?>">Thêm vào giỏ hàng</a>
									
									</div>
								</div>
																												
							</div>													
						</div>
					</div>
				</a>

				<script type="text/javascript">
					$(document).ready(function() {
						$("#addcart_mtnb<?php echo $row['maSP'];?>").click(function(){
							var idMTNB = $(".id_mt_nb<?php echo $row['maSP']?>").attr('id');
							$.ajax({
								type: "POST",
								url: "../modules/themvaogiohang.php",
								data:{id : idMTNB},
								cache: false,
								success: function(result) {
									alert("Sản phẩm đã được thêm vào giỏ hàng!");
									window.location.reload();
									
									
								}
							});
						});
					});
				</script>


			<?php
					}
				}
			?>

			</div> <!-- hết cột 4 -->

			<div class="col-sm-4" id="may-tinh-moi"> <!-- bắt đầu cột 4 máy tính mới -->
		        <ul class="nav nav-tabs menu-nb menu-moi"> <!-- menu nổi bật-mới -->
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" onclick="hienthi_mtnb()">NỔI BẬT</button>
  					</li>
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" >MỚI</button>
  					</li>
  					
  				</ul> <!-- hết menu mới-->
  				<?php 
							
					$sql="SELECT * FROM sanpham WHERE maloai=1 AND maDM=1 AND trangthai=1 LIMIT 1, 3";
				    $query = mysql_query($sql);
				    $num = mysql_num_rows($query);
				    if($num>0){
			 			while ($row = mysql_fetch_array($query)) {
					 		
				?>
				<a href="chitietmt.php?id=<?php echo $row['maSP'];?>">
					<div class="row mb-3">
						<div class="col-sm-12">
							
							<div class="card mt-nb">
								<div class="mt-nb-1">								
									<img class="card-img-top anh-mt-nb" src="../img/<?php echo $row['hinhanh'] ?>" alt="Máy tính nổi bật 1">
									<div class="card-block tieu-de-mt-nb">
										<div class="gia text-dark">
											<h6 class="id_mt_moi<?php echo $row['maSP'];?>" id="<?php echo $row['maSP']; ?>"><?php echo $row['tenSP']; ?></h6>
											<p class="card-text">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.') ; ?>₫</strong></p>
										</div>
										<a class="btn btn-primary btn-block btn-mn" id="addcart_mtmoi<?php echo $row['maSP'];?>">Thêm vào giỏ hàng</a>
									
									</div>
								</div>
																												
							</div>	
													
						</div>
					</div>
				</a>

				<script type="text/javascript">
					$(document).ready(function() {
						$("#addcart_mtmoi<?php echo $row['maSP'];?>").click(function() {
							var idMTM = $(".id_mt_moi<?php echo $row['maSP'];?>").attr('id');
							$.ajax({
								type: "POST",
								url: "../modules/themvaogiohang.php",
								data:{id : idMTM},
								cache: false,
								success: function(result) {
									alert("Sản phẩm đã được thêm vào giỏ hàng!");
									window.location.reload();
									
									
								}
							});
						});
					});
				</script>


				<?php
						}
					}
				?>

			</div> <!-- hết cột 4 hết sản phẩm mới-->

			<div class="col-sm-8 may-tinh"> <!-- bắt đầu cột 8-->		
		        <nav class="nav nv-mt-tcsp"> <!-- menu tất cả sản phẩm-xem thêm -->
        			<span><b style="line-height: 2.5rem">Tất cả sản phẩm</b></span>
        			<a class="nav-link" href="maytinh.php">Xem thêm <i class="fas fa-angle-double-right"></i></a>
		        </nav>   <!-- hết menu tất cả sản phẩm-xem thêm -->            
				<div class="card-deck-wrapper">	 <!-- bắt đầu card-deck-wrapper -->
					<!-- Dòng 1  -->
					
					<div class="card-deck">	 <!-- bắt đầu card-deck -->
						<?php 
						
							$sql="SELECT * FROM sanpham WHERE maloai=3 AND maDM=1 LIMIT 1,9";
						    $query = mysql_query($sql);
						    $num = mysql_num_rows($query);
						    if($num>0){
					 			while ($row = mysql_fetch_array($query)) {
					 		
					    ?>
					    <a href="chitietmt.php?id=<?php echo $row['maSP'];?>">	
							<div class="card card-mt mb-4">
								
								<div class="layer-1">
									<img class="card-img-top anh-1" src="../img/<?php echo $row['hinhanh']?>" alt="Máy tính 1">
									<div class="nen"></div>
																
								</div>
																	
								<div class="card-block pt-3 pb-3">									
									<p class="sanpham_id<?php echo $row['maSP'];?>" id="<?php echo $row['maSP'];?>"><?php echo $row['tenSP'];?></p>
									<p class="card-text text-left mb-1">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.');?>₫</strong></p>
									<a id="addcard<?php echo $row['maSP'];?>" class="btn btn-primary btn-block">Thêm vào giỏ hàng</a>														
								</div>
								
							</div>
						</a>

						<script type="text/javascript">
							$(document).ready(function(){
								$("#addcard<?php echo $row['maSP'];?>").click(function(){									
									var idSP = $(".sanpham_id<?php echo $row['maSP'];?>").attr('id');
								

									$.ajax({
										type: "POST",
										url: "../modules/themvaogiohang.php",
										data:{id : idSP},
										cache: false,
										success: function(result) {
											alert("Sản phẩm đã được thêm vào giỏ hàng!");
											window.location.reload();
											
											
										}
									});

								});
							});
						</script>

						<?php 
								}
					 		}
						?>
						
					
					
					</div> <!-- kết thúc card-deck -->
					
				</div> <!-- kết thúc card-deck-wrapper -->
			</div> <!-- hết cột 8 -->
		</div> <!-- hết row -->
	</div> <!-- hết container-fluid -->

	<!-- Máy ảnh -->
	<div class="container-fluid mt-3"> <!-- bắt đầu nội dung máy ảnh-->
		<div class="row ma-header" >
		    <div class="logo-ma">
		      <i class="fas fa-camera pr-2"></i>
		        <span>MÁY ẢNH</span>
        	</div>
	        
      	</div>

		<div class="row"> <!-- bắt đầu row -->
			<div class="col-sm-4" id="may-anh-noi-bat"> <!-- bắt đầu cột 4 -->
		        <ul class="nav nav-tabs menu-nb">
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" style="text-decoration: none;">NỔI BẬT</button>
  					</li>
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" style="text-decoration: none;" onclick="hienthi_mam()">MỚI</button>
  					</li>
  					
  				</ul>
  				<!-- Sản phẩm nổi bật 1 -->
  				<?php
  					
							$sql="SELECT * FROM sanpham WHERE trangthai=1 AND maDM=2 AND maloai=2 LIMIT 0, 3";
						    $query = mysql_query($sql);
						    $num = mysql_num_rows($query);
						    if($num>0){
					 			while ($row = mysql_fetch_array($query)) {

  				?>
  				<a href="chitietspma.php?id=<?php echo $row['maSP'];?>"> 
					<div class="row mb-3">
						<div class="col-sm-12">
							
							<div class="card ma-1">
								<div class="ma-nb-1">
									<img class="card-img-top anh-ma-1" src="../img/<?php echo $row['hinhanh'] ?>" alt="Card image cap">
									<div class="card-block tieu-de-ma-nb">
										<div class="gia">
											<h6 class="id_ma_nb<?php echo $row['maSP'];?>" id="<?php echo $row['maSP']; ?>"><?php echo $row['tenSP']; ?></h6>
											<p class="card-text">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.')  ?>₫</strong></p>
										</div>											
										<a class="btn btn-primary btn-block bt-mn" id="addcart_manb<?php echo $row['maSP'];?>">Thêm vào giỏ hàng</a>
									
									</div>
								</div>
							</div>
																				
						</div>
					</div>
				</a>
				<script type="text/javascript">
					$(document).ready(function(){
						$("#addcart_manb<?php echo $row['maSP'];?>").click(function(){
							var idMANB = $(".id_ma_nb<?php echo $row['maSP'];?>").attr('id');							
							$.ajax({
								type: "POST",
								url: "../modules/themvaogiohang.php",
								data:{id : idMANB},
								cache: false,
								success: function(result) {
									alert("Sản phẩm đã được thêm vào giỏ hàng!");
									window.location.reload();
									
									
								}
							});
						});
					});
				</script>

				<?php 
						}
					}
				?>
				<!-- Hết sản phẩm nổi bật 1 -->


			</div> <!-- hết cột 4-->

			<div class="col-sm-4" id="may-anh-moi" style="display:none;"> <!-- bắt đầu cột 4 -->
		        <ul class="nav nav-tabs menu-nb">
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" style="text-decoration: none;" onclick="hienthi_manb()">NỔI BẬT</button>
  					</li>
  					<li class="nav-item">
  						<button type="button" class="btn btn-link m-nb" style="text-decoration: none; color: #007BFF; border-bottom: 2px solid ">MỚI</button>
  					</li>
  					
  				</ul>
  				<!-- Sản phẩm nổi bật 1 -->
  				<?php
  					
					$sql="SELECT * FROM sanpham WHERE trangthai=1 AND maDM=2 AND maloai=1 LIMIT 0, 3";
				    $query = mysql_query($sql);
				    $num = mysql_num_rows($query);
				    if($num>0){
			 			while ($row = mysql_fetch_array($query)) {

  				?>
  				<a href="chitietspma.php?id=<?php echo $row['maSP'];?>"> 
					<div class="row mb-3">
						<div class="col-sm-12">
							<a href="#" class="text-dark">
								<div class="card ma-1">
									<div class="ma-nb-1">
										<img class="card-img-top anh-ma-1" src="../img/<?php echo $row['hinhanh'] ?>" alt="Card image cap">
										<div class="card-block tieu-de-ma-nb">
											<div class="gia">
												<h6 class="id_ma_moi<?php echo $row['maSP'];?>" id="<?php echo $row['maSP'];?>"><?php echo $row['tenSP']; ?></h6>
												<p class="card-text">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.')  ?>₫</strong></p>
											</div>											
											<a class="btn btn-primary btn-block bt-mn" id="addcart_mamoi<?php echo $row['maSP'];?>">Thêm vào giỏ hàng</a>
										
										</div>
									</div>
								</div>
							</a>													
						</div>
					</div>
				</a>

				<script type="text/javascript">
					$(document).ready(function(){
						$("#addcart_mamoi<?php echo $row['maSP'];?>").click(function(){
							var idMAM = $(".id_ma_moi<?php echo $row['maSP'];?>").attr('id');
							$.ajax({
								type: "POST",
								url: "../modules/themvaogiohang.php",
								data:{id : idMAM},
								cache: false,
								success: function(result) {
									alert("Sản phẩm đã được thêm vào giỏ hàng!");
									window.location.reload();
									
									
								}
							});
						});
					});
				</script>

				<?php 
						}
					}
				?>
				<!-- Hết sản phẩm nổi bật 1 -->


			</div> <!-- hết cột 4-->

			<div class="col-sm-8 cmr"> <!-- bắt đầu cột 8 -->	
				<nav class="nav nv-mt-tcsp">
        			<span><b style="line-height: 2.5rem">Tất cả sản phẩm</b></span>
        			<a class="nav-link" href="mayanh.php">Xem thêm <i class="fas fa-angle-double-right"></i></a>
		        </nav>

				<div class="card-deck-wrapper">
					
					<div class="card-deck">
						<?php 
							
							$sql="SELECT * FROM sanpham WHERE maloai=3 AND maDM=2 AND trangthai=1 LIMIT 0,9";
						    $query = mysql_query($sql);
						    $num = mysql_num_rows($query);
						    if($num>0){
					 			while ($row = mysql_fetch_array($query)) {
					 				
					 		
					    ?>
					    <a href="chitietspma.php?id=<?php echo $row['maSP'];?>"> 
							<div class="card camera card-cam mb-4"> <!-- Máy ảnh 1 -->

								<div class="layer-1-ma mb-2"> <!-- ảnh -->
										<img class="card-img-top cam-1" src="../img/<?php echo $row['hinhanh']?>" alt="Máy ảnh 1">
										<div class="nen-ma"></div>
																
								</div> <!-- hết div chứa ảnh -->

								<div class="card-block ma-gia pt-2 pl-2"> <!-- div chứa giá, tên sp máy ảnh -->
									<p class="mayanh_id<?php echo $row['maSP'];?>" id="<?php echo $row['maSP'];?>"><?php echo $row['tenSP']?></p>
									<p class="">Giá: <strong><?php echo number_format($row['gia'], 0, '.', '.') ?>₫</strong></p>
									<a class="btn btn-primary btn-block" id="addcard_ma<?php echo $row['maSP'];?>">Thêm vào giỏ hàng</a>						
								</div> <!-- hết div chứa giá, tên sp -->
							</div> <!-- hết máy ảnh 1 -->
						</a>
						<script type="text/javascript">
							$(document).ready(function(){
								$("#addcard_ma<?php echo $row['maSP'];?>").click(function(){
									var idMA = $(".mayanh_id<?php echo $row['maSP'];?>").attr('id');
									// alert(idMA);

									$.ajax({
										type: "POST",
										url: "../modules/themvaogiohang.php",
										data:{id : idMA},
										cache: false,
										success: function(result) {
											alert("Sản phẩm đã được thêm vào giỏ hàng!");
											window.location.reload();																					
										}
									});
								});

								
							});
						</script>


						<?php
								}
							}

						?>
						
					</div> <!-- hết dòng 1 -->					
				</div>
			</div>
		</div>
	</div>
	<?php 
		include("../modules/footer.php")
	?>


<script>
	$(document).ready(function(){
		// $("#form-dangnhap").modal("show");
	  $("#dk-1").click(function(){
	  	$("#form-dangky").modal("show");
	    $("#form-dangnhap").modal("hide");
	    
	  });
	  $("#dn-2").click(function(){
	    $("#form-dangnhap").modal("show");
	    $("#form-dangky").modal("hide");
	    
	  });
	});
	
	var mtnb = document.getElementById("may-tinh-noi-bat");
	var mtm = document.getElementById("may-tinh-moi");
	function hienthi_mtm() {
		mtm.style.display='block';
		mtnb.style.display='none';
	}
	function hienthi_mtnb() {
		mtm.style.display='none';
		mtnb.style.display='block';
	}

	var manb = document.getElementById("may-anh-noi-bat");
	var mam = document.getElementById("may-anh-moi");
	function hienthi_mam() {
		manb.style.display='none';
		mam.style.display='block';
	}
	function hienthi_manb() {
		manb.style.display='block';
		mam.style.display='none';
	}
</script>
</body>
</html>