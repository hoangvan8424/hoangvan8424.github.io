<?php
	$sosp1trang = 7;

	if(isset($_GET['trang'])) {
		$trang = $_GET['trang'];
		settype($trang, "int");
	}
	else {
		$trang = 1;
	}	
?>
<div id="ql-nhacc" class="mt-3"> <!-- quản lý ncc -->
	<div>
		<p>Tổng nhà cung cấp: 
			<?php
				$sql="SELECT maNCC FROM ncc";
				$query=mysql_query($sql);
				echo mysql_num_rows($query);
			?>
		</p>
	</div>
	<table class="table table-hover table-inverse table-responsive-md text-center" style="font-size: 14px;">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên nhà CC</th>
				<th>Danh mục</th>
				<th>Địa chỉ</th>
				<th>SĐT</th>									
				<th>Cập nhật</th>
				<th>Xóa</th>
				<th>Thêm</th>

			</tr>
		</thead>
		<tbody>
			<?php
				$from = ($trang - 1)*$sosp1trang;
				$sql="SELECT *FROM ncc LIMIT $from, $sosp1trang";
				$query=mysql_query($sql);
				if(mysql_num_rows($query)>0){
					while ($row=mysql_fetch_array($query)) {				
					
			?>
			<tr>
				<td id="mancc"><?php echo $row['maNCC']; ?></td>
				<td><?php echo $row['tenNCC']; ?></td>
				<td>
				<?php
					if($row['maDM']==1) {
						echo "Máy tính";
					}
					else if($row['maDM']==2) {
						echo "Máy ảnh";
					}
					else {
						echo "Trống";
					}
				?>
				</td>
				<td><?php echo $row['diachi']; ?></td>
				<td><?php echo $row['sdt']; ?></td>									
				<td><a href="admin.php?module=suancc&id=<?php echo $row['maNCC'] ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a></td>				
				<td><a href="admin.php?module=xoancc&id=<?php echo $row['maNCC'] ?>"type="button" class="btn btn-danger btn-sm" onclick="return confirm('Xóa?')" ><i class="fas fa-trash"></i></a></td>
				<td><a href="admin.php?module=themncc" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
	<div class="phan-trang text-center mb-4">
	<?php
		$x = mysql_query("SELECT maNCC FROM ncc");
		$tongsosp = mysql_num_rows($x);
		$sotrang = ceil($tongsosp/$sosp1trang);
		for ($i=1; $i <= $sotrang; $i++) { 
			echo "<a href='admin.php?module=qlncc&trang=$i' class='btn btn-dark btn-sm mr-5'>Trang  $i</a>";
			
		}
	?>
	
	</div>
</div> <!-- hết quản lý ncc -->
