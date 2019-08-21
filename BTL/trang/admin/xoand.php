<?php
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM nguoidung WHERE maND=".$id;
		$count = mysql_query($sql);
		if($count) {
        	echo "<script>
				alert('Xóa người dùng thành công');
				location.assign('admin.php?module=qlnd');
        	</script>";			
		}
		else {
	        	echo "<script>
					alert('Xóa người dùng không thành công');
					location.assign('admin.php?module=qlnd');
	        	</script>";
		}
	}
?>