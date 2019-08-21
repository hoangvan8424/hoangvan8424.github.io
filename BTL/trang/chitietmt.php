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
	<link href = "../css/jquery-ui.css" rel = "stylesheet">
	<script src="../js/jquery-ui.js"></script>
	<script src="script.js"></script>     
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
					<p>Laptop <?php echo $row['tenSP'] ?> <?php echo $row['ghichu'];?></p>
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
								FROM dacdiemmt AS ddmt, sanpham AS sp
								WHERE ddmt.maSP = sp.maSP AND sp.maSP = ".$_GET['id'];
						$query = mysql_query($sql);
						$num = mysql_num_rows($query);
						if($num > 0) {
							while ($row=mysql_fetch_array($query)) {
								
												
					?>
						<div class="col-sm-6"> <!-- bắt đầu cột đầu tiên -->
							<div class="dac-diem">
								<h3>Thiết kế</h3>
								<p style="float: left;"><?php echo $row['tenSP']; echo $row['thietke'];?>
								</p>
								<img src="../img/<?php echo $row['anh_1'];?>" alt="ảnh 1" class="img-fluid mb-5">
							</div>
							<div class="dac-diem mt-4">
								<h3>Cấu hình</h3>
								<p>
									<?php echo $row['cauhinh'];?>
								</p>
								<img src="../img/<?php echo $row['anh_2'];?>" alt="ảnh 3" class="img-fluid">
							</div>
							
						</div> <!-- hết cột đầu tiên -->
						
						<div class="col-sm-6"> <!-- bắt đầu cột thứ 2 -->
							<div class="dac-diem">
								<h3>Màn hình</h3>
								<p>
									<?php echo $row['manhinh'];?>
								</p>
								<img src="../img/<?php echo $row['anh_3'];?>" alt="ảnh 2" class="img-fluid mb-5">
							</div>
							<div class="dac-diem">
								<h3>Bảo mật</h3>
								<p>
									<?php echo $row['baomat'];?>
								</p>
								<img src="../img/<?php echo $row['anh_4'];?>" alt="ảnh 4" class="img-fluid">
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
								FROM sanpham as sp, tskt_manhinh AS mh,
								tskt_ketnoi AS kn, tskt_cpu AS cpu, tskt_ramoc AS ram
								WHERE sp.maSP = mh.maSP AND kn.maSP = sp.maSP 
								AND cpu.maSP = sp.maSP AND ram.maSP = sp.maSP AND sp.maSP =".$_GET['id'];
						$query = mysql_query($sql);
						$num = mysql_num_rows($query);
						if($num>0) {
							while ($row = mysql_fetch_array($query)) {
														
					?>
						<img src="../img/<?php echo $row['anh_5'] ?>" alt="Thông số kỹ thuật" class="m-auto" style="width: 600px; height: 600px;">
						<div class="col-sm-6 mt-4"> <!-- bắt đầu cột 1 -->
							<div class="manhinh mb-2">
								<h5>Màn hình</h5>
								<label>Kích thước: </label><span><?php echo $row['kichthuoc'];?>inch</span><br>
								<label>Độ phân giải: </label><span><?php echo $row['dophangiai'];?></span><br>
								<label>Công nghệ màn hình: </label><span><?php echo $row['congnghe'];?></span><br>
								<label>Cảm ứng: </label><span><?php echo $row['camung'];?></span>
							</div>
							<div class="congketnoi">
								<h5>Cổng kết nối</h5>
								<label>Cổng giao tiếp: </label><span><?php echo $row['congkn'];?></span><br>
								<label>Bluetooth: </label><span><?php echo $row['bluetooth'] ?></span><br>
								<label>Ổ đĩa quang: </label><span><?php echo $row['odia'] ?></span><br>
								<label>Webcam: </label><span><?php echo $row['webcam'] ?></span>
							</div>
						</div> <!-- hết cột 1 -->

						<div class="col-sm-6 mt-4"> <!-- bắt đầu cột 2 -->
							<div class="cpu mb-2">
								<h5>Bộ xử lý</h5>
								<label>Công nghệ CPU: </label><span><?php echo $row['tencpu'] ?></span><br>
								<label>Loại CPU: </label><span><?php echo $row['loaicpu'] ?></span><br>
								<label>Tốc độ CPU: </label><span><?php echo $row['tocdo'] ?>GHz</span><br>
								<label>Tốc độ tối đa: </label><span><?php echo $row['tocdotoida'] ?>GHz</span>
							</div>
							<div class="ram">
								<h5>RAM/Ổ cứng</h5>
								<label>RAM: </label><span><?php echo $row['ram'] ?>GB</span><br>
								<label>Loại RAM: </label><span><?php echo $row['loairam'] ?></span><br>
								<label>Tốc độ: </label><span><?php echo $row['tocdo'] ?> MHz</span><br>
								<label>Ổ cứng: </label><span><?php echo $row['ocung'] ?></span>
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



