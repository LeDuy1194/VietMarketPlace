$( document ).ready(function() {
    $('#wish-list-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.tabs-custom a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

});