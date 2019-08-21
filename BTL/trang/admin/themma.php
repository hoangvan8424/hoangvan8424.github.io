<!-- Thêm sản phẩm -->
<?php
	
	if(isset($_POST['btnthemsp'])) {
		$tensp = $_POST['tensp'];
		$dm = 2;
		$ncc = $_POST['chonncc'];
		$loai = $_POST['chonloai'];
		$trangthai = $_POST['chontrangthai'];
		$giagoc = $_POST['giagoc'];
		$giaskm = $_POST['giasaukm'];
		$km = $_POST['km'];
		$ghichu = $_POST['ghichu'];
		$anh1 ='';
		$anh2 ='';
		$anh3 ='';
		$anh4 ='';

		$dpg = $_POST['dpg'];
		$bcb = $_POST['bcb'];
		$mhma = $_POST['mhma'];
		
		
		if($_FILES['hinhanh']['error']>0){
			echo "<script>alert('Lỗi upload hình ảnh')!</script>";
		} else {
			
			move_uploaded_file($_FILES["hinhanh"]["tmp_name"],"../img/".$_FILES["hinhanh"]["name"]);
			$anh1 = $_FILES["hinhanh"]["name"];
			
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

		$sql = "INSERT INTO sanpham(tenSP, hinhanh, ghichu, gia, km, trangthai, maDM, maNCC, giagoc, maloai, hinhanh_2, hinhanh_3, hinhanh_4)";
		$sql.="VALUES('".$tensp."', '".$anh1."', '".$ghichu."', '".$giaskm."', '".$km."', '".$trangthai."', '".$dm."', '".$ncc."', '".$giagoc."', '".$loai."', '".$anh2."', '".$anh3."', '".$anh4."')";
		$kq = mysql_query($sql);
		$last_id = mysql_insert_id($connect);
		
		if($kq) {
			
			$sqlctma="INSERT INTO chitietma(maSP, dophangia, bocambien, manhinh) 
			VALUES ('$last_id', '$dpg', '$bcb', '$mhma')";
			mysql_query($sqlctma);
			
			echo "<script>
					alert('Thêm sản phẩm thành công!');
					location.assign('admin.php?module=qlma');
				   </script>";

		}
		else {
			echo "
				<script>
					alert('Thêm sản phẩm thất bại!');
					location.assign('admin.php?module=qlma');
				</script>";
		}

	}
?>
<h5 class="h-cnsp text-center mt-2">Thêm sản phẩm</h5>
<form class="ml-md-3 mr-md-3 them-sp" name="themsp" onsubmit="return checkFormThemSP()" method="POST" action="" enctype="multipart/form-data">
	<label class="mt-2">Tên sản phẩm</label><input type="text" name="tensp" class="ip">
	<div id="n-tensp" class="text-center">
		
	</div>
	<label>Hình ảnh 1</label><input type="file" name="hinhanh" class="ip mt-sm-4"><br>
	<label>Hình ảnh 2</label><input type="file" name="hinhanh2" class="ip mt-sm-4"><br>
	<label>Hình ảnh 3</label><input type="file" name="hinhanh3" class="ip mt-sm-4"><br>
	<label>Hình ảnh 4</label><input type="file" name="hinhanh4" class="ip mt-sm-4"><br>
	
	<label>Nhà cung cấp</label>
	<select name="chonncc" class="mt-sm-4">
		<option value="0">Chọn</option>
	<?php
		$sql_check = "SELECT maNCC, tenNCC FROM ncc WHERE maDM=2";
		$query_check = mysql_query($sql_check);
		$numrow = mysql_num_rows($query_check);
		if($numrow>0) {
			while ($row=mysql_fetch_row($query_check)) {
						
	?>
		<option value="<?php echo $row[0] ?>"><?php echo $row[1]?></option>
	<?php
			}
		}
	?>				
	</select>
	<div id="n-ncc" class="text-center"></div>

	<label>Loại sản phẩm</label>
	<select name="chonloai" class="mt-sm-4">
		<option value="chonloai">Chọn</option>
		<option value="1">1 - Mới</option>
		<option value="2">2 - Nổi bật</option>
		<option value="3">3 - Thường</option>								
	</select>
	<div id="n-loai" class="text-center"></div>

	<label>Trạng thái</label>
	<select name="chontrangthai" class="mt-sm-4">
		<option value="chontrangthai">Chọn</option>
		<option value="1">1 - Còn hàng</option>
		<option value="2">0 - Hết hàng</option>														
	</select>
	<div id="n-trangthai" class="text-center"></div>

	<label>Giá gốc</label><input type="number" name="giagoc" min="0" class="ip mt-sm-4">
	<div id="n-giagoc" class="text-center"></div>

	<label>Giá sau KM</label><input type="number" name="giasaukm" min="0" class="ip mt-sm-4">
	<div id="n-giakm" class="text-center"></div>

	<label>Khuyến mại(%)</label><input type="number" name="km" min="0" max="50" class="ip mt-sm-4">
	<div id="n-km" class="text-center"></div>

	<label class="ghi-chu">Mô tả</label><textarea type="text" name="ghichu" class="ip mt-sm-4"></textarea>
	<div id="n-ghichu" class="text-center"></div>
	
	<div>
		<label class="dpg">Độ phân giải</label><textarea type="text" name="dpg" class="ip mt-sm-4"></textarea>
		<div id="n-dpg" class="text-center"></div>
		<label class="bcb">Bộ cảm biến</label><textarea type="text" name="bcb" class="ip mt-sm-4"></textarea>
		<div id="n-bcb" class="text-center"></div>
		<label class="mhma">Màn hinh</label><textarea type="text" name="mhma" class="ip mt-sm-4"></textarea>
		<div id="n-mhma" class="text-center"></div>
	</div>
	

	<div class="button-cnsp mb-3">
		<button class="btn btn-success btn-sm btn-block mt-sm-5 mr-3" type="submit" name="btnthemsp">Thêm</button>
		<a href="admin.php?module=qlma" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>
			
<script type="text/javascript">
	function checkFormThemSP() {
		var form = document.forms['themsp'];
		var tensp = form['tensp'].value;
		if(tensp=='') {
			document.getElementById('n-tensp').innerHTML='<span class="text-danger">Tên sản phẩm không được bỏ trống!</span>';
			form['tensp'].focus();
			return false;
		}
		else {
			document.getElementById('n-tensp').innerHTML='';
		}
		 var hinhanh=form['hinhanh'].value;
		 if(hinhanh=='') {
		 	form['hinhanh'].focus();
			return false;
		}
		 else {
		 	
		}
		var hinhanh2=form['hinhanh2'].value;
		if(hinhanh2=='') {
		 	form['hinhanh2'].focus();
			return false;
		}
		 else {
		 	
		}
		var hinhanh3=form['hinhanh3'].value;
		if(hinhanh3=='') {
		 	form['hinhanh3'].focus();
			return false;
		}
		 else {
		 	
		}
		var hinhanh4=form['hinhanh4'].value;
		if(hinhanh4=='') {
		 	form['hinhanh4'].focus();
			return false;
		}
		 else {
		 	
		}				
		var ncc = form['chonncc'].selectedIndex;
		if(ncc==0) {
			document.getElementById('n-ncc').innerHTML='<span class="text-danger">Bạn chưa chọn Nhà cung cấp!</span>';
			form['chonncc'].focus();
			return false;
		}
		else {
			document.getElementById('n-ncc').innerHTML='';
		}

		var loai = form['chonloai'].selectedIndex;
		if(loai==0) {
			document.getElementById('n-loai').innerHTML='<span class="text-danger">Bạn chưa chọn Loại sản phẩm!</span>';
			form['chonloai'].focus();
			return false;
		}
		else {
			document.getElementById('n-loai').innerHTML='';
		}

		var trangthai=form['chontrangthai'].selectedIndex;
		if(trangthai==0) {
			document.getElementById('n-trangthai').innerHTML='<span class="text-danger">Bạn chưa chọn Trạng thái sản phẩm!</span>';
			form['chontrangthai'].focus();
			return false;
		}
		else {
			document.getElementById('n-trangthai').innerHTML='';
		}

		var giagoc = form['giagoc'].value;
		if(giagoc=='') {
			document.getElementById('n-giagoc').innerHTML='<span class="text-danger">Giá gốc không được để trống!</span>';
			form['giagoc'].focus();
			return false;
		}
		else {
			document.getElementById('n-giagoc').innerHTML='';
		}

		var giaskm = form['giasaukm'].value;
		if(giaskm=='') {
			document.getElementById('n-giakm').innerHTML='<span class="text-danger">Giá sau KM không được để trống!</span>';
			form['giasaukm'].focus();
			return false;
		}
		else {
			document.getElementById('n-giakm').innerHTML='';
		}

		var km=form['km'].value;
		if(km=='') {
			document.getElementById('n-km').innerHTML='<span class="text-danger">KM không được để trống!</span>';
			form['km'].focus();
			return false;
		}
		else {
			document.getElementById('n-km').innerHTML='';
		}

		var ghichu = form['ghichu'].value;
		if(ghichu=='') {
			document.getElementById('n-ghichu').innerHTML='<span class="text-danger">Ghi chú không được để trống!</span>';
			form['ghichu'].focus();
			return false;
		}
		else {
			document.getElementById('n-ghichu').innerHTML='';
		}

		var dpg = form['dpg'].value;
		if(dpg=='') {
			document.getElementById('n-dpg').innerHTML='<span class="text-danger">Độ phân giải không được để trống!</span>';
			form['dpg'].focus();
			return false;
		}
		else {
			document.getElementById('n-dpg').innerHTML='';
		}
		var bcb = form['bcb'].value;
		if(bcb=='') {
			document.getElementById('n-bcb').innerHTML='<span class="text-danger">Bộ cảm biến không được để trống!</span>';
			form['bcb'].focus();
			return false;
		}
		else {
			document.getElementById('n-bcb').innerHTML='';
		}
		var mhma = form['mhma'].value;
		if(mhma=='') {
			document.getElementById('n-mhma').innerHTML='<span class="text-danger">Màn hình không được để trống!</span>';
			form['mhma'].focus();
			return false;
		}
		else {
			document.getElementById('n-mhma').innerHTML='';
		}

		return true;
	}
</script>