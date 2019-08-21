<?php
	if(isset($_GET['maSP'])){
		$maSP = $_GET['maSP'];
		$sql="SELECT *FROM tsktmt WHERE maSP=".$maSP;
		$query= mysql_query($sql);
		$row=mysql_fetch_row($query);
	}
	if(isset($_POST['btncn'])) {
		$ktmh = $_POST['ktmh'];
		$dopg = $_POST['dpgmh'];
		$cnmh = $_POST['cnmh'];
		$cumh = $_POST['cumh'];

		$cpu = $_POST['tencpu'];
		$loaicpu = $_POST['loaicpu'];
		$tocdocpu = $_POST['tocdocpu'];
		$tdtoidacpu = $_POST['tocdotoidacpu'];

		$ckn = $_POST['congkn'];
		$blu = $_POST['bluetooth'];
		$odia = $_POST['odia'];
		$cam = $_POST['webcam'];

		$ram = $_POST['ram'];
		$loairam = $_POST['loairam'];
		$tocdoram = $_POST['tocdoram'];
		$ocung = $_POST['ocung'];

		$sql1 = "UPDATE tskt_manhinh SET kichthuoc='$ktmh', dophangiai='$dopg', congnghe='$cnmh', camung='$cumh'
				WHERE maSP = '$maSP' ";
		$kq1=mysql_query($sql1);

		$sql2 = "UPDATE tskt_ketnoi SET congkn='$ckn', bluetooth='$blu', odia='$odia', webcam='$cam'
				WHERE maSP='$maSP' ";
		$kq2=mysql_query($sql2);

		$sql3 = "UPDATE tskt_cpu SET tencpu='$cpu', loaicpu='$loaicpu', tocdocpu='$tocdocpu', tocdotoida='tocdotoidacpu'
				WHERE maSP ='$maSP' ";
		$kq3=mysql_query($sql3);

		$sql4 = "UPDATE tskt_ramoc SET ram='$ram', tocdoram='$tocdoram', loairam='$loairam', ocung='$ocung'
				WHERE maSP='$maSP' ";
		$kq4=mysql_query($sql4);

		if($kq1==1 and $kq2==1 and $kq3==1 and $kq4==1) {
			echo '<script>
					alert("Cập nhật dữ liệu thành công!");
					location.assign("admin.php?module=tschmt");
				</script>';
		}
		else {
			echo '<script>
					alert("Cập nhật dữ liệu thất bại!");
					location.assign("admin.php?module=tschmt");
				</script>';
		} 
	}
?>

<h5 class="h-cnsp text-center mt-2">Thêm thông số cấu hình máy tính</h5>
<form name="themts" method="POST" onsubmit="return checktt()" action="" >	
	<div class="row mt-3 mb-3">
		<div class="col-6" style="border-right: 1px solid #CCC;">
			<div id="manhinh">
				<label>Kích thước màn hình</label><input type="text" name="ktmh" class="ip mt-4" value="<?php echo $row[2] ?>"><br>
				<label>Độ phân giải</label><input type="text" name="dpgmh" class="ip mt-4" value="<?php echo $row[3] ?>"><br>
				<label>Công nghệ</label><input type="text" name="cnmh" class="ip mt-4" value="<?php echo $row[4] ?>"><br>
				<label>Cảm ứng</label><input type="text" name="cumh" class="ip mt-4" value="<?php echo $row[5] ?>">
			</div>
			<hr>
			<div id="cpu">
				<label>Tên CPU</label><input type="text" name="tencpu" class="ip mt-4" value="<?php echo $row[6] ?>"><br>
				<label>Loại CPU</label><input type="text" name="loaicpu" class="ip mt-4" value="<?php echo $row[7] ?>"><br>
				<label>Tốc độ</label><input type="text" name="tocdocpu" class="ip mt-4" value="<?php echo $row[8] ?>"><br>
				<label>Tốc độ tối đa</label><input type="text" name="tocdotoidacpu" class="ip mt-4" value="<?php echo $row[9] ?>">
			</div>
			
		</div>
		<div class="col-6">
			<div id="ketnoi">
				<label>Cổng kết nối</label><textarea type="text" name="congkn" class="ip mt-4"><?php echo $row[10] ?></textarea><br>
				<label>Bluetooth</label><input type="text" name="bluetooth" class="ip mt-4" value="<?php echo $row[11] ?>"><br>
				<label>Ổ đĩa</label><input type="text" name="odia" class="ip mt-4" value="<?php echo $row[12] ?>"><br>
				<label>Webcam</label><input type="text" name="webcam" class="ip mt-4" value="<?php echo $row[13] ?>">
			</div>
			<hr>
			<div id="ram">
				<label>RAM</label><input type="text" name="ram" class="ip mt-4" value="<?php echo $row[14] ?>"><br>
				<label>Loại RAM</label><input type="text" name="loairam" class="ip mt-4" value="<?php echo $row[16] ?>"><br>
				<label>Tốc độ RAM</label><input type="text" name="tocdoram" class="ip mt-4" value="<?php echo $row[15] ?>"><br>
				<label>Ổ cứng</label><input type="text" name="ocung" class="ip mt-4" value="<?php echo $row[17] ?>">				
			</div>
		</div>

		<div class="button-cnsp mb-3" style="width: 95%">
			<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btncn">Cập nhật</button>
			<a href="admin.php?module=tschmt" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
		</div>
	</div>
</form>
