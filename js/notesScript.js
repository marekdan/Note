$(function () {

    var note = $('.note');

    note.on('mouseover', function () {
        $(this).find('.noteDescription').slideDown('fast');
    }).on('mouseleave', function () {
        $(this).find('.noteDescription').slideUp('fast');

    });

});
