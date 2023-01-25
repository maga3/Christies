$().ready(() => {
    $.ajax({
        method: "POST",
        dataType: "json",
        data: {
            slider: 'true',
            order: 'DESC',
            idcat: parseInt(sessionStorage.getItem('cat')),
            index: 0,
            price: 'false',
        },
        url: window.location.href.slice(0, window.location.href.lastIndexOf("home")) + 'api/valuatedProds',
    }).done((response) => {
        for (const responseKey in response) {
            let id = response[responseKey].ruta_img;
            id = id.substring(id.indexOf('/productos/'), id.length - 6).split('/');
            if (responseKey === '0') {
                $('.carousel-inner').append("<div class='carousel-item active'><div class='d-flex justify-content-center align-items-center'><a href='../../index.php/product/" + id[2] + "'><img class='xs-slider-img' width='auto' height='500px' src='" + response[responseKey].ruta_img + "' alt='productos " + responseKey + "'></a></div></div>")
            } else {
                $(".carousel-inner").append("<div class='carousel-item'><div class='d-flex justify-content-center align-items-center'><a href='../../index.php/product/" + id[2] + "'><img class='xs-slider-img'  width='auto' height='500px' src='" + response[responseKey].ruta_img + "' alt='productos " + responseKey + "'></a></div></div>")
            }
        }
    });
    $('#product-list-choice').keyup(() => {
        if ($('#product-list-choice').val() !== '') {
            $.ajax({
                method: "POST",
                dataType: "json",
                data: {
                    search: $('#product-list-choice').val()
                },
                url: window.location.href.slice(0, window.location.href.lastIndexOf("home")) + 'api/listProds',
            }).done((response) => {
                console.log(response)
                $('#product-list').empty();
                for (const responseElement of response) {
                    $('#product-list').append("<option data-action='" + responseElement.id_objeto + "' value='" + capitalizeFirstLetter(responseElement.nombre) + "'>");
                }
            })
        }
    })
    $('#search-btn').click(() => {
        let prod;
        [...$('#product-list')[0].options].forEach((option) => {if (option.value === $('#product-list-choice').val())prod = option.attributes[0].value;})
        let url = window.location.href.slice(0, window.location.href.lastIndexOf("home")) + 'product/' + prod;
        $('#search-btn').attr('href', url);
    })
})

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}