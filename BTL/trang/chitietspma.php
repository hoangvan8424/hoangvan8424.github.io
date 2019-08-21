<?php
	session_start();
	require("../DB/connect.php");
	
	$sql = "SELECT * FROM sanpham WHERE maSP = ".$_GET['id'];
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	if($num > 0) {
		while ($row = mysql_fetch_array($query)) {
							
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?php echo $row['tenSP']; ?></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link rel="stylesheet" type="text/css" href="../style/chitietsp.css">
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
	?>
	
	<div class="container-fluid">
		<div class="row mt-3"> <!-- row 1 -->

		
			<div class="col-sm-6"> <!-- bắt đầu cột 1 -->
				<div class="anh-sp"> <!-- bắt đầu khung chứa ảnh -->
					<div class="anh-nho"> <!-- bắt đầu khung chứa ảnh nhỏ -->
						<img src="../img/<?php echo $row['hinhanh'];?>" class="img-sm" align="" onclick="doi_anh(this)">
						<img src="../img/<?php echo $row['hinhanh_2'];?>" class="img-sm" onclick="doi_anh(this)">
						<img src="../img/<?php echo $row['hinhanh_3'];?>" class="img-sm" onclick="doi_anh(this)">
						<img src="../img/<?php echo $row['hinhanh_4'];?>" class="img-sm" onclick="doi_anh(this)">
					</div> <!-- kết thúc khung chứa ảnh nhỏ -->
					<div class="anh-lon"> <!-- bắt đầu khung chứa ảnh lớn -->
						<img src="../img/<?php echo $row['hinhanh'];?>" id="imgfull">
					</div> <!-- kết thúc khung chứa ảnh lớn -->
				</div> <!-- kết thúc khung chứa ảnh -->
			</div> <!-- hết cột 1 -->

			<div class="col-sm-6"> <!-- bắt đầu cột 2 -->
				<div class="noi-dung">
					<h1><?php echo $row['tenSP']; ?></h1>
				</div>
				<p class="gia">
					<span><?php echo number_format($row['gia'], 0, '.', '.');?>₫</span>
					<span><del><?php echo number_format($row['giagoc'], 0, '.', '.');?>₫</del></span>
				</p>
				<div class="thong-tin">
					<p>Máy ảnh <?php echo $row['tenSP'] ?> <?php echo $row['ghichu'];?></p>
				</div>
				<div class="button mt-4">				
					<button class="btn btn-warning" id="addcart<?php echo $row['maSP'];?>" type="submit"><i class="fas fa-shopping-cart mr-3" style="font-size: 22px;color: #FFF;"></i>Thêm vào giỏ hàng</button>
					<button class="btn btn-primary ml-md-3" id="muangay<?php echo $row['maSP'];?>" type="submit"><i class="far fa-credit-card mr-3" style="font-size: 22px;"></i>Mua ngay</button>
					
				</div>
			</div> <!-- kết thúc cột 2 -->

		<script type="text/javascript">
			$(document).ready(function() {
				$("#addcart<?php echo $row['maSP'];?>").click(function() {
					var idSP = <?php echo $_GET['id'];?>;
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
			$(document).ready(function() {
				$("#muangay<?php echo $row['maSP'];?>").click(function() {
					var idSP = <?php echo $_GET['id'];?>;
					$.ajax({
						type: "POST",
						url: "../modules/themvaogiohang.php",
						data:{id : idSP},
						cache: false,
						success: function(result) {
							window.location="thanhtoan.php";												
													
						}

					});
				});
			});
		</script>

		<?php 
				}
			}
		?>
		</div> <!-- hết row 1 -->

		<div class="row mt-4" style="background: #F9F9F9"> <!-- bắt đầu row 2 -->
			<div class="col-sm-12">
		        <ul class="nav nav-tabs menu-ct">
					<li class="nav-item ml-5" id="li1">
						<a class="nav-link" onclick="hienthi_dacdiem()">Đặc điểm nổi bật</a>
					</li>
					<li class="nav-item" id="li2">
						<a class="nav-link" onclick="hienthi_thongso()">Thông số kỹ thuật</a>
					</li>
					
				</ul>
				<!-- chia cột -->
				<div class="container mt-5">
					<div class="row" id="dac-diem-nb"> <!-- bắt đầu row -->

					<?php
						$sql = "SELECT *
								FROM dacdiemma AS ddma, sanpham AS sp
								WHERE ddma.maSP = sp.maSP AND sp.maSP = ".$_GET['id'];
						$query = mysql_query($sql);
						$num = mysql_num_rows($query);
						if($num > 0) {
							while ($row=mysql_fetch_row($query)) {
								
												
					?>
						<div class="col-sm-6"> <!-- bắt đầu cột đầu tiên -->
							<div class="dac-diem">
								<h3>Thiết kế</h3>
								<p style="float: left;"><?php echo $row[2];?>
								</p>
								<img src="../img/<?php echo $row[8];?>" alt="ảnh 1" class="img-fluid mb-5">
							</div>
							<div class="dac-diem mt-4">
								<h3>Khả năng chụp ảnh</h3>
								<p>
									<?php echo $row[3];?>
								</p>
								<img src="../img/<?php echo $row[9];?>" alt="ảnh 3" class="img-fluid">
							</div>
							
						</div> <!-- hết cột đầu tiên -->
						
						<div class="col-sm-6"> <!-- bắt đầu cột thứ 2 -->
							<div class="dac-diem">
								<h3>Bộ cảm biến</h3>
								<p>
									<?php echo $row[4];?>
								</p>
								<img src="../img/<?php echo $row[10];?>" alt="ảnh 2" class="img-fluid mb-5">
							</div>
							<div class="dac-diem">
								<h3>Ống kính</h3>
								<p>
									<?php echo $row[5];?>
								</p>
								<img src="../img/<?php echo $row[11];?>" alt="ảnh 4" class="img-fluid">
							</div>
						</div> <!-- hết cột thứ 2 -->
					<?php
								}
							}
					?>
					</div>	<!-- hết row đặt điểm -->

					<div class="row mt-3" id="thong-so-kt"> <!-- bắt đầu row thông số cấu hình -->

					<?php
						$sql = "SELECT *
								FROM sanpham as sp, tsktma as tsktma
								WHERE sp.maSP = tsktma.maSP AND sp.maSP =".$_GET['id'];
						$query = mysql_query($sql);
						$num = mysql_num_rows($query);
						if($num>0) {
							while ($row = mysql_fetch_row($query)) {
														
					?>
						<img src="../img/<?php echo $row[14] ?>" alt="Thông số kỹ thuật" class="m-auto" style="width: 800px; height: 600px;">
						<div class="col-sm-6 mt-4"> <!-- bắt đầu cột 1 -->
							<div class="ma-ts mb-2">
								<label>Model: </label><span><?php echo $row[17];?></span><br>
								<label>Màu sắc: </label><span><?php echo $row[18];?></span><br>
								<label>Nhà sản xuất: </label><span><?php echo $row[19];?></span><br>
								<label>Xuất xứ: </label><span><?php echo $row[20];?></span><br>
								<label>Độ phân giải: </label><span><?php echo $row[21];?></span><br>
								<label>Bộ xử lý: </label><span><?php echo $row[22] ?></span><br>
								<label>Tự động lấy nét: </label><span><?php echo $row[23] ?></span><br>
								<label>Nhận diện khuôn mặt: </label><span><?php echo $row[24] ?></span>
							</div>
						</div> <!-- hết cột 1 -->

						<div class="col-sm-6 mt-4"> <!-- bắt đầu cột 2 -->
							<div class="ma-ts mb-2">
								<label>Loại màn hình: </label><span><?php echo $row[25] ?></span><br>
								<label>Kích thước: </label><span><?php echo $row[26] ?></span><br>
								<label>Cân bằng trắng: </label><span><?php echo $row[27] ?>GHz</span><br>
								<label>ISO: </label><span><?php echo $row[28] ?>GHz</span>
								<label>Loại ống kính: </label><span><?php echo $row[29] ?>GB</span><br>
								<label>Tiêu cự: </label><span><?php echo $row[30] ?></span><br>
								
							</div>
							
						</div> <!-- hết cột 2 -->

					<?php
							}
						}
					?>		
					</div> <!-- hết row thông số cấu hình -->
				</div>
			</div>
			
		</div> <!-- hết row 2 -->
	</div>
	
<?php  
include('../modules/footer.php');
?>

<script type="text/javascript">

function doi_anh(anhnho) {
	var anhlon = document.getElementById("imgfull");
	anhlon.src=anhnho.src;
	var anhSM=document.getElementsByClassName("img-sm");

}

var dacDiem = document.getElementById('dac-diem-nb');
var thongSo = document.getElementById('thong-so-kt');
var check1 = document.getElementById('li1');
var check2 = document.getElementById('li2');
function hienthi_dacdiem() {		
	dacDiem.style.display='inline-flex';
	thongSo.style.display='none';
	check1.style.opacity='1';
	check2.style.opacity='0.3';
}
function hienthi_thongso() {		
	dacDiem.style.display='none';
	thongSo.style.display='inline-flex';
	check1.style.opacity='0.3';
	check2.style.opacity='1';
}


</script>


	
	

</body>
</html>



