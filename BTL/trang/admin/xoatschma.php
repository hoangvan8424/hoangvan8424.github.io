<?php
	if(isset($_GET['id']) and is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM tsktma WHERE ID=".$id;
		$kq=mysql_query($sql);

		

		if($kq) {
			echo '<script>
					alert("Xóa dữ liệu thành công!");
					location.assign("admin.php?module=tschma");
				</script>';
		}
		else {
			echo '<script>
					alert("Xóa dữ liệu thất bại!");
					location.assign("admin.php?module=tschma");
				</script>';
		} 
	}

?>