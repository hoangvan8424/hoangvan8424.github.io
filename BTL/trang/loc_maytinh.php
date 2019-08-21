<?php 
require("../DB/connect.php");


if(isset($_POST["action"]))
{
		
		  $sql = "SELECT * from sanpham join chitietmt on sanpham.maSP = chitietmt.maSP AND trangthai='1' "; 
		if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
		 {
		    $sql .= "
		     AND gia BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
		    ";
		 }

		if(isset($_POST["manhinh"])){
		   	$manhinh_filter = implode("','", $_POST["manhinh"]);
		  	$sql .= "AND manhinh IN('".$manhinh_filter."')";
		 }
		if(isset($_POST["ram"])){
		   	$ram_filter = implode("','", $_POST["ram"]);
		  	$sql .= "AND RAM IN('".$ram_filter."')";
		}
	   	if(isset($_POST["cpu"])){
		   	$cpu_filter = implode("','", $_POST["cpu"]);
		  	$sql .= "AND CPU IN('".$cpu_filter."')   ";
	  	}
		if(isset($_POST['tenNCC'])){
			$tenNCC_filter = implode("','",$_POST['tenNCC']); 
			$sql .= " "."join ncc on sanpham.maNCC = ncc.maNCC where tenNCC IN('".$tenNCC_filter."')";
		}
		$query = mysql_query($sql);
		$num = mysql_num_rows($query);
		$output = '';
		if($num>0){
          	while ($row = mysql_fetch_array($query)) {
              	$output .= '	            
						<div class="card-deck mb-3"> 
							<a href="chitietmt.php?id='.$row['maSP'].'">					
								<div class="card card-nd-mt mr-4">
									<img class="card-img-top" src="../img/'. $row['hinhanh'] .'" alt="Máy tính 1">
									<div class="card-block cd-bl">
										<div class="ten-sp">
											<p class="text-info"><strong>'. $row['tenSP'] .'</strong></p>
										</div>
										<div class="gia text-dark">
											<p class="card-text"><strong>Giá: </strong>'. number_format($row['gia'], 0, '.', '.') .'₫</p>
											<p><del>'. number_format($row['giagoc'], 0, '.', '.') .'₫</del></p>
										</div>
										<div class="thong-tin mb-5 text-dark">
											<ul class="mt-2">
												<li>
													<label><strong>Màn hình: </strong></label>
													<span>'. $row['manhinh'] .'</span>
												</li>
												<li>
													<label><strong>CPU: </strong></label>
													<span>'. $row['CPU'] .' </span>
												</li>
												<li>
													<label><strong>RAM: </strong></label>
													<span> '. $row['RAM'] .' </span>
												</li>										
											</ul>
										</div>
										<div class="btn-mua-ngay">
											<button class="btn btn-primary btn-block">Mua ngay</button>
										</div>
																		
									</div>
								</div>
							</a>	
						
						</div>';
						
					}
					
      		
				}    	
    
    else{
      $output = '<h3>Không có dữ liệu phù hợp</h3>';
    }
    echo $output;
 	 
}

 ?>