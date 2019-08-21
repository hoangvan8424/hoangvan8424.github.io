<?php
	$sosp1trang = 5;

	if(isset($_GET['trang'])) {
		$trang = $_GET['trang'];
		settype($trang, "int");
	}
	else {
		$trang = 1;
	}
	
?>
<div id="ql-sanpham" class="mt-3"> <!-- bắt đầu quản lý sản phẩm -->
	<div>

		<p>Tổng sản phẩm:
			<?php
				$sql="SELECT maSP FROM chitietma";
				$query= mysql_query($sql);
				echo mysql_num_rows($query);
				
			?>
			
		</p>
	</div>
	<table class="table table-hover table-inverse table-responsive-md text-center" style="font-size: 14px;">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Ảnh 1</th>
				<th>Ảnh 2</th>
				<th>Ảnh 3</th>
				<th>Ảnh 4</th>
				<th>Giá</th>
				<th>Khuyến mại</th>
				<th>Trạng thái</th>
				<th>Mã nhà cung cấp</th>
				<th>Mô tả</th>
				<th>Độ phân giải</th>
				<th>Bộ cảm biến</th>
				<th>Màn hình</th>								
				<th>Cập nhật</th>
				<th>Xóa</th>
				<th>Thêm</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$from = ($trang - 1)*$sosp1trang;
				$sql="SELECT *FROM sanpham AS sp, chitietma AS ctma
				 WHERE sp.maSP= ctma.maSP LIMIT $from, $sosp1trang";
				$query= mysql_query($sql);
				$num= mysql_num_rows($query);
				if($num>0){
					while ($row=mysql_fetch_array($query)) {
						if ($row['trangthai']==1) {
							$trangthai="Còn hàng";
						}
						else {
							$trangthai="Ngừng kinh doanh";
						}					
			?>
			<tr>
				<td><?php echo $row['maSP']; ?></td>
				<td><?php echo $row['tenSP']; ?></td>
				<td><img class="anh-sp" src="../img/<?php echo $row['hinhanh']; ?>"></td>
				<td><img class="anh-sp" src="../img/<?php echo $row['hinhanh_2']; ?>"></td>
				<td><img class="anh-sp" src="../img/<?php echo $row['hinhanh_3']; ?>"></td>
				<td><img class="anh-sp" src="../img/<?php echo $row['hinhanh_4']; ?>"></td>
				<td><?php echo number_format($row['gia'], 0, '.', '.');?>đ</td>
				<td><?php echo $row['km']; ?>%</td>
				<td><?php echo $trangthai ?></td>
				<td><?php echo $row['maNCC'] ?></td>
				<td><?php echo $row['ghichu'] ?></td>
				<td><?php echo $row['dophangia'] ?></td>
				<td><?php echo $row['bocambien'] ?></td>
				<td><?php echo $row['manhinh'] ?></td>
				<td><a href="admin.php?module=suama&id=<?php echo $row['maSP'];?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a></td>

				<td><a type="button" onclick="return confirm('Xóa?')" href="admin.php?module=xoama&id=<?php echo $row['maSP'];?>&mact=<?php echo $row['machitietMA'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
				<td><a href="admin.php?module=themma" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></td>
			</tr>		

			<?php
					}
				}
			?>
		</tbody>
	</table>

	<div class="phan-trang text-center mb-4">
	<?php
		$x = mysql_query("SELECT maSP FROM chitietma");
		$tongsosp = mysql_num_rows($x);
		$sotrang = ceil($tongsosp/$sosp1trang);
		for ($i=1; $i <= $sotrang; $i++) { 
			echo "<a href='admin.php?module=qlma&trang=$i' class='btn btn-dark btn-sm mr-5'>Trang  $i</a>";
			
		}
	?>
	
	</div>
</div> <!-- hết quản lý sản phẩm -->