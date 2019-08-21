<?php
	require("../DB/connect.php");
	
	
?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Lịch sử mua hàng</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="../css/bootstrap.min.css">
	  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	  	<link rel="stylesheet" type="text/css" href="../style/style.css">
	  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
		<script type="text/javascript" src="../js/popper.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<link href = "../css/jquery-ui.css" rel = "stylesheet">
		<script src="../js/jquery-ui.js"></script>
		<script src="script.js"></script>
	</head>
	<body>
		<?php
			include('../modules/header.php');

		?>
		<a href="trangchu.php" class="btn btn-info btn-sm ml-4 mt-2" style="border-radius: 0;width: 150px"><i class="fas fa-backward mr-2"></i>Trở về</a>
		<table class="table table-striped table-bordered table-hover table-responsive-sm mt-3">
		    <thead>
			    <tr>
			    	<th>#</th>
			        <th>Tên sản phẩm</th>
			        <th>Giá</th>
			        <th>Số lượng</th>			        
			        <th>Ngày</th>
			        <th>Hình thức</th>
			        <th>Địa chỉ</th>
			        <th>Thành tiền</th>
			    </tr>
			</thead>
		    <tbody>
	    	<?php
	    		$tongtien=0;
		    	if(isset($_GET['id'])) {
					$id=$_GET['id'];
					$sql = "SELECT tenSP, cthd.gia, soluong, ngaydathang, hinhthucnhanhang, diachinhanhang, tongtien
							FROM hoadon AS hd, sanpham AS sp, nguoidung AS nd, chitiethd as cthd
							WHERE hd.maHD=cthd.maHD AND sp.maSP=cthd.maSP AND nd.maND = hd.maND AND hd.maND=".$id;
					$query = mysql_query($sql);
					$num = mysql_num_rows($query);
					$stt=1;
					if($num>0) {
						while ($row=mysql_fetch_row($query)) {
	    	?>
		        <tr>
		        	<td><?php echo $stt++ ?></td>
			        <td><?php echo $row[0]?></td>
			        <td><?php echo number_format($row[1], 0, '.', '.') ?>đ</td>
			        <td><?php echo $row[2] ?></td>
			        <td><?php echo $row[3] ?></td>
			        <td><?php echo $row[4] ?></td>
			        <td><?php echo $row[5]?></td>
			        <td><?php
			        		$tongtien += $row[6];
			        		echo number_format($row[6], 0, '.', '.') 
			        	?>đ</td>

		        </tr>
		     <?php
						}
					}
				}

			?>
			<tr style="font-weight: bolder;">
				<td colspan="7" class="text-center text-uppercase">Tổng tiền</td>
				<td><?php echo number_format($tongtien,0, '.', '.')?>đ</td>
			</tr>
		    </tbody>
	  </table>

	  <?php include('../modules/footer.php') ?>
	</body>
	</html>

