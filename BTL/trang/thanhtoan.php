<?php
	session_start();
	// unset($_SESSION['cart']);
	$tongTienSP=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thanh toán</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link rel="stylesheet" type="text/css" href="../style/giohang.css">
  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		

		include("../modules/header.php");
		include("../modules/menu.php"); 
		include("../modules/form_dangnhap.php");
		include("../modules/form_dangky.php");
		include("../DB/connect.php");

	?>


	<div class="container-fluid"> <!-- bắt đầu nội dung -->
		<div class="row" id="row-gio-hang"> <!-- bắt đầu row -->
			<?php
				$kt = 1;
				if(isset($_SESSION['cart'])) 
				{
					foreach ($_SESSION['cart'] as $key => $value) 
					{
						if (isset($key))
						{
							$kt = 2;
						}
					}
				}

				if($kt==2)
				{
				// Trong giỏ hàng đã có sản phẩm
			?>
			<form method="POST"> <!-- bắt đầu form -->
				<div class="col-sm-8"> <!-- bắt đầu cột đầu tiên -->
	 				<div class="tong-sp mt-3">
	 					<p>Danh sách sản phẩm đã đặt</p>
	 				</div>
					
					<div class="thong-tin-gh mt-3"> <!-- cột trái chứa sản phẩm có trong giỏ -->
					

						<?php
							


							foreach ($_SESSION['cart'] as $key => $value) {
																			 			
					 			
						?>
						<div id="sp-trong-gio"> <!-- sản phẩm trong giỏ -->
							<div class="trai"> <!-- bắt đầu cột ảnh -->
								<img src="../img/<?php echo $_SESSION['cart'][$key]['anh']; ?>" class="img-fluid">
							</div> <!-- hết cột ảnh -->

							<div class="phai"> <!-- bắt đầu cột chứa thông tin sp -->

								<div class="ten-sp ml-3"> <!-- tên sản phẩm -->
									<a href="#"><?php echo $_SESSION['cart'][$key]['ten']; ?></a>																		
								</div> <!-- hết tên sp -->

								<div class="gia"> <!-- bắt đầu giá -->
									<p class="gia-km text-center pt-2">
										<?php echo  number_format($_SESSION['cart'][$key]['gia'],0,'.', '.'); ?>đ
									</p>
									<p class="gia-goc">
										<del><?php echo  number_format($_SESSION['cart'][$key]['giagoc'], 0, '.', '.'); ?>đ</del>
										<span class="km">-<?php echo  $_SESSION['cart'][$key]['km']; ?>%</span>
									</p>
								</div> <!-- hết giá -->

								<div class="so-luong ml-5"> <!-- số lượng -->								
									<input disabled name="qty[<?php echo $key;?>]" type="text" class="text-center" size="5" value="<?php echo $_SESSION['cart'][$key]['soluong'];?>">
																		
								</div> <!-- hết số lượng -->

							</div> <!-- kết thúc cột phải - thông tin sp -->
						</div> <!-- hết div sản phẩm trong giỏ -->
	
					
					<?php
						$tongTienSP += ($_SESSION['cart'][$key]['soluong'])*($_SESSION['cart'][$key]['gia']);												
						}
					?>
															
				</div> <!-- hết cột trái chứa thông tin trong giỏ -->				
							
			</div> <!-- kết thúc cột đầu tiên -->

			<div class="col-sm-4 dat-hang"> <!-- bắt đầu cột 2 -->
				<div class="phi-gh">
					<label>Giao hàng: </label>
					<span class="ml-5">Miễn phí</span>
				</div>
				
				<div class="tong-tien">
					<label>Tổng tiền: </label>
					<strong><?php echo number_format($tongTienSP,0, '.', '.')  ?>đ</strong>
				</div>
				
				
			</div> <!-- kết thúc cột 2 -->
		</form> <!-- kết thúc form -->
		<?php
			}
			else
			{					

				echo"
					<p class='text-danger ptb'>Không có sản phẩm nào trong giỏ hàng!</p>
					<a href='trangchu.php' class='atb'>Tiếp tục mua sắm</a>

					";
			}

		?>
		</div> <!-- kết thúc row -->

		<div class="row thanh-toan" id="row-thanh-toan"> <!-- bắt đầu ròng 2 -->
			<h4 class="text-center mt-4">Thông tin thanh toán</h4>
			<!-- <div class="thanh-tt">
				<ul>
					<li>					
						<i class="number">1</i>
						<p>Đăng nhập</p>
					</li>
					<li>
						
						<i class="number">2</i>
						<p>Thông tin nhận hàng</p>
					</li>
					<li>
						
						<i class="number">3</i>
						<p>Thanh toán và hoàn tất</p>
					</li>
					
				</ul>
			</div> -->
		
			<div id="buoc-1" class="mb-5"> <!-- bắt đầu bước 1-đăng ký/đăng nhập -->
				 <div id="dang-nhap-01"> <!-- đăng nhập -->
				 	<ul class="nav nav-tabs">
						<li class="nav-item li-chung li-dn">
							<button type="button" class="btn btn-link bt-dn" id="dn-1">Đăng nhập</button>
						</li>
						<li class="nav-item li-chung">
							<button type="button" class="btn btn-link bt-dn" id="dk-1" onclick="hienthi_dangky()">Đăng ký</button>
						</li>			
					</ul>
					<form action="login.php" method="post">	<!-- bắt đầu form -->
						<div class="input-group mb-3 mt-4">
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-user-tie"></i>
								</span>
							</div>
							<input class="form-control" type="text" name="email" id="email" placeholder="Nhập Email" required>
						</div>
						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text">
								<i class="fas fa-unlock-alt"></i>
								</span>
							</div>
							<input class="form-control" type="password" name="password" id="password" placeholder="Nhập Mật khẩu (Từ 6 đến 30 ký tự)" required>
						</div>
						<div class="row text-left" style="margin: 0">
							<button class="btn btn-link px-0" type="button">Quên mật khẩu?</button>
						</div>

						<div class="row mt-3">
							<div class="col-12">
								<button class="btn btn-primary px-4 btn-block" type="submit" name="sb" id="sb">Đăng nhập</button>	
							</div>													
						</div>
							
						<div class="row mt-4">
							<div class="col-12">
								<a href="#" class="btn btn-block btn-facebook" style="background: #32508E; color: #FFF;">
			                        <i class="fab fa-facebook text-left" ></i>
			                        <span>Đăng nhập bằng Facebook</span>
		                    	</a>
							</div>																				
						</div>

						<div class="row mt-4 mb-4">
							<div class="col-12" >
								<a href="#" class="btn btn-block btn-gg" style="background: #DD4B39; color: #FFF;">
			                        <i class="fab fa-google-plus-g"></i>
			                        <span>Đăng nhập bằng Google</span>
		                    	</a>
							</div>															
						</div>
					    					
					</form> <!-- hết form đăng nhập -->
				</div> <!-- hết đăng nhập -->

				<div id="dang-ky-01"> <!-- đăng ký -->

					<ul class="nav nav-tabs"> <!-- thanh tab -->
						<li class="nav-item li-chung">
							<button type="button" class="btn btn-link bt-dn" id="dn-2" onclick="hienthi_dangnhap()">Đăng nhập</button>
						</li>
						<li class="nav-item li-chung li-dn">
							<button type="button" class="btn btn-link bt-dn" id="dk-2">Đăng ký</button>
						</li>					
					</ul> <!-- hết thanh tab -->

					<form class="mt-4" name="dangky" action="register.php" method="post" onsubmit="return validateForm()"> <!-- form đăng ký -->
						<div class="input-group mb-3"> <!-- họ tên -->
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-user-tie"></i>
								</span>
							</div>
							<input class="form-control" type="text" name="hoten" id="hoten" placeholder="Họ tên" required title="Vui lòng nhập họ tên">
						</div> <!-- hết họ tên -->
					
						<div class="input-group mb-3"> <!-- email -->
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-envelope"></i>
								</span>
							</div>
							<input class="form-control" type="email" name="email" id="email" placeholder="Email">
						</div> <!-- hết email -->

						<div class="input-group mb-3"> <!-- mật khẩu -->
							<div class="input-group-prepend">
								<span class="input-group-text">
								<i class="fas fa-unlock-alt"></i>
								</span>
							</div>
							<input class="form-control" type="password" name="password" id="password" placeholder="Mật khẩu" required>
						</div> <!-- hết mật khẩu -->

						<div class="input-group mb-3"> <!-- nhập lại mật khẩu -->
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-unlock-alt"></i>
								</span>
							</div>
							<input class="form-control" type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu" required>
						</div> <!-- hết nhập lại mật khẩu -->

						<div class="input-group mb-3"> <!-- giới tính -->
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="fas fa-female" style="font-size: 15px;width: 1rem"></i>
								</span>
							</div>
							
							<select class="gioitinh form-control" name="gioitinh" id="gioitinh">
								<option value="gioitinhchon">Giới tính</option>
								<option value="nam">Nam</option>
								<option value="nu">Nữ</option>
								<option value="khac">Khác</option>								
							</select>						
						</div> <!-- hết giới tính -->

						<div class="input-group"> <!-- ngày/tháng/năm sinh -->
							<div class="input-group-prepend">
								<span class="input-group-text">
									<i class="far fa-calendar-alt"></i>
								</span>
							</div>
							
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
							</select>
						</div> <!-- hết ngày/tháng/năm sinh -->

						<div class="row mt-4"> <!-- điều khoản sử dụng -->
							<div class="col-12">
								<p style="font-size: 14px;">Khi nhấn Tạo tài khoản đồng nghĩa với việc bạn đồng ý với <a href="#">điều khoản sử dụng</a> của chúng tôi.</p>
							</div>
							
						</div>
						<div class="row mt-1 mb-4"> <!-- button tạo tài khoản -->
							<div class="col-12 text-center">
								<button type="submit" name="sb" class="btn btn-primary px-4 btn-block">Tạo tài khoản</button>
							</div> 
							
						</div> <!-- hết button tạo tài khoản -->
					</form>
				</div> <!-- đăng ký -->			
			</div> <!-- kết thúc bước 1 -->

			<div class="buoc-2" id="buoc-2"> <!-- bắt đầu bước 2 -->
				<h5>Hình thức nhận hàng</h5>

				<form method="POST" name="formtt" action="xulythanhtoan.php" onsubmit="return checkFormTT()">			
					<div class="hinh-thuc-nh"> <!-- bắt đầu hình thức nhận hàng -->
						
						<div class="dia-diem">	<!-- bắt đầu địa điểm nhận hàng -->					
							<span>
								<input type="radio" name="nhanhang" checked="checked" value="Nhận tại nhà" onclick="chon_dia_diem()"><label>Nhận hàng tại nhà</label>
							</span>
							<span>
								<input type="radio" name="nhanhang" value="Nhận tại cửa hàng" onclick="chon_dia_diem()"><label>Nhận tại cửa hàng</label>	
							</span>															
						</div> <!-- kết thúc địa điểm nhận hàng -->

						<div class="nhan-tai-nha" id="nhan-tai-nha"> <!-- nhận hàng tại nhà -->			<div class="chon-tp-nh pt-3">
								<select class="mb-3" name="chon-tp" onclick="chon_tp(this)">							
									<option value="Hà Nội">Hà Nội</option>
									<option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
								</select>
							</div>
							<div class="ha-noi" id="ha-noi">							
								<select class="phuong-hn" name="phuong-hn" id="phuong-hn" onclick="chon_phuong_hn(this)">							
									<option value="Quận Thanh Xuân">Quận Thanh Xuân</option>
									<option value="Quận Tây Hồ">Quận Tây Hồ</option>
								</select>
								<select class="xa-hn th mb-3" name="xa-hn">								
									<option value="Phường Hạ Đình">Phường Hạ Đình</option>
									<option value="Phường Khương Mai">Phường Khương Mai</option>
									<option value="Phường Khương Trung">Phường Khương Trung</option>
									<option value="Phường Khương Đình">Phường Khương Đình</option>
									<option value="Phường Kim Giang">Phường Kim Giang</option>
									<option value="Phường Nhân Chính">Phường Nhân Chính</option>
									<option value="Phường Phường Liệt">Phường Phường Liệt</option>
									<option value="Phường Thanh Xuân Bắc">Phường Thanh Xuân Bắc</option>
									<option value="Phường Thanh Xuân Nam">Phường Thanh Xuân Nam</option>
									<option value="Phường Thanh Xuân Trung">Phường Thanh Xuân Trung</option>
									<option value="Phường Thượng Đình">Phường Thượng Đình</option>
								</select>
								<select class="xa-hn tx mb-3" name="xa-hn-2">
									<option value="Phường Nhật Tân">Phường Nhật Tân</option>
									<option value="Phường Thụy Khê">Phường Thụy Khê</option>
									<option value="Phường Xuân La">Phường Xuân La</option>
									<option value="Phường Bưởi">Phường Bưởi</option>
									<option value="Phường Phú Thượng">Phường Phú Thượng</option>
									<option value="Phường Quảng An">Phường Quảng An</option>
									<option value="Phường Tứ Liên">Phường Tứ Liên</option>
									<option value="Phường Yên Phụ">Phường Yên Phụ</option>
								</select>
															
							</div>
							<div class="tp-hcm" style="display: none;" id="tp-hcm">
								
								<select class="phuong-hcm mb-3" name="phuong-hcm" onclick="chon_phuong_hcm(this)">								
									<option value="Phường Tân Bình">Phường Tân Bình</option>
									<option value="Phường Củ Chi">Phường Củ Chi</option>
								</select>
								<select class="xa-hcm cu-chi mb-3" name="xa-hcm">
									
									<option value="Thị Trấn Củ Chi">Thị Trấn Củ Chi </option>
									<option value="Xã An Nhơn Tây">Xã An Nhơn Tây </option>
									<option value="Xã An Phú">Xã An Phú </option>
									<option value="Xã Bình Mỹ">Xã Bình Mỹ</option>
									<option value="Xã Hòa Phú">Xã Hòa Phú </option>
									<option value="Xã Nhuận Đức">Xã Nhuận Đức</option>
									<option value="Xã Phạm Văn Cội">Xã Phạm Văn Cội</option>
									<option value="Xã Phú Hòa Đông">Xã Phú Hòa Đông</option>
									<option value="Xã Phú Mỹ Hưng">Xã Phú Mỹ Hưng</option>
									<option value="Xã Phước Hiệp">Xã Phước Hiệp</option>
									<option value="Xã Phước Thạnh">Xã Phước Thạnh</option>
									<option value="Xã Phước Vĩnh An">Xã Phước Vĩnh An</option>
									<option value="Xã Tân An Hội">Xã Tân An Hội</option>
									<option value="Xã Tân Phú Trung">Xã Tân Phú Trung</option>
									
								</select>
								<select class="xa-hcm tan-binh mb-3" name="xa-hcm-2">
									
									<option value="Phường 1">Phường 1</option>
									<option value="Phường 10">Phường 10</option>
									<option value="Phường 11">Phường 11 </option>
									<option value="Phường 12">Phường 12</option>
									<option value="Phường 13">Phường 13</option>
									<option value="Phường 14">Phường 14</option>
									<option value="Phường 15">Phường 15</option>
									<option value="Phường 18">Phường 18</option>
									<option value="Phường 2">Phường 2</option>
									<option value="Phường 20">Phường 20</option>
									<option value="Phường 3">Phường 3</option>
									<option value="Phường 4">Phường 4</option>
									
								</select>							
							</div>
							<input class="sn-hn mb-2" id="sonha" type="text" name="sonha" placeholder="Nhập số nhà, tên đường" >
							<div id="n-sn" class="mb-2">
								
							</div>
						</div> <!-- kết thúc nhận hàng tại nhà -->

						<div class="nhan-tai-cua-hang" style="display: none;" id="nhan-tai-cua-hang"> <!-- bắt đầu nhận hàng tại cửa hàng -->
							<input type="radio" name="cuahang" value="Số 141 Chiến Thắng, Thanh Trì, Tân Triều, Hà Nội" checked><label>Số 141 Chiến Thắng, Thanh Trì, Tân Triều, Hà Nội</label><br>
							<input type="radio" name="cuahang" value="228 Nguyễn Trãi, Thanh Xuân, Hà Nội"><label>228 Nguyễn Trãi, Thanh Xuân, Hà Nội</label>
							<p class="text-success text-center">Quý khách vui lòng nhận hàng tại cửa hàng từ 8:00 - 17:00!</p>
						</div> <!-- kết thúc nhận hàng tại cửa hàng -->

					</div> <!-- kết thúc hình thức nhận hàng -->

					<h5 class="mt-5">Thông tin nhận hàng</h5>
					<div class="thong-tin-nh"> <!-- bắt đầu thông tin nhận hàng -->				
						<input class="mb-2 mt-3" type="text" name="hoten-tt" placeholder="Họ tên*"><br>
						<div id="n-ht" class="mb-2">
							
						</div>
						<input class="mb-2" type="text" name="number-tt" placeholder="Số điện thoại*"><br>
						<div id="n-sdt" class="mb-2">
							
						</div>
						<input class="mt-2" type="email" name="email-tt" placeholder="Email*"><br>
						<div id="n-email" class="mt-2">
							
						</div>
					</div> <!-- kết thúc thông tin nhận hàng -->
					<p class="text-success text-center mt-3">Quý khách vui lòng thanh toán khi nhận được hàng!</p>
					
					<button class="btn btn-outline-warning btn-tiep-theo mt-4" type="submit" name="btn-tieptheo" style="float: right;">Tiếp theo<i class="fas fa-chevron-right ml-4" ></i></button>
				</form>
			</div> <!-- hết bước 2 -->
			
			

		</div> <!-- kết thúc dòng 2 -->
		
	</div> <!-- kết thúc nội dung -->
	<?php 
		include("../modules/footer.php"); 
		if(!isset($_SESSION['cart'])) {
			echo "
					<script type='text/javascript'>
						document.getElementById('row-thanh-toan').style.display='none';					
					</script>

			";
		}
		else {
			echo "
					<script type='text/javascript'>
						document.getElementById('row-thanh-toan').style.display='flex';					
					</script>

			";
		}
		if(isset($_SESSION['user'])) {
			echo 	"
						<script type='text/javascript'>
							document.getElementById('buoc-1').style.display='none';
						</script>
					";
			// echo "	<style>
			// 			.thanh-tt ul li:nth-child(1) i::after, .thanh-tt ul li:nth-child(1) i{
			// 				background: green;
			// 			}
			// 		</style>";
		}
		else {
			echo 	"
						<script type='text/javascript'>
							document.getElementById('buoc-1').style.display='block';
						</script>
					";
		}
	?>

	<script type="text/javascript">
		// function hiện popup đăng ký đăng nhập
		$(document).ready(function(){
			// $("#form-dangnhap").modal("show");
		  	$("#dk-1").click(function(){
			  	$("#form-dangky").modal("show");
			    $("#form-dangnhap").modal("hide");
		    
		  	});
		  	$("#dn-2").click(function(){
			    $("#form-dangnhap").modal("show");
			    $("#form-dangky").modal("hide");
	    
			});
		});

		// function check form
		function validateForm()
		{
			var frm = document.forms["dangky"];
			var password = frm.password.value;
			var repassword = frm.repassword.value;
			if(password!=repassword){
				alert("Mật khẩu nhập lại không khớp");
				return false;
			}
			
			var gioitinh = frm["gioitinh"];
			if(gioitinh.selectedIndex == 0){
				alert("Vui lòng chọn giới tính");
				return false;
			}
			var day = frm["day"];
			if(day.selectedIndex==0){
				alert("Vui lòng chọn ngày sinh");
				return false;
			}
			var month = frm["month"];
			if(month.selectedIndex==0){
				alert("Vui lòng chọn tháng sinh");
				return false;
			}
			var year = frm["year"];
			if(year.selectedIndex==0){
				alert("Vui lòng chọn năm sinh");
				return false;
			}

			return true;
		
		}

		function hienthi_dangky() {
			document.getElementById("dang-ky-01").style.display='block';
			document.getElementById("dang-nhap-01").style.display='none';
		}
		function hienthi_dangnhap() {
			document.getElementById("dang-ky-01").style.display='none';
			document.getElementById("dang-nhap-01").style.display='block';
		}
		function chon_dia_diem() {
			var chon = document.getElementsByName("nhanhang");
			var ketQua='';
			for (var i=0;i<chon.length; i++) {
				if(chon[i].checked==true) {
					ketQua+=chon[i].value;
				}
			}
			if(ketQua=='Nhận tại cửa hàng') {
				document.getElementById("nhan-tai-cua-hang").style.display='block';
				document.getElementById("nhan-tai-nha").style.display='none';
			}
			else {
				document.getElementById("nhan-tai-cua-hang").style.display='none';
				document.getElementById("nhan-tai-nha").style.display='block';
			}
		}
		function chon_tp(chon) {
			var luaChon = chon.children;
			if(luaChon[0].selected) {
				document.getElementById("ha-noi").style.display='block';
				document.getElementById("tp-hcm").style.display='none';
			}
			else {
				document.getElementById("ha-noi").style.display='none';
				document.getElementById("tp-hcm").style.display='block';
			}
		}
		function chon_phuong_hn(chon) {
			var luaChon = chon.children;
			var luaChon_2 = document.getElementsByClassName("xa-hn");
			if(luaChon[0].selected) {
				luaChon_2[0].style.display='inline-block';
				luaChon_2[1].style.display='none';
			}
			else {
				luaChon_2[0].style.display='none';
				luaChon_2[1].style.display='inline-block';
			}
		}
		function chon_phuong_hcm(chon) {
			var luaChon = chon.children;
			var luaChon_2 = document.getElementsByClassName("xa-hcm");
			if(luaChon[0].selected) {
				luaChon_2[0].style.display='none';
				luaChon_2[1].style.display='inline-block';
			}
			else {
				luaChon_2[0].style.display='inline-block';
				luaChon_2[1].style.display='none';
			}
		}
		function hien_thi() {
			document.getElementById("buoc-3").style.display='block';
			document.getElementById("buoc-2").style.display='none';
		}
		
		function checkFormTT() {

			var formtt = document.forms["formtt"];
			var chonddth = document.getElementsByName("nhanhang");
			if(chonddth[0].checked) {
				var sonha = formtt["sonha"].value;
				if(sonha == '') {
					document.getElementById("n-sn").innerHTML="<span style='color:red;'>Số nhà, tên đường không được bỏ trống!</span>";
					formtt["sonha"].focus();
					return false;
				}

			}

			
						
			var ht = formtt["hoten-tt"].value;
			if(ht=='') {
				document.getElementById("n-ht").innerHTML="<span style='color: red;'>Họ tên không được để trống!</span>";
				formtt["hoten-tt"].focus();
				return false;
			}
			var sdt = formtt["number-tt"].value;
			var ddsdt = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			if(sdt==''){
				document.getElementById("n-sdt").innerHTML="<span style='color:red;'>SĐT không được để trống!</span>";
				formtt["number-tt"].focus();
				return false;
			}		
			else {
				if (ddsdt.test(sdt) == false) {
					document.getElementById("n-sdt").innerHTML="<span style='color:red;'>SĐT không đúng định dạng!</span>";
					formtt["number-tt"].focus();
					return false;
				}
				else {
					document.getElementById("n-sdt").innerHTML="";
				}
			}
			var em = formtt["email-tt"].value;
			if(em=='') {
				document.getElementById("n-email").innerHTML="<span style='color:red;'>Email không được để trống!</span>";
				formtt["email-tt"].focus();
				return false;
			}

			return true;
		}
		
	</script>
	
	
</body>
</html>