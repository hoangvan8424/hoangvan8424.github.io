<?php
	session_start();
	require('../DB/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cập nhật trạng thái giỏ hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link rel="stylesheet" type="text/css" href="../style/giohang.css">
  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link href = "../css/jquery-ui.css" rel = "stylesheet">
	<script src="../js/jquery-ui.js"></script>
	
</head>
<body>
	<?php include("../modules/menu.php") ?>
	<div class="cntt-gh text-danger">

		<h5>
			Chưa thanh toán: 
			<?php
				$s="SELECT maHD FROM hoadon WHERE trangthai=0";
				$kq= mysql_query($s);
				$sl = mysql_num_rows($kq);
				if($sl>0) echo $sl;
				else echo 0;
			?>
		</h5>
		<h5>
			Đã hủy: 
			<?php
				$s="SELECT maHD FROM hoadon WHERE trangthai=2";
				$kq= mysql_query($s);
				$sl = mysql_num_rows($kq);
				if($sl>0) echo $sl;
				else echo 0;
			?>
		</h5>
		<h5>
			Đã thanh toán: 
			<?php
				$s="SELECT maHD FROM hoadon WHERE trangthai=1";
				$kq= mysql_query($s);
				$sl = mysql_num_rows($kq);
				if($sl>0) echo $sl;
				else echo 0;
			?>
		</h5>
	</div>
	<table class="table table-bordered table-hover table-striped table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th>Họ tên</th>
				<th>Email</th>
				<th>Số điện thoại</th>
				<th>Ngày đặt hàng</th>
				<th>Hình thức</th>
				<th>Địa chỉ</th>
				<th>Trạng thái</th>
				<th>Thanh toán</th>
				<th>Hủy đặt hàng</th>

			</tr>
		</thead>
		<tbody>
		<?php
			
			$sql="SELECT tenSP, cthd.gia, soluong, tongtien, hd.hoten, hd.email,sdt,ngaydathang,hinhthucnhanhang,diachinhanhang,hd.trangthai, hd.maHD
					FROM hoadon AS hd, sanpham AS sp, nguoidung AS nd, chitiethd as cthd
					WHERE hd.maHD=cthd.maHD AND sp.maSP=cthd.maSP AND nd.maND = hd.maND
					ORDER BY hd.trangthai ASC";
			$query=mysql_query($sql);
			$num=mysql_num_rows($query);
			
			if($num>0) {
				while ($row=mysql_fetch_row($query)) {
					
				
			
		?>
			<tr>
				<td><?php echo $row[11] ?></td>
				<td><?php echo $row[0] ?></td>
				<td><?php echo number_format($row[1],0,'.', '.')?>đ</td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo number_format($row[3],0,'.', '.')?>đ</td>
				<td><?php echo $row[4] ?></td>
				<td><?php echo $row[5] ?></td>
				<td><?php echo $row[6] ?></td>
				<td><?php echo $row[7] ?></td>
				<td><?php echo $row[8] ?></td>
				<td><?php echo $row[9] ?></td>
				<td>
					<?php
						if($row[10]==0) {
							echo "Chưa thanh toán";
						}
						else if($row[10]==1) {
							echo "Đã thanh toán";
						}
						else if($row[10]==2){
							echo "Đã hủy";
						}
						else {
							echo "Không xác định"; 
						}
					?>
					
										
				</td>
				
				<td><a href="cntrangthaitt.php?id=<?php echo $row[11];?>&trangthai=<?php echo $row[10];?>" class="btn btn-success btn-sm" onclick="return confirm('Thanh toán cho hóa đơn <?php echo $row[11]?>')"><i class="far fa-check-square"></i></a></td>
				<td><a href="cntrangthaihuy.php?id=<?php echo $row[11];?>&trangthai=<?php echo $row[10];?>" class="btn btn-danger btn-sm" onclick="return confirm('Hủy hóa đơn <?php echo $row[11]?>')"><i class="far fa-window-close"></i></a></td>
			</tr>

		
		<?php
				}
			}
		?>
		</tbody>
	</table>
	<?php include("../modules/footer.php")?>
</body>
</html>