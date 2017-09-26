function resultSearch(res){
    $('#wb_LayoutGrid11').empty().append(res);

}



$('#wb_content').change('.checkbox', function(){

    var msg   = $('#w0').serialize();

    var page   = $('#price').val();

    $.ajax({
        data:"msg="+msg+"&page="+page,
        // data: msg,
        url: '/products/index',
        type: 'get',

        success: function(res){
            if(!res) alert('Ошибка!');
            resultSearch(res);
        },

        error: function(){
            alert('Error!');
        }
    });

});


$(function() {
    $( "#slider_price" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [ $('#price').val(), $('#price2').val() ],
        stop: function( event, ui ) {

            var value1 = ui.values[0];
            var value2 = ui.values[1];
            var msg   = $('#w0').serialize();

            $.ajax({
                type: 'get',
                url: "/products/index",
                data: "msg="+msg+"&price="+value1+"&price2="+value2,
                cache: false,
                success: function(res){
                    if(!res) alert('Ошибка!');
                    resultSearch(res);
                },
            });
        },

        slide: function( event, ui ) {
            //Поле минимального значения
            $( "#price" ).val(ui.values[ 0 ]);
            //Поле максимального значения
            $("#price2").val(ui.values[1]); }
    });
    // Записываем значения ползунков в момент загрузки страницы
    // То есть значения по умолчанию
    $("#price" ).val($('#price').val());
    $("#price2").val($('#price2').val());
});


$('#price').change(function() {
    var val = $(this).val();
    $('#slider_price').slider("values",0,val);
});


$('#price2').change(function() {
    var val1 = $(this).val();
    $('#slider_price').slider("values",1,val1);
});














