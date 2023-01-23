$(function() {
    $(".menu").click(function() {
        if ($("#navigation").hasClass("hidden")) {
            $("#navigation").animate({"width":"100%"}, "slow");
            $("#navigation").attr("class", "visible");
        } else {
            $("#navigation").attr("class", "hidden");
            $("#navigation").animate({"width":"0%"}, "fast");
        }
        $(this).toggleClass("open");
    });

    $("#navigation").click(function() {
        if ($("#navigation").hasClass("visible")) {
            $(".menu").toggleClass("open");
        } else {
        }
        $(this).attr("class", "hidden");
    });

    $().keyup(function(e) {
        if (e.keyCode === 27) {
            if ($("#navigation").hasClass("visible")) {
                $(".menu").toggleClass("open");
            } else {
                $("#navigation").attr("class", "hidden");
            }

        }
    });
    $('.button-35').click((e) => {
        if ($('#filter').hasClass('d-none')){
            $('#filter').attr("class","d-flex")
            $('#filter').focus();
        }else{
            $('#filter').attr("class","d-none")
        }
    })
});
