<?php
	$sosp1trang = 6;

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
				$sql="SELECT maSP FROM tsktmaa";
				$query= mysql_query($sql);
				echo mysql_num_rows($query);
				
			?>
			
		</p>
	</div>
	<table class="table table-hover table-inverse table-reposive-md text-center" style="font-size: 14px;">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Model</th>
				<th>Màu</th>
				<th>Nhà sản xuất</th>
				<th>Xuất xứ</th>
				<th>Độ phân giải</th>
				<th>Bộ xử lý</th>
				<th>Lấy nét tự động</th>				
				<th>Nhận diện khuôn mặt</th>
				<th>Màn hình</th>
				<th>Kích thước</th>
				<th>Cân bằng trắng</th>
				<th>ISO</th>
				<th>Loại ống kính</th>
				<th>Tiêu cự</th>	
				<th>Cập nhật</th>
				<th>Xóa</th>
				<th>Thêm</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$from = ($trang - 1)*$sosp1trang;
				$sql="SELECT *FROM tsktmaa LIMIT $from, $sosp1trang";
				$query= mysql_query($sql);
				$num= mysql_num_rows($query);
				if($num>0){
					while ($row=mysql_fetch_row($query)) {
										
			?>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[3]; ?> inch</td>
				<td><?php echo $row[4]; ?></td>
				<td><?php echo $row[5]; ?></td>
				<td><?php echo $row[6]; ?></td>
				<td><?php echo $row[7]; ?></td>
				<td><?php echo $row[8]; ?></td>
				<td><?php echo $row[9]; ?></td>
				<td><?php echo $row[10]; ?></td>
				<td><?php echo $row[11]; ?></td>
				<td><?php echo $row[12]; ?></td>
				<td><?php echo $row[13]; ?></td>
				<td><?php echo $row[14]; ?></td>
				<td><?php echo $row[15]; ?></td>
				<td><?php echo $row[16]; ?></td>
				

				<td><a href="admin.php?module=suatschma&id=<?php echo $row[1];?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a></td>

				<td><a type="button" onclick="return confirm('Xóa?')" href="admin.php?module=xoatschma&id=<?php echo $row[1];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
				<td><a href="admin.php?module=themtschma" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></td>
			</tr>		

			<?php
					}
				}
			?>
		</tbody>
	</table>

	<div class="phan-trang text-center mb-4">
	<?php
		$x = mysql_query("SELECT maSP FROM tsktmaa");
		$tongsosp = mysql_num_rows($x);
		$sotrang = ceil($tongsosp/$sosp1trang);
		for ($i=1; $i <= $sotrang; $i++) { 
			echo "<a href='admin.php?module=tschma&trang=$i' class='btn btn-dark btn-sm mr-5'>Trang  $i</a>";
			
		}
	?>
	
	</div>
</div> <!-- hết quản lý sản phẩm -->