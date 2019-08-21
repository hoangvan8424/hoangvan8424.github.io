<?php
	if(isset($_GET['id']) and is_numeric($_GET['id']) and isset($_GET['mact'])) {
		$id = $_GET['id'];
		$mact = $_GET['mact'];
		$sql1 = "DELETE FROM chitietmt WHERE machitietSP=".$mact;
		mysql_query($sql1);
	
		$sql="DELETE FROM sanpham WHERE maSP =".$id;
		$kq = mysql_query($sql);
		if($kq) {
			echo "<script>
						alert('Đã xóa!');
						location.assign('admin.php?module=qlmt');
					</script>";
		}
		else {
			echo "
					<script>
						alert('Thất bại!');
						location.assign('admin.php?module=qlmt');
					</script>";
		}
	}
?>

