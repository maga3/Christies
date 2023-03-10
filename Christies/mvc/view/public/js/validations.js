$().ready(() =>{
    $('#email').keyup(() =>{
        if (!/^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test($('#email').val())) {
            $('#email').addClass('is-invalid');
        } else {
            $('#email').addClass('is-valid');
            if ($('#email').hasClass('is-invalid'))$('#email').removeClass('is-invalid');
        }
        invalidForm();
    });
    $('#name').keyup(() =>{
        if (!/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test($('#name').val())) {
            $('#name').addClass('is-invalid');
        } else {
            $('#name').addClass('is-valid');
            if ($('#name').hasClass('is-invalid'))$('#name').removeClass('is-invalid');
        }
        invalidForm();
    });
    $('#pass').keyup(() =>{
        if (!/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/.test($('#pass').val())) {
            $('#pass').addClass('is-invalid');
        } else {
            $('#pass').addClass('is-valid');
            if ($('#pass').hasClass('is-invalid'))$('#pass').removeClass('is-invalid');
        }
        invalidForm();
    });
    $('#price').keyup(() =>{
        if (!/^(^\d+(\.\d{1,2})?$)$/.test($('#price').val())) {
            $('#price').addClass('is-invalid');
        } else {
            $('#price').addClass('is-valid');
            if ($('#price').hasClass('is-invalid'))$('#price').removeClass('is-invalid');
        }
        invalidForm();
    });
    $('#tel').keyup(() =>{
        if (!/^[+]?[(]?[0-9]{3}[)]?[-\s.]?[0-9]{3}[-\s.]?[0-9]{4,6}$/.test($('#tel').val())) {
            if ($('#tel').hasClass('is-valid'))$('#tel').removeClass('is-valid');
            $('#tel').addClass('is-invalid');
        } else {
            $('#tel').addClass('is-valid');
            if ($('#tel').hasClass('is-invalid'))$('#tel').removeClass('is-invalid');
        }
        invalidForm();
    });
    $('#addANote').keyup(() =>{
        if (!/^[a-zA-Z0-9 ]{3,}$/gm.test($('#addANote').val())) {
            if ($('#addANote').hasClass('is-valid'))$('#addANote').removeClass('is-valid');
            $('#addANote').addClass('is-invalid');
        } else {
            $('#addANote').addClass('is-valid');
            if ($('#addANote').hasClass('is-invalid'))$('#addANote').removeClass('is-invalid');
        }
        invalidForm();
    });
})

function invalidForm(){
    if($('input').hasClass('is-invalid')){
        $('#modalChangesForm').prop("disabled",true);
        $("button[type='submit']").prop('disabled',true);
        $("input[type='submit']").prop('disabled',true);
    }else {
        $('#modalChangesForm').prop("disabled",false);
        $("button[type='submit']").prop('disabled',false);
        $("input[type='submit']").prop('disabled',false);
    }
}