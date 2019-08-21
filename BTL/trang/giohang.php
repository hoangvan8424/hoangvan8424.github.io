<?php
	session_start();
	// unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Giỏ hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link rel="stylesheet" type="text/css" href="../style/giohang.css">
  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		

		include("../modules/header.php");
		include("../modules/menu.php"); 
		include("../modules/form_dangnhap.php");
		include("../modules/form_dangky.php");
		include("../DB/connect.php");
		
// Cập nhật lại giỏ hàng khi thay đổi số lượng
		if(isset($_POST['capnhatghbt']))
		{
			foreach ($_POST['qty'] as $key => $value) {
				
				if ($value > 0 and is_numeric($value)) {
					$_SESSION['cart'][$key]['soluong'] = $value;				
				}
				elseif($value <= 0 and is_numeric($value)){
					unset($_SESSION['cart'][$key]);					
				}				
			}
			echo "<script>window.location.reload;</script>";
		}
		
// hết cập nhật lại giỏ hàng

	?>


	<div class="container-fluid"> <!-- bắt đầu nội dung -->
		<div class="row" id="row-gio-hang"> <!-- bắt đầu row -->
		<?php
			$kt = 1;
			if(isset($_SESSION['cart'])) 
			{
				foreach ($_SESSION['cart'] as $key => $value) 
				{
					if (isset($key))
					{
						$kt = 2;
					}
				}
			}

			if($kt==2)
			{
			// Trong giỏ hàng đã có sản phẩm
		?>
			<form method="POST"> <!-- bắt đầu form -->
				<div class="col-sm-8"> <!-- bắt đầu cột đầu tiên -->
	 				<div class="tong-sp mt-3">
	 					<p>Giỏ hàng</p>
	 				</div>
					
					<div class="thong-tin-gh mt-3"> <!-- cột trái chứa sản phẩm có trong giỏ -->

						<?php

							$tongTienSP=0;
							foreach ($_SESSION['cart'] as $key => $value) {
																			 			
					 			
						?>
						<div id="sp-trong-gio"> <!-- sản phẩm trong giỏ -->
							<div class="trai"> <!-- bắt đầu cột ảnh -->
								<img src="../img/<?php echo $_SESSION['cart'][$key]['anh']; ?>" class="img-fluid">
							</div> <!-- hết cột ảnh -->

							<div class="phai"> <!-- bắt đầu cột chứa thông tin sp -->

								<div class="ten-sp ml-3"> <!-- tên sản phẩm -->
									<a href="#"><?php echo $_SESSION['cart'][$key]['ten']; ?></a>
									<a class="btn btn-outline-danger btn-sm mt-2" role="button" href="xoasptronggio.php?maSP=<?php echo $key;?>"><i class="fas fa-trash-alt mr-2"></i>Xóa</a>
									<button type="submit" class="btn btn-outline-warning btn-sm mt-2" name="capnhatghbt" value="Cập nhật"><i class="fas fa-sync-alt mr-2"></i>Cập nhật</button>

								</div> <!-- hết tên sp -->

								<div class="gia"> <!-- bắt đầu giá -->
									<p class="gia-km text-center pt-2">
										<?php echo  number_format($_SESSION['cart'][$key]['gia'],0,'.', '.'); ?>đ
									</p>
									<p class="gia-goc">
										<del><?php echo  number_format($_SESSION['cart'][$key]['giagoc'], 0, '.', '.'); ?>đ</del>
										<span class="km">-<?php echo  $_SESSION['cart'][$key]['km']; ?>%</span>
									</p>
								</div> <!-- hết giá -->

								<div class="so-luong ml-5"> <!-- số lượng -->								
									<input name="qty[<?php echo $key;?>]" type="text" class="text-center" size="5" value="<?php echo $_SESSION['cart'][$key]['soluong'];?>">
																		
								</div> <!-- hết số lượng -->

							</div> <!-- kết thúc cột phải - thông tin sp -->
						</div> <!-- hết div sản phẩm trong giỏ -->
	
					
					<?php
						$tongTienSP += ($_SESSION['cart'][$key]['soluong'])*($_SESSION['cart'][$key]['gia']);
									
						}
					?>
									
				</div> <!-- hết cột trái chứa thông tin trong giỏ -->											
			</div> <!-- kết thúc cột đầu tiên -->

			<div class="col-sm-4 dat-hang"> <!-- bắt đầu cột 2 -->
				<div class="phi-gh">
					<label>Giao hàng: </label>
					<span class="ml-5">Miễn phí</span>
				</div>
				
				<div class="tong-tien">
					<label>Tổng tiền: </label>
					<strong><?php echo number_format($tongTienSP,0, '.', '.')  ?>đ</strong>
				</div>
				<div class="btn-sp">				
					
					<div class="div-btn-2">
						<a class="btn btn-success" href="trangchu.php">Tiếp tục mua sắm</a>
						<a class="btn btn-primary" href="thanhtoan.php">Thanh toán</a>
					</div>
					
				</div>
				
			</div> <!-- kết thúc cột 2 -->
		</form> <!-- kết thúc form -->
		<?php
			}
			else
			{					

				echo"
					<p class='text-danger ptb'>Không có sản phẩm nào trong giỏ hàng!</p>
					<a href='trangchu.php' class='atb'>Tiếp tục mua sắm</a>
					";
			}

		?>
		</div> <!-- kết thúc row -->
		
	</div> <!-- kết thúc nội dung -->
	<?php include("../modules/footer.php"); ?>

	<script type="text/javascript">
		// function hiện popup đăng ký đăng nhập
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
		
	</script>
	
</body>
</html>