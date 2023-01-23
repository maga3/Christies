$().ready(() => {
    $.ajax({
        method: "POST",
        dataType: "json",
        url: window.location.href.slice(0, window.location.href.indexOf("list")) + 'api/valuatedProds',
    }).done((response) => {
        for (const responseKey in response) {
            let heading = 'heading'+responseKey;
            let idCollapse = 'collapse'+responseKey;
            if (responseKey === '0'){
                $('#accId').append("<h2 class='accordion-header' id='"+heading+"'><button class='accordion-button' type='button' data-bs-toggle='collapse' " +
                    "data-bs-target='#"+idCollapse+"' aria-expanded='true' aria-controls='"+idCollapse+"'><div class='col-3 text-uppercase'>" +
                    ""+response[responseKey].nombre+"</div><div class='col-5 col-sm-8 d-flex justify-content-end'>" +
                    "<img class='xs-accordion-img' width='70%' height='350px' src='" + response[responseKey].ruta_img + "' " +
                    "alt='productos " + responseKey + "'></div></button></h2><div id='"+idCollapse+"' class='accordion-collapse collapse show' " +
                    "aria-labelledby='"+heading+"' data-bs-parent='#accId'><div class='accordion-body d-flex'>" +
                    "<div class='row col-12'><div class='align-middle col-4'>"+response[responseKey].descripcion+"</div>" +
                    "<div class='col-4'>"+response[responseKey].precio+"</div>"+
                    "<div class='col-4'><button class='btn btn-rounded btn-carousel'>BUY</button></div></div></div</div>");
            }else {
                $('#accId').append("<h2 class='accordion-header' id='"+heading+"'><button class='accordion-button' type='button' data-bs-toggle='collapse' " +
                    "data-bs-target='#"+idCollapse+"' aria-expanded='true' aria-controls='"+idCollapse+"'><div class='col-3 text-uppercase'>" +
                    ""+response[responseKey].nombre+"</div><div class='col-5 col-sm-8 d-flex justify-content-end'>" +
                    "<img class='xs-accordion-img' width='70%' height='350px' src='" + response[responseKey].ruta_img + "' " +
                    "alt='productos " + responseKey + "'></div></button></h2><div id='"+idCollapse+"' class='accordion-collapse collapse' " +
                    "aria-labelledby='"+heading+"' data-bs-parent='#accId'><div class='accordion-body d-flex'>" +
                    "<div class='row col-12'><div class='align-middle col-4'>"+response[responseKey].descripcion+"</div>" +
                    "<div class='col-4'>"+response[responseKey].precio+"</div>"+
                    "<div class='col-4'><button class='btn btn-rounded btn-carousel'>BUY</button></div></div></div</div>");
            }
        }
        $('.btn-carousel')
    });

})