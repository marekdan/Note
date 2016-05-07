$(function () {

    var note = $('.note');
    note.on('mouseover', function () {
        $(this).find('.noteDescription').slideDown('fast');
    }).on('mouseleave', function () {
        $(this).find('.noteDescription').slideUp('fast');

    });

    var changeName = $('#changeName');
    var saveName = $('#saveName');
    var cancelName = $('#cancelName');
    var changeNameForm = $('#changeNameForm')

    changeName.on('click', function(){
        changeName.removeClass('visible').addClass('invisible');
        saveName.removeClass('invisible').addClass('visible');
        cancelName.removeClass('invisible').addClass('visible');
        changeNameForm.removeClass('invisible').addClass('visible');
    });

    cancelName.on('click', function(){
        changeName.removeClass('invisible').addClass('visible');
        saveName.removeClass('visible').addClass('invisible');
        cancelName.removeClass('visible').addClass('invisible');
        changeNameForm.removeClass('visible').addClass('invisible');
    });

    saveName.on('click', function(){
        changeName.removeClass('invisible').addClass('visible');
        saveName.removeClass('visible').addClass('invisible');
        cancelName.removeClass('visible').addClass('invisible');
        changeNameForm.removeClass('visible').addClass('invisible');
    });

    var changeEmail = $('#changeEmail');
    var saveEmail = $('#saveEmail');
    var cancelEmail = $('#cancelEmail');
    var changeEmailForm = $('#changeEmailForm');

    changeEmail.on('click', function(){
        changeEmail.removeClass('visible').addClass('invisible');
        saveEmail.removeClass('invisible').addClass('visible');
        cancelEmail.removeClass('invisible').addClass('visible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

    saveEmail.on('click', function(){
        changeEmail.removeClass('invisible').addClass('visible');
        saveEmail.removeClass('visible').addClass('invisible');
        cancelEmail.removeClass('visible').addClass('invisible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

    cancelEmail.on('click', function(){
        changeEmail.removeClass('invisible').addClass('visible');
        saveEmail.removeClass('visible').addClass('invisible');
        cancelEmail.removeClass('visible').addClass('invisible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

});
