<!-- 0-chưa thanh toán -->
<!-- 1-thanh toán -->
<!-- 2-hủy -->
<?php
	require("../DB/connect.php");
	if(isset($_GET['id']) and is_numeric($_GET['id']) and isset($_GET['trangthai'])) {
		$id = $_GET['id'];
		$tt = $_GET['trangthai'];

		if($tt==0){
			$sql = "UPDATE hoadon SET trangthai = 1 WHERE maHD=".$id;
			$count = mysql_query($sql);
			if($count) {
				echo "<script>
					alert('Thanh toán hóa đơn $id thành công!');
					window.history.back();
				</script>";
			}
			else {
				echo "<script>
					alert('Thanh toán hóa đơn $id thất bại!');
					window.history.back();
				</script>";
			}
		}
		else if($tt==1) {
			echo "<script>
					alert('Thất bại vì hóa đơn $id đã được thanh toán trước đó!');
					window.history.back();
				</script>";
		}
		else {
			echo "<script>
					alert('Thất bại vì hóa đơn $id đã được hủy bỏ!');
					window.history.back();
				</script>";
		}
		

	}
	else {
		echo "<script>
				
				window.history.back();
			</script>";
	}

?>