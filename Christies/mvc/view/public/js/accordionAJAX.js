function modoCheck(id) {
    let svgs = $("" + id + " svg");
    if ($(svgs[0]).hasClass('hidden')) {
        $(svgs[0]).animate('hide', 'fast');
        $(svgs[0]).removeClass('hidden');
        $(svgs[1]).animate('show', 'fast');
        $(svgs[1]).addClass('hidden');
        return 'ASC';
    } else {
        $(svgs[1]).animate('hide', 'fast');
        $(svgs[1]).removeClass('hidden');
        $(svgs[0]).animate('show', 'fast');
        $(svgs[0]).addClass('hidden');
        return 'DESC';
    }
}

function ajaxProductsValuated(mode,price) {
    $.ajax({
        method: "POST",
        dataType: "json",
        data: {
            index: parseInt(sessionStorage.getItem('index')),
            order: mode,
            price: price,
            idcat: sessionStorage.getItem('cats')==='true'?parseInt(sessionStorage.getItem('cat')):'dont',
            slider: 'false'
        },
        url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/valuatedProds',
    }).done((response) => {
        $('#accId').empty();
        printAccordionJson(response);
    });
}

$().ready(() => {
    sessionStorage.setItem('index', '0');
    sessionStorage.setItem('cats', 'false');
    sessionStorage.setItem('price', 'false');
    $.ajax({
        method: "POST",
        dataType: "json",
        url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/valuatedProds',
    }).done((response) => {
        printAccordionJson(response);
        $('#cat').change(() => {
            sessionStorage.setItem('cats', 'true');
            sessionStorage.setItem('index', '0');
            sessionStorage.setItem('cat', $('#cat').val());
            $.ajax({
                method: "POST",
                dataType: "json",
                data: {
                    idcat: $('#cat').val()
                },
                url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/prodsCat',
            }).done((response) => {
                $('#accId').empty();
                printAccordionJson(response);
            })
        })
    })
    moreProdsAjax();
    $('#popularity').click(() => {
        sessionStorage.setItem('price', 'false');
        let mode = modoCheck('#popularity');
        if (sessionStorage.getItem('cats')==='true') {
            catsFiltering(mode,false);
        } else {
            ajaxProductsValuated(mode,false);
        }
    });
    $('#bestsellers').click(() => {
        let mode = modoCheck('#bestsellers');
        sessionStorage.setItem('price', 'true');
        if (sessionStorage.getItem('cats')==='true') {
            catsFiltering(mode,true);
        } else {
            ajaxProductsValuated(mode,true);
        }
    });
});

function moreProdsAjax() {
    $('#moreProds').click(() => {
        if (sessionStorage.getItem('cats')) {
            $.ajax({
                method: "POST",
                dataType: "json",
                data: {
                    index: parseInt(sessionStorage.getItem('index')) + 10,
                    idcat: sessionStorage.getItem('cat'),
                },
                url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/prodsCat',
            }).done((response) => {
                sessionStorage.setItem('index', (parseInt(sessionStorage.getItem('index')) + 10));
                printAccordionJson(response);
            });
        } else {
            $.ajax({
                method: "POST",
                dataType: "json",
                data: {
                    index: parseInt(sessionStorage.getItem('index')) + 10,
                },
                url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/valuatedProds',
            }).done((response) => {
                sessionStorage.setItem('index', parseInt(sessionStorage.getItem('index')) + 10);
                printAccordionJson(response);
            });
        }
    })
}

function catsFiltering(mode,price) {
    $.ajax({
        method: "POST",
        dataType: "json",
        data: {
            order: mode,
            idcat: parseInt(sessionStorage.getItem('cat')),
            index: parseInt(sessionStorage.getItem('index')),
            price: price,
            slider:'false',
        },
        url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/valuatedProds',
    }).done((response) => {
        $('#accId').empty();
        printAccordionJson(response);
    });
}

function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}


function printAccordionJson(response) {
    let i = 0;
    for (const element of response) {
        let heading = 'heading' + i;
        let idCollapse = 'collapse' + i;
        if (i === 0) {
            $('#accId').append("<h2 class='accordion-header' id='" + heading + "'><button class='accordion-button' type='button' data-bs-toggle='collapse' " +
                "data-bs-target='#" + idCollapse + "' aria-expanded='true' aria-controls='" + idCollapse + "'><div class='col-3 text-uppercase'>" +
                "" + element.nombre + "</div><div class='col-5 col-sm-8 d-flex justify-content-end'>" +
                "<img class='xs-accordion-img' width='70%' height='350px' src='" + element.ruta_img + "' " +
                "alt='productos " + element + "'></div></button></h2><div id='" + idCollapse + "' class='accordion-collapse collapse show' " +
                "aria-labelledby='" + heading + "' data-bs-parent='#accId'><div class='accordion-body d-flex'>" +
                "<div class='row col-12'><div class='align-middle col-4'>" + capitalizeFirstLetter(element.descripcion) + "</div>" +
                "<div class='col-4'>" + element.precio + "</div>" +
                "<div class='col-4'><a href='../../index.php/product/" + element.id_objeto + "'><button class='btn btn-rounded btn-carousel'>BUY</button></a></div></div></div</div>");
        } else {
            $('#accId').append("<h2 class='accordion-header' id='" + heading + "'><button class='accordion-button' type='button' data-bs-toggle='collapse' " +
                "data-bs-target='#" + idCollapse + "' aria-expanded='true' aria-controls='" + idCollapse + "'><div class='col-3 text-uppercase'>" +
                "" + element.nombre + "</div><div class='col-5 col-sm-8 d-flex justify-content-end'>" +
                "<img class='xs-accordion-img' width='70%' height='350px' src='" + element.ruta_img + "' " +
                "alt='productos " + element + "'></div></button></h2><div id='" + idCollapse + "' class='accordion-collapse collapse' " +
                "aria-labelledby='" + heading + "' data-bs-parent='#accId'><div class='accordion-body d-flex'>" +
                "<div class='row col-12'><div class='align-middle col-4'>" + capitalizeFirstLetter(element.descripcion) + "</div>" +
                "<div class='col-4'>" + element.precio + "</div>" +
                "<div class='col-4'><a  href='../../index.php/product/" + element.id_objeto + "'><button class='btn btn-rounded btn-carousel'>BUY</button></a></div></div></div</div>");
        }
        i++;
    }
}