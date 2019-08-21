<?php 
require("../DB/connect.php");

if(isset($_POST["action"]))
{
	
  $sql= "SELECT * from sanpham join chitietma on sanpham.maSP = chitietma.maSP AND trangthai='1'";
  
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
  {
    $sql .= "
     AND gia BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
    ";
  }
if(isset($_POST["dophangia"])){
   $dophangia_filter = implode("','", $_POST["dophangia"]);
  $sql .= "
   AND dophangia IN('".$dophangia_filter."') 
  ";
  }
  if(isset($_POST["bocambien"])){
   $bocambien_filter = implode("','", $_POST["bocambien"]);
  $sql .= "
   AND bocambien IN('".$bocambien_filter."') 
  ";
  }
   if(isset($_POST["manhinh"])){
   $manhinh_filter = implode("','", $_POST["manhinh"]);
  $sql .= "
   AND manhinh IN('". $manhinh_filter."') 
  ";
  }
  if(isset($_POST['tenNCC'])){
			$tenNCC_fill = implode("','",$_POST['tenNCC']); 
			$sql .= " "."join ncc on sanpham.maNCC = ncc.maNCC where tenNCC IN('".$tenNCC_fill."')";
		}
  
$query = mysql_query($sql);
$num = mysql_num_rows($query);
$output = '';
if($num>0){
                  while ($row = mysql_fetch_array($query)) {
                      $output .= '	<div class="card-deck-wrapper"> 
					<div class="card-deck mb-3">

						<a class="text-dark" href="chitietspma.php?id='.$row['maSP'].'">											
							<div class="card card-nd-mt mr-4">
								<img class="card-img-top mb-4" src="../img/'.$row['hinhanh'].'" alt="Máy ảnh 1">
								<div class="card-block cd-bl">
									<div class="ten-sp">
										<p><strong>'.$row['tenSP'].'</strong></p>
									</div>
									<div class="gia">
										<p class="card-text"><strong>Giá: </strong>'.number_format($row['gia'], 0, '.', '.').'₫</p>
										<p><del>'.number_format($row['giagoc'], 0, '.', '.').'₫</del></p>
									</div>
									<div class="thong-tin mb-5">
										<ul class="mt-2">
											<li>
												<label><strong>Độ phân giải: </strong></label>
												<span>'.$row['dophangia'].'</span>
											</li>
											<li>
												<label><strong>Bộ cảm biến: </strong></label>
												<span>'.$row['bocambien'].' </span>
											</li>
											<li>
												<label><strong>Màn hình: </strong></label>
												<span> '.$row['manhinh'].' </span>
											</li>										
										</ul>
									</div>
									<div class="btn-mua-ngay">
										<button class="btn btn-primary btn-block">Mua ngay</button>
									</div>
																	
								</div>
							</div>
						</a>	
			
					</div> </div> ';
              }
    }
    else{
      $output = '<h3>Không có dữ liệu phù hợp</h3>';
    }
    echo $output; 
}

 ?>