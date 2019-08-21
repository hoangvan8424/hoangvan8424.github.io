
<?php
	if(isset($_GET['id'])) {
		$maSP = $_GET['id'];
		$sqlmt = "SELECT *FROM capnhatmt
				WHERE maSP=".$maSP;
		$querymt = mysql_query($sqlmt);
		$row = mysql_fetch_row($querymt);
		
	}
	if(isset($_POST['btncnsp'])) {
		$id = $_POST['idcnsp'];
		$tenSP = $_POST['tensp'];
		$ncc = $_POST['chonncc'];
		$loai = $_POST['chonloai'];
		$trangthai = $_POST['chontrangthai'];
		$giagoc = $_POST['giagoc'];
		$giakm = $_POST['giasaukm'];
		$ghichu = $_POST['ghichu'];
		$km = $_POST['km'];
		$hinhanh = $_POST['hacn'];
		$anh2 = $_POST['hacn2'];
		$anh3 = $_POST['hacn3'];
		$anh4 = $_POST['hacn4'];

		if($_FILES['hinhanh']['error']>0) {
			
		}
		else {
			
			move_uploaded_file($_FILES["hinhanh"]["tmp_name"],"../img/".$_FILES["hinhanh"]["name"]);
			$hinhanh = $_FILES["hinhanh"]["name"];
		}

		if($_FILES['hinhanh2']['error']>0){
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		} else {
			
			move_uploaded_file($_FILES["hinhanh2"]["tmp_name"],"../img/".$_FILES["hinhanh2"]["name"]);
			$anh2 = $_FILES["hinhanh2"]["name"];
			
		}

		if($_FILES['hinhanh3']['error']>0){
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		} else {			
			move_uploaded_file($_FILES["hinhanh3"]["tmp_name"],"../img/".$_FILES["hinhanh3"]["name"]);
			$anh3 = $_FILES["hinhanh3"]["name"];			
		}

		if($_FILES['hinhanh4']['error']>0){
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		} else {
			
			move_uploaded_file($_FILES["hinhanh4"]["tmp_name"],"../img/".$_FILES["hinhanh4"]["name"]);
			$anh4 = $_FILES["hinhanh4"]["name"];
			
		}		
		
		$sql = "UPDATE sanpham SET tenSP='".$tenSP."', hinhanh='".$hinhanh."', ghichu='".$ghichu."', gia='".$giakm."', km='".$km."', trangthai='".$trangthai."', maNCC='".$ncc."', giagoc='".$giagoc."', maloai='".$loai."', hinhanh_2='".$anh2."', hinhanh_3='".$anh3."', hinhanh_4='".$anh4."' WHERE maSP='".$maSP."' ";
		$kq=mysql_query($sql);

		if($kq) {
			
				$mact = $row[0];
				$mh = $_POST['manhinh'];
				$cpu = $_POST['cpu'];
				$ram = $_POST['ram'];			
				$sqlis = "UPDATE chitietmt SET manhinh='$mh', CPU='$cpu', RAM='$ram' WHERE machitietSP='$mact' AND maSP='$id'";
				mysql_query($sqlis);

			echo '	<script>
						alert("Cập nhật dữ liệu sản phẩm có maSP='.$maSP.' thành công!");
						location.assign("admin.php?module=qlmt");
					</script>';
			
		}
		else {
			echo "
					<script>alert('Cập nhật sản phẩm thất bại!');
					location.assign('admin.php?module=qlmt');
					</script>";
		}
	}
?>

