<?php
	$sosp1trang = 5;

	if(isset($_GET['trang'])) {
		$trang = $_GET['trang'];
		settype($trang, "int");
	}
	else {
		$trang = 1;
	}
	$tongtien=0;
?>
<div id="ql-sanpham" class="mt-3"> <!-- bắt đầu quản lý sản phẩm -->
	<div>

		<p>Số lượng hóa đơn:
			<?php
				$sql="SELECT machitietHD FROM chitiethd";
				$query= mysql_query($sql);
				echo mysql_num_rows($query);
				
			?>
			
		</p>
	</div>
	<table class="table table-hover table-inverse table-responsive-md text-center" style="font-size: 14px;">
		<thead>
			<tr>
				<th>#</th>
				<th>Hóa đơn</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Giá</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th>Ngày</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$from = ($trang - 1)*$sosp1trang;
				$sql="	SELECT machitietHD, sp.maSP, tenSP, hinhanh, cthd.gia, soluong, tongtien, ngaylapcthd, maHD
						FROM sanpham AS sp, chitiethd AS cthd
						WHERE sp.maSP = cthd.maSP LIMIT $from, $sosp1trang";
				$query= mysql_query($sql);
				$num= mysql_num_rows($query);
				
				if($num>0){
					while ($row=mysql_fetch_row($query)) {
										
			?>
			<tr>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[8] ?></td>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[2] ?></td>
				<td><img class="anh-sp" src="../img/<?php echo $row[3]; ?>"></td>
				<td><?php echo number_format($row[4], 0, '.', '.');?>đ</td>
				<td><?php echo $row[5] ?></td>
				<td><?php echo number_format($row[6], 0, '.', '.');?>đ</td>
				<td><?php echo $row[7] ?></td>
			</tr>
				

			<?php
						$tongtien = $tongtien+$row[6];
					}
				}
			?>
			<tr style="font-weight: 600; font-size: 18px;">
				<td colspan="7">Tổng tiền</td>
				<td colspan="1"><?php echo number_format($tongtien, 0, '.', '.');?>đ</td>
			</tr>
		</tbody>
	</table>

	<div class="phan-trang text-center mb-4">
	<?php
		$x = mysql_query("SELECT machitietHD FROM chitiethd");
		$tongsosp = mysql_num_rows($x);
		$sotrang = ceil($tongsosp/$sosp1trang);
		for ($i=1; $i <= $sotrang; $i++) { 
			echo "<a href='admin.php?module=qlmt&trang=$i' class='btn btn-dark btn-sm mr-5'>Trang  $i</a>";
			
		}
	?>
	
	</div>
</div> <!-- hết quản lý sản phẩm -->