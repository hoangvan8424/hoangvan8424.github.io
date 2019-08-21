<?php
	if(isset($_GET['id']) and is_numeric($_GET['id'])) {
		$id = $_GET['id'];
		$sql="SELECT *FROM tsktma WHERE ID=".$id;
		$query= mysql_query($sql);
		$row=mysql_fetch_row($query);
	}
	if (isset($_POST['btncn'])) {
		$model = $_POST['model'];
		$mausac = $_POST['mausac'];
		$nhasx = $_POST['nhasx'];
		$xuatxu = $_POST['xuatxu'];

		$dopg = $_POST['dopg'];
		$boxuly = $_POST['boxuly'];
		$laynet = $_POST['laynet'];
		$khuonmat = $_POST['khuonmat'];

		$mh = $_POST['manhinh'];
		$kt = $_POST['kichthuoc'];
		$cbtrang = $_POST['cbtrang'];
		$iso = $_POST['iso'];

		$loaiok = $_POST['loaiok'];
		$tieucu = $_POST['tieucu'];

		$sql1 = "UPDATE tsktma SET model='$model', mausac='$mausac', nhasanxuat='$nhasx', xuatxu='$xuatxu', dophangiai='$dopg', boxuly='$boxuly', tudonglaynet='$laynet', nhandienkhuonmat='$khuonmat', loaimanhinh='$mh', kichthuoc='$kt', canbangtrang='$cbtrang', ISO='$iso', loaiongkinh='$loaiok', tieucu='$tieucu' 
			WHERE ID='$id' ";
		$kq = mysql_query($sql1);
		if($kq) {
			echo '<script>
					alert("Cập nhật dữ liệu thành công!");
					location.assign("admin.php?module=tschma");
				</script>';
		}
		else {
			echo '<script>
					alert("Cập nhật dữ liệu thất bại!");
					location.assign("admin.php?module=tschma");
				</script>';
		} 
	}
?>

<h5 class="h-cnsp text-center mt-2">Thêm thông số cấu hình máy tính</h5>
<form name="themts" method="POST" onsubmit="return checktt()" action="" >
	<div class="row mt-3 mb-3">
		<div class="col-6" style="border-right: 1px solid #CCC;">
			<div class="ma-tskt">
				<label>Model</label><input type="text" name="model" class="ip mt-4" value="<?php echo $row[2] ?>">		
				<label>Màu sắc</label><input type="text" name="mausac" class="ip mt-4" value="<?php echo $row[3] ?>">			
				<label>Nhà sản xuất</label><input type="text" name="nhasx" class="ip mt-4" value="<?php echo $row[4] ?>">
				<label>Xuất xứ</label><input type="text" name="xuatxu" class="ip mt-4" value="<?php echo $row[5] ?>">
				<label>Độ phân giải</label><input type="text" name="dopg" class="ip mt-4" value="<?php echo $row[6] ?>">				
				<label>Bộ xử lý</label><input type="text" name="boxuly" class="ip mt-4" value="<?php echo $row[7] ?>">				
				<label>Tự động lấy nét</label><input type="text" name="laynet" class="ip mt-4" value="<?php echo $row[8] ?>">				
				<label style="position: relative;top: 15px;">Nhận diện khuôn mặt</label><input type="text" name="khuonmat" class="ip mt-4" value="<?php echo $row[8] ?>">
				
			</div>
			
		</div>
		<div class="col-6">
			<div class="ma-tskt">
				<label>Loại màn hình</label><input type="text" name="manhinh" class="ip mt-4" value="<?php echo $row[9] ?>">
				<label>Kích thước</label><input type="text" name="kichthuoc" class="ip mt-4" value="<?php echo $row[10] ?>">
				<label style="position: relative;bottom: 32px;">Cân bằng trắng</label><textarea type="text" name="cbtrang" class="ip mt-4"><?php echo $row[11] ?></textarea>
				
				<label>ISO</label><input type="text" name="iso" class="ip mt-4" value="<?php echo $row[12] ?>">
				<label>Loại ống kinh</label><input type="text" name="loaiok" class="ip mt-4" value="<?php echo $row[13] ?>">
				<label>Tiêu cự</label><input type="text" name="tieucu" class="ip mt-4" value="<?php echo $row[14] ?>">				
			</div>
		</div>

		<div class="button-cnsp mb-3" style="width: 95%">
			<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btncn">Cập nhật</button>
			<a href="admin.php?module=tschma" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
		</div>
	</div>
</form>
