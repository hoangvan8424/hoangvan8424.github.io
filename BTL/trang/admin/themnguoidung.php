<?php  
	if(isset($_POST['themnd'])) {
		$email = $_POST['email'];
		$mk = $_POST['re-matkhau'];
		$hoten = $_POST['hoten'];
		$ngay = $_POST['day'];
		$thang = $_POST['month'];
		$nam = $_POST['year'];
		$gt = $_POST['gt'];
		$quyen = $_POST['chonquyen'];
		$ngaysinh = $nam."-".$thang."-".$ngay;

	    $check_sql = "select email from `htnshop`.`nguoidung` where email='$email'";
	    $query=mysql_query($check_sql);
	    if(mysql_num_rows($query) == 0){	
			$sql= "INSERT INTO `htnshop`.`nguoidung`(`hoten`, `password`, `ngaysinh`, `gioitinh`, `email`, `phanquyen`)
	                      VALUES ('$hoten','$mk','$ngaysinh','$gt','$email', '$quyen') ";
	        $count =  mysql_query($sql);
	        if($count) {
	        	echo "<script>
					alert('Thêm người dùng thành công');
					location.assign('admin.php?module=qlnd');
	        	</script>";
	        }
	        else {
	        	echo "<script>
					alert('Thêm người dùng thất bại');
					location.assign('admin.php?module=qlnd');
	        	</script>";        	
	        }
	    }
	    else {
	            echo "<script>
			            alert('Email đã tồn tại!');
			            location.assign('admin.php?module=qlnd');
		           </script>";
	    }
	}
?>
<h5 class="h-themnd text-center mt-2">Thêm người dùng</h5>
<form class="them-nd" name="form-tnd" method="POST" onsubmit="return checkQLND()" action="">
	<label>Email</label><input type="email" name="email" class="ip">
	<div id="n-email" class="text-center">
		
	</div>
	<label>Mật khẩu</label><input type="password" name="matkhau" class="ip mt-sm-4">
	<div id="n-matkhau" class="text-center">
		
	</div>
	<label>Nhập lại mật khẩu</label><input type="password" name="re-matkhau" class="ip mt-sm-4">
	<div id="n-repass" class="text-center"></div>

	<label>Họ tên</label><input type="text" name="hoten" class="ip mt-sm-4">
	<div id="n-hoten" class="text-center">
		
	</div>
	<div class="ntns mt-sm-4">
		<label>Ngày sinh</label>
		<div class="input-group"> <!-- ngày tháng năm sinh -->				
			<select class="birth-day form-control" name="day" id="day"> <!-- ngày sinh -->
				<option value="0">Ngày</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select> <!-- hết ngày sinh -->
			<select class="birth-month form-control" name="month" id="month"> <!-- bắt đầu tháng sinh -->
				<option value="0">Tháng</option>
				<option value="1">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="9">09</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
			</select> <!-- hết tháng sinh -->
			<select class="birth-year form-control" name="year" id="year"> <!-- bắt đầu năm sinh -->
				<option value="0">Năm</option>
				<option value="2019">2019</option>
				<option value="2018">2018</option>
				<option value="2017">2017</option>
				<option value="2016">2016</option>
				<option value="2015">2015</option>
				<option value="2014">2014</option>
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010">2010</option>
				<option value="2009">2009</option>
				<option value="2008">2008</option>
				<option value="2007">2007</option>
				<option value="2006">2006</option>
				<option value="2005">2005</option>
				<option value="2004">2004</option>
				<option value="2003">2003</option>
				<option value="2002">2002</option>
				<option value="2001">2001</option>
				<option value="2000">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
				<option value="1946">1946</option>
				<option value="1945">1945</option>
				<option value="1944">1944</option>
				<option value="1943">1943</option>
				<option value="1942">1942</option>
				<option value="1941">1941</option>
				<option value="1940">1940</option>
				<option value="1939">1939</option>
				<option value="1938">1938</option>
				<option value="1937">1937</option>
				<option value="1936">1936</option>
				<option value="1935">1935</option>
				<option value="1934">1934</option>
				<option value="1933">1933</option>
				<option value="1932">1932</option>
				<option value="1931">1931</option>
				<option value="1930">1930</option>
				<option value="1929">1929</option>
				<option value="1928">1928</option>
				<option value="1927">1927</option>
				<option value="1926">1926</option>
				<option value="1925">1925</option>
				<option value="1924">1924</option>
				<option value="1923">1923</option>
				<option value="1922">1922</option>
				<option value="1921">1921</option>
				<option value="1920">1920</option>
				<option value="1919">1919</option>
				<option value="1918">1918</option>
				<option value="1917">1917</option>
				<option value="1916">1916</option>
				<option value="1915">1915</option>
				<option value="1914">1914</option>
				<option value="1913">1913</option>
				<option value="1912">1912</option>
				<option value="1911">1911</option>
				<option value="1910">1910</option>
				<option value="1909">1909</option>
				<option value="1908">1908</option>
				<option value="1907">1907</option>
				<option value="1906">1906</option>
				<option value="1905">1905</option>
				<option value="1904">1904</option>
				<option value="1903">1903</option>
				<option value="1902">1902</option>
				<option value="1901">1901</option>
				<option value="1900">1900</option>
				<option value="1899">1899</option>
			</select> <!-- hết năm sinh -->
		</div> <!-- hết ngày tháng năm sinh -->
	</div>
	<div id="n-ngaysinh" class="text-center"></div>
		
	
	<label>Giới tính</label><input type="radio" name="gt" class="gt mt-sm-3" value="Nam" checked=""><span>Nam</span> <input type="radio" name="gt" class="gt ml-5" value="Nữ"><span>Nữ</span> <br>
	
	<label>Quyền</label>
	<select name="chonquyen" class="mt-sm-4">
		<option value="chon">Chọn</option>
		<option value="1">1 - Admin</option>
		<option value="2">2 - Nhân viên</option>
		<option value="3">3 - Khách hàng</option>								
	</select>
	<div id="n-quyen" class="text-center">
		
	</div>
	<div class="btn-tnd mb-3">
		<button class="btn btn-success btn-sm mt-sm-5 mr-3" type="submit" name="themnd">Thêm</button>
		<a href="admin.php?module=qlnd" class="btn btn-danger btn-sm mt-sm-5">Hủy</a>
	</div>
	
