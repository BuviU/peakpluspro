var elements = $('.modal-overlay, .modal');

$('.btn_model_open').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});