<?php
	if(isset($_GET['id'])) {
		$maNCC = $_GET['id'];
		$sqlncc = "SELECT *FROM ncc
				WHERE maNCC=".$maNCC;
		$queryncc = mysql_query($sqlncc);
		$row = mysql_fetch_row($queryncc);
		
	}
	if(isset($_POST['btnsua'])) {
		$ten = $_POST['tenncc'];
		$dm = $_POST['chondm'];
		$diachi = $_POST['diachi'];
		$sdt = $_POST['sdt'];

		$sql = "UPDATE ncc SET tenNCC='$ten', diachi='$diachi', sdt='$sdt', maDM='$dm'
				WHERE maNCC='$maNCC'";
		$kq = mysql_query($sql);
		if($kq) {
			echo "<script>
					alert('Cập nhật nhà cung cấp có ID=".$maNCC." thành công!');
					location.assign('admin.php?module=qlncc');
				   </script>";			
		}
		else {
			echo "<script>
					alert('Cập nhật nhà cung cấp có ID=".$maNCC." thất bại!');
					location.assign('admin.php?module=qlncc');
				   </script>";	
		}		
	}
?>
<h5 class="h-cnsp text-center mt-2">Thêm nhà cung cấp</h5>
<form class="ml-md-3 mr-md-3 them-sp" name="themncc" method="POST" action="">
	<label>Tên nhà cung cấp</label><input type="text" name="tenncc" class="ip" value="<?php echo $row[1] ?>"><br>
	<label>Danh mục</label>
	<select type="text" name="chondm" class="ip mt-4">
	<?php
		if($row[4]==1) {
			echo '  <option value="0">Chọn</option>
					<option value="1" selected>Máy tính</option>
					<option value="2">Máy ảnh</option>';
		}
		else if($row[4]==2) {
			echo '  <option value="0">Chọn</option>
					<option value="1">Máy tính</option>
					<option value="2" selected>Máy ảnh</option>';			
		}
		else {
			echo '  <option value="0">Chọn</option>
					<option value="1" selected>Máy tính</option>
					<option value="2">Máy ảnh</option>';			
		}
	?>
		
	</select><br>
	
	<label>Địa chỉ</label><input type="text" name="diachi" class="ip mt-4" value="<?php echo $row[2] ?>"><br>
	
	<label>SĐT</label><input type="number" name="sdt" min="0" max="9999999999" class="ip mt-4" value="<?php echo $row[3] ?>"><br>
	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm mt-5 mr-3" type="submit" name="btnsua">Thêm</button>
		<a href="admin.php?module=qlncc" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>