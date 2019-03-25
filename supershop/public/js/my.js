$(document).ready(function() {
    /*****************УСТАНОВКА CSRF ТОКЕНА ДЛЯ AJAX ЗАПРОСОВ*********************************/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**************************МАСКА НА ТЕЛЕФОН И ИНДЕКС***********************************/
    $('input[type=tel]').mask("8 (999) 999 99 99");
    $('input[name=zip]').mask("999999");


    /**************************ДОБАВЛЕНИЕ ТОВАРОВ В КОРЗИНУ*********************************/
    /**************************добавление товаров в корзину*********************************/
    $( '.add-cart' ).click(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'get',
            url: $(this).attr('href'),
            success: function( data ){
                $('#productName').html( data.product.name );
                $('.countOfCartItems').html( data.countOfCartItems );
                $('#exampleModalLong').modal('show')
            },
            error: function(){
                alert('По техническим причинам данный товар не может быть добален в корзину. Приносим свои извенения за неудобства, оформите пожалуйста заказ по телефону!');
            }
        });
    });

    /**************************добавление товаров в лист желаний******************************/
    $( '.add-wishlist' ).click(function( event ) {
        event.preventDefault();
        $.ajax({
            type: 'get',
            url: $(this).attr('href'),
            success: function( data ){
                $('.countOfWishlistItems').html( data.countOfWishlistItems );
            },
            error: function(){
                alert('По техническим причинам данный товар не может быть добален в лист желаний. Приносим свои извенения за неудобства, обратитесь пожалуйста к специалисту магазина по телефону!');
            }
        });
    });

    /****в количество товара около стрелочек можно вводить тольцо числа************************/
    $(".quantity").keypress(function (e){
        var charCode = (e.which) ? e.which : e.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
    });

    /****в количество товара около стрелочек введенный 0 станет 1******************************/
    $(".quantity").mouseleave(function (e) {
        if($(this).val().length == 0 || $(this).val() == 0){
            $(this).val(1)
        }
    });


    /**************************В КОРЗИНЕ*******************************************************/
    /****пересчет суммы заказа при изменении количества товара*********************************/
    $('.quantity.quantity-cart').change(function () {
        $.ajax({
            type: 'post',
            url: $(this).closest('form').attr('action'),
            data: { _method: "patch", qty: $(this).val() },
            success: function( data ){
                $('.countOfCartItems').html( data.countOfCartItems );
                var price = data.cartItem.qty * data.cartItem.price;
                $('.price.' + data.cartItem.rowId).find('span').html( price.toLocaleString('ru') );
                $('.cart-total-before').html( data.total_before.toLocaleString('ru'));
                $('.cart-delivery-price').html( data.delivery_price.toLocaleString('ru'));
                $('.cart-total-after').html( data.total_after.toLocaleString('ru'));
            },
            error: function(){
                alert('Ошибка корзины. Приносим свои извенения за неудобства, оформите пожалуйста заказ по телефону!');
            }
        });
    });

    /****пересчет суммы заказа при нажатиии на стрелочки**************************************/
    $('.incr-btn.incr-btn-cart').click(function ( event ) {
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: $(this).closest('form').attr('action'),
            data: { _method: "patch", qty: $(this).parent().find('.quantity').val() },
            success: function( data ){
                $('.countOfCartItems').html( data.countOfCartItems );
                var price = data.cartItem.qty * data.cartItem.price;
                $('.price.' + data.cartItem.rowId).find('span').html( price.toLocaleString('ru') );
                $('.cart-total-before').html( data.total_before.toLocaleString('ru'));
                $('.cart-delivery-price').html( data.delivery_price.toLocaleString('ru'));
                $('.cart-total-after').html( data.total_after.toLocaleString('ru'));
            },
            error: function(){
                alert('Ошибка корзины. Приносим свои извенения за неудобства, оформите пожалуйста заказ по телефону!');
            }
        });
    });


    /****ЗАКАЗЫ НА AJAX пока не работает****************************************************/
    $('#order_btn').click(function () {
        $('#ajax_error_container').empty().removeClass('d-block').addClass('d-none');
        $.ajax({
            type: 'post',
            url: $(this).parents('form').attr('action'),
            data: $(this).parents('form').serialize(),
            success: function( data ){

            },
            error: function( data ){
                var errors = jQuery.parseJSON(data.responseText);
                errors = errors.errors;
                $('#ajax_error_container').removeClass('d-none').addClass('d-block');
                for (var key in errors) {
                    $('#ajax_error_container').append("<p>" + errors[key] + "</p>")
                }
            }
        });
    })

});
