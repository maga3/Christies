$().ready(() => {
    $.ajax({
        method: "POST",
        dataType: "json",
        url: window.location.href.slice(0, window.location.href.lastIndexOf("home")) + 'api/valuatedProds',
    }).done((response) => {
        for (const responseKey in response) {
            let id = response[responseKey].ruta_img;
            id = id.substring(id.indexOf('/productos/'),id.length-6).split('/');
            if (responseKey === '0'){
                $('.carousel-inner').append("<div class='carousel-item active'><div class='d-flex justify-content-center align-items-center'><a href='../../index.php/product/"+id[2]+"'><img class='xs-slider-img' width='auto' height='500px' src='" + response[responseKey].ruta_img + "' alt='productos " + responseKey + "'></a></div></div>")
            }else{
                $('.carousel-inner').append("<div class='carousel-item'><div class='d-flex justify-content-center align-items-center'><a href='../../index.php/product/"+id[2]+"'><img class='xs-slider-img'  width='auto' height='500px' src='" + response[responseKey].ruta_img + "' alt='productos " + responseKey + "'></a></div></div>")
            }
        }
    });
})