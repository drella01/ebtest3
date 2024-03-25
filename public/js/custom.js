$(document).ready(function(){
    jQuery.fn.edit = function(){
        $('input').each(function(){
            $(this).prop('disabled',false);
        });
    };

    $('#edit').click(function(){
        $('.form-control-plaintext').each(function(){
            $(this).prop('readonly',false);
            $(this).removeClass('form-control-plaintext');
            $(this).addClass('form-control');
        });
    });
    $('.carousel-item:first').addClass('active');

    $('.select2').select2();

    $('#add').click(function(){
        addline();
        $('.selectKey').last().on('change',changeKey);
        $('.select2').each(function(){
            $(this).select2();
        });
        /*$('.selectType').each(function(){
            $(this).on('change', changeType);
        });*/
    });
});
