<?php
	require("../DB/connect.php");
	if(isset($_GET['id']) and is_numeric($_GET['id']) and isset($_GET['trangthai'])) {
		$id = $_GET['id'];
		$tt = $_GET['trangthai'];

		if($tt==0) {
			$sql = "UPDATE hoadon SET trangthai = 2 WHERE maHD=".$id;
			$count = mysql_query($sql);
			if($count) {
				echo "<script>
					alert('Hủy hóa đơn $id thành công!');
					window.history.back();
				</script>";
			}
			else {
				echo "<script>
					alert('Hủy hóa đơn $id thất bại!');
					window.history.back();
				</script>";
			}
		}
		else {
			echo "<script>
					alert('Hủy hóa đơn $id thất bại!');
					window.history.back();
				</script>";
		}

	}

?>