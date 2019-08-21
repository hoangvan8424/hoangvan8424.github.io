<?php
	if(isset($_GET['id']) and is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM dacdiemmt WHERE maDDNBMT=".$id;
		$kq=mysql_query($sql);
		if($kq) {
			echo '	<script>
						alert("Xóa đặc điểm nổi bật của sản phẩm có ID = '.$id.' thành công!");
						location.assign("admin.php?module=dacdiemnbmt");
					</script>';	
		}
		else {
			echo '	<script>
						alert("Xóa đặc điểm nổi bật của sản phẩm có ID = '.$id.' thất bại!");
						location.assign("admin.php?module=dacdiemnbmt");
					</script>';	
		}
	}
?>