<h5 class="h-cnsp text-center mt-2">Cập nhật sản phẩm</h5>								
<form class="ml-md-3 mr-md-3 them-sp" name="form-cnsp" method="POST" action="" enctype="multipart/form-data">
	<input type="hidden" id="idcnsp" name="idcnsp" value="<?php echo $row[1]?>">
	<input type="hidden" id="hacn" name="hacn" value="<?php echo $row[3];?>">
	<input type="hidden" name="hacn2" value="<?php echo $row[14];?>">
	<input type="hidden" name="hacn3" value="<?php echo $row[15];?>">
	<input type="hidden" name="hacn4" value="<?php echo $row[16];?>">
	<label class="">Tên sản phẩm</label><input type="text" name="tensp" class="ip" value="<?php echo $row[2] ?>"><br>

	<label>Hình ảnh 1</label><input type="file" name="hinhanh" class="ip mt-sm-4">
	<label>Hình ảnh 2</label><input type="file" name="hinhanh2" class="ip mt-sm-4"><br>
	<label>Hình ảnh 3</label><input type="file" name="hinhanh3" class="ip mt-sm-4"><br>
	<label>Hình ảnh 4</label><input type="file" name="hinhanh4" class="ip mt-sm-4"><br>

	<label>Nhà cung cấp</label>
	<select name="chonncc" class="mt-sm-4">
		<option value="0">Chọn</option>
	<?php
		$sql_check = "SELECT maNCC, tenNCC FROM ncc WHERE maDM=1";
		$query_check = mysql_query($sql_check);
		$numrow = mysql_num_rows($query_check);
		if($numrow>0) {
			while ($row_check=mysql_fetch_row($query_check)) {
				if($row[4]==$row_check[0]) {
					echo '<option value="'.$row_check[0].'" selected>'.$row_check[1].'</option>';
				}
				else {
					echo '<option value="'.$row_check[0].'">'.$row_check[1].'</option>';
				}
	
			}

		}
	?>				
	</select>
							
	<label>Loại sản phẩm</label>
	<select name="chonloai" class="mt-sm-4">
	<?php
		if($row[5]==1) {
			echo '
				<option value="chonloai">Chọn</option>
				<option value="1" selected>1 - Mới</option>
				<option value="2">2 - Nổi bật</option>
				<option value="3">3 - Thường</option>	
			';
		}
		else if($row[5]==2){
			echo '
				<option value="chonloai">Chọn</option>
				<option value="1">1 - Mới</option>
				<option value="2" selected>2 - Nổi bật</option>
				<option value="3">3 - Thường</option>	
			';
		}
		else if($row[5]==3) {
			echo '
				<option value="chonloai">Chọn</option>
				<option value="1">1 - Mới</option>
				<option value="2">2 - Nổi bật</option>
				<option value="3" selected>3 - Thường</option>	
			';
		}
		else {
			echo '
				<option value="chonloai">Chọn</option>
				<option value="1">1 - Mới</option>
				<option value="2">2 - Nổi bật</option>
				<option value="3">3 - Thường</option>	
			';			
		}
	?>				
	</select> <br>

	<label>Trạng thái</label>
	<select name="chontrangthai" class="mt-sm-4">
	<?php
		if($row[6]==1) {
			echo '
				<option value="chontrangthai">Chọn</option>
				<option value="1" selected>1 - Còn hàng</option>
				<option value="0">0 - Ngừng kinh doanh</option>
			';
		}
		else if($row[6]==0) {
			echo '
				<option value="chontrangthai">Chọn</option>
				<option value="1">1 - Còn hàng</option>
				<option value="0" selected>0 - Ngừng kinh doanh</option>
			';
		}
		else {
			echo '
				<option value="chontrangthai">Chọn</option>
				<option value="1">1 - Còn hàng</option>
				<option value="0">0 - Ngừng kinh doanh</option>
			';
		}
	?>
														
	</select> <br>

	<label>Giá gốc</label><input type="number" name="giagoc" min="0" class="ip mt-sm-4" value="<?php echo $row[7];?>"><br>
	<label>Giá sau KM</label><input type="number" name="giasaukm" min="0" class="ip mt-sm-4" value="<?php echo $row[8];?>"><br>
	<label>Khuyến mại(%)</label><input type="number" name="km" min="0" max="50" class="ip mt-sm-4" value="<?php echo $row[9];?>"><br>
	<label class="ghchu">Mô tả</label><textarea type="text" name="ghichu" class="ip mt-sm-4"><?php echo $row[10] ?></textarea><br>

	<div>
		<label class="mh">Màn hình</label><textarea type="text" name="manhinh" class="ip mt-sm-4"><?php echo $row[11] ?></textarea>
		<div id="n-mh" class="text-center"></div>
		<label class="cpu">CPU</label><textarea type="text" name="cpu" class="ip mt-sm-4"><?php echo $row[12] ?></textarea>
		<div id="n-cpu" class="text-center"></div>
		<label class="ram">RAM</label><textarea type="text" name="ram" class="ip mt-sm-4"><?php echo $row[13] ?></textarea>
		<div id="n-ram" class="text-center"></div>
	</div>

	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btncnsp">Cập nhật</button>
		<a href="admin.php?module=qlmt" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>


