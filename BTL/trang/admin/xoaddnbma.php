<?php
	if(isset($_GET['id']) and is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM dacdiemma WHERE maDDNBMA=".$id;
		$kq=mysql_query($sql);
		if($kq) {
			echo '	<script>
						alert("Xóa đặc điểm nổi bật của sản phẩm có ID = '.$id.' thành công!");
						location.assign("admin.php?module=dacdiemnbma");
					</script>';	
		}
		else {
			echo '	<script>
						alert("Xóa đặc điểm nổi bật của sản phẩm có ID = '.$id.' thất bại!");
						location.assign("admin.php?module=dacdiemnbma");
					</script>';	
		}
	}
?>