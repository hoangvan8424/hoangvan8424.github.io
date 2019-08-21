<?php
	if(isset($_GET['id']) and is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM ncc WHERE maNCC=".$id;
		$kq=mysql_query($sql);
		if($kq) {
			echo "<script>
					alert('Xóa nhà cung cấp có ID=".$id." thành công!');
					location.assign('admin.php?module=qlncc');
				   </script>";			
		}
		else {
			echo "<script>
					alert('Xóa nhà cung cấp có ID=".$id." thất bại!');
					location.assign('admin.php?module=qlncc');
				   </script>";	
		}
	}

?>