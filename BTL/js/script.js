//Lọc Máy tính
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
//Lọc máy ảnh
$(document).ready(function(){

    filter_data();
    

    function filter_data()
    {
        
        var action = 'loc_mayanh';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var dophangia = get_filter('dophangia');
        var bocambien = get_filter('bocambien');
        var manhinh = get_filter('manhinh');
        
        $.ajax({
            url:"loc_mayanh.php",
            method:"POST",
            data:{action:action,minimum_price:minimum_price,maximum_price:maximum_price,dophangia:dophangia,bocambien:bocambien,
                manhinh:manhinh},
            success:function(data){
                $('.loc_mayanh').html(data);
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
//Tìm kiếm
$(document).ready(function(){ 

$('#searchBox').keyup(function(){
    var searchBox = $("#searchBox").val();
    if(searchBox==""){
        $('#live_result').css("display","none");
    }else{
        $.ajax({
            url:"TimKiemSP.php",
            method:"GET",
            data:{id:searchBox},
            success:function(data){
                $('#live_result').html(data);
                $('#live_result').css("display","block");
            }
        });
    }
        
});


});