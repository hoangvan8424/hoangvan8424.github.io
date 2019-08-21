<?php
	if(isset($_GET['maSP']) and is_numeric($_GET['maSP'])) {
		$maSP = $_GET['maSP'];
		$sql1 = "DELETE FROM tskt_manhinh WHERE maSP=".$maSP;
		$kq1=mysql_query($sql1);

		$sql2 = "DELETE FROM tskt_ketnoi WHERE maSP=".$maSP;
		$kq2=mysql_query($sql2);

		$sql3 = "DELETE FROM tskt_cpu WHERE maSP=".$maSP;
		$kq3=mysql_query($sql3);

		$sql4 = "DELETE FROM tskt_ramoc WHERE maSP=".$maSP;
		$kq4=mysql_query($sql4);

		if($kq1==1 and $kq2==1 and $kq3==1 and $kq4==1) {
			echo '<script>
					alert("Xóa dữ liệu thành công!");
					location.assign("admin.php?module=tschmt");
				</script>';
		}
		else {
			echo '<script>
					alert("Xóa dữ liệu thất bại!");
					location.assign("admin.php?module=tschmt");
				</script>';
		} 
	}

?>