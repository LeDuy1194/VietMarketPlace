$( document ).ready(function() {
    $('#detail-tabs a').click(function (e) {
        e.preventDefault()
        $(this).tab('show')
    })
});