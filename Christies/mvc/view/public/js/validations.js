$().ready(() =>{
    $('#email').keyup(() =>{
        if (!/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test($('#email').val())) {
            $('#email').addClass('is-invalid');
        } else {
            $('#email').addClass('is-valid');
            if ($('#email').hasClass('is-invalid'))$('#email').removeClass('is-invalid');
        }
    });
    $('#pass').keyup(() =>{
        if (!/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test($('#pass').val())) {
            $('#pass').addClass('is-invalid');
        } else {
            $('#pass').addClass('is-valid');
            if ($('#pass').hasClass('is-invalid'))$('#pass').removeClass('is-invalid');
        }
    });
})