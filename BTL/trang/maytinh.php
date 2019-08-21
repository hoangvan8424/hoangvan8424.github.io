<?php
	session_start();
	require("../DB/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Máy tính</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="../css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link rel="stylesheet" type="text/css" href="../style/maytinh.css">
  	<script type="text/javascript" src="../js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="../js/popper.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link href = "../css/jquery-ui.css" rel = "stylesheet">
	<script src="../js/jquery-ui.js"></script>
	<script src="script.js"></script>
</head>
<body>

	<?php 
		include("../modules/header.php");
		include("../modules/menu.php"); 
		include("../modules/form_dangnhap.php");
		include("../modules/form_dangky.php");
	?>	

	<!-- Bắt đầu nội dung -->

	<div class="container-fluid"  style="background: #ccc"> <!-- bắt đầu container -->

		<div class="row"> <!-- bắt đầu row -->

			<div class="col-sm-3 mt-3"> <!-- bắt đầu cột đầu tiên - 3 -->

				<div class="bo-loc" style="background: #fff;"> <!-- bắt đầu bộ lọc -->

					<div class="row mt-2">
						<div class="col-12 mt-2">
							<h6 class="text-md-center">Bộ lọc sản phẩm</h6>							
						</div>									
					</div>

					<div class="row mt-3"> 
						<div class="col-12">
							<h6 class="ml-2">Hãng sản xuất</h6>
							<?php 
							
								$sql ="SELECT DISTINCT tenNCC from ncc where maNCC=1 or maNCC=2";
								$query = mysql_query($sql);
								$num = mysql_num_rows($query);
								if($num>0){
									while ($row = mysql_fetch_array($query)) {
																										

							?>
							<div class="form-check-inline l-man">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input tenNCC" value="<?php echo $row['tenNCC']; ?>">
								    <span><?php echo $row['tenNCC']; ?></span>
								  </label>
								</div>
																
							
								<?php } } ?>

						</div>												
					</div> 
					<div class="row mt-3"> <!-- lọc theo giá bán -->
						<div class="col-12">
							<h6 class="ml-2">Giá bán</h6>
							<input type="hidden" id="hidden_minimum_price" value="0" />
		                    <input type="hidden" id="hidden_maximum_price" value="6500"/>
		                    <p id="price_show">5.000.000đ - 60.000.000đ</p>
		                    <div id="price_range">
		                    	
		                    </div>
						</div>												
					</div> <!-- kết thúc lọc theo giá bán -->


					<div class="row mt-3"> <!-- lọc theo kích thước màn hình -->
						<div class="col-12">
							<h6 class="ml-2">Kích thước màn hình</h6>
							<?php 
							
								$sql ="SELECT DISTINCT manhinh from sanpham,chitietmt where sanpham.maSP = chitietmt.maSP";
								$query = mysql_query($sql);
								$num = mysql_num_rows($query);
								if($num>0){
									while ($row = mysql_fetch_array($query)) {
																										

							?>
							
								<div class="form-check-inline l-man">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input manhinh" value="<?php echo $row['manhinh']; ?>">
								    <span><?php echo $row['manhinh']; ?></span>
								  </label>
								</div>
																
							
								<?php } } ?>	
						</div>
					</div> <!-- kết thúc lọc theo kích thước màn hình -->

					<div class="row mt-3"> <!-- bắt đầu lọc theo RAM-->
						<div class="col-12">
							<h6 class="ml-2">RAM</h6>
							<?php 
							
								$sql ="SELECT DISTINCT ram from sanpham,chitietmt where sanpham.maSP = chitietmt.maSP";
								$query = mysql_query($sql);
								$num = mysql_num_rows($query);
								if($num>0){
									while ($row = mysql_fetch_array($query)) {
																										

							?>
							
								<div class="form-check-inline l-ram">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input ram" value="<?php echo $row['ram']; ?>">
								    <span><?php echo $row['ram']; ?></span>
								  </label>
								</div>
								
								<?php } } ?>

						</div>
					</div> <!-- kết thúc lọc theo RAM -->

					<div class="row mt-3"> <!-- bắt đầu lọc theo bộ vi xử lý -->
						<div class="col-12">
							<h6 class="ml-2">CPU</h6>
							<?php 
							
								$sql ="SELECT DISTINCT cpu from sanpham,chitietmt where sanpham.maSP = chitietmt.maSP";
								$query = mysql_query($sql);
								$num = mysql_num_rows($query);
								if($num>0){
									while ($row = mysql_fetch_array($query)) {
																										

							?>
								<div class="form-check-inline l-cpu">
								  <label class="form-check-label">
								    <input type="checkbox" class="form-check-input cpu" value="<?php echo $row['cpu']; ?>">
								    <span><?php echo $row['cpu']; ?></span>
								  </label>
								</div>
								<?php } } ?>
						</div>
					</div> <!-- kết thúc lọc theo bộ vi xử lý -->

				</div> <!-- kết thúc bộ lọc -->
			</div> <!-- kết thúc cột đầu tiên - 3 -->
			
			
			<div class="col-sm-9 mt-4"> <!-- bắt đầu cột thứ 2 - cột 8 -->
            	
                <div class="row loc_maytinh">
                	<div class="card-deck-wrapper mb-2">
					
					</div> <!-- kết thúc card-desk -->
					
				</div>
				<a class="on_top" href="#top" style="display: block;"><i class="fa-arrow-circle-up fa"></i></a>
                 	<a class="contact" href="#contact" style="display: block;"><i class="far fa-comment-alt"></i></a>
               	 
			</div> <!-- kết thúc cột 2 -->
						
		</div> <!-- kết thúc row -->
		
	</div> <!-- kết thúc container -->


	<!-- Kết thúc nội dung -->

	<!-- bắt đầu footer -->
	<?php include("../modules/form_contact.php"); ?>
	<?php 
		include("../modules/footer.php")
	?>
	<!-- kết thúc footer -->
	<style type="text/css">
		a.on_top { opacity:0.6; display: none;}
		a.on_top:hover{
		background-color: #007bb6;
		color: #fff;
		border: 1px solid #007bb6;
		opacity:1;
		}
		a.on_top i{ font-size: 20px;}
		a.on_top {
		border-radius: 6px;
		background-color: #333333;
		padding: 10px 20px;
		white-space: nowrap; color: #fff;
		position: fixed;
		bottom: 75px;
		right: 30px;
		height: 44px;
}
a.contact { opacity:0.6; display: none;}
		a.contact:hover{
		background-color: #007bb6;
		color: #fff;
		border: 1px solid #007bb6;
		opacity:1;
		}
		a.contact i{ font-size: 20px;}
		a.contact {
		border-radius: 6px;
		background-color: #333333;
		padding: 10px 20px;
		white-space: nowrap; color: #fff;
		position: fixed;
		bottom: 10px;
		right: 30px;
		height: 44px;
}
	</style>

<script>
	$(document).ready(function(){
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#on_top').fadeIn();
        } else {
            $('#on_top').fadeOut();
        }
    });
    $('#on_top').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});
	$(document).ready(function(){
		$(".contact").click(function(){
	   		$("#form-contact").modal("show");
	  });
	});

	$(document).ready(function(){
	  $("#dk-1").click(function(){
	  	$("#form-dangky").modal("show");
	    $("#form-dangnhap").modal("hide");
	    
	  });
	  $("#dn-2").click(function(){
	    $("#form-dangnhap").modal("show");
	    $("#form-dangky").modal("hide");
	    
	  });
	});

	$(document).ready(function(){

    filter_data();
    

    function filter_data()
    {
        
        var action = 'loc_maytinh';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var tenNCC = get_filter('tenNCC');
        var manhinh = get_filter('manhinh');
        var ram = get_filter('ram');
        var cpu = get_filter('cpu');
      
        $.ajax({
            url:"loc_maytinh.php",
            method:"POST",
            data:{action:action,minimum_price:minimum_price,tenNCC:tenNCC,maximum_price:maximum_price,manhinh:manhinh,ram:ram,
                cpu:cpu},
            success:function(data){
                $('.loc_maytinh').html(data);
            }
        });
    }


    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.form-check-input').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:5000000,
        max:60000000,
        values:[5000000, 60000000],
        step:1000000,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
});
</script>

</body>
</html>