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
				$sql="SELECT maSP FROM tsktmt";
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
				<th>Kích thước màn hình</th>
				<th>Độ phân giải</th>
				<th>Công nghệ</th>
				<th>Cảm ứng</th>
				<th>Tên CPU</th>
				<th>Loại</th>
				<th>Tốc độ</th>				
				<th>Tốc độ tối đa</th>
				<th>Cổng kết nối</th>
				<th>Bluetooth</th>
				<th>Ổ đĩa</th>
				<th>Webcam</th>
				<th>RAM</th>
				<th>Tốc độ</th>
				<th>Loại RAM</th>
				<th>Ổ cứng</th>						
				<th>Cập nhật</th>
				<th>Xóa</th>
				<th>Thêm</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$from = ($trang - 1)*$sosp1trang;
				$sql="SELECT *FROM tsktmt LIMIT $from, $sosp1trang";
				$query= mysql_query($sql);
				$num= mysql_num_rows($query);
				if($num>0){
					while ($row=mysql_fetch_row($query)) {
										
			?>
			<tr>
				<td><?php echo $row[1]; ?></td>
				<td><?php echo $row[0]; ?></td>
				<td><?php echo $row[2]; ?> inch</td>
				<td><?php echo $row[3]; ?></td>
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
				<td><?php echo $row[14]; ?> GB</td>
				<td><?php echo $row[15]; ?> MHz</td>
				<td><?php echo $row[16]; ?></td>
				<td><?php echo $row[17]; ?></td>

				<td><a href="admin.php?module=suatschmt&maSP=<?php echo $row[1];?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a></td>

				<td><a type="button" onclick="return confirm('Xóa?')" href="admin.php?module=xoatschmt&maSP=<?php echo $row[1];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
				<td><a href="admin.php?module=themtschmt" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></td>
			</tr>		

			<?php
					}
				}
			?>
		</tbody>
	</table>

	<div class="phan-trang text-center mb-4">
	<?php
		$x = mysql_query("SELECT maSP FROM tsktmt");
		$tongsosp = mysql_num_rows($x);
		$sotrang = ceil($tongsosp/$sosp1trang);
		for ($i=1; $i <= $sotrang; $i++) { 
			echo "<a href='admin.php?module=tschmt&trang=$i' class='btn btn-dark btn-sm mr-5'>Trang  $i</a>";
			
		}
	?>
	
	</div>
</div> <!-- hết quản lý sản phẩm -->