</form>

<script type="text/javascript">
	function checkQLND() {
		var form = document.forms["form-tnd"];
		var email = form["email"].value;
		if(email=='') {
			document.getElementById("n-email").innerHTML = "<span style='color: red;'>Email không được để trống!</span>";
			form["email"].focus();
			return false;
		}
		else {
			document.getElementById("n-email").innerHTML = "";
		}
		var matkhau = form['matkhau'].value;
		if(matkhau=='') {
			document.getElementById('n-matkhau').innerHTML="<span style='color: red;'>Mật khẩu không được để trống!</span>";
			form['matkhau'].focus();
			return false;
		}
		else {
			document.getElementById('n-matkhau').innerHTML='';
		}

		var nlmk = form['re-matkhau'].value;
		if(nlmk=='') {
			document.getElementById('n-repass').innerHTML='<span style="color: red;">Nhập lại mật khẩu không được để trống!</span>';
			form['re-matkhau'].focus();
			return false;
		}
		else {
			document.getElementById('n-repass').innerHTML='';
		}

		if(matkhau!=nlmk) {
			document.getElementById('n-repass').innerHTML='<span style="color: red;">Mật khẩu không trùng khớp!</span>';
			form['re-matkhau'].focus();
			return false;
		}
		else {
			document.getElementById('n-repass').innerHTML='';
		}
		var hoten = form['hoten'].value;
		if(hoten =='') {
			document.getElementById('n-hoten').innerHTML="<span style='color: red;'>Họ tên không được để trống!</span>";
			form['hoten'].focus();
			return false;
		}
		else {
			document.getElementById('n-hoten').innerHTML='';
		}

		var ngay = form['day'].selectedIndex;
		
		var nam = form['year'].selectedIndex;	
		if(ngay==0) {
			document.getElementById('n-ngaysinh').innerHTML="<span style='color:red'>Ngày/tháng/năm sinh không được để trống!</span>";
			form['day'].focus();
			return false;
		}
		else {
			document.getElementById('n-ngaysinh').innerHTML='';
		}

		var thang = form['month'].selectedIndex;
		if(thang==0) {
			document.getElementById('n-ngaysinh').innerHTML="<span style='color:red'>Ngày/tháng/năm sinh không được để trống!</span>";	
			return false;
		}
		else {
			document.getElementById('n-ngaysinh').innerHTML='';
		}

		if(nam==0) {
			document.getElementById('n-ngaysinh').innerHTML="<span style='color:red'>Ngày/tháng/năm sinh không được để trống!</span>";
			
			return false;
		}
		else {
			document.getElementById('n-ngaysinh').innerHTML='';
		}
		var quyen = form['chonquyen'].selectedIndex;
		if(quyen==0) {
			document.getElementById('n-quyen').innerHTML="<span style='color: red;'>Vui lòng chọn quyền!</span>";
			form['chonquyen'].focus();
			return false;
		}
		else {
			document.getElementById('n-quyen').innerHTML='';
		}
		return true;

	}
</script>