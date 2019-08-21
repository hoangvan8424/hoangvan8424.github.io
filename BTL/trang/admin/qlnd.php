<div id="ql-nguoidung"> <!-- bắt đầu quản lý người dùng -->
	<div class="mt-3">
		
		<p>Tổng người dùng : 
			<?php 
				
				$sql="SELECT maND AS soluong FROM nguoidung";
				$query = mysql_query($sql);
				echo mysql_num_rows($query); 
			?>
			
		</p>
		
	</div>
	<table class="table table-hover table-inverse table-responsive-md text-center" style="font-size: 14px;">
		<thead class="thead-light">
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Mật khẩu</th>
				<th>Họ tên</th>
				<th>Ngày sinh</th>
				<th>Giới tính</th>
				<th>Quyền</th>									
				<th>Cập nhật</th>
				<th>Xóa</th>
				<th>Thêm</th>
			</tr>
		</thead>
		<tbody>
			<?php

				$sql="SELECT * FROM nguoidung";
				$query = mysql_query($sql);
				$num = mysql_num_rows($query);
				if($num>0){
					while ($row=mysql_fetch_array($query)) {
						
					
			?>
			<tr>
				<td><?php echo $row['maND']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['password']; ?></td>
				<td><?php echo $row['hoten']; ?></td>
				<td><?php echo $row['ngaysinh']; ?></td>
				<td><?php echo $row['gioitinh']; ?></td>								
				<td><?php echo $row['phanquyen']; ?></td>
				<td>
					<a href="admin.php?module=capnhatnguoidung&id=<?php echo $row['maND'] ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-sync-alt"></i></a></td>
				<td>																		
					<a class="btn btn-danger btn-sm" onclick="return confirm('Xóa người dùng <?php echo $row['maND'];?>?')" href="admin.php?module=xoand&id=<?php echo $row['maND'] ?>"><i class="fas fa-trash"></i></a>
															
				</td>
				<td>
					<a href="admin.php?module=themnguoidung" type="button" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></a>
				</td>

			</tr>
			<?php
					}
				}
			?>							
		</tbody>
	</table>

</div> <!-- kết thúc quản lý người dùng -->