$(document).ready(function(){
    /*******************************************СОДЕРЖИМОЕ*******************************/
    $('#body').summernote({
        height: 300,
        lang: 'ru-RU', // default: 'en-US'
        toolbar: [
            ['insert', ['link', 'table', 'hr' ]],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['misc', ['fullscreen', 'undo', 'redo']]
        ]
    });


    /*******************************************ТОВАРЫ************************************/
    $('select[multiple]').multiselect({
        columns  : 3,
        search   : true,
        selectAll: true,
        maxPlaceholderOpts: 4,
        maxSelect: 10
    });

    /************************УДАЛЕНИЕ ИЗОБРАЖЕНИЯ ИЗ ПОСТА********************************/
    $( '.delete-img-from-post' ).click(function( event ) {
        var image_container = $(this).parents('.post-image-container');
        event.preventDefault();
        $.ajax({
            type: 'post',
            url: $(this).attr('href'),
            data: {_method: 'delete', 'image': image_container.attr('id')},
            success: function(){
                image_container.remove();
            },
            error: function(){
                alert('По техническим пост не может быть отредактирован!');
            }
        });
    });

});