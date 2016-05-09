$(function () {

    var note = $('.note');

    note.on('mouseover', function () {
        $(this).find('.noteDescription').slideDown('fast');
    }).on('mouseleave', function () {
        $(this).find('.noteDescription').slideUp('fast');

    });


    var changeName = $('#changeName');
    var cancelName = $('#cancelName');
    var changeNameForm = $('#changeNameForm');
    var saveName = $('#saveName');

    changeName.on('click', function () {
        changeName.removeClass('visible').addClass('invisible');
        cancelName.removeClass('invisible').addClass('visible');
        changeNameForm.removeClass('invisible').addClass('visible');
    });
    cancelName.on('click', function () {
        changeName.removeClass('invisible').addClass('visible');
        cancelName.removeClass('visible').addClass('invisible');
        changeNameForm.removeClass('visible').addClass('invisible');
    });

    saveName.on('click', function () {
        changeName.removeClass('invisible').addClass('visible');
        cancelName.removeClass('visible').addClass('invisible');
        changeNameForm.removeClass('visible').addClass('invisible');
    });

    saveName.on('click', function () {
        event.preventDefault();
        console.log('save name click');
        var newName = $('#newName').val();

        var toUpdate = {};
        toUpdate.newName = newName;

        $.ajax({
            url: 'api/apiUser.php',
            type: 'PUT',
            data: toUpdate,
            success: function (result) {
                if (result.result == 'success')
                    console.log('update success: ' + result.message)
                else
                    console.log('update error: ' + result.message);
            },
            error: function (result, status, error) {
                console.log('ajax error:' + error)
            },
            complete: function () {
                console.log('update complete')
            }
        });
    });


    var changeEmail = $('#changeEmail');
    var cancelEmail = $('#cancelEmail');
    var changeEmailForm = $('#changeEmailForm');
    var saveEmail = $('#saveEmail');

    changeEmail.on('click', function () {
        changeEmail.removeClass('visible').addClass('invisible');
        cancelEmail.removeClass('invisible').addClass('visible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

    saveEmail.on('click', function () {
        changeEmail.removeClass('invisible').addClass('visible');
        cancelEmail.removeClass('visible').addClass('invisible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

    cancelEmail.on('click', function () {
        changeEmail.removeClass('invisible').addClass('visible');
        cancelEmail.removeClass('visible').addClass('invisible');
        changeEmailForm.removeClass('invisible').addClass('visible');
    });

    saveEmail.on('click', function () {
        event.preventDefault();
        console.log('save email click');
        var newEmail = $('#newEmail').val();

        var toUpdate = {};
        toUpdate.newEmail = newEmail;

        $.ajax({
            url: 'api/apiUser.php',
            type: 'PUT',
            data: toUpdate,
            success: function (result) {
                if (result.result == 'success')
                    console.log('update success: ' + result.message)
                else
                    console.log('update error: ' + result.message);
            },
            error: function (result, status, error) {
                console.log('ajax error:' + error)
            },
            complete: function () {
                console.log('update complete')
            }
        });
    });
});