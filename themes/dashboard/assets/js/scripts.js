$(function () {

    $(".prize-draw-form-group").submit(function (e){

        e.preventDefault();

      alert("ok")

    });
    /*
     * IMAGE RENDER
     */
    $("[data-image]").change(function (e) {
        var changed = $(this);
        var file = this;

        if (file.files && file.files[0]) {
            var render = new FileReader();

            render.onload = function (e) {
                $(changed.data("image")).fadeTo(100, 0.1, function () {
                    $(this).css("background-image", "url('" + e.target.result + "')")
                        .fadeTo(100, 1);
                });
            };
            render.readAsDataURL(file.files[0]);
        }
    });

    /*
     * IMAGE RENDER
     */
    $("[data-image]").change(function (e) {
        var changed = $(this);
        var file = this;

        if (file.files && file.files[0]) {
            var render = new FileReader();

            render.onload = function (e) {
                $(changed.data("image")).fadeTo(100, 0.1, function () {
                    $(this).css("background-image", "url('" + e.target.result + "')")
                        .fadeTo(100, 1);
                });
            };
            render.readAsDataURL(file.files[0]);
        }
    });


    $(".menu_mobile").click(function () {

        if ($(".main_menu_aside").css("margin-left") === '-250px') {
            $(".main_menu_aside").animate({
                "margin-left": "0"
            }, 300);
        } else {
            $(".main_menu_aside").animate({
                "margin-left": "-250px"
            }, 300);
        }

    });

    $('.main_menu_item_one li').on('click', function () {

        var item = $(this);
        if (item.has('active_menu')) {

            $('.main_menu_item_one li').removeClass('active_menu');

            $(this).addClass('active_menu');
        }
    });



});