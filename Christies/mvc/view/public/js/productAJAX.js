$().ready(() => {
    $.ajax({
        method: "GET",
        dataType: "json",
        url: window.location.href.slice(0, window.location.href.lastIndexOf("product")) + 'api/product/' + window.location.href.split('/')[7],
    }).done((response) => {
        for (const responseElement of response) {
            console.log(responseElement)
            $('.comments').append("        <div class=\"card mb-4\">\n" +
                "            <div class=\"card-body\">\n" +
                "                <p>"+responseElement.contenido+"</p>\n" +
                "\n" +
                "                <div class=\"d-flex justify-content-between\">\n" +
                "                    <div class=\"d-flex flex-row align-items-center\">\n" +
                "                        <p class=\"small mb-0 ms-2\">"+responseElement.email+"</p>\n" +
                "                    </div>\n" +
                "                    <div class=\"d-flex flex-row align-items-center\">\n" +
                "                        <p class=\"small text-muted mb-0\">"+responseElement.fecha+"</p>\n" +
                "                    </div>\n" +
                "                </div>\n" +
                "            </div>\n" +
                "        </div>")
        }
        $('#titleProd').append("<h2 class='h2 mb-2'>"+capitalizeFirstLetter(response[0].nombre)+"</h2>")
        $('#titleProd').append("<h2 class='h2 mb-2'>"+capitalizeFirstLetter(response[0].category)+"</h2>")
        $('#titleProd').append("<h3 class='h3 mb-2'>"+capitalizeFirstLetter(response[0].precio)+" christokens</h3>")
        $('.carousel-inner').append("<div class='carousel-item active'><div class='d-flex justify-content-center align-items-center'><img class='xs-slider-img' width='auto' height='400px' src='" + response[0].img1 + "' alt='productos " + response.id + "'></div></div>")
        if (response[0].img2 !== '') {
            $('.carousel-inner').append("<div class='carousel-item'><div class='d-flex justify-content-center align-items-center'><img class='xs-slider-img' width='auto' height='400px' src='" + response[0].img2 + "' alt='productos " + response + "'></div></div>")
        }
        if (response[0].img3 !== '') {
            $('.carousel-inner').append("<div class='carousel-item'><div class='d-flex justify-content-center align-items-center'><img class='xs-slider-img' width='auto' height='400px' src='" + response[0].img3 + "' alt='productos " + response + "'></div></div>")
        }
        $('#mapLoc').append("<h5 class='h5 mb-2'> Lat:"+(response[0].lat==='0.00000000000000000000'?'Not set':response[0].lat)+"</h5>");
        $('#mapLoc').append("<h5 class='h5 mb-2'> Lon:"+(response[0].lat==='0.00000000000000000000'?'Not set':response[0].lon)+"</h5>");
        $('.form-label').text($('.form-label').text()+'. Total '+response[0].num_comments);
        $('.numcompras').append("<span>Total number of products purchased "+response[0].num_compras+"</span>")
    });
})

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}