$().ready(()=>{
    $.ajax({
        method: "POST",
        dataType: "json",
        data: {
            user: sessionStorage.getItem("user")
        },
        url: window.location.href.slice(0, window.location.href.lastIndexOf("profile")) + 'api/userData',
    }).done((response) => {
        $('.user').text(response[0].email);
        $('.phone').text(response[0].telf);
        $('.tokens').text(response[0].tokens);
        $('#deleteBtn').attr('href', window.location.href.slice(0, window.location.href.lastIndexOf("profile")) + 'delete/'+response[0].email);

        $('#email').val(response[0].email);
        $('#actualEmail').val(response[0].email);
        $('#tel').val(response[0].telf);

        if(response[0].contenido !== undefined && typeof response[0].contenido === 'string'){
            for (const responseElement of response) {
                $('.comments').append("        <div class=\"card mb-4\">\n" +
                    "            <div class=\"card-body\">\n" +
                    "                <p>"+capitalizeFirstLetter(responseElement.producto)+"</p>\n" +
                    "\n" +
                    "                <div class=\"d-flex justify-content-between\">\n" +
                    "                    <div class=\"d-flex flex-row align-items-center\">\n" +
                    "                        <p class=\"small mb-0 ms-2\">"+capitalizeFirstLetter(responseElement.contenido)+"</p>\n" +
                    "                    </div>\n" +
                    "                    <div class=\"d-flex flex-row align-items-center\">\n" +
                    "                        <p class=\"small text-muted mb-0\">"+responseElement.fecha_com+"</p>\n" +
                    "                    </div>\n" +
                    "                </div>\n" +
                    "            </div>\n" +
                    "        </div>")
            }
        }
    })
    $.ajax({
        method: "POST",
        dataType: "json",
        data: {
            user: sessionStorage.getItem("user")
        },
        url: window.location.href.slice(0, window.location.href.lastIndexOf("profile")) + 'api/userPurchases',
    }).done((response) => {
        for (const responseElement of response) {
            $('.products').append("        <div class=\"card mb-4\">\n" +
                "            <div class=\"card-body\">\n" +
                "                <p>"+capitalizeFirstLetter(responseElement.producto)+"</p>\n" +
                "                    <div class=\"d-flex flex-row align-items-center\">\n" +
                "                        <p class=\"small text-muted mb-0\">"+responseElement.fecha_com+"</p>\n" +
                "                    </div>\n" +
                "                <div class=\"d-flex justify-content-center align-items-center\">\n" +
                "                        <figcaption><img alt=\"img_prod\" height='150px' width='250px' class='xs-slider-img' src='"+responseElement.img+"'></figcaption>"+
                "                </div>\n" +
                "            </div>\n" +
                "        </div>")
        }
    })
    $('#logoutBtn').click(()=>{
        sessionStorage.removeItem('user');
    })
    $('.deleteBtn').click(()=>{
        $('.deleteBtn').first()[0].firstElementChild.setAttribute('href',window.location.href.slice(0, window.location.href.lastIndexOf("index.php/"))+'index.php/delete/user/'+sessionStorage.getItem('user'))
    })
})

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}